<template>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ campaign.name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ campaign.from_date_formatted }} - {{ campaign.to_date_formatted }}</h6>
            <p class="card-text">Daily Budget: ${{ campaign.daily_budget_formatted }}</p>
            <p class="card-text">Total Budget: ${{ campaign.total_budget_formatted }}</p>
            <router-link :to="{ name: 'campaign_edit', params: { id: campaign.id } }" class="card-link">Edit Campaign</router-link>
            <a @click.prevent="$refs[ref].openModal()" href="javascript:void(0)" class="card-link">View creatives</a>
        </div>

        <Modal :ref="ref" :identifier="`campaign-modal-${campaign.id}`">
            <template v-slot:header>{{ campaign.name }}</template>
            <template v-slot:body>
                <div class="row">
                    <div class="col-md-4" v-for="image in campaign.images" :key="image" >
                        <div class="card">
                            <img :src="`/${image}`" class="card-img-top" alt="" />
                        </div>
                    </div>
                </div>
            </template>
        </Modal>
    </div>
</template>

<script>
import Modal from './Modal.vue';

export default {
    props: {
        campaign: {
            type: Object,
            required: true,
        }
    },
    components: {
        Modal,
    },
    data() {
        return {
            ref: `campaignModal${this.campaign.id}`
        }
    },
}
</script>
