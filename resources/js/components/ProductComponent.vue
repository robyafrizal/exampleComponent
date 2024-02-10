<template>
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
            <tr v-for="(item, index) in productData" :key="index">
                <td>{{ item.name }}</td>
                <td>{{ item.description }}</td>
                <td>{{ item.stock }}</td>
                <td>Rp. {{ item.price }}</td>
                <td>
                    <button-component
                        @emit-button="addToCart(index)"
                        text="AddToCart"
                        :class="item.stock == 0 ? 'lost' : ''"
                    />
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    emits: ["emit-add"],
    props: {
        productData: {
            type: Array,
            default: () => {
                return [];
            },
        },
    },
    methods: {
        addToCart(idx) {
            this.$emit("emit-add", idx);
        },
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
