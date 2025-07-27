<template>
    <div class="container-xxl bg-color min-vh-100">
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
                                    <div class="position-relative">
                                        <i class="bi bi-search position-absolute" style="top: 8px; left: 10px;"></i>
                                        <input v-model="search_title" type="text" placeholder="Search" class="form-control rounded shadow-none outline-secondary" style="padding-left: 30px; height: 35px;">
                                    </div>
                                </div>
                                <div class="text-start">
                                    <a @click="get_type('')" class="fw-normal mx-3" style="cursor: pointer;"> All</a>
                                    <a @click="get_type('Full-time')" class="fw-normal" style="cursor: pointer;"> Full-time</a>
                                    <a @click="get_type('Part-time')" class="fw-normal mx-3" style="cursor: pointer;"> Part-time</a>
                                </div>
                            </div>
                        </div>

                        <template v-for="(getjob, indx) in job_filter" :key="indx">
                            <div class="col-lg-4 col-md-6 mt-4">
                                <div class="bg-white py-3 px-3 rounded border shadow-sm">
                                    <div class="text-end mb-2" >
                                        <p class="fw-semibold text-primary d-inline-block py-1 px-3 rounded-4 mb-0" style=" background-color: #EAEFFF; font-size: 14px;">{{ getjob.location }}</p>
                                    </div>
                                    <div class="text-start">
                                        <p class="fw-normal text-primary mb-1">{{ getjob.type }}</p>
                                        <h5 class="fw-semibold">{{ getjob.job_title }}</h5>
                                        <p class="fw-normal text-secondary">{{ getjob.description }}</p>
                                        <h6 class="fw-semibold mb-0">₱ {{ getjob.salary }}</h6>
                                        <p class="fw-light text-secondary mb-0">Monthly Salary</p>
                                    </div>
                                    <div class="text-end dropdown dropstart">
                                        <i class="bi bi-three-dots text-primary fs-5 " data-bs-toggle="dropdown" style="cursor: pointer;"></i>
                                        <ul class="dropdown-menu dropdown-menu-dark ">
                                            <li><inertiaLink :href="`/job/details/${getjob.id}`" class="dropdown-item" >See Details</inertiaLink></li>
                                        </ul>
                                    </div>
                                </div>
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
    props: {job_available:Array},
    data(){
        return{
            search_title: '',
            search_type: ''
        }
    },
    methods:{
        get_type(val){
            this.search_type = val
        }
    },
    computed:{
        job_filter(){
            return this.job_available.filter(filterjob => {
                const matchesTitle = filterjob.job_title.toLowerCase().includes(this.search_title.toLowerCase())
                const matchesType = this.search_type === '' || filterjob.type === this.search_type;
                return matchesTitle && matchesType;
            });
        },
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
