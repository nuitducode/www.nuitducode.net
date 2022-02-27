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
                <a class="btn btn-light btn-sm" href="/console" role="button"><i class="fas fa-arrow-left"></i></a>
			</div>

			<div class="col-md-10">

				@if (session('status'))
					<div class="text-success text-monospace text-center pb-4" role="alert">
						{{ session('status') }}
					</div>
				@endif

    			<div class="row mb-5">
                    <div class="col-md-12">

                        <h1>Fiche de renseignements</h1>

                        <table class="table table-hover table-borderless text-muted" style="width:0;">
                            <tr>
                                <td class="text-center"><i class="fas fa-address-card"></i></td>
                                <td>{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="fas fa-briefcase"></i></td>
                                <td>{{ Auth::user()->titre }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="fas fa-at"></i></td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="fas fa-school"></i></td>
                                <td>{{ Auth::user()->etablissement }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="fas fa-check-square"></i></td>
                                <td>{{ Auth::user()->nb_participants }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="fas fa-globe-americas"></i></td>
                                <td>{{ Auth::user()->pays }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"><i class="fas fa-city"></i></td>
                                <td>{{ Auth::user()->ville }}</td>
                            </tr>
                        </table>

                        <a class="btn btn-primary mt-3" href="{{ route('fiche-inscription-modifier_get') }}" role="button">modifier</a>

    				</div>
    			</div>
            </div>
        </div>
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
