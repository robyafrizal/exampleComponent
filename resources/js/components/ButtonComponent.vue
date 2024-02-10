<template>
    <button type="button" class="btn btn-primary" @click="buttonClick(index)">
        {{ text }}
    </button>
</template>

<script>
export default {
    emits: ["emit-button"],
    props: {
        text: {
            type: String,
            default: "",
        },
    },
    methods: {
        buttonClick(idx) {
            this.$emit("emit-button", idx);
        },
    },
};
</script>

<style></style>
