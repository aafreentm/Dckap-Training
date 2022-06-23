define([
    'jquery'
], function ($) {
    'use strict';

    return function (paymentData) {

        if (paymentData['extension_attributes'] === undefined) {
            paymentData['extension_attributes'] = {};
        }

        paymentData['extension_attributes']['custom'] = jQuery('[name="add_text"]').val();
    };
});