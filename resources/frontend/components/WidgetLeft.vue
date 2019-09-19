<template>
    <div class="row">
        <div class="col-lg-12">
            <arsip-terbaru class="pt-5"></arsip-terbaru>
        </div>
        <div class="col-lg-12">
            <arsip-terpopuler></arsip-terpopuler>
        </div>
    </div>
</template>

<script>
    import ArsipTerbaru from "../components/ArsipTerbaru"
    import ArsipTerpopuler from "../components/ArsipTerpopuler"
    export default {
        components:{
            ArsipTerbaru, ArsipTerpopuler
        }
    }
</script>