<template>
  <div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
      <div class="shadow-bottom"></div>
      <ul class="list-unstyled menu-categories" id="accordionExample">
        <li class="menu">
          <a href="#" @click="setPage(['customer', 'list'])"
             :data-active="page[0] === 'customer' && page[1] === 'list'" class="dropdown-toggle">
            <div>
              <i class="fa fa-users" aria-hidden="true"></i>
              <span>Customers</span>
            </div>
          </a>
        </li>
        <li class="menu">
          <a href="#components" data-toggle="collapse" :data-active="page[0] === 'user'" class="dropdown-toggle">
            <div>
              <i class="fa fa-user-circle" aria-hidden="true"></i>
              <span>Users</span>
            </div>
            <div>
              <i class="fa fa-caret-down" aria-hidden="true"></i>
            </div>
          </a>
          <ul class="collapse submenu list-unstyled" id="components" data-parent="#accordionExample">
            <li :class="page[0] === 'user' && page[1] === 'list' ? 'active' : ''">
              <a href="#" @click="setPage(['user', 'list'])"> List </a>
            </li>
            <li :class="page[0] === 'user' && page[1] === 'profile' ? 'active' : ''">
              <a href="#" @click="setPage(['user', 'profile'])"> Profile </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
  import {mapActions, mapState} from "vuex";

  export default {
    name: "SideBar",
    computed: mapState(["page"]),
    methods: mapActions(["setPage"])
  }
</script>
