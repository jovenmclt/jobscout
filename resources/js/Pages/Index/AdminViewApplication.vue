<template>
    <div class="container-xxl bg-color min-vh-100">
        <div class="row pe-xl-3">
            <AdminNavigation :check_unread="check_unread"/>
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">



                        <div class="text-start mt-3">
                            <span class="fw-normal text-secondary">Application > View</span>
                            <br>
                            <div class="d-flex justify-content-between gap-2">
                                <h4 class="fw-semibold mt-2">View application</h4>
                                <h6 class="fw-normal mt-2">View ID: {{ application_info?.userapplied?.id ?? '---' }}</h6>
                            </div>

                        </div>
                        <div class="col-lg-2 mt-2">
                            <div class="text-center">
                                <img v-if="application_info?.userapplied?.profile_picture" :src="`/storage/${application_info?.userapplied?.profile_picture}`" style="width: 120px; max-width: 120px; max-height: 120px;" class="rounded mt-2"  alt="">
                                <img v-else src="../Components/Assets/profile.png" width="100" alt="">
                                <h5 class="fw-normal mb-0 mt-2">{{ application_info?.userapplied?.name ?? '---' }}</h5>
                            </div>
                        </div>
                        <div class="col-lg-5 mt-3">
                            <div class="d-flex justify-content-between gap-3 flex-md-nowrap bg-white py-3 px-3 shadow-sm border rounded">
                                <div class="text-start w-75">
                                    <p class="fw-normal mb-0 text-secondary">Location</p>
                                    <h6 class="fw-normal" style="font-size: 14px;">{{  application_info?.userapplied?.location ?? '---' }}</h6>
                                    <p class="fw-normal mb-0 text-secondary">Educational Attainment</p>
                                    <h6 class="fw-normal" style="font-size: 14px;">{{  application_info?.userapplied?.education ?? '---' }}</h6>
                                </div>
                                <div class="text-start w-25">
                                    <p class="fw-normal mb-0 text-secondary">Age</p>
                                    <h6 class="fw-normal" style="font-size: 14px;">{{  application_info?.userapplied?.age ?? '---' }}</h6>
                                    <p class="fw-normal mb-0 text-secondary">Gender</p>
                                    <h6 class="fw-normal" style="font-size: 14px;">{{  application_info?.userapplied?.gender ?? '---' }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 mt-3">
                            <div class="d-flex justify-content-between flex-md-nowrap gap-3 bg-white py-3 px-3 shadow-sm border rounded">
                                <div class="text-start">
                                    <p class="fw-normal mb-0 text-secondary">Aspiring Job</p>
                                    <h6 class="fw-normal" style="font-size: 14px;">{{ application_info?.jobapplied?.job_title ?? '---' }}</h6>
                                    <p class="fw-normal mb-0 text-secondary">Salary</p>
                                    <h6 class="fw-normal" style="font-size: 14px;">₱{{ formatSalary(application_info?.jobapplied?.salary) }}</h6>
                                </div>
                                <div class="text-start">
                                    <p class="fw-normal mb-0 text-secondary">Branch</p>
                                    <h6 class="fw-normal" style="font-size: 14px;">{{ application_info?.jobapplied?.location ?? '---' }}</h6>
                                    <p class="fw-normal mb-0 text-secondary">Type</p>
                                    <h6 class="fw-normal" style="font-size: 14px;">{{ application_info?.jobapplied?.type ?? '---' }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start px-3">
                        <div class=" text-end mt-4">
                            <p class="fw-normal ">
                                <span @click="btnshowcv" class="text-primary px-2 border-end border-dark text-decoration-underline"  style="font-size: 17px; cursor: pointer;">Curriculum vitae</span>
                                <span @click="btnshowresume" class="text-primary mx-2 text-decoration-underline"  style="font-size: 17px; cursor: pointer;"> Resume </span>
                            </p>
                            <userresumeVue v-if="showresume" :userinfo="application_info" @closepreviewresume="btnshowresume"/>
                            <usercurriculumvitaeVue v-if="showcv" :userinfo="application_info" @closepreview="btnshowcv"/>
                        </div>
                    </div>
                </section>
                <section id="interview">
                    <div class="row justify-content-center">




                        <div v-if="interview_info.length > 0" class="col-lg-12">
                            <div class="text-start">
                                <h6 class="fw-normal">Interview Answers</h6>
                            </div>
                            <div class="my-3" style="max-height: 550px; overflow-y: auto; scrollbar-width: thin;">
                                <template v-for="(getinterview, index) in interview_info" :key="index" >
                                    <div class="bg-white py-3 px-3 rounded border shadow-sm mt-2" >
                                        <div class="text-start">
                                            <p class="fw-noraml text-secondary mb-2" style="font-size: 14px;">{{ getinterview?.jobquestion?.question ?? '---' }}</p>
                                            <p class="fw-normal text-dark mb-0">{{ getinterview?.answer ?? '---' }}</p>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <div v-if="application_info.status == `Processing`" class="text-end mt-5">
                                <button @click="btnSubmit('Hired')" class="btn btn-success" style="font-size: 14px;"><i class="bi bi-check-lg"></i> Approved</button>
                                <button @click="btnSubmit('Rejected')" class="btn btn-danger mx-3" style="font-size: 14px;"><i class="bi bi-x-circle-fill"></i> Rejected</button>
                                <button @click="btnclose" class="btn btn-secondary px-3" style="font-size: 14px;">Close</button>
                            </div>
                            <div v-else class="text-end mt-5 mx-3">
                                <h6 v-if="application_info.status == 'Hired'" class="fw-semibolod text-success"> Hired</h6>
                                <h6 v-else class="fw-semibolod text-danger"> Rejected</h6>
                            </div>
                        </div>

                        <div v-else class="col-lg-12">
                            <div class="text-center">
                                <h6 class="fw-normal">No interview history. Admin recruited this member.</h6>
                            </div>
                        </div>


                    </div>
                </section>
                <Applicationresult v-if="showpopup" :passresult="passresult"/>
            </main>
        </div>
    </div>
</template>

<script>
import AdminNavigation from '../Components/AdminNavigation/AdminNavigation.vue';
import Applicationresult from '../Components/popup_pages/applicationresult.vue';
import userresumeVue from '../Components/popup_pages/userresume.vue';
import {router} from '@inertiajs/vue3'
import usercurriculumvitaeVue from '../Components/popup_pages/usercurriculumvitae.vue';
export default {
    name: 'AdminViewApplication',
    components: {AdminNavigation, userresumeVue, Applicationresult, usercurriculumvitaeVue},
    props: {application_info:Object, interview_info:Array, check_unread:Boolean},
    data(){
        return{
           showresume: false,
           showcv: false,
           showpopup: false,

           passresult: ''
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
        btnclose(){
            router.visit('/admin/application');
        },
        btnSubmit(val){

            this.passresult = val;

            const data = {
                result: val
            }
            const application_id = this.application_info.id

            router.post(`/store/jobresult/${application_id}`, data, {
                preserveScroll:true,
                preserveState:true,
                onSuccess: () => {
                    this.showpopup = !this.showpopup
                },
                onError: (error) => {
                    console.log(error);
                }
            });
        }
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

</style>
