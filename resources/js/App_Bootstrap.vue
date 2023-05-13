<template>
    <div>
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-2">
                         <sidebar-menu :menu="menu" :rtl="rtl" :collapsed="collapsed"
                                       :width="width" :hideToggle="hideToggle" :theme="theme">
                             <template v-slot:header>
                <span class="fs-3 text-center">
                    <img src="/images/mcq.png" alt="" width="120" height="40">
                </span>
                             </template>
                             <template v-slot:footer>footer</template>
                             <template v-slot:toggle-icon>
                                 <span><i class="fa fa-chevron-circle-right fa-lg"></i></span>
                             </template>
                             <template v-slot:dropdown-icon="{ isOpen }">
                                 <span v-if="!isOpen">+</span>
                                 <span v-else>-</span>
                             </template>
                         </sidebar-menu>
                     </div>
                     <div class="col-md-10">
                         <router-view></router-view>
                     </div>
                 </div>
             </div>
    </div>
</template>

<script >
    import {ref} from 'vue'
    import { SidebarMenu } from 'vue-sidebar-menu'
    import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'
    export default {
        props: {
            collapsed: {
                type: Boolean,
                default: false
            },
            rtl: {
                type: Boolean,
                default: true
            },
            width: {
                type: String,
                default: '230px'
            },
            hideToggle: {
                type: Boolean,
                default: true
            },
            theme: {
                type: String,
                default: 'white theme'
            },

        },
        setup() {
            const menu = ref([
                {
                    header: 'القائمة الرئيسية',
                    hiddenOnCollapse: true
                },
                {
                    href: '/',
                    title: 'الرئيسية',
                    icon: 'fa fa-home',
                    external: false,
                    exact: true
                },
                {
                    href: {path : '/questions'},
                    title: 'اﻻسئلة',
                    icon: 'fa fa-question-circle',
                    external: false,
                    exact: true
                },
                {
                    href: {path : '/exam'},
                    title: 'اﻻختبار',
                    icon: 'fa fa-list-ul',
                    external: false,
                    exact: true
                }
            ])

            return {menu}
        },
        components: {
            SidebarMenu
        }
    }
</script>

<style scoped>
    .col-md-10{
        margin-top: 40px;
    }
</style>
