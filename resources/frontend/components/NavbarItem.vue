<template>
    <li :group="{name: 'navbar-item'}"
        class="nav-item dropdown" v-if="link">
        <a class="nav-link dropdown-toggle" href="#" :id="link.menu_link" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">{{link.menu_name}}</a>
        <div class="dropdown-menu" :aria-labelledby="link.menu_link">
            <div v-for="child in link.children_recursive">
                <router-link class="dropdown-item"
                   v-if="child.type != 'dropdown'"
                  :to="_halaman(child)">{{child.menu_name}}</router-link>
            </div>
        </div>
    </li>
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