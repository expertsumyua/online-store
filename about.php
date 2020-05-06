<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

	include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">About</li>
  </ol>
</nav>


<!-- About Section -->
<section class="page-section bg-primary text-white mb-0" id="about">
	<div class="container">

		<!-- About Section Heading -->
		<h2 class="page-section-heading text-center text-uppercase text-white">About</h2>

		<!-- Icon Divider -->
		<div class="divider-custom divider-light">
			<div class="divider-custom-line"></div>
			<div class="divider-custom-icon">
				<i class="fas fa-star"></i>
			</div>
			<div class="divider-custom-line"></div>
		</div>

		<!-- About Section Content -->
		<div class="row">
			<div class="col-lg-4 ml-auto">
			  	<p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional SASS stylesheets for easy customization.</p>
			</div>
			<div class="col-lg-4 mr-auto">
			  	<p class="lead">You can create your own custom avatar for the masthead, change the icon in the dividers, and add your email address to the contact form to make it fully functional!</p>
			</div>
		</div>

	</div>
</section>			


<?php           
	include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>	
