<template>
    <section id="popup" class="section-css">
        <div class="row justify-content-center w-100" style="max-width: 1000px;">

            <div class="col-md-7">

                <div v-if="passresult == `Hired`" class="bg-white rounded shadow fade-in">

                    <div class="text-end bg-primary py-3 px-3 ">
                        <i @click="btnclose" class="bi bi-x-lg text-white" style="cursor: pointer;"></i>
                    </div>
                    <div class="text-start py-3 px-3">
                        <p class="fw-normal mb-0" style="font-size: 15px;"> <i class="bi bi-check-circle-fill text-success"></i> The applicant’s application has been successfully approved and the candidate is now hired.</p>
                    </div>
                    <div class="text-end pt-3 pb-2 ">
                        <button @click="btnclose" class="btn btn-secondary px-3 mx-3" style="font-size: 13px;">Close</button>
                    </div>
                </div>

                <div v-else class="bg-white rounded shadow fade-in">

                    <div class="text-end bg-danger py-3 px-3 ">
                        <i @click="btnclose" class="bi bi-x-lg text-white" style="cursor: pointer;"></i>
                    </div>
                    <div class="text-start py-3 px-3">
                        <p class="fw-normal mb-0" style="font-size: 15px;"> <i class="bi bi-x-circle-fill text-danger"></i> The applicant’s application has been reviewed and the candidate has not been selected for the position.</p>
                    </div>
                    <div class="text-end pt-3 pb-2 ">
                        <button @click="btnclose" class="btn btn-secondary px-3 mx-3" style="font-size: 13px;">Close</button>
                    </div>
                </div>
                
            </div>

        </div>
    </section>
</template>

<script>
import {router} from '@inertiajs/vue3'
export default {
    name: 'applicationresult',
    props: {passresult:String},
    methods: {
        btnclose(){
            router.visit('/admin/application');
        },
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');


.section-css{
    font-family: "Poppins", sans-serif;
    height: 100vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    background-color: rgba(108, 108, 107, 0.5);
    z-index: 2;
    overflow-wrap: break-word;
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
