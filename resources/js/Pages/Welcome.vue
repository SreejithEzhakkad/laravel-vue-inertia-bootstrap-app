<template>
    <div class="container col-xxl-8 px-1 py-1">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img
                    src="/images/home.gif"
                    class="d-block mx-lg-auto img-fluid"
                    alt="Bootstrap Themes"
                    width="700"
                    height="500"
                    loading="lazy"
                />
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Laravel Auth & CRUD</h1>
                <p class="lead">
                    This is a simple web application developed using
                    <a
                        href="https://laravel.com/docs/8.x"
                        class="link-dark text-decoration-none"
                        target="_blank"
                        >Laravel 8</a
                    >,
                    <a
                        href="https://v3.vuejs.org"
                        class="link-dark text-decoration-none"
                        target="_blank"
                        >Vue.js 3</a
                    >(also
                    <a
                        href="https://next.vuex.vuejs.org"
                        class="link-dark text-decoration-none"
                        target="_blank"
                        >Vuex 4</a
                    >),
                    <a
                        href="https://inertiajs.com"
                        class="link-dark text-decoration-none"
                        target="_blank"
                        >Inertia.js</a
                    >, and
                    <a
                        href="https://getbootstrap.com/docs/5.0/getting-started/introduction"
                        class="link-dark text-decoration-none"
                        target="_blank"
                        >Bootstrap 5</a
                    >. This application includes authentication and a simple
                    CRUD.
                </p>
                <div class="d-grid gap-2 d-md-flex justify-content-center">
                    <a
                        href="https://github.com/SreejithEzhakkad/laravel8-app"
                        target="_blank"
                        class="btn btn-outline-dark px-4 btn-lg"
                        role="button"
                        >Get Source Code</a
                    >
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Main from "@/Layouts/Main.vue";

export default {
    layout: Main,
    props: {
        auth: Object,
        canLogin: Boolean,
        canRegister: Boolean,
        errors: Object,
        laravelVersion: String,
        phpVersion: String,
    },
    mounted() {
        this.$store.dispatch("setAuth", this.auth);
    },
};
</script>
