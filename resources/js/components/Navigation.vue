<template>
  <div>    
    <nav class="navbar navbar-expand-lg navbar-dark bg-midnight py-3 " >
      <a class="text-white" @click="setIcon" id="menu-toggle"><i class=" bg-dawn" :class="{ 'fas fa-chevron-right': right, 'fas fa-chevron-left': left }"></i></a>
      <router-link to='/' class="navbar-brand ml-3" href="#">MOVIESAURUS</router-link>
      <a href="#">
        <div class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
          <div class="navbar-toggler-icon"><img src="https://i.pinimg.com/736x/64/81/22/6481225432795d8cdf48f0f85800cf66.jpg" width="30px" height="30px" alt=""></div>
        </div>
      </a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form @submit.prevent="search" method="get" action="/api/search" class="form-inline my-lg-0 ml-auto justify-content-center" id="navbar-search-form">
          <input class="form-control input-rounded" type="search" v-model="keyword" placeholder="Search any movie..." aria-label="Search">
          <!-- <button type="submit">search</button> -->
          <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
        </form>
        <ul class="navbar-nav ml-auto text-center">
          <li class="nav-item">
            <router-link class="nav-link" exact to="/" >Home<span class="sr-only">(current)</span></router-link>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > Movie </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <router-link class="dropdown-item" :to="{ name: 'movies.create' }" >Add Movie</router-link >
              <!-- <router-link class="dropdown-item" :to="{ name: 'movies.table' }" >Table of Movies</router-link > -->
            </div>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/about">About</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'pages.contact' }" >Contact</router-link >
          </li>
          <!-- <li class="nav-item">
            <router-link :to="{name: 'login'}" v-if="!loggedIn" class="btn btn-primary my-2 my-sm-0">Login</router-link>
          </li>
          <li v-if="loggedIn = true" @click="logout" class="nav-item btn btn-primary my-2 my-sm-0">
            Logout
          </li> -->
        </ul>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  data(){
    return {
      authenticated: null,
      user: null,
      token: null,
      sidebar: 1,
      right: false,
      left: true,
      keyword: '',
    }
  },
  mounted() {
    this.authenticated = localStorage.getItem("authenticated");
    this.user = localStorage.getItem("user");
    this.token = localStorage.getItem("token");
  },
  watch: {
    '$store.state.authenticated': function() {
      // console.log(this.$store.getters['getLoader']);
      this.authenticated = this.$store.getters['authenticated'];
    },
    '$store.state.user': function() {
      // console.log(this.$store.getters['getLoader']);
      this.user = this.$store.getters['user'];
    },
    '$store.state.token': function() {
      // console.log(this.$store.getters['getLoader']);
      this.token = this.$store.getters['token'];
    }
  },
  methods:{
    search(){
      this.$router.push('/search/' + this.keyword);
    },
    setIcon(){
      if(this.sidebar == 1){
        this.right = true; this.left = false; this.sidebar = 0;
      }else if(this.sidebar == 0){
        this.right = false; this.left = true; this.sidebar = 1;
      }
    },
    logout() {
            axios.get('/api/logout')
            .then(() => {
                //remove localStorage
                localStorage.removeItem("authenticated");    
                localStorage.removeItem("user");    
                localStorage.removeItem("token");    
                localStorage.removeItem("loggedIn");    
                //redirect
                return this.$router.push({ name: 'login' })
            })
        }
  },
};
</script>

<style scoped>
#menu-toggle{
  margin-left: -46px;
  display: block;
  font-size: 40px;
  text-decoration: none;
  cursor: pointer;
}
#menu-toggle i{
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 18px;
  padding-right: 18px;
  border-radius: 50%;
}
#navbar-search-form input[type=search], #navbar-search-form input[type=search]:focus{
  width:400px;
  border-color:rgb(25, 24, 31);
  background:rgb(25, 24, 31);
}

.navbar-toggler-icon{
  background-image: url(https://i.stack.imgur.com/mSXoO.png)!important;
}
.navbar-toggler{
  border: 0px !important;
}
@media (max-width: 768px) {
  #navbar-search-form input[type=search], #navbar-search-form input[type=search]:focus{
    width:300px;
    border-color:rgb(25, 24, 31);
    background:rgb(25, 24, 31);
  }
}

</style>
