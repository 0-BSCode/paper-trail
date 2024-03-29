<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?= URLROOT; ?>/public/css/bootstrap.css" media="screen">
	<link rel="stylesheet" href="<?= URLROOT; ?>/public/css/config.css" media="screen">
	<link rel="stylesheet" href="<?= URLROOT; ?>/public/summernote/summernote-lite.css">
	<title>
		<?= SITENAME; ?>
	</title>
</head>

<body>
	<?php if (isset($_SESSION['user_id'])): ?>
		<nav class="navbar navbar-expand-md navbar-dark bg-secondary">
			<div class="container-fluid">
				<div class="d-flex justify-content-start">
					<?php if ($_SESSION['role'] === 'student'): ?>
						<a href="<?= URLROOT; ?>" class="navbar-brand">
							<h4 class="mb-0">Home</h4>
						</a>
					<?php else: ?>
						<a href="<?= URLROOT; ?>" class="navbar-brand">
							<h4 class="mb-0">Grievances</h4>
						</a>
						<a href="<?= URLROOT; ?>/contact/index" class="navbar-brand">
							<h4 class="mb-0">Contacts</h4>
						</a>
						<a href="<?= URLROOT; ?>/document/index" class="navbar-brand">
							<h4 class="mb-0">Documents</h4>
						</a>
					<?php endif; ?>
				</div>
				<div class="d-flex justify-content-end">
					<div class="d-flex align-items-center me-3">
						<h6 class="mb-0 text-white">
							<?= $_SESSION['user_name']; ?>
						</h6>
					</div>
					<a href="<?= URLROOT; ?>/auth/logout" class="btn btn-danger">Log out</a>
				</div>
			</div>
		</nav>
	<?php endif; ?>