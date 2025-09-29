<template>
    <div class="d-flex justify-content-end mb-3">
            <div class="position-relative">
                <i class="bi bi-search position-absolute" style="top: 8px; left: 10px;"></i>
                <input v-model="searchname" type="text" placeholder="Search"
                    class="form-control rounded shadow-none outline-secondary"
                    style="padding-left: 30px; height: 35px;">
            </div>
        </div>
    <div class="table-responsive">

        <table class="table table-hover">
            <thead class="border-top" style="background-color: #FAFAFA !important;">
                <tr>
                    <th scope="col">
                        <h6 class="fw-semibold mb-0" style="font-size: 14px;">Applicant <i class="bi bi-chevron-up"></i>
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
                        <h6 class="fw-semibold mb-0" style="font-size: 14px;">Date Applied<i
                                class="bi bi-chevron-up"></i></h6>
                    </th>

                    <th scope="col">
                        <h6 class="fw-semibold mb-0" style="font-size: 14px;">Status <i class="bi bi-chevron-up"></i>
                        </h6>
                    </th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(getlist, index) in list_filter" :key="index">
                    <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ getlist.userapplied?.name
                        ?? '--' }}</td>
                    <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{
                        getlist.jobapplied?.job_title ?? '--' }}</td>
                    <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">₱{{
                        getlist.jobapplied?.salary ?? '--' }}</td>
                    <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{
                        getlist.jobapplied?.location ?? '--' }}</td>
                    <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ getlist.jobapplied?.type
                        ?? '--' }}</td>
                    <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ new
                        Date(getlist.created_at).toLocaleDateString('en-US', {
                            year: 'numeric', month: 'long', day:
                                'numeric'
                        }) }}</td>

                    <td v-if="getlist.status == 'Hired'" class="fw-normal py-3"
                        style="font-size: 14px; padding-top: 11px;">
                        <i class="bi bi-check-circle-fill py-1 px-2 rounded-5"
                            style="background-color: #F2FDF5; color: #16A34A;"> Hired</i>
                    </td>
                    <td v-else-if="getlist.status == 'Processing'" class="fw-normal py-3"
                        style="font-size: 14px; padding-top: 11px;">
                        <i class="bi bi-hourglass-split py-1 px-2 rounded-5"
                            style="background-color: #FDECCE; color: #C47E09;"> Processing</i>
                    </td>
                    <td v-else-if="getlist.status == 'Rejected'" class="fw-normal py-3"
                        style="font-size: 14px; padding-top: 11px;">
                        <i class="bi bi-x-circle-fill py-1 px-2 rounded-5"
                            style="background-color: #FEF2F2; color: #DC2626;"> Rejected</i>
                    </td>
                    <td v-else class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">
                        <i class="bi bi-lock-fill py-1 px-2 rounded-5"
                            style="background-color: #DFDEDC; color: #4E4E4E;"> Cancelled</i>
                    </td>
                    <td class="fw-semibold text-primary " style="font-size: 14px; padding-top: 11px;">
                        <inertiaLink :href="`/admin/application/view/${getlist.id}`">
                            <lord-icon
                                src="https://cdn.lordicon.com/lzsupfwm.json"
                                trigger="loop"
                                delay="1500"
                                style="width:30px;height:30px">
                            </lord-icon>
                        </inertiaLink>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="text-end">
            <div class="d-flex justify-content-end mt-3 gap-2 flex-wrap">
                <inertiaLink v-if="application_list.prev_page_url" :href="application_list.prev_page_url" preserve-state preserve-scroll
                    class="fw-noramal py-1 text-decoration-none rounded">
                    <button class="btn btn-outline-secondary py-1" style="font-size: 13px;">Previous</button>
                </inertiaLink>
                <inertiaLink v-if="application_list.next_page_url" :href="application_list.next_page_url"
                    preserve-state preserve-scroll class="fw-noramal py-1 text-decoration-none rounded">
                    <button class="btn btn-outline-secondary py-1 px-3" style="font-size: 13px;">Next</button>
                </inertiaLink>
            </div>
        </div>
    </div>
</template>

<script>
import {Link as inertiaLink} from '@inertiajs/vue3'
export default {
    name: 'application_rejectedtable',
    components: {inertiaLink},
    props:{application_list:Object},
    data(){
        return{
            searchname: ''
        }
    },
    computed:{
        list_filter(){
            return this.application_list.data.filter(processdata =>  processdata.status.includes('Rejected')).filter(filterdata => {
                const matchname = filterdata.userapplied.name.toLowerCase().includes(this.searchname.toLowerCase())
                return matchname;
            });
        },
    },

}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');


thead th {
    background-color: #FAFAFA !important;
    white-space: nowrap;
    font-family: "Poppins", sans-serif;
}

tbody td {
    white-space: nowrap;
    font-family: "Poppins", sans-serif;
}
</style>
