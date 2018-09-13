<template>
    <div class="container">
        <input type="text" v-model="form.first_name" placeholder="First name*" class="form-control">
        <input type="text" v-model="form.last_name" placeholder="Surname*" class="form-control">
        <input type="text" v-model="form.email" placeholder="Email address*" class="form-control">

        <input type="text" v-model="form.address" placeholder="Address" class="form-control">
        <input type="text" v-model="form.zipcode" placeholder="Zipcode" class="form-control">
        <input type="text" v-model="form.city" placeholder="City" class="form-control">

        <pay-with-stripe :cart="cart" :userData="form"></pay-with-stripe>
    </div>
</template>

<script>
export default {
    data(){
        return {
            form: {
                first_name: '',
                last_name: '',
                email: '',
                address: '',
                zipcode: '',
                city: ''
            },

            cart: {}
        }
    },

    mounted() {
        this.getCart();
    },

    methods: {
        getCart(){
            window.axios.get('/api/shopr/cart').then(response => {
                this.cart = response.data;
            });
        },
    }
}
</script>
