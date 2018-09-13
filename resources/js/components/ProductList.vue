<template>
    <div class="container">
        <p>
            You have {{cart.count}} items in your cart to the total amount of {{cart.total_formatted}}.
            <a v-if="cart.count > 0" href="/cart">Review cart</a>
        </p>
        <table class="table table-striped">
            <thead>
                <th>Product</th>
                <th>Price</th>
                <th></th>
            </thead>
            <tbody>
                    <tr v-for="product in products" :key="'product-' + product.id">
                        <td>{{product.title}}</td>
                        <td>{{product.price}}</td>
                        <td>
                            <a class="btn btn-success" @click="addToCart(product)">Add to cart</a>
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
            this.getProducts();
        },

        data(){
            return {
                cart: {},
                products: []
            }
        },

        methods: {
            getCart(){
                window.axios.get('/api/shopr/cart').then(response => {
                    this.cart = response.data;
                });
            },

            addToCart(product){
                let data = {
                    'shoppable_type': 'App\\Product',
                    'shoppable_id': product.id,
                    'quantity': 1,
                };

                window.axios.post('/api/shopr/cart/items', data).then(response => {
                    this.cart = response.data;
                });
            },

            getProducts(){
                window.axios.get('/api/products').then(response => {
                    this.products = response.data;
                });
            }
        }
    }
</script>
