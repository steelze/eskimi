<template>
    <div class="container-fluid">
        <div class="row">
            <Navbar />
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
import Navbar from './Components/Navbar.vue';

export default {
    name: 'App',
    components: {
        Navbar,
    },
}
</script>
