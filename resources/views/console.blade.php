@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | console</title>
</head>
<body>

    @include('inc-nav-console')

	<div class="container mt-5 mb-5">
		<div class="row">

			<div class="col-md-2 mt-4">
                <a class=" btn btn-light btn-sm" href="console/fiche-inscription" role="button"><i class="far fa-address-card pr-2"></i> fiche inscription</a>
            </div>

			<div class="col-md-10">

				@if (session('status'))
					<div class="text-success text-monospace text-center pb-4" role="alert">
						{{ session('status') }}
					</div>
				@endif


            </div>

        </div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
