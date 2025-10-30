<template>
    <div class="container-xxl bg-color min-vh-100">
        <div class="row pe-xl-3">
            <AdminNavigation :check_unread="check_unread"/>
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">


                        <div class="text-start mt-3">
                            <h4 class="fw-semibold">Conversation</h4>
                            <div class="d-flex justify-content-between gap-3 flex-wrap mt-3">
                                <div class="text-start">
                                    <select v-model="search_type" class="form-select shadow-none" aria-label="Default select example">
                                        <option value="All">All</option>
                                        <option value="1">Online</option>
                                        <option value="0">Offline</option>
                                    </select>
                                </div>
                                <div class="text-start">
                                    <div class="position-relative">
                                        <i class="bi bi-search position-absolute" style="top: 8px; left: 10px;"></i>
                                        <input v-model="search_user" type="text" placeholder="Search" class="form-control rounded shadow-none outline-secondary" style="padding-left: 30px; ">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <template v-for="(getuser, index) in filterdata" :key="index">
                            <div class="col-xl-3 col-lg-4 col-sm-6  mt-3">
                                <div class="py-2 px-2 border bg-white rounded">
                                    <div class="d-flex gap-2 border-bottom justify-content-between pb-2">
                                        <div class="d-flex gap-2">
                                            <div class="text-start">
                                                <img v-if="getuser.profile_picture" :src="`/storage/${getuser.profile_picture}`" alt="" class="w-100 h-100 rounded-5" style="max-width: 60px; max-height: 53px;">
                                                <img v-else src="../Components/Assets/profile.png" class="w-100" style="max-width: 53px;" alt="">
                                            </div>
                                            <div class="text-start mt-1">
                                                <p class="fw-semibold text- mb-0">{{ truncateFilename(getuser?.name ?? '---') }}</p>
                                                <p class="fw-normal text- mb-0" style="font-size: 13px;">User ID : {{ getuser?.id ?? '---' }}</p>
                                            </div>
                                        </div>
                                        <div class="text-start">
                                            <div class="dropstart">
                                                <i class="bi bi-three-dots-vertical" data-bs-toggle="dropdown" style="cursor: pointer;"></i>
                                                <ul class="dropdown-menu mt-3">
                                                    <li><inertiaLink class="dropdown-item" :href="`/openmessage/${getuser.id}`" style="font-size: 13px;"  @click="clearNotif(getuser.id)"> Open message</inertiaLink></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-start mt-2 ms-2">
                                        <span class="fw-normal" style="font-size: 13px;">
                                            <lord-icon
                                                class="py-1"
                                                src="https://cdn.lordicon.com/ypbuyaqd.json"
                                                trigger="loop"
                                                delay="2000"
                                                colors="primary:#848484,secondary:#4bb3fd,tertiary:#3a3347,quaternary:#ebe6ef,quinary:#ffc738"
                                                style="width:20px;height:20px">
                                            </lord-icon>
                                             {{ getuser?.email ?? '---' }}
                                        </span>

                                        <div class="d-flex justify-content-between">
                                            <div class="text-start">
                                                <td v-if="getuser.login == '1'" class="fw-normal py-2"  style="font-size: 12px; ">
                                                    <div class=" text-center py-1 rounded-5 border border-success d-inline-block px-3" style="background-color: #F2FDF5; color: #16A34A;"> Online</div>
                                                </td>
                                                <td v-else class="fw-normal py-2"  style="font-size: 12px;">
                                                    <div class="text-center py-1 rounded-5 border border-secondary d-inline-block px-3" style="background-color: #DFDEDC; color: #4E4E4E;"> Offline</div>
                                                </td>
                                            </div>
                                            <div class="text-start">
                                                <p v-if="notif[getuser.id]" class="fw-normal mb-0 mt-3 text-primary" style="font-size: 12px;">New message</p>
                                            </div>
                                        </div>

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
import AdminNavigation from '../Components/AdminNavigation/AdminNavigation.vue';
import { Link as inertiaLink } from '@inertiajs/vue3';

export default {
    name: 'AdminConversation',
    components: { AdminNavigation, inertiaLink },
    props: { all_user: Array, check_unread:Boolean },
    data() {
        return {
            search_type: 'All',
            search_user: '',
            notif: JSON.parse(localStorage.getItem('notification')) || {}  // ⬅️ Load saved notifications
        }
    },
    methods: {
        truncateFilename(name) {
            if (!name) return '';
            if (name.length <= 17) return name;
            return name.substring(0, 14) + '...';
        },
        clearNotif(senderId) {
            if (this.notif[senderId]) {
                delete this.notif[senderId];
                this.saveNotif();
            }
        },
        saveNotif() {
            localStorage.setItem('notification', JSON.stringify(this.notif)); // ✅ Save as object
        }

    },
    computed: {
        filterdata() {
            return this.all_user.filter(data => {
                const filtername = data.name.toLowerCase().includes(this.search_user.toLowerCase());
                const status = this.search_type === 'All' || data.login == this.search_type;
                return filtername && status;
            });
        }
    },
    mounted() {
        // Listen for new message events
        window.Echo.channel('chat')
        .listen('MessageSent', (e) => {

            if (!this.notif[e.sender_id]) {
                this.notif = { ...this.notif, [e.sender_id]: true }; // ensure reactivity
                this.saveNotif();
            }


        });

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
