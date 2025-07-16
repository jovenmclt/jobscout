<template>
    <div class="container-xxl bg-color">
        <div class="row pe-xl-3">
            <AdminNavigation />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">



                        <div class="text-start mt-3">
                            <span class="fw-normal text-secondary">Application > View</span>
                            <br>
                            <div class="d-flex justify-content-between gap-3">
                                <h4 class="fw-semibold mt-2">View 1011</h4>
                                <a href="">
                                    <button class="btn btn-danger px-3 rounded">Delete</button>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-3">
                            <div class="text-center">
                                <img src="../Components/Assets/profile.png" width="100" alt="">
                                <h5 class="fw-semibold">John Doe</h5>
                            </div>
                        </div>
                        <div class="col-lg-5 mt-3">
                            <div class="d-flex justify-content-between gap-3 flex-md-nowrap bg-white py-3 px-3 shadow-sm border rounded">
                                <div class="text-start w-75">
                                    <p class="fw-normal mb-0">Location</p>
                                    <h6 class="fw-semibold" style="font-size: 13px;">San Fernando Pampanga</h6>
                                    <p class="fw-normal mb-0">Educational Attainment</p>
                                    <h6 class="fw-semibold" style="font-size: 13px;">College Graduate : Bachelor of Hotel and Restaurant Management</h6>
                                </div>
                                <div class="text-start w-25">
                                    <p class="fw-normal mb-0">Age</p>
                                    <h6 class="fw-semibold" style="font-size: 13px;">22</h6>
                                    <p class="fw-normal mb-0">Gender</p>
                                    <h6 class="fw-semibold" style="font-size: 13px;">Male</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-3">
                            <div class="d-flex justify-content-between flex-md-nowrap gap-3 bg-white py-3 px-3 shadow-sm border rounded">
                                <div class="text-start">
                                    <p class="fw-normal mb-0">Aspiring Job</p>
                                    <h6 class="fw-semibold" style="font-size: 13px;">Kitchen Manager</h6>
                                    <p class="fw-normal mb-0">Salary</p>
                                    <h6 class="fw-semibold" style="font-size: 13px;">₱18,000</h6>
                                </div>
                                <div class="text-start">
                                    <p class="fw-normal mb-0">Branch</p>
                                    <h6 class="fw-semibold" style="font-size: 13px;">San Fernando, Pampanga</h6>
                                    <p class="fw-normal mb-0">Type</p>
                                    <h6 class="fw-semibold" style="font-size: 13px;">Full-time</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="interview">
                    <div class="row justify-content-center">



                        <div class="text-start">
                            <h6 class="fw-semibold">Interview Answers</h6>
                        </div>
                        <div class="col-lg-12">
                            <template v-for="(testcount, index) in testcount" :key="index">
                                <div class="bg-white py-3 px-3 rounded border shadow-sm mt-2">
                                    <div class="text-start">
                                        <p class="fw-noraml text-secondary mb-2" style="font-size: 13px;">Can you tell us about your experience in the food or dessert industry?</p>
                                        <p class="fw-semibold text-dark mb-0">I've worked in a bakery for two years, focusing on cakes and pastries.</p>
                                    </div>
                                </div>
                            </template>
                            <div class="text-end mt-3">
                                <button class="btn btn-success"><i class="bi bi-check-lg"></i> Approved</button>
                                <button class="btn btn-danger mx-3"><i class="bi bi-x-circle-fill"></i> Reject</button>
                            </div>
                        </div>



                    </div>
                </section>
            </main>
        </div>
    </div>
</template>

<script>
import AdminNavigation from '../Components/AdminNavigation/AdminNavigation.vue';
export default {
    name: 'AdminViewApplication',
    components: {AdminNavigation},
    data(){
        return{
            testcount: [
                {test: ''},{test: ''},{test: ''},{test: ''},{test: ''},
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
