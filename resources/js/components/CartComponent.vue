<template>
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
            <tr v-for="(cart, ids) in cartData" :key="ids">
                <td>{{ cart.nama }}</td>
                <td>{{ cart.quantity }}</td>
                <td>Rp. {{ cart.harga }}</td>
                <td>
                    <button-component
                        @emit-button="deleteItem(index)"
                        text="Delete"
                        class="btn-danger"
                    />
                </td>
            </tr>
            <tr v-show="isCarts">
                <td colspan="2">Total</td>
                <td>Rp. {{ total }}</td>
                <td></td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    emits: ["emit-delete"],
    props: {
        cartData: {
            type: Array,
            default: () => {
                return [];
            },
        },
    },
    methods: {
        deleteItem(idx) {
            this.$emit("emit-delete", idx);
        },
    },
};
</script>

<style></style>
