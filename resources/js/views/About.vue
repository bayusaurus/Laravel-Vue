<template>
 <div class="bg-midnight">

  <div class="movie-landscape-banner">
    <img src="https://i1.wp.com/highschool.latimes.com/wp-content/uploads/2018/06/share-1.jpg?fit=1200%2C630&ssl=1" alt="">
  </div>

  <div class="bg-evening text-white content">
    <div id="page-content-wrapper" class="">
      <div class="container-fluid" style="height: 100%">
        <div class="row">
          <div class="col-lg-6 py-4 px-3">
            <div class="movie-detail-title">Avengers: Endgame (2018)</div>
            <div class="movie-detail-info">
              <div class="text-muted">Fantasy, Superhero</div>
              <div class="">Series, <span>13 Episodes</span></div>
              <div class="">120 minutes</div>
              <div class="text-muted">
                5/5
                <i class="fas fa-star text-warning mr-2"></i>
                <i class="fas fa-star text-warning mr-2"></i>
                <i class="fas fa-star text-warning mr-2"></i>
                <i class="fas fa-star text-warning mr-2"></i>
                <i class="fas fa-star text-warning mr-2"></i>
              </div>
            </div>
            <div  class="movie-detail-synopsis mt-5">Synopsis:</div>
            <div class="text-justify ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum doloribus, quidem in, est eius ab obcaecati labore officiis architecto ipsum aperiam deleniti qui sint, a fugiat earum? Quas, atque ratione?</div>
            <div  class="movie-detail-crew mt-5">
              <div><span class="movie-detail-synopsis">Director</span>: Aku Lagaga</div>
              <div><span class="movie-detail-synopsis">Writer</span>: Lamus Nostradamus</div>
              <div><span class="movie-detail-synopsis">Cast</span>: Seulgi, Irene, Wendy, Joy, Yeri</div>
            </div>
          </div>


          <div class="col-lg-6 py-4 px-3 bg-dawn">
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
export default {};
</script>
<style>
.movie-landscape-banner{
  position: relative;
  width: 100%; 
  height: 300px;
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
.movie-detail-title{
  font-size: 23px;
  font-weight: 600;
}
.movie-detail-synopsis{
  font-size: 18px;
  font-weight: 600;
}
.photos-list{
  width: 100%;
  max-height: 300px;
  object-fit: cover;
  border-radius: 10px;
}


</style>