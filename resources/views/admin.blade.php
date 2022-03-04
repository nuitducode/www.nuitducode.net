<?php
if (Auth::user()->is_admin != 1) {
    exit;
}
?>

@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | ADMIN</title>
</head>
<body>

    @include('inc-nav-console')

	<div class="container mt-3 mb-5">
		<div class="row">

            <div class="col-md-2 mt-4">
                <a class="btn btn-light btn-sm mb-4" href="/console/{{request()->segment(2)}}" role="button"><i class="fas fa-arrow-left"></i></a>
                <a class=" btn btn-light btn-sm btn-block text-left" href="/console/fiche-inscription" role="button"><i class="far fa-address-card pr-2"></i> fiche d'inscription</a>
                <a class=" btn btn-light btn-sm btn-block text-left" href="https://github.com/nuitducode/ORGANISATION/discussions" target="_blank" role="button"><i class="far fa-comment-alt pr-2"></i> discussions</a>
                <div class="text-monospace text-muted small mt-4">JEUX</div>
                <a class=" btn btn-light btn-sm btn-block text-left" href="/console/ndc" role="button">Nuit du c0de</a>
                <a class=" btn btn-light btn-sm btn-block text-left mt-1" href="/console/sltn" role="button">Sélections</a>
                <a class=" btn btn-light btn-sm btn-block text-left mt-3" href="/console/bas" role="button">Bac à sable</a>
            </div>

			<div class="col-md-9 offset-md-1">

    			@if (session('status'))
    				<div class="text-success text-monospace text-center pb-4" role="alert">
    					{{ session('status') }}
    				</div>
    			@endif

                <h1 class="mb-0">ADMIN</h1>

                <?php
                $etablissements = App\Models\User::all();
                ?>
                <div class="row mt-4 p-3">
                    <div class="col-md-12 p-3 text-monospace small text-muted" style="background-color:white;border:1px silver solid;border-radius:4px;">
                        @foreach($etablissements AS $etablissement){{$etablissement->email}}; @endforeach
                    </div>
                </div>

            </div>

        </div><!-- /row -->

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-striped table-sm text-monospace text-muted small">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Id</th>
                                <th scope="col">Jeton</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Pays</th>
                                <th scope="col">Ville</th>
                                <th scope="col">Courriel</th>
                                <th scope="col">Date</th>
                                <th scope="col">Éq. C3</th>
                                <th scope="col">Éq. C4</th>
                                <th scope="col">Éq. LY</th>
                                <th scope="col">Éq. PI</th>
                                <th scope="col">Éq. PO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($etablissements AS $etablissement)
                            <tr>
                                <td class="text-success">{{$loop->index + 1}}</td>
                                <td>{{$etablissement->id}}</td>
                                <td>{{$etablissement->jeton}}</td>
                                <td>{{$etablissement->prenom}}</td>
                                <td>{{$etablissement->nom}}</td>
                                <td>{{$etablissement->pays}}</td>
                                <td>{{$etablissement->ville}}</td>
                                <td>{{substr($etablissement->email, 0, 20)}}@if(strlen($etablissement->email)>20)...@endif</td>
                                <td>{{$etablissement->ndc_date}}</td>
                                <td>{{$etablissement->scratch_nb_equipes_c3}}</td>
                                <td>{{$etablissement->scratch_nb_equipes_c4}}</td>
                                <td>{{$etablissement->scratch_nb_equipes_lycee}}</td>
                                <td>{{$etablissement->python_nb_equipes_pi}}</td>
                                <td>{{$etablissement->python_nb_equipes_poo}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /row -->

	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
