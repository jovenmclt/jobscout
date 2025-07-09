<template>
    <div class="container-fluid">
        <div class="row p-0 justify-content-center">
            <main class="col-12">
                <section class="section1">
                    <div class="row justify-content-center vh-100">
                        <div class="col-lg-6 col-12 d-flex align-items-center justify-content-center">
                            <div class="text-start">
                                <h3 class="fw-bold">Sign up account</h3>
                                <p class="fw-normal">Lorem ipsum dolor sit amet consectetur </p>
                                <form action="">
                                    <label for="Fullname" class="form-label">Fullname:</label>
                                    <input id="Fullname" type="text" class="form-control shadow-none rounded-5 w-100 ">

                                    <label for="Email" class="form-label mt-3">Email:</label>
                                    <input id="Email" type="email" class="form-control shadow-none rounded-5 w-100 ">

                                    <label for="Password" class="form-label mt-3">Password:</label>
                                    <input id="Password" type="password" class="form-control shadow-none rounded-5 w-100">

                                    <label for="ConfirmPassword" class="form-label mt-3">Confirm Password:</label>
                                    <input id="ConfirmPassword" type="password" class="form-control shadow-none rounded-5 w-100">

                                    <br>
                                    <button class="btn btn-primary w-100">Sign up</button>
                                </form>
                                <div class="text-center mt-3">
                                    <p class="fw-normal">Already a member?
                                        <a href="#">Log in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-lg-flex justify-content-center align-items-center d-none" style="background-color: #FAFAFA;">
                            <div class="text-center">
                                <img src="../Components/Assets/Logo.png" width="500" alt="">
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</template>

<script>
export default {
    name: 'RegisterAccount'
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

section{
    font-family: "Poppins", sans-serif;
    overflow-wrap: break-word;
}

</style>
