<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.82.0">
	<title>Headers · Bootstrap v5.0</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/headers/">



	<!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}
	</style>


	<!-- Custom styles for this template -->
	<link href="<?= $this->config->item('base_url') ?>/application/views/sidebars/headers.css" rel="stylesheet">
	<link href="<?= $this->config->item('base_url') ?>/application/views/sidebars/sidebars.css" rel="stylesheet">
</head>

<body>
	<?php
	if ($this->session->flashdata('message')) {
	?>
		<script>
			alert('<?= $this->session->flashdata('message') ?>');
		</script>
	<?php
	}
	?>

	<div class="container">
		<div class="row">
			<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

				<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
					<li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
					<li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
					<li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
					<li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
					<li><a href="#" class="nav-link px-2 link-dark">About</a></li>
				</ul>

				<div class="col-md-3 text-end">
					<?php
					if ($this->session->userdata('is_login')) {
					?>
						<li> 환영합니다. <?= $this->session->userdata('name') ?>님,
							현재 id =<?= $this->session->userdata('cid') ?></li>
						<li><a href="<?= $this->config->item('base_url') ?>/index.php/auth/logout">로그아웃</a></li>
					<?php
					} else {
					?>
						<a href="<?= site_url('auth/login') ?> ">
							<button type="button" class="btn btn-outline-primary me-2">로그인</button> </a>
						<a href="<?= site_url('auth/register') ?> ">
							<button type="button" class="btn btn-primary"> 가입</button></a>
					<?php
					}
					?>
				</div>
			</header>
		</div>

		<div class="row">
			<div class="container">
				<div class="row-fluid">

					<div class="span2">
						<div class="p-3 bg-white" style="width: 280px;">
							<a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
								<svg class="bi me-2" width="30" height="24">
									<use xlink:href="#bootstrap" />
								</svg>
								<span class="fs-5 fw-semibold">Collapsible</span>
							</a>
							<ul class="list-unstyled ps-0">
								<li class="mb-1">
									<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
										Home
									</button>
									<div class="collapse show" id="home-collapse">
										<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
											<li><a href="#" class="link-dark rounded">Overview</a></li>
											<li><a href="#" class="link-dark rounded">Updates</a></li>
											<li><a href="#" class="link-dark rounded">Reports</a></li>
										</ul>
									</div>
								</li>
								<li class="mb-1">
									<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
										Dashboard
									</button>
									<div class="collapse" id="dashboard-collapse">
										<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
											<li><a href="#" class="link-dark rounded">Overview</a></li>
											<li><a href="#" class="link-dark rounded">Weekly</a></li>
											<li><a href="#" class="link-dark rounded">Monthly</a></li>
											<li><a href="#" class="link-dark rounded">Annually</a></li>
										</ul>
									</div>
								</li>
								<li class="mb-1">
									<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
										Orders
									</button>
									<div class="collapse" id="orders-collapse">
										<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
											<li><a href="#" class="link-dark rounded">New</a></li>
											<li><a href="#" class="link-dark rounded">Processed</a></li>
											<li><a href="#" class="link-dark rounded">Shipped</a></li>
											<li><a href="#" class="link-dark rounded">Returned</a></li>
										</ul>
									</div>
								</li>
								<li class="border-top my-3"></li>
								<li class="mb-1">
									<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
										Account
									</button>
									<div class="collapse" id="account-collapse">
										<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
											<li><a href="#" class="link-dark rounded">New...</a></li>
											<li><a href="#" class="link-dark rounded">Profile</a></li>
											<li><a href="#" class="link-dark rounded">Settings</a></li>
											<li><a href="#" class="link-dark rounded">Sign out</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</div>

					</div>

					<div class="span10">
						main


					</div>

				</div>

			</div>


		</div>


		<!--
	<div class="container">
		<div class="row-fluid">

			<div class="span2">


				<ul class="nav nav-tabs nav-stacked">
					<?php
					foreach ($topics as $entry) {
					?>
						<li><a href="/leanmath/index.php/topic/get/<?= $entry->id ?>"><?= $entry->title ?></a></li>
					<?php
					}
					?>
				</ul>

				*/
			</div>

			<div class="span10">
				<article>
					<h1><?= $topic->title ?></h1>
					<div>
						<div><?= kdate($topic->created) ?></div>
						<?= auto_link($topic->description) ?>
						<?php
						$this->session->set_userdata('cid', $topic->id);
						?>

					</div>
				</article>
				<div>
					<form action="<?= site_url() ?>/topic/delete" method="post">
						<input type="hidden" name="topic_id" value="<?= $topic->id ?>" />
						<a href="<?= site_url() ?>/topic/add" class="btn">추가</a>
						<input type="submit" class="btn" value="삭제" />
					</form>
				</div>
			</div>

		</div>
	</div>
				-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
		<script src="<?= $this->config->item('base_url') ?>/application/views/sidebars/sidebars.js"></script>

</body>

</html>