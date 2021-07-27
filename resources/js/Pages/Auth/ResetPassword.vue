<template>
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-lg-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body">
                    <section class="form-signin">
                        <form @submit.prevent="submit">
                            <Logo />
                            <Heading>Reset Password</Heading>
                            <div class="form-floating">
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    v-model="form.email"
                                    placeholder="name@example.com"
                                    autocomplete="username"
                                    autofocus
                                    required
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
                                    autocomplete="new-password"
                                    required
                                />
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating">
                                <input
                                    type="password"
                                    class="form-control confirm-password"
                                    id="password_confirmation"
                                    v-model="form.password_confirmation"
                                    placeholder="Confirm Password"
                                    autocomplete="new-password"
                                    required
                                />
                                <label for="floatingPassword"
                                    >Confirm Password</label
                                >
                            </div>
                            <SubmitButton :disabled="form.processing">Reset Password</SubmitButton>
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
        email: String,
        errors: Object,
        token: String,
    },
    data() {
        return {
            form: this.$inertia.form({
                token: this.token,
                email: this.email,
                password: '',
                password_confirmation: '',
            })
        }
    },
    methods: {
        submit() 
        {
            this.form.post(this.route('password.update'), {
                onFinish: () => {
                    this.form.reset('password', 'password_confirmation')
                    if (Object.entries(this.errors).length !== 0) {
                        var toast = {
                            bg: "bg-danger",
                        };
                        
                        if (this.errors.hasOwnProperty('email')) {
                            toast.message = this.errors.email;
                        }
                        
                        if (this.errors.hasOwnProperty('password')) {
                            toast.message = this.errors.password;
                        }

                        if (this.errors.hasOwnProperty('token')) {
                            toast.message = this.errors.token;
                        }
                    } 
                    if (toast) {
                        this.$store.dispatch("showToast", toast);
                    }
                }
            })
        }
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
