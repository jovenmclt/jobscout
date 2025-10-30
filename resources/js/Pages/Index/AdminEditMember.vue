<template>
    <div class="container-xxl bg-color min-vh-100">
        <div class="row pe-xl-3">
            <AdminNavigationVue :check_unread="check_unread"/>
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-center">


                        <div class="text-start mt-3">
                            <span class="fw-normal text-secondary">Members > Edit</span>
                            <br>
                            <h4 class="fw-semibold mt-2">Edit Member</h4>
                        </div>
                        <div class="col-lg-12 mt-3">

                            <div class="bg-white py-3 px-3 shadow-sm rounded border">
                                <div class="text-start">

                                    <h6 class="fw-semibold">Job Position</h6>
                                    <div class="d-flex flex-md-nowrap flex-wrap gap-3 mt-3">
                                        <div class="text-start w-100">
                                            <label for="job" class="form-label">Job<span class="text-danger">*</span></label>
                                            <select v-model="jobid" class="form-select shadow-none">
                                                <template v-for="(getjoblist, index) in Job_list" :key="index">
                                                    <option :value="getjoblist.id">{{ getjoblist?.job_title ?? '---' }}</option>
                                                </template>
                                            </select>
                                        </div>
                                        <div class="text-start w-100">
                                            <label for="branch" class="form-label">Location<span class="text-danger">*</span></label>
                                            <input v-model="location" id="branch" type="text" class="form-control shadow-none" disabled>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-md-nowrap flex-wrap gap-3 mt-3">
                                        <div class="text-start w-100">
                                            <label for="salary" class="form-label">Salary<span class="text-danger">*</span></label>
                                            <input v-model="salary" id="salary" type="text" class="form-control shadow-none" disabled>
                                        </div>
                                        <div class="text-start w-100">
                                            <label for="type" class="form-label">Type<span class="text-danger">*</span></label>
                                            <select v-model="type" class="form-select shadow-none" disabled>
                                                <option selected></option>
                                                <option value="Full-time">Full-time</option>
                                                <option value="Part-time">Part-time</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.jobid">Job field is required</p>

                                <div class="text-end mt-3">
                                    <button @click="btnchangejob" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>

                            <br>

                            <div class="bg-white py-3 px-3 shadow-sm rounded border">
                                <div class="text-start">

                                    <h6 class="fw-semibold">Profile Information</h6>
                                    <div class="d-flex gap-3 mt-3">
                                        <div class="text-start w-50">
                                            <label id="name" class="form-label">Name<span class="text-danger">*</span></label>
                                            <input v-model="name" id="name" type="text" class="form-control shadow-none">
                                            <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.name">{{ errors.name }}</p>
                                        </div>
                                        <div class="text-start w-25">
                                            <label for="age" class="form-label">Age<span class="text-danger">*</span></label>
                                            <input v-model="age" id="age" maxlength="2" type="text"  @input="age = age.replace(/\D/g, '')" class="form-control shadow-none">
                                             <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.age">{{ errors.age }}</p>
                                        </div>
                                        <div class="text-start w-25">
                                            <label for="gender" class="form-label">Gender<span class="text-danger">*</span></label>
                                             <select v-model="gender" class="form-select shadow-none">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                             <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.gender">{{ errors.gender }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 mt-3">
                                        <div class="text-start w-50">
                                            <label for="location" class="form-label">Location<span class="text-danger">*</span></label>
                                            <input v-model="userlocation" id="location" type="text" class="form-control shadow-none">
                                             <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.location">{{ errors.location }}</p>
                                        </div>
                                        <div class="text-start w-50">
                                            <label for="educ" class="form-label">Educational Attainment<span class="text-danger">*</span></label>
                                            <input v-model="education" id="educ" type="text" class="form-control shadow-none">
                                             <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.education">{{ errors.education }}</p>
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="about" class="form-label">About<span class="text-danger">*</span></label>
                                        <textarea v-model="about" id="about" class="form-control shadow-none"  style="height: 100px" ></textarea>
                                         <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.about">{{ errors.about }}</p>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="exp" class="form-label">Experience<span class="text-danger">*</span></label>
                                        <textarea v-model="experience" id="exp" class="form-control shadow-none"  style="height: 100px" ></textarea>
                                         <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.experience">{{ errors.experience }}</p>
                                    </div>

                                </div>
                                <div class="text-end mt-3">
                                    <button @click="btnchangememberinfo" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>



                    </div>
                </section>
                <userinfoedited v-if="showpopupmessage"/>
            </main>
        </div>
    </div>
</template>

<script>
import AdminNavigationVue from '../Components/AdminNavigation/AdminNavigation.vue'
import {router} from '@inertiajs/vue3'
import userinfoedited from '../Components/popup_pages/userinfoedited.vue'

export default {
    name: 'AdminEditMember',
    props: {Job_list:Array, members_info:Object, errors:Object, check_unread:Boolean},
    components: {AdminNavigationVue, userinfoedited},
    data(){
        return{
            jobid: this.members_info ? this.members_info.jobinfo.id : '',
            salary: this.members_info ? this.members_info.jobinfo.salary : '',
            location: this.members_info ? this.members_info.jobinfo.location : '',
            type: this.members_info ? this.members_info.jobinfo.type : '',

            name: this.members_info ? this.members_info.userinfo.name : '',
            age: this.members_info ? this.members_info.userinfo.age : '',
            gender: this.members_info ? this.members_info.userinfo.gender : '',
            userlocation: this.members_info ? this.members_info.userinfo.location : '',
            education: this.members_info ? this.members_info.userinfo.education : '',
            about: this.members_info ? this.members_info.userinfo.about : '',
            experience: this.members_info ? this.members_info.userinfo.experience : '',

            userid: this.members_info ? this.members_info.userinfo.id : '',

            membersid: this.members_info ? this.members_info.id : '',

            showpopupmessage: ''
        }
    },
    methods:{
        btnchangejob(){

            const data = {
                jobid: this.jobid
            }

            let proceed = confirm('Are you sure you want to save this changes?')

            if(proceed){
                router.post(`/editmemberjob/${this.membersid}`, data, {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.showpopupmessage = !this.showpopupmessage
                    },
                    onError: (error) => {
                        console.log(error);
                    }
                });
            }


        },
        btnchangememberinfo(){

            const data = {
                name: this.name,
                age: this.age,
                gender: this.gender,
                location: this.userlocation,
                education: this.education,
                about: this.about,
                experience: this.experience
            }

            let proceed = confirm('Are you sure you want to save this changes?')

            if(proceed){
                router.post(`/editmemberinfo/${this.userid}`, data, {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.showpopupmessage = !this.showpopupmessage
                    },
                    onError: (error) => {
                        console.log(error);
                    }
                });
            }

        },
    },
    watch:{
        jobid(jobid){
            this.$nextTick(() => {

                for(let i = 0; i < this.Job_list.length; i++){

                    if(jobid == this.Job_list[i].id){
                        this.salary = this.Job_list[i].salary;
                        this.location = this.Job_list[i].location;
                        this.type = this.Job_list[i].type;
                    }

                }
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

</style>
