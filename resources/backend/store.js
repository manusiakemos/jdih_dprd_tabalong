import Vue from "vue"
import Vuex from "vuex"
import VuexPersistence from 'vuex-persist'
Vue.use(Vuex);

const vuexLocal = new VuexPersistence({
  storage: window.localStorage
});


const store = new Vuex.Store({
  state: {
    search: "",
    app_name: process.env.MIX_APP_NAME,
    auth: {
      loggedIn: false,
      token: null,
      user: null
    },
    primary_color: "#2858af"
  },
  mutations: {
    _loggedIn(state, value) {
      state.auth.loggedIn = value;
    },
    _token(state, value) {
      state.auth.token = value;
    },
    _profile(state, value) {
      state.auth.user = value;
    },
    _search(state, value) {
      state.search = value;
    },

  },
  actions: {},
  // plugins: [vuexLocal.plugin],
});

export default store;
