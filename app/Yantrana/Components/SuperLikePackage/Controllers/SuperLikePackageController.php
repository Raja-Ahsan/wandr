<?php
/**
 * SuperLikePackageController.php - User controller
 */

namespace App\Yantrana\Components\SuperLikePackage\Controllers;

use App\Yantrana\Base\BaseController;
use App\Yantrana\Components\SuperLikePackage\SuperLikePackageEngine;

class SuperLikePackageController extends BaseController
{
    protected $superLikePackageEngine;

    public function __construct(SuperLikePackageEngine $superLikePackageEngine)
    {
        $this->superLikePackageEngine = $superLikePackageEngine;
    }

    public function shopView()
    {
        // Packages are purchased with real payment on the Credit Wallet page
        return $this->responseAction(
            $this->processResponse([
                'reaction_code' => 1,
                'data' => [],
                'message' => null,
            ], [], [], true),
            $this->redirectTo('user.credit_wallet.read.view')
        );
    }

    public function buyPackage($packageUId)
    {
        return $this->responseAction(
            $this->processResponse([
                'reaction_code' => 2,
                'data' => [
                    'show_message' => true,
                    'redirectToWallet' => true,
                ],
                'message' => __tr('Please buy Super Like packages from the Credit Wallet page.'),
            ], [], [], true),
            $this->redirectTo('user.credit_wallet.read.view')
        );
    }
}
