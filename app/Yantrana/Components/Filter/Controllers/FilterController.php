<?php
/**
* FilterController.php - Controller file
*
* This file is part of the Filter component.
*-----------------------------------------------------------------------------*/

namespace App\Yantrana\Components\Filter\Controllers;

use App\Yantrana\Base\BaseController;
use App\Yantrana\Components\Filter\FilterEngine;
use App\Yantrana\Support\CommonUnsecuredPostRequest;

class FilterController extends BaseController
{
    /**
     * @var  FilterEngine - Filter Engine
     */
    protected $filterEngine;

    /**
     * Constructor
     *
     * @param  FilterEngine  $filterEngine - Filter Engine
     * @return  void
     *-----------------------------------------------------------------------*/
    public function __construct(FilterEngine $filterEngine)
    {
        $this->filterEngine = $filterEngine;
    }

    /**
     * Get Filter data and show filter view
     *
     * @param obj CommonUnsecuredPostRequest $request
     *
     * return view
     *-----------------------------------------------------------------------*/
    public function getFindMatches(CommonUnsecuredPostRequest $request)
    {
        $processReaction = $this->filterEngine->processFilterData($request->all());

        if ($request->ajax()) {
            if (!$request->get('page')) {
                // Filter form submit on Find Matches page → refresh results only
                $resultsOnly = $request->get('filter_results_only') == '1'
                    || $request->get('is_advance_filter') == 'yes';

                if ($resultsOnly) {
                    return $this->loadPublicView('filter.find-matches-container', $processReaction['data'], [
                        'replaceElement' => '#lwFindMatchesContainer',
                        'responseData' => [
                            'totalCount' => $processReaction['data']['totalCount'] ?? 0,
                            'hasMorePages' => $processReaction['data']['hasMorePages'] ?? false,
                            'nextPageUrl' => $processReaction['data']['nextPageUrl'] ?? '',
                            'filterCount' => $processReaction['data']['filterCount'] ?? 0,
                            'filterData' => $processReaction['data']['filterData'] ?? [],
                        ],
                    ]);
                }

                // Sidebar / direct navigation → full Find Matches page content
                return $this->loadPublicView('filter.filter', $processReaction['data']);
            }

            return $this->responseAction(
                $this->processResponse($processReaction, [], [], true),
                $this->replaceView('filter.find-matches', $processReaction['data'])
            );
        }

        return $this->loadPublicView('filter.filter', $processReaction['data']);
    }
}
