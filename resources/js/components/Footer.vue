<template>
<div class=" bg-midnight">
    <!----------- Footer ------------>
    <footer class="footer-bs bg-midnight">
        <div class="row">
        	<div class="col-md-3 footer-brand">
            	<h2>Moviesaurus</h2>
                <p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies. Curabitur vehicula, libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex mi ut sem.</p>
            </div>
        	<div class="col-md-4 footer-nav">
            	<h4>Category —</h4>
                <div class="row">
                    <div class="col-md-6">
                    <ul class="pages">
                        <li><a href="#">Movie</a></li>
                        <li><a href="#">Anime</a></li>
                        <li><a href="#">Series</a></li>
                    </ul>
                </div>
            	<div class="col-md-6">
                    <ul class="list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contacts</a></li>
                        <li><a href="#">Terms & Condition</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                </div>
            </div>
        	<div class="col-md-2 footer-social">
            	<h4>Follow Us</h4>
            	<ul>
                	<li><a href="#">Facebook</a></li>
                	<li><a href="#">Twitter</a></li>
                	<li><a href="#">Instagram</a></li>
                </ul>
            </div>
        	<div class="col-md-3 footer-ns">
            	<h4>Newsletter</h4>
                <p>A rover wearing a fuzzy suit doesn’t alarm the real penguins</p>
                <p>
                    <div class="input-group">
                      <input type="text" class="form-control square" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-light square" type="button"><i class="fas fa-envelope"></i></button>
                      </span>
                    </div><!-- /input-group -->
                 </p>
            </div>
        </div>
        
    </footer>
<div class="container-fluid text-center bg-midnight pb-4 text-white">
          Moviesaurus by Bayusaurus. © 2021.
        </div>
</div>
</template>

<script>
export default {
  mounted() {},
};
</script>

<style>
.footer-bs {
  padding: 60px 40px;
  color: rgba(255, 255, 255, 1);
  margin-bottom: 20px;
  /* border-bottom-right-radius: 6px;
  /* border-bottom-right-radius: 6px;
  border-top-left-radius: 0px;
  border-bottom-left-radius: 6px; */
}
.footer-bs .footer-brand,
.footer-bs .footer-nav,
.footer-bs .footer-social,
.footer-bs .footer-ns {
  padding: 10px 25px;
}
.footer-bs .footer-nav,
.footer-bs .footer-social,
.footer-bs .footer-ns {
  border-color: transparent;
}
.footer-bs .footer-brand h2 {
  margin: 0px 0px 10px;
}
.footer-bs .footer-brand p {
  font-size: 12px;
  color: rgba(255, 255, 255, 0.7);
}

.footer-bs .footer-nav ul.pages {
  list-style: none;
  padding: 0px;
}
.footer-bs .footer-nav ul.pages li {
  padding: 5px 0px;
}
.footer-bs .footer-nav ul.pages a {
  color: rgba(255, 255, 255, 1);
  font-weight: bold;
  text-transform: uppercase;
}
.footer-bs .footer-nav ul.pages a:hover {
  color: rgba(255, 255, 255, 0.8);
  text-decoration: none;
}
.footer-bs .footer-nav h4 {
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 3px;
  margin-bottom: 10px;
}

.footer-bs .footer-nav ul.list {
  list-style: none;
  padding: 0px;
}
.footer-bs .footer-nav ul.list li {
  padding: 5px 0px;
}
.footer-bs .footer-nav ul.list a {
  color: rgba(255, 255, 255, 0.8);
}
.footer-bs .footer-nav ul.list a:hover {
  color: rgba(255, 255, 255, 0.6);
  text-decoration: none;
}

.footer-bs .footer-social ul {
  list-style: none;
  padding: 0px;
}
.footer-bs .footer-social h4 {
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 3px;
}
.footer-bs .footer-social li {
  padding: 5px 4px;
}
.footer-bs .footer-social a {
  color: rgba(255, 255, 255, 1);
}
.footer-bs .footer-social a:hover {
  color: rgba(255, 255, 255, 0.8);
  text-decoration: none;
}

.footer-bs .footer-ns h4 {
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 3px;
  margin-bottom: 10px;
}
.footer-bs .footer-ns p {
  font-size: 12px;
  color: rgba(255, 255, 255, 0.7);
}

@media (min-width: 768px) {
  .footer-bs .footer-nav,
  .footer-bs .footer-social,
  .footer-bs .footer-ns {
    border-left: solid 1px rgba(255, 255, 255, 0.1);
  }
}
</style>