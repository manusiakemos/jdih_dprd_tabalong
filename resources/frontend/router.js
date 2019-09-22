import Vue from 'vue';
import VueRouter from 'vue-router'

import Default from './layouts/Default'

import Home from './views/Home'
import Berita from './views/Berita'
import BeritaDetail from './views/BeritaDetail'
import Arsip from './views/Arsip'
import Halaman from './views/Halaman'

Vue.use(VueRouter);

const router = new VueRouter({
        mode: 'history',
        routes: [
            {
                path: '/',
                component: Default,
                children: [
                    {
                        path: '/',
                        name: 'home',
                        component: Home,
                    },
                    {
                        path: '/home',
                        component: Home,
                    },
                    {
                        path: '/produk-hukum',
                        name: 'arsip',
                        component: Arsip,
                    },
                    {
                        path: '/berita',
                        name: 'berita',
                        component: Berita,
                    },
                    {
                        path: '/berita/:slug',
                        name: 'berita_detail',
                        component: BeritaDetail,
                    },
                    {
                        path: '/halaman/:halaman',
                        name: 'halaman',
                        component: Halaman,
                    }
                ]
            }
        ],
        scrollBehavior(to, from, savedPosition) {
            if (to.hash) {
                return window.scrollTo({top: document.querySelector(to.hash).offsetTop, behavior: 'smooth'});
            }
            return window.scrollTo({top: 0, behavior: 'smooth'});
        }
    })
;

export default router;
