<template>
    <div>
            <div v-if="validationErrors">
                <div v-for="(value, key) in validationErrors" :key="key" class="bg-red-100 border border-red-500 overflow-hidden dark:bg-red-200 py-1 px-4 pr-0 rounded font-bold mb-2 shadow-lg">
                    <ul v-for="error in value" :key="error" class="">
                        <li class="py-2 mr-3">
                            <div class="flex justify-between">
                                <span class="text-sm md:text-base font-medium text-red-700 dark:text-red-800">{{ error }}</span>
                                <span class="text-red-500 rounded-full">
                                    <i class="fa fa-times-circle"></i>
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        <form class="mt-3" v-on:submit.prevent="createQuestion">
            <div class="grid gap-4 gap-y-2 text-md grid-cols-1 lg:grid-cols-4 px-3">
                <div class="lg:col-span-4">
                    <div class="grid gap-4 gap-y-2 text-md grid-cols-1 md:grid-cols-4">
                        <div class="md:col-span-4">
                            <div class="flex flex-wrap px-3 mb-8">
                                <label for="question_text"
                                    class="block uppercase tracking-wide text-grey-darker text-md font-normal mb-2">السؤال
                                    :</label>
                                <input type="text"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    name="question_text" v-model="formData.question_text" v-on:keyup="inputValidation" />
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <div class="flex flex-wrap px-3 mb-8">
                                <div class="flex-1 w-auto">
                                    <label for="answer_1"
                                        class="block uppercase tracking-wide text-grey-darker text-md font-normal mb-2">الإجابة
                                        الاولى :</label>
                                    <input type="text" name="answer_1"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                        v-model="formData.answer_1" />
                                </div>
                                <div class="flex-none mr-2 mt-8">
                                    <label for="correct_answer"
                                        class="max-w-xs flex p-3 block w-full bg-white border border-gray-200 rounded-md text-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                        <span class="text-md text-gray-500 ml-3 dark:text-gray-400 font-semibold h-6">الإجابة
                                            الصحيحة</span>
                                        <input type="radio" name="is_correct" v-model="formData.is_correct"
                                            :value="formData.answer_1" class="w-6 h-6 cursor-pointer" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <div class="flex flex-wrap px-3 mb-8">
                                <div class="flex-1 w-auto">
                                    <label for="answer_2"
                                        class="block uppercase tracking-wide text-grey-darker text-md font-normal mb-2">الإجابة
                                        الثانية :</label>
                                    <input type="text" name="answer_2"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                        v-model="formData.answer_2" />
                                </div>
                                <div class="flex-none mr-6 mt-8">
                                    <label for="correct_answer"
                                        class="max-w-xs flex p-3 block w-full bg-white border border-gray-200 rounded-md text-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                        <span class="text-md text-gray-500 ml-3 dark:text-gray-400 font-semibold h-6">الإجابة
                                            الصحيحة</span>
                                        <input type="radio" name="is_correct" v-model="formData.is_correct"
                                            :value="formData.answer_2" class="w-6 h-6 cursor-pointer" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <div class="flex flex-wrap px-3 mb-8">
                                <div class="flex-1 w-auto">
                                    <label for="answer_3"
                                        class="block uppercase tracking-wide text-grey-darker text-md font-normal mb-2">الإجابة
                                        الثالثة :</label>
                                    <input type="text" name="answer_3"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                        v-model="formData.answer_3" />
                                </div>
                                <div class="flex-none mr-6 mt-8">
                                    <label for="correct_answer"
                                        class="max-w-xs flex p-3 block w-full bg-white border border-gray-200 rounded-md text-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                        <span class="text-md text-gray-500 ml-3 dark:text-gray-400 font-semibold h-6">الإجابة
                                            الصحيحة</span>
                                        <input type="radio" name="is_correct" v-model="formData.is_correct"
                                            :value="formData.answer_3" class="w-6 h-6 cursor-pointer" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <div class="flex flex-wrap px-3 mb-8">
                                <div class="flex-1 w-auto">
                                    <label for="answer_4"
                                        class="block uppercase tracking-wide text-grey-darker text-md font-normal mb-2">الإجابة
                                        الرابعة :</label>
                                    <input type="text" name="answer_4"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                        v-model="formData.answer_4" />
                                </div>
                                <div class="flex-none mr-6 mt-8">
                                    <label for="correct_answer"
                                        class="max-w-xs flex p-3 block w-full bg-white border border-gray-200 rounded-md text-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                        <span class="text-md text-gray-500 ml-3 dark:text-gray-400 font-semibold h-6">الإجابة
                                            الصحيحة</span>
                                        <input type="radio" name="is_correct" v-model="formData.is_correct"
                                            :value="formData.answer_4" class="w-6 h-6 cursor-pointer" checked />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="md:col-span-4 text-left">
                            <div class="inline-flex items-end">
                                <button
                                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition-all text-md dark:focus:ring-gray-900 dark:focus:ring-offset-gray-800">
                                    إضافة
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
import { reactive, toRefs, ref, onUpdated , inject } from "vue"
import axios from "axios"
export default {
    setup() {
        const loading = ref(true)
        // const error = ref(null)
        const storeEndPoint = ref("/api/question/store")
        const question_text = ref()
        const validationErrors = ref("")
        const successResponseMessage = ref('')
        const errorResponseMessage = ref('')
        const swal = inject('$swal')

        const formData = reactive({
            question_text: ref(),
            answer_1: ref(),
            answer_2: ref(),
            answer_3: ref(),
            answer_4: ref(),
            is_correct: ref([]),
        });
        const createQuestion = async () => {
            loading.value = true;
            await axios
                .post(storeEndPoint.value, {
                    question_text: formData.question_text,
                    answer_1: formData.answer_1,
                    answer_2: formData.answer_2,
                    answer_3: formData.answer_3,
                    answer_4: formData.answer_4,
                    is_correct: formData.is_correct,
                })
                .then((response) => {
                    // console.log(response.data)

                    if (response.data.success) {
                        successResponseMessage.value = response.data.success
                        swal.fire({
                            toast: true,
                            icon: 'success',
                            title: successResponseMessage.value,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        })
                    }
                    if (response.data.error) {
                        errorResponseMessage.value = response.data.error
                        swal.fire({
                            toast: true,
                            icon: 'warning',
                            title: errorResponseMessage.value,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        })
                    }
                    if (response.data.validationErrors) {
                        validationErrors.value = response.data
                    }
                })
                .catch((error) => {
                    error.value = error
                    console.log(error)
                });
        };

        const inputValidation = () => {
            validationErrors.value = question_text.value === "" ? "field can not be empty" : "";
        };

        return { formData, createQuestion, inputValidation, validationErrors };
    },
};
</script>

<style scoped></style>
