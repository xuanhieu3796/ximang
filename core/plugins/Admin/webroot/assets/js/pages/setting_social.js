"use strict";

var nhSettingSocial = function () {

    var formEl;

    var initSubmit = function() {
        $(document).on('click', '.btn-save', function(e) {
            e.preventDefault();
            nhMain.initSubmitForm(formEl, $(this));
        });
    }

    return {
        init: function() {
            formEl = $('#main-form');
            initSubmit();
        }
    };
}();

$(document).ready(function() {
    nhSettingSocial.init();
});