<template>
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-lg-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body">
                    <section class="form-signin">
                        <form @submit.prevent="submit">
                            <Logo />
                            <Heading>Please Register</Heading>
                            <div class="form-floating">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    v-model="form.name"
                                    placeholder="Name"
                                    required
                                    autofocus
                                    autocomplete="name"
                                />
                                <label for="name">Name</label>
                            </div>
                            <div class="form-floating">
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    v-model="form.email"
                                    placeholder="name@example.com"
                                    required
                                    autocomplete="username"
                                />
                                <label for="email">E-Mail Address</label>
                            </div>
                            <div class="form-floating">
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    v-model="form.password"
                                    placeholder="Password"
                                    required
                                    autocomplete="new-password"
                                />
                                <label for="password">Password</label>
                            </div>
                            <div class="form-floating">
                                <input
                                    type="password"
                                    class="form-control confirm-password"
                                    id="password_confirmation"
                                    v-model="form.password_confirmation"
                                    placeholder="Confirm Password"
                                    required
                                    autocomplete="new-password"
                                />
                                <label for="password_confirmation"
                                    >Confirm Password</label
                                >
                            </div>
                            <SubmitButton :disabled="form.processing">Register</SubmitButton>
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
    },
    data() {
        return {
            form: this.$inertia.form({
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(this.route("register"), {
                onFinish: () => {
                    this.form.reset("password", "password_confirmation");
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

.form-signin .form-floating:focus-within {
    z-index: 2;
}

.form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}

.form-signin .confirm-password {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
</style>
