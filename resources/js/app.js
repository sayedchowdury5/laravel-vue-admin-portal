/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import 'datatables.net-buttons-bs4'
import 'jszip'

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('floor-component', require('./components/FloorComponent.vue').default);

Vue.component('ad-client-component', require('./components/AdClientComponent.vue').default);
Vue.component('ad-schedule-component', require('./components/AdScheduleComponent.vue').default);
Vue.component('create-ads-component', require('./components/CreateAdsComponent.vue').default);

Vue.component('brand-component', require('./components/BrandComponent.vue').default);
Vue.component('sub-brand-component', require('./components/SubBrandComponent.vue').default);
Vue.component('sub-brand-details-component', require('./components/SubBrandDetailsComponent.vue').default);

Vue.component('mall-component', require('./components/MallComponent.vue').default);
Vue.component('manage-admin-component', require('./components/ManageAdminComponent.vue').default);
Vue.component('merchant-component', require('./components/MerchantComponent.vue').default);

Vue.component('product-category-component', require('./components/ProductCategoryComponent.vue').default);
Vue.component('product-component', require('./components/ProductComponent.vue').default);

Vue.component('selling-identity-component', require('./components/SellingIdentityComponent.vue').default);
Vue.component('new-shop-component', require('./components/NewShopComponent.vue').default);
Vue.component('used-shop-component', require('./components/UsedShopComponent.vue').default);
Vue.component('other-mall-shop-component', require('./components/OtherMallShopComponent.vue').default);

Vue.component('promotion-update-component', require('./components/PromotionUpdateComponent.vue').default);
Vue.component('voucher-component', require('./components/VoucherComponent.vue').default);
Vue.component('logistic-component', require('./components/LogisticComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
