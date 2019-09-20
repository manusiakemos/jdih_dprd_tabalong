<template>
    <div>
        <gallery :images="images" :index="index" @close="index = null"></gallery>
        <div class="card-columns">
            <div
                    class="card card-transparent"
                    v-for="(image, imageIndex) in images"
                    :key="imageIndex"
                    @click="index = imageIndex">
                <div class="card-body">
                    <img loading="lazy" :src="image" alt="gambar" class="img img-fluid" style="max-height: 400px">
                </div>
            </div>
        </div>

    </div>
</template>

<style scoped>
    .card-transparent {
        background: transparent !important;
        border: none !important;
        box-shadow: none !important;
    }
    .card-transparent .card-body{
        padding: 0 !important;
        margin: 0 !important;
    }
</style>

<script>
    import VueGallery from 'vue-gallery';

    export default {
        data() {
            return {
                images: [],
                index: null
            };
        },
        created(){
          this.getData();
        },

        methods:{
            getData(){
                this.axios.get('/api/web-gallery').then(res=>{
                    res.data.data.forEach(v=>{
                        this.images.push(v.gal_filename);
                    })
                })
            }
        },

        components: {
            'gallery': VueGallery
        },
    }
</script>
