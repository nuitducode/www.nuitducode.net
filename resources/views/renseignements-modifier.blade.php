@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | mise à jour des renseignements</title>
</head>
<body>

    @include('inc-nav-console')

	<div class="container">
		<div class="row">

			<div class="col-md-2">

			</div>

			<div class="col-md-10">

				@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
				@endif

                <div class="card mt-5" style="background:none;border:none;">
					<h1>Mise à jour</h1>

					<div class="card-body">
						<form method="POST" action="{{ route('renseignements-modifier_post') }}">
							@csrf

							<div class="form-group row">
								<label for="prenom" class="col-md-2 col-form-label text-md-right text-info">prénom <sup class="text-danger">*</sup></label>

								<div class="col-md-6">
									<input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom', Auth::user()->prenom) }}" autofocus>
									@error('prenom')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="nom" class="col-md-2 col-form-label text-md-right text-info">nom <sup class="text-danger">*</sup></label>

								<div class="col-md-6">
									<input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom', Auth::user()->nom)}}" />
									@error('nom')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="titre" class="col-md-2 col-form-label text-md-right text-info" style="line-height:1">titre <sup class="text-danger">*</sup><br /><span class="small font-italic" style="opacity:0.5">ex.: enseignante de mathématiques, enseignant de SNT, proviseure, proviseur-adjoint, CPE...</span></label>
								<div class="col-md-6">
									<input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre', Auth::user()->titre) }}" />
									@error('titre')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="etablissement" class="col-md-2 col-form-label text-md-right  text-info">établissement <sup class="text-danger">*</sup></label>
								<div class="col-md-6">
									<input id="etablissement" type="text" class="form-control @error('etablissement') is-invalid @enderror" name="etablissement" value="{{ old('etablissement', Auth::user()->etablissement) }}" />
									@error('etablissement')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

                            <div class="form-group row">
								<label for="nb_participants" class="col-md-2 col-form-label text-md-right text-info" style=";line-height:1">nombre d'élèves participant <sup class="text-danger">*</sup><br /><span class="small font-italic" style="opacity:0.5">ce nombre peut être mis à jour à tout moment</span></label>
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
								<label for="pays" class="col-md-2 col-form-label text-md-right text-info">pays <sup class="text-danger">*</sup></label>
								<div class="col-md-6">
									<input id="pays" type="text" class="form-control @error('pays') is-invalid @enderror" name="pays" value="{{ old('pays', Auth::user()->pays) }}" />
									@error('pays')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="ville" class="col-md-2 col-form-label text-md-right text-info">ville <sup class="text-danger">*</sup></label>
								<div class="col-md-6">
									<input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville', Auth::user()->ville) }}" />
									@error('ville')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="form-group row mb-0 pt-2">
								<div class="col-md-6 offset-md-2">
									<button type="submit" id="inscription" class="btn btn-primary"><i class="fas fa-check"></i></button>
								</div>
							</div>

						</form>
					</div>
				</div>

			</div>

		</div>

	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
