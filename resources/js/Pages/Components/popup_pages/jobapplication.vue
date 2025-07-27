<template>
    <section id="popup_jobcreated" class="popup-css px-3 py-3">
        <div class="row justify-content-center">


            <div class="col-auto">
                <div class="bg-white py-4 px-4 rounded shadow ">
                    <div class="text-center">
                        <img src="../Assets/paper airplane.png" width="150" alt="">
                        <p class="fw-normal mt-3">Your application has been submitted successfully. Please wait <br> while we review your documents and responses</p>
                        <button @click="btndoneapplication" class="btn btn-primary px-4">Continue</button>
                    </div>

                </div>
            </div>


        </div>
    </section>
</template>

<script>
import {router} from '@inertiajs/vue3'
export default {
    name: 'jobcreated',
    methods:{
        btndoneapplication(){
            router.visit('/user/applicationstats');
        }
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

.popup-css{
    height: 100vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 2;
    font-family: "Poppins", sans-serif;
    overflow-wrap: break-word;
    background-color: rgba(82, 83, 85, 0.5);
}
</style>
