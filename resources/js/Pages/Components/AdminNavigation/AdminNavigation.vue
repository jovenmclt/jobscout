<template>
    <div class="col-12 py-2 px-md-4 px-2 bg-white shadow-sm d-md-block d-none">
        <div class="d-flex justify-content-between">
            <div class="text-start">
                <img src="../Assets/magnifying-glass.png" width="30" height="30" class="position-relative" style="bottom: 6px;"  alt="">
                <span class="fw-bold fs-3" style="color: #5A81FA;">Job</span>
                <span class="fw-bold fs-3">Scout</span>
            </div>
            <div class="text-start">

            </div>
        </div>
    </div>
    <nav class="navbar col-lg-2 col-md-3 col-12 navbar-expand-md px-md-0 px-4 ">
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminnavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#" class="navbar-brand text-start d-md-none d-block">
            <img src="../Assets/magnifying-glass.png" width="30" height="30" class="position-relative" style="bottom: 6px;"  alt="">
            <span class="fw-bold fs-3" style="color: #5A81FA;">Job</span>
            <span class="fw-bold fs-3">Scout</span>
        </a>
        <div class="collapse navbar-collapse" id="adminnavbar">
            <ul class="navbar-nav flex-md-column mt-3 ms-md-3">
                <li class="navbar-item ">
                    <a href="" class="navbar-link text-decoration-none fw-normal fs-5 text-secondary nav-link"><i class="bi bi-house"></i> Dashboard</a>
                </li>
                <a  data-bs-toggle="collapse" href="#collapseExample" class="mt-4 text-decoration-none fw-noemal fs-6 text-secondary d-flex justify-content-between">
                    <span>Career</span>
                    <img src="../Assets/arrow-down.png" alt="" width="15" height="18" class="mt-1">
                </a>
                <div class="collapse show" id="collapseExample">
                    <li class="navbar-item mt-3">
                        <a href="" class="navbar-link text-decoration-none fw-normal fs-5 text-secondary nav-link"><i class="bi bi-briefcase"></i> Jobs</a>
                    </li>
                    <li class="navbar-item mt-3">
                        <a href="" class="navbar-link text-decoration-none fw-normal fs-5 text-secondary nav-link"><i class="bi bi-file-earmark-person"></i> Application</a>
                    </li>
                    <li class="navbar-item mt-3">
                        <a href="" class="navbar-link text-decoration-none fw-normal fs-5 text-secondary nav-link"><i class="bi bi-people"></i> Members</a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'AdminNavigation'
}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

.nav-link:hover{
    border-bottom: 2px solid black;
}
</style>
