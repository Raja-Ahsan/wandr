<?php
$pageType = request()->pageType;
$currentRouteName = Route::getCurrentRoute()->getName();
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion lw-admin-sidebar" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center" href="<?= route('user.profile_view', ['username' => getUserAuthInfo('profile.username')]) ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= getStoreSettings('small_logo_image_url') ?>" alt="<?= getStoreSettings('name') ?>">
        </div>
        <img class="lw-logo-img" src="<?= getStoreSettings('logo_image_url') ?>" alt="<?= getStoreSettings('name') ?>">
    </a>
    <div class="sidebar-wrapper">
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?= makeLinkActive('manage.dashboard', $currentRouteName) ?> mt-2">
            <a class="nav-link lw-ajax-link-action lw-action-with-url" href="<?= route('manage.dashboard') ?>">
                <i class="fa-solid fa-gauge-high"></i>
                <span><?= __tr('Dashboard') ?></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= route('landing_page') ?>" title="<?= __tr('View Site') ?>">
                <i class="fa-solid fa-globe"></i>
                <span><?= __tr('View Site') ?></span>
            </a>
        </li>
        <li class="nav-item <?= makeLinkActive('manage.page.view', $currentRouteName) ?>">
            <a class="nav-link lw-ajax-link-action lw-action-with-url" href="<?= route('manage.page.view') ?>">
                <i class="fa-solid fa-file-lines"></i>
                <span><?= __tr('Pages') ?></span>
            </a>
        </li>
        <li class="nav-item <?= makeLinkActive('manage.item.gift.view', $currentRouteName) ?>">
            <a class="nav-link lw-ajax-link-action lw-action-with-url" href="<?= route('manage.item.gift.view') ?>">
                <i class="fa-solid fa-gift"></i>
                <span><?= __tr('Gifts') ?></span>
            </a>
        </li>
        <li class="nav-item <?= makeLinkActive('manage.item.sticker.view', $currentRouteName) ?>">
            <a class="nav-link lw-ajax-link-action lw-action-with-url" href="<?= route('manage.item.sticker.view') ?>">
                <i class="fa-solid fa-note-sticky"></i>
                <span><?= __tr('Stickers') ?></span>
            </a>
        </li>
        <li class="nav-item <?= makeLinkActive('manage.credit_package.read.list', $currentRouteName) ?>">
            <a class="nav-link lw-ajax-link-action lw-action-with-url" href="<?= route('manage.credit_package.read.list') ?>">
                <i class="fa-solid fa-box"></i>
                <span><?= __tr('Credit Packages') ?></span>
            </a>
        </li>
        <li class="nav-item <?= makeLinkActive('manage.super_like_package.read.list', $currentRouteName) ?>">
            <a class="nav-link lw-ajax-link-action lw-action-with-url" href="<?= route('manage.super_like_package.read.list') ?>">
                <i class="fa-solid fa-star"></i>
                <span><?= __tr('Super Like Packages') ?></span>
            </a>
        </li>
        <li class="nav-item <?= makeLinkActive('manage.abuse_report.read.list', $currentRouteName) ?>">
            <a class="nav-link lw-ajax-link-action lw-action-with-url" href="<?= route('manage.abuse_report.read.list', ['status' => 1]) ?>">
                <i class="fa-solid fa-flag"></i>
                <span><?= __tr('Abuse Reports') ?>
                    <div class="d-inline" x-data="{ isShowing: false, reportCount: '' }">
                        <span x-show="isShowing">
                            <div class="badge badge-pill badge-success" x-text="reportCount" style="font-size: 10px;"></div>
                        </span>
                    </div>
                </span>
            </a>
        </li>
        <li class="nav-item <?= makeLinkActive('manage.user.view_list', $currentRouteName) ?>">
            <a class="nav-link lw-ajax-link-action lw-action-with-url" href="<?= route('manage.user.view_list', ['status' => 1]) ?>">
                <i class="fa-solid fa-users"></i>
                <span><?= __tr('Users') ?></span>
            </a>
        </li>
        <li class="nav-item <?= makeLinkActive('manage.user.photos_list', $currentRouteName) ?>">
            <a class="nav-link lw-ajax-link-action lw-action-with-url" href="<?= route('manage.user.photos_list') ?>">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <span><?= __tr('User Uploads') ?></span>
            </a>
        </li>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item lw-settings-sub-menu-items">
            <a class="nav-link <?= makeLinkActive('manage.configuration.read', $currentRouteName, '', 'collapsed') ?>" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="<?= trim(makeLinkActive('manage.configuration.read', $currentRouteName, 'true', 'false')) ?>" aria-controls="collapseUtilities">
                <i class="fa-solid fa-gear"></i>
                <span>{{ __tr('Settings') }}</span>
            </a>
            <div id="collapseUtilities" class="collapse <?= makeLinkActive('manage.configuration.read', $currentRouteName, 'show') ?>" data-parent="#accordionSidebar">
                <div class="collapse-inner rounded">
                    <a class="nav-link lw-ajax-link-action lw-action-with-url {{ $pageType == 'general' ? 'active' : '' }}" href="<?= route('manage.configuration.read', ['pageType' => 'general']) ?>" data-event-callback="lwPrepareUploadPlugIn">
                        <i class="fa-solid fa-wrench"></i>
                        <span><?= __tr('General') ?></span>
                    </a>
                    <a class="nav-link lw-ajax-link-action lw-action-with-url {{ $pageType == 'user' ? 'active' : '' }}" href="<?= route('manage.configuration.read', ['pageType' => 'user']) ?>">
                        <i class="fa-solid fa-user"></i>
                        <span><?= __tr('Users') ?></span>
                    </a>
                    <!-- Currency & Credit Packages -->
                    <a class="nav-link lw-ajax-link-action lw-action-with-url {{ $pageType == 'currency' ? 'active' : '' }}" href="<?= route('manage.configuration.read', ['pageType' => 'currency']) ?>">
                        <i class="fa-solid fa-money-bill-wave"></i>
                        <span> <?= __tr('Currency') ?></span>
                    </a>
                    <!-- /Currency & Credit Packages -->
                    <!-- Payment Settings -->
                    <a class="nav-link lw-ajax-link-action lw-action-with-url {{$pageType == 'payment' ? 'active' : '' }}" href="<?= route('manage.configuration.read', ['pageType' => 'payment']) ?>">
                        <i class="fa-solid fa-credit-card"></i>
                        <span> <?= __tr('Payment Gateways') ?></span>
                    </a>
                    <!-- /Payment Settings -->
                    <!-- Social Login Settings -->
                    <a class="nav-link lw-ajax-link-action lw-action-with-url {{$pageType == 'social-login' ? 'active' : '' }}" href="<?= route('manage.configuration.read', ['pageType' => 'social-login']) ?>">
                        <i class="fa-solid fa-share-nodes"></i>
                        <span><?= __tr('Social Logins') ?></span>
                    </a>
                    <!-- /Social Login Settings -->
                    <!-- Integration Settings -->
                    <a class="nav-link lw-ajax-link-action lw-action-with-url {{$pageType == 'integration' ? 'active' : '' }}" href="<?= route('manage.configuration.read', ['pageType' => 'integration']) ?>">
                        <i class="fa-solid fa-plug"></i>
                        <span><?= __tr('Integrations') ?></span>
                    </a>
                    <!-- /Integration Settings -->
                    <!-- Misc Settings -->
                    <a class="nav-link lw-ajax-link-action lw-action-with-url {{$pageType == 'misc' ? 'active' : '' }}" href="<?= route('manage.configuration.read', ['pageType' => 'misc']) ?>">
                        <i class="fa-solid fa-sliders"></i>
                        <span><?= __tr('Misc') ?></span>

                    </a>
                    <!-- /Misc Settings -->
                    <!-- Premium Plans Settings -->
                    <a class="nav-link lw-ajax-link-action lw-action-with-url {{ $pageType == 'premium-plans' ? 'active' : '' }}" href="<?= route('manage.configuration.read', ['pageType' => 'premium-plans']) ?>">
                        <i class="fa-solid fa-gem"></i>
                        <span><?= __tr('Premium Plans') ?></span>
                    </a>
                    <!-- /Premium Plans Settings -->
                    <!-- Premium Features Settings -->
                    <a class="nav-link lw-ajax-link-action lw-action-with-url {{ $pageType == 'premium-feature' ? 'active' : '' }}" href="<?= route('manage.configuration.read', ['pageType' => 'premium-feature']) ?>">
                        <i class="fa-solid fa-database"></i>
                        <span> <?= __tr('Features') ?></span>
                    </a>
                    <!-- /Premium Features Settings -->
                    <!-- Email Settings -->
                    <a class="nav-link lw-ajax-link-action lw-action-with-url {{ $pageType == 'email' ? 'active' : ''}}" href="<?= route('manage.configuration.read', ['pageType' => 'email']) ?>">
                        <i class="fa-solid fa-envelope-open-text"></i>
                        <span><?= __tr('Email & SMS') ?></span>
                    </a>
                    <!-- /Email Settings -->
                    <!-- Super Like Settings -->
                    <a class="nav-link lw-ajax-link-action lw-action-with-url {{ $pageType == 'super-like' ? 'active' : ''}}" href="<?= route('manage.configuration.read', ['pageType' => 'super-like']) ?>">
                        <i class="fa-solid fa-star"></i>
                        <span><?= __tr('Super Like') ?></span>
                    </a>
                    <!-- /Super Like Settings -->
                    <!-- Booster Settings -->
                    <a class="nav-link lw-ajax-link-action lw-action-with-url {{ $pageType == 'booster' ? 'active' : ''}}" href="<?= route('manage.configuration.read', ['pageType' => 'booster']) ?>">
                        <i class="fa-solid fa-rocket"></i>
                        <span><?= __tr('Booster') ?></span>
                    </a>
                    <!-- /Booster Settings -->
                    <!-- Advertisement Settings -->
                    <a class="nav-link lw-ajax-link-action lw-action-with-url {{ $pageType == 'advertisement' ? 'active' : ''}}" href="<?= route('manage.configuration.read', ['pageType' => 'advertisement']) ?>">
                        <i class="fa-solid fa-rectangle-ad"></i>
                        <span><?= __tr('Advertisement') ?></span>
                    </a>
                    <!-- /Advertisement Settings -->
                    <!-- color settings Settings -->
                    <a class="nav-link lw-ajax-link-action lw-action-with-url {{ $pageType == 'custom-profile-fields' ? 'active' : ''}}" href="<?= route('manage.configuration.read', ['pageType' => 'custom-profile-fields']) ?>">
                        <i class="fa-solid fa-list-check"></i>
                        <span><?= __tr('Custom Profile Fields') ?></span>
                    </a>
                    <!-- /color settings Settings -->
                </div>
            </div>
        </li>
        <li class="nav-item <?= makeLinkActive('manage.financial_transaction.read.view_list', $currentRouteName) ?>">
            <a class="nav-link lw-ajax-link-action lw-action-with-url" href="<?= route('manage.financial_transaction.read.view_list', ['transactionType' => 'live']) ?>">
                <i class="fa-solid fa-building-columns"></i>
                <span><?= __tr('Financial Transactions') ?></span>
            </a>
        </li>
        <li class="nav-item <?= makeLinkActive('manage.translations.languages', $currentRouteName) ?>">
            <a class="nav-link lw-ajax-link-action lw-action-with-url" href="<?= route('manage.translations.languages') ?>">
                <i class="fa-solid fa-language"></i>
                <span><?= __tr('Languages') ?></span>
            </a>
        </li>
        <li class="nav-item <?= makeLinkActive('manage.fake_users.read.generator_options', $currentRouteName) ?>">
            <a class="nav-link lw-ajax-link-action lw-action-with-url" href="<?= route('manage.fake_users.read.generator_options') ?>">
                <i class="fa-solid fa-user-plus"></i>
                <span><?= __tr('Generate Fake Users') ?></span>
            </a>
        </li>
        {{-- Temporarily hidden: Fake User Messenger
        <li class="nav-item <?= makeLinkActive('manage.fake_users.read.messenger', $currentRouteName) ?>">
            <a class="nav-link lw-ajax-link-action lw-action-with-url" href="<?= route('manage.fake_users.read.messenger') ?>">
                <i class="fa-solid fa-comments"></i>
                <span><?= __tr('Fake User Messenger') ?></span>
            </a>
        </li>
        --}}
        {{-- Temporarily hidden: Help References - Emails
        <li class="nav-item <?= makeLinkActive('manage.help.read', $currentRouteName) ?>">
            <a class="nav-link lw-ajax-link-action lw-action-with-url" href="<?= route('manage.help.read') ?>">
                <i class="fa-solid fa-circle-question"></i>
                <span><?= __tr('Help References - Emails') ?></span>
            </a>
        </li>
        --}}
        <li class="nav-item">
            <a class="nav-link" title="<?= __tr("If you have made changes which doesn't reflecting this link may help to clear all the cache.") ?>" href="<?= route('manage.configuration.clear_cache', []) . '?redirectTo=' . base64_encode(Request::fullUrl()); ?>">
                <i class="fa-solid fa-broom"></i>
                <span><?= __tr('Clear System Cache') ?></span>
            </a>
        </li>
        {{-- Temporarily hidden: License + Mobile App
        <li class="nav-item <?= Request::fullUrl() == route('manage.configuration.read', ['pageType' => 'licence-information']) ? 'active' : '' ?>">
            <a class="nav-link" href="<?= route('manage.configuration.read', ['pageType' => 'licence-information']) ?>">
                <i class="fa-solid fa-certificate"></i>
                <span><?= __tr('License') ?></span>
            </a>
        </li>
        <li class="nav-item <?= makeLinkActive('manage.configuration.mobile_app', $currentRouteName) ?>">
            <a class="nav-link lw-ajax-link-action lw-action-with-url" href="<?= route('manage.configuration.mobile_app') ?>">
                <i class="fa-solid fa-mobile-screen-button"></i>
                <span><?= __tr('Mobile App') ?></span>
            </a>
        </li>
        --}}
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </div>
    <!-- Sidebar Toggler (Sidebar) -->
</ul>
<!-- End of Sidebar -->
@push('appScripts')
<script>
    //fetch abuse report counts
    __DataRequest.get("<?= route('abuse_report.get.count') ?>", {}, function(response) {
        if (response.reaction == 1) {
            __DataRequest.updateModels({
                'reportCount': response.data.reportsCount,
                'isShowing': true
            });
        }
    });
</script>
@endpush