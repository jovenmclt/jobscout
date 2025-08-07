<template>
    <section id="editprofile" class="contaniner-settings">
        <div class="row jusitfy-content-center px-3">



            <div class="col-auto" >
                <div class="bg-white py-3 px-3 rounded border shadow-sm" style="max-height: 600px; overflow-y: auto; scrollbar-width: none;">
                    <div class="text-end">
                        <i @click="btncloseedit" style="cursor: pointer;" class="bi bi-x-lg"></i>
                    </div>
                    <div class="text-start">
                        <h5 class="fw-semibold">Edit Profile</h5>
                        <br>
                        <div class="d-flex flex-md-nowrap flex-wrap gap-3">
                            <div class="text-start w-100">
                                <label for="profile" class="form-label">Profile<span class="text-danger">*</span></label>
                                <input @change="uploadprofile" id="profile" type="file" class="form-control shadow-none">
                            </div>
                            <div class="text-start w-100">
                                <label for="Name" class="form-label">Name<span class="text-danger">*</span></label>
                                <input v-model="name" id="Name" type="text" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="d-flex gap-3 mt-3 flex-md-nowrap flex-wrap">
                            <div class="text-start w-100">
                                <label for="Location" class="form-label">Location<span class="text-danger">*</span></label>
                                <input v-model="location" id="Location" type="text" class="form-control shadow-none">
                            </div>
                            <div class="text-start w-100">
                                <label for="age" class="form-label">Age<span class="text-danger">*</span></label>
                                <input v-model="age" id="age" type="text" class="form-control shadow-none">
                            </div>
                            <div class="text-start w-100">
                                <label for="gender" class="form-label">Gender<span class="text-danger">*</span></label>
                                <select v-model="gender" class="form-select shadow-none">
                                    <option selected></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-start w-100 mt-3">
                            <label for="About" class="form-label">About<span class="text-danger">*</span></label>
                            <textarea v-model="about" id="About" class="form-control shadow-none"  style="height: 100px" ></textarea>
                        </div>
                        <div class="d-flex gap-3 mt-3 flex-md-nowrap flex-wrap">
                            <div class="text-start w-100">
                                <label for="educ" class="form-label">Educational Attainment<span class="text-danger">*</span></label>
                                <input v-model="education" id="educ" type="text" class="form-control shadow-none">
                            </div>
                            <div class="text-start w-100">
                                <label for="cv" class="form-label" style="font-size: 14px;">Curriculum Vitae (CV)<span class="text-danger">*</span></label>
                                <input @change="uploadcv" type="file" class="form-control shadow-none">
                            </div>
                            <div class="text-start w-100">
                                <label for="cv" class="form-label" style="font-size: 14px;">Resume<span class="text-danger">*</span></label>
                                <input @change="uploadresume" type="file" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="text-start w-100 mt-3">
                            <label for="Experience" class="form-label">Experience<span class="text-danger">*</span></label>
                            <textarea v-model="experience" id="Experience" class="form-control shadow-none"  style="height: 100px" ></textarea>
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
    props:{userinfo:Object},
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
        uploadprofile(event){
            this.profile = event.target.files[0];
        },
        uploadcv(event){
            this.cv_path = event.target.files[0];
        },
        uploadresume(event){
            this.resume_path = event.target.files[0];
        },
        btnsavechanges(){
            const data = {
                name: this.name,
                profile: this.profile,
                location: this.location,
                age: this.age,
                gender: this.gender,
                about: this.about,
                education: this.education,
                cv_path: this.cv_path,
                resume_path: this.resume_path,
                experience: this.experience
            }

            router.post('/updateprofile', data, {
                onSuccess: () => {
                    this.btncloseedit();
                }
            });

        },
        btncloseedit(){
            this.$emit('closeedit');
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
