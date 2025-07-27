<template>
    <div class="container-xxl bg-color">
        <div class="row pe-xl-3">
            <UserNavigationVue />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">


                        <div class="text-start mt-3">
                            <span class="fw-normal text-secondary">Jobs > Interview</span>
                            <br>
                            <h4 class="fw-semibold mt-3">Interview: {{ jobtitle }}</h4>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <div class="d-flex justify-content-between gap-3 bg-white py-4 px-3 rounded shadow-sm border">
                                 <div class="text-start">
                                    <p class="fw-normal mb-0">Job Position</p>
                                    <h6 class="fw-semibold">{{ jobtitle }}</h6>
                                    <br>
                                    <p class="fw-normal mb-0">Salary</p>
                                    <h6 class="fw-semibold">₱ {{ salary }}</h6>
                                </div>
                                <div class="text-start">
                                    <p class="fw-normal mb-0">Branch</p>
                                    <h6 class="fw-semibold">{{ location }}</h6>
                                    <br>
                                    <p class="fw-normal mb-0">Type</p>
                                    <h6 class="fw-semibold">{{ type }}</h6>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-6 mt-3">
                            <div class="bg-white rounded shadow-sm border py-3 px-3">

                                <label for="cv" class="form-label" style="font-size: 14px;">Curriculum Vitae (CV)<span class="text-danger">*</span></label>
                                <input @change="uploadCv" type="file" class="form-control shadow-none">
                                <p class="fw-normal text-danger mb-0 mt-2" v-if="errors.cv_path">{{ errors.cv_path }}</p>

                                <label for="cv" class="form-label mt-2" style="font-size: 14px;">Resume<span class="text-danger">*</span></label>
                                <input @change="uploadResume" type="file" class="form-control shadow-none">
                                <p class="fw-normal text-danger mb-0 mt-2" v-if="errors.resume_path">{{ errors.resume_path }}</p>

                            </div>
                        </div>

                    </div>
                </section>
                <section id="interviewquestion">
                    <div class="row justify-content-center">


                        <div class="col-lg-12 ">
                            <template v-for="(getinterview, index) in interview_array" :key="index">
                                <div class="bg-white rounded shadow-sm border py-3 px-3 mt-3">
                                    <p class="fw-normal border-bottom py-2">Can you tell us about your experience in the food or dessert industry?</p>
                                    <textarea v-model="getinterview.answer" class="form-control shadow-none" placeholder="Answer. . ."  style="height: 130px" ></textarea>
                                    <p class="fw-normal text-danger mb-0 mt-2 ms-2" v-if="errors[`interview.${index}.answer`]">Please answer question {{ index + 1 }}</p>
                                </div>
                            </template>
                            <div class="text-end mt-3">
                                <button @click="btnSubmitApplication" class="btn btn-primary rounded">Submit Answers</button>
                                <button @click="btnCancel" class="btn btn-outline-secondary rounded px-3 mx-3">Cancel</button>
                            </div>
                        </div>



                    </div>
                </section>
                <jobapplication v-if="show_popup"/>
            </main>
        </div>
    </div>
</template>

<script>
import UserNavigationVue from '../Components/UserNavigation/UserNavigation.vue'
import {router} from '@inertiajs/vue3'
import jobapplication from '../Components/popup_pages/jobapplication.vue'
export default {
    name:'UserJobsInterview',
    components:{UserNavigationVue, jobapplication},
    props: {job_data:Object, interview_question:Array, errors:Object},
    data(){
        return{
            jobid: this.job_data ? this.job_data.id : '',
            jobtitle: this.job_data ? this.job_data.job_title : '',
            salary: this.job_data ? this.job_data.salary : '',
            location: this.job_data ? this.job_data.location : '',
            type: this.job_data ? this.job_data.type : '',

            interview_array: [
                {question_id: '', question: '', answer: ''}
            ],

            resume_file: null,
            cv_file: null,

            show_popup: false
        }
    },
    methods: {
        uploadResume(event){
            this.resume_file = event.target.files[0];
        },
        uploadCv(event){
            this.cv_file = event.target.files[0];
        },
        retrieveInterview(){
            if(this.interview_question.length > 0){

                this.interview_array = [];

                for(let i = 0; i < this.interview_question.length; i++){
                    this.interview_array.push({
                        question_id: this.interview_question[i].id,
                        question: this.interview_question[i].question,
                        answer: '',

                    });
                }

            }
        },
        btnSubmitApplication(){
            const data = {
                job_id: this.jobid,
                interview: this.interview_array,
                resume_path: this.resume_file,
                cv_path: this.cv_file
            }
            router.post('/submitapplication', data, {
                onSuccess: () => {
                    console.log('Application submit successfully!');
                    this.show_popup = !this.show_popup
                },
                onError: (errors) => {
                    console.log('Validation failed:', errors);
                }
            });
        },
        btnCancel(){
            router.visit('/user/jobs');
        }
    },
    mounted(){
        this.retrieveInterview();

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
