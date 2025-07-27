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
                                            <input v-model="jobtitle" id="jobtitle" type="text" class="form-control shadow-none">
                                            <p class="fw-normal text-danger mb-0 mt-1" v-if="errors.jobtitle"> {{ errors.jobtitle }}</p>
                                        </div>
                                        <div class="text-start w-50">
                                            <label for="salary" class="form-label">Salary<span class="text-danger">*</span></label>
                                            <input v-model="salary" id="salary" type="text" class="form-control shadow-none">
                                            <p class="fw-normal text-danger mb-0 mt-1" v-if="errors.salary"> {{ errors.salary }}</p>
                                        </div>
                                    </div>


                                    <div class="d-flex gap-3 mt-3">
                                        <div class="text-start w-50">
                                            <label for="location" class="form-label">Location<span class="text-danger">*</span></label>
                                            <select v-model="location" class="form-select shadow-none">
                                                <option selected></option>
                                                <option value="San Fernando, Pampanga">San Fernando, Pampanga</option>
                                                <option value="Apalit, Pampanga">Apalit, Pampanga</option>
                                                <option value="Mexico, Pampanga">Mexico, Pampanga</option>
                                                <option value="Bacolor, Pampanga">Bacolor, Pampanga</option>
                                            </select>
                                            <p class="fw-normal text-danger mb-0 mt-1" v-if="errors.location"> {{ errors.location }}</p>
                                        </div>
                                        <div class="text-start w-50">
                                            <label for="type" class="form-label">Type<span class="text-danger">*</span></label>
                                            <select v-model="type" class="form-select shadow-none">
                                                <option selected></option>
                                                <option value="Full-time">Full-time</option>
                                                <option value="Part-time">Part-time</option>
                                            </select>
                                            <p class="fw-normal text-danger mb-0 mt-1" v-if="errors.type"> {{ errors.type }}</p>
                                        </div>
                                    </div>


                                    <div class="text-start mt-3">
                                        <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                                        <textarea v-model="description" class="form-control shadow-none"  style="height: 100px" ></textarea>
                                        <p class="fw-normal text-danger mb-0 mt-1" v-if="errors.description"> {{ errors.description }}</p>
                                    </div>

                                    <div class="text-start mt-3">
                                        <label for="interview" class="form-label">Job Qualification<span class="text-danger">*</span></label>
                                        <template v-for="(inputqualification, index) in qualification_array" :key="index">
                                            <div class="d-flex gap-2 mt-2">
                                                <input v-model="inputqualification.qualification" id="interview" type="text" class="form-control shadow-none">
                                                <i @click="DeleteQualification(index)" v-if="index > 0" class="bi bi-dash-circle-fill text-danger fs-6 mt-2" style="cursor: pointer;"></i>
                                            </div>
                                            <p class="fw-normal text-danger mb-0 mt-1" v-if="errors[`job_qualification.${index}.qualification`]">The qualification input {{ index + 1 }} field is required</p>
                                        </template>
                                    </div>
                                    <div class="text-end">
                                        <button @click="AddQualification" class="btn btn-secondary mt-3">Add Qualification</button>
                                    </div>

                                    <div class="text-start mt-3">
                                        <label for="interview" class="form-label">Interview Questions<span class="text-danger">*</span></label>
                                        <template v-for="(inputquestion, index) in interview_array" :key="index">
                                            <div class="d-flex gap-2 mt-2">
                                                <input v-model="inputquestion.question" id="interview" type="text" class="form-control shadow-none">
                                                <i @click="DeleteQuestion(index)" v-if="index > 0" class="bi bi-dash-circle-fill text-danger fs-6 mt-2" style="cursor: pointer;"></i>
                                            </div>
                                            <p class="fw-normal text-danger mb-0 mt-1" v-if="errors[`interview_questions.${index}.question`]">The interview question {{ index + 1 }} field is required</p>
                                        </template>
                                    </div>
                                    <div class="text-end">
                                        <button @click="AddQuestion" class="btn btn-secondary mt-3">Add Question</button>
                                    </div>
                            </div>
                            <div class="text-start mt-3 d-lg-block d-none">
                                <button @click="btnCreateJob" class="btn btn-primary px-4 rounded">Create</button>
                                <button @click="btnCancel" class="btn btn-outline-secondary px-4 rounded mx-3">Cancel</button>
                            </div>
                        </div>
                        <div class="col-lg-5 mt-3">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <div class="text-start">
                                    <h6 class="fw-semibold pb-2 border-bottom">Status</h6>

                                    <div class="form-check form-switch bg-transparent mb-1 mt-3">
                                        <input v-model="status" class="form-check-input shadow-none " type="checkbox" id="stats" checked  />
                                        <label class="form-check-label" for="stats">Available</label>
                                    </div>

                                    <p class="fw-normal text-secondary mt-3" style="font-size: 13px;">Check this box to indicate that the job is available. If the box is not checked, the job will be marked as unavailable.</p>
                                </div>
                            </div>
                            <div class="text-start mt-3 d-lg-none d-block">
                                <button @click="btnCreateJob" class="btn btn-primary px-4 rounded">Create</button>
                                <button @click="btnCancel" class="btn btn-outline-secondary px-4 rounded mx-3">Cancel</button>
                            </div>
                        </div>


                    </div>
                </section>
                <jobcreatedVue v-if="showpopup" />
            </main>
        </div>
    </div>
</template>

<script>
import AdminNavigation from '../Components/AdminNavigation/AdminNavigation.vue';
import {router} from '@inertiajs/vue3'
import jobcreatedVue from '../Components/popup_pages/jobcreated.vue';

export default {
    name:'AdminCreateJob',
    components: {AdminNavigation, jobcreatedVue},
    props:{ errors:Object },
    data(){
        return{
            jobtitle: '',
            salary: '',
            location: '',
            type: '',
            description: '',
            status: true,
            interview_array: [
                {question: ''}
            ],
            qualification_array: [
                {qualification: ''}
            ],

            showpopup: false
        }
    },
    methods:{
        AddQuestion(){
            this.interview_array.push({
                question: ''
            });
        },
        AddQualification(){
            this.qualification_array.push({
                qualification: ''
            });
        },
        DeleteQuestion(index){
            this.interview_array.splice(index, 1);
        },
        DeleteQualification(index){
            this.qualification_array.splice(index, 1);
        },
        btnCreateJob(){
            const data = {
                jobtitle: this.jobtitle,
                salary: this.salary,
                location: this.location,
                type: this.type,
                description: this.description,
                status: this.status,
                interview_questions: this.interview_array,
                job_qualification: this.qualification_array
            }
            router.post('/createnewjob', data, {
                onSuccess: () => {
                    console.log('Job created successfully!');
                    this.showpopup = !this.showpopup
                },
                onError: (errors) => {
                    console.log('Validation failed:', errors);
                }
            });
        },
        btnCancel(){
            router.visit('/admin/jobs');
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
