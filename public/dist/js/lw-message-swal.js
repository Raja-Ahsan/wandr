/**
 * Replace auto-dismiss toasts with SweetAlert (OK to close).
 * Supports deferred redirects after OK via __lwDeferRedirect / __lwForceRedirect.
 */
(function (window) {
    'use strict';

    if (typeof Swal === 'undefined') {
        return;
    }

    var pendingRedirectUrl = null;
    var waitingForConfirm = false;

    function navigateNow(url) {
        if (!url) {
            return;
        }
        // Bypass location patches — most reliable cross-browser navigation
        try {
            window.open(url, '_self');
        } catch (e) {
            try {
                var anchor = document.createElement('a');
                anchor.setAttribute('href', url);
                anchor.style.display = 'none';
                document.body.appendChild(anchor);
                anchor.click();
            } catch (e2) {
                document.location = url;
            }
        }
    }

    function goPendingRedirect() {
        if (!pendingRedirectUrl) {
            return;
        }
        var url = pendingRedirectUrl;
        pendingRedirectUrl = null;
        waitingForConfirm = false;
        navigateNow(url);
    }

    /**
     * Queue a redirect until the open SweetAlert is confirmed.
     * If no alert is waiting, redirect immediately.
     */
    window.__lwDeferRedirect = function (url) {
        if (!url) {
            return;
        }
        pendingRedirectUrl = url;
        if (!waitingForConfirm) {
            goPendingRedirect();
        }
    };

    /**
     * Always redirect now (bypasses wait). Use after OK when you own the Swal.
     */
    window.__lwForceRedirect = function (url) {
        pendingRedirectUrl = null;
        waitingForConfirm = false;
        navigateNow(url);
    };

    function showSwalMessage(message, icon) {
        waitingForConfirm = true;
        return Swal.fire({
            icon: icon || 'info',
            text: message || '',
            confirmButtonText: 'OK',
            allowOutsideClick: false,
            allowEscapeKey: false,
            customClass: {
                popup: 'lw-swal-popup',
                title: 'lw-swal-title',
                htmlContainer: 'lw-swal-text',
                confirmButton: 'lw-swal-confirm'
            }
        }).then(function () {
            waitingForConfirm = false;
            goPendingRedirect();
        });
    }

    window.showSuccessMessage = function (message) {
        return showSwalMessage(message, 'success');
    };

    window.showErrorMessage = function (message) {
        return showSwalMessage(message, 'error');
    };

    window.showInfoMessage = function (message) {
        return showSwalMessage(message, 'info');
    };

    window.showWarnMessage = function (message) {
        return showSwalMessage(message, 'warning');
    };

    window.showAlert = function (message, type) {
        return showSwalMessage(message, type || 'info');
    };
})(window);
