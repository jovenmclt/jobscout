<template>
    <div class="container-fluid">
        <div class="row p-0 justify-content-center">
            <main class="col-12">
                <section class="section1">
                    <div class="row justify-content-center vh-100">
                        <div class="col-lg-6 col-12 d-flex align-items-center justify-content-center">
                            <div class="text-start w-75">
                                <h3 class="fw-bold">Reset Password</h3>
                                <p class="fw-normal">Lorem ipsum dolor sit amet consectetur </p>
                                <form @submit.prevent="btnupdateAccount" action="">

                                    <label for="Email" class="form-label mt-3">Email:</label>
                                    <input v-model="user_email" id="Email" type="email" class="form-control shadow-none rounded-5 w-100 " disabled>

                                    <label for="Password" class="form-label mt-3">Password:</label>
                                    <input v-model="password" id="Password" type="password" class="form-control shadow-none rounded-5 w-100">
                                    <p class="fw-normal text-danger mb-0 ms-2 mt-2" v-if="errors.password">{{ errors.password }}</p>

                                    <label for="ConfirmPassword" class="form-label mt-3">Confirm Password:</label>
                                    <input v-model="confirmpassword" id="ConfirmPassword" type="password" class="form-control shadow-none rounded-5 w-100">
                                    <p class="fw-normal text-danger mb-0 mt-2 ms-2" style="font-size: 14px;">{{ errorconfirmpassword }}</p>
                                    <br>
                                    <button type="submit" class="btn btn-primary w-100">Reset Password</button>

                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-lg-flex justify-content-center align-items-center d-none" style="background-color: #FAFAFA;">
                            <div class="text-center">
                                <img src="../Components/Assets/Logo.png" width="500" alt="">
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</template>

<script>
import {Link as inertiaLink} from '@inertiajs/vue3'
import {router} from '@inertiajs/vue3'
export default {
    name: 'ResetPasswordForm',
    components: {inertiaLink},
    props: {errors:Object, email:String, token:String},
    data(){
        return{
            user_email: this.email ,

            password: '',
            confirmpassword: '',

            errorconfirmpassword: ''
        }
    },
    methods: {
        btnupdateAccount(){
            const data = {
                token: this.token,
                email: this.user_email,
                password: this.password,
                password_confirmation: this.confirmpassword
            }

            if(this.password == this.confirmpassword){
                router.post('/reset-password', data);
            }else{
                this.errorconfirmpassword = 'Mismatch detected between password and confirmation.'
            }
        }
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

section{
    font-family: "Poppins", sans-serif;
    overflow-wrap: break-word;
}

</style>
