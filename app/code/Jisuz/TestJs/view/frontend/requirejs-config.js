var config = {
    config: {
        mixins: {
            'Magento_Catalog/js/catalog-add-to-cart': {
                'Jisuz_TestJs/js/catalog-add-to-cart/mixin': true
            },
            'Magento_Catalog/js/action/place-order': {
                'Training_Test/js/checkout/mixin/checkout': true
            }
        }
    }
}
