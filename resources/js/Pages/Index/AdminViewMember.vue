<template>
    <div class="container-xxl">
        <div class="row pe-xl-3">
            <AdminNavigationVue />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-center">


                        <div class="text-start mt-3">
                            <span class="fw-normal text-secondary">Members > view</span>
                            <br>
                            <h4 class="fw-semibold mt-2">View Member</h4>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <div class="bg-white py-3 px-3 shadow-sm rounded border">
                                <div class="text-start">

                                    <div class="text-center">
                                        <img src="../Components/Assets/profile.png" width="100" alt="">
                                        <h5 class="fw-semibold">John Doe</h5>
                                    </div>
                                    <div class="d-flex justify-content-between  flex-md-nowrap gap-3">
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
                                    <div class="text-start mt-3">
                                        <p class="fw-normal mb-0">About</p>
                                        <h6 class="fw-semibold" style="font-size: 13px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, voluptatibus praesentium et dignissimos corporis, ullam magni eaque rerum mollitia debitis nemo. Nisi, ut? Iste totam adipisci dicta iusto? Quibusdam, temporibus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut atque eaque iure architecto ratione assumenda a ea et fugiat quo sit, reprehenderit autem alias blanditiis veritatis! Voluptas illum rem odio?</h6>
                                    </div>
                                    <div class="text-start mt-3">
                                        <p class="fw-normal mb-0">Experience</p>
                                        <h6 class="fw-semibold" style="font-size: 13px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, voluptatibus praesentium et dignissimos corporis, ullam magni eaque rerum mollitia debitis nemo. Nisi, ut? Iste totam adipisci dicta iusto? Quibusdam, temporibus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut atque eaque iure architecto ratione assumenda a ea et fugiat quo sit, reprehenderit autem alias blanditiis veritatis! Voluptas illum rem odio?</h6>
                                    </div>
                                    <div class="text-start mt-3">
                                        <p class="fw-normal mb-0">Resume</p>
                                        <button class="btn btn-primary">View Resume</button>
                                    </div>

                                    <br><br>
                                    <h6 class="fw-semibold">Job Position</h6>
                                    <div class="d-flex justify-content-between flex-md-nowrap gap-3 bg-white py-3 px-3 shadow-sm border rounded">
                                        <div class="text-start">
                                            <p class="fw-normal mb-0">Job Position</p>
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
                            <div class="text-end my-4">
                                <button class="btn btn-outline-secondary px-4">Back</button>
                            </div>
                        </div>



                    </div>
                </section>
            </main>
        </div>
    </div>
</template>

<script>
import AdminNavigationVue from '../Components/AdminNavigation/AdminNavigation.vue'

export default {
    name: 'AdminCreateMember',
    components: {AdminNavigationVue}
}
</script>

<style>

</style>
