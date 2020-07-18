<template>
  <div class="layout-px-spacing">
    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
          <div class="table-responsive mb-4 mt-4">
            <b-table hover foot-clone bordered
                     :table-variant="'dark'"
                     :items="users">
            </b-table>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
  import {mapState} from "vuex";

  export default {
    name: "List",
    data() {
      return {
        fields:[
          'email',
          'username',
        ]
      }
    },
    computed: mapState(["user", "users", "roles"]),
  }
</script>