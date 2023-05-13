import { createRouter, createWebHistory } from 'vue-router'



import IndexComponent from '@/components/home/Index.vue'
import QuestionsIndex from '@/components/question/Index.vue'
import QuestionCreate from '@/components/question/Create.vue'
import QuestionEdit from '@/components/question/Edit.vue'
import ExamIndex from '@/components/home/Exam.vue'
import ExamResults from '@/components/home/ExamResult.vue'
import ExamAnswers from '@/components/home/ExamAnswers.vue'
const routes = [
    {
        path: "/",
        name: "IndexComponent",
        component: IndexComponent,
    },
    {
        path: "/questions",
        name: "QuestionsIndex",
        component: QuestionsIndex,
    },   {
        path: "/question/create",
        name: "QuestionCreate",
        component: QuestionCreate,
    }, {
        path: "/question/edit/:question_id",
        name: "QuestionEdit",
        component: QuestionEdit,
        props:true
    },
    {
        path: "/exam",
        name: "ExamIndex",
        component: ExamIndex,
    },  {
        path: "/exam/results",
        name: "ExamResults",
        component: ExamResults,
    },  {
        path: "/exam/answers/:exam_result_id",
        name: "ExamAnswers",
        component: ExamAnswers,
        props:true
    },
];

export default createRouter({
    mode: 'history',
    history: createWebHistory(),
    routes
})
