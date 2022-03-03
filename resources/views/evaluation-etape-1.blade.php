@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | Évaluation - étape 1</title>
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

				<form method="POST" action="{{ route('evaluation-etape-1_post') }}">
					@csrf

                    <div class="form-group">
						<div for="jury_nom" class="text-info">NOM DE L'ÉQUIPE <sup class="text-danger">*</sup></div>
                        <div class="text-monospace text-muted small mb-1">Saisir le nom de votre équipe</div>
						<input id="jury_nom" name="jury_nom" type="text" class="form-control" value="" required autofocus>
					</div>

                    <div class="form-group">
                        <div for="categorie" class="text-info">CATÉGORIE <sup class="text-danger">*</sup></div>
                        <div class="text-monospace text-muted small mb-1">Catégorie à évaluer</div>
                        <select id="categorie" name="categorie" class="custom-select @error('categorie') is-invalid @enderror" required>
                            <option selected disabled value="">choisir...</option>
                            <option value="C3">Cycle 3 : CM1 > 6e</option>
                            <option value="C4">Cycle 4 : 5e > 3e</option>
                            <option value="LY">Lycée</option>
                        </select>
					</div>

                    <input id="token" name="token" type="hidden" value="{{$token}}" />
                    <input id="jury_type" name="jury_type" type="hidden" value="eleve" />

					<button type="submit" id="inscription" class="btn btn-primary"><i class="fas fa-check"></i></button>

				</form>

			</div>

		</div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
