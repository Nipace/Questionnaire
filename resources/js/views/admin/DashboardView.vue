<template>
  <BaseView />
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h2 class="text-center text-success fw-bold"> Questionnaire App </h2>
            <h3 class="text-center fw-bold mt-3">WELCOME TO DASHBOARD PAGE</h3>
            <div class="text-center mt-4">
              <router-link :to="{ name: 'create-questionnaire' }" class="btn btn-success mx-3">Add
                Questionnaire</router-link>

              <router-link :to="{ name: 'questionnaire' }" class="btn btn-danger">Invite Students</router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import BaseView from '../layouts/BaseView.vue'

</script>

<style>

</style>