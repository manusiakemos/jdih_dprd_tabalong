<template>
    <nav class="navbar navbar-expand-md navbar-light bg-whitesmoke">
        <a class="navbar-brand text-dark text-uppercase" href="#">
            <img loading="lazy" src="images/jdih.png" width="60" height="60" class="d-inline-block align-middle" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto text-dark text-uppercase">
                <li class="nav-item" v-for="(link, index) in links">
                    <router-link class="nav-link" :to="_halaman(link)">
                        {{link.menu_name}} <span class="sr-only"></span>
                    </router-link>
                </li>
                <!-- <li class="nav-item">
                     <router-link class="nav-link" to="galeri">Galeri</router-link>
                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Dropdown</a>
                     <div class="dropdown-menu" aria-labelledby="dropdown01">
                         <a class="dropdown-item" href="#">Action</a>
                         <a class="dropdown-item" href="#">Another action</a>
                         <a class="dropdown-item" href="#">Something else here</a>
                     </div>
                 </li>-->
            </ul>
        </div>

        <a class="navbar-brand text-dark d-none d-md-inline-block" href="#">
            <img loading="lazy" src="/images/tabalong.png" width="50" height="60" class="d-inline-block align-middle"
                 alt="">
        </a>
    </nav>
</template>

<script>
    export default {
        data() {
            return {
                links: ''
            }
        },
        created() {
            this.$http.get('/api/web-menu').then(res => {
                this.links = res.data;
            })
        },
        methods: {
            _halaman(data) {
               var l = data.menu_link;
               if(l == null){
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
        color: #000000 !important;
    }

    .router-link-active {
        color: #000000 !important;
    }

    .router-link-exact-active {
        color: red !important;
    }

    .navbar {
        -webkit-box-shadow: 0px -1px 5px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 0px -1px 5px 0px rgba(0, 0, 0, 0.75);
        box-shadow: 0px -1px 5px 0px rgba(0, 0, 0, 0.75);
    }
</style>