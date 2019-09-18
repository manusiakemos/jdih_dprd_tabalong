<template>
    <div class="card bg-primary text-white">
        <div class="card-body">
            <h5 class="card-title">{{value.label}}</h5>
            <p class="card-text">{{value.judul}}</p>
            <div v-html="value.deskripsi"></div>
            <a :href="value.url_download" class="btn btn-dark card-btn" target="_blank">Download PDF</a>
        </div>
    </div>
</template>

<script>
    export default {
        props:['value']
    }
</script>