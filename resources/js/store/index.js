import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex, axios);

export default new Vuex.Store({
  state: {
    credential: [],
    user: [],

    users: [],
    roles: [],
    customers: [],

    errors: {},
    
    loading: false,
    url: 'http://phober/api/',

    page: ['customer','list'],
    sideBar: false
  },
  actions: {
    setPage({commit}, page){
      commit('SET_PAGE', page)
    },
    setSideBar({commit}, sideBar){
      commit('SET_SIDEBAR', sideBar)
    },

    setCredential({commit, state}, data, loading = true) {
      commit('SET_LOADING', true)

      axios
        .post(state.url + "login?login=" + data[0] + "&password=" + data[1])
        .then(r => {
          commit('SET_CREDENTIAL', r.data);
          commit('SET_LOADING', false)
        });
    },
    removeCredential({commit}) {
      commit('DELETE_CREDENTIAL');
    },
    
    getUser({commit, state}, token) {
      let config = {headers: {Authorization: `Bearer ${token}`}};
      axios
        .post(state.url + "details", '', config)
        .then(r => commit('SET_USER', r.data));
    },
    async updateUser({commit, state}, args) {
      let config = {headers: {Authorization: `Bearer ${args.token}`}};

      await axios.put(state.url + "profile/update", args.data, config)
        .catch(r => {
          commit('SET_ERRORS', r.response.data.errors)
        });

      axios
        .post(state.url + "details", '', config)
        .then(r => commit('SET_USER', r.data));
    },

    getUsers({commit, state}, token) {
      let config = {headers: {Authorization: `Bearer ${token}`}};

      axios
        .get(state.url + "user/list", config)
        .then(r => commit('GET_USERS', r.data));
    },
    getRoles({commit, state}, token) {
      let config = {headers: {Authorization: `Bearer ${token}`}};

      axios
        .get(state.url + "role/list", config)
        .then(r => commit('GET_ROLES', r.data));
    },
    getCustomers({commit, state}, token) {
      let config = {headers: {Authorization: `Bearer ${token}`}};

      axios
        .get(state.url + "customers", config)
        .then(r => {commit('GET_CUSTOMERS', r.data.data)});
    },
  },
  mutations: {
    SET_PAGE(state, page) {
      state.page = page;
    },
    SET_SIDEBAR(state, sideBar) {
      state.sideBar = sideBar;
    },
    SET_LOADING(state, loading) {
      state.loading = loading;
    },
    SET_ERRORS(state, errors) {
      state.errors = errors;
    },
    SET_CREDENTIAL(state, credential) {
      state.credential = credential;
    },
    DELETE_CREDENTIAL(state) {
      state.credential = "";
    },
    SET_USER(state, user) {
      state.user = user;
    },

    GET_USERS(state, users) {
      state.users = users;
    },
    GET_ROLES(state, roles) {
      state.roles = roles;
    },
    GET_CUSTOMERS(state, customers) {
      state.customers = customers;
    },
  }
})