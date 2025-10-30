<template>
    <div class="container-fluid">
        <div class="row p-0 justify-content-center">
            <main class="col-12">
                <section class="section1">
                    <div class="row justify-content-center vh-100">
                        <div class="col-lg-6 col-12 d-flex align-items-center justify-content-center">
                            <div class="text-start w-75">
                                <h3 class="fw-bold">Forgot Password</h3>
                                <p class="fw-normal">Lorem ipsum dolor sit amet consectetur </p>
                                <form @submit.prevent="btnsendlink" action="">

                                    <label for="Email" class="form-label ms-1">Email:</label>
                                    <input v-model="email" id="Email" type="text" class="form-control shadow-none rounded-5 w-100 ">

                                    <p class="fw-normal text-success mb-0 mt-1 ms-1" v-if="flash.email_found" style="font-size: 14px;">{{ flash.email_found }}</p>
                                    <p class="fw-normal text-danger mb-0 mt-1 ms-1" v-if="flash.email_not_found" style="font-size: 14px;">{{ flash.email_not_found }}</p>
                                    <p class="fw-normal text-danger mb-0 mt-1 ms-1" v-if="errors.email" style="font-size: 14px;">{{ errors.email }}</p>

                                    <button id="btnsendlink" class="btn btn-primary w-100 mt-3">
                                        <lord-icon
                                            v-if="showloading"
                                            src="https://cdn.lordicon.com/wpequvda.json"
                                            trigger="loop"
                                            state="loop-transparency"
                                            colors="primary:#ffffff"
                                            style="width:17px;height:17px; padding-top: 2px;">
                                        </lord-icon>
                                        Send Password Reset Link
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6  d-lg-flex d-none justify-content-center align-items-center" style="background-color: #FAFAFA;">
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
    name: 'LoginAccount',
    components: {inertiaLink},
    props: {flash:Object, errors:Object},
    data(){
        return{
            email: '',

            showloading: false
        }
    },
    methods: {
        btnsendlink(){

            const data = {
                email: this.email,
            }

            this.showloading = true;
            document.getElementById('btnsendlink').disabled = true;

            let count = 0;

            const intervalId = setInterval(() => {
                count++;

                if (count === 5) {

                    router.post('/forgot-password', data, {
                        onError: () => {
                            this.showloading = false
                            document.getElementById('btnsendlink').disabled = false;
                            clearInterval(intervalId);
                        },
                        onSuccess: () => {
                            this.showloading = false
                            document.getElementById('btnsendlink').disabled = false;
                            clearInterval(intervalId);
                        }

                    });
                }

            }, 1000);

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
