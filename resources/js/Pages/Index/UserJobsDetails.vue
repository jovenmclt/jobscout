<template>
    <div class="container-xxl">
        <div class="row pe-xl-3">
            <UserNavigation />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">


                        <div class="text-start mt-3">
                            <span class="fw-normal text-secondary">Jobs > Details</span>
                        </div>
                        <div class="col-lg-5 mt-3">
                            <div class="text-center mt-5">
                                <h3 class="fw-semibold">{{ jobtitle }}</h3>
                                <inertiaLink :href="`/job/interview/${jobid}`">
                                    <button class="btn btn-primary w-50">Apply Now</button>
                                </inertiaLink>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <div class="d-flex justify-content-between bg-white rounded shadow-sm border py-3 px-3">
                                <div class="text-start">
                                    <p class="fw-normal mb-0">Job Position</p>
                                    <h6 class="fw-semibold">{{ jobtitle }}</h6>
                                    <br>
                                    <p class="fw-normal mb-0">Salary</p>
                                    <h6 class="fw-semibold">₱ {{ salary }}</h6>
                                </div>
                                <div class="text-start">
                                    <p class="fw-normal mb-0">Branch</p>
                                    <h6 class="fw-semibold">{{ location }}</h6>
                                    <br>
                                    <p class="fw-normal mb-0">Type</p>
                                    <h6 class="fw-semibold">{{ type }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <section id="jobdescription">
                    <div class="row justify-content-center">



                        <div class="col-lg-12">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <div class="text-start border-bottom">
                                    <h6 class="fw-semibold">Job Desciption & Qualifications</h6>
                                </div>
                                <div class="text-start mt-3">
                                    <p class="fw-normal text-dark">{{ description }}</p>
                                    <ul v-for="(getquali, index) in job_qualification" :key="index">
                                        <li>
                                            <p class="fw-normal text-dark mb-0">{{ getquali.qualification }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="text-end mt-3 mx-3">
                                <button @click="btnCancel" class="btn btn-outline-secondary px-4">Cancel</button>
                            </div>
                        </div>



                    </div>
                </section>
                <Applyfailed v-if="!check_userinfo" />
            </main>
        </div>
    </div>
</template>

<script>
import UserNavigation from '../Components/UserNavigation/UserNavigation.vue';
import {router} from '@inertiajs/vue3'
import {Link as inertiaLink} from '@inertiajs/vue3'
import Applyfailed from '../Components/popup_pages/applyfailed.vue';

export default {
    name: 'UserJobDetails',
    components: {UserNavigation, inertiaLink, Applyfailed},
    props: {job_details:Object, job_qualification:Array, check_userinfo:Boolean},
    data(){
        return{
            jobid: this.job_details ? this.job_details.id : '',
            jobtitle: this.job_details ? this.job_details.job_title : '',
            salary: this.job_details ? this.job_details.salary : '',
            location: this.job_details ? this.job_details.location : '',
            type: this.job_details ? this.job_details.type : '',
            description: this.job_details ? this.job_details.description : ''
        }
    },
    methods: {
        btnCancel(){
            router.visit('/user/jobs');
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

</style>
