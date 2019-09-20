<template>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators"
                v-for="(v,i) in lists"
                :data-slide-to="i"
                :class="i == 0 ? 'active' : ''"></li>
        </ol>
        <div class="carousel-inner">
            <div
                    v-for="(v,i) in lists"
                    :class="i == 0 ? 'carousel-item active' : 'carousel-item'">
                <img class="d-block w-100" height="400px" :src="v.slide_gambar" alt="First slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                lists: ''
            }
        },
        created() {
            this.getData();
        },
        methods: {
            getData() {
                this.axios.get('api/web-slider').then(res => {
                    this.lists = res.data;
                })
            },
        },
    }
</script>