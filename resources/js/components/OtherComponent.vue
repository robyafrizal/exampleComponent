<template>
    <section>
        <div class="container">
            <div id="app">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Cart -->
                                <table>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                    <tr
                                        v-for="(item, index) in cart"
                                        :key="index"
                                    >
                                        <td>{{ item.productName }}</td>
                                        <td>{{ item.price }}</td>
                                        <td>{{ item.quantity }}</td>
                                        <td>
                                            {{ item.price * item.quantity }}
                                            Coins
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- Shop -->
                        <div class="row">
                            <div
                                class="col-md-3"
                                v-for="product in products"
                                :key="product.id"
                            >
                                <div class="card">
                                    <div class="card-body">
                                        <div class="product">
                                            <img
                                                :src="product.productImage"
                                                alt="Product Img"
                                            />
                                            <h4 class="text-info">
                                                {{ product.productName }}
                                            </h4>
                                            <h4 class="text-muted">
                                                {{ product.price }} Coins
                                            </h4>
                                            <p class="text-muted">
                                                {{ product.productDescription }}
                                            </p>
                                            <input
                                                type="number"
                                                name="quantity"
                                                class="form-control"
                                                value="1"
                                            />
                                            <input
                                                type="hidden"
                                                name="productName"
                                                value="{{productID}}"
                                            />
                                            <input
                                                type="hidden"
                                                name="price"
                                                value="{{productID.price}}"
                                            />
                                            <input
                                                type="submit"
                                                name="add_to_cart"
                                                @click="addToCart"
                                                class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                value="Add to Cart"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            products: "",
            cart: [],
        };
    },
    methods: {
        getproducts: function () {
            axios
                .get("http://localhost:8888/DevsDev2022/productAPI/products")
                .then(function (response) {
                    app.products = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        addToCart: function (product) {
            var cartItem = this.cart.find(
                (item) => item.productName === product.productName
            );
            if (cartItem) {
                cartItem.quantity++;
            } else {
                this.cart.push({
                    productName: product.productName,
                    price: product.price,
                    quantity: 1,
                });
            }
        },
        removeFromCart: function (product) {
            var cartItem = this.cart.find(
                (item) => item.productName === product.productName
            );
            if (cartItem.quantity > 1) {
                cartItem.quantity--;
            } else {
                this.cart.splice(this.cart.indexOf(cartItem), 1);
            }
        },
        clearCart: function () {
            this.cart = [];
        },
    },
    mounted: function () {
        this.getproducts();
    },
};
</script>

<style></style>
