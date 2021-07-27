<template>
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-lg-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body">
                    <section class="form-signin">
                        <form @submit.prevent="submit">
                            <Logo />
                            <Heading>Forgot password?</Heading>
                            <div class="form-floating">
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    placeholder="name@example.com"
                                    v-model="form.email"
                                    required
                                    autofocus
                                    autocomplete="username"
                                />
                                <label for="email">Email address</label>
                            </div>
                            <SubmitButton :disabled="form.processing"
                                >Email Password Reset Link</SubmitButton
                            >
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Main from "@/Layouts/Main.vue";
import Logo from "@/Components/Auth/Logo.vue";
import Heading from "@/Components/Auth/Heading.vue";
import SubmitButton from "@/Components/Auth/SubmitButton.vue";

export default {
    layout: Main,
    components: {
        Logo,
        Heading,
        SubmitButton,
    },
    props: {
        auth: Object,
        errors: Object,
        status: String,
    },
    data() {
        return {
            form: this.$inertia.form({
                email: "",
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("password.email"), {
                onFinish: () => {
                    if (Object.entries(this.errors).length !== 0) {
                        var toast = {
                            message: this.errors.email,
                            bg: "bg-danger",
                        };
                    } else if (
                        Object.entries(this.errors).length === 0 &&
                        this.status
                    ) {
                        var toast = {
                            message: this.status,
                            bg: "bg-success",
                        };
                    }
                    if (toast) {
                        this.$store.dispatch("showToast", toast);
                    }
                },
            });
        },
    },
};
</script>
<style scoped>
.form-signin {
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: auto;
}

.form-signin .form-floating:focus-within {
    z-index: 2;
}

.form-signin input[type="email"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
</style>
