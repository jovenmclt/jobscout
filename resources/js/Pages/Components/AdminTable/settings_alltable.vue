<template>
    <div class="d-flex justify-content-between mb-3">
            <div class="text-start mb-3 mt-2">
                <h6 class="fw-normal text-secondary">List of all account</h6>
            </div>
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
                        <h6 class="fw-semibold mb-0" style="font-size: 14px;">ID </h6>
                    </th>
                    <th scope="col">
                        <h6 class="fw-semibold mb-0" style="font-size: 14px;">Name  </h6>
                    </th>
                    <th scope="col">
                        <h6 class="fw-semibold mb-0" style="font-size: 14px;">Email </h6>
                    </th>
                    <th scope="col">
                        <h6 class="fw-semibold mb-0" style="font-size: 14px;">Created at</h6>
                    </th>

                    <th scope="col">
                        <h6 class="fw-semibold mb-0" style="font-size: 14px;">Account</h6>
                    </th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(getuser, index) in list_filter" :key="index">
                    <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ getuser?.id
                        ?? '--' }}</td>
                    <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ getuser?.name
                        ?? '--' }}</td>
                    <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{
                        getuser?.email ?? '--' }}</td>
                    <td class="fw-normal py-3" style="font-size: 14px; padding-top: 11px;">{{ new
                        Date(getuser?.created_at).toLocaleDateString('en-US', {
                            year: 'numeric', month: 'long', day:
                                'numeric'
                        }) }}</td>

                    <td v-if="getuser.status == '1'" class="fw-normal py-3"  style="font-size: 13px; padding-top: 11px;">
                        <div class=" text-center py-1 rounded-5 border border-success d-inline-block px-3" style="background-color: #F2FDF5; color: #16A34A;"> Active</div>
                    </td>
                    <td v-else class="fw-normal py-3"  style="font-size: 14px; padding-top: 11px;">
                        <div class="text-center py-1 rounded-5 border border-danger d-inline-block px-3" style="background-color: #FEF2F2; color: #DC2626;"> Disabled</div>
                    </td>
                    <td v-if="getuser.status == '1'" class="fw-semibold text-primary " style="font-size: 14px; padding-top: 11px;">
                        <lord-icon
                            @click="btndisableaccount(getuser.id)"
                            src="https://cdn.lordicon.com/hfacemai.json"
                            trigger="loop"
                            delay="1500"
                            colors="primary:#242424,secondary:#ffffff,tertiary:#c71f16"
                            style="width:30px;height:30px; cursor: pointer;">
                        </lord-icon>
                    </td>
                    <td v-else class="fw-semibold text-primary " style="font-size: 14px; padding-top: 11px;">

                        <lord-icon
                            @click="btnactivateaccount(getuser.id)"
                            src="https://cdn.lordicon.com/ueoydrft.json"
                            trigger="loop"
                            delay="1500"
                            colors="primary:#242424,secondary:#ffffff,tertiary:#16a9c7"
                            style="width:30px;height:30px';cursor: pointer;">
                        </lord-icon>

                    </td>
                </tr>
            </tbody>
        </table>
        <div class="text-end">
            <div class="d-flex justify-content-end mt-3 gap-2 flex-wrap">
                <inertiaLink v-if="all_user.prev_page_url" :href="all_user.prev_page_url" preserve-state preserve-scroll
                    class="fw-noramal py-1 text-decoration-none rounded">
                    <button class="btn btn-outline-secondary py-1" style="font-size: 13px;">Previous</button>
                </inertiaLink>
                <inertiaLink v-if="all_user.next_page_url" :href="all_user.next_page_url"
                    preserve-state preserve-scroll class="fw-noramal py-1 text-decoration-none rounded">
                    <button class="btn btn-outline-secondary py-1 px-3" style="font-size: 13px;">Next</button>
                </inertiaLink>
            </div>
        </div>
    </div>
</template>

<script>
import {Link as inertiaLink} from '@inertiajs/vue3'
import {router} from '@inertiajs/vue3'
export default {
    name: 'settings_alltable',
    components: {inertiaLink},
    props:{all_user:Object},
    data(){
        return{
            searchname: ''
        }
    },
    methods:{
        btndisableaccount(id){
            let proceed = confirm('Are you sure you want to disabled this account?');
            if(proceed){
                router.get(`/disabledmember/${id}`, {}, {
                    preserveScroll: true,
                    preserveState: true
                });
            }
        },
        btnactivateaccount(id){
            let proceed = confirm('Are you sure you want to activate this account?');
            if(proceed){
                router.get(`/activatedmember/${id}`, {}, {
                    preserveScroll: true,
                    preserveState: true
                });
            }
        }
    },
    computed:{
        list_filter(){
            return this.all_user.data.filter(filterdata => {
                const matchname = filterdata.name.toLowerCase().includes(this.searchname.toLowerCase())
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
