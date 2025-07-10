<template>
    <div class="container-xxl">
        <div class="row">
            <AdminNavigation />

        </div>
    </div>
</template>

<script>
import AdminNavigation from '../Components/AdminNavigation/AdminNavigation.vue';
export default {
    name: 'AdminDashboard',
    components: {AdminNavigation}
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

section{
    font-family: "Poppins", sans-serif;
    padding: calc(65px + 1rem) 0;
    overflow-wrap: break-word;
}

</style>
