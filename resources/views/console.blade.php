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

			<div class="col-md-10 pl-5 pr-5">

				@if (session('status'))
					<div class="text-success text-monospace text-center pb-4" role="alert">
						{{ session('status') }}
					</div>
				@endif

    			<div class="row mb-5">
    				<div class="col-md-12">

                        <h1>Fiche de renseignements</h1>

                        <table class="table table-hover table-borderless text-muted text-left table-sm" style="width:0;">
                            <tr>
                                <td><i class="fas fa-id-badge"></i></td>
                                <td>{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-briefcase"></i></td>
                                <td>{{ Auth::user()->titre }}</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-at"></i></td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-school"></i></td>
                                <td>{{ Auth::user()->etablissement }}</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-globe-americas"></i></td>
                                <td>{{ Auth::user()->pays }}</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-city"></i></td>
                                <td>{{ Auth::user()->ville }}</td>
                            </tr>
                        </table>

                        <a class="btn btn-primary" href="{{ route('renseignements-modifier_get') }}" role="button">modifier</a>

    				</div>
    			</div>
            </div>
        </div>
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
