<template>
    <div id="sidebar">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-3 mr-3">Sidebar</span>
                <span class="mr-2"><img src="/images/mcq.png" alt="" width="120" height="40"></span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                        <router-link :to="{name:'IndexComponent'}" class="nav-link text-white">
                            <span>الرئيسية</span>
                            <span class="float-left me-2"><i class="fa fa-home fa-lg"></i></span>
                        </router-link>
                </li>
                <li>
                    <router-link :to="{name:'IndexComponent'}" class="nav-link text-white">
                        <span>اﻻسئلة</span>
                        <span class="float-left me-2"><i class="fa fa-question-circle fa-lg"></i></span>
                    </router-link>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>

    </div>
</template>

<script lang="ts">

    export default {
        name: "SideBar",
        setup() {

        },
    }
</script>

<style scoped>

</style>
