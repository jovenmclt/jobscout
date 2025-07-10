<template>
    <div class="container-xxl">
        <div class="row justify-content-center ">
            <nav class="navbar col-12  navbar-expand-md px-md-4 px-1">
                <div class="container-fluid">
                    <a class="navbar-brand d-md-block d-none" href="#">
                        <img src="../Components/Assets/magnifying-glass.png" width="30" height="30" class="position-relative" style="bottom: 6px;"  alt="">
                        <span class="fw-bold fs-3" style="color: #5A81FA;">Job</span>
                        <span class="fw-bold fs-3">Scout</span>
                    </a>
                    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#indexnavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand d-md-none d-block" href="#">
                        <img src="../Components/Assets/magnifying-glass.png" width="30" height="30" class="position-relative" style="bottom: 6px;"  alt="">
                        <span class="fw-bold fs-3" style="color: #5A81FA;">Job</span>
                        <span class="fw-bold fs-3">Scout</span>
                    </a>
                    <div class="collapse navbar-collapse justify-content-end" id="indexnavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item mt-1">
                                <a class="nav-link fw-semibold mx-md-3" aria-current="page" href="#home">Home</a>
                            </li>
                            <li class="nav-item mt-1">
                                <a class="nav-link fw-semibold mx-md-3" aria-current="page" href="#jobs">Jobs</a>
                            </li>
                            <li class="nav-item mt-1">
                                <a class="nav-link fw-semibold mx-md-3" aria-current="page" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <inertiaLink class="nav-link" aria-current="page" href="/login/account">
                                    <button class="btn btn-primary rounded-5 px-4 py-1 fw-semibold">Login</button>
                                </inertiaLink>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="col-12">
                <section id="home" class="px-md-4 px-1">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="text-center">
                                <h1 class="fw-semibold display-1">Discover your future <br class="d-lg-block d-none"> with  <span class="fw-bold" style="color: #5A81FA;">Sweet Treats PH</span> </h1>
                                <h4 class="fw-normal mb-5 mt-4">Explore a dynamic work environment that fosters growth, creativity, and <br class="d-lg-block d-none"> teamwork with Sweet Treats PH</h4>
                                <inertiaLink href="/register/account">
                                    <button class="btn btn-secondary rounded-5 px-lg-5 py-lg-3 fs-6">Get Started <i class="bi bi-arrow-right"></i></button>
                                </inertiaLink>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="section2" class="px-md-4 px-1">
                    <div class="row justify-content-start">
                        <div class="col-lg-12">
                            <div class="d-flex flex-sm-nowrap flex-wrap justify-content-start">
                                <div class="text-center px-2" style="width:  500px">
                                    <h3 class="fw-semibold">Discover <br> opportunities</h3>
                                </div>
                                <div class="text-center px-2 border-end border-start border-dark mt-sm-0 mt-3" style="width: 500px">
                                    <h3 class="fw-semibold">Apply with <br> ease</h3>
                                </div>
                                 <div class="text-center px-2 mt-sm-0 mt-3" style="width: 500px">
                                    <h3 class="fw-semibold">Work with <br> Sweet Treats</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="jobs" class="px-md-4 px-1">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h3 class="fw-semibold">Featured Jobs</h3>
                            </div>
                            <div class="d-flex flex-md-nowrap flex-wrap gap-3 justify-content-md-between justify-content-center pt-4">
                                <div class="border border-primary border-2 py-3 px-2 rounded-5" style="width: 400px;">
                                    <div class="text-end" >
                                        <p class="fw-semibold text-primary d-inline-block py-1 px-3 rounded-4" style=" background-color: #EAEFFF;">BALER BRANCH</p>
                                    </div>
                                    <div class="text-start">
                                        <img src="../Components/Assets/Waiter.png" alt="">
                                        <h5 class="fw-semibold ps-lg-4">Fastfood Attendant</h5>
                                        <p class="fw-normal text-secondary ps-lg-4">Provides quick and efficient customer service, takes orders, and ensures food is served promptly.</p>
                                        <h5 class="fw-semibold ps-lg-4">₱11, 687.00</h5>
                                    </div>
                                </div>
                                <div class="border border-primary border-2 py-3 px-2 rounded-5" style="width: 400px;">
                                    <div class="text-end" >
                                        <p class="fw-semibold text-primary d-inline-block py-1 px-3 rounded-4" style=" background-color: #EAEFFF;">APALIT BRANCH</p>
                                    </div>
                                    <div class="text-start">
                                        <img src="../Components/Assets/Waiter.png" alt="">
                                        <h5 class="fw-semibold ps-lg-4">Busser</h5>
                                        <p class="fw-normal text-secondary ps-lg-4">Clears tables, resets dining areas, and assists in maintaining cleanliness in the restaurant.</p>
                                        <h5 class="fw-semibold ps-lg-4">₱18, 194.00</h5>
                                    </div>
                                </div>
                                <div class="border border-primary border-2 py-3 px-2 rounded-5" style="width: 400px;">
                                    <div class="text-end" >
                                        <p class="fw-semibold text-primary d-inline-block py-1 px-3 rounded-4" style=" background-color: #EAEFFF;">CEBU BRANCH</p>
                                    </div>
                                    <div class="text-start">
                                        <img src="../Components/Assets/Waiter.png" alt="">
                                        <h5 class="fw-semibold ps-lg-4">Food Runner</h5>
                                        <p class="fw-normal text-secondary ps-lg-4">Delivers orders from the kitchen to guests, ensuring accuracy and timely service.</p>
                                        <h5 class="fw-semibold ps-lg-4">₱16, 404.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="section4" >
                    <div class="row justify-content-center align-items-center section4-style">
                        <div class="col-md-8">
                            <div class="text-center">
                                <h1 class="fw-light text-white display-3 mb-4">Sweet Treats PH</h1>
                                <p class="fw-light text-white">Our passion lies in preserving and sharing the authentic flavors of the Philippines while adding a modern twist to our recipes. Whether for gifting, celebrating, or indulging, Sweet Treats PH offers a variety of delicacies that embody the warmth and sweetness of Filipino culture.</p>
                                <button class="btn btn-primary rounded-5 mt-3 py-3 px-5">Apply Now</button>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="about">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="d-flex flex-lg-nowrap flex-wrap justify-content-between">
                                <div class="text-start">
                                    <img src="../Components/Assets/ph-img.png" class="d-lg-inline d-none" alt="">
                                </div>
                                <div class="text-start mt-lg-3">
                                    <h1 class="fw-normal display-4 text-lg-start text-center">Work in <span class="fw-bold" style="color: #5A81FA;">10 branches</span> <br class="d-lg-block d-none"> of   Sweet Treats PH</h1>
                                    <p class="fw-normal my-4 text-secondary">Were excited to share that Sweet Treats PH has grown to 25 branches across the Philippines! Bringing you the finest Filipino sweet delicacies, we’re now closer than ever to satisfy your cravings. Visit us at a location near you and enjoy the sweet taste of tradition!</p>
                                    <div class="d-flex gap-4">
                                        <ul>
                                            <li>
                                                <p class="fw-normal mb-3">Metro Manila Branch</p>
                                            </li>
                                            <li>
                                                <p class="fw-normal mb-3">Pampanga Branch</p>
                                            </li>
                                            <li>
                                                <p class="fw-normal mb-3">Cebu Branch</p>
                                            </li>
                                            <li>
                                                <p class="fw-normal mb-3">Las Pinas Branch</p>
                                            </li>
                                            <li>
                                                <p class="fw-normal mb-3">Laguna Branch</p>
                                            </li>
                                            <li>
                                                <p class="fw-normal mb-3">Batangas Branch</p>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <p class="fw-normal mb-3">Quezon Branch</p>
                                            </li>
                                            <li>
                                                <p class="fw-normal mb-3">Baler Branch</p>
                                            </li>
                                            <li>
                                                <p class="fw-normal mb-3">Vigan Branch</p>
                                            </li>
                                            <li>
                                                <p class="fw-normal mb-3">Ilocos Sur Branch</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
            <footer class="footer col-12 py-4 px-5" style="background-color: #2A2C5A;">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="d-flex flex-wrap gap-4 justify-content-between">
                            <div class="text-start d-flex">
                                <img src="../Components/Assets/magnifying-glass.png" width="30" height="30" class="mt-1" alt="">
                                <span class="fw-bold fs-3" style="color: #5A81FA;">Job</span>
                                <span class="fw-bold fs-3 text-white">Scout</span>
                            </div>
                            <ul class="d-flex gap-4 list-unstyled">
                                <li class=" mt-1">
                                    <a class="fw-semibold text-white text-decoration-none" aria-current="page" href="#home">Home</a>
                                </li>
                                <li class=" mt-1">
                                    <a class=" fw-semibold text-white text-decoration-none" aria-current="page" href="#jobs">Jobs</a>
                                </li>
                                <li class=" mt-1">
                                    <a class=" fw-semibold text-white text-decoration-none" aria-current="page" href="#about">About</a>
                                </li>
                            </ul>
                            <div class="text-start  ">
                                <inertiaLink href="/login/account">
                                    <button class="btn btn-outline-primary rounded-5 px-4 py-1 text-white mx-2"><i class="bi bi-person-fill-check"> Login</i></button>
                                </inertiaLink>
                                <inertiaLink href="/register/account">
                                    <button class="btn btn-secondary rounded-5 px-4 py-1 text-white mx-2"><i class="bi bi-box-arrow-in-right"> Signup</i></button>
                                </inertiaLink>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</template>

<script>
import {Link as inertiaLink} from '@inertiajs/vue3'
export default {
    name: 'Index',
    components: {inertiaLink}
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

section{
    font-family: "Poppins", sans-serif;
    padding: calc(65px + 1rem) 0;
    overflow-wrap: break-word;
}

.section4-style{
    background-image: url('../Components/Assets/bg-img.png');
    background-size: cover;
    background-position: center;
    min-height: 60vh;
}
</style>
