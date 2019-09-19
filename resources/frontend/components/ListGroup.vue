<template>
    <div class="list-group">
        <div class="bg-info text-white list-group-item list-group-item-action flex-column align-items-start" v-for="list in lists">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5>
                <!--<small>3 days ago</small>-->
            </div>
            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            <small>Donec id elit non mi porta.</small>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['lists']
    }
</script>