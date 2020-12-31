/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        messages: [],
    },
    mounted() {
        // DBのメッセージを表示
        var self = this;
        var url = 'ajax/getMessages';
        axios.get(url).then((res) => {
            res.data.forEach((val, index) => {
                var created_at = format_date(new Date(val.created_at));
                self.messages.push({
                    body: val.message,
                    // 自分の投稿かどうか判定
                    me: val.me,
                    // me: false,
                    nickname: val.nickname,
                    created_at: created_at,
                });
            });
        });
    },
    methods: {
        addItem: function(e) {
            var message = document.getElementById('message').value;
            if (message != '') {
                // DBにメッセージを保存
                var url1 = 'ajax/postMessage';
                var data = {
                    message: message,
                }
                axios.post(url1, data).then(() => {
                    console.log('メッセージを登録しました');
                });
    
                var url2 = 'ajax/getNickname';
                axios.get(url2).then((res) => {
                    var now = format_date(new Date());
                    // messagesにデータを格納
                    console.log(res.data.nickname);
                    this.messages.unshift({
                        body: message,
                        me: true,
                        nickname: res.data.nickname,
                        created_at: now,
                    });
                });
            }
        }
    }
});

function format_date(date)
{
    // MM月DD日　hh:mm分にフォーマット
    var formatted_date = 
        toDoubleDigits(date.getMonth() + 1) + '/'
        + toDoubleDigits(date.getDate()) + ' '
        + toDoubleDigits(date.getHours()) + ':'
        + toDoubleDigits(date.getMinutes());
    
    return formatted_date;
}

function toDoubleDigits(num)
{
    num += '';
    if (num.length == 1) {
        num = '0' + num;
    }
    return num;
}