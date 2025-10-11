<template>
    <div class="container-xxl bg-color min-vh-100">
        <div class="row pe-xl-3">
            <AdminNavigation />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">

                        
                        <div class="text-start mt-3">
                            <h4 class="fw-semibold">Account & Settings</h4>

                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="bg-white py-3 px-3 shadow-sm rounded border">
                                <ul class="nav nav-tabs bg-transparent">
                                    <li class="nav-item bg-transparent">
                                        <a class="nav-link text-dark active " data-bs-toggle="tab" href="#All" >ALL</a>
                                    </li>
                                    <li class="nav-item bg-transparent">
                                        <a class="nav-link text-dark" data-bs-toggle="tab" href="#Active">Active</a>
                                    </li>
                                    <li class="nav-item bg-transparent">
                                        <a class="nav-link text-dark" data-bs-toggle="tab" href="#Disabled">Disabled</a>
                                    </li>

                                </ul>
                                <div class="tab-content mt-4 bg-transparent">
                                    <div class="tab-pane show fade bg-transparent active" id="All">
                                        <settings_alltableVue :all_user="all_user"/>
                                    </div>
                                    <div class="tab-pane show fade bg-transparent" id="Active">
                                        <settings_activetableVue :all_user="all_user"/>
                                    </div>
                                    <div class="tab-pane show fade bg-transparent" id="Disabled">
                                        <settings_disableaccountVue :all_user="all_user" />
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </section>

            </main>
        </div>
    </div>
</template>

<script>
import AdminNavigation from '../Components/AdminNavigation/AdminNavigation.vue';
import {Link as inertiaLink} from '@inertiajs/vue3'
import {router} from '@inertiajs/vue3'
import settings_alltableVue from '../Components/AdminTable/settings_alltable.vue';
import settings_activetableVue from '../Components/AdminTable/settings_activetable.vue';
import settings_disableaccountVue from '../Components/AdminTable/settings_disableaccount.vue';

export default {
    name: 'AdminConversation',
    components: {AdminNavigation, inertiaLink, settings_alltableVue, settings_activetableVue, settings_disableaccountVue},
    props: {all_user:Object},
    data(){
        return{
            search_type: 'All',
            search_user: ''
        }
    },
    methods:{

    },
    computed:{

    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

.bg-color{
    background-color: #FAFAFA;
}
section{
    font-family: "Poppins", sans-serif;
    padding: calc(10px + 1rem) 0;
    overflow-wrap: break-word;
}

</style>
