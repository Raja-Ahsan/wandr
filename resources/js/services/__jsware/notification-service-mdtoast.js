(function (window, undefined) {

    'use strict';
    /**
     * Notification Functions — SweetAlert (OK to dismiss)
     * LivelyWorks
     *
     *-------------------------------------------------------- */

    function showSwalMessage(message, type) {
        if (typeof Swal === 'undefined') {
            if (window.console && console.warn) {
                console.warn('SweetAlert unavailable:', message);
            }
            return;
        }

        return Swal.fire({
            icon: type ? type : 'info',
            text: message || '',
            confirmButtonText: 'OK',
            allowOutsideClick: false,
            allowEscapeKey: false
        });
    }

    /**
    * Show Message
    *************************************************/
    window.__showMessage = function (message, type, options) {
        var icon = 'info';
        switch (type) {
            case 'success':
                icon = 'success';
                break;
            case 'error':
                icon = 'error';
                break;
            case 'warning':
                icon = 'warning';
                break;
            case 'info':
                icon = 'info';
                break;
            default:
                icon = 'info';
                break;
        }
        return showSwalMessage(message, icon);
    }

    /**
    * Show Success Message
    *************************************************/
    window.showSuccessMessage = function (message) {
        return window.__showMessage(message, 'success');
    }

    /*
    * Show Error Message
    *************************************************/
    window.showErrorMessage = function (message) {
        return window.__showMessage(message, 'error');
    };

    /*
    * Show Info Message
    *************************************************/
    window.showInfoMessage = function (message) {
        return window.__showMessage(message, 'info');
    };

    /*
    * Show Warning Message
    *************************************************/
    window.showWarnMessage = function (message) {
        return window.__showMessage(message, 'warning');
    };

    /*
    * Show confirmation dialog
    *************************************************/
    window.showConfirmation = function (containerId, yesCallback, options, confirmParams) {

        var $messageItem = (!_.includes(containerId, ' ')) ? $(containerId) : false,
            confirmationContainer = '';

        if ($messageItem && $messageItem.length) {
            confirmationContainer = _.template($messageItem.html());
        } else {
            confirmationContainer = containerId;
        }
        if (!options) {
            options = {};
        }
        options = _.assign({
            cancelButtonText: __Utils.getTranslation('confirmation_no', 'Cancel'),
            confirmButtonText: __Utils.getTranslation('confirmation_yes', 'Yes')
        }, options);

        if (!confirmParams) {
            confirmParams = {};
        }

        Swal.fire({
            html: _.isString(confirmationContainer) ? confirmationContainer : confirmationContainer(confirmParams),
            icon: options['type'] ? options['type'] : 'warning',
            showCancelButton: options['showCancelBtn'] ? options['showCancelBtn'] : true,
            confirmButtonColor: options['confirmBtnColor'] ? options['confirmBtnColor'] : '#d33d33', // 3085d6
            // cancelButtonColor: '#d33',
            cancelButtonText: options['cancelButtonText'] ? options['cancelButtonText'] : 'Cancel',
            confirmButtonText: options['confirmButtonText'] ? options['confirmButtonText'] : 'Yes'
        }).then(function (result) {
            if (result.isConfirmed) {
                yesCallback();
            }
        });
    };

    window.showAlert = function (message, type) {
        return showSwalMessage(message, type ? type : 'info');
    };

})(window);
