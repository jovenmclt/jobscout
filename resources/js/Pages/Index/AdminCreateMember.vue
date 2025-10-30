<template>
    <div class="container-xxl bg-color">
        <div class="row pe-xl-3">
            <AdminNavigationVue :check_unread="check_unread" />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">


                        <div class="text-start mt-3">
                            <span class="fw-normal text-secondary">Members > Create</span>
                            <br>
                            <h4 class="fw-semibold mt-2">Create Member</h4>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <div class="bg-white py-3 px-3 shadow-sm rounded border">
                                <div class="text-start">

                                    <h6 class="fw-semibold">Personal</h6>
                                    <div class="d-flex flex-lg-nowrap flex-wrap gap-3 mt-3">
                                        <div class="text-start w-100">
                                            <label class="form-label">Profile</label>
                                            <label v-if="profile" class="px-3 border rounded w-100" style="padding: 6px 0; ">
                                                <div  class="d-flex justify-content-between">
                                                    <p class="fw-normal mb-0">{{ truncateFilename(profile.name) }}</p>
                                                    <i @click="removeprofileupload" class="bi bi-x-circle-fill text-danger" style="cursor: pointer;"></i>
                                                </div>
                                            </label>
                                            <label v-else for="profile" class="px-3 border rounded w-100" style="padding: 6px 0; cursor: pointer;">
                                                <div class="text-start ">
                                                    <i class="bi bi-cloud-upload-fill"> Choose File</i>
                                                </div>
                                            </label>
                                            <input @change="uploadprofile" id="profile" type="file" class="form-control shadow-none" accept="image/*"  hidden>
                                        </div>
                                        <div class="text-start w-100">
                                            <label for="age" class="form-label">Age<span class="text-danger">*</span></label>
                                            <input v-model="age" id="age" type="text" maxlength="2" @input="age = age.replace(/\D/g, '')" class="form-control shadow-none">
                                            <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.age">{{ errors.age }}</p>
                                        </div>
                                        <div class="text-start w-100">
                                            <label for="gender" class="form-label">Gender<span class="text-danger">*</span></label>
                                             <select v-model="gender" id="gender" class="form-select shadow-none">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.gender">{{ errors.gender }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 flex-lg-nowrap flex-wrap mt-3">
                                        <div class="text-start w-100">
                                            <label for="location" class="form-label">Location<span class="text-danger">*</span></label>
                                            <input v-model="location" id="location" type="text" class="form-control shadow-none">
                                            <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.location">{{ errors.location }}</p>
                                        </div>
                                        <div class="text-start w-100">
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
                                    <div class="d-flex gap-3 flex-lg-nowrap flex-wrap">
                                        <div class="text-start mt-3 w-100">
                                            <label  class="form-label">Resume<span class="text-danger">*</span></label>

                                            <label v-if="resume" class="px-3 border rounded w-100" style="padding: 6px 0; ">
                                                <div  class="d-flex justify-content-between">
                                                    <p class="fw-normal mb-0">{{ truncateFilename(resume.name) }}</p>
                                                    <i @click="removeresumeupload" class="bi bi-x-circle-fill text-danger" style="cursor: pointer;"></i>
                                                </div>
                                            </label>
                                            <label v-else for="resume" class="px-3 border rounded w-100" style="padding: 6px 0; cursor: pointer;">
                                                <div class="text-start ">
                                                    <i class="bi bi-cloud-upload-fill"> Choose PDF File</i>
                                                </div>
                                            </label>

                                            <input @change="uploadresume" id="resume" type="file" class="form-control shadow-none" accept="application/pdf" hidden>
                                            <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.resume">{{ errors.resume }}</p>
                                        </div>
                                        <div class="text-start mt-3 w-100">
                                            <label  class="form-label">Curriculum Vitae<span class="text-danger">*</span></label>

                                            <label v-if="cv" class="px-3 border rounded w-100" style="padding: 6px 0; ">
                                                <div  class="d-flex justify-content-between">
                                                    <p class="fw-normal mb-0">{{ truncateFilename(cv.name) }}</p>
                                                    <i @click="removecvupload" class="bi bi-x-circle-fill text-danger" style="cursor: pointer;"></i>
                                                </div>
                                            </label>
                                            <label v-else for="cv" class="px-3 border rounded w-100" style="padding: 6px 0; cursor: pointer;">
                                                <div class="text-start ">
                                                    <i class="bi bi-cloud-upload-fill"> Choose PDF File</i>
                                                </div>
                                            </label>

                                            <input @change="uploadcv" id="cv" type="file" class="form-control shadow-none" accept="application/pdf" hidden>
                                            <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.cv">{{ errors.cv }}</p>
                                        </div>
                                    </div>

                                    <br><br>
                                    <h6 class="fw-semibold">Job Position</h6>
                                    <div class="d-flex gap-3 flex-lg-nowrap flex-wrap mt-3">
                                        <div class="text-start w-100">
                                            <label for="job" class="form-label">Job<span class="text-danger">*</span></label>
                                            <select v-model="jobid" id="job" class="form-select shadow-none">
                                                <template v-for="(getjob, index) in Job_list" :key="index">
                                                    <option :value="getjob.id">{{ getjob?.job_title ?? '---' }}</option>
                                                </template>
                                            </select>
                                            <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.job">{{ errors.job }}</p>
                                        </div>
                                        <div class="text-start w-100">
                                            <label for="branch" class="form-label">Location<span class="text-danger">*</span></label>
                                            <input v-model="joblocation" id="branch" type="text" class="form-control shadow-none" disabled>
                                            <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.joblocation">{{ errors.joblocation }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 flex-lg-nowrap flex-wrap mt-3">
                                        <div class="text-start w-100">
                                            <label for="salary" class="form-label">Salary<span class="text-danger">*</span></label>
                                            <input v-model="salary" id="salary" type="text" class="form-control shadow-none" disabled>
                                            <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.salary">{{ errors.salary }}</p>
                                        </div>
                                        <div class="text-start w-100">
                                            <label for="type" class="form-label">Type<span class="text-danger">*</span></label>
                                            <input v-model="type" id="type" type="text" class="form-control shadow-none" disabled>
                                            <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.type">{{ errors.type }}</p>
                                        </div>
                                    </div>

                                    <br><br>
                                    <h6 class="fw-semibold">Account</h6>
                                    <div class="d-flex gap-3 flex-lg-nowrap flex-wrap mt-3">
                                        <div class="text-start w-100">
                                            <label for="name" class="form-label">Full Name<span class="text-danger">*</span></label>
                                            <input v-model="name" id="name" type="text" class="form-control shadow-none">
                                            <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.name">{{ errors.name }}</p>
                                        </div>
                                        <div class="text-start w-100">
                                            <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                                            <input v-model="email" id="email" type="email" class="form-control shadow-none">
                                            <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.email">{{ errors.email }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 flex-lg-nowrap flex-wrap mt-3">
                                        <div class="text-start w-100">
                                            <label for="pass" class="form-label">Password<span class="text-danger">*</span></label>
                                            <input v-model="password" id="pass" type="password" class="form-control shadow-none">
                                            <p class="fw-normal text-danger mt-2 mb-0" v-if="errors.password">{{ errors.password }}</p>
                                        </div>
                                        <div class="text-start w-100">
                                            <label for="confirmpass" class="form-label">Confirm Password<span class="text-danger">*</span></label>
                                            <input v-model="confirmpass" id="confirmpass" type="password" class="form-control shadow-none">
                                        </div>
                                    </div>
                                    <p v-if="errormess" class="text-danger fw-normal mt-2">{{ errormess }}</p>
                                </div>
                            </div>
                            <div class="text-end my-4">
                                <button @click="btncreate" class="btn btn-primary">Create</button>
                                 <button @click="btncancel" class="btn btn-outline-secondary mx-2">Cancel</button>
                            </div>
                        </div>

                    </div>
                </section>
                <membercreatedVue v-if="showpopup"/>
            </main>
        </div>
    </div>
</template>

<script>
import AdminNavigationVue from '../Components/AdminNavigation/AdminNavigation.vue'
import {router} from '@inertiajs/vue3'
import membercreatedVue from '../Components/popup_pages/membercreated.vue'

export default {
    name: 'AdminCreateMember',
    components: {AdminNavigationVue, membercreatedVue},
    props: {Job_list:Array, errors:Object, check_unread:Boolean},
    data(){
        return{
            profile: '',
            age: '',
            gender: '',
            location: '',
            education: '',
            about: '',
            experience: '',
            resume: '',
            cv: '',

            jobid: '',
            joblocation: '',
            salary: '',
            type: '',

            name: '',
            email: '',
            password: '',
            confirmpass: '',

            errormess: '',
            showpopup: false
        }
    },
    methods: {
        truncateFilename(name) {
            if (!name) return '';
            if (name.length <= 23) return name;
            return name.substring(0, 23) + '...';
        },
        uploadprofile(event){
            this.profile = event.target.files[0];
        },
        removeprofileupload(){
            this.profile = null;
            const input = document.getElementById("profile");
            if (input) {
                input.value = "";
            }
        },
        uploadresume(event){
            this.resume = event.target.files[0];
        },
        removeresumeupload(){
            this.resume = null;
            const input = document.getElementById("resume");
            if (input) {
                input.value = "";
            }

        },
        uploadcv(event){
            this.cv = event.target.files[0];
        },
        removecvupload(){
            this.cv = null;
            const input = document.getElementById("cv");
            if (input) {
                input.value = "";
            }

        },
        btncreate(){
            const data = {
                profile: this.profile,
                age: this.age,
                gender: this.gender,
                location: this.location,
                education: this.education,
                about: this.about,
                experience: this.experience,
                resume: this.resume,
                cv: this.cv,
                job: this.jobid,
                joblocation: this.joblocation,
                salary: this.salary,
                type: this.type,
                name: this.name,
                email: this.email,
                password: this.password
            }

            if(this.confirmpass == this.password){
                router.post('/createnewmember', data, {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.showpopup = !this.showpopup
                    },
                    onError: (error) => {
                        console.log(error);
                    }
                })
            }else{
                this.errormess = 'Password and Confirm Password mismatch.'
            }
        },
        btncancel(){
            router.visit('/admin/members');
        }
    },
    watch:{
        jobid(id){
            this.$nextTick(() => {

                for(let i = 0; i < this.Job_list.length; i++){

                    if(id == this.Job_list[i].id){
                        this.joblocation = this.Job_list[i].location;
                        this.salary = this.Job_list[i].salary;
                        this.type = this.Job_list[i].type
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
