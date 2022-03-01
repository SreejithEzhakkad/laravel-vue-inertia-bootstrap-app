<template>
    <div class="modal" tabindex="-1" id="confirmModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ heading }}</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <p>{{ message }}</p>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        {{ cancelText }}
                    </button>
                    <button
                        type="button"
                        class="btn btn-danger"
                        @click="actionConfirmed()"
                    >
                        {{ confirmText }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Modal } from "bootstrap";

export default {
    props: {
        heading: String,
        message: String,
        confirmText: String,
        cancelText: String,
        confirmed: Function,
    },
    data() {
        return {
            modal: null,
        };
    },
    methods: {
        actionConfirmed() {
            this.confirmed();
            this.modal.hide();
        },
    },
    mounted() {
        var modalEl = document.getElementById("confirmModal");
        this.modal = new Modal(modalEl);
        this.modal.show();

        modalEl.addEventListener("hidden.bs.modal", (event) => {
            this.$emit("hidden");
        });
    },
};
</script>
