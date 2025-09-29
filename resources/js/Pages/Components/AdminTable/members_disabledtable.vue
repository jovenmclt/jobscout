<template>
    <div class="d-flex justify-content-between mb-3">
            <div class="text-start mb-3 mt-2">
                <h6 class="fw-normal text-secondary">List of Disabled Members</h6>
            </div>
            <div class="position-relative">
                <i class="bi bi-search position-absolute" style="top: 8px; left: 10px;"></i>
                <input v-model="searchname" type="text" placeholder="Search" class="form-control rounded shadow-none outline-secondary"
                    style="padding-left: 30px; height: 35px;">
            </div>
        </div>
    <div class="table-responsive">
        <table class="table table-hover">
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
                        <h6 class="fw-semibold mb-0" style="font-size: 14px;">Date Hired<i class="bi bi-chevron-up"></i></h6>
                    </th>


                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(getinfo, index ) in filterdata" :key="index">
                    <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ getinfo?.userinfo?.name ?? '---' }}</td>
                    <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ getinfo?.jobinfo?.job_title ?? '---' }}</td>
                    <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">₱{{ formatSalary(getinfo?.jobinfo?.salary ?? '---') }}</td>
                    <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ getinfo?.jobinfo?.location ?? '---' }}</td>
                    <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ getinfo?.jobinfo?.type ?? '---' }}</td>
                    <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ getinfo?.hired_date ?? '---'}}</td>
                    <td class="fw-semibold text-primary" style="font-size: 14px; padding-top: 11px;">
                        <inertiaLink :href="`/admin/members/view/${getinfo.id}`">
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
    </div>
    <div class="text-end mt-3">
        <div class="d-flex justify-content-end mt-3 gap-2 flex-wrap">
            <inertiaLink v-if="all_members.prev_page_url" :href="all_members.prev_page_url" preserve-state preserve-scroll class="fw-noramal py-1 text-decoration-none rounded">
                <button class="btn btn-outline-secondary py-1" style="font-size: 13px;">Previous</button>
            </inertiaLink>
            <inertiaLink v-if="all_members.next_page_url" :href="all_members.next_page_url" preserve-state preserve-scroll class="fw-noramal py-1 text-decoration-none rounded">
                <button class="btn btn-outline-secondary py-1 px-3" style="font-size: 13px;">Next</button>
            </inertiaLink>
        </div>
    </div>
</template>

<script>
import {Link as inertiaLink} from '@inertiajs/vue3'
export default {
    name: 'members_disabledtable',
    components: {inertiaLink},
    props: {all_members:Object},
    data(){
        return{
            searchname: ''
        }
    },
    methods:{
        formatSalary(value) {
            if (value == null || value === '') return '---';
            return Number(value).toLocaleString();
        },
    },
    computed:{
        filterdata(){
            return this.all_members.data.filter(activedata => activedata.status == '0').filter(filtered => {
                const searchname = filtered.userinfo.name.toLowerCase().includes(this.searchname.toLowerCase())
                return searchname
            });
        }
    }
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
