/**
 * Reusable AJAX form helpers — SweetAlert feedback, no full page reload.
 * Use on any form.lw-ajax-form with data-callback="lwAjaxFormSaved"
 */
(function (window) {
    'use strict';

    var defaultSuccessTitle = 'Success';
    var defaultErrorTitle = 'Error';

    var swalDefaults = {
        customClass: {
            popup: 'lw-swal-popup',
            title: 'lw-swal-title',
            htmlContainer: 'lw-swal-text',
            confirmButton: 'lw-swal-confirm'
        }
    };

    function mergeSwalOptions(options) {
        if (window.jQuery && jQuery.extend) {
            return jQuery.extend(true, {}, swalDefaults, options || {});
        }
        return Object.assign({}, swalDefaults, options || {});
    }

    function resolveMessage(response, fallback) {
        if (response && response.message) {
            return response.message;
        }
        if (response && response.data && response.data.message) {
            return response.data.message;
        }
        return fallback || '';
    }

    /**
     * SweetAlert toast-style alerts (reusable app-wide).
     */
    window.LwAjaxSwal = {
        success: function (message, title) {
            if (typeof Swal === 'undefined') {
                if (typeof showSuccessMessage === 'function') {
                    showSuccessMessage(message);
                }
                return;
            }
            Swal.fire(mergeSwalOptions({
                icon: 'success',
                title: title || defaultSuccessTitle,
                text: message,
                timer: 2200,
                showConfirmButton: true,
                confirmButtonText: 'OK'
            }));
        },
        error: function (message, title) {
            if (typeof Swal === 'undefined') {
                if (typeof showErrorMessage === 'function') {
                    showErrorMessage(message);
                }
                return;
            }
            Swal.fire(mergeSwalOptions({
                icon: 'error',
                title: title || defaultErrorTitle,
                text: message
            }));
        },
        warning: function (message, title) {
            if (typeof Swal === 'undefined') {
                if (typeof showWarnMessage === 'function') {
                    showWarnMessage(message);
                }
                return;
            }
            Swal.fire(mergeSwalOptions({
                icon: 'warning',
                title: title || defaultErrorTitle,
                text: message
            }));
        }
    };

    /**
     * Close profile-style edit block (view mode, no toggle).
     */
    window.lwCloseProfileSectionEdit = function (formKey) {
        if (!formKey) {
            return;
        }
        $('#lwEdit' + formKey).show();
        $('#lwClose' + formKey + 'Block').hide();
        $('#lw' + formKey + 'StaticContainer').show();
        $('#lwUser' + formKey + 'Form').hide();
    };

    /**
     * Apply server-rendered static HTML after save.
     */
    window.lwUpdateStaticContainer = function (containerId, html) {
        if (!containerId || html === undefined || html === null) {
            return;
        }
        var $target = containerId.charAt(0) === '#' ? $(containerId) : $('#' + containerId);
        if ($target.length) {
            $target.html(html);
        }
    };

    /**
     * Default callback for lw-ajax-form — Swal + optional DOM update + close edit UI.
     *
     * Form data attributes (optional):
     *   data-lw-form-key="WandrInterests"
     *   data-lw-static-container="lwWandrInterestsStaticContainer"
     *   data-show-message="false"  — suppress Noty (Swal only)
     */
    window.lwAjaxFormSaved = function (response, callbackParams, $thisScope) {
        var isSuccess = response && parseInt(response.reaction, 10) === 1;
        var message = resolveMessage(response, isSuccess ? 'Saved successfully.' : 'Something went wrong.');

        if (isSuccess) {
            LwAjaxSwal.success(message);

            var data = response.data || {};
            var containerId = data.static_container_id
                || ($thisScope && $thisScope.data('lwStaticContainer'))
                || null;
            var staticHtml = data.static_html;

            if (containerId && staticHtml) {
                lwUpdateStaticContainer(containerId, staticHtml);
            }

            var formKey = data.form_key
                || ($thisScope && $thisScope.data('lwFormKey'))
                || null;

            if (formKey) {
                lwCloseProfileSectionEdit(formKey);
            }
        } else {
            LwAjaxSwal.error(message);
        }
    };

    /** @deprecated Use lwAjaxFormSaved — Wandr profile sections */
    window.onWandrProfileSectionSaved = window.lwAjaxFormSaved;

})(window);
