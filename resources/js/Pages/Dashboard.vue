<template>
    <div class="container col-xxl-8 px-1 py-1">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import Main from "@/Layouts/Main.vue";

export default {
    layout: Main,
    props: {
        auth: Object,
        errors: Object,
    },
    mounted() {
        this.$store.dispatch("setAuth", this.auth);
    },
};
</script>
