<template>
    <div class="card bg-info text-white mb-3">
        <!--<img :src="value.gambar" class="card-img-top">-->
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <img :src="value.gambar" class="img-fluid">
                </div>
                <div class="col-lg-8">
                    <h5 class="card-title">{{value.judul.substr(0,100)}}</h5>
                    <div class="card-text" v-html="value.short_content"></div>
                </div>
                <div class="col-lg-12">
                    <p class="card-text">
                        <small class="text-white">{{value.created_at}}</small>
                    </p>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex">
            <router-link :to="value.slug" class="btn btn-dark ml-auto">Selengkapnya</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['value']
    }
</script>