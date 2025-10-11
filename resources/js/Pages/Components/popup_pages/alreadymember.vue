<template>
    <section id="popup_jobcreated" class="popup-css px-3 py-3">
        <div class="row justify-content-center w-100" style="max-width: 1000px;">


            <div class="col-md-7">
                <div class="bg-white rounded shadow fade-in">

                    <div class="d-flex justify-content-between gap-4 bg-danger py-3 px-3 ">
                        <h6 class="fw-semibold mb-0 text-white">Failed</h6>
                        <i @click="btnvisitjobs" class="bi bi-x-lg text-white" style="cursor: pointer;"></i>
                    </div>
                    <div class="text-start py-3 px-3">
                        <p class="fw-normal mb-0" style="font-size: 15px;"> <i class="bi bi-exclamation-circle-fill text-danger"></i> You are already member. New application not allowed.</p>
                    </div>
                    <div class="text-end pt-3 pb-3 ">
                        <button @click="btnvisitjobs" class="btn btn-secondary px-3 mx-3" style="font-size: 13px;">Close</button>
                    </div>

                </div>
            </div>


        </div>
    </section>
</template>

<script>
import {router} from '@inertiajs/vue3'
export default {
    name: 'applyfailed',
    data(){
        return{

        }
    },
    methods:{
        btnvisitjobs(){
            this.$emit('closepopup')
        }
    },

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

.fade-in{
    animation: fadeinanimation 0.5s ease-in-out;
}

@keyframes fadeinanimation {
    0%{
        opacity: 0%;
    }
    50%{
        opacity: 50%;
    }
    100%{
        opacity: 100%;
    }
}
</style>
