<template>
    <div class="container my-5 p-3">
        <h1>Semua Produk</h1>
        <table class="table table-hover my-4">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in products" :key="index">
                    <td>{{ product.name }}</td>
                    <td>{{ product.description }}</td>
                    <td>{{ product.stock }}</td>
                    <td>Rp. {{ product.price }}</td>
                    <td>
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click="addToCart(index)"
                            :class="product.stock == 0 ? 'lost' : ''"
                        >
                            Add to Cart
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <h1>Keranjang Belanja</h1>
        <table class="table table-hover my-4">
            <thead>
                <tr>
                    <th scope="col" class="lc">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ products[0].name }}</td>
                    <td>{{ products[0].stock }}</td>
                    <td>Rp. {{ products[0].price }}</td>
                    <td>
                        <button type="button" class="btn btn-danger">
                            Delete
                        </button>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Total</td>
                    <td>Rp. {{ total }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-success" v-on:click="checkout">
            Checkout
        </button>
    </div>
</template>

<script>
export default {
    name: "Example",
    data: () => {
        return {
            products: [
                {
                    name: "Indomie Goreng Rendang",
                    description: "Masakan instant terenak sedunia",
                    stock: 10,
                    price: 3900,
                },
                {
                    name: "Mie Gelas Rendang",
                    description: "Mie instant khusus anak kosan",
                    stock: 5,
                    price: 2500,
                },
                {
                    name: "Bakmi Mewah",
                    description: "Kalau anak kos jangan macam2 lah",
                    stock: 78,
                    price: 10000,
                },
            ],
            total: 123456,
        };
    },
    methods: {
        addToCart(idx) {
            // console.log(this.products[idx].stock, idx);
            let output = {
                stock: this.products[idx].stock - 1,
            };
            this.products[idx].stock = output.stock;
        },
        checkout() {
            return alert("Pesanan anda adalah : " + this.total);
        },
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
<style>
.container {
    background: rgb(244, 247, 249);
}
th {
    font-size: 18px;
    font-weight: bold;
}
th.lc {
    width: 325px;
}
.lost {
    display: none;
}
</style>
