@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | courriel de vérification</title>
</head>
<body>

	@include('inc-nav')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card mt-5 text-muted" style="background:none;border:none;">
					<p><b>Consultez votre boîte aux lettres</b></p>

					<div class="card-body">
						@if (session('resent'))
							<div class="text-monospace text-success pb-3" role="alert">
								Un nouveau lien de vérification a été envoyé à l'adresse email que vous avez indiquée lors de votre inscription.
							</div>
						@endif

						Vous allez recevoir dans quelques minutes un courriel de vérification. Ouvrez-le puis cliquez sur le lien pour valider votre inscription.
                		Si vous ne l'avez pas reçu,
						<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
							@csrf
							<button type="submit" class="btn btn-link p-0 m-0 align-baseline">cliquez ici pour le renvoyer</button>.
						</form>
						<br />
						<br />
						En cas de problème, vous pouvez écrire à <a href="mailto:contact@nuitducode.net">contact@nuitducode.net</a>.
					</div>
				</div>
			</div>
		</div>
	</div><!-- container -->

</body>
</html>
