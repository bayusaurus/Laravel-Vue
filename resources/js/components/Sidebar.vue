<template>
    <div class="bg-midnight" id="sidebar-wrapper" >
        <div class="sidebar-heading text-white text-center mt-2 mb-5" style="margin-left: -40px;">
            <router-link to='/' class="navbar-brand ml-3" href="#"><img src="/images/utils/MOVIESAURUS.png" height="120px" width="120px" alt="moviesaurus" class="mt-2"></router-link>
        </div>
        <div class="list-group navbar-dark">
            <div class="mb-3 mt-3 navbar-nav text-white">
                <h5 class="text-white ml-5 pl-4 m-0">Genre</h5>
                <!-- <ul class="navbar-nav mt-2 side-link"> -->
                    <transition-group tag="ul" name="list" class="navbar-nav mt-2 side-link">
                        <li class="nav-item" v-for="(number, index) in numbers" :key="number">
                            <router-link class="nav-link" :to="{ name: 'movies.genre', params: { slug: genres[index].slug } }" >
                                {{ genres[index].name }}
                            </router-link>
                        </li>
                    </transition-group>
                    <ul class="navbar-nav mt-2 side-link">
                        <li class="nav-item">
                            <a href="" @click.prevent="showGenre" class="nav-link text-decoration-none">{{ caption }}</a>
                        </li>
                    </ul>
                <!-- </ul> -->
            </div>
            <div class="mb-3 mt-3 navbar-nav">
                <h5 class="text-white ml-5 pl-4 m-0">Category</h5>
                <ul class="navbar-nav mt-2 side-link">
                    <li class="nav-item">
                        <router-link class="nav-link" exact :to="{ name: 'movies.category', params: { slug: 'movie' } }" >Movie<span class="sr-only">(current)</span></router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'movies.category', params: { slug: 'series' } }">Series</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'movies.category', params: { slug: 'anime' } }" >Anime</router-link >
                    </li>
                </ul>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            genres:'',
            genresLength:'',
            numbers: 3,
            caption: 'Show All Genre',
        }
    },
    mounted(){
        this.getCategory();
    },
    methods:{
        async getCategory(){
            let response = await axios.get('/api/genres/all')
                                        .then((response) => {
                                            this.genres = response.data;
                                            this.genresLength = this.genres.length;
                                        })
                                        .catch((response) => {
                                            console.log('error');
                                        });
        },
        showGenre(){
            if(this.numbers == 3){
                this.numbers = this.genresLength;
                this.caption = 'Show Less';
            }else if(this.numbers == this.genresLength){
                this.numbers = 3;
                this.caption = 'Show All Genre';
            }
        }
    }
};
</script>

<style>
.list-enter-active, .list-leave-active {
  transition: all 1.5s;
}
.list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
  opacity: 0;
  transform: translateY(30px);
}
.side-link .nav-item:hover{
    background: rgb(25, 24, 31);
    padding-left: 75px;
}
.side-link .nav-item{
    padding-left: 75px;
}
</style>