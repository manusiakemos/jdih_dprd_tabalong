<template>
    <router-link :to="value.slug">
        <div class="card mb-2">
            <!--<img :src="value.gambar" class="card-img-top">-->
            <div class="card-body text-dark">
                <div class="row">
                    <div class="col-lg-3">
                        <img :src="value.gambar" class="img-fluid" width="100%">
                    </div>
                    <div class="col-lg-9">
                        <h6 class="card-title text-uppercase display-5">{{value.judul.substr(0,100)}}</h6>
                        <strong>
                            <small class="text-info">{{value.created_at}}</small>
                        </strong>
                        <div class="card-text" v-html="value.short_content"></div>
                    </div>
                </div>
            </div>
        </div>
    </router-link>
</template>

<script>
    export default {
        props: ['value']
    }
</script>