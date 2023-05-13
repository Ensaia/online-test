<template>
    <div>
        <div class="relative overflow-x-auto p-3 mt-5 ">
            <table class="table table-auto w-full text-md text-right text-black-500 border-separate space-y-6">
                <thead class="text-md text-center text-black bg-white rounded rounded-2">
                    <tr>
                        <th>#</th>
                        <th scope="col" class="px-6 py-3">نص السؤال</th>
                        <th scope="col" class="px-6 py-3">إجابة الممتحن</th>
                        <th scope="col" class="px-6 py-3">اﻹجابة الصحيحة</th>
                        <th scope="col" class="px-6 py-3" colspan="1">العمليات</th>
                    </tr>
                </thead>
                <tbody class="text-md divide-y divide-gray-100 bg-white text-center">
                    <template v-if="answers.length > 0" v-for="(answer, index) in answers" :key="answer.exam_answers_id">
                        <tr>
                            <td class="px-6 py-4">{{ index + 1 }}</td>
                            <td class="px-6 py-4">{{ answer.question_text }}</td>
                            <td class="px-6 py-4">{{ answer.answers_text }}</td>
                            <td class="px-6 py-4">{{ answer.correct_answer }}</td>
                            <td class="px-6 py-4 text-center">
                                <router-link
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    <span><i class="fa fa-trash-alt"></i></span>
                                </router-link>
                            </td>
                        </tr>
                    </template>
                    <!-- <template v-else>
                        <tr>
                            <td colspan="5">
                                <span class="py-3 text-xl">
                                    No Exam Answers
                                </span>
                            </td>
                        </tr>
                    </template> -->
                </tbody>
            </table>
        </div>
    </div>
</template>

<script lang="ts">
import { onMounted, reactive, ref, inject } from 'vue'
import axios from 'axios'

export default {
    props: {
        exam_result_id: String
    },
    setup(props) {
        

        const answers = ref('')

        onMounted(async () => {
            await examAnswers()
        })

        const examAnswers = async () => {
            await axios.get(`/api/exam/answers/${props.exam_result_id}`)
                .then(response => {
                    console.log(response.data)
                    answers.value = response.data.data
                }).catch(error => {
                    console.log(error)
                })
        }


        return {
            answers
        }
    }
}
</script>

<style scoped>

</style>
