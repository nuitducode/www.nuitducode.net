@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <link href="{{ asset('css/dropzone-basic.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
    <title>Nuit du c0de | Dépôt jeu SCRATCH ou PYTHON</title>
</head>
<body>

    @include('inc-nav')

	<div class="container mb-5">
		<div class="row">

			<div class="col-md-6 offset-md-3">

                <div class="text-center mb-4"><img src="{{ url('/')}}/img/nuitducode-scratch-ptyhon.svg" width="320" /></div>

                <div class="mt-5 text-center">
                    <a class="btn btn-primary mr-2" href="/{{request()->segment(1)}}/scratch/{{$etablissement_jeton}}" role="button">Déposer un jeu<br />SCRATCH</a>
                    <a class="btn btn-primary mr-2" href="/{{request()->segment(1)}}/python/{{$etablissement_jeton}}" role="button">Déposer un jeu<br />PYTHON</a>
                </div>

			</div>

		</div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
