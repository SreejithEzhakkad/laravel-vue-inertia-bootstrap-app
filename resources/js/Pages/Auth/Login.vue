<template>
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-lg-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body">
                    <section class="form-signin">
                        <form @submit.prevent="submit">
                            <Logo />
                            <Heading>Please Login</Heading>
                            <div class="form-floating">
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    placeholder="Email address"
                                    v-model="form.email"
                                    required
                                    autofocus
                                    autocomplete="username"
                                />
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating">
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="Password"
                                    v-model="form.password"
                                    required
                                    autocomplete="current-password"
                                />
                                <label for="password">Password</label>
                            </div>

                            <div class="checkbox mb-3">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input
                                            type="checkbox"
                                            value="remember-me"
                                            :checked="form.remember"
                                        />
                                        Remember me
                                    </div>
                                    <div class="col-sm-6">
                                        <inertia-link
                                            :href="route('password.request')"
                                            class="
                                                float-end
                                                text-decoration-none
                                                link-primary
                                            "
                                            >Forgot Password?</inertia-link
                                        >
                                    </div>
                                </div>
                            </div>
                            <SubmitButton :disabled="form.processing"
                                >Sign in</SubmitButton
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
        canResetPassword: Boolean,
        errors: Object,
        status: String,
    },
    data() {
        return {
            form: this.$inertia.form({
                email: "",
                password: "",
                remember: false,
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("login"), {
                onFinish: () => {
                    this.form.reset("password");
                    if (Object.entries(this.errors).length !== 0) {
                        var toast = {
                            bg: "bg-danger",
                        };

                        if (this.errors.hasOwnProperty("email")) {
                            toast.message = this.errors.email;
                        }

                        if (this.errors.hasOwnProperty("password")) {
                            toast.message = this.errors.password;
                        }
                    }
                    if (toast) {
                        this.$store.dispatch("showToast", toast);
                    }
                }
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

.form-signin .checkbox {
    font-weight: 400;
}

.form-signin .form-floating:focus-within {
    z-index: 2;
}

.form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
</style>
