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
                <tr v-for="(keranjang, ids) in keranjangs" :key="ids">
                    <td>{{ keranjang.nama }}</td>
                    <td>{{ keranjang.quantity }}</td>
                    <td>Rp. {{ keranjang.harga }}</td>
                    <td>
                        <button
                            type="button"
                            class="btn btn-danger"
                            v-on:click="deleteItem(ids)"
                        >
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
            total: 0,
            keranjangs: [
                {
                    nama: "Indomie Goreng Rendang",
                    quantity: 0,
                    harga: 3900,
                },
                {
                    nama: "Mie Gelas Rendang",
                    quantity: 0,
                    harga: 2500,
                },
                {
                    nama: "Bakmi Mewah",
                    quantity: 0,
                    harga: 10000,
                },
            ],
        };
    },
    methods: {
        addToCart(idx) {
            // console.log(this.products[idx].stock, idx);
            let output = {
                stock: this.products[idx].stock - 1,
            };
            let result = {
                quantity: this.keranjangs[idx].quantity + 1,
                // harga:
                //     this.keranjangs[idx].harga *
                //     (this.keranjangs[idx].quantity + 1),
            };
            this.products[idx].stock = output.stock;
            this.keranjangs[idx].quantity = result.quantity;
            this.keranjangs[idx].harga *= result.quantity;
            this.total += this.keranjangs[idx].harga;
        },
        checkout() {
            return alert("Pesanan anda adalah : " + this.total);
        },
        deleteItem(ids) {
            // console.log("delete file", ids);
            this.keranjangs.splice(ids, 1);
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
