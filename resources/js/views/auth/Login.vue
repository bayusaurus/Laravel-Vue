<template>
  <div class="login">
    <div class="container" style="margin-top: 100px">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <div v-if="loginFailed" class="alert alert-danger">
            Email atau Password Anda salah.
          </div>
          <div class="card">
            <div class="card-body">
              LOGIN
              <hr />
              <form @submit.prevent="login">
                <div class="form-group">
                  <label>EMAIL</label>
                  <input
                    type="email"
                    class="form-control"
                    v-model="user.email"
                    placeholder="Masukkan Email"
                  />
                  <div v-if="validation.email" class="mt-2 alert alert-danger">
                    Masukkan Email
                  </div>
                </div>

                <div class="form-group">
                  <label>PASSWORD</label>
                  <input
                    type="password"
                    class="form-control"
                    v-model="user.password"
                    placeholder="Masukkan Password"
                  />
                  <div
                    v-if="validation.password"
                    class="mt-2 alert alert-danger"
                  >
                    Masukkan Password
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">LOGIN</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      //state loggedIn with localStorage
      authenticated: localStorage.getItem("authenticated"),
      // user: localStorage.getItem("user"),
      //state token
      token: localStorage.getItem("token"),
      //state user
      user: [],
      //state validation
      validation: [],
      //state login failed
      loginFailed: null,
    };
  },
   methods: {

            login() {
                if (this.user.email && this.user.password) {
                    axios.get('/sanctum/csrf-cookie')
                        .then(response => {
                            //debug cookie
                            axios.post('/api/login', {
                                email: this.user.email,
                                password: this.user.password
                            }).then(res => {

                                //debug user login
                                console.log(res)

                                if (res.data.success) {

                                    //set localStorage
                                    // localStorage.setItem("authenticated", "true")
                                    //set localStorage
                                    // localStorage.setItem("user", res.data.user)
                                    //set localStorage Token
                                    // localStorage.setItem("token", res.data.token)

                                    //change state
                                    this.authenticated = true
                                    this.$store.commit('SET_AUTHENTICATED', true)
                                    this.$store.commit('SET_USER', res.data.user)
                                    this.$store.commit('SET_TOKEN', res.data.token)
                                    //redirect dashboard
                                    return this.$router.push({ name: 'home' })

                                } else {
                                    this.$store.commit('SET_AUTHENTICATED', false)
                                    this.$store.commit('SET_USER', null)
                                    this.$store.commit('SET_TOKEN', null)
                                    //set state login failed
                                    this.loginFailed = true

                                }

                            }).catch(error => {
                                this.$store.commit('SET_AUTHENTICATED', false)
                                this.$store.commit('SET_USER', null)
                                this.$store.commit('SET_TOKEN', null)
                                console.log(error)
                            })

                        })
                }

                this.validation = []

                if (!this.user.email) {
                    this.validation.email = true
                }

                if (!this.user.password) {
                    this.validation.password = true
                }

            }
        },

        //check user already logged in
        mounted() {
            if (this.authenticated) {
                return this.$router.push('/')
            }
        }
};
</script>

<style>
</style>