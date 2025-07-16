<template>
    <div class="container-xxl">
        <div class="row pe-xl-3">
            <AdminNavigationVue />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">


                        <div class="text-start mt-3">
                            <span class="fw-normal text-secondary">Members > Edit</span>
                            <br>
                            <h4 class="fw-semibold mt-2">Edit Member</h4>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <div class="bg-white py-3 px-3 shadow-sm rounded border">
                                <div class="text-start">

                                    <h6 class="fw-semibold">Personal</h6>
                                    <div class="d-flex gap-3 mt-3">
                                        <div class="text-start w-50">
                                            <label for="profile" class="form-label">Profile<span class="text-danger">*</span></label>
                                            <input id="profile" type="file" class="form-control shadow-none">
                                        </div>
                                        <div class="text-start w-25">
                                            <label for="age" class="form-label">Age<span class="text-danger">*</span></label>
                                            <input id="age" type="text" class="form-control shadow-none">
                                        </div>
                                        <div class="text-start w-25">
                                            <label for="gender" class="form-label">Gender<span class="text-danger">*</span></label>
                                            <input id="gender" type="text" class="form-control shadow-none">
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 mt-3">
                                        <div class="text-start w-50">
                                            <label for="location" class="form-label">Location<span class="text-danger">*</span></label>
                                            <input id="location" type="text" class="form-control shadow-none">
                                        </div>
                                        <div class="text-start w-50">
                                            <label for="educ" class="form-label">Educational Attainment<span class="text-danger">*</span></label>
                                            <input id="educ" type="text" class="form-control shadow-none">
                                        </div>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="about" class="form-label">About<span class="text-danger">*</span></label>
                                        <textarea id="about" class="form-control shadow-none"  style="height: 100px" ></textarea>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="exp" class="form-label">Experience<span class="text-danger">*</span></label>
                                        <textarea id="exp" class="form-control shadow-none"  style="height: 100px" ></textarea>
                                    </div>
                                    <div class="text-start mt-3">
                                        <label for="resume" class="form-label">Resume<span class="text-danger">*</span></label>
                                        <input id="resume" type="file" class="form-control shadow-none">
                                    </div>

                                    <br><br>
                                    <h6 class="fw-semibold">Job Position</h6>
                                    <div class="d-flex gap-3 mt-3">
                                        <div class="text-start w-50">
                                            <label for="job" class="form-label">Job<span class="text-danger">*</span></label>
                                            <input id="job" type="text" class="form-control shadow-none">
                                        </div>
                                        <div class="text-start w-50">
                                            <label for="branch" class="form-label">Location<span class="text-danger">*</span></label>
                                            <input id="branch" type="text" class="form-control shadow-none">
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 mt-3">
                                        <div class="text-start w-50">
                                            <label for="salary" class="form-label">Salary<span class="text-danger">*</span></label>
                                            <input id="salary" type="text" class="form-control shadow-none">
                                        </div>
                                        <div class="text-start w-50">
                                            <label for="type" class="form-label">Type<span class="text-danger">*</span></label>
                                            <select class="form-select shadow-none">
                                                <option selected></option>
                                                <option value="Full-time">Full-time</option>
                                                <option value="Part-time">Part-time</option>
                                            </select>
                                        </div>
                                    </div>

                                    <br><br>
                                    <h6 class="fw-semibold">Account</h6>
                                    <div class="d-flex gap-3 mt-3">
                                        <div class="text-start w-50">
                                            <label for="name" class="form-label">Full Name<span class="text-danger">*</span></label>
                                            <input id="name" type="text" class="form-control shadow-none">
                                        </div>
                                        <div class="text-start w-50">
                                            <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                                            <input id="email" type="email" class="form-control shadow-none">
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 mt-3">
                                        <div class="text-start w-50">
                                            <label for="pass" class="form-label">Previous Password<span class="text-danger">*</span></label>
                                            <input id="pass" type="password" class="form-control shadow-none">
                                        </div>
                                        <div class="text-start w-50">
                                            <label for="confirmpass" class="form-label">New Password<span class="text-danger">*</span></label>
                                            <input id="confirmpass" type="password" class="form-control shadow-none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end my-4">
                                <button class="btn btn-primary">Save changes</button>
                                 <button class="btn btn-outline-secondary mx-2">Cancel</button>
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
    name: 'AdminEditMember',
    components: {AdminNavigationVue}
}
</script>

<style>

</style>
