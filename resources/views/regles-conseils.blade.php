<?php
include('github-import.php');
$github_document = github_import('nuit-du-code/DOCUMENTATION/contents/regles-conseils.md');
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('inc-meta')
    <title>Règles et conseils</title>
</head>
<body data-spy="scroll" data-target="#navbar-scrollspy" data-offset="150">
	@include('inc-nav')
	<div class="container mt-5 mb-5">

		<div class="row">
			<div class="col-md-3">
				<?php echo $github_document['menu'] ?>
			</div>
			<div class="col-md-9 text-justify">
				<?php echo $github_document['content'] ?>
			</div>
		</div>

	</div><!-- /container -->
	@include('inc-bottom-js')
</body>
</html>
