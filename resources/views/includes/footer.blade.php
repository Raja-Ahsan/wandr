<!-- Footer -->
<footer class="sticky-footer bg-dark">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span><?= __tr('Copyright © __storeName__ __copyrightYear__', [
                        '__storeName__' => getStoreSettings('name'),
                        '__copyrightYear__' => date('Y')
                    ]) ?> </span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

<!-- Messenger Dialog -->
<div class="modal fade" id="messengerDialog" tabindex="-1" role="dialog" aria-labelledby="messengerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button id="lwChatSidebarToggle" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <h5 class="modal-title">
                    <?= __tr('Chat') ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?= __tr('Close') ?>"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div id="lwChatDialogLoader" style="display: none;">
                    <div class="d-flex justify-content-center m-5">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">
                                <?= __tr('Loading...') ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="lwMessengerContent"></div>
            </div>
        </div>
    </div>
</div>
<!-- Messenger Dialog -->
<img src="<?= asset('imgs/ajax-loader.gif') ?>" style="height:1px;width:1px;">
<div class="col-12 text-center" id="bonusCreditsImg" style="display: none">
    <img class="mx-auto d-block" src="<?= asset('imgs/credits_payment_profit.png') ?>"
        alt="loader" style="height: 200px;">
        <h2 class="credits-display-text" style=""></h2>
</div>

<script>
    window.appConfig = {
        debug: "<?= config('app.debug') ?>",
        csrf_token: "<?= csrf_token() ?>",
        locale: "<?= config('app.locale') ?>"
    }
</script>

<?= __yesset([
    'dist/js/confetti.js',
    'dist/pusher-js/pusher.min.js',
    'dist/js/vendorlibs-public.js',
    'dist/js/vendorlibs-datatable.js',
    'dist/js/vendorlibs-photoswipe.js',
    'dist/js/vendorlibs-smartwizard.js',
    'dist/push-js/push.min.js'
], true) ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.textcomplete/1.8.5/jquery.textcomplete.min.js" integrity="sha512-7DIA0YtDMlg4BW1e0pXjd96R5zJwK8fJullbvGWbuvkCYgEMkME0UFfeZIGfQGYjSwCSeFRG5MIB5lhhEvKheg==" crossorigin="anonymous"></script>
@stack('footer')
<script>
    (function() {
        $.validator.messages = $.extend({}, $.validator.messages, {
            required: '<?= __tr("This field is required.") ?>',
            remote: '<?= __tr("Please fix this field.") ?>',
            email: '<?= __tr("Please enter a valid email address.") ?>',
            url: '<?= __tr("Please enter a valid URL.") ?>',
            date: '<?= __tr("Please enter a valid date.") ?>',
            dateISO: '<?= __tr("Please enter a valid date (ISO).") ?>',
            number: '<?= __tr("Please enter a valid number.") ?>',
            digits: '<?= __tr("Please enter only digits.") ?>',
            equalTo: '<?= __tr("Please enter the same value again.") ?>',
            maxlength: $.validator.format('<?= __tr("Please enter no more than {0} characters.") ?>'),
            minlength: $.validator.format('<?= __tr("Please enter at least {0} characters.") ?>'),
            rangelength: $.validator.format('<?= __tr("Please enter a value between {0} and {1} characters long.") ?>'),
            range: $.validator.format('<?= __tr("Please enter a value between {0} and {1}.") ?>'),
            max: $.validator.format('<?= __tr("Please enter a value less than or equal to {0}.") ?>'),
            min: $.validator.format('<?= __tr("Please enter a value greater than or equal to {0}.") ?>'),
            step: $.validator.format('<?= __tr("Please enter a multiple of {0}.") ?>')
        });
    })();
</script>
<?= __yesset([
    'dist/css/lw-swal-fix.css',
    'dist/js/lw-ajax-swal.js',
    'dist/js/common-app*.js'
], true) ?>
<script>
    __Utils.setTranslation({
        'processing': "<?= __tr('processing') ?>",
        'uploader_default_text': "<span class='filepond--label-action'><?= __tr('Drag & Drop Files or Browse') ?></span>",
        'gif_no_result': "<?= __tr('Result Not Found') ?>",
        "message_is_required": "<?= __tr('Message is required') ?>",
        "sticker_name_label": "<?= __tr('Stickers') ?>",
        "chat_placeholder": "<?= __tr('type message...') ?>",
        "search_gif": "<?= __tr('Search GIF') ?>",
        "send_gif": "<?= __tr('Send GIF') ?>",
        "confirmation_yes": "{{ __tr('Yes') }}",
        "confirmation_no": "{{ __tr('No') }}",
        "now": "<?= __tr('Now') ?>",
        "buy_now": "<?= __tr('Buy Now') ?>",
        "purchased": "<?= __tr('Purchased') ?>",
        "loading_please_wait": "<?= __tr('loading ... please wait') ?>",
    });

    var userLoggedIn = '<?= isLoggedIn() ?>',
        enablePusher = '<?= getStoreSettings('allow_pusher') ?>',
        isAdmin = '<?= isAdmin() ?>';

    if (userLoggedIn && enablePusher) {
        var userUid = '<?= getUserUID() ?>',
            pusherAppKey = '<?= getStoreSettings('pusher_app_key') ?>',
            __pusherAppOptions = {
                cluster: '<?= getStoreSettings('pusher_app_cluster_key') ?>',
                forceTLS: true,
            };
            var channelId2 = '';
            if(isAdmin == true){
               channelId2 = '<?= configItem('admin_receiver_channel') ?>';
            }

    }
</script>
@if(isLoggedIn())
<!-- Include Audio Video Call Component -->
@include('messenger.audio-video')
<!-- /Include Audio Video Call Component -->
<!-- caller ringtone -->
<audio id="lwMessageAlertTone">
	<source src="<?= asset('/imgs/audio/message-tone.mp3'); ?>" type="audio/mpeg">
</audio>
<!-- /caller ringtone -->
<script>
    function lwUpdateUnreadMessageBadge(count, options) {
        options = options || {};
        var parsedCount = parseInt(count, 10);
        var badgeCount = '';

        if (!isNaN(parsedCount) && parsedCount > 0) {
            badgeCount = parsedCount;
        } else if (options.incrementIfMissing) {
            var currentCount = parseInt($('[data-model="totalUnreadMsgCount"].lw-new-message-badge').first().text(), 10) || 0;
            badgeCount = currentCount + 1;
        }

        __DataRequest.updateModels({
            totalUnreadMsgCount: badgeCount > 0 ? badgeCount : ''
        });
    }

    //check user loggedIn or not
    if (userLoggedIn && enablePusher) {
        subscribeNotification('event.user.notification', pusherAppKey, userUid, null, function(responseData) {
            //get notification list
            var requestData = responseData.getNotificationList,
                getNotificationList = requestData.notificationData,
                getNotificationCount = requestData.notificationCount;
            //update notification count
            __DataRequest.updateModels({
                'totalNotificationCount':getNotificationCount > 0 ? getNotificationCount:'' , //total notification count
            });
            //check is not empty
            if (!_.isEmpty(getNotificationList)) {
                var template = _.template($("#lwNotificationListTemplate").html());
                $("#lwNotificationContent").html(template({
                    'notificationList': getNotificationList,
                }));
            }
            //check is not empty
            if (responseData) {
                switch (responseData.type) {
                    case 'user-likes':
                        if (responseData.showNotification != 0) {
                            showSuccessMessage(responseData.message);
                        }
                        break;
                    case 'user-gift':
                        if (responseData.showNotification != 0) {
                            showSuccessMessage(responseData.message);
                        }
                        break;
                    case 'profile-visitor':
                        if (responseData.showNotification != 0) {
                            showSuccessMessage(responseData.message);
                        }
                        break;
                    case 'user-login':
                        if (responseData.showNotification != 0) {
                            showSuccessMessage(responseData.message);
                        }
                        break;
                    default:
                        showSuccessMessage(responseData.message);
                        break;
                }
            }
        });
        if (!Push.Permission.has()) {
            Push.Permission.request();
        }

    navigator.serviceWorker.register("{{ asset('dist/push-js/serviceWorker.min.js') }}");
        var isWindowTabActive = true;
        $(window).on("blur focus", function(e) {
            var prevType = $(this).data("prevType");
            if (prevType != e.type) {   //  reduce double fire issues
                switch (e.type) {
                    case "blur":
                        isWindowTabActive = false;
                        break;
                    case "focus":
                        isWindowTabActive = true;
                        break;
                }
            }
            $(this).data("prevType", e.type);
        });

        subscribeNotification('event.user.chat.messages', pusherAppKey, userUid, channelId2, function(responseData) {
            // console.log(responseData);
            var messengerDialogVisibility = $("#messengerDialog").is(':visible');
                //users total unread message count
                var totalUnreadMsgCount=responseData.totalUnreadMsgCount;
            //users unread message count
            var newUnreadMessagecount=responseData.usersUnreadMessageCount;
            // Message chat
            if (responseData.requestFor == 'MESSAGE_CHAT') {
              
                if(!isAdmin){
                  //show new msg badge
                  if ((!messengerDialogVisibility || responseData.userId != currentSelectedUserId)) {
                lwUpdateUnreadMessageBadge(totalUnreadMsgCount, { incrementIfMissing: true });
                }

                    if (currentSelectedUserUid == responseData.toUserUid) {
                        __Messenger.appendReceivedMessage(responseData.type, responseData.message, responseData.createdOn);
                        if (messengerDialogVisibility) {
                         //to update count after readi if modal is opened

                      var userId = responseData.userId
                        ;
                        var receiverUrl = __Utils.apiURL("<?= route('user.update.user_conversation', ['userId' => 'userId']) ?>", {'userId': userId,
                       });
                       __DataRequest.get(receiverUrl, {}, function(responseData) {
                      });

                       }
                    }
                    // Set user message count
                    if (responseData.userId != currentSelectedUserId) {
                        var incomingMsgEl = $('.lw-incoming-message-count-' + responseData.userId),
                        messageCount = newUnreadMessagecount; //updated msg count

                        incomingMsgEl.text(messageCount);
                        $('.lw-messenger-contact-list .list-group.list-group-flush').prepend($('a.lw-user-chat-list#' + responseData.userId));
                        $('a.lw-user-chat-list#' + responseData.userId +' .lw-contact-status').removeClass('lw-away lw-offline').addClass('lw-online');
                    }

                    // Show notification of incoming messages
                    if (!messengerDialogVisibility && responseData.showNotification) {
                        showSuccessMessage(responseData.notificationMessage);
                    }
                }
                if(isAdmin){
                     //to remove fake user notification from admins public side
                     if(!(responseData.isFake) && (isAdmin) ){
                        if ((!messengerDialogVisibility || responseData.userId != currentSelectedUserId)) {
                            lwUpdateUnreadMessageBadge(totalUnreadMsgCount, { incrementIfMissing: true });
                        }

                     }
                    
                    if (currentSelectedUserUid == responseData.toUserUid && optionalLoggedInUserId == responseData.receiverUserId) {
                        __Messenger.appendReceivedMessage(responseData.type, responseData.message, responseData.createdOn);
                        if (messengerDialogVisibility) {
                         //to update count after readi if modal is opened

                      var userId = responseData.userId
                        ;
                        var receiverUrl = __Utils.apiURL("<?= route('user.update.user_conversation', ['userId' => 'userId']) ?>", {'userId': userId,
                       });
                       __DataRequest.get(receiverUrl, {}, function(responseData) {
                      });

                       }
                    }
                    // Set user message count
                    if (responseData.userId != currentSelectedUserId) {
                      

                        var incomingMsgForUser = $('.lw-incoming-message-count-' + responseData.userId),
                        personalMessageCount = newUnreadMessagecount;
                        incomingMsgForUser.text(personalMessageCount);
                      
                        $('.lw-messenger-contact-list .list-group.list-group-flush').prepend($('a.lw-user-chat-list#' + responseData.userId));
                        $('a.lw-user-chat-list#' + responseData.userId +' .lw-contact-status').removeClass('lw-away lw-offline').addClass('lw-online');
                    }

                    if(optionalLoggedInUserId != responseData.receiverUserId){
                        var incomingMsgEl = $('.lw-fake-user-incoming-message-count-' + responseData.receiverUserId),
                        messageCount = 1;
                        if (!_.isEmpty(incomingMsgEl.text())) {
                            messageCount = parseInt(incomingMsgEl.text()) + 1;
                        }

                        incomingMsgEl.text(messageCount);
                    }

                    $('.lw-fake-user-messenger-list .list-group.list-group-flush').prepend($('a.lw-fake-user-chat-list#' + responseData.receiverUserId));
                    $('a.lw-fake-user-chat-list#' + responseData.receiverUserId +' .lw-contact-status').removeClass('lw-away lw-offline').addClass('lw-online');

                    // Show notification of incoming messages
                    if ((!messengerDialogVisibility && responseData.showNotification)  && !(responseData.isFake)) {
                        showSuccessMessage(responseData.notificationMessage);
                    }
                }
            }

            // Message request
            if (responseData.requestFor == 'MESSAGE_REQUEST') {
              
                  //get notification list
            var requestData = responseData.getNotificationList,
                getNotificationList = requestData.notificationData,
                getNotificationCount = requestData.notificationCount;
           

                if(!isAdmin){
                     //update notification count
            __DataRequest.updateModels({
                'totalNotificationCount': getNotificationCount > 0 ? getNotificationCount:'', //msg request notification count
            });
             //check is not empty
             if (!_.isEmpty(getNotificationList)) {
                var template = _.template($("#lwNotificationListTemplate").html());
                $("#lwNotificationContent").html(template({
                    'notificationList': getNotificationList,
                }));
            }
                      //manage badge when user accepted msg request
                if(responseData.messageRequestStatus == 'MESSAGE_REQUEST_RECEIVED')
            {
               if ((!messengerDialogVisibility || responseData.userId != currentSelectedUserId) ) {
                lwUpdateUnreadMessageBadge(totalUnreadMsgCount, { incrementIfMissing: true });
               }
            }
                    if (responseData.userId == currentSelectedUserId) {
                        handleMessageActionContainer(responseData.messageRequestStatus, false);
                        if (!_.isEmpty(responseData.message)) {
                            __Messenger.appendReceivedMessage(responseData.type, responseData.message, responseData.createdOn);
                        }
                    } else {
                        // Show notification of incoming messages
                        if (!messengerDialogVisibility && responseData.showNotification) {
                            showSuccessMessage(responseData.notificationMessage);
                        }
                    }
                }
                else if(isAdmin){
                //to remove fake user notification from
                if(!(responseData.isFake) && (isAdmin)){
                                        //check is not empty
                            if (!_.isEmpty(getNotificationList)) {
                                var template = _.template($("#lwNotificationListTemplate").html());
                                $("#lwNotificationContent").html(template({
                                    'notificationList': getNotificationList,
                                }));
                            }
                      __DataRequest.updateModels({
                   'totalNotificationCount':getNotificationCount > 0 ? getNotificationCount : '',
                    });
                     //manage badge when user accepted msg request
                            if(responseData.messageRequestStatus == 'MESSAGE_REQUEST_RECEIVED')
                        {
                        if ((!messengerDialogVisibility || responseData.userId != currentSelectedUserId)) {
                            lwUpdateUnreadMessageBadge(totalUnreadMsgCount, { incrementIfMissing: true });
                        }
                        }

                     }
                    if (responseData.userId == currentSelectedUserId && optionalLoggedInUserId == responseData.receiverUserId) {
                        handleMessageActionContainer(responseData.messageRequestStatus, false);
                        if (!_.isEmpty(responseData.message)) {
                            __Messenger.appendReceivedMessage(responseData.type, responseData.message, responseData.createdOn);
                        }
                    } else {
                        // Show notification of incoming messages
                        if ((!messengerDialogVisibility && responseData.showNotification) && !(responseData.isFake)) {
                            showSuccessMessage(responseData.notificationMessage);
                        }
                    }
                }
            }

            if ((!messengerDialogVisibility || !isWindowTabActive) && _.get(responseData, 'showNotification', true)) {
                // play notification message alert
                $("#lwMessageAlertTone")[0].play();
                // check for the push notifications
                // Push.clear();
                if (!isWindowTabActive) {
                    Push.create("{{ __tr('New Message Received') }}", {
                        body: _.get(responseData, 'notificationMessage', "{{ __tr('__siteName__ message alert!', [
                            '__siteName__' => getStoreSettings('name')
                        ]) }}"),
                        icon: "{{ getStoreSettings('small_logo_image_url') }}",
                        // timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                }
            }
        });

        subscribeNotification('event.user.credit', pusherAppKey, userUid, null, function(responseData) {
            // console.log(responseData);
            $('.credits-display-text').text(responseData.credits);
            if(responseData.messageType == 'success'){
                __DataRequest.get("<?= route('update.log') ?>", {}, function(responseData) {});
            }
            $("#lwTotalCreditWalletAmt").html(parseInt($("#lwTotalCreditWalletAmt").text()) + parseInt(responseData.credits));
            creditBadgeShow();
        });
    };

    //for cookie terms 
    function showCookiePolicyDialog() {
        if (__Cookie.get('cookie_policy_terms_accepted') != '1') {
            $('#lwCookiePolicyContainer').show();
        } else {
            $('#lwCookiePolicyContainer').hide();
        }
    };

    showCookiePolicyDialog();

    $("#lwCookiePolicyButton").on('click', function() {
        __Cookie.set('cookie_policy_terms_accepted', '1', 1000);
        showCookiePolicyDialog();
    });

    // Get messenger chat data
    function getChatMessenger(url, isAllChatMessenger) {
        var $allMessageChatButtonEl = $('#lwAllMessageChatButton'),
            $lwMessageChatButtonEl = $('#lwMessageChatButton');

        if (isAllChatMessenger) {
            $lwMessageChatButtonEl.attr('data-chat-loaded', false);
            fetchChatMessages(url, true);
            return;
        }

        var isMessengerLoaded = $lwMessageChatButtonEl.data('chat-loaded');
        if (!isMessengerLoaded) {
            $lwMessageChatButtonEl.attr('data-chat-loaded', true);
            $allMessageChatButtonEl.attr('data-chat-loaded', false);
            fetchChatMessages(url, false);
        }
    };

    function lwIsMessengerMobileView() {
        return window.matchMedia('(max-width: 767px)').matches;
    }

    function lwApplyMessengerConfig() {
        var $root = $('#lwMessengerRoot');
        if (!$root.length || typeof __Messenger === 'undefined') {
            return;
        }
        __Messenger.sendMessageRawUrl = $root.data('sendMessageUrl');
        __Messenger.buyStickerUrl = $root.data('buyStickerUrl');
        __Messenger.giphyKey = $root.data('giphyKey');
        __Messenger.loggedInUserProfilePicture = $root.data('loggedInUserProfilePicture');
        __Messenger.loggedInUserUid = $root.data('loggedInUserUid');
        __Messenger.pusherAppKey = $root.data('pusherAppKey');
    }

    function lwOpenMessengerSidebarOnMobile() {
        if (!lwIsMessengerMobileView()) {
            return;
        }
        var $messenger = $('#lwMessengerRoot');
        if ($messenger.length && $messenger.find('.lw-user-chat-list').length) {
            $messenger.addClass('lw-messenger-sidebar-opened');
        }
    }

    function lwCloseMessengerSidebarOnMobile() {
        $('#lwMessengerRoot').removeClass('lw-messenger-sidebar-opened');
    }

    function lwBindMessengerGlobalEvents() {
        if (window.__lwMessengerEventsBound) {
            return;
        }
        window.__lwMessengerEventsBound = true;

        $(document).on('click', '#lwChatSidebarToggle', function(e) {
            e.preventDefault();
            if (typeof __Messenger !== 'undefined') {
                __Messenger.toggleSidebarOnMobileView();
            }
        });

        $(document).on('click', '#lwMessengerRoot .lw-user-chat-list', function(e) {
            if ($(this).hasClass('active')) {
                e.stopImmediatePropagation();
                return false;
            }
            $('#lwMessengerContent .lw-messenger-contact-list a.active').removeClass('active');
            $(this).addClass('active');
            lwCloseMessengerSidebarOnMobile();
            var incomingMsgEl = $('.lw-incoming-message-count-' + $(this).attr('id'));
            if (incomingMsgEl.length && incomingMsgEl.text()) {
                incomingMsgEl.text('');
            }
        });

        $(document).on('keyup', '#lwFilterUsers', function() {
            var filterQuery = $(this).val().toLowerCase();
            $('#lwMessengerRoot .lw-messenger-contact-list a.lw-user-chat-list').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(filterQuery) > -1);
            });
        });

        $('#messengerDialog').on('hidden.bs.modal', function() {
            lwCloseMessengerSidebarOnMobile();
        });
    }

    function lwInitMessengerPanel(options) {
        options = options || {};
        lwBindMessengerGlobalEvents();
        lwApplyMessengerConfig();

        var $messenger = $('#lwMessengerRoot');
        if (!$messenger.length) {
            return;
        }

        var hasChatWindow = $('#lwUserConversationContainer .lw-messenger-chat-window').length > 0;
        if (lwIsMessengerMobileView() && !hasChatWindow && $messenger.find('.lw-user-chat-list').length) {
            lwOpenMessengerSidebarOnMobile();
        }

        if (options.autoSelectFirst) {
            lwOpenHeaderConversationList();
        }
    }

    lwBindMessengerGlobalEvents();

    function lwOpenHeaderConversationList() {
        var $firstContact = $('#lwMessengerContent .lw-user-chat-list').first();
        if ($firstContact.length && typeof __DataRequest !== 'undefined') {
            $('#lwMessengerContent .lw-messenger-contact-list a.active').removeClass('active');
            $firstContact.addClass('active');
            __DataRequest.process($firstContact);
            lwCloseMessengerSidebarOnMobile();
        }
    }

    function lwCloseMessengerDialog() {
        var $dialog = $('#messengerDialog');
        if (!$dialog.length) {
            return;
        }
        $dialog.modal('hide');
        $('body').removeClass('modal-open').css('padding-right', '');
        $('.modal-backdrop').remove();
    }

    var lwCloseMessengerAfterFindMatches = false;

    $(document).on('click', '.lw-mobile-bottom-nav-item.lw-ajax-link-action', function() {
        $('.lw-mobile-bottom-nav-item').removeClass('active');
        $(this).addClass('active');
        lwCloseMobileNavMorePanel();
    });

    function lwCloseMobileNavMorePanel() {
        $('#lwMobileNavMorePanel, #lwMobileNavMoreOverlay').removeClass('lw-open');
        $('#lwMobileNavMoreBtn').removeClass('active').attr('aria-expanded', 'false');
        $('#lwMobileNavMorePanel').attr('aria-hidden', 'true');
    }

    function lwOpenMobileNavMorePanel() {
        $('#lwMobileNavMorePanel, #lwMobileNavMoreOverlay').addClass('lw-open');
        $('#lwMobileNavMoreBtn').addClass('active').attr('aria-expanded', 'true');
        $('#lwMobileNavMorePanel').attr('aria-hidden', 'false');
    }

    $(document).on('click', '#lwMobileNavMoreBtn', function(e) {
        e.preventDefault();
        if ($('#lwMobileNavMorePanel').hasClass('lw-open')) {
            lwCloseMobileNavMorePanel();
        } else {
            lwOpenMobileNavMorePanel();
        }
    });

    $(document).on('click', '#lwMobileNavMoreOverlay, #lwMobileNavMoreClose', function() {
        lwCloseMobileNavMorePanel();
    });

    $(document).on('click', '.lw-mobile-bottom-nav-more-link', function() {
        lwCloseMobileNavMorePanel();
    });

    $(document).on('click', '#messengerDialog #lwMessengerFindMatchesBtn', function() {
        lwCloseMessengerAfterFindMatches = true;
    });

    $(document).on('lw_events_ajax_success_replace', function() {
        if (!lwCloseMessengerAfterFindMatches) {
            return;
        }
        lwCloseMessengerAfterFindMatches = false;
        lwCloseMessengerDialog();
    });

    // Fetch messages from server
    function fetchChatMessages(url, isAllChatMessenger) {
        $('#lwChatDialogLoader').show();
        $('#lwMessengerContent').hide();

        __DataRequest.get(url, {}, function() {
            _.defer(function() {
                $('#lwChatDialogLoader').hide();
                var hasConversations = $('#lwMessengerContent .lw-user-chat-list').length > 0;

                if (isAllChatMessenger && !hasConversations) {
                    $('#lwMessengerContent').show();
                    $('#messengerDialog').modal('show');
                    lwInitMessengerPanel();
                    return;
                }

                $('#lwMessengerContent').show();

                if (isAllChatMessenger) {
                    $('#messengerDialog').modal('show');
                }

                lwInitMessengerPanel({
                    autoSelectFirst: hasConversations
                });
            });
        });
    };
</script>
@endif
<script>
    $.extend( $.fn.dataTable.defaults, {
                "language"        : {
                    "decimal":        "",
                    "emptyTable":     '<?= __tr("No data available in table") ?>',
                    "info":           '<?= __tr("Showing _START_ to _END_ of _TOTAL_ entries") ?>',
                    "infoEmpty":      "<?= __tr('Showing 0 to 0 of 0 entries') ?>",
                    "infoFiltered":   "<?= __tr('(filtered from _MAX_ total entries)') ?>",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "<?= __tr('Show _MENU_ entries') ?>",
                    "loadingRecords": "<?= __tr('Loading...') ?>",
                    "processing":     '<?= __tr("Processing...") ?>',
                    "search":         "<?= __tr('Search:') ?>",
                    "zeroRecords":    "<?= __tr('No matching records found') ?>",
                    "paginate": {
                        "first":      "<?= __tr('First') ?>",
                        "last":       "<?= __tr('Last') ?>",
                        "next":      "<?= __tr('Next') ?>",
                        "previous":   "<?= __tr('Previous') ?>"
                    },
                    "aria": {
                        "sortAscending":  "<?= __tr(': activate to sort column ascending') ?>",
                        "sortDescending": "<?= __tr(': activate to sort column descending') ?>"
                    }
                    }
            });
</script>
<script>
    (function () {
        function lwReparentModalsToBody() {
            if (typeof jQuery === 'undefined') {
                return;
            }
            jQuery('#wrapper .modal, #content-wrapper .modal, #content .modal, .lw-page-content .modal').each(function () {
                if (this.parentElement && this.parentElement !== document.body) {
                    jQuery(this).appendTo('body');
                }
            });
        }

        if (typeof jQuery !== 'undefined') {
            jQuery(function () {
                lwReparentModalsToBody();
                jQuery(document).on('show.bs.modal', '.modal', function () {
                    if (this.parentElement && this.parentElement !== document.body) {
                        jQuery(this).appendTo('body');
                    }
                });
                jQuery(document).on('lw_events_ajax_success_replace lw_events_ajax_start_replace', lwReparentModalsToBody);
            });
        }
    })();
</script>
@stack('appScripts')
<script defer src="https://unpkg.com/alpinejs@3.12.2/dist/cdn.min.js"></script>