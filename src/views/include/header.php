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
		<nav class="d-flex justify-content-between align-items-start">
			<ul class="list-group d-flex flex-row list-group-flush">
				<?php if ($_SESSION['role'] === 'student'): ?>
					<li class="list-group-item"><a href="<?= URLROOT; ?>"> Home </a></li>
				<?php else: ?>
					<li class="list-group-item"><a href="<?= URLROOT; ?>">Grievances</a></li>
					<li class="list-group-item"><a href="<?= URLROOT; ?>/contact/view">Contacts</a></li>
					<li class="list-group-item"><a href="<?= URLROOT; ?>/document/view">Documents</a></li>
				<?php endif; ?>
			</ul>
			<ul class="list-group d-flex flex-row list-group-flush">
				<li class="list-group-item">
					<img src="<?= URLROOT; ?>/public/assets/images/person-circle.svg" alt="Profile Pic">
					<span>
						<?= $_SESSION['user_name']; ?>
					</span>
				</li>
				<li class="list-group-item"><a href="<?= URLROOT; ?>/auth/logout">Log out</a></li>
			</ul>
		</nav>
	<?php endif; ?>