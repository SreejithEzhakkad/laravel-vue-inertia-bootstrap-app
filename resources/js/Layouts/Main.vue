<template>
    <Header />
	<main class="flex-shrink-0 text-center">
        <div class="container">
            <slot />
        </div>
        <Toast
            v-if="toast"
            :message="toast.message"
            :bg="toast.bg"
            :id="toast.id"
        />
    </main>
    <Footer />
</template>
<style scoped>
main {
    padding-top: 8%;
}
</style>
<script>
import Header from "@/Layouts/Header.vue";
import Footer from "@/Layouts/Footer.vue";
import Toast from "@/Components/Toast.vue";
import { mapGetters } from "vuex";

export default {
    components: {
        Header,
        Footer,
        Toast,
    },
    computed: {
        ...mapGetters(["toast"]),
    },
};
</script>
