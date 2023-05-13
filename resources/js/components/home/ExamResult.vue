<template>
    <div>
        <div class="relative overflow-x-auto p-3 mt-5 ">
            <table class="table table-auto w-full text-md text-right text-black-500 border-separate space-y-6">
                <thead class="text-md text-center text-black bg-white rounded rounded-2">
                <tr>
                    <th>#</th>
                    <th scope="col" class="px-6 py-3">درجة اﻹمتحان</th>
                    <th scope="col" class="px-6 py-3">عدد اﻹجابات الصحيحة</th>
                    <th scope="col" class="px-6 py-3">عدد اﻹجابات الخاطئة</th>
                    <th scope="col" class="px-6 py-3">تاريخ اﻻمتحان</th>
                    <th scope="col" class="px-6 py-3" colspan="1">عرض اﻹجابات</th>
                    <th scope="col" class="px-6 py-3" colspan="1">العمليات</th>
                </tr>
                </thead>
                <tbody class="text-md divide-y divide-gray-100 bg-white text-center">
                <template v-for="(result, index) in results" :key="result.exam_result_id">
                    <tr>
                        <td class="px-6 py-4">{{ index + 1 }}</td>
                        <td class="px-6 py-4">{{ result.exam_grade }}</td>
                        <td class="px-6 py-4">{{ result.correct_answers }}</td>
                        <td class="px-6 py-4">{{ result.correct_answers }}</td>
                        <td class="px-6 py-4">{{ result.exam_date }}</td>
                        <td class="px-6 py-4">
                            <router-link
                                :to="{ name: 'ExamAnswers', params: { exam_result_id: result.exam_result_id } }"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                <span><i class="fa fa-eye"></i></span>
                            </router-link>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button v-on:click="deleteExamResult(result.exam_result_id)"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                <span><i class="fa fa-trash-alt"></i></span>
                            </button>
                        </td>
                    </tr>
                </template>
                </tbody>
            </table>
            <TailwindPagination :data="results" @pagination-change-page="examResults"/>
        </div>
    </div>
</template>

<script lang="ts">
    import {onMounted, reactive, ref, inject} from 'vue'
    import axios from 'axios'
    import {TailwindPagination} from 'laravel-vue-pagination'

    export default {
        setup() {
            const results = ref('')
            const successResponseMessage = ref('')
            const errorResponseMessage = ref('')
            const swal = inject('$swal')

            onMounted(async () => {
                await examResults()
            })

            const examResults = async (page = 1) => {
                await axios.get(`/api/exam/results?page=${page}`)
                    .then(response => {
                        console.log(response.data.data)
                        results.value = response.data.data
                    }).catch(error => {
                        console.log(error)
                    })
            }

            const deleteExamResult = async (exam_result_id) => {

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
                        axios.delete(`/api/exam/result/destroy/${exam_result_id}`)
                            .then(response => {
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
                            }).catch(error => {
                            console.log(error)
                        })

                    }
                })

            }
            return {
                results, examResults, deleteExamResult
            }
        }
    }
</script>

<style scoped>

</style>
