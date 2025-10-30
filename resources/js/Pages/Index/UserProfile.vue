<template>
    <div class="container-xxl ">
        <div class="row pe-xl-3 ">
            <UserNavigationVue :check_unread="check_unread"/>
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">



                        <div class="col-lg-3 mt-3">
                            <div class="text-center mt-3 position-relative">
                                <img v-if="!userinfo.profile_picture" src="../Components/Assets/profile.png" width="100" alt="">
                                <img v-else :src="`/storage/${userinfo.profile_picture}`" class="w-100 " style="max-width: 120px; max-height: 120px;"  alt="">
                                <h5 class="fw-semibold mt-2">{{ userinfo?.name ?? '---'  }}</h5>
                            </div>
                        </div>
                        <div class="col-lg-5 mt-3">
                            <div class="d-flex justify-content-between bg-white rounded shadow-sm border py-3 px-3 ">
                                <div class="text-start">
                                    <p class="fw-normal mb-0">Location</p>
                                    <h6 class="fw-semibold">{{ userinfo?.location ?? '---' }}</h6>
                                    <br>
                                    <p class="fw-normal mb-0">Educational Attainment</p>
                                    <h6 class="fw-semibold">{{ userinfo?.education ?? '---' }}</h6>
                                </div>
                                <div class="text-start">
                                    <p class="fw-normal mb-0">Age</p>
                                    <h6 class="fw-semibold">{{ userinfo?.age ?? '---' }}</h6>
                                    <br>
                                    <p class="fw-normal mb-0">Gender</p>
                                    <h6 class="fw-semibold">{{ userinfo?.gender ?? '---' }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-3">
                            <div class="d-flex justify-content-between bg-white rounded shadow-sm border py-3 px-3 ">
                                <div class="text-start">
                                    <p class="fw-normal mb-0">Date Hired</p>
                                    <h6 class="fw-semibold">{{ memberinfo?.hired_date ?? '---'}}</h6>
                                    <br>
                                    <p class="fw-normal mb-0">Position</p>
                                    <h6 class="fw-semibold">{{ memberinfo?.position ?? '---' }}</h6>
                                </div>
                                <div class="text-start">
                                    <p class="fw-normal mb-0">Salary</p>
                                    <h6 class="fw-semibold">{{ memberinfo?.salary ?? '---' }} </h6>
                                    <br>
                                    <p class="fw-normal mb-0">Type</p>
                                    <h6 class="fw-semibold">{{ memberinfo?.employment_type ?? '---' }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <section id="section2">
                    <div class="row justify-content-center">


                        <div class="col-lg-12">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <div class="text-start border-bottom">
                                    <h6 class="fw-semibold">About</h6>
                                </div>
                                <div class="text-start mt-3" style="max-height: 120px; overflow-y: auto;">
                                    <p class="fw-normal text-secondary">{{ userinfo?.about ?? '---' }}</p>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex justify-content-between gap-3 flex-md-nowrap flex-wrap">
                                <div class="bg-white py-3 px-3 rounded shadow-sm border w-100">
                                    <div class="text-start border-bottom">
                                        <h6 class="fw-semibold">Experience</h6>
                                    </div>
                                    <div class="text-start mt-3" style="max-height: 120px; overflow-y: auto;">
                                        <p class="fw-normal text-secondary">{{ userinfo?.experience ?? '---' }}</p>
                                    </div>
                                </div>
                                <div class="bg-white py-3 px-3 rounded shadow-sm border w-100">
                                    <label for="cv" class="form-label" style="font-size: 14px;">Curriculum Vitae (CV)<span class="text-danger">*</span></label>
                                    <p @click="btnshowcv" class="fw-normal text-primary" style="cursor: pointer;">{{ userinfo?.name }} - Curriculum Vitae</p>
                                    <usercurriculumvitaeVue v-if="showcv" :userinfo="userinfo" @closepreview="btnshowcv"/>


                                    <label for="cv" class="form-label mt-2" style="font-size: 14px;">Resume<span class="text-danger">*</span></label>
                                    <p @click="btnshowresume" class="fw-normal text-primary" style="cursor: pointer;">{{ userinfo?.name }} - Resume</p>
                                    <userresumeVue v-if="showresume" :userinfo="userinfo" @closepreviewresume="btnshowresume"/>
                                </div>
                            </div>
                            <div class="text-end mt-3">
                                <button @click="btnshowedit" class="btn btn-primary px-3 mx-3">Edit Profile</button>
                            </div>
                        </div>



                    </div>
                </section>
            </main>
            <EditProfile v-if="showeditprofile" :userinfo="userinfo" :errors="errors" />
        </div>
    </div>
</template>

<script>
import EditProfile from '../Components/UserProfileEdit/EditProfile.vue';
import UserNavigationVue from '../Components/UserNavigation/UserNavigation.vue'
import usercurriculumvitaeVue from '../Components/popup_pages/usercurriculumvitae.vue';
import userresumeVue from '../Components/popup_pages/userresume.vue';
export default {
    name: 'UserProfile',
    components: {UserNavigationVue, EditProfile, usercurriculumvitaeVue, userresumeVue},
    props: {userinfo:Object, errors:Object, memberinfo:Object, check_unread:Boolean},
    data(){
        return{
            showeditprofile: false,
            showcv: false,
            showresume: false,
        }
    },
    methods:{
        btnshowedit(){
            this.showeditprofile = !this.showeditprofile
        },
        btnshowcv(){
            this.showcv = !this.showcv
        },
        btnshowresume(){
            this.showresume = !this.showresume
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
