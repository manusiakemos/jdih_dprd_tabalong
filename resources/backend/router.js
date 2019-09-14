import Vue from 'vue';
import VueRouter from 'vue-router'
import store from './store'

// import TopNavigation from './views/layouts/TopNavigation'
import DefaultLayout from './views/layouts/DefaultLayout'

// import Welcome from './views/WelcomePage/WelcomePage';
import Profile from './views/ProfileComponent';

import Home from './views/Home';

import Category from './views/Category';
import Arsip from './views/Arsip';

import NewsCategory from './views/NewsCategory';
import Berita from './views/Berita';

import Setting from  './views/Setting';

import Halaman from  './views/Halaman';

import Menu from  './views/Menu';

import Login from './views/Login';

import User from './views/User';

Vue.use(VueRouter);

const router = new VueRouter({
  // mode: 'hex',
  // base: process.env.BASE_URL,
  routes: [
   /* {
      path: '/',
      component: TopNavigation,
      children:[
        {
          path: '/',
          component: Welcome,
         /!* meta: {
            requiresAuth: true,
            role: 'super-admin|admin'
          }*!/
        }
      ]

    },*/
    /* {
      path: '/auth/:provider/callback',
      component: {
        template: '<div class="auth-component"></div>'
      }
    } */
    {
      path: '/default',
      component: DefaultLayout,
      children: [
        {
          path: '/home',
          component: Home,
          meta: {
            requiresAuth: true,
            role: 'super-admin|admin'
          }
        },
        {
          path: '/arsip',
          component: Arsip,
          meta: {
            requiresAuth: true,
            role: 'super-admin|admin'
          }
        },
        {
          path: '/berita',
          component: Berita,
          meta: {
            requiresAuth: true,
            role: 'super-admin|admin'
          }
        },
        {
          path: '/news-category',
          component: NewsCategory,
          meta: {
            requiresAuth: true,
            role: 'super-admin|admin'
          }
        },
        {
          path: '/category',
          component: Category,
          meta: {
            requiresAuth: true,
            role: 'super-admin|admin'
          }
        },
        {
          path: '/profile',
          component: Profile,
          meta: {
            requiresAuth: true
          }
        },
        {
          path: '/setting',
          component: Setting,
          meta: {
            requiresAuth: true
          }
        },
        {
          path: '/halaman',
          component: Halaman,
          meta: {
            requiresAuth: true
          }
        },
        {
          path: '/menu',
          component: Menu,
          meta: {
            requiresAuth: true
          }
        },
        {
          path: '/user',
          component: User,
          meta: {
            requiresAuth: true,
            role: 'super-admin'
          }
        }
      ]
    },

    {
      path: '/',
      component: Login,
    },
  ]
});

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (store.state.auth.loggedIn == false) {
      next({
        path: '/',
        // params: { nextUrl: to.fullPath }
      })
    } else {
      if (screen.width < 1000 && !$("body").hasClass("sidebar-gone")) {
        $(document).find("#sidebar-toggler").data("toggle", "sidebar").click();
      }
      let user = store.state.auth.user;
      $.ajaxSetup({
        headers: {"Authorization": `Bearer ${user.api_token}`}
      });
      if (to.matched.some(record => record.meta.role)) {
        var userRole = user.role;
        var metaRole = to.meta.role;
        var splitMetaRole = metaRole.split('|');

        // console.log(userRole, metaRole, splitMetaRole);

        if (splitMetaRole.indexOf(userRole) > -1) {
          next()
          // console.log(userRole == metaRole);
        }
        else {
          // console.log(userRole == metaRole)
          next({path: '/'});
        }
      }
      next();
    }
  }

  else if (to.matched.some(record => record.meta.voterAuth)) {
    // console.log("voter auth");
    // console.log(store.state.voter);
    if (store.state.auth.loggedIn && store.state.voter && store.state.voter.status) {
      next();
    } else {
      next({path: '/enter-token'});
    }
  }

  else {
    next();
  }
});

export default router;
