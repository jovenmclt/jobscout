    <template>
        <div class="container-xxl bg-color min-vh-100">
            <div class="row pe-xl-3">
                <AdminNavigation :check_unread="check_unread"/>
                <main class="col-lg-10 col-md-9 col-12 ms-auto">
                    <br class="d-md-block d-none"><br class="d-md-block d-none">

                    <section id="sec1">
                        <div class="row justify-content-center">

                            <div class="col-xl-12 mt-4">
                                <div id="reportdiv" class="bg-white py-3 px-3 rounded border shadow-sm">

                                    <div class="text-start">
                                        <h5 class="fw-bold" style="color: #5A81FA;">Sweet Treats PH</h5>
                                    </div>

                                    <br>

                                    <div class="text-center ">
                                        <h2 class="fw-bold">Job Position</h2>
                                        <p class="fw-normal mb-2" style="font-size: 14px;">This report highlights the job openings offered by Sweet Treats PH throughout the year, reflecting the restaurant’s <br> efforts to expand its workforce and support its growing operations.</p>
                                        <p class="fw-semibold">Offical Report Year : {{ selected_year }}</p>
                                    </div>

                                    <div class="text-start">
                                        <div class="table-responsive mt-4">
                                            <table class="table table-borderless" >
                                                <thead>
                                                    <tr >
                                                        <th scope="col" class="fw-semibold text-dark"></th>
                                                        <th scope="col" class="fw-semibold text-dark"></th>
                                                        <th scope="col" class="fw-semibold text-dark">Job title</th>
                                                        <th scope="col" class="fw-semibold text-dark">Location</th>
                                                        <th scope="col" class="fw-semibold text-dark">Salary</th>
                                                        <th scope="col" class="fw-semibold text-dark">Type</th>
                                                        <th scope="col" class="fw-semibold text-dark">Status</th>
                                                        <th scope="col" class="fw-semibold text-dark">Created</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(getjob, index) in joblist" :key="index">
                                                        <td class="fw-normal text-dark" style="font-size: 15px;"></td>
                                                        <td class="fw-normal text-dark" style="font-size: 15px;">{{ index + 1 }}</td>
                                                        <td class="fw-normal text-dark" style="font-size: 15px;">{{ getjob?.job_title ?? '---'}}</td>
                                                        <td class="fw-normal text-dark" style="font-size: 15px;">{{ getjob?.location ?? '---' }}</td>
                                                        <td class="fw-normal text-dark" style="font-size: 15px;">₱{{ formatSalary(getjob?.salary ?? '---')}}</td>
                                                        <td class="fw-normal text-dark" style="font-size: 15px;">{{ getjob?.type ?? '---' }}</td>
                                                        <td v-if="getjob.status == true" class="fw-normal text-dark" style="font-size: 15px;">Available</td>
                                                        <td v-else class="fw-normal text-dark" style="font-size: 15px;">Closed</td>
                                                        <td class="fw-normal text-dark" style="font-size: 15px;">{{ new Date(getjob?.created_at ?? '---').toLocaleDateString('en-US', { year: 'numeric', month: 'long', day:'numeric'})  }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                    <div class="text-start">
                                        <p class="fw-semibold mb-1" style="font-size: 14px;">Total Jobs Position: {{ joblist.length }}</p>
                                        <p class="fw-semibold mb-1" style="font-size: 14px;">Total Available: {{ jobavailable }}</p>
                                        <p class="fw-semibold" style="font-size: 14px;">Total Closed: {{ jobclosed }}</p>
                                    </div>

                                    <div style="position: fixed; bottom: 20px; right: 30px;">
                                        <lord-icon
                                            v-if="showloading"
                                            src="https://cdn.lordicon.com/wpequvda.json"
                                            trigger="loop"
                                            state="loop-transparency"
                                            colors="primary:#1663c7"
                                            style="width:40px;height:40px">
                                        </lord-icon>
                                        <i v-else @click="btndownloadreport" style="cursor: pointer;" class="bi bi-file-earmark-arrow-down-fill fs-2 text-primary"></i>
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
    import AdminNavigation from '../Components/AdminNavigation/AdminNavigation.vue';
    import {Link as inertiaLink} from '@inertiajs/vue3'
    import html2pdf from 'html2pdf.js'
    export default {
        name: 'AdminJobpostReport',
        components: {AdminNavigation, inertiaLink},
        props: {joblist:Array, check_unread:Boolean, jobavailable:Number, jobclosed:Number, selected_year:String},
        data(){
            return{
                showloading: false
            }
        },
        methods:{
            btndownloadreport(){

                this.showloading = true;
                let count = 0;
                const intervalId = setInterval(() => {

                    count++;

                    if (count === 3) {
                        this.html2pdf();
                        this.showloading = false;
                        clearInterval(intervalId);
                    }
                }, 1000);
            },
            html2pdf(){
                const element = document.getElementById('reportdiv');

                const originalFontSize = element.style.fontSize;
                element.style.fontSize = "13px";

                element.classList.remove("border");
                html2pdf()
                    .set({
                        margin: 5,
                        filename: `Jobscout_jobposition_report.pdf`,
                        image: { type: 'jpeg', quality: 0.98 },
                        html2canvas: { scale: 5, backgroundColor: '#ffffff', useCORS: true },
                        jsPDF: { unit: 'mm', format: 'a3', orientation: 'portrait' }
                    })
                    .from(element)
                    .save()
                    .then(() => {
                        element.style.fontSize = originalFontSize;
                        element.classList.add("border");
                    });
            },
            formatSalary(value) {
                if (value == null || value === '') return '---';
                return Number(value).toLocaleString();
            },
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

    thead th {
        white-space: nowrap;
        font-family: "Poppins", sans-serif;
    }

    tbody td {
        white-space: nowrap;
        font-family: "Poppins", sans-serif;
    }
    </style>
