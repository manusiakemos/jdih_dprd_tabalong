<template>
  <div class="video-container">
      <iframe v-if="data" width="100%" :src="url" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
</template>

<script>
    export default {
        data(){
            return{
                data:''
            }
        },
        computed:{
            url(){
                if(this.data){
                    var v = this.data.value;
                    var res = v.replace("<p>", "");
                    var res = res.replace("</p>", "");
                    return `https://www.youtube.com/${res}`;
                }
            }
        },
        created(){
            this.getData()
        },
        methods:{
            getData(){
                this.axios.get('/api/web-setting/video-profile').then(res=>{
                    this.data = res.data.data;
                })
            }
        }
    }
</script>

<style scoped>
    .video-container iframe,
    .video-container object,
    .video-container embed {
        min-height: 60vh !important;
    }
</style>