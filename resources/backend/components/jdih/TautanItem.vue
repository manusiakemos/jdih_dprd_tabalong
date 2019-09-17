<template>
    <li class="list-group-item pl-5 m-3 border-dark"
        :parent="parent + '.' + index"
        :index="index">
       <slot></slot>
        <p>{{parent + '.' + index}}</p>
    </li>
</template>
<script>
    export default {
        props: {
            data:{
                required: true,
            },
            index: {
                required: true,
            },
            parent: {
                required: true,
            }
        },
    }
</script>
