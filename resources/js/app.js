document.querySelectorAll('.header__trigger').forEach(item => item.addEventListener('click', toggleMobileNav));

function toggleMobileNav() {
    document.querySelector('header').classList.toggle('header--is-opened');
    document.querySelector('.mobile-nav').classList.toggle('mobile-nav--is-opened');
}

var navbar = document.querySelector("nav");
var sticky = navbar.offsetTop;


function hideHeader() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("nav--sticky")
    } else {
        navbar.classList.remove("nav--sticky");
    }
}

window.onscroll = function () {
    hideHeader()
};

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
//
// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

let groups = document.querySelectorAll('[data-group]');
let groupId;

groups.forEach(group => {
    group.addEventListener('click', function () {
        groupId = group.dataset.group;

        fetch('http://pizza.test/api/modal/product', {
            method: 'POST',
            body: JSON.stringify({
                'group_id': groupId
            }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
            .then(response => response.json())
            .then(response => {
                document.body.insertAdjacentHTML('afterbegin', response.html);
                addEventListenerToProducts();
            }, error => {
                console.error('klaida: ' + error);
            });
    })
});

function addEventListenerToProducts() {
    let products = document.querySelectorAll('[data-id]');

    addToCart();
    closeGroupModal();

    products.forEach(product => {
        product.addEventListener('click', function () {
            fetch('http://pizza.test/api/modal/product', {
                method: 'POST',
                body: JSON.stringify({
                    'product_id': product.dataset.id,
                    'group_id': groupId
                }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then(response => response.json())
                .then(response => {
                    document.querySelector('.modal').remove();
                    document.body.insertAdjacentHTML('afterbegin', response.html);
                    addEventListenerToProducts();
                }, error => {
                    console.error('klaida: ' + error);
                });
        });
    });
}

function closeGroupModal() {
    let x = document.querySelector('.modal__close');

    if (x !== null) {
        let modal = document.querySelector('.modal');

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.remove();
            }
        });

        x.addEventListener('click', () => {
            modal.remove();
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === "Escape") {
                modal.remove();
            }
        });
    }
}

function addToCart() {
    let button = document.querySelector('.modal__button button');

    button.addEventListener('click', function (btn) {
        fetch('http://pizza.test/modal/add', {
            method: 'POST',
            body: JSON.stringify({
                'product_id': button.dataset.productId,
            }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
            .then(response => response.json())
            .then(response => {
                alert('Produktas buvo sėkmingai pridėtas į krepšelį')
            }, error => {
                console.error('Adding to cart failed: ' + error);
            });
    });
}
