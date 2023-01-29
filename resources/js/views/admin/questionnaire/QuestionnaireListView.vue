<template>
    <BaseView />
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h2 class="text-center text-success fw-bold">Active Questionnaires</h2>
                        <h5 class="card-title text-center mb-5 fw-light fs-5 fw-bold">
                            List of Active Questionnaires 
                        </h5>
                            <div v-if="loading">Inviting to all students please wait for a while (It might take some time)............</div>
                        <div class="data" v-else>
                            <router-link :to="{name:'create-questionnaire'}" class="btn btn-success mb-5">Create New</router-link>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Expiry Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr v-for="questionnaire in questionnaires" :key="questionnaire.id">
                                    <th scope="row">1</th>
                                    <td>{{ questionnaire.title }}</td>
                                    <td>{{ questionnaire.expiry_date }}</td>
                                    <td><button class="btn btn-danger btn-sm" @click="invite(questionnaire.id)">Invite</button></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted,ref } from 'vue';
import { $authApi } from '../../../auth';
import BaseView from '../../layouts/BaseView.vue'
const questionnaires = ref({})
const loading = ref(false)
const invite = (questionnaire_id) => {
    loading.value = true;
    $authApi.post('/api/invite/'+questionnaire_id).then(res => {
        loading.value = false;
        alert(res.data.message);
    })
}
onMounted(()=>{
    $authApi.get('/api/questionnaire').then(res=>{
       questionnaires.value = res.data.data
    })
})
</script>

<style>

</style>