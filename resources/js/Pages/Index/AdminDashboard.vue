<template>
    <div class="container-xxl bg-color">
        <div class="row">
            <AdminNavigation />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <section id="section1">
                    <div class="row justify-content-start">
                        <div class="text-start">
                            <h4 class="fw-semibold">Dashboard</h4>
                            <div class="py-3 px-3 bg-white rounded shadow-sm d-flex justify-content-between mt-3 mb-4" style="width: 350px;">
                                <div class="d-flex gap-2">
                                    <div class="text-start">
                                        <img src="../Components/Assets/admin-profile.png" alt="" width="50">
                                    </div>
                                    <div class="text-start mt-1">
                                        <h6 class="fw-semibold mb-0">Welcome</h6>
                                        <p class="fw-normal text-secondary mb-0">Admin user</p>
                                    </div>
                                </div>
                                <div class="text-start mt-1">
                                    <a href="#">
                                        <button class="btn btn-outline-secondary"><i class="bi bi-box-arrow-left"> Sign out</i></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="bg-white rounded shadow-sm">
                                <div class="text-start pt-3 px-3 ">
                                    <p class="fw-normal text-secondary mb-2">Jobs Open</p>
                                    <h3 class="fw-semibold">191</h3>
                                </div>
                                <canvas id="jobschart" class="bg-transparent" style="width: 100%; height: 40px; "></canvas>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-lg-0 mt-3">
                            <div class="bg-white rounded shadow-sm">
                                <div class="text-start pt-3 px-3 ">
                                    <p class="fw-normal text-secondary mb-2">New Members</p>
                                    <h3 class="fw-semibold">1340</h3>
                                </div>
                                <canvas id="memberschart" class="bg-transparent" style="width: 100%; height: 40px; "></canvas>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-lg-0 mt-3">
                            <div class="bg-white rounded shadow-sm">
                                <div class="text-start pt-3 px-3 ">
                                    <p class="fw-normal text-secondary mb-2">New Applicants</p>
                                    <h3 class="fw-semibold">5343</h3>
                                </div>
                                <canvas id="applicantschart" class="bg-transparent" style="width: 100%; height: 40px; "></canvas>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="section2">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="bg-white py-3 px-3 rounded shadow-sm">
                                <div class="text-start border-bottom">
                                    <h6 class="fw-semibold">Applicants per month</h6>
                                </div>
                                <canvas id="applicantspermonth" class="mt-3" style="height: 300px; width: 100%;"></canvas>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-lg-0 mt-3">
                            <div class="bg-white py-3 px-3 rounded shadow-sm">
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
                            <div class="bg-white py-3 px-3">
                                <div class="table-responsive">
                                    <div class="text-start border-bottom mb-3">
                                        <h6 class="fw-semibold">Latest Applications</h6>
                                    </div>
                                    <div class="d-flex justify-content-end mb-3">
                                        <div class="position-relative">
                                            <i class="bi bi-search position-absolute" style="top: 8px; left: 10px;"></i>
                                            <input type="text" placeholder="Search" class="form-control rounded shadow-none outline-secondary" style="padding-left: 30px; height: 35px;">
                                        </div>
                                    </div>
                                    <table class="table">
                                        <thead class="border-top" style="background-color: #FAFAFA !important;">
                                            <tr>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Date <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Job <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Applicant <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Status <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">May 20, 2025</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Waiter</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Lisette Balley</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">
                                                    <i class="bi bi-check-circle-fill py-1 px-2 rounded-5" style="background-color: #F2FDF5; color: #16A34A;"> Passed</i>
                                                </td>
                                                <td class="fw-semibold text-primary py-3" style="font-size: 12px; padding-top: 11px;">Open</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">May 20, 2025</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Waiter</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Lisette Balley</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">
                                                    <i class="bi bi-hourglass-split py-1 px-2 rounded-5" style="background-color: #FDECCE; color: #C47E09;"> Processing</i>
                                                </td>
                                                 <td class="fw-semibold text-primary py-3" style="font-size: 12px; padding-top: 11px;">Open</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">May 20, 2025</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Waiter</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Lisette Balley</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">
                                                    <i class="bi bi-x-circle-fill py-1 px-2 rounded-5" style="background-color: #FEF2F2; color: #DC2626;"> Rejected</i>
                                                </td>
                                                 <td class="fw-semibold text-primary py-3" style="font-size: 12px; padding-top: 11px;">Open</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-end">
                                        <button class="btn btn-outline-secondary px-4" style="font-size: 13px;">Next</button>
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
export default {
    name: 'AdminDashboard',
    components: {AdminNavigation},
    data(){
        return{

        }
    },
    methods:{
        JobsChart(){
            const ctx = document.getElementById('jobschart');

            const labels = ['Jan', 'Feb', 'March', 'April', 'May'];
            const data = {
                labels: labels,
                datasets: [{
                    label: 'My First Dataset',
                    data: [135, 159, 141, 181, 116],
                    fill: true,
                    borderColor: '#6C25E6',
                    backgroundColor: '#F6F5FF',
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
        MembersChart(){
            const ctx = document.getElementById('memberschart');

            const labels = ['Jan', 'Feb', 'March', 'April', 'May'];
            const data = {
                labels: labels,
                datasets: [{
                    label: 'My First Dataset',
                    data: [65, 59, 80, 81, 56],
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

            const labels = ['Jan', 'Feb', 'March', 'April', 'May'];
            const data = {
                labels: labels,
                datasets: [{
                    label: 'My First Dataset',
                    data: [135, 159, 121, 181, 156],
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
        ApplicantsMonthly(){
            const ctx = document.getElementById('applicantspermonth');

            const labels = ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Applications',
                    data: [154, 156, 157, 158, 159, 156, 157, 157, 158, 159, 158, 161],
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
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Members',
                    data: [254, 256, 167, 148, 119, 256, 457, 257, 258, 119, 148, 171],
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
        }
    },
    mounted(){
        this.MembersChart();
        this.ApplicantChart();
        this.JobsChart();
        this.ApplicantsMonthly();
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
