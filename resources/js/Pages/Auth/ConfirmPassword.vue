<template>
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-lg-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body">
                    <section class="form-signin">
                        <form @submit.prevent="submit">
                            <Logo/>
                            <Heading>Confirm Password</Heading>
                            <div class="form-floating">
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    v-model="form.password"
                                    placeholder="Password"
                                    autocomplete="new-password"
                                    required
                                    autofocus
                                />
                                <label for="password">Password</label>
                            </div>
                            <SubmitButton :disabled="form.processing">Confirm</SubmitButton>
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
                    password: '',
                })
        }
    },
     methods: {
        submit() {
            this.form.post(this.route('password.confirm'), {
                onFinish: () => {
                    this.form.reset()
                    if (Object.entries(this.errors).length !== 0) {
                    var toast = {
                        bg: "bg-danger",
                    };
                    
                    if (this.errors.hasOwnProperty('password')) {
                        toast.message = this.errors.password;
                    }

                    
                } 
                if (toast) {
                    this.$store.dispatch("showToast", toast);
                }
                }
                
            })
        }
    },
    mounted(){
        this.$store.dispatch('setAuth',this.auth);
    }
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

.form-signin [type="password"] {
    margin-bottom: 10px;
}
</style>
