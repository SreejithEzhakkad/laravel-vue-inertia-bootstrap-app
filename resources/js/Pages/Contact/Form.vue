<template>
    <div 
        class="modal fade"
        id="addContactModal"
        tabindex="-1"
        aria-labelledby="addContact"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addContact">
                        {{isEdit ? 'Edit' : 'Add'}} Contact
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <form @submit.prevent="submit">
                <div class="modal-body">
                    <div class="col-md-12 text-start">
                        <label for="name" class="form-label">Name:</label>
                        <div class="input-group has-validation">
                            <input type="text" :class="{'form-control':true, 'is-invalid':errors.name ? true : false}" id="name" v-model="form.name" autofocus aria-describedby="nameFeedback" required>
                            <div v-if="errors.name" id="nameFeedback" class="invalid-feedback">
                                {{errors.name}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 text-start">
                        <label for="phone" class="form-label">Phone:</label>
                        <div class="input-group has-validation">
                            <input type="tel" :class="{'form-control':true, 'is-invalid':errors.phone ? true : false}" id="phone" v-model="form.phone" aria-describedby="phoneFeedback" required>
                            <div  v-if="errors.phone" id="phoneFeedback" class="invalid-feedback">
                                {{errors.phone}}
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary" :disabled="form.processing">
                        {{isEdit ? 'Update' : 'Save'}}
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import { Modal } from 'bootstrap';

export default {
    props: {
        contact: Object,
        isEdit: Boolean
    },
    data() {
        return {
            modal: null,
            form: this.$inertia.form({
                name: this.contact ? this.contact.name : "" ,
                phone: this.contact ? this.contact.phone : ""
            }),
            errors: {
               name: null,
               phone: null 
            },
        };
    },
    mounted() {
        var modalEl = document.getElementById('addContactModal')
        this.modal = new Modal(modalEl)
        this.modal.show();
        
        modalEl.addEventListener('hidden.bs.modal',  (event) => {
            this.$emit('modelStatusChanged',false)
        })
    },
    methods: {
        close(){
            //this.isOpen = false
        },
        submit() {
            let route = this.isEdit ? this.route("contacts.update",this.contact.id) : this.route("contacts.store")
            let method = this.isEdit ? 'patch' : 'post'
            this.form[this.isEdit ?'patch' : 'post'](route, {
                onError: (errors) => {
                    
                    if (Object.entries(errors).length !== 0) {
                        var toast = {
                            bg: "bg-danger",
                        };

                        if (errors.hasOwnProperty("name")) {
                            toast.message = errors.name;
                            this.errors.name = errors.name;
                        }

                        if (errors.hasOwnProperty("phone")) {
                            toast.message = errors.phone;
                            this.errors.phone = errors.phone;
                        }
                    }
                }, 
                onSuccess: () => {
                    this.form.reset();
                    this.modal.hide();

                }
            });
        },
    },
};
</script>
