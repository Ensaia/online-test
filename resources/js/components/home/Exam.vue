<template>
    <div>
        <div>
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg p-4 ">
                <div class="flex text-gray-900 dark:text-gray-100">
                    <div class="w-1/2" id="countDownTimer">{{ timer }}</div>
                    <div class="w-1/2 flex justify-end">
                        <span><i class="fa fa-clock fa-lg"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-4">
            <form v-on:submit.prevent="examSubmit">
                <template v-for="(question,questionIndex) in questions" :key="question.question_id">
                    <span class="text-lg font-semibold">{{ questionIndex + 1 }} # </span> <span
                    class="text-lg font-semibold mr-1">{{ question.question_text }}</span>
                    <div class="grid grid-cols-2 gap-4 md:grid-cols-2 mt-1">
                        <div v-for="(answer,answerIndex) in question.answers" :key="answer.answer_id"
                             class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7] dark:text-gray-400">
                            <div class="bg-white rounded rounded-sm p-4">
                              <span class="ml-2">
                                <input type="radio" :value="answer.answer_id"
                                       v-model="formData.answers[question.question_id]"/>
                              </span>
                                <span
                                    class="text-md font-semibold">{{ answerIndex + 1 }} - {{ answer.answer_text }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="border border-solid mt-5 mb-5 border-gray-200"></div>
                </template>
                <div class="mt-4">
                    <button type="submit" name="submit" id="examSubmitButton"
                            class="text-white bg-gray-800 have:bg-gray-900 focus:outline-none
                  focus:ring-gray-300 font-medium rounded-lg text-md px-5 py-2.5 mr-2 mb-2 dark:bg-gray-700 dark:border-gray-700">
                        <span>تسليم اﻹجابة</span>
                    </button>
                </div>
            </form>
        </div>
        <div>
            <TailwindPagination :data="questions.data" @pagination-change-page="getQuestions"/>
        </div>
    </div>
</template>

<script lang="ts">
    import {onMounted, reactive, ref, inject} from 'vue'
    import axios from 'axios'
    import Timer from 'easytimer.js'
    import { TailwindPagination } from 'laravel-vue-pagination'
    import { useRouter } from 'vue-router'
    export default {
        setup() {
            const questions = ref({})
            const questionsEndPoint = ref('')
            const examSubmitEndPoint = ref('')
            const correctAnswers = ref(0)
            const wrongAnswers = ref(0)
            const examGrade = ref(0)
            const hideFormDiv = ref(true)
            const showResultDiv = ref(false)
            const timer = ref(null)
            const totalTime = ref(30)
            const seconds = ref(null)
            const minutes = ref(null)
            const timerInstance = new Timer()
            const swal = inject('$swal')
            const router = useRouter()


            const formData = reactive({
                answers: ref([])
            })

            const getQuestions = async (page = 1) => {
                await axios
                    .get(`/api/questions?page=${page}`)
                    .then((response) => {
                        questions.value = response.data.data
                    })
                    .catch((error) => {

                    })
            }

            onMounted(async () => {
                await getQuestions()
                countDownTimer()
            })

            const examSubmit = async () => {
                await axios.post('/api/exam/submit', {
                    answers: {...formData.answers}
                }).then(response => {
                    console.log(response)
                    examGrade.value = response.data.exam_grade
                    correctAnswers.value = response.data.correct_answers
                    wrongAnswers.value = response.data.wrong_answers
                }).catch(error => {
                    console.log(error)
                })
            }

            const countDownTimer = () => {
                timerInstance.start({
                    countdown: true,
                    startValues: {seconds: totalTime.value},
                });
                timerInstance.addEventListener('secondsUpdated', function (event) {
                    timer.value = timerInstance.getTimeValues().toString()
                    seconds.value = timerInstance.getTimeValues().seconds
                    minutes.value = timerInstance.getTimeValues().minutes
                    if (seconds.value === 10) {
                          swal.fire({
                        toast: true,
                        icon: 'info',
                        title: 'قارب وقت الامتحان على الانتهاء',
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    })
                    }
                    document
                        .querySelector('#examSubmitButton')
                        .addEventListener('click', function () {
                            timerInstance.stop();
                        });
                });
                timerInstance.addEventListener('targetAchieved', function (e) {
                    swal.fire({
                        toast: true,
                        icon: 'warning',
                        title: 'انتهى توقيت الامتحان سيتم الان تسليم الاجابات تلقائيا',
                        position: 'top',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                    })
                    document.querySelector('#examSubmitButton').click()
                    router.push({name:'IndexComponent'})
                });
            }

            function objectToArray(object) {
                return Object.keys(object).map((key) => [Number(key), object[key]])
            }

            return {
                formData, questions, examSubmit, correctAnswers, wrongAnswers, examGrade, hideFormDiv, swal, timer,
                totalTime,
                seconds,
                minutes, getQuestions
            }
        }
    }
</script>
