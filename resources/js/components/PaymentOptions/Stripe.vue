<template>
    <div>
        <button class="btn btn-success" @click="checkout">Pay {{cart.total_formatted}}</button>
    </div>
</template>

<script>
import VueStripeCheckout from 'vue-stripe-checkout';

const options = {
    key: '',
    image: '',
    locale: 'auto',
    allowRememberMe: true
}
window.Vue.use(VueStripeCheckout, options);

export default {
    props: {
        userData: {
            required: true,
            type: Object
        },

        cart: {
            required: true,
            type: Object
        }
    },

    methods: {
        checkout(){
            this.$checkout.open({
                key: document.head.querySelector('meta[name="stripe-key"]').content,
                image: '',
                name: this.userData.first_name + ' ' + this.userData.last_name,
                description: this.cart.total_formatted,
                currency: 'usd',
                email: this.userData.email,
                token: (token) => {
                    this.charge(token);
                }
            });
        },

        charge(token){
            window.axios.post('/api/shopr/checkout/charge', {
                gateway: 'Stripe',
                token: token.id,
                email: this.userData.email,
                first_name: this.userData.first_name,
                last_name: this.userData.last_name,
                address: this.userData.address,
                zipcode: this.userData.zipcode,
                city: this.userData.city,
            }).then(response => {
                // Go to confirmation.
                if(response.data.redirect){
                    window.location.href = response.data.redirect;
                }
            }).catch(error => {
                console.log('Error!');
                console.log(error);
            });
        }
    }
}
</script>
