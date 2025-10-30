<template>
    <div class="container-xxl bg-color min-vh-100">
        <div class="row pe-xl-3">
            <AdminNavigation :check_unread="check_unread"/>
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="sec1">
                    <div class="row justify-content-start">
                        <div class="text-start mt-3">
                            <h4 class="fw-semibold">Analytics & Reports</h4>
                        </div>

                        <div class="text-start mt-3">
                            <select v-model="selected_year" id="year" class="form-select w-100 shadow-none" style="max-width: 200px;">
                                <template v-for="(getyear, index) in years" :key="index">
                                    <option :value="getyear">Year {{ getyear }}</option>
                                </template>

                            </select>
                        </div>

                        <div class="col-xl-6 mt-3">

                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <h6 class="fw-semibold text-dark">Job Posts</h6>
                                <canvas id="jobpost" style="max-height: 300px; width: 100%;"></canvas>
                                <div class="d-flex justify-content-between gap-3">
                                    <div class="text-start mt-2">
                                        <h6 class="fw-normal mb-0" style="font-size: 14px;">Total Jobs post</h6>
                                        <h5 class="fw-semibold mb-0">{{ totaljobpost }}</h5>
                                    </div>
                                    <div class="text-start mt-4">
                                        <inertiaLink href="#" @click="viewjobpostreport" style="font-size: 14px;"><i class="bi bi-box-arrow-up-right"> View Report</i></inertiaLink>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-6 mt-3">

                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <h6 class="fw-semibold text-dark">Applications</h6>
                                <canvas id="applications" style="max-height: 250px; width: 100%;"></canvas>
                                <div class="d-flex gap-5 mt-2">
                                    <div class="text-start">
                                        <h6 class="fw-normal mb-0" style="font-size: 14px;">Total Applications</h6>
                                        <h5 class="fw-semibold mb-0">{{ totalapplication }}</h5>
                                    </div>
                                    <div class="text-start">
                                        <h6 class="fw-normal mb-0" style="font-size: 14px;">Applications This Month</h6>
                                        <h5 class="fw-semibold mb-0">{{ totalapplicationthismonth }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start">

                        <div class="col-xl-6 mt-3">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <h6 class="fw-semibold text-dark">Applicants</h6>
                                <canvas id="applicants" style=" max-height: 300px; width: 100%;"></canvas>
                                <div class="d-flex justify-content-between gap-3 mt-2">
                                    <div class="text-start mt-2">
                                        <h6 class="fw-normal mb-0"  style="font-size: 14px;">Total Applicants</h6>
                                        <h5 class="fw-semibold mb-0">{{ totalapplicants }}</h5>
                                    </div>
                                    <div class="text-start mt-4">
                                        <inertiaLink @click="viewapplicationreport" href="" style="font-size: 14px;"><i class="bi bi-box-arrow-up-right"> View Report</i></inertiaLink>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-6 mt-3">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <h6 class="fw-semibold text-dark">Members</h6>
                                <canvas id="hires" style=" max-height: 300px; width: 100%;"></canvas>
                                <div class="d-flex justify-content-between gap-3 mt-2">
                                    <div class="text-start mt-2">
                                        <h6 class="fw-normal mb-0"  style="font-size: 14px;">Total Members</h6>
                                        <h5 class="fw-semibold mb-0">{{ totalhires }}</h5>
                                    </div>
                                    <div class="text-start mt-4">
                                        <inertiaLink @click="viewmemberreport" href="" style="font-size: 14px;"><i class="bi bi-box-arrow-up-right"> View Report</i></inertiaLink>
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
import chart from 'chart.js/auto'
import {Link as inertiaLink} from '@inertiajs/vue3'
import {router} from '@inertiajs/vue3'
export default {
    name: 'AdminAnalytics',
    components: {AdminNavigation, inertiaLink},
    props: {check_unread:Boolean, joblist:Array, applicationlist:Array, hiredapplicant:Array},
    data(){
        return{
            selected_year: new Date().getFullYear(),
            years: [],

            jobchartinstance: null,
            totaljobpost: 0,

            applicantschartinstance: null,
            totalapplicants: 0,

            hireschartinstance: null,
            totalhires: 0,

            applicationchartinstance: null,
            totalapplication: 0,
            totalapplicationthismonth: 0
        }
    },
    methods:{
        viewjobpostreport(){
            const data = {
                year: this.selected_year,
                report: 'Jobpost'
            };

            router.get('/adminreport', data);
        },
        viewapplicationreport(){
            const data = {
                year: this.selected_year,
                report: 'Application'
            };

            router.get('/adminreport', data);
        },
        viewmemberreport(){
            const data = {
                year: this.selected_year,
                report: 'Members'
            };

            router.get('/adminreport', data);
        },
        generateYears() {
            const currentYear = new Date().getFullYear();
            const startYear = 2024;
            const endYear = currentYear ;
            this.years = Array.from({ length: endYear - startYear + 1 }, (_, i) => startYear + i);
        },
        jobchart(){
            const ctx = document.getElementById('jobpost');

            if (this.jobchartinstance) {
                this.jobchartinstance.destroy();
            }

            const labels = ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

            const monthlyCounts = Array(12).fill(0);

            this.totaljobpost = 0;

            this.joblist.forEach((app) => {
                if (app.created_at) {
                    const date = new Date(app.created_at);
                    const year = date.getFullYear();
                    const month = date.getMonth();
                    if (!this.selected_year || year == this.selected_year) {
                        monthlyCounts[month] += 1;
                        this.totaljobpost += 1;
                    }
                }
            });

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Total Jobs',
                    data: monthlyCounts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

           this.jobchartinstance = new chart(ctx, config);
        },
        hireschart(){
            const ctx = document.getElementById('hires');

            if (this.hireschartinstance) {
                this.hireschartinstance.destroy();
            }

            const labels = ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

            const monthlyCounts = Array(12).fill(0);

            this.totalhires = 0;

            this.hiredapplicant.forEach((app) => {
                if (app.created_at) {
                    const date = new Date(app.created_at);
                    const year = date.getFullYear();
                    const month = date.getMonth();
                    if (!this.selected_year || year == this.selected_year) {
                        monthlyCounts[month] += 1;
                        this.totalhires += 1;
                    }
                }
            });

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Total Members',
                    data: monthlyCounts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

           this.hireschartinstance = new chart(ctx, config);
        },
        applicantschart(){

            const ctx = document.getElementById('applicants');


            if (this.applicantschartinstance) {
                this.applicantschartinstance.destroy();
            }

            const labels = ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

            const monthlyCounts = Array(12).fill(0);

            this.totalapplicants = 0;

            this.applicationlist.forEach((app) => {
                if (app.created_at) {
                    const date = new Date(app.created_at);
                    const year = date.getFullYear();
                    const month = date.getMonth();
                    if (!this.selected_year || year == this.selected_year) {
                        monthlyCounts[month] += 1;
                        this.totalapplicants += 1;
                    }
                }
            });

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Total Applicants',
                    data: monthlyCounts,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            };

            const config = {
                type: 'line',
                data: data,
            };

            this.applicantschartinstance = new chart(ctx, config);
        },
        applicationchart() {
            const ctx = document.getElementById('applications');

            if (this.applicationchartinstance) {
                this.applicationchartinstance.destroy();
            }

            this.totalapplication = 0;
            this.totalapplicationthismonth = 0;
            const month = new Date().getMonth();

            let applist = this.applicationlist.filter(data => {
                const date = new Date(data.created_at);
                return date.getFullYear() === this.selected_year;
            });

            const appmonths = applist.filter(data => {
                const date = new Date(data.created_at);
                return date.getMonth() === month;
            });

            this.totalapplicationthismonth = appmonths.length;
            this.totalapplication = applist.length;

            let hiredapplicants = applist.filter(data => {
                return data.status?.toLowerCase().includes('hired');
            });

            let Rejectedapplicants = applist.filter(data => {
                return data.status?.toLowerCase().includes('rejected');
            });

            let Processingapplicants = applist.filter(data => {
                return data.status?.toLowerCase().includes('processing');
            });

            const data = {
                labels: ['Processing', 'Hired','Rejected'],
                datasets: [{
                    label: 'Total Applications',
                    data: [Processingapplicants.length,  hiredapplicants.length, Rejectedapplicants.length,],
                    backgroundColor: [
                        'rgb(255, 205, 86)',
                        'rgb(163, 220, 154)',
                        'rgb(191, 9, 47)',

                    ],
                    hoverOffset: 4
                }]
            };

            const config = {
                type: 'pie',
                data: data,
                options: {
                    plugins: {
                        legend: {
                            position: 'right', // 👈 moves labels to the right
                            labels: {
                                usePointStyle: true,
                                boxWidth: 20,
                                padding: 15,
                                font: {
                                    size: 14
                                }
                            }
                        }
                    },
                    layout: {
                        padding: 20
                    }
                }
            };

            this.applicationchartinstance = new chart(ctx, config);
        }

    },
    watch: {
        selected_year() {
            this.jobchart();
            this.applicationchart();
            this.applicantschart();
            this.hireschart();
        },
    },
    mounted(){
        this.generateYears();
        this.applicationchart();
        this.jobchart();
        this.applicantschart();
        this.hireschart();
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
