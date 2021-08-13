<template>
    <div class="row align-items-md-stretch pb-5">
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h2>Manage Contacts</h2>
                <p>View, Add, Edit, Delete your contacts here.</p>
                <a :href="route('contacts.index')" class="btn btn-outline-dark"
                    >Contacts</a
                >
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h2>Upcoming Feature</h2>
                <p>Change your name, email and password here.</p>
                <button class="btn btn-outline-dark disabled" type="button">
                    Coming Soon
                </button>
            </div>
        </div>
    </div>

    <div class="row align-items-md-stretch pb-5">
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h2>Upcoming Feature</h2>
                <p>A new feature will come here.</p>
                <button class="btn btn-outline-dark disabled" type="button">
                    Coming Soon
                </button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h2>Upcoming Feature</h2>
                <p>A new feature will come here.</p>
                <button class="btn btn-outline-dark disabled" type="button">
                    Coming Soon
                </button>
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
        errors: Object,
    },
    mounted() {
        this.$store.dispatch("setAuth", this.auth);
    },
};
</script>
