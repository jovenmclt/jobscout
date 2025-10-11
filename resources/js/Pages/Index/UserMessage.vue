<template>
    <div class="container-xxl min-vh-100">
        <div class="row pe-xl-3">
            <UserNavigationVue />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">
                        <div class="text-start mt-3">
                            <h4 class="fw-semibold">Messages Inbox</h4>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="border rounded">
                                <div class="bg-white px-3 py-2 shadow-sm">
                                    <h6 class="fw-semibold mb-0">Admin</h6>
                                    <p class="fw-normal mb-0" style="font-size: 14px;">Jobscout admin</p>
                                </div>

                                <div v-if="message_history.length > 0" class="d-flex flex-column justify-content-end px-3 py-3" style="height: 365px;">
                                    <template v-for="(getconversation , index) in message_history" :key="index">
                                        <div ref="messageContainer" style="max-height: 365px; overflow-y: auto; scrollbar-width: none;">
                                            <template v-for="(getmessage, indx) in getconversation.message" :key="indx">
                                                <div v-if="getmessage.sender_id == userid" class="d-flex justify-content-end w-100 gap-2">
                                                    <div class="w-75 text-end">
                                                        <p v-if="getmessage.message" class="fw-normal mb-0 border border-primary py-2 px-3 rounded text-start d-inline-block" style="font-size: 14px; word-break: break-all; background-color: rgba(0, 8, 255, 0.2);">{{ getmessage.message }}</p>
                                                        <template v-for="(getfile, ndx) in JSON.parse(getmessage.files)" :key="ndx">
                                                            <p class="mb-1" style="font-size: 14px;">
                                                                <a :href="`/storage/${getfile}`" style="background-color: rgba(0, 8, 255, 0.2);" class="d-inline-block text-dark fw-normal mt-1 mb-0 text-end py-2 px-3 border border-primary rounded text-decoration-none" :download="getfile.split('/').pop()"> <i class="bi bi-file-pdf-fill"></i> {{ truncateFilename(getfile) }} <i class="bi bi-cloud-arrow-down-fill"></i></a>
                                                            </p>
                                                        </template>
                                                        <div v-if=" new Date(getmessage.created_at).toISOString().split('T')[0] == new Date().toISOString().split('T')[0]">
                                                            <p class="fw-normal mt-1 mb-0 text-end" style="font-size: 13px;">
                                                                Message sent today  {{ new Date(getmessage.created_at).toLocaleTimeString('en-PH', { timeZone: 'Asia/Manila', hour12: false }) }}
                                                            </p>

                                                        </div>
                                                        <div v-else>
                                                            <p class="fw-normal mt-1 mb-0 text-end" style="font-size: 13px;">Message sent {{ new Date(getmessage.created_at).toISOString().split('T')[0] }}</p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div v-else class="d-flex w-100 gap-2">
                                                    <img src="../Components/Assets/admin-profile.png" class="w-25 h-25" style="max-width: 40px;" alt="">
                                                    <div class="w-75 text-start">
                                                        <p v-if="getmessage.message" class="fw-normal mb-0 bg-white border py-3 px-3 rounded text-start d-inline-block" style="font-size: 14px; word-break: break-all;">{{ getmessage.message }}</p>
                                                         <template v-for="(getfile, ndx) in JSON.parse(getmessage.files)" :key="ndx">
                                                            <p class="mb-1" style="font-size: 14px;">
                                                                <a :href="`/storage/${getfile}`"  class="d-inline-block text-dark bg-white fw-normal mt-1 mb-0 text-end py-2 px-3 border rounded text-decoration-none" :download="getfile.split('/').pop()"> <i class="bi bi-file-pdf-fill"></i> {{ truncateFilename(getfile) }} <i class="bi bi-cloud-arrow-down-fill"></i></a>
                                                            </p>
                                                        </template>
                                                        <div v-if=" new Date(getmessage.created_at).toISOString().split('T')[0] == new Date().toISOString().split('T')[0]">
                                                            <p class="fw-normal mt-1 mb-0" style="font-size: 13px;">
                                                                Message sent today  {{ new Date(getmessage.created_at).toLocaleTimeString('en-PH', { timeZone: 'Asia/Manila', hour12: false }) }}
                                                            </p>
                                                        </div>
                                                        <div v-else>
                                                            <p class="fw-normal mt-1 mb-0" style="font-size: 13px;">Message sent {{ new Date(getmessage.created_at).toISOString().split('T')[0] }}</p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <br>
                                            </template>
                                        </div>
                                    </template>
                                </div>
                                <div v-else class="d-flex justify-content-center align-items-center px-3 py-3" style="height: 365px;">
                                    <div class="text-center">
                                        <p class="fw-normal">No message history.</p>
                                    </div>
                                </div>
                                <div v-if="file_storage.length > 0" class="d-flex justify-content-center px-3 flex-wrap w-100 gap-2">
                                    <template v-for="(getfile, index) in file_storage" :key="index">
                                        <p class="fw-semibold py-2 px-3 border rounded mb-0" style="font-size: 13px;">{{ truncateFilename(getfile.name) }} <i class="bi bi-x-lg ms-2" style="cursor: pointer;" @click="fileremove(index)"></i></p>
                                    </template>
                                </div>
                                <div class="px-3 py-3 d-flex justify-content-center gap-2">
                                    <label for="openfile" style="cursor: pointer;"> <i class="bi bi-paperclip mt-1 fs-4"></i> </label>
                                    <input multiple type="file" id="openfile" @change="fileupload" accept="application/pdf" hidden>
                                    <textarea
                                        id="messagebox"
                                        ref="autoTextarea"
                                        v-model="message"
                                        class="form-control shadow-none px-3  w-75"
                                        placeholder="Write your message . . ."
                                        rows="1"
                                        @input="autoResize"
                                        style="overflow:hidden; resize:none; max-height: 90px; overflow-y: auto; scrollbar-width: thin;"
                                    ></textarea>
                                    <button @click="btnsendmessage" class="btn btn-primary w-auto " style="max-height: 35px;"><i class="bi bi-send-check-fill"></i></button>
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
import UserNavigationVue from '../Components/UserNavigation/UserNavigation.vue'
import { Link as inertiaLink } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
import { formatNumber } from 'chart.js/helpers';

export default {
    name: 'UserMessage',
    components: { UserNavigationVue, inertiaLink },
    props: {message_history:Array, userid:Number},
    data() {
        return {
            message: '',
            file_storage: []
        }
    },
    methods: {
        fileupload(event){
            const newFiles = Array.from(event.target.files)

            const totalFiles = this.file_storage.length + newFiles.length

            if (totalFiles > 3) {
                alert("You can only upload up to 3 files.")
                event.target.value = null
                return
            }

            this.file_storage = [...this.file_storage, ...newFiles]
            event.target.value = null
        },
        fileremove(index){
            this.file_storage.splice(index, 1);
        },
        truncateFilename(name) {
            if (!name) return '';
                const filename = name.split('/').pop();
                if (filename.length <= 15) return filename;
                return filename.slice(-15);
        },
        autoResize() {
            const textarea = this.$refs.autoTextarea
            if (!textarea) return

            textarea.style.height = 'auto'
            textarea.style.height = textarea.scrollHeight + 'px'
        },
        scrollToBottom() {
            this.$nextTick(() => {
                const containers = this.$refs.messageContainer
                if (Array.isArray(containers)) {
                    const last = containers[containers.length - 1]
                    if (last) last.scrollTop = last.scrollHeight
                } else if (containers) {
                    containers.scrollTop = containers.scrollHeight
                }
            })
        },
        btnsendmessage(){
            const data = {
                message: this.message,
                files: this.file_storage
            }

            if(this.message.trim() == '' && this.file_storage.length == []){
                document.getElementById('messagebox').focus();
            }else{
                router.post('/userstoremessage', data, {
                    onSuccess: () => {
                        this.message = '',
                        this.file_storage = []
                    }
                });
            }

        }
    },
    mounted() {
        this.autoResize()
        this.scrollToBottom();
    },
    watch:{
        message_history:{
            handler(newVal, oldVal) {
                this.$nextTick(() => {
                    const containers = this.$refs.messageContainer;
                    if (Array.isArray(containers)) {
                        const last = containers[containers.length - 1];
                        if (last) last.scrollTop = last.scrollHeight;
                    } else if (containers) {
                        containers.scrollTop = containers.scrollHeight;
                    }
                });
            },
            deep: true,
        }
    },

}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

section {
    font-family: "Poppins", sans-serif;
    padding: calc(10px + 1rem) 0;
    overflow-wrap: break-word;
}
.jobhov:hover {
    border: 1px solid black !important;
    transition: 0.5s;
}
</style>
