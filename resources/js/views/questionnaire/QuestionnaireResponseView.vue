<template>
    <BaseView />
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <div class="text-center">
                           <h2 class="text-success fw-bold">Questionnaire App</h2>
                           <h5 class="card-title text-center mb-5 fw-light fs-5 fw-bold">
                            Answer Questionnaire Questions
                        </h5>
                        </div>
                        <div class="text-center fw-bold">{{ getquestion.section}} Section</div>
                       <div class="space-between">
                        <span class="mb-5 fw-bold">Question Progress: {{ currentQuestion }} / {{
                            questions.length
                        }}</span>
                       </div>
                        
                        <hr>
                        
                        <br>
                        <span v-if="isSelect" class="text-danger">Please Select at least on option</span>
                        <form @submit.prevent="answer">
                            <div class="row question">
                                <div class="col-md-12">
                                   <span class="text-danger fw-bold">Q.</span> {{ getquestion.title }}
                                </div>
                                <input type="hidden" v-model="form.question_id">
                                <div class="col-md-12 mt-2" v-for="answer in getquestion.options" :key="answer">
                                    <input type="checkbox" :id="answer" class="mx-3" v-model="form.answers"
                                        :value="answer"> {{
                                            answer
                                        }}
                                </div>
                            </div>
                            <hr class="mt-4">
                            <button type="submit" v-if="currentQuestion < questions.length - 1"
                                class="btn btn-success mt-4">Next Question</button>
                            <button type="submit" v-else class="btn btn-success mt-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import BaseView from '../layouts/BaseView.vue'
import { ref, onBeforeMount, reactive, computed } from 'vue';
import { useRoute, useRouter } from 'vue-router';
const route = useRoute()
const router = useRouter()
const questions = ref({})
const currentQuestion = ref(0)
const isSelect = ref(false)
const form = reactive({
    question_id: "",
    student_id: "",
    questionnaire_id: "",
    answers: []
})

onBeforeMount(() => {
    axios('/api/check-token/' + route.params.token).then(res => {
        console.log(res.data.data.student_id);
        questions.value = res.data.data.questionnaire.questions
        form.student_id = res.data.data.student_id
        form.questionnaire_id = res.data.data.questionnaire_id
    }).catch(err => {
        if (err.response) {
            router.push({ name: 'invalid-token' })
        }
    })
})

const getquestion = computed(() => {
    let question = questions.value[currentQuestion.value]
    return question
})


const answer = () => {
    form.question_id = questions.value[currentQuestion.value].id
    if (form.answers.length === 0) {
        isSelect.value = true
    }
    else {
        axios.post('/api/answer', form).then(res => {
            currentQuestion.value = currentQuestion.value + 1
            form.answers = []
            isSelect.value = false
            if (currentQuestion.value === questions.value.length) {
                router.push({ name: 'thank-you' })
            }
        })
    }
}
</script>
<style scoped>
    .question{
        font-size: 16px;
        font-family: 'Courier New', Courier, monospace;
    }
</style>
