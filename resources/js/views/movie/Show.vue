<template>
 <div class="bg-midnight">

  <div class="movie-landscape-banner">
    <img :src="'/images/poster_landscape/' +  movie.poster_landscape" alt="">
  </div>

  <div class="bg-evening text-white content">
    <div id="page-content-wrapper" class="">
      <div class="container-fluid" style="height: 100%">
        <div class="row">
          <div class="col-lg-6 py-4 px-3 movie-detail">
            <div class="movie-detail-title">{{ movie.title }} ({{new Date(movie.release_date).getFullYear()}})</div>
            <div class="movie-detail-info">
              <div class="text-muted">
                    <template v-for="(genre, i) in movie.genres" >
                        <span>{{ genre.name }}</span>{{ i < movie.genres.length -1 ? ', ': '' }}
                    </template>
              </div>
              <div class="">{{ movie.category }}<span v-if="movie.total_episode">, {{ movie.total_episode }} Episodes</span></div>
              <div class="">Studio: {{ movie.studio }}</div>
              <div class="">{{ movie.duration }} Minutes</div>
              <div class="text-muted">
                5/5
                <i class="fas fa-star text-warning mr-2"></i>
                <i class="fas fa-star text-warning mr-2"></i>
                <i class="fas fa-star text-warning mr-2"></i>
                <i class="fas fa-star text-warning mr-2"></i>
                <i class="fas fa-star text-warning mr-2"></i>
                <!-- <div>
                  <span v-for="n in Math.ceil(7.004)">{{ n }} </span>
                </div> -->
              </div>
            </div>
            <div  class="movie-detail-synopsis mt-5">Synopsis:</div>
            <div class="text-justify "><p class="movie-detail-synopsis-text">{{ movie.synopsis }}</p></div>
            <div  class="movie-detail-crew mt-5">
              <div><span class="movie-detail-synopsis">Director</span>: Aku Lagaga</div>
              <div><span class="movie-detail-synopsis">Writer</span>: Lamus Nostradamus</div>
              <div><span class="movie-detail-synopsis">Cast</span>: Seulgi, Irene, Wendy, Joy, Yeri</div>
            </div>

            <div class="mt-5">
              <router-link class="btn btn-primary" :to="{ name: 'movies.edit', params: {slug : movie.slug} }">Edit</router-link>
              <button type="button" class="btn btn-danger" @click="deleteAlert">Hapus</button>
            </div>
          </div>

          <div class="col-lg-6 py-4 px-3 bg-dawn">
            <div class="container-fluid text-center text-white mb-5">
              <h3>Trailer</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" :src="'https://www.youtube.com/embed/'+movie.trailer" allowfullscreen></iframe>
              </div>
            </div>
            <div class="d-flex justify-content-center">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">PHOTOS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">VIDEOS</a>
                </li>
              </ul>
            </div>
            <div class="mt-3 mb-5">
              <template>
                <div class="tab-content" id="pills-tabContent">
                  <!-- PHOTOS -->
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="container mb-5">
                      <img class="photos-list" src="https://i.ytimg.com/vi/vwoQGZ7PCBI/maxresdefault.jpg" alt="">
                    </div>
                  </div>

                  <!-- VIDEOS -->
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/4Q4JRVW5BFE" allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </template>

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
        return {
            movie: [],
        }
    },
    mounted(){
        this.getMovie();
        console.log(this.movie);
    },
    methods: {
        getMovie() {
            let response = axios.get( `/api/movies/title/${this.$route.params.slug}` )
                .then((response)=>{
                    this.movie = response.data.data;
                })
                .catch((response) => {
                    this.$router.push({ name: 'error.notfound' });
                });
        },
        deleteAlert(){
          this.$swal({
            title: 'Are you sure?',
            text: `are you sure want to delete ${this.movie.title} and its contents?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
             this.deleteMovie();
            }else{
            }
          });
        },
        async deleteMovie(){
          try{
            let response = await axios.delete(`/api/movies/${this.movie.slug}/delete`)
            console.log(response);
            this.$router.push('/');
            this.$swal(
              'Success!',
              response.data,
              'success'
            );
            
          }catch(e){
            this.$swal(
              'Failed!',
              'Somenthing went wrong.',
              'error'
            );
          }
        }
    },
};
</script>
<style>
.movie-landscape-banner{
  position: relative;
  width: 100%; 
  height: 500px;
  object-fit: cover;

}
.movie-landscape-banner-overlay{
  position: absolute;
  width: 100%;
  bottom: 0;
  left: 0;
  background: linear-gradient(180deg, rgba(255,255,255,0) 0%, rgba(0,0,0,1) 68%);
    /* background: red; */
}
.movie-landscape-banner-overlay-title{
  font-size: 24px;
  font-weight: 600;
}
.movie-landscape-banner-overlay-rate{
  font-size: 20px;
  font-weight: 400;
}
.movie-landscape-banner img{
  width: 100%; 
  height: 100%;
  object-fit: cover;
}
.movie-detail{
  font-size: 18px;
}
.movie-detail-title{
  font-size: 26px;
  font-weight: 600;
}
.movie-detail-synopsis{
  font-size: 20px;
  font-weight: 600;
}
.photos-list{
  width: 100%;
  max-height: 300px;
  object-fit: cover;
  border-radius: 10px;
}
</style>