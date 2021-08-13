<template>
    <div class="card card-info min-vh-100">
        <div class="card-header">
            <h3 class="card-title float-start">Contacts</h3>
            <button
                type="button"
                class="btn btn-primary float-end"
                @click="isOpen = true"
            >
                Add Contact
            </button>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div
            class="alert alert-primary d-flex align-middle my-auto"
            role="alert"
            v-if="contacts.data.length == 0"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="currentColor"
                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"
                viewBox="0 0 16 16"
                role="img"
                aria-label="Warning:"
            >
                <path
                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                />
            </svg>
            <div>You dont have any contacts yet. Please create a new one.</div>
        </div>
        <table class="table" v-if="contacts.data.length > 0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Manage</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="contact in contacts.data" :key="contact.id">
                    <th scope="row">{{ contact.id }}</th>
                    <td>{{ contact.name }}</td>
                    <td>{{ contact.phone }}</td>
                    <td>
                        <edit-button :id="contact.id" @click="edit(contact)" />
                        <delete-button
                            :id="contact.id"
                            @click="confirnDelete(contact)"
                        />
                    </td>
                </tr>
            </tbody>
        </table>
        <pagination :links="contacts.links" />
    </div>
    <Create
        v-if="isOpen"
        @modelStatusChanged="modalStatus"
        :contact="contact"
        :isEdit="isEdit"
    />
    <confirm-box
        v-if="showConfirmBox"
        :confirmed="deleteContact"
        @hidden="showConfirmBox = false"
        heading="Warning!"
        :message="deleteConfirmation"
        confirmText="Yes"
        cancelText="No"
    />
</template>
<script>
import Main from "@/Layouts/Main.vue";
import Create from "@/Pages/Contact/Form.vue";
import EditButton from "@/Components/EditButton.vue";
import DeleteButton from "@/Components/DeleteButton.vue";
import ConfirmBox from "@/Components/ConfirmBox.vue";
import Pagination from "@/Components/Pagination.vue";

export default {
    layout: Main,
    props: {
        auth: Object,
        errors: Object,
        contacts: Object,
        flash: Object,
    },
    components: {
        Create,
        EditButton,
        DeleteButton,
        ConfirmBox,
        Pagination,
    },
    data() {
        return {
            contact: null,
            isOpen: false,
            isEdit: false,
            showConfirmBox: false,
        };
    },
    methods: {
        edit(contact) {
            this.contact = contact;
            this.isEdit = true;
            this.isOpen = true;
        },
        confirnDelete(contact) {
            this.contact = contact;
            this.showConfirmBox = true;
        },
        modalStatus(status) {
            this.isOpen = status;
        },
        hideConfirmation() {
            this.showConfirmBox = false;
        },
        deleteContact() {
            this.$inertia.delete(
                this.route("contacts.destroy", this.contact.id)
            );
        },
    },

    computed: {
        deleteConfirmation() {
            return `Are you sure went to delete ${this.contact.name}?`;
        },
    },
    mounted() {
        this.$store.dispatch("setAuth", this.auth);

        if (this.flash.success) {
            var toast = {
                bg: "bg-success",
                message: this.flash.success,
            };
        }
        if (toast) {
            this.$store.dispatch("showToast", toast);
        }
    },
    updated() {
        if (this.flash.success) {
            var toast = {
                bg: "bg-success",
                message: this.flash.success,
            };
        }
        if (toast) {
            this.$store.dispatch("showToast", toast);
        }
    },
};
</script>
