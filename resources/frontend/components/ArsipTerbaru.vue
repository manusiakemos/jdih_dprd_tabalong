<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5 class="display-6 text-uppercase mb-3">
                    <span class="my-border text-dark">
                        Produk Hukum Terbaru
                    </span>
                </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <list-group :lists="lists" class="shadow"></list-group>
            </div>
        </div>
    </div>
</template>

<script>
    import ListGroup from "./ListGroup";
    export default {
        components:{
            ListGroup
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
                this.$http('/api/terbaru').then(res=>{
                    this.lists = res.data;
                })
            }
        }
    }
</script>