<?php
/*
Template Name: Main Page
*/
?>


<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="row">

		<main id="main" class="large-12 medium-12 columns first" role="main">

      <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
        <ul class="orbit-container" data-options="timer:false;
pause_on_hover:false;
navigation_arrows:false;
bullets:true;">
          <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
          <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>

          <li class="is-active orbit-slide">
            <img class="orbit-image" src="http://foundation.zurb.com/sites/docs/assets/img/orbit/02.jpg" alt="Space">
            <figcaption class="orbit-caption">
							<h1>Space, the final frontier.</h1>
							<h6>Winning the spelling bee. Making things happen.</h6>
						</figcaption>
          </li>

          <!-- <li class="orbit-slide">
            <img class="orbit-image" src="http://foundation.zurb.com/sites/docs/assets/img/orbit/01.jpg" alt="Space">
            <figcaption class="orbit-caption">Lets Rocket!</figcaption>
          </li>

          <li class="orbit-slide">
            <img class="orbit-image" src="http://foundation.zurb.com/sites/docs/assets/img/orbit/03.jpg" alt="Space">
            <figcaption class="orbit-caption">Encapsulating</figcaption>
          </li>

          <li class="orbit-slide">
            <img class="orbit-image" src="http://foundation.zurb.com/sites/docs/assets/img/orbit/04.jpg" alt="Space">
            <figcaption class="orbit-caption">Outta This World</figcaption>
          </li> -->

        </ul>
      </div>
			<div class="row columns info-cities">

				<div class="large-8 columns first">

	    		<div class="row large-12 medium-12 columns quality">
							<div class="large-3 medium-12 column first">
							  <img src="http://placekitten.com/g/200/200">
							</div>
							<div class="large-9 medium-12 column last">
								<h3>This is a test</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							</div>
					</div>

					<div class="row large-12 medium-12 columns quality">
							<div class="large-3 medium-12 column first">
							  <img src="http://placekitten.com/g/200/200">
							</div>
							<div class="large-9 medium-12 column last">
								<h3>This is a test</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							</div>
					</div>

					<div class="row large-12 medium-12 columns quality">
							<div class="large-3 medium-12 column first">
							  <img src="http://placekitten.com/g/200/200">
							</div>
							<div class="large-9 medium-12 column last">
								<h3>This is a test</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							</div>
					</div>

				</div>

				<div class="large-4 column last cities">

	        <div class="large-12 last secondary button-group align-top">
	          <a class="button large-4 medium-4 small-4 active">San Francisco</a>
	          <a class="button large-4 medium-4 small-4">San José</a>
	          <a class="button large-4 medium-4 small-4">San Diego</a>
	        </div>

					<div class="row columns">
							<iframe class="large-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.6186831856426!2d-122.40277034867594!3d37.79897517965562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085805f9af20faf%3A0x95357b649969029f!2sFora+Think+Space!5e0!3m2!1sen!2sus!4v1462919313861" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>

					<div class="row classes columns">
						<div class="column large-3 calendar">
							<div class="large-12 columns">
								<span class="large-12 column month">JULY</span>
								<span class="large-12 column date">21-22</span>
								<span class="large-12 column day">Thu & Fri</span>
							</div>
						</div>
						<div class="column large-9">
							<h5>Foundational Axure</h5>
							<p>
								Fora Thinkspace<br />
								115 Broadway, SF CA 94111<br />
								9am - 5pm
							</p>
							<div class="details">
									<a href="#" class="button small radius round">Add Course</a>
									<small>2 days / $1750</small>
							</div>
						</div>
					</div>


				</div>
			</div>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
