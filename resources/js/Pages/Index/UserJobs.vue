<template>
    <div class="container-xxl bg-color">
        <div class="row pe-xl-3">
            <UserNavigationVue />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">



                        <div class="text-start mt-3">
                            <h4 class="fw-semibold">Available Jobs</h4>
                            <div class="d-flex justify-content-between gap-3 flex-wrap mt-3">
                                <div class="text-start">
                                    <div class="position-relative">
                                        <i class="bi bi-search position-absolute" style="top: 8px; left: 10px;"></i>
                                        <input type="text" placeholder="Search" class="form-control rounded shadow-none outline-secondary" style="padding-left: 30px; height: 35px;">
                                    </div>
                                </div>
                                <div class="text-start">
                                    <a href="#" class="fw-normal"> Full-time</a>
                                    <a href="#" class="fw-normal mx-3"> Part-time</a>
                                </div>
                            </div>
                        </div>

                        <template v-for="(getcount, indx) in testcount" :key="indx">
                            <div class="col-lg-4 col-md-6 mt-4">
                                <div class="bg-white py-3 px-3 rounded border shadow-sm">
                                    <div class="text-end" >
                                        <p class="fw-semibold text-primary d-inline-block py-1 px-3 rounded-4 mb-0" style=" background-color: #EAEFFF;">San Fernando</p>
                                    </div>
                                    <div class="text-start">
                                        <p class="fw-normal text-primary mb-1">Full-time</p>
                                        <h5 class="fw-semibold">Fastfood Attendant</h5>
                                        <p class="fw-normal text-secondary">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis </p>
                                        <h6 class="fw-semibold mb-0">₱11, 687.00</h6>
                                        <p class="fw-light text-secondary mb-0">Monthly Salary</p>
                                    </div>
                                    <div class="text-end dropdown dropstart">
                                        <i class="bi bi-three-dots text-primary fs-5 " data-bs-toggle="dropdown" style="cursor: pointer;"></i>
                                        <ul class="dropdown-menu dropdown-menu-dark ">
                                            <li><a class="dropdown-item  " href="#">See Details</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </template>


                    </div>
                </section>
            </main>
        </div>
    </div>
</template>

<script>
import UserNavigationVue from '../Components/UserNavigation/UserNavigation.vue'

export default {
    name: 'UserJobs',
    components: {UserNavigationVue},
    data(){
        return{
            testcount: [
                {test: ''},{test: ''},{test: ''},{test: ''},{test: ''},{test: ''},{test: ''},{test: ''},{test: ''},
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
