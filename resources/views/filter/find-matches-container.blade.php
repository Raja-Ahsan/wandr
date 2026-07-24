<div class="lw-discover-stage<?= __isEmpty($filterData) ? ' lw-swipe-is-empty' : '' ?>">
    <div class="lw-discover-stage-glow" aria-hidden="true"></div>

    <div class="lw-discover-count" data-total="<?= (int) $totalCount ?>">
        <span class="lw-discover-count-icon"><i class="fas fa-fire"></i></span>
        <span class="lw-discover-count-text">
            <?= __trn('__filterCount__ person nearby', '__filterCount__ people to discover', $totalCount, ["__filterCount__" => $totalCount]) ?>
        </span>
    </div>

    {{-- Premium swipe deck --}}
    <?php
        $superLikeQuota = $superLikeQuota ?? getSuperLikeQuotaInfo();
        $superEnabled = !empty($superLikeQuota['enabled']);
        $superBalance = (int) ($superLikeQuota['balance'] ?? 0);
        $superShopUrl = $superLikeQuota['shop_url'] ?? route('user.super_like_package.read.shop');
    ?>
    <div class="lw-swipe-encounter<?= __isEmpty($filterData) ? ' lw-swipe-is-empty' : '' ?>"
        id="lwSwipeEncounter"
        data-like-url="<?= url('user/__UID__/__LIKE__/user-like-dislike') ?>"
        data-profile-url="<?= url('@__USERNAME__') ?>"
        data-super-enabled="<?= $superEnabled ? '1' : '0' ?>"
        data-super-balance="<?= $superBalance ?>"
        data-super-shop-url="<?= e($superShopUrl) ?>"
        data-wallet-url="<?= route('user.credit_wallet.read.view') ?>">

        @if($superEnabled)
        <div class="lw-super-like-quota" id="lwSuperLikeQuota">
            @if($superBalance > 0)
                <i class="fas fa-star"></i>
                <?= __trn('__count__ Super Like left', '__count__ Super Likes left', $superBalance, ['__count__' => $superBalance]) ?>
            @else
                <a href="<?= e($superShopUrl) ?>" class="lw-ajax-link-action lw-action-with-url text-decoration-none">
                    <i class="fas fa-shopping-bag"></i>
                    <?= __tr('Buy Super Likes') ?>
                </a>
            @endif
        </div>
        @endif

        <div class="lw-swipe-deck" id="lwSwipeDeck">
            @if(!__isEmpty($filterData))
                @foreach($filterData as $index => $filter)
                    @if(!empty($filter['_uid']))
                    <div class="lw-swipe-card"
                        data-uid="<?= e($filter['_uid']) ?>"
                        data-username="<?= e($filter['username']) ?>"
                        data-fullname="<?= e($filter['fullName']) ?>"
                        style="z-index: <?= max(1, 1000 - $index) ?>">
                        @if(!empty($filter['isPremiumUser']))
                            <span class="lw-swipe-premium" title="<?= __tr('Premium User') ?>"><i class="fas fa-crown"></i></span>
                        @endif
                        @if(!empty($filter['userOnlineStatus']) && $filter['userOnlineStatus'] == 1)
                            <span class="lw-swipe-online-pill"><?= __tr('Online') ?></span>
                        @endif
                        <div class="lw-swipe-photo" style="background-image: url('<?= e(imageOrNoImageAvailable($filter['profileImage'])) ?>')"></div>
                        <div class="lw-swipe-gradient"></div>
                        <div class="lw-swipe-info">
                            <div class="lw-swipe-name">
                                <a href="<?= route('user.profile_view', ['username' => $filter['username']]) ?>"
                                   class="lw-ajax-link-action lw-action-with-url lw-swipe-profile-link">
                                    <?= e($filter['fullName']) ?><?php if (!empty($filter['userAge'])): ?><span class="lw-swipe-age">, <?= e($filter['userAge']) ?></span><?php endif; ?>
                                </a>
                            </div>
                            <div class="lw-swipe-meta">
                                <?php
                                    $metaBits = array_filter([
                                        $filter['gender'] ?? null,
                                        $filter['countryName'] ?? null,
                                    ]);
                                ?>
                                @if(!empty($metaBits))
                                    <i class="fas fa-map-marker-alt lw-swipe-meta-icon"></i>
                                    <?= e(implode(' · ', $metaBits)) ?>
                                @elseif(!empty($filter['detailString']))
                                    <?= e($filter['detailString']) ?>
                                @endif
                            </div>
                        </div>
                        <div class="lw-swipe-stamp lw-swipe-stamp-like"><?= __tr('LIKE') ?></div>
                        <div class="lw-swipe-stamp lw-swipe-stamp-nope"><?= __tr('NOPE') ?></div>
                        <div class="lw-swipe-stamp lw-swipe-stamp-super"><?= __tr('SUPER') ?></div>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>

        <div class="lw-swipe-empty" id="lwSwipeEmpty" @if(!__isEmpty($filterData)) style="display:none" @endif>
            <div class="lw-swipe-empty-card">
                <div class="lw-swipe-empty-icon"><i class="far fa-heart"></i></div>
                <h3><?= __tr('No more profiles') ?></h3>
                <p><?= __tr('Try adjusting your filters or check back later for new people.') ?></p>
            </div>
        </div>

        <div class="lw-swipe-actions" id="lwSwipeActions" @if(__isEmpty($filterData)) style="display:none" @endif>
            <button type="button" class="lw-swipe-btn lw-swipe-btn-nope" id="lwSwipeNope" title="<?= __tr('Nope') ?>" aria-label="<?= __tr('Nope') ?>">
                <i class="fas fa-times"></i>
            </button>
            <button type="button" class="lw-swipe-btn lw-swipe-btn-super" id="lwSwipeSuper" title="<?= __tr('Super Like') ?>" aria-label="<?= __tr('Super Like') ?>"<?= !$superEnabled ? ' disabled' : '' ?>>
                <i class="fas fa-star"></i>
            </button>
            <button type="button" class="lw-swipe-btn lw-swipe-btn-like" id="lwSwipeLike" title="<?= __tr('Like') ?>" aria-label="<?= __tr('Like') ?>">
                <i class="fas fa-heart"></i>
            </button>
        </div>

        <p class="lw-swipe-hint">
            <span><i class="fas fa-hand-point-left"></i> <?= __tr('Nope') ?></span>
            <span class="lw-swipe-hint-dot"></span>
            <span><i class="fas fa-hand-point-up"></i> <?= __tr('Super') ?></span>
            <span class="lw-swipe-hint-dot"></span>
            <span><i class="fas fa-hand-point-right"></i> <?= __tr('Like') ?></span>
        </p>
    </div>
</div>

{{-- Browse list: full content width --}}
<details class="lw-swipe-browse-list mb-3">
    <summary class="lw-swipe-browse-summary">
        <span class="lw-swipe-browse-summary-label"><?= __tr('Browse as list') ?></span>
        <span class="lw-swipe-browse-summary-hint"><?= __tr('Grid view') ?></span>
    </summary>
    <div class="row row-cols-sm-1 row-cols-md-3 row-cols-lg-6 row-cols-xl-8 mt-3 lw-discover-grid" id="lwUserFilterContainer">
        @if(!__isEmpty($filterData))
            @include('filter.find-matches')
        @endif
    </div>
</details>

@if($hasMorePages)
<div class="lw-load-more-container lw-discover-load-more">
    <button type="button" class="btn btn-dark btn-block lw-ajax-link-action" id="lwLoadMoreButton" data-action="<?= $nextPageUrl ?>" data-event-callback="onLoadMoreFilterUsers" data-callback="loadMoreUsers"><?= __tr('Load more') ?></button>
</div>
@endif
<div id="lwLoadMoreResultMessage" style="display:none" class="col-sm-12 col-md-12 col-lg-12 alert alert-dark text-center bg-dark text-secondary border-0 mt-5"><?= __tr('Looks like you reached the end.') ?></div>
