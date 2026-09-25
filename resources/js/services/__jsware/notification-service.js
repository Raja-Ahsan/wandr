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
    * Show Success Message
    *************************************************/
    window.showSuccessMessage = function (message) {
        return showSwalMessage(message, 'success');
    }

    /**
    * Show Error Message
    *************************************************/
    window.showErrorMessage = function (message) {
        return showSwalMessage(message, 'error');
    };

    /**
    * Show Info Message
    *************************************************/
    window.showInfoMessage = function (message) {
        return showSwalMessage(message, 'info');
    };

    /**
    * Show Warning Message
    *************************************************/
    window.showWarnMessage = function (message) {
        return showSwalMessage(message, 'warning');
    };
    /**
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
            showCancelBtn: true,
            type: 'warning',
            confirmBtnColor: '#d33d33',
            cancelButtonText: __Utils.getTranslation('confirmation_no', 'Cancel'),
            confirmButtonText: __Utils.getTranslation('confirmation_yes', 'Yes')
        }, options);

        if (!confirmParams) {
            confirmParams = {};
        }

        Swal.fire({
            html: _.isString(confirmationContainer) ? confirmationContainer : confirmationContainer(confirmParams),
            icon: options['type'],
            showCancelButton: options['showCancelBtn'],
            confirmButtonColor: options['confirmBtnColor'], // 3085d6
            cancelButtonText: options['cancelButtonText'],
            confirmButtonText: options['confirmButtonText']
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
