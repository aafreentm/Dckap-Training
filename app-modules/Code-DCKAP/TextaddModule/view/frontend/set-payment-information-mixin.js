define([
    'jquery',
    'mage/utils/wrapper',
    'Vendor_Module/js/action/custom-assigner'
], function ($, wrapper, shippingCommentProcessor) {
    'use strict';

    return function (placeOrderAction) {
        return wrapper.wrap(placeOrderAction, function (originalAction, messageContainer, paymentData) {
            shippingCommentProcessor(paymentData);

            return originalAction(messageContainer, paymentData);
        });
    };
});