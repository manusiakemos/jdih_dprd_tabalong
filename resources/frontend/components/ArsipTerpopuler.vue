<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="display-6 text-center text-dark text-uppercase mt-5 mb-3">Produk Hukum Terpopuler</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" v-for="value in lists">
                <arsip-card :value="value"></arsip-card>
            </div>
        </div>
    </div>
</template>

<script>
    import ArsipCard from "./ArsipCard";
    export default {
        components:{
            ArsipCard
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
                this.$http('/api/terpopuler').then(res=>{
                    this.lists = res.data;
                })
            }
        }
    }
</script>