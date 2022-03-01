<template>
    <header class="p-3 bg-dark text-white fixed-top">
        <div class="container">
            <div
                class="
                    d-flex
                    flex-wrap
                    align-items-center
                    justify-content-center justify-content-lg-start
                "
            >
                <a
                    href="/"
                    class="
                        d-flex
                        align-items-center
                        mb-2 mb-lg-0
                        text-white text-decoration-none
                    "
                >
                    <img
                        class="bi me-2"
                        src="/images/bootstrap-logo-white.svg"
                        alt=""
                        width="40"
                        height="32"
                    />
                </a>
                <ul
                    class="
                        nav
                        col-12 col-lg-auto
                        me-lg-auto
                        mb-2
                        justify-content-center
                        mb-md-0
                    "
                >
                    <li v-if="auth != null">
                        <inertia-link
                            :href="route('dashboard')"
                            class="nav-link px-2 text-white"
                            >Dashboard</inertia-link
                        >
                    </li>

                    <li v-if="auth != null">
                        <inertia-link
                            :href="route('contacts.index')"
                            class="nav-link px-2 text-white"
                            >Contacts</inertia-link
                        >
                    </li>
                </ul>
                <div class="text-end" v-if="auth === null">
                    <inertia-link
                        :href="route('login')"
                        method="get"
                        as="button"
                        type="button"
                        class="btn btn-outline-light me-2"
                        >Login</inertia-link
                    >
                    <inertia-link
                        :href="route('register')"
                        method="get"
                        as="button"
                        type="button"
                        class="btn btn-warning"
                        >Register</inertia-link
                    >
                </div>
                <div class="dropdown text-end" v-if="auth != null">
                    <a
                        href="#"
                        class="
                            d-block
                            link-light
                            text-decoration-none
                            dropdown-toggle
                        "
                        id="dropdownUser1"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="32"
                            height="32"
                            fill="currentColor"
                            class="bi bi-person-circle"
                            viewBox="0 0 16 16"
                        >
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path
                                fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
                            />
                        </svg>
                    </a>
                    <ul
                        class="dropdown-menu text-small"
                        aria-labelledby="dropdownUser1"
                    >
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <inertia-link
                                :href="route('logout')"
                                method="post"
                                as="button"
                                class="dropdown-item"
                                >Sign out</inertia-link
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</template>
<script>
import { mapGetters } from "vuex";

export default {
    computed: {
        ...mapGetters(["auth"]),
    },
};
</script>
