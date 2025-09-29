<template>
    <section id="editprofile" class="contaniner-settings">
        <div class="row justify-content-center px-3 w-100" style="max-width: 1000px;">



            <div class="col-12" >
                <div class="bg-white py-3 px-3 rounded border shadow-sm" style="max-height: 600px; overflow-y: auto; scrollbar-width: none;">
                    <div class="text-end">
                        <i @click="btncloseedit" style="cursor: pointer;" class="bi bi-x-lg"></i>
                    </div>
                    <div class="text-start">
                        <h5 class="fw-semibold">Edit Profile</h5>

                        <div class="d-flex flex-md-nowrap flex-wrap gap-3 mt-3">
                            <div class="text-start w-100">
                                <label  class="form-label">Profile</label><br>

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
                                <p class="fw-normal text-danger mb-0 mt-1" v-if="errors.Profile" style="font-size: 14px;">{{errors.Profile}}</p>
                            </div>
                            <div class="text-start w-100">
                                <label for="Name" class="form-label">Name<span class="text-danger">*</span></label>
                                <input v-model="name" id="Name" type="text" class="form-control shadow-none">
                                <p class="fw-normal text-danger mb-0 mt-1" v-if="errors.Name" style="font-size: 14px;">{{errors.Name}}</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3 mt-3 flex-md-nowrap flex-wrap">
                            <div class="text-start w-100">
                                <label for="Location" class="form-label">Location<span class="text-danger">*</span></label>
                                <input v-model="location" id="Location" type="text" class="form-control shadow-none">
                                <p class="fw-normal text-danger mb-0 mt-1" v-if="errors.Location" style="font-size: 14px;">{{errors.Location}}</p>
                            </div>
                            <div class="text-start w-100">
                                <label for="age" class="form-label">Age<span class="text-danger">*</span></label>
                                <input v-model="age" id="age" type="text" class="form-control shadow-none">
                                <p class="fw-normal text-danger mb-0 mt-1" v-if="errors.Age" style="font-size: 14px;">{{errors.Age}}</p>
                            </div>
                            <div class="text-start w-100">
                                <label for="gender" class="form-label">Gender<span class="text-danger">*</span></label>
                                <select v-model="gender" class="form-select shadow-none">
                                    <option selected></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <p class="fw-normal text-danger mb-0 mt-1" v-if="errors.Gender" style="font-size: 14px;">{{errors.Gender}}</p>
                            </div>
                        </div>
                        <div class="text-start w-100 mt-3">
                            <label for="About" class="form-label">About<span class="text-danger">*</span></label>
                            <textarea v-model="about" id="About" class="form-control shadow-none"  style="height: 100px" ></textarea>
                            <p class="fw-normal text-danger mb-0 mt-1" v-if="errors.About" style="font-size: 14px;">{{errors.About}}</p>
                        </div>
                        <div class="d-flex gap-3 mt-3 flex-md-nowrap flex-wrap">
                            <div class="text-start w-100">
                                <label for="educ" class="form-label">Educational Attainment<span class="text-danger">*</span></label>
                                <input v-model="education" id="educ" type="text" class="form-control shadow-none">
                                <p class="fw-normal text-danger mb-0 mt-1" v-if="errors.Education" style="font-size: 14px;">{{errors.Education}}</p>
                            </div>
                            <div class="text-start w-100">
                                <label  class="form-label" style="font-size: 14px;">Curriculum Vitae (CV)</label>

                                <label v-if="cv_path" class="px-3 border rounded w-100" style="padding: 6px 0; ">
                                    <div  class="d-flex justify-content-between">
                                        <p class="fw-normal mb-0">{{ truncateFilename(cv_path.name) }}</p>
                                        <i @click="removecvupload" class="bi bi-x-circle-fill text-danger" style="cursor: pointer;"></i>
                                    </div>
                                </label>
                                <label v-else for="cv" class="px-3 border rounded w-100" style="padding: 6px 0; cursor: pointer;">
                                    <div class="text-start ">
                                        <i class="bi bi-cloud-upload-fill"> Choose PDF File</i>
                                    </div>
                                </label>

                                <input @change="uploadcv" id="cv" type="file" class="form-control shadow-none" accept="application/pdf" hidden>
                                <p class="fw-normal text-danger mb-0 mt-1" v-if="errors.Cv" style="font-size: 14px;">{{errors.Cv}}</p>
                            </div>
                            <div class="text-start w-100">
                                <label  class="form-label" style="font-size: 14px;">Resume</label>

                                <label v-if="resume_path" class="px-3 border rounded w-100" style="padding: 6px 0; ">
                                    <div  class="d-flex justify-content-between">
                                        <p class="fw-normal mb-0">{{ truncateFilename(resume_path.name) }}</p>
                                        <i @click="removeresumeupload" class="bi bi-x-circle-fill text-danger" style="cursor: pointer;"></i>
                                    </div>
                                </label>
                                <label v-else for="resume" class="px-3 border rounded w-100" style="padding: 6px 0; cursor: pointer;">
                                    <div class="text-start ">
                                        <i class="bi bi-cloud-upload-fill"> Choose PDF File</i>
                                    </div>
                                </label>

                                <input @change="uploadresume" id="resume" type="file" class="form-control shadow-none" accept="application/pdf" hidden>
                                <p class="fw-normal text-danger mb-0 mt-1" v-if="errors.Resume" style="font-size: 14px;">{{errors.Resume}}</p>
                            </div>
                        </div>
                        <div class="text-start w-100 mt-3">
                            <label for="Experience" class="form-label">Experience<span class="text-danger">*</span></label>
                            <textarea v-model="experience" id="Experience" class="form-control shadow-none"  style="height: 100px" ></textarea>
                            <p class="fw-normal text-danger mb-0 mt-1" v-if="errors.Experience" style="font-size: 14px;">{{errors.Experience}}</p>
                        </div>
                        <div class="text-end mt-3 mb-3">
                            <button @click="btnsavechanges" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>
</template>

<script>
import { router } from '@inertiajs/vue3'
export default {
    name: 'EditProfile',
    props:{userinfo:Object, errors:Object},
    data(){
        return{
            name: this.userinfo ? this.userinfo.name : '---',
            profile: '',
            location: this.userinfo ? this.userinfo.location : '',
            age: this.userinfo ? this.userinfo.age : '',
            gender: this.userinfo ? this.userinfo.gender : '',
            about: this.userinfo ? this.userinfo.about : '',
            education: this.userinfo ? this.userinfo.education : '',
            cv_path: '',
            resume_path: '',
            experience: this.userinfo ? this.userinfo.experience : '',
        }
    },
    methods:{
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
        uploadcv(event){
            this.cv_path = event.target.files[0];
        },
        removeresumeupload(){
            this.resume_path = null;
            const input = document.getElementById("resume");
            if (input) {
                input.value = "";
            }

        },
        uploadresume(event){
            this.resume_path = event.target.files[0];
        },
        removecvupload(){
            this.cv_path = null;
            const input = document.getElementById("cv");
            if (input) {
                input.value = "";
            }

        },
        btnsavechanges(){
            const data = {
                Name: this.name,
                Profile: this.profile,
                Location: this.location,
                Age: this.age,
                Gender: this.gender,
                About: this.about,
                Education: this.education,
                Cv: this.cv_path,
                Resume: this.resume_path,
                Experience: this.experience
            }

            router.post('/updateprofile', data, {
                onSuccess: () => {
                    this.btncloseedit();
                }
            });

        },
        btncloseedit(){

            router.visit('/user/profile');

        }
    }
}
</script>

<style>
.contaniner-settings{
    height: 100Vh;
    min-width: 100%;
    z-index: 1;
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(123, 123, 124, 0.5);
}
</style>
