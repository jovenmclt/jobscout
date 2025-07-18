<template>
    <section id="editprofile" class="contaniner-settings">
        <div class="row jusitfy-content-center px-3">



            <div class="col-auto" >
                <div class="bg-white py-3 px-3 rounded border shadow-sm" style="max-height: 600px; overflow-y: auto; scrollbar-width: thin;">
                    <div class="text-end">
                        <i @click="btncloseedit" style="cursor: pointer;" class="bi bi-x-lg"></i>
                    </div>
                    <div class="text-start">
                        <h5 class="fw-semibold">Edit Profile</h5>
                        <br>
                        <div class="d-flex flex-md-nowrap flex-wrap gap-3">
                            <div class="text-start w-100">
                                <label for="profile" class="form-label">Profile<span class="text-danger">*</span></label>
                                <input id="profile" type="file" class="form-control shadow-none">
                            </div>
                            <div class="text-start w-100">
                                <label for="Name" class="form-label">Name<span class="text-danger">*</span></label>
                                <input id="Name" type="text" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="d-flex gap-3 mt-3 flex-md-nowrap flex-wrap">
                            <div class="text-start w-100">
                                <label for="Location" class="form-label">Location<span class="text-danger">*</span></label>
                                <input id="Location" type="text" class="form-control shadow-none">
                            </div>
                            <div class="text-start w-100">
                                <label for="age" class="form-label">Age<span class="text-danger">*</span></label>
                                <input id="age" type="text" class="form-control shadow-none">
                            </div>
                            <div class="text-start w-100">
                                <label for="Gender" class="form-label">Gender<span class="text-danger">*</span></label>
                                <input id="Gender" type="text" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="text-start w-100 mt-3">
                            <label for="About" class="form-label">About<span class="text-danger">*</span></label>
                            <textarea id="About" class="form-control shadow-none"  style="height: 100px" ></textarea>
                        </div>
                        <div class="d-flex gap-3 mt-3 flex-md-nowrap flex-wrap">
                            <div class="text-start w-100">
                                <label for="educ" class="form-label">Educational Attainment<span class="text-danger">*</span></label>
                                <input id="educ" type="text" class="form-control shadow-none">
                            </div>
                            <div class="text-start w-100">
                                <label for="cv" class="form-label" style="font-size: 14px;">Curriculum Vitae (CV)<span class="text-danger">*</span></label>
                                <input type="file" class="form-control shadow-none">
                            </div>
                            <div class="text-start w-100">
                                <label for="cv" class="form-label" style="font-size: 14px;">Resume<span class="text-danger">*</span></label>
                                <input type="file" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="text-start w-100 mt-3">
                            <label for="Experience" class="form-label">Experience<span class="text-danger">*</span></label>
                            <textarea id="Experience" class="form-control shadow-none"  style="height: 100px" ></textarea>
                        </div>
                        <div class="text-end mt-3 mb-3">
                            <button class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>
</template>

<script>
export default {
    name: 'EditProfile',
    data(){
        return{

        }
    },
    methods:{
        btncloseedit(){
            this.$emit('closeedit');
        }
    }
}
</script>

<style>
.contaniner-settings{
    height: 100Vh;
    min-width: 100%;
    z-index: 1;
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(123, 123, 124, 0.5);
}
</style>
