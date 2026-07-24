<?php
/**
 * SuperLikePackageEngine.php
 */

namespace App\Yantrana\Components\SuperLikePackage;

use App\Yantrana\Base\BaseEngine;
use App\Yantrana\Components\SuperLikePackage\Repositories\SuperLikePackageRepository;
use App\Yantrana\Components\User\Models\CreditWalletTransaction;
use App\Yantrana\Components\User\Repositories\UserRepository;

class SuperLikePackageEngine extends BaseEngine
{
    protected $superLikePackageRepository;

    protected $userRepository;

    public function __construct(
        SuperLikePackageRepository $superLikePackageRepository,
        UserRepository $userRepository
    ) {
        $this->superLikePackageRepository = $superLikePackageRepository;
        $this->userRepository = $userRepository;
    }

    public function preparePackageList()
    {
        $collection = $this->superLikePackageRepository->fetchAllPackages();
        $packageData = [];

        if (!__isEmpty($collection)) {
            foreach ($collection as $package) {
                $packageData[] = [
                    '_id' => $package->_id,
                    '_uid' => $package->_uid,
                    'title' => $package->title,
                    'description' => $package->description,
                    'total_likes' => (int) $package->total_likes,
                    'price' => round((float) $package->price, 2),
                    'created_at' => formatDate($package->created_at),
                    'updated_at' => formatDate($package->updated_at),
                    'status' => configItem('status_codes', $package->status),
                    'status_code' => (int) $package->status,
                ];
            }
        }

        return $this->engineReaction(1, [
            'packageData' => $packageData,
        ]);
    }

    public function processAddNewPackage($inputData)
    {
        $user = $this->userRepository->fetch(getUserID());
        if (__isEmpty($user)) {
            return $this->engineReaction(2, null, __tr('User not exist.'));
        }

        $storeData = [
            'title' => $inputData['title'],
            'description' => isset($inputData['description']) ? $inputData['description'] : null,
            'total_likes' => (int) $inputData['total_likes'],
            'credit_price' => 0,
            'price' => round((float) $inputData['price'], 2),
            'status' => (isset($inputData['status']) and $inputData['status'] == 'on') ? 1 : 2,
            'users__id' => $user->_id,
        ];

        if ($this->superLikePackageRepository->storePackage($storeData)) {
            return $this->engineReaction(1, ['show_message' => true], __tr('Super Like package added successfully.'));
        }

        return $this->engineReaction(2, ['show_message' => true], __tr('Package not added.'));
    }

    public function preparePackageUpdateData($packageUId)
    {
        $package = $this->superLikePackageRepository->fetch($packageUId);
        if (__isEmpty($package)) {
            return $this->engineReaction(2, null, __tr('Package does not exist'));
        }

        return $this->engineReaction(1, [
            'packageEditData' => [
                '_id' => $package->_id,
                '_uid' => $package->_uid,
                'title' => $package->title,
                'description' => $package->description,
                'total_likes' => (int) $package->total_likes,
                'price' => round((float) $package->price, 2),
                'status' => (int) $package->status,
            ],
        ]);
    }

    public function processEditPackage($inputData, $packageUId)
    {
        $package = $this->superLikePackageRepository->fetch($packageUId);
        if (__isEmpty($package)) {
            return $this->engineReaction(2, null, __tr('Package does not exist'));
        }

        $updateData = [
            'title' => $inputData['title'],
            'description' => isset($inputData['description']) ? $inputData['description'] : null,
            'total_likes' => (int) $inputData['total_likes'],
            'price' => round((float) $inputData['price'], 2),
            'status' => (isset($inputData['status']) and $inputData['status'] == 'on') ? 1 : 2,
        ];

        if ($this->superLikePackageRepository->updatePackage($package, $updateData)) {
            return $this->engineReaction(1, ['show_message' => true], __tr('Package updated successfully.'));
        }

        return $this->engineReaction(2, ['show_message' => true], __tr('Package not updated.'));
    }

    public function processDeletePackage($packageUId)
    {
        $package = $this->superLikePackageRepository->fetch($packageUId);
        if (__isEmpty($package)) {
            return $this->engineReaction(2, null, __tr('Package does not exist'));
        }

        if ($this->superLikePackageRepository->delete($package)) {
            return $this->engineReaction(1, [
                'show_message' => true,
                'packageUId' => $packageUId,
            ], __tr('Package deleted successfully.'));
        }

        return $this->engineReaction(2, null, __tr('Package not deleted.'));
    }

    /**
     * User store page: packages + balance
     */
    public function prepareUserShopData()
    {
        $userId = getUserID();
        $packages = $this->superLikePackageRepository->fetchAllActivePackages();
        $packageData = [];

        if (!__isEmpty($packages)) {
            foreach ($packages as $package) {
                $packageData[] = [
                    '_uid' => $package->_uid,
                    'title' => $package->title,
                    'description' => $package->description,
                    'total_likes' => (int) $package->total_likes,
                    'credit_price' => (int) $package->credit_price,
                ];
            }
        }

        return $this->engineReaction(1, [
            'packages' => $packageData,
            'superLikeBalance' => $this->superLikePackageRepository->getUserBalance($userId),
            'creditsBalance' => (int) totalUserCredits(),
            'superLikeEnabled' => (int) getStoreSettings('enable_super_like') === 1,
            'superLikeQuota' => getSuperLikeQuotaInfo($userId),
        ]);
    }

    /**
     * Buy Super Like package with credits
     */
    public function processBuyPackage($packageUId)
    {
        if ((int) getStoreSettings('enable_super_like') !== 1) {
            return $this->engineReaction(2, ['show_message' => true], __tr('Super Like is currently disabled.'));
        }

        $transactionResponse = $this->userRepository->processTransaction(function () use ($packageUId) {
            $userId = getUserID();
            \DB::table('users')->where('_id', $userId)->lockForUpdate()->first();

            $package = $this->superLikePackageRepository->fetch($packageUId);
            if (__isEmpty($package) || (int) $package->status !== 1) {
                return $this->userRepository->transactionResponse(2, [
                    'show_message' => true,
                ], __tr('Package does not exist or is inactive.'));
            }

            $creditPrice = (int) $package->credit_price;
            $totalLikes = (int) $package->total_likes;

            if ($totalLikes < 1) {
                return $this->userRepository->transactionResponse(2, [
                    'show_message' => true,
                ], __tr('Invalid package configuration.'));
            }

            $creditsBalance = (int) CreditWalletTransaction::where('users__id', $userId)->sum('credits');
            if ($creditPrice > 0 && $creditsBalance < $creditPrice) {
                return $this->userRepository->transactionResponse(2, [
                    'show_message' => true,
                    'insufficientCredits' => true,
                    'redirectToWallet' => true,
                    'creditsRemaining' => $creditsBalance,
                ], __tr('Not enough credits. Please buy credits first.'));
            }

            $creditWalletId = null;
            if ($creditPrice > 0) {
                $creditWalletId = $this->userRepository->storeCreditWalletTransaction([
                    'status' => 1,
                    'users__id' => $userId,
                    'credits' => '-' . $creditPrice,
                    'description' => 'super_like_package_buy:' . $package->_id,
                ]);

                if (!$creditWalletId) {
                    return $this->userRepository->transactionResponse(2, [
                        'show_message' => true,
                    ], __tr('Failed to deduct credits.'));
                }
            }

            $walletTxId = $this->superLikePackageRepository->storeWalletTransaction([
                'status' => 1,
                'users__id' => $userId,
                'quantity' => $totalLikes,
                'super_like_packages__id' => $package->_id,
                'credit_wallet_transactions__id' => $creditWalletId,
                'description' => 'purchase:' . $package->_uid,
            ]);

            if (!$walletTxId) {
                return $this->userRepository->transactionResponse(2, [
                    'show_message' => true,
                ], __tr('Failed to add Super Likes to your balance.'));
            }

            activityLog('Purchased Super Like package: ' . $package->title);

            return $this->userRepository->transactionResponse(1, [
                'show_message' => true,
                'superLikeBalance' => $this->superLikePackageRepository->getUserBalance($userId),
                'creditsRemaining' => (int) CreditWalletTransaction::where('users__id', $userId)->sum('credits'),
                'superLikeQuota' => getSuperLikeQuotaInfo($userId),
            ], __tr('Super Like package purchased successfully.'));
        });

        return $this->engineReaction($transactionResponse);
    }
}
