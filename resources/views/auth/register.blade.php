@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | inscrire un établissement</title>
</head>
<body>

	@include('inc-nav')

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card mt-5" style="background:none;border:none;">
					<h1>Inscription</h1>

					<div class="card-body">
						<form method="POST" action="{{ route('register') }}">
							@csrf

							<div class="form-group row">
								<label for="prenom" class="col-md-4 col-form-label text-md-right text-info">prénom <sup class="text-danger">*</sup></label>

								<div class="col-md-6">
									<input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" autofocus>
									@error('prenom')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="nom" class="col-md-4 col-form-label text-md-right text-info">nom <sup class="text-danger">*</sup></label>

								<div class="col-md-6">
									<input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" />
									@error('nom')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="titre" class="col-md-4 col-form-label text-md-right text-info" style="line-height:1">titre <sup class="text-danger">*</sup><br /><span class="small font-italic" style="opacity:0.5">ex.: enseignante de mathématiques, enseignant de SNT, proviseure, proviseur-adjoint, CPE...</span></label>
								<div class="col-md-6">
									<input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre') }}" />
									@error('titre')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right text-info" style=";line-height:1">adresse courriel <sup class="text-danger">*</sup><br /><span class="small font-italic" style="opacity:0.5">adresse académique ou adresse de l'établissement</span></label>
								<div class="col-md-6">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" />
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="etablissement" class="col-md-4 col-form-label text-md-right text-info">établissement <sup class="text-danger">*</sup></label>
								<div class="col-md-6">
									<input id="etablissement" type="text" class="form-control @error('etablissement') is-invalid @enderror" name="etablissement" value="{{ old('etablissement') }}" />
									@error('etablissement')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="nb_participants" class="col-md-4 col-form-label text-md-right text-info" style=";line-height:1">nombre d'élèves participants <sup class="text-danger">*</sup><br /><span class="small font-italic" style="opacity:0.5">ce nombre peut être mis à jour à tout moment</span></label>
								<div class="col-md-6">
									<input id="nb_participants" type="text" class="form-control @error('nb_participants') is-invalid @enderror" name="nb_participants" value="{{ old('nb_participants') }}" />
									@error('nb_participants')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="pays" class="col-md-4 col-form-label text-md-right text-info">pays <sup class="text-danger">*</sup></label>
								<div class="col-md-6">
									<input id="pays" type="text" class="form-control @error('pays') is-invalid @enderror" name="pays" value="{{ old('pays') }}" />
									@error('pays')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="ville" class="col-md-4 col-form-label text-md-right text-info">ville <sup class="text-danger">*</sup></label>
								<div class="col-md-6">
									<input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" />
									@error('ville')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right text-info">mot de passe <sup class="text-danger">*</sup></label>
								<div class="col-md-6">
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" />
									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password-confirm" class="col-md-4 col-form-label text-md-right text-info">confirmation du mot de passe <sup class="text-danger">*</sup></label>
								<div class="col-md-6">
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" />
								</div>
							</div>

							<div class="form-group row pt-3">
								<label for="password-confirm" class="col-md-4 text-right"><span class="badge badge-warning small" style="padding-top:5px;">RGPD</span></label>
								<div class="col-md-6">
									<div class="form-check">
										<input class="form-check-input" style="cursor:pointer" type="checkbox"  onchange="document.getElementById('inscription').disabled = !this.checked;" >
										<label class="form-check-label text-monospace small text-justify pr-1 text-muted" style="padding-top:2px;">J'autorise ce site à conserver les données transmises via ce formulaire. Ces données peuvent être supprimées à tout moment en sélectionnant "supprimer ce compte" dans la console.</label>
									</div>
								</div>
							</div>

							<div class="form-group row mb-0 pt-2">
								<div class="col-md-6 offset-md-4">
									<button type="submit" id="inscription" class="btn btn-warning" disabled><img src="{{ asset('img/icon-green-flag.svg') }}" width="12" class="mr-2" />inscrire l'établissement</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div><!-- container -->

	@include('inc-bottom-js')

</body>
</html>
