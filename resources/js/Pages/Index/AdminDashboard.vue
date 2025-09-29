<template>
    <div class="container-xxl bg-color">
        <div class="row pe-xl-3">
            <AdminNavigation />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">



                        <div class="text-start mt-3">
                            <h4 class="fw-semibold">Dashboard</h4>
                            <div class="py-3 px-3 bg-white rounded shadow-sm d-flex justify-content-between mt-3 mb-4 border" style="width: 350px;">
                                <div class="d-flex gap-2">
                                    <div class="text-start">
                                        <img src="../Components/Assets/admin-profile.png" alt="" width="50">
                                    </div>
                                    <div class="text-start mt-1">
                                        <h6 class="fw-semibold mb-0">Welcome</h6>
                                        <p class="fw-normal text-secondary mb-0">{{ admin_info?.name ?? '---' }}</p>
                                    </div>
                                </div>
                                <div class="text-start mt-1">
                                    <a href="#">
                                        <button @click="btnLogoutAccount" class="btn btn-outline-secondary"><i class="bi bi-box-arrow-left"> Sign out</i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="bg-white rounded shadow-sm border">
                                <div class="text-start pt-3 px-3 ">
                                    <div class="d-flex justify-content-between gap-2 ">
                                        <p class="fw-normal text-primary">Jobs Open</p>
                                    </div>
                                    <h3 class="fw-semibold">{{ jobcount }}</h3>

                                </div>
                                <p class="fw-normal px-3" style="font-size: 15px; margin-bottom: 18px;">Overall total of open jobs.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-lg-0 mt-3">
                            <div class="bg-white rounded shadow-sm border">
                                <div class="text-start pt-3 px-3 ">

                                    <div class="d-flex justify-content-between gap-2 ">
                                        <p class="fw-normal text-primary">Total Members</p>
                                        <p class="fw-semibold text-dark" style="font-size: 12px;">Year : {{ curryear }}</p>
                                    </div>
                                    <h3 class="fw-semibold ">{{ memberscount }}</h3>
                                </div>
                                <canvas id="memberschart" class="bg-transparent" style="width: 100%; height: 40px; "></canvas>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-lg-0 mt-3">
                            <div class="bg-white rounded shadow-sm border">
                                <div class="text-start pt-3 px-3 ">
                                    <div class="d-flex justify-content-between gap-2 ">
                                        <p class="fw-normal text-primary">Total Applicants</p>
                                        <p class="fw-semibold text-dark" style="font-size: 12px;">Year : {{ curryear }}</p>
                                    </div>
                                    <h3 class="fw-semibold">{{ applicantcount }}</h3>
                                </div>
                                <canvas id="applicantschart" class="bg-transparent" style="width: 100%; height: 40px; "></canvas>
                            </div>
                        </div>



                    </div>
                </section>
                <section id="section2">
                    <div class="row justify-content-center">



                        <div class="col-lg-6">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <div class="text-start border-bottom">
                                    <h6 class="fw-semibold">Applicants per month</h6>
                                </div>
                                <canvas id="applicantspermonth" class="mt-3" style="height: 300px; width: 100%;"></canvas>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-lg-0 mt-3">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <div class="text-start border-bottom">
                                    <h6 class="fw-semibold">Total Members</h6>
                                </div>
                                <canvas id="totalmembers" class="mt-3" style="height: 300px; width: 100%;"></canvas>
                            </div>
                        </div>



                    </div>
                </section>
                <section id="section3">
                    <div class="row justify-content-center">




                        <div class="col-lg-12">
                            <div class="bg-white py-3 px-3 shadow-sm rounded border">
                                 <div class="text-start border-bottom mb-3">
                                        <h6 class="fw-semibold">Latest Applications</h6>
                                    </div>
                                    <div class="d-flex justify-content-end mb-3">
                                        <div class="position-relative">
                                            <i class="bi bi-search position-absolute" style="top: 8px; left: 10px;"></i>
                                            <input v-model="searchname" type="text" placeholder="Search" class="form-control rounded shadow-none outline-secondary" style="padding-left: 30px; height: 35px;">
                                        </div>
                                    </div>
                                <div class="table-responsive">

                                    <table class="table">
                                        <thead class="border-top" style="background-color: #FAFAFA !important;">
                                            <tr>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Applicant <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Job <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Salary <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Branch <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Type <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Date Applied <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Status <i class="bi bi-chevron-up"></i></h6>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr v-for="(applicant, index) in filterdata" :key="index">
                                                <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ applicant?.userapplied?.name ?? '---' }}</td>
                                                <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ applicant?.jobapplied?.job_title ?? '---' }}</td>
                                                <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">₱{{ applicant?.jobapplied?.salary ?? '---' }}</td>
                                                <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ applicant?.jobapplied?.location ?? '---' }}</td>
                                                <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ applicant?.jobapplied?.type ?? '---' }}</td>
                                                <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ new Date(applicant.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) }}</td>
                                                <td v-if="applicant.status == 'Processing'" class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">
                                                    <i class="bi bi-hourglass-split py-1 px-2 rounded-5" style="background-color: #FDECCE; color: #C47E09;"> Processing</i>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div class="text-end">
                                        <div class="d-flex justify-content-end mt-3 gap-2 flex-wrap">
                                            <inertiaLink v-if="processing_applicants.prev_page_url" :href="processing_applicants.prev_page_url" preserve-state preserve-scroll
                                                class="fw-noramal py-1 text-decoration-none rounded">
                                                <button class="btn btn-outline-secondary py-1" style="font-size: 13px;">Previous</button>
                                            </inertiaLink>
                                            <inertiaLink v-if="processing_applicants.next_page_url" :href="processing_applicants.next_page_url"
                                                preserve-state preserve-scroll class="fw-noramal py-1 text-decoration-none rounded">
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
import chart from 'chart.js/auto'
import AdminNavigation from '../Components/AdminNavigation/AdminNavigation.vue';
import {router} from '@inertiajs/vue3'
import {Link as inertiaLink} from '@inertiajs/vue3'
export default {
    name: 'AdminDashboard',
    props: {jobcount:Number, memberscount:Number, applicantcount:Number, applicant:Array, members:Array, processing_applicants:Array, admin_info:Object},
    components: {AdminNavigation,inertiaLink},
    data(){
        return{
            curryear: new Date().getFullYear(),
            searchname: ''
        }
    },
    methods:{
        MembersChart(){
            const ctx = document.getElementById('memberschart');

            const labels = ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

            const monthlyCounts = Array(12).fill(0);

            this.members.forEach(app => {
                if (app.created_at) {
                    const date = new Date(app.created_at);
                    const month = date.getMonth();
                    monthlyCounts[month] += 1;
                }
            });

            const data = {
                labels: labels,
                datasets: [{
                    label: 'My First Dataset',
                    data: monthlyCounts,
                    fill: true,
                    borderColor: '#EF4444',
                    backgroundColor: '#FEF2F2',
                    tension: 0.1,
                    pointRadius: 0
                }]
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        },
                    },
                    scales: {
                        x: {
                            display: false
                        },
                        y: {
                            display: false
                        }
                    }
                }
            };

            new chart(ctx,config);
        },
        ApplicantChart(){
            const ctx = document.getElementById('applicantschart');

            const labels = ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

            const monthlyCounts = Array(12).fill(0);

            this.applicant.forEach(app => {
                if (app.created_at) {
                    const date = new Date(app.created_at);
                    const month = date.getMonth();
                    monthlyCounts[month] += 1;
                }
            });

            const data = {
                labels: labels,
                datasets: [{
                    label: 'My First Dataset',
                    data: monthlyCounts,
                    fill: true,
                    borderColor: '#22C55E',
                    backgroundColor: '#F2FDF5',
                    tension: 0.1,
                    pointRadius: 0
                }]
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: false
                        },
                    },
                    scales: {
                        x: {
                            display: false
                        },
                        y: {
                            display: false
                        }
                    }
                }
            };

            new chart(ctx,config);
        },
        Applicantspermonth(){
            const ctx = document.getElementById('applicantspermonth');

            const labels = ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

            const monthlyCounts = Array(12).fill(0);

            this.applicant.forEach(app => {
                if (app.created_at) {
                    const date = new Date(app.created_at);
                    const month = date.getMonth();
                    monthlyCounts[month] += 1;
                }
            });

            const data = {
                labels: labels,
                datasets: [{
                    label: this.curryear,
                    data: monthlyCounts,
                    fill: true,
                    borderColor: '#D22C90',
                    backgroundColor: '#FEDBFF',
                    tension: 0.1,
                }]
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                    },
                },
            };

            new chart(ctx,config);
        },
        TotalMembers(){
            const ctx = document.getElementById('totalmembers');

            const labels = ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

            const monthlyCounts = Array(12).fill(0);

            this.members.forEach(app => {
                if (app.created_at) {
                    const date = new Date(app.created_at);
                    const month = date.getMonth();
                    monthlyCounts[month] += 1;
                }
            });

            const data = {
                labels: labels,
                datasets: [{
                    label: this.curryear,
                    data: monthlyCounts,
                    fill: true,
                    borderColor: '#F59E0B',
                    backgroundColor: '#FFFBF3',
                    tension: 0.1,
                }]
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                    },
                },
            };

            new chart(ctx,config);
        },
        btnLogoutAccount(){
            router.post('/logoutaccount');
        }
    },
    computed:{
        filterdata(){
            return this.processing_applicants.data.filter((data) => {

                const filtername = data.userapplied.name.toLowerCase().includes(this.searchname.toLowerCase())

                return filtername
            });
        }
    },
    mounted(){
        this.MembersChart();
        this.ApplicantChart();
        this.Applicantspermonth();
        this.TotalMembers();
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
