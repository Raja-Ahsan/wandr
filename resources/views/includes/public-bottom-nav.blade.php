<?php
$bottomNavUnreadMsgCount = getUsersAllConversationCount();
$bottomNavNotificationCount = getNotificationList()['notificationCount'];
$featurePlans = getStoreSettings('feature_plans');
$showLike = $featurePlans['show_like']['select_user'];
?>
<nav class="lw-mobile-bottom-nav d-md-none" id="lwMobileBottomNav" aria-label="<?= __tr('Main navigation') ?>">
    <div class="lw-mobile-bottom-nav-dock">
        <a href="#" class="lw-mobile-bottom-nav-item" onclick="getChatMessenger('<?= route('user.read.all_conversation') ?>', true); return false;" id="lwAllMessageChatButton" data-chat-loaded="false">
            <span class="lw-mobile-bottom-nav-icon">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger lw-mobile-bottom-nav-badge lw-new-message-badge" data-model="totalUnreadMsgCount"><?= ($bottomNavUnreadMsgCount > 0) ? $bottomNavUnreadMsgCount : '' ?></span>
            </span>
            <span class="lw-mobile-bottom-nav-label"><?= __tr('Chat') ?></span>
        </a>

        <a href="<?= route('user.read.find_matches') ?>" class="lw-mobile-bottom-nav-item lw-ajax-link-action lw-action-with-url <?= makeLinkActive('user.read.find_matches') ?>">
            <span class="lw-mobile-bottom-nav-icon"><i class="fas fa-search"></i></span>
            <span class="lw-mobile-bottom-nav-label"><?= __tr('Matches') ?></span>
        </a>

        <a href="<?= route('home_page') ?>" class="lw-mobile-bottom-nav-item lw-mobile-bottom-nav-item--home lw-ajax-link-action lw-action-with-url <?= makeLinkActive('home_page') ?>">
            <span class="lw-mobile-bottom-nav-fab" aria-hidden="true">
                <i class="fas fa-home"></i>
            </span>
            <span class="lw-mobile-bottom-nav-label"><?= __tr('Home') ?></span>
        </a>

        <a href="<?= route('user.credit_wallet.read.view') ?>" class="lw-mobile-bottom-nav-item lw-ajax-link-action lw-action-with-url <?= makeLinkActive('user.credit_wallet.read.view') ?>">
            <span class="lw-mobile-bottom-nav-icon">
                <i class="fas fa-coins"></i>
                <span class="badge badge-success lw-mobile-bottom-nav-badge"><?= totalUserCredits() ?></span>
            </span>
            <span class="lw-mobile-bottom-nav-label"><?= __tr('Wallet') ?></span>
        </a>

        <button type="button" class="lw-mobile-bottom-nav-item lw-mobile-bottom-nav-item--more" id="lwMobileNavMoreBtn" aria-expanded="false" aria-controls="lwMobileNavMorePanel">
            <span class="lw-mobile-bottom-nav-icon"><i class="fas fa-th-large"></i></span>
            <span class="lw-mobile-bottom-nav-label"><?= __tr('More') ?></span>
        </button>
    </div>

    <div class="lw-mobile-bottom-nav-more-overlay" id="lwMobileNavMoreOverlay" aria-hidden="true"></div>
    <div class="lw-mobile-bottom-nav-more-panel" id="lwMobileNavMorePanel" aria-hidden="true">
        <div class="lw-mobile-bottom-nav-more-header">
            <h6 class="mb-0"><?= __tr('Explore') ?></h6>
            <button type="button" class="btn btn-link btn-sm text-light p-0" id="lwMobileNavMoreClose" aria-label="<?= __tr('Close') ?>">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="lw-mobile-bottom-nav-more-grid">
            <a href="#" class="lw-mobile-bottom-nav-more-link" data-toggle="modal" onclick="showBoosterAlert(); return false;">
                <i class="fas fa-bolt"></i>
                <span><?= __tr('Boost') ?></span>
            </a>

            <a href="<?= route('user.profile_view', ['username' => getUserAuthInfo('profile.username')]) ?>" class="lw-mobile-bottom-nav-more-link lw-ajax-link-action lw-action-with-url <?= makeLinkActive('user.profile_view') ?>" data-event-callback="lwPrepareUploadPlugIn">
                <i class="fas fa-user"></i>
                <span><?= __tr('Profile') ?></span>
            </a>

            <a href="<?= route('user.photos_setting', ['username' => getUserAuthInfo('profile.username')]) ?>" class="lw-mobile-bottom-nav-more-link lw-ajax-link-action lw-action-with-url <?= makeLinkActive('user.photos_setting') ?>" data-event-callback="lwPrepareUploadPlugIn">
                <i class="far fa-images"></i>
                <span><?= __tr('Photos') ?></span>
            </a>

            <a href="<?= route('user.who_liked_me_view') ?>" class="lw-mobile-bottom-nav-more-link lw-ajax-link-action lw-action-with-url <?= makeLinkActive('user.who_liked_me_view') ?>">
                <i class="fa fa-thumbs-up"></i>
                <span><?= __tr('Likes') ?></span>
                @if($showLike == 2)
                <span class="lw-mobile-bottom-nav-premium lw-premium-feature-badge" title="{{ __tr('This is Premium feature') }}"></span>
                @endif
            </a>

            <a href="<?= route('user.mutual_like_view') ?>" class="lw-mobile-bottom-nav-more-link lw-ajax-link-action lw-action-with-url <?= makeLinkActive('user.mutual_like_view') ?>">
                <i class="fa fa-users"></i>
                <span><?= __tr('Mutual') ?></span>
            </a>

            <a href="<?= route('user.my_liked_view') ?>" class="lw-mobile-bottom-nav-more-link lw-ajax-link-action lw-action-with-url <?= makeLinkActive('user.my_liked_view') ?>">
                <i class="fas fa-heart"></i>
                <span><?= __tr('My Likes') ?></span>
            </a>

            <a href="<?= route('user.my_disliked_view') ?>" class="lw-mobile-bottom-nav-more-link lw-ajax-link-action lw-action-with-url <?= makeLinkActive('user.my_disliked_view') ?>">
                <i class="fas fa-heart-broken"></i>
                <span><?= __tr('Dislikes') ?></span>
            </a>

            <a href="<?= route('user.profile_visitors_view') ?>" class="lw-mobile-bottom-nav-more-link lw-ajax-link-action lw-action-with-url <?= makeLinkActive('user.profile_visitors_view') ?>">
                <i class="fa fa-user"></i>
                <span><?= __tr('Visitors') ?></span>
            </a>

            <a href="<?= route('user.notification.read.view') ?>" class="lw-mobile-bottom-nav-more-link lw-ajax-link-action lw-action-with-url <?= makeLinkActive('user.notification.read.view') ?>" x-data="{totalNotificationCount:'<?= ($bottomNavNotificationCount > 0) ? $bottomNavNotificationCount : '' ?>'}">
                <i class="fa fa-bell"></i>
                <span><?= __tr('Alerts') ?></span>
                <span class="badge badge-danger lw-mobile-bottom-nav-more-badge" x-text="totalNotificationCount" x-show="totalNotificationCount"></span>
            </a>

            <a href="<?= route('user.read.block_user_list') ?>" class="lw-mobile-bottom-nav-more-link lw-ajax-link-action lw-action-with-url <?= makeLinkActive('user.read.block_user_list') ?>">
                <i class="fas fa-ban"></i>
                <span><?= __tr('Blocked') ?></span>
            </a>
        </div>
    </div>
</nav>
