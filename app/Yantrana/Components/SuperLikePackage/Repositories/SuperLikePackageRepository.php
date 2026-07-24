<?php
/**
 * SuperLikePackageRepository.php - Repository file
 */

namespace App\Yantrana\Components\SuperLikePackage\Repositories;

use App\Yantrana\Base\BaseRepository;
use App\Yantrana\Components\SuperLikePackage\Models\SuperLikePackageModel;
use App\Yantrana\Components\SuperLikePackage\Models\SuperLikeWalletTransactionModel;

class SuperLikePackageRepository extends BaseRepository
{
    protected $primaryModel = SuperLikePackageModel::class;

    public function fetch($idOrUid)
    {
        if (is_numeric($idOrUid)) {
            return SuperLikePackageModel::where('_id', $idOrUid)->first();
        }

        return SuperLikePackageModel::where('_uid', $idOrUid)->first();
    }

    public function fetchAllPackages()
    {
        return SuperLikePackageModel::orderBy('_id', 'desc')->get();
    }

    public function fetchAllActivePackages()
    {
        return SuperLikePackageModel::where('status', 1)
            ->orderBy('credit_price', 'asc')
            ->get();
    }

    public function storePackage($input)
    {
        $keyValues = [
            'title',
            'description',
            'total_likes',
            'credit_price',
            'price',
            'status',
            'users__id',
        ];

        $package = new SuperLikePackageModel;
        if ($package->assignInputsAndSave($input, $keyValues)) {
            activityLog($package->title . ' Super Like package created.');

            return $package;
        }

        return false;
    }

    public function updatePackage($packageData, $updateData)
    {
        if ($packageData->modelUpdate($updateData)) {
            activityLog($packageData->title . ' Super Like package updated.');

            return true;
        }

        return false;
    }

    public function delete($packageData)
    {
        if ($packageData->delete()) {
            activityLog($packageData->title . ' Super Like package deleted.');

            return true;
        }

        return false;
    }

    public function getUserBalance($userId)
    {
        return (int) SuperLikeWalletTransactionModel::where('users__id', $userId)->sum('quantity');
    }

    public function storeWalletTransaction($storeData)
    {
        $keyValues = [
            'status',
            'users__id',
            'quantity',
            'super_like_packages__id',
            'credit_wallet_transactions__id',
            'description',
        ];

        $transaction = new SuperLikeWalletTransactionModel;
        if ($transaction->assignInputsAndSave($storeData, $keyValues)) {
            return $transaction->_id;
        }

        return false;
    }
}
