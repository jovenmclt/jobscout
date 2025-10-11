<template>
    <div id="navtop" class="col-12 py-2 px-md-4 px-2 bg-white shadow-sm d-md-block d-none z-1">
        <div class="d-flex justify-content-between">
            <div class="text-start">
                <img src="../Assets/magnifying-glass.png" width="30" height="30" class="position-relative" style="bottom: 6px;"  alt="">
                <span class="fw-bold fs-3" style="color: #5A81FA;">Job</span>
                <span class="fw-bold fs-3">Scout</span>
            </div>
            <div class="text-start">
                <img src="../Assets/admin-profile.png" alt="" width="40">
            </div>
        </div>
    </div>
    <nav id="navigationbar" class="navbar col-lg-2 col-md-3 col-12 navbar-expand-md px-md-0 px-4 " style="max-height: 500px;">
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminnavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#" class="navbar-brand text-start d-md-none d-block">
            <img src="../Assets/magnifying-glass.png" width="30" height="30" class="position-relative" style="bottom: 6px;"  alt="">
            <span class="fw-bold fs-3" style="color: #5A81FA;">Job</span>
            <span class="fw-bold fs-3">Scout</span>
        </a>
        <div class="collapse navbar-collapse " id="adminnavbar">
            <ul class="navbar-nav flex-md-column ms-xl-3 ms-1 ">
                <li class="navbar-item ">
                    <inertiaLink href="/user/dashboard" class="navbar-link User-nav-hov text-decoration-none fw-normal fs-5 text-dark nav-link rounded-2 px-lg-3 "><i class="bi bi-house fs-5"></i> Dashboard</inertiaLink>
                </li>
                <li class="navbar-item mt-3">
                    <inertiaLink href="/user/jobs" class="navbar-link User-nav-hov text-decoration-none fw-normal fs-5 text-dark nav-link rounded-2 px-lg-3 "><i class="bi bi-briefcase fs-5"></i> Jobs</inertiaLink>
                </li>
                <li class="navbar-item mt-3">
                    <inertiaLink href="/user/applicationstats" class="navbar-link User-nav-hov text-decoration-none fw-normal fs-5 text-dark nav-link rounded-2 px-lg-3 "><i class="bi bi-file-earmark-bar-graph fs-5"></i> Application</inertiaLink>
                </li>
                <li class="navbar-item mt-3">
                    <inertiaLink href="/user/profile" class="navbar-link User-nav-hov text-decoration-none fw-normal fs-5 text-dark nav-link rounded-2 px-lg-3 "><i class="bi bi-person-circle fs-5"></i> Profile</inertiaLink>
                </li>
                <li class="navbar-item mt-3 ">
                    <inertiaLink href="/user/message" class="navbar-link User-nav-hov text-decoration-none fw-normal fs-5 text-dark nav-link rounded-2 px-lg-3 "><i class="bi bi-chat-dots"></i> Message</inertiaLink>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script scoped>
import {Link as inertiaLink} from '@inertiajs/vue3'
export default {
    name: 'UserNavigation',
    components: {inertiaLink}
}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

.User-nav-hov:hover{
    background-color: #F3F3F3;
    color: #5A81FA !important;
}

@media (min-width: 768px) {
    #navigationbar{
        position: fixed;
        top: 70px;
        left: 0;
    }
    #navtop{
        position: fixed;
        top: 0;
        left: 0;
    }
}

@media (max-width: 767.98px) {
    #navigationbar {
        background-color: white !important;
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;

    }
}


</style>
