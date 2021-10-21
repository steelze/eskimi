<template>
    <div class="modal fade" :id="identifier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" :aria-labelledby="`${identifier}Label`" aria-hidden="true" :ref="identifier">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" :id="`${identifier}Label`">
                        <slot name="header">Default Title</slot>
                    </h5>
                    <button type="button" class="btn-close" aria-label="Close" @click.prevent="closeModal"></button>
                </div>
                <div class="modal-body">
                    <slot name="body">This is the default body</slot>
                </div>
                <div class="modal-footer">
                    <slot name="footer"></slot>
                    <button type="button" class="btn btn-sm btn-secondary" @click.prevent="closeModal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Modal",
    props: {
        identifier: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            modal: null
        }
    },
    mounted() {
        this.modal = new bootstrap.Modal(this.$refs[this.identifier], { keyboard: false})
    },
    methods: {
        closeModal() {
            this.modal.hide();
        },
        openModal() {
            this.modal.show();
        }
    }
};
</script>
