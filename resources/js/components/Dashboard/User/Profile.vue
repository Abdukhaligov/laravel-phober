<template>
  <div class="layout-px-spacing">
    <b-modal id="modal-user-update" title="Update profile">
      <div>
        <div class="form-group">
          <label for="updateUsername">Username</label>
          <input type="text"
                 class="form-control"
                 id="updateUsername"
                 v-model="updatedUser.username"
                 placeholder="Enter username">
          <div v-if="errors.username" class="invalid">
            <strong>{{ errors.username[0] }}</strong>
          </div>
        </div>
        <div class="form-group">
          <label>Email address</label>
          <input type="email"
                 v-model="updatedUser.email"
                 class="form-control">
          <div v-if="errors.email" class="invalid">
            <strong>{{ errors.email[0] }}</strong>
          </div>
        </div>
      </div>

      <template v-slot:modal-footer="{close}">
        <button
            type="submit"
            class="btn btn-primary"
            @click="update(updatedUser);close()">
          Update
        </button>
      </template>
    </b-modal>

    <div class="row layout-spacing">

      <!-- Content -->
      <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

        <div class="user-profile layout-spacing">
          <div class="widget-content widget-content-area">
            <div class="d-flex justify-content-between">
              <h3 class="">Profile</h3>
              <a href="#"
                 @click="$bvModal.show('modal-user-update');
                 updatedUser.username = user.username;
                 updatedUser.email = user.email;"
                 class="mt-2 edit-profile">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-edit-3">
                  <path d="M12 20h9"></path>
                  <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                </svg>
              </a>
            </div>
            <div class="text-center user-info">
              <img src="assets/img/profile-3.jpg" alt="avatar">
              <p class="">{{ user.username }}</p>
            </div>
            <div class="user-info-list">

              <div class="">
                <ul class="contacts-block list-unstyled">
                  <li class="contacts-block__item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-calendar">
                      <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                      <line x1="16" y1="2" x2="16" y2="6"></line>
                      <line x1="8" y1="2" x2="8" y2="6"></line>
                      <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span>Created at: <strong>{{ user.created_at }}</strong></span>
                  </li>
                  <li class="contacts-block__item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-calendar">
                      <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                      <line x1="16" y1="2" x2="16" y2="6"></line>
                      <line x1="8" y1="2" x2="8" y2="6"></line>
                      <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span>Updated at: <strong>{{ user.updated_at }}</strong></span>
                  </li>
                  <li class="contacts-block__item">
                    <a href="mailto:example@mail.com">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                           stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                           class="feather feather-mail">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                      </svg>
                      {{ user.email }}
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</template>

<script>
  import {mapActions, mapState} from "vuex";
  import {getCookie} from "tiny-cookie";

  export default {
    name: "Profile",
    data() {
      return {
        updatedUser: {
          username: "",
          email: "",
        },
        token: getCookie('token')
      }
    },
    computed: mapState(["user", "errors"]),
    methods: {
      ...mapActions(['updateUser']),
      update(data) {
        this.updateUser({'token': getCookie('token'), data: data});
      },
      getCookie,
    },
  }
</script>
