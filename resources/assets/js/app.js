
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('test', require('./components/test.vue'));


let token = document.head.querySelector('meta[name="csrf-token"]');


Vue.component('comment', require('./components/comment.vue'));

Vue.component('notifications', require('./components/notifications.vue'));

const app = new Vue({
    el: '#app' ,

    created() {

        //console.log("token:"+this.token) ;
     
/*
         var userId = $('meta[name="userId"]').attr('content');
         
         Echo.private('users').listen(".Notification", (event) => {
            console.log(event);
        });

    
         Echo.private('users').notification((notification) => {

            console.log(notification);

            alert('its work ! ') ;

         });

         Echo.private('users') 
         .listen(".Illuminate\\Notifications\\Events\\BroadcastNotificationCreated", (notification) => {
            console.log('yes');
            console.log(notification.type);
        });
*/
     }
});
