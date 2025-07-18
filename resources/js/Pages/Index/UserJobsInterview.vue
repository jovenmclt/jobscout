<template>
    <div class="container-xxl bg-color">
        <div class="row pe-xl-3">
            <UserNavigationVue />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">


                        <div class="text-start">
                            <span class="fw-normal text-secondary">Jobs > Interview</span>
                            <br>
                            <h4 class="fw-semibold mt-3">Interview: Kitchen Manager</h4>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <div class="d-flex justify-content-between gap-3 bg-white py-4 px-3 rounded shadow-sm border">
                                 <div class="text-start">
                                    <p class="fw-normal mb-0">Job Position</p>
                                    <h6 class="fw-semibold">Kitchen Manager</h6>
                                    <br>
                                    <p class="fw-normal mb-0">Salary</p>
                                    <h6 class="fw-semibold">₱18,000</h6>
                                </div>
                                <div class="text-start">
                                    <p class="fw-normal mb-0">Branch</p>
                                    <h6 class="fw-semibold">San Fernando, Pampanga</h6>
                                    <br>
                                    <p class="fw-normal mb-0">Type</p>
                                    <h6 class="fw-semibold">Full-time</h6>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-6 mt-3">
                            <div class="bg-white rounded shadow-sm border py-3 px-3">

                                <label for="cv" class="form-label" style="font-size: 14px;">Curriculum Vitae (CV)<span class="text-danger">*</span></label>
                                <input type="file" class="form-control shadow-none">

                                <label for="cv" class="form-label mt-2" style="font-size: 14px;">Resume<span class="text-danger">*</span></label>
                                <input type="file" class="form-control shadow-none">

                            </div>
                        </div>

                    </div>
                </section>
                <section id="interviewquestion">
                    <div class="row justify-content-center">


                        <div class="col-lg-12 mt-3">
                            <template v-for="(test, index) in testcount" :key="index">
                                <div class="bg-white rounded shadow-sm border py-3 px-3 mt-3">
                                    <p class="fw-normal border-bottom py-2">Can you tell us about your experience in the food or dessert industry?</p>
                                    <textarea class="form-control shadow-none" placeholder="Answer. . ."  style="height: 130px" ></textarea>
                                </div>
                            </template>
                            <div class="text-end mt-3">
                                <button class="btn btn-primary rounded">Submit Answers</button>
                                <button class="btn btn-outline-secondary rounded px-3 mx-3">Cancel</button>
                            </div>
                        </div>



                    </div>
                </section>
            </main>
        </div>
    </div>
</template>

<script>
import UserNavigationVue from '../Components/UserNavigation/UserNavigation.vue'

export default {
    name:'UserJobsInterview',
    components:{UserNavigationVue},
    data(){
        return{
            testcount: [
                {test: ''},{test: ''},{test: ''},
            ]
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
