<template>
    <div class="container-xxl bg-color min-vh-100">
        <div class="row pe-xl-3">
            <AdminNavigationVue :check_unread="check_unread"/>
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">



                        <div class="text-start mt-3">
                            <h4 class="fw-semibold mt-2">Application</h4>
                        </div>
                        <div class="col-lg-3 col-md-4 mt-3">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <div class="text-start">
                                    <p class="fw-normal text-primary mb-2">Total Applicant's</p>
                                    <h3 class="fw-semibold">{{ total_application }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 mt-3">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <div class="text-start">
                                    <p class="fw-normal text-secondary mb-2 text-warning">Processing</p>
                                    <h3 class="fw-semibold">{{ processing_application }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 mt-3">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <div class="text-start">
                                    <p class="fw-normal text-secondary mb-2 text-success">Hired</p>
                                    <h3 class="fw-semibold">{{ passed_application }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 mt-3">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <div class="text-start">
                                    <p class="fw-normal text-secondary mb-2 text-danger">Rejected</p>
                                    <h3 class="fw-semibold">{{ rejected_application }}</h3>
                                </div>
                            </div>
                        </div>



                    </div>
                </section>
                <section id="applicantlist">
                    <div class="row justify-content-center">




                        <div class="col-lg-12">
                             <div class="bg-white py-3 px-3 shadow-sm rounded border">
                                <ul class="nav nav-tabs bg-transparent">
                                    <li class="nav-item bg-transparent">
                                        <a class="nav-link text-dark active " data-bs-toggle="tab" href="#All" >ALL</a>
                                    </li>
                                    <li class="nav-item bg-transparent">
                                        <a class="nav-link text-dark" data-bs-toggle="tab" href="#Processing">Processing</a>
                                    </li>
                                    <li class="nav-item bg-transparent">
                                        <a class="nav-link text-dark" data-bs-toggle="tab" href="#Hired">Hired</a>
                                    </li>
                                    <li class="nav-item bg-transparent">
                                        <a class="nav-link text-dark" data-bs-toggle="tab" href="#Rejected">Rejected</a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-4 bg-transparent">
                                    <div class="tab-pane show fade bg-transparent active" id="All">
                                        <application_alltableVue :application_list="application_list"/>
                                    </div>
                                    <div class="tab-pane show fade bg-transparent" id="Processing">
                                        <Application_processingtable :application_list="application_list"/>
                                    </div>
                                    <div class="tab-pane show fade bg-transparent" id="Hired">
                                        <Application_hiredtable :application_list="application_list"/>
                                    </div>
                                    <div class="tab-pane show fade bg-transparent" id="Rejected">
                                        <application_rejectedtableVue :application_list="application_list" />
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
import AdminNavigationVue from '../Components/AdminNavigation/AdminNavigation.vue'
import {Link as inertiaLink} from '@inertiajs/vue3'
import application_alltableVue from '../Components/AdminTable/application_alltable.vue'
import Application_processingtable from '../Components/AdminTable/application_processingtable.vue'
import Application_hiredtable from '../Components/AdminTable/application_hiredtable.vue'
import application_rejectedtableVue from '../Components/AdminTable/application_rejectedtable.vue'

export default {
    name: 'AdminApplication',
    components: {AdminNavigationVue, inertiaLink, application_alltableVue, Application_processingtable, Application_hiredtable, application_rejectedtableVue},
    props: {application_list:Object, total_application:Number, processing_application:Number, passed_application:Number, rejected_application:Number, check_unread:Boolean},

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

thead th {
    background-color: #FAFAFA !important;
    white-space: nowrap;
}

tbody td{
    white-space: nowrap;
}
</style>
