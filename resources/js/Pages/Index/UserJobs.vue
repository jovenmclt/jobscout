<template>
    <div class="container-xxl  min-vh-100">
        <div class="row pe-xl-3">
            <UserNavigationVue />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">



                        <div class="text-start mt-3">
                            <h4 class="fw-semibold">Available Jobs</h4>
                            <div class="d-flex justify-content-between gap-3 flex-wrap mt-3">
                                <div class="text-start">
                                    <select v-model="search_type" class="form-select shadow-none" aria-label="Default select example">
                                        <option value="All">All</option>
                                        <option value="Full-time">Full time job</option>
                                        <option value="Part-time">Part time job</option>
                                    </select>
                                </div>
                                <div class="text-start">
                                    <div class="position-relative">
                                        <i class="bi bi-search position-absolute" style="top: 8px; left: 10px;"></i>
                                        <input v-model="search_title" type="text" placeholder="Search" class="form-control rounded shadow-none outline-secondary" style="padding-left: 30px; ">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-if="check_usermember" class="col-12 mt-4">
                            <br><br><br><br><br>
                            <div class="text-center">
                                <h3 class="fw-semibold text-primary">You are already registered <br> as a member</h3>
                            </div>
                        </div>

                        <template v-else v-for="(getjob, indx) in job_filter" :key="indx">
                            <div class="col-xl-4 col-lg-6 mt-4">
                                <inertiaLink :href="`/job/details/${getjob.id}`" class="text-decoration-none ">
                                    <div class="bg-white py-3 px-3 rounded border shadow-sm jobhov">
                                        <div class="text-end mb-2" >
                                            <p class="fw-semibold text-primary d-inline-block py-1 px-3 rounded-4 mb-0" style=" background-color: #EAEFFF; font-size: 14px;">{{ getjob.location }}</p>
                                        </div>
                                        <div class="text-start">
                                            <p class="fw-normal text-primary mb-1">{{ getjob.type }}</p>
                                            <h5 class="fw-semibold text-dark">{{ getjob.job_title }}</h5>
                                            <p class="fw-normal text-secondary mb-2" style="font-size: 14px;">{{ getjob.description }}</p>
                                            <h6 class="fw-semibold mb-0 text-dark">₱ {{ getjob.salary }}</h6>
                                            <p class="fw-light text-secondary mb-0">Monthly Salary</p>
                                        </div>
                                    </div>
                                </inertiaLink>
                            </div>
                        </template>


                    </div>
                </section>
            </main>
        </div>
    </div>
</template>

<script>
import UserNavigationVue from '../Components/UserNavigation/UserNavigation.vue'
import {Link as inertiaLink} from '@inertiajs/vue3'
export default {
    name: 'UserJobs',
    components: {UserNavigationVue, inertiaLink},
    props: {job_available:Array, check_usermember:Boolean},
    data(){
        return{
            search_title: '',
            search_type: 'All',
        }
    },
    methods:{

    },
    computed:{
        job_filter(){
            return this.job_available.filter(filterjob => {
                const matchesTitle = filterjob.job_title.toLowerCase().includes(this.search_title.toLowerCase())
                const matchesType = this.search_type === 'All' || filterjob.type === this.search_type;
                return matchesTitle && matchesType;
            });
        },
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

section{
    font-family: "Poppins", sans-serif;
    padding: calc(10px + 1rem) 0;
    overflow-wrap: break-word;
}
.jobhov:hover{
    border: 1px solid black !important;
    transition: 0.5s;
}
</style>
