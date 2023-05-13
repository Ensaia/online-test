<template>
    <div>
        <form class="" v-on:submit.prevent="updateQuestion" id="edit-question-form">
            <div class="grid gap-4 gap-y-2 text-md grid-cols-1 lg:grid-cols-4 px-3">
                <div class="lg:col-span-4">
                    <div class="grid gap-4 gap-y-2 text-md grid-cols-1 md:grid-cols-4">
                        <template v-for="question in questionData" :key="question.question_id">
                            <div class="md:col-span-4">
                                <div class="flex flex-wrap px-3 mb-8">
                                    <label for="question_text"
                                           class="block uppercase tracking-wide text-grey-darker text-md font-normal mb-2">السؤال
                                        :</label>
                                    <input type="text"
                                           class="py-3 px-4 block w-full border-gray-200 rounded-md text-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                           name="question_text" v-model="question.question_text"
                                           v-on:keyup="inputValidation"/>
                                    <span v-if="FormErrors">{{ FormErrors }}</span>
                                </div>
                            </div>
                            <template v-for="(answer,index) in question.answers" :key="answer.answer_id">
                                <div class="md:col-span-2">
                                    <div class="flex flex-wrap px-3 mb-8">
                                        <div class="flex-1 w-auto">
                                            <label for="answer_text"
                                                   class="block uppercase tracking-wide text-grey-darker text-md font-normal mb-2">الإجابة
                                                {{ index + 1 }} :</label>
                                            <input type="text" name="answer_text"
                                                   class="py-3 px-4 block w-full border-gray-200 rounded-md text-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                                   v-model="answer.answer_text" />
                                        </div>
                                        <div class="flex-none mr-2 mt-8">
                                            <label for="correct_answer"
                                                   class="max-w-xs flex p-3 block w-full bg-white border border-gray-200 rounded-md text-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                        <span class="text-md text-gray-500 ml-3 dark:text-gray-400 font-semibold h-6">
                                            الإجابة
                                             الصحيحة
                                        </span>
                                                <input type="radio" name="is_correct" v-model="answer.is_correct"
                                                        class="w-6 h-6 cursor-pointer"
                                                       v-if="answer.is_correct == 1"  :true-value="answer.is_correct" :false-value="answer.is_correct" checked/>
                                                <input type="radio" name="is_correct" v-model="answer.is_correct"
                                                        class="w-6 h-6 cursor-pointer" :true-value="answer.is_correct" :false-value="answer.is_correct"
                                                       v-else/>
<!--                    :id="answer.answer_id" :value="answer.is_correct"                            -->
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </template>
                        <div class="md:col-span-4 text-left">
                            <div class="inline-flex items-end">
                                <button type="submit"
                                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition-all text-md dark:focus:ring-gray-900 dark:focus:ring-offset-gray-800">
                                    تحديث
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script lang="ts">
    import {onMounted, ref} from 'vue'
    import axios from 'axios'

    export default {
        props: {
            question_id: String
        },

        setup(props) {

            const questionData = ref()



            const getQuestion = async () => {
                await axios
                    .get(`/api/question/show/${props.question_id}`)
                    .then((response) => {
                        questionData.value = response.data.data
                        console.log(questionData.value)
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }
            onMounted(async () => {
                await getQuestion()
            })
            const updateQuestion = async () => {
                // console.log(questionData.value)
                const formData = new FormData(document.querySelector('#edit-question-form'))
                console.log(formData)
                await axios
                    .patch(`/api/question/update/test`,{data : questionData.value})
                    .then((response) => {
                        console.log(response.data)
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }
            return {questionData,updateQuestion}
        }
    }
</script>

<style scoped>

</style>
