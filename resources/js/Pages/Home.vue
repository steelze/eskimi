<template>
    <div class="row">
        <div class="col-4" v-for="campaign in campaigns" :key="campaign.id">
            <Campaign :campaign="campaign" />
        </div>
    </div>
</template>

<script>
import Campaign from '../Components/Campaign.vue';

export default {
    name: 'Home',
    components: {
        Campaign,
    },
    data() {
        return {
            campaigns: [],
        }
    },
    mounted() {
        this.fetchCampaigns();
    },
    methods: {
        async fetchCampaigns() {
            const response = await axios.get('/campaigns');
            this.campaigns = response.data;
        },
    },
}
</script>

