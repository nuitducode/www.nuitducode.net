@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | Évaluation - étape 3</title>
</head>
<body>

    @include('inc-nav')

	<div class="container mt-4 mb-5">
		<div class="row pt-3">
			<div class="col-md-12">
                <div class="text-success text-monospace text-center mt-5 pb-4" role="alert">
                    Merci!
                    <br />
                    <a class="btn btn-light btn-sm mt-3" href="/" role="button"><i class="fas fa-arrow-left"></i></a>
                </div>
            </div>
        </div><!-- /row -->
	</div><!-- /container -->

    <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    </script>

	@include('inc-bottom-js')

</body>
</html>
