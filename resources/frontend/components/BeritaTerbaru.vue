<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-6 text-center text-white text-uppercase mt-5 mb-3">Berita Terbaru</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4" v-for="value in lists.data">
                <div class="card card-news mb-3">
                    <img :src="value.gambar" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{value.judul}}</h5>
                        <div class="card-text" v-html="value.short_content"></div>
                        <p class="card-text"><small class="text-muted">{{value.created_at}}</small></p>
                        <p>
                            <router-link :to="value.slug" class="btn btn-dark card-btn">Baca Selanjutnya</router-link>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .card.bg-info, .card.bg-primary {
        height: 200px;
    }

    .card-btn {
        position: absolute;
        bottom: 15px;
    }

    .bg-gradient-primary {
        background: rgb(231, 69, 69);
        background: linear-gradient(180deg, rgba(231, 69, 69, 1) 0%, rgba(231, 69, 69, 1) 0%, rgba(255, 255, 255, 1) 100%);
    }

    .card-news {
        height: 500px;
    }
</style>

<script>
    export default {
        data(){
            return{
                lists:""
            }
        },
        created(){
            this.getData();
        },
        methods:{
            getData(){
                this.$http('/api/web-berita/terbaru').then(res=>{
                    this.lists = res.data;
                })
            }
        }
    }
</script>