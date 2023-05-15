<template>
<div class="bg-midnight">
  <div class="bg-evening text-white rounded-content">
    <div id="page-content-wrapper" class="">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 py-4 px-3">

            <div class="movie-list-heading text-center">
              {{ text }}
            </div>
            <!-- <hr class="hr-dawn my-5"> -->
            <transition-group class="row" name="list" tag="div">
                <div class="col-sm-12 col-md-2  px-2 py-2" v-for="movie in movies" :key="movie.id">
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
            <div class="col-md-12 mt-5 text-center" v-if="next_page_url">
                <button type="button" class="btn btn-primary" @click.prevent=" getMovie(next_page_url)">Load more</button>
            </div>

            <div class="col-md-12 mt-5 text-center" v-if="!movies.length">
                <h3>No content found....</h3>
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
      movies: [],
      text: '',
      next_page_url: '',
    }
  },
  
  mounted(){  
    this.setText();
    this.getMovie();
  },
  methods: {
    async getMovie(url = ''){
      let response = await axios.get(url ? url : `/api/categories/${this.$route.params.slug}`)
                                .then((response)=>{
                                    if(!this.movies){
                                      this.movies = response.data.movies.data;
                                    }else{
                                      this.movies.push(...response.data.movies.data);
                                    }
                                    this.next_page_url = response.data.movies.next_page_url;
                                })
                                .catch((response) => {
                                    // this.$router.push({ name: 'error.notfound' });
                                    console.log('error');
                                    
                                });
    },
    setText(){
        this.text = this.$route.params.slug.charAt(0).toUpperCase() + this.$route.params.slug.slice(1);
    }
  },
  watch: {
    '$route.params.slug': function () {
        this.movies = [];
        this.text = '';
        this.next_page_url = '';
        this.setText();
        this.getMovie();
    }
  },
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