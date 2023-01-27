<template>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card px-5 py-5" id="form1">
                    <form @submit.prevent="login">
                        <div class="form-data">
                        <div class="forms-inputs mb-4">
                            <label for="" class="form-label">Email</label>
                            <input autocomplete="off" type="text" v-model="form.email" v-bind:class="{
                                'form-control': true,
                            }" />
                            <div class="invalid-feedback">A valid email is required!</div>
                        </div>
                        <div class="forms-inputs mb-4">
                            <label for="" class="form-label">Password</label>
                            <input autocomplete="off" type="password" v-model="form.password" v-bind:class="{
                                'form-control': true,
                            }" />
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success w-100">
                                Login
                            </button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive } from "@vue/reactivity";
import { inject } from "@vue/runtime-core";


let form = reactive({
    email: '',
    password: ''
}) 
const axios = inject('axios')

const login = async()=>{
    await axios.post('http://localhost:8000/api/login',form).then(res=>{
        console.log(res)
    })
}
</script>

<style scoped>
.card {
    border: none;
    height: 320px;
}

.forms-inputs {
    position: relative;
}

.forms-inputs span {
    position: absolute;
    top: -18px;
    left: 10px;
    background-color: #fff;
    padding: 5px 10px;
    font-size: 15px;
}

.forms-inputs input {
    height: 50px;
    border: 2px solid #eee;
}

.forms-inputs input:focus {
    box-shadow: none;
    outline: none;
    border: 2px solid #000;
}

.btn {
    height: 50px;
}
</style>