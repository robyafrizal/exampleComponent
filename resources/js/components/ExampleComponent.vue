<template>
    <div class="container my-5 p-3">
        <h1>Semua Produk</h1>
        <product-component :productData="products" @emit-add="addToCart" />
        <h1>Keranjang Belanja</h1>
        <cart-component
            :cartData="carts"
            :total="total"
            @emit-delete="deleteItem"
            v-show="isCarts"
        />
        <button-component
            @emit-button="checkout()"
            text="Checkout"
            class="btn-success"
            v-show="isCarts"
        />
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
            carts: [],
            isCarts: false,
        };
    },
    methods: {
        addToCart(idx) {
            this.products[idx].stock = this.products[idx].stock - 1;

            if (this.products[idx].stock > 0) {
                this.carts.push({
                    nama: this.products[idx].name,
                    quantity: 1,
                    harga: this.products[idx].price,
                });
                this.isCarts = true;
            } else {
                this.carts[idx].quantity++;
            }
            this.total += this.carts[idx].harga;
            console.log(this.carts[idx]);
        },
        checkout() {
            return alert("Pesanan anda adalah : " + this.total);
        },
        deleteItem(ids) {
            // console.log("delete file", ids);

            this.carts.splice(this.carts[ids], 1);
            if (this.carts === undefined) {
                this.isCarts = false;
            }
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
