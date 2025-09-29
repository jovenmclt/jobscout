<template>
    <div class="container-xxl bg-color min-vh-100">
        <div class="row pe-xl-3">
            <AdminNavigationVue />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-center">




                        <div class="col-lg-12 ">
                            <div class="text-start mt-3">
                                <span class="fw-normal text-secondary">Members > view</span>
                                <br>
                                <div class="d-flex justify-content-between gap-2">
                                    <h4 class="fw-semibold mt-2">View Member</h4>
                                    <inertiaLink :href="`/admin/members/edit/${membersinfo.id}`">
                                    <button class="btn btn-primary">Edit Account</button>
                                    </inertiaLink>
                                </div>
                            </div>
                            <div class="bg-white py-3 px-md-5 px-3 shadow-sm rounded border mt-3">
                                <div class="text-start">

                                    <div class="text-center">
                                        <img v-if="membersinfo.userinfo.profile_picture" :src="`/storage/${membersinfo?.userinfo?.profile_picture ?? '---'}`" class="w-100 py-2 px-2 border rounded" style="max-width: 100px; " alt="">
                                        <img v-else src="../Components/Assets/profile.png" width="100" alt="">
                                        <h5 class="fw-normal mt-2">{{ membersinfo?.userinfo?.name ?? '---' }}</h5>
                                    </div>
                                    <div class="d-flex justify-content-between  flex-md-nowrap gap-3">
                                        <div class="text-start w-75">
                                            <p class="fw-normal mb-0 text-secondary">Location</p>
                                            <h6 class="fw-normal" style="font-size: 14px;">{{ membersinfo?.userinfo?.location ?? '---' }}</h6>
                                            <p class="fw-normal mb-0 text-secondary">Educational Attainment</p>
                                            <h6 class="fw-normal" style="font-size: 14px;">{{ membersinfo?.userinfo?.education ?? '---' }}</h6>
                                        </div>
                                        <div class="text-start w-25">
                                            <p class="fw-normal mb-0 text-secondary">Age</p>
                                            <h6 class="fw-normal" style="font-size: 14px;">{{ membersinfo?.userinfo?.age ?? '---' }}</h6>
                                            <p class="fw-normal mb-0 text-secondary">Gender</p>
                                            <h6 class="fw-normal" style="font-size: 14px;">{{ membersinfo?.userinfo?.gender ?? '---' }}</h6>
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <p class="fw-normal mb-0 text-secondary">About</p>
                                        <h6 class="fw-normal" style="font-size: 14px;">{{ membersinfo?.userinfo?.about ?? '---' }}</h6>
                                    </div>
                                    <div class="text-start mt-3">
                                        <p class="fw-normal mb-0 text-secondary">Experience</p>
                                        <h6 class="fw-normal" style="font-size: 14px;">{{ membersinfo?.userinfo?.experience ?? '---' }}</h6>
                                    </div>
                                    <div class="text-start mt-3">
                                        <span @click="btnshowcv" class="ps-2 text-primary" style="font-size: 14px; cursor: pointer;">
                                            Curriculum Vitae
                                        </span>
                                        <usercurriculumvitaeVue v-if="showcv" :userinfo="membersinfo.application" @closepreview="btnshowcv"/>
                                        <span @click="btnshowresume" class="ps-2 text-primary" style="font-size: 14px; cursor: pointer;">
                                            Resume
                                        </span>
                                        <Userresume v-if="showresume" :userinfo="membersinfo.application" @closepreviewresume="btnshowresume"/>
                                    </div>
                                    <br>
                                    <h6 class="fw-normal">Job Information</h6>
                                    <div class="d-flex justify-content-between flex-md-nowrap flex-wrap gap-3 bg-white mt-3">
                                        <div class="text-start">
                                            <p class="fw-normal mb-0 text-secondary">Job Position</p>
                                            <h6 class="fw-normal" style="font-size: 14px;">{{ membersinfo?.position ?? '---' }}</h6>
                                            <p class="fw-normal mb-0 text-secondary">Salary</p>
                                            <h6 class="fw-normal" style="font-size: 14px;">₱{{ formatSalary(membersinfo?.salary ?? '---' )}}</h6>
                                        </div>
                                        <div class="text-start">
                                            <p class="fw-normal mb-0 text-secondary">Branch</p>
                                            <h6 class="fw-normal" style="font-size: 14px;">{{ membersinfo?.jobinfo?.location ?? '---' }}</h6>
                                            <p class="fw-normal mb-0 text-secondary">Type</p>
                                            <h6 class="fw-normal" style="font-size: 14px;">{{ membersinfo?.employment_type ?? '---' }}</h6>
                                        </div>
                                        <div class="text-start">
                                            <p class="fw-normal mb-0 text-secondary">Date Hired</p>
                                            <h6 class="fw-normal" style="font-size: 14px;">{{ membersinfo?.hired_date ?? '---' }}</h6>
                                            <p class="fw-normal mb-0 text-secondary">Account</p>
                                            <h6 v-if="membersinfo.status == '1'" class="fw-normal text-success" style="font-size: 14px;">Active</h6>
                                            <h6 v-else class="fw-normal text-danger" style="font-size: 14px;">Disabled</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </section>
                <section id="section2">
                    <div class="row justify-content-center">

                        <div class="col-lg-12">

                            <div class="bg-white py-3 px-3 shadow-sm rounded border">
                                <div class="d-flex justify-content-between mb-3">
                                    <div class="text-start  mt-2">
                                        <h6 class="fw-normal text-secondary">Application History</h6>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="border-top" style="background-color: #FAFAFA !important;">
                                            <tr>
                                                <th scope="col">
                                                    <h6 class="fw-normal mb-0" style="font-size: 14px;">Full Name <i class="bi bi-chevron-up"></i>
                                                    </h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-normal mb-0" style="font-size: 14px;">Job <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-normal mb-0" style="font-size: 14px;">Salary <i class="bi bi-chevron-up"></i>
                                                    </h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-normal mb-0" style="font-size: 14px;">Branch <i class="bi bi-chevron-up"></i>
                                                    </h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-normal mb-0" style="font-size: 14px;">Type <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-normal mb-0" style="font-size: 14px;">Status <i class="bi bi-chevron-up"></i></h6>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(gethistory, index ) in applicationhistory" :key="index">
                                                <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ gethistory?.userapplied?.name ?? '---' }}</td>
                                                <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ gethistory?.jobapplied?.job_title ?? '---' }}</td>
                                                <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">₱{{ formatSalary(gethistory?.jobapplied?.salary ?? '---') }}</td>
                                                <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ gethistory?.jobapplied?.location ?? '---' }}</td>
                                                <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ gethistory?.jobapplied?.type ?? '---' }}</td>
                                                <td v-if="gethistory.status == 'Hired'" class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">
                                                    <div class="py-1 px-3 rounded-5 text-center d-inline-block" style="background-color: #F2FDF5; color: #16A34A;">
                                                         <i class="bi bi-check-circle-fill" > Hired</i>
                                                    </div>
                                                </td>
                                                <td v-else-if="gethistory.status == 'Rejected'" class="fw-normal py-3 " style="font-size: 14px; padding-top: 11px;">
                                                    <div class="py-1 px-3 rounded-5 text-center d-inline-block" style="background-color: #FEF2F2; color: #DC2626;">
                                                       <i class="bi bi-x-circle-fill"> Rejected</i>
                                                    </div>
                                                </td>
                                                 <td v-else class="fw-normal py-3 " style="font-size: 14px; padding-top: 11px;">
                                                    <div class="py-1 px-3 rounded-5 text-center d-inline-block" style="background-color: #DFDEDC; color: #4E4E4E;">
                                                        <i class="bi bi-lock-fill" > Cancelled</i>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
import Userresume from '../Components/popup_pages/userresume.vue';
import usercurriculumvitaeVue from '../Components/popup_pages/usercurriculumvitae.vue';
export default {
    name: 'AdminCreateMember',
    props: {membersinfo:Object, applicationhistory:Array},
    components: {AdminNavigationVue, inertiaLink, Userresume, usercurriculumvitaeVue},
    data(){
        return{
            showresume: false,
            showcv:false
        }
    },
    methods:{
        formatSalary(value) {
            if (value == null || value === '') return '---';
            return Number(value).toLocaleString();
        },
        btnshowresume(){
            this.showresume = !this.showresume
        },
        btnshowcv(){
            this.showcv = !this.showcv
        },
    },
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
    font-family: "Poppins", sans-serif;
}

tbody td {
    white-space: nowrap;
    font-family: "Poppins", sans-serif;
}
</style>
