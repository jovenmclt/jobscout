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
    <nav id="navigationbar" class="navbar col-lg-2 col-md-3 col-12 navbar-expand-md px-md-0 px-4" style="max-height: 340px;">
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminnavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#" class="navbar-brand text-start d-md-none d-block">
            <img src="../Assets/magnifying-glass.png" width="30" height="30" class="position-relative" style="bottom: 6px;"  alt="">
            <span class="fw-bold fs-3" style="color: #5A81FA;">Job</span>
            <span class="fw-bold fs-3">Scout</span>
        </a>
        <div class="collapse navbar-collapse" id="adminnavbar">
            <ul class="navbar-nav flex-md-column ms-md-3">
                <li class="navbar-item ">
                    <inertiaLink href="/admin/dashboard" class="navbar-link text-decoration-none fw-normal fs-5 text-secondary nav-link rounded-2 px-lg-3 px-2"><i class="bi bi-house"></i> Dashboard</inertiaLink>
                </li>
                <a  data-bs-toggle="collapse" href="#collapseExample" class="mt-4 text-decoration-none fw-noemal fs-6 text-secondary d-flex justify-content-between px-lg-3 px-2">
                    <span>Career</span>
                    <img src="../Assets/arrow-down.png" alt="" width="15" height="18" class="mt-1">
                </a>
                <div class="collapse show" id="collapseExample">
                    <li class="navbar-item mt-3">
                        <inertiaLink href="/admin/jobs" class="navbar-link text-decoration-none fw-normal fs-5 text-secondary nav-link rounded-2 px-lg-3 px-2"><i class="bi bi-briefcase"></i> Jobs</inertiaLink>
                    </li>
                    <li class="navbar-item mt-3">
                        <inertiaLink href="/admin/application" class="navbar-link text-decoration-none fw-normal fs-5 text-secondary nav-link rounded-2 px-lg-3 px-2"><i class="bi bi-file-earmark-person"></i> Application</inertiaLink>
                    </li>
                    <li class="navbar-item mt-3">
                        <inertiaLink href="/admin/members" class="navbar-link text-decoration-none fw-normal fs-5 text-secondary nav-link rounded-2 px-lg-3 px-2"><i class="bi bi-people"></i> Members</inertiaLink>
                    </li>
                </div>
            </ul>
        </div>
    </nav>
</template>

<script>
import {Link as inertiaLink} from '@inertiajs/vue3'
export default {
    name: 'AdminNavigation',
    components: {inertiaLink}
}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

.nav-link:hover{
    background-color: #F3F3F3;
    color: #5A81FA !important;
}

@media (min-width: 768px) {
    #navigationbar{
        position: fixed;
        top: 70px;
    }
    #navtop{
        position: fixed;
        top: 0;
    }
}

</style>
