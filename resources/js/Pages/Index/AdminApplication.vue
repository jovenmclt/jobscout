<template>
    <div class="container-xxl bg-color">
        <div class="row pe-xl-3">
            <AdminNavigationVue />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">



                        <div class="text-start mt-3">
                            <h4 class="fw-semibold mt-2">Application</h4>
                        </div>
                        <div class="col-lg-3 col-md-4 mt-3">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <div class="text-start">
                                    <p class="fw-normal text-secondary mb-2">Total Applicants</p>
                                    <h3 class="fw-semibold">191</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 mt-3">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <div class="text-start">
                                    <p class="fw-normal text-secondary mb-2 text-warning">Processing</p>
                                    <h3 class="fw-semibold">191</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 mt-3">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <div class="text-start">
                                    <p class="fw-normal text-secondary mb-2 text-success">Passed</p>
                                    <h3 class="fw-semibold">191</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 mt-3">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <div class="text-start">
                                    <p class="fw-normal text-secondary mb-2 text-danger">Rejected</p>
                                    <h3 class="fw-semibold">191</h3>
                                </div>
                            </div>
                        </div>



                    </div>
                </section>
                <section id="applicantlist">
                    <div class="row justify-content-center">




                        <div class="col-lg-12">
                             <div class="bg-white py-3 px-3 shadow-sm rounded border">
                                <div class="table-responsive">
                                    <div class="text-start border-bottom mb-3">
                                        <h6 class="fw-semibold">Applicants list</h6>
                                    </div>
                                    <div class="d-flex justify-content-end mb-3">
                                        <div class="position-relative">
                                            <i class="bi bi-search position-absolute" style="top: 8px; left: 10px;"></i>
                                            <input type="text" placeholder="Search" class="form-control rounded shadow-none outline-secondary" style="padding-left: 30px; height: 35px;">
                                        </div>
                                    </div>
                                    <table class="table">
                                        <thead class="border-top" style="background-color: #FAFAFA !important;">
                                            <tr>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Applicant <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Job <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Salary <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Branch <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Type <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Date Applied<i class="bi bi-chevron-up"></i></h6>
                                                </th>

                                                <th scope="col">
                                                    <h6 class="fw-semibold mb-0" style="font-size: 14px;">Status <i class="bi bi-chevron-up"></i></h6>
                                                </th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Lisette Balley</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Waiter</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">₱11,687</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Apalit, Pampanga</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Part-Time</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">May 20, 2025</td>


                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">
                                                    <i class="bi bi-check-circle-fill py-1 px-2 rounded-5" style="background-color: #F2FDF5; color: #16A34A;"> Passed</i>
                                                </td>
                                                <td class="fw-semibold text-primary py-3" style="font-size: 12px; padding-top: 11px;">Open</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Lisette Balley</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Waiter</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">₱11,687</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Apalit, Pampanga</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Part-Time</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">May 20, 2025</td>

                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">
                                                    <i class="bi bi-hourglass-split py-1 px-2 rounded-5" style="background-color: #FDECCE; color: #C47E09;"> Processing</i>
                                                </td>
                                                 <td class="fw-semibold text-primary py-3" style="font-size: 12px; padding-top: 11px;">Open</td>
                                            </tr>
                                            <tr>
                                               <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Lisette Balley</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Waiter</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">₱11,687</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Apalit, Pampanga</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">Part-Time</td>
                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">May 20, 2025</td>

                                                <td class="fw-normal py-3" style="font-size: 12px; padding-top: 11px;">
                                                    <i class="bi bi-x-circle-fill py-1 px-2 rounded-5" style="background-color: #FEF2F2; color: #DC2626;"> Rejected</i>
                                                </td>
                                                 <td class="fw-semibold text-primary py-3" style="font-size: 12px; padding-top: 11px;">Open</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-end">
                                        <button class="btn btn-outline-secondary px-4" style="font-size: 13px;">Next</button>
                                    </div>
                                </div>
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
    name: 'AdminApplication',
    components: {AdminNavigationVue}
}
</script>

<style scope>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

.bg-color{
    background-color: #FAFAFA;
}
section{
    font-family: "Poppins", sans-serif;
    padding: calc(10px + 1rem) 0;
    overflow-wrap: break-word;
}

thead th {
    background-color: #FAFAFA !important;
    white-space: nowrap;
}

tbody td{
    white-space: nowrap;
}
</style>
