<template>
    <BaseView />
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h2 class="text-center text-success fw-bold">Add Questionnaire</h2>
                        <h5 class="card-title text-center mb-5 fw-light fs-5 fw-bold">
                            Enter Questionnaire Details
                        </h5>
                        <form @submit.prevent="create">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="floatingInput" class="form-label">Title</label>
                                    <input type="title" class="form-control" id="floatingInput"
                                        placeholder="Enter Title" v-model="form.title" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Expiry Date</label>
                                    <input type="date" name="expiry_date" class="form-control" id="floatingPassword"
                                        placeholder="Enter Expiry Date" v-model="form.expiry_date" />
                                </div>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-danger text-uppercase fw-bold" type="submit">
                                    Generate
                                </button>
                            </div>
                            <hr class="my-4" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { reactive } from 'vue';
    import BaseView from '../../layouts/BaseView.vue'
    import { useRouter } from 'vue-router';

    const router = useRouter()

    let form = reactive({
        title: '',
        expiry_date: ''
    })

    const create = () => {
        axios.post('/api/questionnaire', form)
            .then(res => {
                alert(res.data.message)
                router.push({name:'questionnaire'})
            })
    }
</script>

<style>

</style>