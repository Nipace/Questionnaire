<template>
  <BaseView/>
  <div class="container">
      <div class="row">
        <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
          <div><h1 class="text-success fw-bold">Questionnaire App</h1> </div>
          <span class="line">|</span>
          <div>
            <img src="../../assets/images/logo.png" width="100">
            <span class="plus">+</span>
          <img src="../../assets/images/laravel.png" width="100" style="margin-left:30px;">
          </div>

          </div>
        </div>
      </div>
</template>

<script setup>
import BaseView from '../layouts/BaseView.vue'
</script>

<style>
  .plus{
    font-size: 40px;
  }
  .line{
    font-size: 180px;
    color:rgb(169, 155, 155);
  }
</style>