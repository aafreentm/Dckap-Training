define([
    'jquery',
    'mage/utils/wrapper',
    'DCKAP_TextaddModule/js/action/custom-assigner'
], function ($, wrapper, shippingCommentProcessor) {
    'use strict';

    return function (placeOrderAction) {

        return wrapper.wrap(placeOrderAction, function (originalAction, paymentData, messageContainer) {
            shippingCommentProcessor(paymentData);

            return originalAction(paymentData, messageContainer);
        });
    };
});