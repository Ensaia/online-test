<template>
    <div>
       <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name : 'QuestionCreate'}" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-md text-md px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    <span class="ml-2">إضافة سؤال</span>
                </router-link>
            </div>
        </div>

                <div class="relative overflow-x-auto p-3 mt-5 ">
                    <table class="table table-auto w-full text-md text-right text-black-500 border-separate space-y-6">
                       <thead class="text-md text-center text-black bg-white rounded rounded-2">
                       <tr>
                           <th scope="col" class="px-6 py-3">#</th>
                           <th scope="col" class="px-6 py-3">السؤال</th>
                           <th scope="col" class="px-6 py-3" colspan="2">العمليات</th>
                       </tr>
                       </thead>
                        <tbody class="text-md divide-y divide-gray-100 bg-white">
                            <template v-for="(question,index) in questions" :key="question.question_id">
                                <tr>
                                     <td class="px-6 py-4">{{ index + 1 }}</td>
                                     <td class="px-6 py-4">{{ question.question_text }}</td>
                                     <td class="px-6 py-4 text-center">
                                        <router-link :to="{ name: 'QuestionEdit', params: { question_id : question.question_id }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            <span><i class="fa fa-pencil-alt"></i></span>
                                        </router-link>
                                    </td>
                                     <td class="px-6 py-4 text-center">
                                        <button v-on:click="deleteQuestion(question.question_id)"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                            <span><i class="fa fa-trash-alt"></i></span>
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
    </div>
</template>

<script  lang="ts">
    import {onMounted , ref , inject} from 'vue'
    import axios from 'axios'
    export default {
        setup(){

            const questions = ref()
            const successResponseMessage = ref('')
            const errorResponseMessage = ref('')
            const swal = inject('$swal')

            onMounted(async (page = 1)=> {

                await getQuestions()

            })

            const getQuestions = async (page = 1) => {
                await axios
                    .get(`/api/questions?page=${page}`)
                    .then((response) => {
                        questions.value = response.data.data
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }

            const deleteQuestion = async (question_id) => {
                swal.fire({
                title: 'هل أنت متأكد ؟',
                text: "سيتم حذف جميع البيانات",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ'
            }).then((result) => {
                if (result.isConfirmed) {
                 axios.delete(`/api/question/destroy/${question_id}`)
                        .then((response) => {
                            if (response.data.success) {
                                successResponseMessage.value = response.data.success
                                swal.fire(
                                    'تنبيه!',
                                    successResponseMessage.value,
                                    'success'
                                )
                            }
                            if (response.data.error) {
                                errorResponseMessage.value = response.data.error
                                swal.fire(
                                    'تنبيه!',
                                    errorResponseMessage.value,
                                    'warning'
                                )
                            }
                        })
                        .catch((error) => {
                            console.log(error)
                        })
                }
            })
            }

            return { questions, deleteQuestion }
        }
    }
</script>

<style scoped>
    .table {
        border-spacing: 0 15px !important;
    }

    i {
        font-size: 1rem !important;
    }

    /*.table tr {*/
    /*    border-radius: 20px;*/
    /*}*/

    /*tr td:nth-child(n+5),*/
    /*tr th:nth-child(n+5) {*/
    /*    border-radius: 0 .625rem .625rem 0;*/
    /*}*/

    /*tr td:nth-child(1),*/
    /*tr th:nth-child(1) {*/
    /*    border-radius: .625rem 0 0 .625rem;*/
    /*}*/
</style>
