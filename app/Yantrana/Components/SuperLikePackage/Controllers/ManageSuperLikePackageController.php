<?php
/**
 * ManageSuperLikePackageController.php - Admin controller
 */

namespace App\Yantrana\Components\SuperLikePackage\Controllers;

use App\Yantrana\Base\BaseController;
use App\Yantrana\Components\SuperLikePackage\Requests\SuperLikePackageAddRequest;
use App\Yantrana\Components\SuperLikePackage\Requests\SuperLikePackageEditRequest;
use App\Yantrana\Components\SuperLikePackage\SuperLikePackageEngine;

class ManageSuperLikePackageController extends BaseController
{
    protected $superLikePackageEngine;

    public function __construct(SuperLikePackageEngine $superLikePackageEngine)
    {
        $this->superLikePackageEngine = $superLikePackageEngine;
    }

    public function getPackageList()
    {
        $processReaction = $this->superLikePackageEngine->preparePackageList();

        return $this->loadManageView('super-like-package.manage.list', $processReaction['data']);
    }

    public function packageAddView()
    {
        return $this->loadManageView('super-like-package.manage.add');
    }

    public function addPackage(SuperLikePackageAddRequest $request)
    {
        $processReaction = $this->superLikePackageEngine->processAddNewPackage($request->all());

        if ($processReaction['reaction_code'] === 1) {
            return $this->responseAction(
                $this->processResponse($processReaction, [], [], true),
                $this->redirectTo('manage.super_like_package.read.list')
            );
        }

        return $this->responseAction(
            $this->processResponse($processReaction, [], [], true)
        );
    }

    public function packageEditView($packageUId)
    {
        $processReaction = $this->superLikePackageEngine->preparePackageUpdateData($packageUId);

        return $this->loadManageView('super-like-package.manage.edit', $processReaction['data']);
    }

    public function editPackage(SuperLikePackageEditRequest $request, $packageUId)
    {
        $processReaction = $this->superLikePackageEngine->processEditPackage($request->all(), $packageUId);

        if ($processReaction['reaction_code'] === 1) {
            return $this->responseAction(
                $this->processResponse($processReaction, [], [], true),
                $this->redirectTo('manage.super_like_package.read.list')
            );
        }

        return $this->responseAction(
            $this->processResponse($processReaction, [], [], true)
        );
    }

    public function processDeletePackage($packageUId)
    {
        $processReaction = $this->superLikePackageEngine->processDeletePackage($packageUId);

        return $this->responseAction(
            $this->processResponse($processReaction, [], [], true),
            $this->redirectTo('manage.super_like_package.read.list')
        );
    }
}
