var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/action/place-order': {
                'DCKAP_TextaddModule/js/action/place-order-mixin': true
            },
            'Magento_Checkout/js/action/set-payment-information': {
                'DCKAP_TextaddModule/js/action/set-payment-information-mixin': true
            }
        }
     }
    };