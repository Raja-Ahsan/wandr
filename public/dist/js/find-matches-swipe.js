/**
 * Find Matches — Swipe / Card Encounter UI
 * Bound once via document delegation; safe with AJAX page loads.
 */
(function ($) {
    'use strict';

    if (window.__lwSwipeDeckBound) {
        return;
    }
    window.__lwSwipeDeckBound = true;

    var busy = false;
    var processedUids = {};
    var dragState = null;
    var loadMoreLock = false;
    var browseListWasOpen = false;

    function escapeHtml(str) {
        return String(str == null ? '' : str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    function getDeck() {
        return document.getElementById('lwSwipeDeck');
    }

    function getEncounter() {
        return document.getElementById('lwSwipeEncounter');
    }

    function getBrowseContainer() {
        return document.getElementById('lwUserFilterContainer');
    }

    function formatDiscoverCount(n) {
        n = Math.max(0, parseInt(n, 10) || 0);
        if (n === 1) {
            return '1 person nearby';
        }
        return n + ' people to discover';
    }

    function setDiscoverCount(n) {
        var wrap = document.querySelector('.lw-discover-count');
        var text = document.querySelector('.lw-discover-count-text');
        if (!wrap || !text) {
            return;
        }
        n = Math.max(0, parseInt(n, 10) || 0);
        wrap.setAttribute('data-total', String(n));
        text.textContent = formatDiscoverCount(n);
    }

    function bumpDiscoverCount(delta) {
        var wrap = document.querySelector('.lw-discover-count');
        if (!wrap) {
            return;
        }
        var current = parseInt(wrap.getAttribute('data-total') || '0', 10);
        setDiscoverCount(current + (parseInt(delta, 10) || 0));
    }

    function removeFromBrowseList(uid, username) {
        var container = getBrowseContainer();
        if (!container) {
            return;
        }
        var removed = false;
        if (uid) {
            var byUid = container.querySelectorAll('.lw-browse-user-col[data-uid="' + uid.replace(/"/g, '') + '"]');
            Array.prototype.forEach.call(byUid, function (el) {
                el.parentNode.removeChild(el);
                removed = true;
            });
        }
        if (!removed && username) {
            var byUser = container.querySelectorAll('.lw-browse-user-col[data-username="' + username.replace(/"/g, '') + '"]');
            Array.prototype.forEach.call(byUser, function (el) {
                el.parentNode.removeChild(el);
            });
        }
        // If grid is empty, show empty message
        if (!container.querySelector('.lw-browse-user-col') && !container.querySelector('.lw-browse-empty-msg')) {
            container.innerHTML = '<div class="col-sm-12 alert alert-info lw-browse-empty-msg">There are no matches found.</div>';
        }
    }

    function buildBrowseCardHtml(user) {
        var uid = user._uid || user.user_uid || '';
        var username = user.username || '';
        var fullName = user.fullName || username;
        var img = user.profileImage || '';
        var detail = user.detailString || '';
        var country = user.countryName || '';
        var profileUrl = '/@' + username;
        var encounter = getEncounter();
        if (encounter && encounter.getAttribute('data-profile-url')) {
            profileUrl = encounter.getAttribute('data-profile-url').replace('__USERNAME__', username);
        }

        var onlineHtml = '';
        if (user.userOnlineStatus == 1) {
            onlineHtml = '<div class="pt-2"><span class="lw-dot lw-dot-success" title="Online"></span></div>';
        } else if (user.userOnlineStatus == 2) {
            onlineHtml = '<div class="pt-2"><span class="lw-dot lw-dot-warning" title="Idle"></span></div>';
        } else if (user.userOnlineStatus == 3) {
            onlineHtml = '<div class="pt-2"><span class="lw-dot lw-dot-danger" title="Offline"></span></div>';
        }

        var premiumClass = user.isPremiumUser ? ' lw-has-premium-badge' : '';

        return (
            '<div class="col mb-4 lw-browse-user-col" data-uid="' + escapeHtml(uid) + '" data-username="' + escapeHtml(username) + '">' +
                '<div class="card text-center lw-user-thumbnail-block' + premiumClass + '">' +
                    onlineHtml +
                    '<a class="lw-ajax-link-action lw-action-with-url" href="' + escapeHtml(profileUrl) + '">' +
                        '<img data-src="' + escapeHtml(img) + '" class="lw-user-thumbnail lw-lazy-img" />' +
                    '</a>' +
                    '<div class="card-title"><h5>' +
                        '<a class="text-secondary" href="' + escapeHtml(profileUrl) + '">' + escapeHtml(fullName) + '</a> ' +
                        escapeHtml(detail) + '<br>' + escapeHtml(country) +
                    '</h5></div>' +
                '</div>' +
            '</div>'
        );
    }

    function rebuildBrowseList(users) {
        var container = getBrowseContainer();
        if (!container) {
            return;
        }
        if (!users || !users.length) {
            container.innerHTML = '<div class="col-sm-12 alert alert-info lw-browse-empty-msg">There are no matches found.</div>';
            return;
        }
        var html = '';
        users.forEach(function (user) {
            html += buildBrowseCardHtml(user);
        });
        container.innerHTML = html;
        if (typeof applyLazyImages === 'function') {
            applyLazyImages();
        }
    }

    function appendBrowseUsers(users) {
        var container = getBrowseContainer();
        if (!container || !users || !users.length) {
            return;
        }
        // Remove empty message if present
        var emptyMsg = container.querySelector('.lw-browse-empty-msg');
        if (emptyMsg) {
            emptyMsg.parentNode.removeChild(emptyMsg);
        }
        users.forEach(function (user) {
            var uid = user._uid || user.user_uid || '';
            if (uid && container.querySelector('.lw-browse-user-col[data-uid="' + uid.replace(/"/g, '') + '"]')) {
                return;
            }
            container.insertAdjacentHTML('beforeend', buildBrowseCardHtml(user));
        });
        if (typeof applyLazyImages === 'function') {
            applyLazyImages();
        }
    }

    function rememberBrowseOpenState() {
        var details = document.querySelector('details.lw-swipe-browse-list');
        browseListWasOpen = !!(details && details.open);
    }

    function restoreBrowseOpenState() {
        if (!browseListWasOpen) {
            return;
        }
        var details = document.querySelector('details.lw-swipe-browse-list');
        if (details) {
            details.open = true;
        }
    }

    function getActiveCards() {
        var deck = getDeck();
        if (!deck) {
            return [];
        }
        return Array.prototype.slice.call(deck.querySelectorAll('.lw-swipe-card:not(.lw-swiped)'));
    }

    function getTopCard() {
        var cards = getActiveCards();
        if (!cards.length) {
            return null;
        }
        cards.sort(function (a, b) {
            return (parseInt(b.style.zIndex, 10) || 0) - (parseInt(a.style.zIndex, 10) || 0);
        });
        return cards[0];
    }

    function refreshSwipeUi() {
        if (!getEncounter()) {
            return;
        }
        var hasCards = getActiveCards().length > 0;
        var emptyEl = document.getElementById('lwSwipeEmpty');
        var actionsEl = document.getElementById('lwSwipeActions');
        var hintEl = document.querySelector('#lwSwipeEncounter .lw-swipe-hint');
        var stageEl = document.querySelector('.lw-discover-stage');
        var encounter = getEncounter();

        encounter.classList.toggle('lw-swipe-is-empty', !hasCards);
        if (stageEl) {
            stageEl.classList.toggle('lw-swipe-is-empty', !hasCards);
        }
        if (emptyEl) {
            emptyEl.style.display = hasCards ? 'none' : '';
        }
        if (actionsEl) {
            actionsEl.style.display = hasCards ? '' : 'none';
        }
        if (hintEl) {
            hintEl.style.display = hasCards ? '' : 'none';
        }
        if (!hasCards) {
            maybeLoadMore();
        }
    }

    function syncAfterAjaxReplace(response) {
        processedUids = {};
        busy = false;
        dragState = null;
        loadMoreLock = false;
        setBusy(false);

        var data = response && response.data ? response.data : null;
        if (data && typeof data.totalCount !== 'undefined') {
            setDiscoverCount(data.totalCount);
        }

        // Force browse list sync from AJAX payload (no reload)
        if (data && Object.prototype.hasOwnProperty.call(data, 'filterData')) {
            rebuildBrowseList(data.filterData || []);
        }

        setTimeout(function () {
            refreshSwipeUi();
            restoreBrowseOpenState();
            if (typeof applyLazyImages === 'function') {
                applyLazyImages();
            }
        }, 0);
    }

    function maybeLoadMore() {
        var btn = document.getElementById('lwLoadMoreButton');
        if (!btn || loadMoreLock) {
            return;
        }
        if ($(btn).is(':visible') && !$(btn).hasClass('disabled')) {
            loadMoreLock = true;
            btn.click();
            setTimeout(function () {
                loadMoreLock = false;
            }, 2500);
        }
    }

    function setBusy(state) {
        busy = !!state;
        $('#lwSwipeNope, #lwSwipeLike, #lwSwipeSuper').prop('disabled', busy);
    }

    function buildLikeUrl(uid, like) {
        var root = getEncounter();
        if (!root) {
            return '';
        }
        var template = root.getAttribute('data-like-url') || '';
        return template
            .replace('__UID__', encodeURIComponent(uid))
            .replace('__LIKE__', encodeURIComponent(String(like)));
    }

    function isSuperLikeEnabled() {
        var root = getEncounter();
        return !!(root && root.getAttribute('data-super-enabled') === '1');
    }

    function updateSuperLikeQuotaUi(quota) {
        var root = getEncounter();
        var el = document.getElementById('lwSuperLikeQuota');
        if (!root || !el || !quota) {
            return;
        }
        var balance = parseInt(quota.balance, 10);
        if (isNaN(balance)) {
            balance = parseInt(quota.free_remaining, 10) || 0;
        }
        var shopUrl = quota.shop_url || root.getAttribute('data-super-shop-url') || '';
        root.setAttribute('data-super-balance', String(balance));
        if (balance > 0) {
            el.innerHTML = '<i class="fas fa-star"></i> ' + balance + ' Super Like' + (balance === 1 ? '' : 's') + ' left';
        } else if (shopUrl) {
            el.innerHTML = '<a href="' + shopUrl + '" class="lw-ajax-link-action lw-action-with-url text-decoration-none"><i class="fas fa-shopping-bag"></i> Buy Super Likes</a>';
        } else {
            el.innerHTML = '<i class="fas fa-shopping-bag"></i> Buy Super Likes';
        }
    }

    function redirectToSuperLikeShop() {
        var root = getEncounter();
        var shopUrl = (root && root.getAttribute('data-super-shop-url')) || '';
        if (!shopUrl) {
            return;
        }
        if (typeof window.lwNavigate === 'function') {
            window.lwNavigate(shopUrl);
            return;
        }
        window.location.href = shopUrl;
    }

    function redirectToWallet() {
        var root = getEncounter();
        var walletUrl = (root && root.getAttribute('data-wallet-url')) || '';
        if (walletUrl) {
            if (typeof window.lwNavigate === 'function') {
                window.lwNavigate(walletUrl);
                return;
            }
            window.location.href = walletUrl;
        }
    }

    function isValidUid(uid) {
        return typeof uid === 'string' && uid.length >= 8 && uid.length <= 64 && /^[A-Za-z0-9\-]+$/.test(uid);
    }

    function resetCardTransform(card) {
        if (!card) {
            return;
        }
        card.style.transition = 'transform 0.2s ease, opacity 0.2s ease';
        card.style.transform = '';
        card.style.opacity = '';
        card.classList.remove('lw-show-like', 'lw-show-nope', 'lw-show-super');
    }

    function flyAway(card, direction, done) {
        var x = 0;
        var y = 0;
        var rotate = 0;
        if (direction === 'like') {
            x = window.innerWidth;
            rotate = 25;
        } else if (direction === 'nope') {
            x = -window.innerWidth;
            rotate = -25;
        } else {
            y = -window.innerHeight;
        }
        card.style.transition = 'transform 0.35s ease, opacity 0.35s ease';
        card.style.transform = 'translate(' + x + 'px, ' + y + 'px) rotate(' + rotate + 'deg)';
        card.style.opacity = '0';
        setTimeout(function () {
            card.classList.add('lw-swiped');
            card.style.display = 'none';
            if (typeof done === 'function') {
                done();
            }
        }, 340);
    }

    function submitAction(action) {
        if (busy || !getEncounter()) {
            return;
        }
        var card = getTopCard();
        if (!card) {
            refreshSwipeUi();
            return;
        }
        var uid = card.getAttribute('data-uid');
        if (!isValidUid(uid) || processedUids[uid]) {
            card.classList.add('lw-swiped');
            card.style.display = 'none';
            refreshSwipeUi();
            return;
        }

        if (action === 'super' && !isSuperLikeEnabled()) {
            if (typeof showErrorMessage === 'function') {
                showErrorMessage('Super Like is currently disabled.');
            }
            return;
        }

        // 0 = nope, 1 = like, 2 = super like (server maps 2 → like + why=super_like)
        var like = (action === 'nope') ? 0 : ((action === 'super') ? 2 : 1);
        var url = buildLikeUrl(uid, like);
        if (!url || typeof __DataRequest === 'undefined') {
            return;
        }

        setBusy(true);
        processedUids[uid] = true;

        if (action === 'like') {
            card.classList.add('lw-show-like');
        } else if (action === 'nope') {
            card.classList.add('lw-show-nope');
        } else {
            card.classList.add('lw-show-super');
        }

        var handled = false;
        var deferred = __DataRequest.post(url, {}, function (response) {
            handled = true;
            if (response && response.reaction == 1) {
                if (response.data && response.data.superLikeQuota) {
                    updateSuperLikeQuotaUi(response.data.superLikeQuota);
                }
                var username = card.getAttribute('data-username') || '';
                flyAway(card, action, function () {
                    removeFromBrowseList(uid, username);
                    bumpDiscoverCount(-1);
                    setBusy(false);
                    refreshSwipeUi();
                });
            } else {
                delete processedUids[uid];
                resetCardTransform(card);
                setBusy(false);
                var errMsg = (response && (response.message || (response.data && response.data.message))) || '';
                if (errMsg && typeof showErrorMessage === 'function') {
                    showErrorMessage(errMsg);
                }
                if (response && response.data && (response.data.insufficientSuperLikes || response.data.redirectToSuperLikeShop)) {
                    setTimeout(redirectToSuperLikeShop, 600);
                } else if (response && response.data && (response.data.insufficientCredits || response.data.redirectToWallet)) {
                    setTimeout(redirectToWallet, 600);
                }
            }
        }, {
            // Avoid toast spam on every successful swipe
            hideMessage: true
        });

        if (deferred && typeof deferred.always === 'function') {
            deferred.always(function () {
                if (!handled) {
                    delete processedUids[uid];
                    resetCardTransform(card);
                    setBusy(false);
                }
            });
        }
    }

    function appendSwipeUsers(users) {
        var deck = getDeck();
        if (!deck || !users || !users.length) {
            refreshSwipeUi();
            return;
        }
        var encounter = getEncounter();
        var profileTpl = (encounter && encounter.getAttribute('data-profile-url')) || '/@__USERNAME__';
        var baseZ = getActiveCards().length;

        users.forEach(function (user, index) {
            var uid = user._uid || user.user_uid || '';
            if (!isValidUid(uid) || processedUids[uid]) {
                return;
            }
            if (deck.querySelector('.lw-swipe-card[data-uid="' + uid.replace(/"/g, '') + '"]')) {
                return;
            }

            var username = user.username || '';
            var fullName = user.fullName || username;
            var img = user.profileImage || '';
            var profileUrl = profileTpl.replace('__USERNAME__', username);

            var onlineHtml = '';
            if (user.userOnlineStatus == 1) {
                onlineHtml = '<span class="lw-swipe-online-pill">Online</span>';
            }

            var premiumHtml = user.isPremiumUser
                ? '<span class="lw-swipe-premium" title="Premium User"><i class="fas fa-crown"></i></span>'
                : '';

            var metaParts = [];
            if (user.gender) {
                metaParts.push(user.gender);
            }
            if (user.countryName) {
                metaParts.push(user.countryName);
            } else if (user.detailString) {
                metaParts.push(user.detailString);
            }
            var metaHtml = metaParts.length
                ? '<div class="lw-swipe-meta"><i class="fas fa-map-marker-alt lw-swipe-meta-icon"></i> ' + escapeHtml(metaParts.join(' · ')) + '</div>'
                : '';

            var ageHtml = user.userAge ? '<span class="lw-swipe-age">, ' + escapeHtml(String(user.userAge)) + '</span>' : '';

            var card = document.createElement('div');
            card.className = 'lw-swipe-card';
            card.setAttribute('data-uid', uid);
            card.setAttribute('data-username', username);
            card.setAttribute('data-fullname', fullName);
            card.style.zIndex = String(Math.max(1, 500 - baseZ - index));
            card.innerHTML =
                premiumHtml +
                onlineHtml +
                '<div class="lw-swipe-photo" style="background-image:url(\'' + escapeHtml(img).replace(/'/g, '%27') + '\')"></div>' +
                '<div class="lw-swipe-gradient"></div>' +
                '<div class="lw-swipe-info">' +
                    '<div class="lw-swipe-name">' +
                        '<a href="' + escapeHtml(profileUrl) + '" class="lw-ajax-link-action lw-action-with-url lw-swipe-profile-link">' +
                            escapeHtml(fullName) + ageHtml +
                        '</a>' +
                    '</div>' +
                    metaHtml +
                '</div>' +
                '<div class="lw-swipe-stamp lw-swipe-stamp-like">LIKE</div>' +
                '<div class="lw-swipe-stamp lw-swipe-stamp-nope">NOPE</div>' +
                '<div class="lw-swipe-stamp lw-swipe-stamp-super">SUPER</div>';
            deck.appendChild(card);
        });
        refreshSwipeUi();
        if (typeof applyLazyImages === 'function') {
            applyLazyImages();
        }
    }

    window.lwSwipeDeckAppend = appendSwipeUsers;

    function resetSwipeSession() {
        syncAfterAjaxReplace(null);
    }

    $(document).on('click', '#lwSwipeNope', function (e) {
        e.preventDefault();
        submitAction('nope');
    });
    $(document).on('click', '#lwSwipeLike', function (e) {
        e.preventDefault();
        submitAction('like');
    });
    $(document).on('click', '#lwSwipeSuper', function (e) {
        e.preventDefault();
        submitAction('super');
    });

    $(document).on('submit', '.lw-find-form-container form, .lw-advance-filter-container form', function () {
        rememberBrowseOpenState();
        processedUids = {};
        busy = false;
        dragState = null;
    });

    $(document).on('onLoadMoreFilterUsers', function (e, options) {
        try {
            var users = options && options.response && options.response.data && options.response.data.filterData;
            if (users && users.length) {
                appendSwipeUsers(users);
                // Browse grid HTML is appended by misc.js; just refresh lazy images
                if (typeof applyLazyImages === 'function') {
                    applyLazyImages();
                }
            } else {
                refreshSwipeUi();
            }
        } catch (err) {
            refreshSwipeUi();
        }
    });

    // Instant AJAX refresh of discover results (Search / Clear / Advanced)
    $(document).on('lw_events_ajax_success', function (e, payload) {
        var response = payload && payload.response;
        if (!response || !response.response_action) {
            return;
        }
        if (response.response_action.target === '#lwFindMatchesContainer') {
            syncAfterAjaxReplace(response);
        }
    });

    $(document).on('lw_events_ajax_success_replace', function () {
        if (document.getElementById('lwFindMatchesContainer') && getEncounter()) {
            syncAfterAjaxReplace(null);
        }
    });

    $(document).on('mousedown touchstart', '#lwSwipeDeck .lw-swipe-card:not(.lw-swiped)', function (e) {
        if (busy) {
            return;
        }
        var card = getTopCard();
        if (!card || this !== card) {
            return;
        }
        if ($(e.target).closest('a').length) {
            return;
        }
        var point = e.type === 'touchstart' ? e.originalEvent.touches[0] : e;
        dragState = {
            card: card,
            startX: point.clientX,
            startY: point.clientY,
            moved: false
        };
        card.style.transition = 'none';
    });

    $(document).on('mousemove touchmove', function (e) {
        if (!dragState || busy) {
            return;
        }
        var point = e.type === 'touchmove' ? e.originalEvent.touches[0] : e;
        var dx = point.clientX - dragState.startX;
        var dy = point.clientY - dragState.startY;
        if (Math.abs(dx) > 8 || Math.abs(dy) > 8) {
            dragState.moved = true;
        }
        var rotate = dx / 18;
        dragState.card.style.transform = 'translate(' + dx + 'px, ' + dy + 'px) rotate(' + rotate + 'deg)';
        dragState.card.classList.toggle('lw-show-like', dx > 60);
        dragState.card.classList.toggle('lw-show-nope', dx < -60);
        dragState.card.classList.toggle('lw-show-super', dy < -70 && Math.abs(dx) < 80);
        if (dragState.moved && e.cancelable) {
            e.preventDefault();
        }
    });

    $(document).on('mouseup touchend touchcancel', function (e) {
        if (!dragState) {
            return;
        }
        var card = dragState.card;
        var point = (e.type.indexOf('touch') === 0 && e.originalEvent.changedTouches && e.originalEvent.changedTouches[0])
            ? e.originalEvent.changedTouches[0]
            : e;
        var dx = (point.clientX || dragState.startX) - dragState.startX;
        var dy = (point.clientY || dragState.startY) - dragState.startY;
        var moved = dragState.moved;
        dragState = null;

        if (!moved) {
            resetCardTransform(card);
            return;
        }

        if (dy < -110 && Math.abs(dx) < 90) {
            submitAction('super');
        } else if (dx > 100) {
            submitAction('like');
        } else if (dx < -100) {
            submitAction('nope');
        } else {
            resetCardTransform(card);
        }
    });

    $(document).ready(function () {
        refreshSwipeUi();
    });
})(jQuery);
