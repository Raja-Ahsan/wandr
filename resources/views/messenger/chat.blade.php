<div class="lw-messenger<?= __isEmpty($messengerUsers) ? ' lw-messenger-no-chats' : '' ?>" id="lwMessengerRoot"
    data-send-message-url="<?= route('user.write.send_message', ['userId' => 'userId']) ?>"
    data-buy-sticker-url="<?= route('user.write.buy_stickers') ?>"
    data-giphy-key="<?= getStoreSettings('giphy_key') ?>"
    data-logged-in-user-profile-picture="<?= $currentUserData['logged_in_user_profile_picture'] ?>"
    data-logged-in-user-uid="<?= getUserUID() ?>"
    data-pusher-app-key="<?= getStoreSettings('pusher_app_key') ?>">
    <div class="row">
        <div class="lw-messenger-sidebar col-md-4 p-0 pl-3 pr-1 ">
            <div class="lw-messenger-header shadow">
                <img data-src="<?= imageOrNoImageAvailable($currentUserData['logged_in_user_profile_picture']) ?>"  class="lw-profile-picture lw-online lw-photoswipe-gallery-img lw-lazy-img" alt="" >
                <div class="align-self-center lw-profile-name">
                    <?= $currentUserData['logged_in_user_full_name'] ?>
                    <div class="w-100 text-muted">
                        <small>
                            <?= Str::limit($currentUserData['logged_in_user_about_me'], 15) ?>
                        </small>
                    </div>
                </div>
            </div>
            <div class="lw-messenger-contact-list">
                <div class="lw-messenger-contact-search">
                    <input type="text" id="lwFilterUsers" class="form-control text-dark" placeholder="<?= __tr("Type to filter") ?>">
                </div>
                <div class="list-group list-group-flush">
                    <!-- Check if messenger users exists -->
                    @if(!__isEmpty($messengerUsers))
                    @foreach($messengerUsers as $messengerUser)
                    <a href="#" class="list-group-item list-group-item-action lw-ajax-link-action lw-user-chat-list" data-action="<?= route('user.read.user_conversation', ['userId' => $messengerUser['user_id']]) ?>" id="<?= $messengerUser['user_id'] ?>" data-callback="userChatResponse">
                        @if($messengerUser['is_online'] == 1)
                        <span class="lw-contact-status lw-online"></span>
                        @elseif($messengerUser['is_online'] == 2)
                        <span class="lw-contact-status lw-away"></span>
                        @elseif($messengerUser['is_online'] == 3)
                        <span class="lw-contact-status lw-offline"></span>
                        @endif

                        <img data-src="<?= imageOrNoImageAvailable($messengerUser['profile_picture']) ?>" class="lw-profile-picture lw-online lw-lazy-img lw-photoswipe-gallery-img" alt="">
                        <?= $messengerUser['user_full_name'] ?>
                        <span class="badge badge-pill badge-success lw-incoming-message-count-<?= $messengerUser['user_id'] ?>" data-model="usersUnreadMessageCount<?= $messengerUser['user_id'] ?>"><?= $messengerUser['unreadMsgCount'] ?></span>
                    </a>
                    @endforeach
                    @else
                    <div class="lw-messenger-sidebar-empty text-center p-4">
                        <i class="far fa-comments fa-2x text-muted mb-2"></i>
                        <p class="text-muted mb-0 small"><?= __tr('No conversations yet') ?></p>
                    </div>
                    @endif
                    <!-- /Check if messenger users exists -->
                </div>
            </div>
        </div>
        <div class="lw-messenger-content col-md-8" id="lwUserConversationContainer">
            @if(__isEmpty($messengerUsers))
            <div class="lw-messenger-empty-state">
                <div class="lw-messenger-empty-state-inner">
                    <span class="lw-messenger-empty-icon"><i class="far fa-comments"></i></span>
                    <h5><?= __tr('Your messages') ?></h5>
                    <p><?= __tr('To start chatting, visit a profile and tap the message icon.') ?></p>
                    <a href="<?= route('user.read.find_matches') ?>" id="lwMessengerFindMatchesBtn" class="btn btn-primary btn-sm lw-ajax-link-action lw-action-with-url mt-3" data-title="<?= __tr('Find Matches') ?>">
                        <i class="fas fa-search mr-1"></i><?= __tr('Find Matches') ?>
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>