<template>
    <nav class="navbar navbar-expand-md navbar-light">
        <a class="navbar-brand text-dark text-uppercase" href="#">
            <img loading="lazy" src="images/jdih.png" width="60" height="60" class="d-inline-block align-middle" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto text-dark text-uppercase">
                <li class="nav-item" v-for="(link, index) in links" v-if="link.type != 'dropdown'">
                    <router-link class="nav-link" :to="_halaman(link)">
                        {{link.menu_name}} <span class="sr-only"></span>
                    </router-link>
                </li>
                <navbar-item v-else :link="link"></navbar-item>
                <li class="nav-item">
                    <a href="/admin-panel" class="nav-link">LOGIN ADMIN</a>
                </li>
            </ul>
        </div>

        <a class="navbar-brand text-dark d-none d-md-inline-block" href="#">
            <img loading="lazy" src="/images/tabalong.png" width="50" height="60" class="d-inline-block align-middle"
                 alt="">
        </a>
    </nav>
</template>

<script>
    import NavbarItem from "../components/NavbarItem";
    export default {
        components:{
            NavbarItem
        },
        data() {
            return {
                links: ''
            }
        },
        created() {
            this.$http.get('/api/web-menu').then(res => {
                this.links = JSON.parse(res.data.value);
            })
        },
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

<style>
    .nav-link {
        font-size: 11pt !important;
        font-family: 'PT Sans', sans-serif !important;
        color: black !important;
    }

    .router-link-exact-active {
        color: #66487f !important;
    }

    .router-link{
        color: black;
    }

    .navbar {
        -webkit-box-shadow: 0px -1px 5px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 0px -1px 5px 0px rgba(0, 0, 0, 0.75);
        box-shadow: 0px -1px 5px 0px rgba(0, 0, 0, 0.75);
    }
</style>