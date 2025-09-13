<template>
    <div class="container-xxl bg-color min-vh-100">
        <div class="row pe-xl-3">
            <AdminNavigationVue />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">


                        <div class="text-start mt-3">
                            <div class="d-flex justify-content-between">
                                <h4 class="fw-semibold">Members</h4>
                                <inertiaLink href="/admin/members/create">
                                    <button class="btn btn-primary rounded-3">New Member</button>
                                </inertiaLink>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="bg-white py-3 px-3 border rounded shadow-sm mt-3">
                                <div class="text-start">
                                    <p class="fw-normal text-primary mb-2">Total Members</p>
                                    <h3 class="fw-semibold">191</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="bg-white py-3 px-3 border rounded shadow-sm mt-3">
                                <div class="text-start">
                                    <p class="fw-normal text-success mb-2">Active</p>
                                    <h3 class="fw-semibold">191</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="bg-white py-3 px-3 border rounded shadow-sm mt-3">
                                <div class="text-start">
                                    <p class="fw-normal text-danger mb-2">Terminated</p>
                                    <h3 class="fw-semibold">191</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="bg-white py-3 px-3 border rounded shadow-sm mt-3">
                                <div class="text-start">
                                    <p class="fw-normal text-secondary mb-2">Resigned</p>
                                    <h3 class="fw-semibold">191</h3>
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
                                        <a class="nav-link text-dark" data-bs-toggle="tab" href="#Active">Active</a>
                                    </li>
                                    <li class="nav-item bg-transparent">
                                        <a class="nav-link text-dark" data-bs-toggle="tab" href="#Terminated">Terminated</a>
                                    </li>
                                    <li class="nav-item bg-transparent">
                                        <a class="nav-link text-dark" data-bs-toggle="tab" href="#Resigned">Resigned</a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-4 bg-transparent">
                                    <div class="tab-pane show fade bg-transparent active" id="All">
                                        <members_alltableVue />
                                    </div>
                                    <div class="tab-pane show fade bg-transparent" id="Active">
                                        <Members_activetable />
                                    </div>
                                    <div class="tab-pane show fade bg-transparent" id="Terminated">
                                        <Members_terminatedtable />
                                    </div>
                                    <div class="tab-pane show fade bg-transparent" id="Resigned">
                                        <Members_resignedtable />
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
import members_alltableVue from '../Components/AdminTable/members_alltable.vue'
import Members_activetable from '../Components/AdminTable/members_activetable.vue'
import Members_terminatedtable from '../Components/AdminTable/members_terminatedtable.vue'
import Members_resignedtable from '../Components/AdminTable/members_resignedtable.vue'

export default {
    name: 'AdminMembers',
    components: {AdminNavigationVue, inertiaLink, members_alltableVue, Members_activetable, Members_terminatedtable, Members_resignedtable}
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
