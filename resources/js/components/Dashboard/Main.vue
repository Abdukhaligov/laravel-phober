<template>
  <div>
    <NavBar></NavBar>

    <div class="main-container" :class="sideBar ? 'sbar-open' : 'sidebar-closed'" id="container">

      <SideBar></SideBar>

      <div id="content" class="main-content" @click="setSideBar(false)">

        <UserList v-show="page[0] === 'user' && page[1] === 'list'"></UserList>
        <UserProfile v-show="page[0] === 'user' && page[1] === 'profile'"></UserProfile>

        <CustomerList v-show="page[0] === 'customer' && page[1] === 'list'"></CustomerList>

        <Footer></Footer>
      </div>

    </div>
  </div>
</template>

<script>
  import NavBar from "./Layout/NavBar";
  import SideBar from "./Layout/SideBar";
  import Footer from "./Layout/Footer";
  import UserList from "./User/List";
  import UserProfile from "./User/Profile";
  import CustomerList from "./Customer/List";
  import {mapActions, mapState} from "vuex";

  export default {
    name: "Main",
    components: {
      NavBar,
      SideBar,
      Footer,

      UserList,
      UserProfile,

      CustomerList,
    },
    computed: mapState(["page", "sideBar"]),
    methods: mapActions(["setSideBar"])
  }
</script>
