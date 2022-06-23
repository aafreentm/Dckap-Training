define([
    'jquery',
    'ko',
    'uiComponent',
    'Magento_Checkout/js/model/quote'
], function (
    $, ko, Component, quote) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'DCKAP_TextaddModule/checkout/shipping-comment-block'
            },
            initialize: function () {
                this._super();

                return this;
            },
        });
    }
);