<template>
    <div class="container-xxl">
        <div class="row pe-xl-3">
            <UserNavigation />
            <main class="col-lg-10 col-md-9 col-12 ms-auto">
                <br class="d-md-block d-none"><br class="d-md-block d-none">
                <section id="section1">
                    <div class="row justify-content-start">


                        <div class="text-start mt-3">
                            <span class="fw-normal text-secondary">Jobs > Details</span>
                        </div>
                        <div class="col-lg-5 mt-3">
                            <div class="text-center mt-5">
                                <h3 class="fw-semibold">Kitchen Manager</h3>
                                <button class="btn btn-primary w-50">Apply Now</button>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <div class="d-flex justify-content-between bg-white rounded shadow-sm border py-3 px-3">
                                <div class="text-start">
                                    <p class="fw-normal mb-0">Job Position</p>
                                    <h6 class="fw-semibold">Kitchen Manager</h6>
                                    <br>
                                    <p class="fw-normal mb-0">Salary</p>
                                    <h6 class="fw-semibold">₱18,000</h6>
                                </div>
                                <div class="text-start">
                                    <p class="fw-normal mb-0">Branch</p>
                                    <h6 class="fw-semibold">San Fernando, Pampanga</h6>
                                    <br>
                                    <p class="fw-normal mb-0">Type</p>
                                    <h6 class="fw-semibold">Full-time</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <section id="jobdescription">
                    <div class="row justify-content-center">



                        <div class="col-lg-12">
                            <div class="bg-white py-3 px-3 rounded shadow-sm border">
                                <div class="text-start border-bottom">
                                    <h6 class="fw-semibold">Job Desciption & Qualifications</h6>
                                </div>
                                <div class="text-start mt-3">
                                    <p class="fw-normal text-secondary">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non, alias. Nesciunt commodi quos placeat quaerat numquam repellat facilis ut ex corrupti aut, sed quam consectetur ipsum provident corporis odit quia? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate soluta animi incidunt rem eos minima molestiae, quos facere laborum reprehenderit, corrupti voluptate consequatur nobis repudiandae eveniet delectus odit nesciunt! Soluta! Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam impedit vero dolore molestiae quasi minima sit, eaque est obcaecati, aperiam facere enim iste, reprehenderit non eius. Nisi suscipit corrupti voluptatibus! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo tempora incidunt iste officiis culpa nobis dolorum quam ab, repellat officia ratione sint consequatur qui, aliquid et ex dolorem id fugiat.</p>
                                </div>
                            </div>
                            <div class="text-end mt-3">
                                <button class="btn btn-outline-secondary px-4">Cancel</button>
                            </div>
                        </div>



                    </div>
                </section>
            </main>
        </div>
    </div>
</template>

<script>
import UserNavigation from '../Components/UserNavigation/UserNavigation.vue';
export default {
    name: 'UserJobDetails',
    components: {UserNavigation}
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
