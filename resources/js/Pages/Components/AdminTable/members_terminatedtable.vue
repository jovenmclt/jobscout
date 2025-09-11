<template>
    <div class="d-flex justify-content-between mb-3">
            <div class="text-start mb-3 mt-2">
                <h6 class="fw-normal text-secondary">Terminated List</h6>
            </div>
            <div class="position-relative">
                <i class="bi bi-search position-absolute" style="top: 8px; left: 10px;"></i>
                <input type="text" placeholder="Search" class="form-control rounded shadow-none outline-secondary"
                    style="padding-left: 30px; height: 35px;">
            </div>
        </div>
    <div class="table-responsive">
        <table class="table">
            <thead class="border-top" style="background-color: #FAFAFA !important;">
                <tr>
                    <th scope="col">
                        <h6 class="fw-semibold mb-0" style="font-size: 14px;">Full Name <i class="bi bi-chevron-up"></i>
                        </h6>
                    </th>
                    <th scope="col">
                        <h6 class="fw-semibold mb-0" style="font-size: 14px;">Job <i class="bi bi-chevron-up"></i></h6>
                    </th>
                    <th scope="col">
                        <h6 class="fw-semibold mb-0" style="font-size: 14px;">Salary <i class="bi bi-chevron-up"></i>
                        </h6>
                    </th>
                    <th scope="col">
                        <h6 class="fw-semibold mb-0" style="font-size: 14px;">Branch <i class="bi bi-chevron-up"></i>
                        </h6>
                    </th>
                    <th scope="col">
                        <h6 class="fw-semibold mb-0" style="font-size: 14px;">Type <i class="bi bi-chevron-up"></i></h6>
                    </th>
                    <th scope="col">
                        <h6 class="fw-semibold mb-0" style="font-size: 14px;">Date Joined<i
                                class="bi bi-chevron-up"></i></h6>
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

                    <td class="fw-semibold text-primary py-3" style="font-size: 12px; padding-top: 11px;">Open</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="text-end mt-3">
        <button class="btn btn-outline-secondary px-4" style="font-size: 13px;">Next</button>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');


thead th {
    background-color: #FAFAFA !important;
    white-space: nowrap;
     font-family: "Poppins", sans-serif;
}

tbody td{
    white-space: nowrap;
     font-family: "Poppins", sans-serif;
}

</style>

