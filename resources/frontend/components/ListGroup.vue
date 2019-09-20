<template>
    <div class="list-group">
        <div class="bg-info text-white list-group-item list-group-item-action flex-column align-items-start" v-for="list in lists">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 display-6">{{list.label}}</h5>
                <!--<small>3 days ago</small>-->
            </div>
            <p class="mb-1">
                {{list.judul}}
            </p>
            <small>{{list.created_at}}</small>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['lists']
    }
</script>