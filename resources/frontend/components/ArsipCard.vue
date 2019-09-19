<template>
    <div class="card bg-info text-white mb-2">
        <div class="card-header">
            <h5 class="card-title">{{value.label}}</h5>
        </div>
        <div class="card-body">
            <h5 class="display-6">{{ value.judul }}</h5>
            <hr>
            <div v-show="show" v-html="value.deskripsi"></div>
           <div class="d-flex d-inline-block">
               <!--<a href="#" class="btn btn-primary text-white mr-3" v-on:click.prevent="lihat">Lihat Deskripsi</a>-->
               <a :href="value.url_download" class="btn btn-dark card-btn" target="_blank">Download PDF <span class="fa fa-file-pdf"></span></a>
           </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['value'],
        data(){
            return {
                show:true,
            }
        },
        methods:{
            lihat(){

            }
        }
    }
</script>