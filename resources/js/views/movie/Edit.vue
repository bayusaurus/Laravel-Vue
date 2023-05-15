<template>
  <div class="bg-evening text-white content py-4 px-2">
    <div id="page-content-wrapper" class="">
      <div class="container d-flex justify-content-center">
        <div class="card-body text-center col-md-8">
          Add New Movie
          <hr class="hr-dawn" />

          <form action="#" method="post" @submit.prevent="update" enctype="multipart/form-data">
            <div class="row">

              <div class="col-md-8 py-2">
                <label class="typo__label">Input Title</label>
                <input type="text" v-model="form.title" class="form-control input-rounded" placeholder="Movie Title" required />
                <div v-if="theErrors.title" class="text-danger mt-2">
                  {{ theErrors.title[0] }}
                </div>
              </div>

              <div class="col-md-4 py-2">
                <label class="typo__label">Select Category</label>
                <select v-model="form.category" class="form-control input-rounded" @change="changeCategory" required>
                  <option value="" disabled selected>Choose Category...</option>
                  <option v-for="category in categories" :key="category.id" :value="category.id" >
                    {{ category.name }}
                  </option>
                </select>
                <div v-if="theErrors.category" class="text-danger mt-2">
                  {{ theErrors.category[0] }}
                </div>
              </div>

              <div class="col-md-6 py-2">
                <label class="typo__label">Select Release Date</label>
                <input v-model="form.release" type="text" onfocus="(this.type='date')"  max="3000-12-31" min="1900-01-01" class="form-control input-rounded" placeholder="Release Date" required>
                <div v-if="theErrors.release" class="text-danger mt-2">
                  {{ theErrors.release[0] }}
                </div>
              </div>

              <div class="col-md-6 py-2">
                <label class="typo__label">Select Finish Date</label>
                <input  type="text" v-model="form.finish" onfocus="(this.type='date')" :disabled="disabled" id="end-date" max="3000-12-31" min="1900-01-01" class="form-control input-rounded" placeholder="Finish Date">
                <div v-if="theErrors.finish" class="text-danger mt-2">
                  {{ theErrors.finish[0] }}
                </div>
              </div>
                            
              <div class="col-md-12 mb-3 mt-3">
                <div ref="selectGenre">
                  <label class="typo__label">Select Genre</label>
                  <multiselect required  v-model="form.genre" :options="genres" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Pick some" label="name" track-by="id" :preselect-first="false">
                    <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span></template>
                  </multiselect>
                </div>
              </div>

              <div class="col-md-6 py-2">
                <label class="typo__label">Input Studio</label>
                <input type="text" v-model="form.studio" class="form-control input-rounded" placeholder="Studio" required/>
                <div v-if="theErrors.studio" class="text-danger mt-2">
                  {{ theErrors.studio[0] }}
                </div>
              </div>

              <div class="col-md-6 py-2">
                <label class="typo__label">Input Total Episode</label>
                <input type="number" v-model="form.total_episode" class="form-control input-rounded" :disabled="disabled" placeholder="Total Episodes" />
                <div v-if="theErrors.total_episode" class="text-danger mt-2">
                  {{ theErrors.total_episode[0] }}
                </div>
              </div>

              <div class="col-md-6 py-2">
                <label class="typo__label">Input Duration</label>
                <input type="number" v-model="form.duration" class="form-control input-rounded" placeholder="Duration (in minutes)" required/>
                <div v-if="theErrors.duration" class="text-danger mt-2">
                  {{ theErrors.duration[0] }}
                </div>
              </div>

              <div class="col-md-12 py-2">
                <div class="form-group">
                  <label for="trailer mt-2">Trailer, paste trailer link of the video from youtube</label>
                  <input type="text" v-model="form.trailer" id="trailer" class="form-control input-rounded" placeholder="Trailer, example: www.youtube.com/watch?v=o_go-8TFBXs or o_go-8TFBXs" />
                  <div v-if="theErrors.trailer" class="text-danger mt-2">
                    {{ theErrors.trailer[0] }}
                  </div>
                </div>
              </div>


              <div class="row col-md-12">
                <div class="col-md-6 py-2">
                  <div class="form-group">
                    <label for="poster_portrait text-left">Portrait Poster (optional)</label>
                    <input type="file" ref="portrait" @change="handleFileUpload1" class="form-control input-rounded" placeholder="Choose Portrait Poster Image"/>
                    <div v-if="theErrors.poster_portrait" class="text-danger mt-2">
                      {{ theErrors.poster_portrait[0] }}
                    </div>
                  </div>
                </div>

                <div class="col-md-6 py-2">
                  <div class="form-group">
                    <label for="poster_landscape text-left">Landscape Poster (optional)</label>
                    <input type="file"  ref="landscape" @change="handleFileUpload2" class="form-control input-rounded" placeholder="Choose Landscape Poster Image"/>
                    <div v-if="theErrors.poster_landscape" class="text-danger mt-2">
                      {{ theErrors.poster_landscape[0] }}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12 py-2">
                <label class="typo__label">Input Synopsis</label>
                <textarea class="form-control input-rounded" v-model="form.synopsis" placeholder="Synopsis" required></textarea>
                <div v-if="theErrors.synopsis" class="text-danger mt-2">
                  {{ theErrors.synopsis[0] }}
                </div>
              </div>

              <div class="col-md-12 justify-content-center">
                <button type="submit" class="btn btn-primary btn-rounded mt-2 col-md-4">Submit</button>   
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import EventBus from '../../eventBus.js';
import Multiselect from 'vue-multiselect';
export default {
  data(){
    return{
      form: {
        // title: '',
        // category: '',
        // release: '',
        // finish: '',
        genre: [],
        // studio: '',
        // total_episode: '',
        // duration: '',
        // trailer: '',
        poster_portrait: '',
        poster_landscape: '',
        // synopsis: '',
      },
      selectedGenres: [],
      genres: [],
      categories: [],
      theErrors: [],
      slug: '',
      loader: false,
      disabled: true,
    }
  },

  mounted() {
    
    this.getGenres();
    this.getCategories();
    
    // console.log(this.selectedGenres);
    this.getMovie();
    // console.log(this.$root.token);
    // this.$root.token = 2;
    // console.log(this.$root.token);
  },

  methods: {
    addTag (newTag) {
      const tag = {
        name: newTag,
        code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
      }
      this.options.push(tag)
      this.value.push(tag)
    },

    handleFileUpload1(){
      this.form.poster_portrait = event.target.files[0];
    },
    handleFileUpload2(){
      this.form.poster_landscape = event.target.files[0];
    },
    async getGenres(){
      let response= await axios.get(`/api/genres`);
      this.genres = response.data;
    },

    async getCategories(){
      let response= await axios.get(`/api/categories`);
      this.categories = response.data;
    },

    async getMovie(){
      let response= await axios.get(`/api/movies/title/${this.$route.params.slug}`);
        // this.form = {};
        // this.form.genre = [];
        this.slug = response.data.data.slug;
        this.form.title = response.data.data.title;
        this.form.category = response.data.data.categoryId;
        this.form.release = response.data.data.release_date;
        this.form.finish = response.data.data.finish_date;
        this.selectedGenres = response.data.data.genres;
        this.form.studio = response.data.data.studio;
        this.form.total_episode = response.data.data.total_episode;
        this.form.duration = response.data.data.duration;
        this.form.trailer = 'https://www.youtube.com/watch?v=' + response.data.data.trailer;
        this.form.synopsis = response.data.data.synopsis;
        this.checkCategory();      
        // console.log(this.selectedGenres);
        // console.log(response.data.data);
         
        this.selectedGenres.forEach(element => {
          console.log('1');
          
          this.form.genre.push({id: element.id , name: element.name});
        });
        
      // this.categories = response.data;
    },

    async update(){
      try{
        //tampilkan loader
        this.loading = true;
        // EventBus.$emit('loaderOverlay', true);
        this.$store.commit('SET_LOADER_ON');
        // console.log(this.form);
        // console.log(this.form.genre.length);
        
        if(this.form.genre.length <= 0){
          this.$refs.selectGenre.scrollIntoView();
          this.loading = false;
          this.$store.commit('SET_LOADER_OFF')
          // EventBus.$emit('loaderOverlay', false);
          //tampilkan toaster
          this.$toasted.show('Please fill all the data....', {
                position: 'top-center',
                duration: 3000,
                type: 'error',
                icon: 'warning', 
          });
        }else{
          let newGenres = this.form.genre.map( genre => genre.id);
          this.form.genre = newGenres;
          
          let formData = new FormData();
          formData.append('title', this.form.title);
          formData.append('category', this.form.category);
          formData.append('release', this.form.release);
          formData.append('finish', this.form.finish);
          formData.append('genre', this.form.genre);
          formData.append('studio', this.form.studio);
          formData.append('total_episode', this.form.total_episode);
          formData.append('duration', this.form.duration);
          formData.append('trailer', this.form.trailer);
          formData.append('synopsis', this.form.synopsis);
          formData.append('poster_portrait', this.form.poster_portrait);
          formData.append('poster_landscape', this.form.poster_landscape);
          formData.append('_method', 'PUT');
          // console.log(this.form);
          
          let config = { headers: { 'Content-Type': 'multipart/form-data' }}
          // store data
          let response = await axios.post(`/api/movies/${this.slug}/edit`, formData, config);

          //jika proses sukses
          if (response.status === 200) {
            // console.log(response);
            
            //hilangkan loader
            this.loading = false;
            // EventBus.$emit('loaderOverlay', false);
            this.$store.commit('SET_LOADER_OFF')
            //tampilkan toaster
            this.$toasted.show( response.data.message, {
                position: 'top-center',
                duration: 3000,
                type: 'success',
                icon: 'done',
            });
            this.form.genre = [];
            this.selectedGenres.forEach(element => {
              this.form.genre.push({id: element.id , name: element.name});
            });
            // this.formData.genre = [];
            this.$router.push(`/movies/title/${response.data.slug}`)
            //kosongkan form
            // this.form.title = '';
            // this.form.category = '';
            // this.form.release = '';
            // this.form.finish = '';
            // this.form.studio = '';
            // this.form.total_episode = '';
            // this.form.duration = '';
            // this.form.trailer = '';
            // this.form.poster_portrait = '';
            // this.form.poster_landscape = '';
            // this.form.synopsis = '';
            // this.theErrors = [];
            // this.form.genre = [];
            // this.formData.genre = [];

          }
        }
      }catch(e){
        //hilangkan loader
        this.loading = false;
        // EventBus.$emit('loaderOverlay', false);
        this.$store.commit('SET_LOADER_OFF')
        //tampilkan error
        // console.log(this.theErrors);
        // console.log(e.response.data.errors);
        
        this.theErrors = e.response.data.errors;

        //tampilkan toaster
        this.$toasted.show('Something went wrong....', {
              position: 'top-center',
              duration: 3000,
              type: 'error',
              icon: 'warning', 
        });
        this.form.genre = [];
        this.selectedGenres.forEach(element => {
          this.form.genre.push({id: element.id , name: element.name});
        });
      }
    },

    checkCategory(){
      if (this.form.category == 1 || this.form.category == 3){
        this.disabled = false;
      }else{
        this.disabled = true;
        this.form.finish = '';
        this.form.total_episode = '';
      }
    },

    changeCategory(){
      if (this.form.category == 1 || this.form.category == 3){
        this.disabled = false;
      }else{
        this.disabled = true;
        this.form.finish = '';
        this.form.total_episode = '';
      }

      // console.log(this.form.category);
      
    }
  }
};
</script>


<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style>
</style>