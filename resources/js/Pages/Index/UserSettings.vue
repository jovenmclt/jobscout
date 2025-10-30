<template>
    <div class="container-xxl bg-color min-vh-100">
        <div class="row pe-xl-3">
            <UserNavigationVue :check_unread="check_unread" />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">


                        <div class="text-start mt-3">
                            <h4 class="fw-semibold">Account Settings</h4>

                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="bg-white py-3 px-3 shadow-sm rounded border">
                                <div class="text-start mt-2 mb-4">
                                    <h5 class="fw-normal " style="font-size: 15px;"><i class="bi bi-megaphone-fill text-primary"></i> <i> Update your email or password only when necessary to keep your account secure.</i></h5>
                                </div>
                                <div class="text-start">
                                    <label for="email" class="form-label">Email Address:</label>
                                    <input v-model="email" type="email" class="form-control shadow-none" disabled>
                                </div>
                                <br>
                                <div class="text-start w-100">
                                    <label for="oldpassword" class="form-label">Old Password:</label>
                                    <input v-model="oldpassword" type="password" class="form-control shadow-none">
                                    <p class="fw-normal text-danger mb-0 mt-2" style="font-size: 14px;" v-if="flash.failed_admin_oldpassword">{{ flash.failed_admin_oldpassword }}</p>
                                    <p class="fw-normal text-danger mb-0 mt-2" style="font-size: 14px;" v-if="errors.oldpassword">{{ errors.oldpassword }}</p>
                                </div>
                                <br>
                                <div class="d-flex gap-2 flex-md-nowrap flex-wrap">
                                    <div class="text-start w-100">
                                        <label for="password" class="form-label">New Password:</label>
                                        <input v-model="newpassword" type="password" class="form-control shadow-none">
                                        <p class="fw-normal text-danger mb-0 mt-2" style="font-size: 14px;" v-if="errors.newpassword">{{ errors.newpassword }}</p>
                                    </div>
                                    <div class="text-start w-100">
                                        <label for="confirmpass" class="form-label">Confirm Password:</label>
                                        <input v-model="confirmpassword" type="password" class="form-control shadow-none">
                                        <p class="fw-normal text-danger mb-0 mt-2" style="font-size: 14px;" v-if="mismatchpassword">{{ mismatchpassword }}</p>
                                    </div>
                                </div>

                                <br>
                                <div class="text-end">
                                    <button @click="btnsavechanges" class="btn btn-primary px-3" style="font-size: 14px;">Save Changes</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <updateaccountVue v-if="showpopup" />
            </main>
        </div>
    </div>
</template>

<script>
import {Link as inertiaLink} from '@inertiajs/vue3'
import {router} from '@inertiajs/vue3'
import UserNavigationVue from '../Components/UserNavigation/UserNavigation.vue'
import updateaccountVue from '../Components/popup_pages/updateaccount.vue';
export default {
    name: 'AdminConversation',
    components: {inertiaLink, UserNavigationVue, updateaccountVue},
    props: {check_unread:Boolean, errors:Object, userinfo:Object, flash:Object,},
    data(){
        return{
            email: this.userinfo ? this.userinfo.email  : '',
            oldpassword: '',
            newpassword: '',
            confirmpassword: '',

            mismatchpassword: '',
            showpopup: false
        }
    },
    methods:{
        btnsavechanges(){
            const data = {

                oldpassword: this.oldpassword,
                newpassword: this.newpassword

            }

            if(this.newpassword != this.confirmpassword){

                this.mismatchpassword = 'The new password and confirmation password do not match.';

            }else{

                router.post('/updateuseraccount' , data, {
                    preserveScroll: true,
                    onSuccess: (page) => {
                        const flash = page.props.flash;
                        if (!flash.failed_admin_oldemail && !flash.failed_admin_oldpassword) {
                            this.showpopup = true;
                        }
                    }
                });

                this.mismatchpassword = '';
            }
        },
        btnLogoutAccount(){
            router.post('/logoutaccount');
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
