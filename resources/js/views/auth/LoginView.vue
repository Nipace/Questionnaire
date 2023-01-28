<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h2 class="text-center text-success fw-bold">Questionnaire App</h2>
            <h5 class="card-title text-center mb-5 fw-light fs-5 fw-bold">
              SIGN IN
            </h5>
            <p class="text-danger text-center fw-bold">{{hasError}}</p>
            <form @submit.prevent="login">
              <div class="form-floating mb-3">
                <input
                  type="email"
                  class="form-control"
                  id="floatingInput"
                  placeholder="name@example.com"
                  v-model="form.email"
                />
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input
                  type="password"
                  class="form-control"
                  id="floatingPassword"
                  placeholder="Password"
                  v-model="form.password"
                />
                <label for="floatingPassword">Password</label>
              </div>

              <div class="d-grid">
                <button
                  class="btn btn-success btn-login text-uppercase fw-bold"
                  type="submit"
                >
                  Sign in
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
import { reactive,ref } from "vue";
import {useRouter} from 'vue-router';

const router= useRouter()
let form = reactive({
  email: "",
  password: "",
});
let hasError = ref('');
const login = async () => {
  await axios.post("/api/login", form).then((res) => {
    if(res.data.status === true){
        localStorage.setItem('token',res.data.data.token)
        router.push('/admin/dashboard');
    } 
  }).catch(err=>{
    if(err.response){
        hasError.value = err.response.data.message
    }
  });
};
</script>

<style>
.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}
</style>