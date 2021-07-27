<template>
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-lg-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body">
                    <section>
                        <form class="md-2" @submit.prevent="submit">
                            <Logo />
                            <Heading>Verify Your Email</Heading>
                            <div class="alert alert-success" role="alert">
                                <p>
                                    Thanks for signing up! Before getting
                                    started, could you verify your email address
                                    by clicking on the link we just emailed to
                                    you? If you didn't receive the email, we
                                    will gladly send you another.
                                </p>
                            </div>
                            <SubmitButton :disabled="form.processing"
                                >Resend Verification Email</SubmitButton
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
            form: this.$inertia.form(),
        };
    },
    methods: {
        submit() {
            this.form.post(this.route("verification.send"), {
                onFinish: () => {
                    if (this.status === "verification-link-sent") {
                        var toast = {
                            message:
                                "A new verification link has been sent to the email address you provided during registration.",
                            bg: "bg-success",
                        };
                    } else if (Object.entries(this.errors).length !== 0) {
                        var toast = {
                            bg: "bg-danger",
                            message: "Something went wrong, please try again.",
                        };
                    }
                    if (toast) {
                        this.$store.dispatch("showToast", toast);
                    }
                },
            });
        },
    },
    mounted() {
        this.$store.dispatch("setAuth", this.auth);
    },
};
</script>
