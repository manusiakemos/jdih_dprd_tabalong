<template>
    <div class="container pb-5">
        <div class="row">
            <div class="col-12">
                <h5 class="display-6 text-uppercase mt-5 mb-3">
                     <span class="my-border text-dark">
                        Produk Hukum Terpopuler
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
    import ListGroup from "../components/ListGroup";
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
                this.$http('/api/terpopuler').then(res=>{
                    this.lists = res.data;
                })
            }
        }
    }
</script>