<template>
    <section id="popup_jobcreated" class="popup-css px-3 py-3">
        <div class="row justify-content-center " style="width: 85%; max-width: 1000px;">


            <div class="col-12">
                <div class="bg-white py-2 px-2 rounded shadow">
                    <iframe :src="`/storage/${resume_path}`" style="height: 550px; width: 100%; border: none;" ></iframe>
                </div>
                <button @click="btnclosepreview" class="btn btn-secondary w-100 rounded-0"><i class="bi bi-x-lg"></i> Close Preview</button>
            </div>


        </div>
    </section>
</template>

<script>
export default {
    name: 'userresume',
    props:{userinfo:Object},
    data(){
        return{
            resume_path: this.userinfo ? this.userinfo.resume_path : ''
        }
    },
    methods:{
        btnclosepreview(){
            this.$emit('closepreviewresume');
        }
    }
}
</script>


<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

.popup-css{
    height: 100vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 2;
    font-family: "Poppins", sans-serif;
    overflow-wrap: break-word;
    background-color: rgba(82, 83, 85, 0.5);
}
</style>
