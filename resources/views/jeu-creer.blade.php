@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | Nouveau jeu</title>
</head>
<body>

    @include('inc-nav')

	<div class="container mb-5">
		<div class="row">

			<div class="col-md-6 offset-md-3">

                @if (session('message'))
                    <div class="text-success text-monospace text-center mt-5 pb-4" role="alert">
                        {{ session('message') }}
                        <br />
                        <a class="btn btn-light btn-sm mt-3" href="/" role="button"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    @php
                    exit;
                    @endphp
                @endif

                <div class="text-center mb-4"><img src="{{ url('/')}}/img/nuitducode.svg" width="150" /></div>

				<form method="POST" action="{{ route('jeu-creer_post') }}">
					@csrf

                    <div class="form-group">
						<div for="nom_equipe" class="text-info">NOM DE L'ÉQUIPE <sup class="text-danger">*</sup></div>
                        <div class="text-monospace text-muted small mb-1">Choisir un nom d'équipe sans caractères spéciaux, ni chiffres. 20 caractères max.</div>
						<input id="nom_equipe" name="nom_equipe" type="text" class="form-control @error('nom_equipe') is-invalid @enderror" value="{{ old('nom_equipe') }}" autofocus>
						@error('nom_equipe')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

                    <div class="form-group">
                        <div for="categorie" class="text-info">CATÉGORIE <sup class="text-danger">*</sup></div>
                        <select id="categorie" name="categorie" class="custom-select @error('categorie') is-invalid @enderror" required>
                            <option selected disabled value="">choisir...</option>
                            <option value="C3" @if(old('categorie') == 'C3') selected @endif>Cycle 3 : CM1 > 6e</option>
                            <option value="C4" @if(old('categorie') == 'C4') selected @endif>Cycle 4 : 5e > 3e</option>
                            <option value="LY" @if(old('categorie') == 'LY') selected @endif>Lycée</option>
                        </select>
					</div>

                    <div class="form-group">
						<div for="scratch_id" class="text-info">IDENTIFIANT DU PROJET <sup class="text-danger">*</sup></div>
                        <div class="text-monospace text-justify text-muted small mb-1">
                            L'identifiant du projet est le la suite de chiffres présente dans son adresse. Exemple: si l'adresse est "scratch.mit.edu/projects/6535/", l'identifiant est "6535".
                        </div>
						<input id="scratch_id" name="scratch_id" type="text" class="form-control @error('scratch_id') is-invalid @enderror" value="{{ old('scratch_id') }}" autofocus>
						@error('scratch_id')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

                    <input id="etablissement_jeton" name="etablissement_jeton" type="hidden" value="{{$etablissement_jeton}}" />

					<button type="submit" id="inscription" class="btn btn-primary"><i class="fas fa-check"></i></button>

				</form>

			</div>

		</div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
