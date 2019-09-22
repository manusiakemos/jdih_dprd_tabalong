<template>
    <ul :group="{name: 'navbar-item'}">
        <li v-for="child in link.children_recursive">
            <router-link :to="_halaman(child)">{{child.menu_name}}</router-link>
        </li>
    </ul>
</template>

<script>
    export default {
        name: "navbar-item",
        props: ['link'],
        methods: {
            _halaman(data) {
                var l = data.menu_link;
                if (l == null) {
                    l = '/';
                }
                if (data.type == 'halaman') {
                    return `/halaman/${l}`;
                } else {
                    return `/${l}`;
                }
            },
        },
    }
</script>