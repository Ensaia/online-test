<template>
    <div class="relative min-h-screen lg:flex">
        <header class="text-gray-100 bg-gray-800 lg:hidden">
            <div class="container flex items-center justify-between p-4 mx-auto">
                <a href="#" class="text-white">
                     <img src="/images/mcq.png" alt="" width="120" height="40">
                </a>

                <button @click="isOpen = !isOpen" class="p-2 text-white rounded-lg focus:outline-none hover:bg-gray-700">
                    <svg v-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>

                    <svg v-show="isOpen" class="w-6 h-6 transition duration-200 ease-in-out" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </header>

        <div v-cloak :class="isOpen ? 'block' : 'hidden'" @click="isOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-30 lg:hidden"></div>

        <aside id="sidebar" :class="isOpen ? 'translate-x-0 ease-in' : '-translate-x-full ease-out'" class="fixed inset-y-0 left-0 z-30 flex flex-col w-24 min-h-screen space-y-6 overflow-y-auto text-gray-100 transition duration-200 transform bg-gray-800 lg:translate-x-0 lg:relative lg:inset-0">
            <div class="flex flex-col items-center flex-1 space-y-6">
                <a href="#" class="flex items-center justify-center w-full h-20 font-bold text-white truncate bg-gray-700 whitespace-nowrap">
                    <img src="/images/mcq.png" alt="" width="120" height="40">
                </a>

                <nav class="flex flex-col items-center space-y-6">
                    <router-link :to="{ name : 'IndexComponent'}" class="p-3 transition-colors duration-300 rounded-lg hover:bg-gray-700">
                       <span><i class="fa fa-home fa-lg"></i></span>
                    </router-link>
                    <router-link :to="{ name : 'QuestionsIndex'}" class="p-3 transition-colors duration-300 rounded-lg hover:bg-gray-700">
                        <span><i class="fa fa-question fa-lg"></i></span>
                    </router-link>
                    <router-link :to="{ name : 'ExamIndex'}" class="p-3 transition-colors duration-300 rounded-lg hover:bg-gray-700">
                        <span><i class="fa fa-list-ul fa-lg"></i></span>
                    </router-link>
                    <router-link :to="{ name : 'ExamResults'}" class="p-3 transition-colors duration-300 rounded-lg hover:bg-gray-700">
                        <span><i class="fas fa-poll fa-lg"></i></span>
                    </router-link>
                </nav>
            </div>
        </aside>

        <main id="content" class="flex-1 pb-12 space-y-6 overflow-y-auto bg-gray-100 lg:h-screen md:space-y-8">
            <header class="flex items-center justify-between h-20 px-6 bg-white border-b">
                <div class="relative flex items-center">
                    <ul class="flex">
                         <li class="mr-6">
                        <a class="text-gray-400 transition-colors duration-300 rounded-full focus:outline-none hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100" href="#">
                             <span><i class="fab fa-facebook-square fa-lg"></i></span>
                        </a>
                        </li>
                         <li class="mr-6">
                        <a class="text-gray-400 transition-colors duration-300 rounded-full focus:outline-none hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100" href="#">
                            <span><i class="fab fa-twitter-square fa-lg"></i></span>
                        </a>
                        </li>
                         <li class="mr-6">
                        <a class="text-gray-400 transition-colors duration-300 rounded-full focus:outline-none hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100" href="#">
                            <span><i class="fab fa-github-square fa-lg"></i></span>
                        </a>
                        </li>
                    </ul>
                </div>

                <div class="flex items-center">
                    <div class="relative">
                        <button class="transition-colors duration-300 rounded-lg sm:px-4 sm:py-2 focus:outline-none hover:bg-gray-100" @click="dropdownOpen = !dropdownOpen">
                            <span class="sr-only">User Menu</span>
                            <div class="flex items-center md:-mx-2 ">
                                <div class="hidden md:mx-2 md:flex md:flex-col md:items-end md:leading-tight">
                                    <span class="font-semibold text-gray-800">Mohammed</span>
                                </div>
                            </div>
                        </button>
                    </div>

                    <button class="p-2 text-gray-400 transition-colors duration-300 rounded-full focus:outline-none hover:bg-gray-100 hover:text-gray-600 focus:bg-gray-100">
                        <span class="sr-only">Log out</span>
                         <span><i class="fas fa-sign-out-alt"></i></span>
                    </button>
                </div>
            </header>

            <section class="w-full px-6">
<!--                <div class="lg:mb-8">-->
<!--                    <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">-->
<!--                        <ol class="inline-flex items-center space-x-1 md:space-x-3">-->
<!--                            <li class="inline-flex items-center">-->
<!--                                <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">-->
<!--                                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>-->
<!--                                    Home-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <div class="flex items-center">-->
<!--                                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>-->
<!--                                    <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Templates</a>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                            <li aria-current="page">-->
<!--                                <div class="flex items-center">-->
<!--                                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>-->
<!--                                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Flowbite</span>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                        </ol>-->
<!--                    </nav>-->
<!--                </div>-->
                <router-view></router-view>
            </section>
        </main>
    </div>
</template>
<script >
    import {ref} from 'vue'
    import { SidebarMenu } from 'vue-sidebar-menu'
    import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'
    export default {

        setup() {
            const isOpen = ref(false)
            const dropdownOpen = ref(false)
            return { isOpen,
            dropdownOpen}
        },
    }
</script>

<style scoped>
</style>
