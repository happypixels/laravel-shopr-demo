<template>
    <div class="container">
        <p>
            You have {{cart.count}} items in your cart to the total amount of {{cart.total_formatted}}.
            <a @click="clearCart" href="#">Clear cart</a>

            <a class="btn btn-success float-right" href="/checkout">Proceed to checkout</a>
        </p>
        <table class="table table-striped">
            <thead>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price per each</th>
                <th></th>
            </thead>
            <tbody>
                    <tr v-for="item in cart.items" :key="'product-' + item.id">
                        <td>{{item.shoppable.title}}</td>
                        <td>{{item.quantity}}</td>
                        <td>{{item.price_formatted}}</td>
                        <td>
                            <a class="btn btn-danger" @click="removeFromCart(item)">Remove from cart</a>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getCart();
        },

        data(){
            return {
                cart: {},
            }
        },

        methods: {
            getCart(){
                window.axios.get('/api/shopr/cart').then(response => {
                    this.cart = response.data;
                });
            },

            removeFromCart(item){
                window.axios.delete('/api/shopr/cart/items/' + item.id).then(response => {
                    this.cart = response.data;
                });
            },

            clearCart(){
                window.axios.delete('/api/shopr/cart').then(response => {
                    this.cart = response.data;
                });
            }
        }
    }
</script>
