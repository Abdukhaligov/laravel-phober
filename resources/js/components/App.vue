<template>
  <div id="app">

    <BlockUI v-if="loading"></BlockUI>

    <Login v-if="credential.status !== 'ok' && !getCookie('token')"></Login>

    <Dashboard v-if="credential.status === 'success' || getCookie('token')"></Dashboard>

  </div>
</template>

<script>
  import {mapState, mapActions} from 'vuex'
  import {setCookie, getCookie, removeCookie} from 'tiny-cookie'

  import 'bootstrap/dist/js/bootstrap.min'
  import 'bootstrap-vue/dist/bootstrap-vue.css';

  import '../../libs/cork/plugins/apex/apexcharts.css';
  import '../../libs/cork/plugins/animate/animate.css';

  import '../../libs/cork/assets/css/plugins.css';
  import '../../libs/cork/assets/css/authentication/form-2.css';
  import '../../libs/cork/assets/css/forms/theme-checkbox-radio.css';
  import '../../libs/cork/assets/css/forms/switches.css';
  import '../../libs/cork/assets/css/plugins.css';
  import '../../libs/cork/assets/css/dashboard/dash_1.css';
  import '../../libs/cork/assets/css/scrollspyNav.css';
  import '../../libs/cork/assets/css/components/cards/card.css';
  import '../../libs/cork/assets/css/components/custom-modal.css';
  import '../../libs/cork/assets/css/users/user-profile.css';


  import Login from "./Auth/Login";
  import Dashboard from "./Dashboard/Main";
  import BlockUI from "./BlockUI";

  export default {
    name: 'App',
    components: {
      Login,
      Dashboard,
      BlockUI
    },
    data() {
      return {
        loginForm: true,
        token: getCookie('token')
      }
    },
    computed: mapState(["credential", "loading"]),
    methods: {
      ...mapActions(['setCredential', 'getUser', 'getUsers', 'getRoles']),
      getCookie,
    },
    mounted() {
      if (this.token){
        this.getUser(this.token);
        this.getUsers(this.token);
        this.getRoles(this.token);
      }
    },
    watch: {
      credential: function () {
        if (this.credential.status === "success") {
          setCookie('token', this.credential.token);
          this.getUser(this.credential.token);
          this.getUsers(this.credential.token);
          this.getRoles(this.credential.token);
        } else {
          removeCookie('token');
        }
      }
    }
  }
</script>

<style>
  .invalid {
    color: #e7515a;
  }
</style>
