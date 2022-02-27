@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | console</title>
</head>
<body>

    @include('inc-nav-console')

	<div class="container mt-4 mb-5">
		<div class="row pt-3">
			<div class="col-md-2"></div>

			<div class="col-md-10">

				@if (session('status'))
					<div class="text-success text-monospace text-center pb-4" role="alert">
						{{ session('status') }}
					</div>
				@endif

    			<div class="row mb-5">
                    <div class="col-md-6">
                        <iframe src="https://scratch.mit.edu/projects/109676175/embed" allowtransparency="true" width="100%" height="402" frameborder="0" scrolling="no" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-6">
                        Critère 1
                        <input type="range" class="custom-range" min="0" max="5" step="1" id="customRange3">
                        Critère 2
                        <input type="range" class="custom-range" min="0" max="5" step="1" id="customRange3">
                        Critère 3
                        <input type="range" class="custom-range" min="0" max="5" step="1" id="customRange3">
                        Critère 4
                        <input type="range" class="custom-range" min="0" max="5" step="1" id="customRange3">
                        Critère 5
                        <input type="range" class="custom-range" min="0" max="5" step="1" id="customRange3">
    				</div>
    			</div>
            </div>
        </div>
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
