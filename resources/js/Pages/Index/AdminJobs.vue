<template>
    <div class="container-xxl bg-color min-vh-100">
        <div class="row pe-xl-3">
            <AdminNavigation :check_unread="check_unread"/>
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">


                        <div class="text-start mt-3">
                            <div class="d-flex justify-content-between">
                                <h4 class="fw-semibold">Jobs</h4>
                                <inertiaLink href="/admin/jobs/create">
                                    <button class="btn btn-primary rounded-3">New Job</button>
                                </inertiaLink>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="bg-white py-3 px-3 border rounded shadow-sm mt-3">
                                <div class="text-start">
                                    <p class="fw-normal text-primary mb-2">Total Jobs</p>
                                    <h3 class="fw-semibold">{{ job_count }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="bg-white py-3 px-3 border rounded shadow-sm mt-3">
                                <div class="text-start">
                                    <p class="fw-normal text-success mb-2">Available </p>
                                    <h3 class="fw-semibold">{{ job_avail }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="bg-white py-3 px-3 border rounded shadow-sm mt-3">
                                <div class="text-start">
                                    <p class="fw-normal text-danger mb-2">Not available</p>
                                    <h3 class="fw-semibold">{{ job_unavail }}</h3>
                                </div>
                            </div>
                        </div>


                    </div>
                </section>
                <section id="jobstable">
                    <div class="row justify-content-center">


                        <div class="col-lg-12">
                            <div class="bg-white py-3 px-3 shadow-sm rounded border">
                                <div class="text-start border-bottom mb-3">
                                    <h6 class="fw-semibold">Jobs list</h6>
                                </div>
                                <div class="d-flex justify-content-end mb-3">
                                    <div class="position-relative">
                                        <i class="bi bi-search position-absolute" style="top: 8px; left: 10px;"></i>
                                        <input v-model="searchname" type="text" placeholder="Search" class="form-control rounded shadow-none outline-secondary" style="padding-left: 30px; height: 35px;">
                                    </div>
                                </div>
                                <div class="table-responsive">

                                    <table class="table table-hover">
                                        <thead class="border-top" style="background-color: #FAFAFA !important;">
                                            <tr>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Job <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Salary <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Location <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Status <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Type <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Created at <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(getjob, index) in filterdata" :key="index">
                                                <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ getjob.job_title }}</td>
                                                <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">₱{{ getjob.salary }}</td>
                                                <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ getjob.location }}</td>
                                                <td v-if="getjob.status" class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;"><i class="bi bi-check-circle-fill text-success"></i></td>
                                                <td v-else class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;"><i class="bi bi-x-circle-fill text-danger"></i></td>
                                                <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ getjob.type }}</td>
                                                <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ new Date(getjob.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) }}</td>
                                                <td class="fw-normal " style="font-size: 14px; padding-top: 11px;">
                                                    <inertiaLink :href="`/admin/jobs/edit/${getjob.id}`">
                                                        <lord-icon
                                                            src="https://cdn.lordicon.com/vwzukuhn.json"
                                                            trigger="loop"
                                                            delay="1500"
                                                            colors="primary:#242424,secondary:#848484,tertiary:#b4b4b4,quaternary:#ffc738"
                                                            style="width:30px;height:30px">
                                                        </lord-icon>
                                                    </inertiaLink>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-end">
                                        <div class="d-flex justify-content-end mt-3 gap-2 flex-wrap">
                                            <inertiaLink v-if="job_list.prev_page_url" :href="job_list.prev_page_url" class="fw-noramal py-1 text-decoration-none rounded">
                                                <button class="btn btn-outline-secondary py-1" style="font-size: 13px;">Previous</button>
                                            </inertiaLink>
                                            <inertiaLink v-if="job_list.next_page_url" :href="job_list.next_page_url" class="fw-noramal py-1 text-decoration-none rounded">
                                                <button class="btn btn-outline-secondary py-1 px-3" style="font-size: 13px;">Next</button>
                                            </inertiaLink>
                                        </div>
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


export default {
    name: 'AdminJobs',
    components: {AdminNavigation, inertiaLink, },
    props: {job_list:Object, job_count:Number, job_avail:Number, job_unavail:Number, check_unread:Boolean},
    data(){
        return{
            searchname: '',

        }
    },
    methods:{

    },
    computed:{
        filterdata(){
            return this.job_list.data.filter(data => {
                const jobtitle = data.job_title.toLowerCase().includes(this.searchname.toLowerCase());
                return jobtitle;
            });
        }
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

thead th {
    background-color: #FAFAFA !important;
    white-space: nowrap;
}

tbody td{
    white-space: nowrap;
}
</style>
