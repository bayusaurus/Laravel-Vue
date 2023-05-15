<template>
<div class="bg-midnight">
  <div class="bg-evening text-white rounded-content">
    <div id="page-content-wrapper" class="">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-9 py-4 px-3">

            <div class="d-flex justify-content-between align-items-baseline mb-4">
              <span class="movie-list-heading text-center">New Posts</span><span>See more</span>
            </div>
            <transition-group class="row" name="list" tag="div">
                <div class="col-sm-12 col-md-3  px-2 py-2" v-for="post in newPosts" :key="post.id">
                  <router-link :to="{ name: 'movies.show', params : {slug: post.slug} }" class="text-white text-decoration-none">
                    <div>
                      <img class="movie-list-poster" :src="'/images/poster_portrait/' +  post.poster_portrait" alt="">
                      <div class="movie-title-list mt-4">{{ post.title }}</div>
                    </div>
                  </router-link>
                  
                  <!-- <div class="text-secondary text-right">
                    5/5
                    <i class="fas fa-star text-warning mr-2"></i>
                    <i class="fas fa-star text-warning mr-2"></i>
                    <i class="fas fa-star text-warning mr-2"></i>
                    <i class="fas fa-star text-warning mr-2"></i>
                    <i class="fas fa-star text-warning mr-2"></i>
                  </div> -->
                </div>
            </transition-group>
            <hr class="hr-dawn my-5">

            <div class="d-flex justify-content-between align-items-baseline mb-4">
              <span class="movie-list-heading text-center">New Posted Movie</span>
              <router-link class="nav-link" :to="{ name: 'movies.category', params: { slug: 'movie' } }"><span class="text-white">See more</span></router-link>
            </div>
            <transition-group class="row" name="list" tag="div">
                <div class="col-sm-12 col-md-3  px-2 py-2" v-for="movie in movies" :key="movie.id">
                  <router-link :to="{ name: 'movies.show', params : {slug: movie.slug} }" class="text-white text-decoration-none">
                    <div>
                      <img class="movie-list-poster" :src="'/images/poster_portrait/' +  movie.poster_portrait" alt="">
                      <div class="movie-title-list mt-4">{{ movie.title }}</div>
                    </div>
                  </router-link>
                  
                  <!-- <div class="text-secondary text-right">
                    5/5
                    <i class="fas fa-star text-warning mr-2"></i>
                    <i class="fas fa-star text-warning mr-2"></i>
                    <i class="fas fa-star text-warning mr-2"></i>
                    <i class="fas fa-star text-warning mr-2"></i>
                    <i class="fas fa-star text-warning mr-2"></i>
                  </div> -->
                </div>
            </transition-group>
            <hr class="hr-dawn my-5">

            <div class="d-flex justify-content-between align-items-baseline mb-4">
              <span class="movie-list-heading text-center">New Posted Anime</span>
              <router-link class="nav-link" :to="{ name: 'movies.category', params: { slug: 'anime' } }"><span class="text-white">See more</span></router-link>
            </div>
            <transition-group class="row" name="list" tag="div">
                <div class="col-sm-12 col-md-3  px-2 py-2" v-for="anime in animes" :key="anime.id">
                  <router-link :to="{ name: 'movies.show', params : {slug: anime.slug} }" class="text-white text-decoration-none">
                    <div>
                      <img class="movie-list-poster" :src="'/images/poster_portrait/' +  anime.poster_portrait" alt="">
                      <div class="movie-title-list mt-4">{{ anime.title }}</div>
                    </div>
                  </router-link>
                  
                  <!-- <div class="text-secondary text-right">
                    5/5
                    <i class="fas fa-star text-warning mr-2"></i>
                    <i class="fas fa-star text-warning mr-2"></i>
                    <i class="fas fa-star text-warning mr-2"></i>
                    <i class="fas fa-star text-warning mr-2"></i>
                    <i class="fas fa-star text-warning mr-2"></i>
                  </div> -->
                </div>
            </transition-group>
            <hr class="hr-dawn my-5">

            <div class="d-flex justify-content-between align-items-baseline mb-4">
              <span class="movie-list-heading text-center">New Posted Series</span>
              <router-link class="nav-link" :to="{ name: 'movies.category', params: { slug: 'series' } }"><span class="text-white">See more</span></router-link>
            </div>
            <transition-group class="row" name="list" tag="div">
                <div class="col-sm-12 col-md-3  px-2 py-2" v-for="serie in series" :key="serie.id">
                  <router-link :to="{ name: 'movies.show', params : {slug: serie.slug} }" class="text-white text-decoration-none">
                    <div>
                      <img class="movie-list-poster" :src="'/images/poster_portrait/' +  serie.poster_portrait" alt="">
                      <div class="movie-title-list mt-4">{{ serie.title }}</div>
                    </div>
                  </router-link>
                  
                  <!-- <div class="text-secondary text-right">
                    5/5
                    <i class="fas fa-star text-warning mr-2"></i>
                    <i class="fas fa-star text-warning mr-2"></i>
                    <i class="fas fa-star text-warning mr-2"></i>
                    <i class="fas fa-star text-warning mr-2"></i>
                    <i class="fas fa-star text-warning mr-2"></i>
                  </div> -->
                </div>
            </transition-group>
            <hr class="hr-dawn my-5">
<!-- ================================================================== -->
          </div>
          <div class="col-lg-3 py-4 px-3 bg-dawn">
            <div class="mb-4 text-center new-trailer-heading">New Trailer</div>
            <div class="row px-3">
              <div class="container mb-5">
                <img class="new-trailer-poster" src="https://i.ytimg.com/vi/TcMBFSGVi1c/maxresdefault.jpg" alt="">
                <div class="new-trailer-title text-center mt-2"><a class="text-white text-decoration-none" href="#">Warcraft: The Great War Between Human and Orc</a></div>
              </div>
              <div class="container mb-5">
                <img class="new-trailer-poster" src="https://i.ytimg.com/vi/C0BMx-qxsP4/maxresdefault.jpg" alt="">
                <div class="new-trailer-title text-center mt-2">John Wick - Official Trailer</div> </div>
              <div class="container mb-5">
                <img class="new-trailer-poster" src="https://i.ytimg.com/vi/WH_AEWxvshE/maxresdefault.jpg" alt="">
                <div class="new-trailer-title text-center mt-2">Warcraft - Official Trailer</div>
              </div>
              <div class="container mb-5">
                <img class="new-trailer-poster" src="https://i.ytimg.com/vi/lB95KLmpLR4/mqdefault.jpg" alt="">
                <div class="new-trailer-title text-center mt-2">The Social Network - Official Trailer</div>
              </div>
              <div class="container mb-5">
                <img class="new-trailer-poster" src="https://i.ytimg.com/vi/vwoQGZ7PCBI/maxresdefault.jpg" alt="">
                <div class="new-trailer-title text-center mt-2">Snowden - Official Trailer</div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  data(){
    return{
      newPosts: '',
      animes: '',
      movies: '',
      series: '',
    }
  },
  mounted(){
    this.getMovieList();
  },
  methods: {
    async getMovieList(){
      let response = await axios.get('/api/movies');
      this.newPosts = response.data.newPosts;  
      this.animes = response.data.anime;  
      this.movies = response.data.movie;  
      this.series = response.data.series;
      // console.log(this.newPosts);
      
      
      // console.log(this.newPosts);
      // console.log(this.animes);
      // console.log(this.movies);
      // console.log(this.series);
      
    }
  }
};
</script>

<style>
.list-enter-active, .list-leave-active {
  transition: all 0.5s;
}
.list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
  opacity: 0;
  transition: all 0s;
  transform: translateY(30px);
}
.content {
  height: 100%;
}
.rounded-content {
  border-top-left-radius: 50px;
  height: 100%;
}
.movie-list-heading{
  font-size: 30px;
}
.movie-title-list{
  font-size: 18px;
}
.movie-list-poster{
  width: 100%;
  height: 300px;
  object-fit: cover;
  border-radius: 10px;
}
.movie-star-rate{
  font-size: 20px;
}
.new-trailer-heading{
  font-size: 20px;
}
.new-trailer-poster{
  width: 100%;
  max-height: 130px;
  object-fit: cover;
  border-radius: 10px;
}
.new-trailer-title{
  font-size: 16px;
}
</style>