<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="display-6 text-center text-uppercase mt-5 mb-3">Berita Terbaru</h2>
            </div>
        </div>

        <div class="row card-columns">
            <div class="col-md-12" v-for="value in lists.data">
                <card-news :value="value"></card-news>
            </div>
        </div>
    </div>

</template>

<script>
    import CardNews from "../components/CardNews";
    export default {
        components:{
          CardNews
        },
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