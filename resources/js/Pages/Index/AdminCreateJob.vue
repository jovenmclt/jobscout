<template>
    <div class="container-xxl bg-color">
        <div class="row pe-xl-3">
            <AdminNavigation />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section">
                    <div class="row justify-content-start">


                        <div class="text-start mt-3">
                            <span class="fw-normal text-secondary">Job > Create</span>
                            <br>
                            <h4 class="fw-semibold mt-2">Create Job</h4>
                        </div>
                        <div class="col-lg-7 mt-3">
                            <div class="bg-white py-3 px-3 shadow-sm border rounded">
                                    <div class="d-flex gap-3">
                                        <div class="text-start w-50">
                                            <label for="jobtitle" class="form-label">Job Title<span class="text-danger">*</span></label>
                                            <input id="jobtitle" type="text" class="form-control shadow-none">
                                        </div>
                                        <div class="text-start w-50">
                                            <label for="salary" class="form-label">Salary<span class="text-danger">*</span></label>
                                            <input id="salary" type="text" class="form-control shadow-none">
                                        </div>
                                    </div>


                                    <div class="d-flex gap-3 mt-3">
                                        <div class="text-start w-50">
                                            <label for="location" class="form-label">Location<span class="text-danger">*</span></label>
                                            <input id="location" type="text" class="form-control shadow-none">
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


                                    <div class="text-start mt-3">
                                        <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                                        <textarea class="form-control shadow-none"  style="height: 100px" ></textarea>
                                    </div>


                                    <div class="text-start mt-3">
                                        <label for="interview" class="form-label">Interview Questions<span class="text-danger">*</span></label>
                                        <template v-for="(getquestion, index) in interview_array" :key="index">
                                            <div class="d-flex gap-2 mt-2">
                                                <i @click="DeleteQuestion(index)" v-if="index > 0" class="bi bi-dash-circle-fill text-danger fs-6 mt-2" style="cursor: pointer;"></i>
                                                <input v-model="getquestion.question" id="interview" type="text" class="form-control shadow-none">
                                            </div>
                                        </template>
                                    </div>
                                    <div class="text-end">
                                        <button @click="AddQuestion" class="btn btn-secondary mt-3">Add Question</button>
                                    </div>
                            </div>
                            <div class="text-start mt-3 d-lg-block d-none">
                                <button class="btn btn-primary px-4 rounded">Create</button>
                                <button class="btn btn-outline-secondary px-4 rounded mx-3">Cancel</button>
                            </div>
                        </div>
                        <div class="col-lg-5 mt-3">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <div class="text-start">
                                    <h6 class="fw-semibold pb-2 border-bottom">Status</h6>

                                    <div class="form-check form-switch bg-transparent mb-1 mt-3">
                                        <input class="form-check-input shadow-none " type="checkbox" id="stats" checked v-model="status" />
                                        <label class="form-check-label" for="stats">Available</label>
                                    </div>

                                    <p class="fw-normal text-secondary mt-3" style="font-size: 13px;">Check this box to indicate that the job is available. If the box is not checked, the job will be marked as unavailable.</p>
                                </div>
                            </div>
                            <div class="text-start mt-3 d-lg-none d-block">
                                <button class="btn btn-primary px-4 rounded">Create</button>
                                <button class="btn btn-outline-secondary px-4 rounded mx-3">Cancel</button>
                            </div>
                        </div>


                    </div>
                </section>
            </main>
        </div>
    </div>
</template>

<script>
import AdminNavigation from '../Components/AdminNavigation/AdminNavigation.vue';
export default {
    name:'AdminCreateJob',
    components: {AdminNavigation},
    data(){
        return{
            interview_array: [
                {question: ''}
            ]
        }
    },
    methods:{
        AddQuestion(){
            this.interview_array.push({
                question: ''
            });
        },
        DeleteQuestion(index){
            this.interview_array.splice(index, 1);
        }
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
