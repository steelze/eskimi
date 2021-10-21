<template>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h5>Create Campaign</h5>
            <hr>
            <form method="post" enctype="multipart/form-data" @submit.prevent="submitForm">
                <div class="row g-3">
                    <div class="col-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" v-model="form.name">
                        <span class="invalid-feedback d-block" v-if="errors.name">{{ errors.name[0] }}</span>
                    </div>
                    <div class="col-md-6">
                        <label for="from_date" class="form-label">From Date</label>
                        <input type="date" name="from_date" class="form-control" v-model="form.from_date" id="from_date">
                        <span class="invalid-feedback d-block" v-if="errors.from_date">{{ errors.from_date[0] }}</span>
                    </div>
                    <div class="col-md-6">
                        <label for="to_date" class="form-label">To Date</label>
                        <input type="date" name="to_date" class="form-control" v-model="form.to_date" id="to_date">
                        <span class="invalid-feedback d-block" v-if="errors.to_date">{{ errors.to_date[0] }}</span>
                    </div>
                    <div class="col-md-6">
                        <label for="daily_budget" class="form-label">Daily Budget</label>
                        <input type="number" min="0" name="daily_budget" class="form-control" v-model="form.daily_budget" id="daily_budget">
                        <span class="invalid-feedback d-block" v-if="errors.daily_budget">{{ errors.daily_budget[0] }}</span>
                    </div>
                    <div class="col-md-6">
                        <label for="total_budget" class="form-label">Total Budget</label>
                        <input type="number" min="0" name="total_budget" class="form-control" v-model="form.total_budget" id="total_budget">
                        <span class="invalid-feedback d-block" v-if="errors.total_budget">{{ errors.total_budget[0] }}</span>
                    </div>
                    <div class="col-md-6">
                        <label for="file" class="form-label">Images</label>
                        <input type="file" @change="onChangeImage" class="form-control" id="file" multiple>
                        <span class="invalid-feedback d-block" v-if="errors.images">{{ errors.images[0] }}</span>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" :disabled="processing">{{ (processing) ? 'Please wait...' : 'Submit' }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CreateCampaign',
    data() {
        return {
            form: {
                name: '',
                from_date: '',
                to_date: '',
                daily_budget: '',
                total_budget: '',
            },
            images: {},
            processing: false,
            errors: {},
        }
    },
    methods: {
        onChangeImage(e) {
            this.images = e.target.files;
        },
        async submitForm() {
            try {
                this.processing = true;
                this.errors = {};
                const formData = new FormData()
                for (const key in this.form) {
                    if (Object.hasOwnProperty.call(this.form, key)) {
                        const element = this.form[key];
                        formData.append(key, element)
                    }
                }
                for (const i of Object.keys(this.images)) {
                    formData.append('images[]', this.images[i])
                }
                const response = await axios.post('/campaigns', formData);
                this.images = {};
                for (const key in this.form) {
                    if (Object.hasOwnProperty.call(this.form, key)) {
                        this.form[key] = '';
                    }
                }
                alert('Submitted successfuly')
                console.log(response);
            } catch (error) {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                    alert('Validation Error')
                }
                console.log(error.response);
            } finally {
                this.processing = false;
            }
        }
    }
}
</script>
