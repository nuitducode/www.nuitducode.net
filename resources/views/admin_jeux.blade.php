<?php
if (Auth::user()->is_admin != 1) {
    exit;
}
?>

@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <title>ADMIN</title>
</head>
<body>

    @include('inc-nav-console')

	<div class="container mt-3 mb-5">
		<div class="row">

            <div class="col-md-2 mt-4">
                <a class="btn btn-light btn-sm mb-4" href="/console" role="button"><i class="fas fa-arrow-left"></i></a>
            </div>

			<div class="col-md-10">

                <h1 class="mb-0">ADMIN</h1>

                <?php
                $etablissements = App\Models\User::where('is_admin', '!=', -1)->orderBy('ndc_date')->get();
				$nb_valide = App\Models\User::where([['ndc_date', '!=', 'NULL'], ['is_admin', '!=', -1]])->count();
                ?>

                <div class="row mt-1 p-3">
					<div class="text-monospace font-weight-bold text-success mb-3">{{$nb_valide }}</div>
                    <div class="col-md-12 p-3 text-monospace small text-muted" style="background-color:white;border:1px silver solid;border-radius:4px;">
                        @foreach($etablissements AS $etablissement)
							@if (!in_array($etablissement->email, ['labbal@lfitokyo.org', 'laurentabbal@gmail.com', 'liban2@nuitducode.net', 'liban3@nuitducode.net', 'liban4@nuitducode.net', 'liban5@nuitducode.net']))
								{{$etablissement->email}};
							@endif
						@endforeach
                    </div>
                </div>
            </div>

        </div><!-- /row -->

        <div class="row p-3">
            <div class="col-md-12 p-3 text-monospace small text-muted" style="background-color:white;border:1px silver solid;border-radius:4px;">
                @php
                $n = 0;
                foreach($etablissements AS $etablissement){
                    if ($etablissement->ndc_date == NULL AND !in_array($etablissement->email, ['labbal@lfitokyo.org', 'laurentabbal@gmail.com', 'liban1@nuitducode.net', 'liban2@nuitducode.net', 'liban3@nuitducode.net', 'liban4@nuitducode.net', 'liban5@nuitducode.net', 'liban6@nuitducode.net', 'liban7@nuitducode.net', 'liban8@nuitducode.net', 'liban9@nuitducode.net', 'liban10@nuitducode.net','schaffhauserzell@orange.fr'])){
                        echo $etablissement->email . '; ';
                        $n++;
                    }
                }
                @endphp
            </div>
            <small class="text-muted">{{$n}}</small>
        </div>

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
                                <td class="text-center">{{$etablissement->scratch_nb_equipes_c3}}</td>
                                <td class="text-center">{{$etablissement->scratch_nb_equipes_c4}}</td>
                                <td class="text-center">{{$etablissement->scratch_nb_equipes_lycee}}</td>
                                <td class="text-center">{{$etablissement->python_nb_equipes_pi}}</td>
                                <td class="text-center">{{$etablissement->python_nb_equipes_poo}}</td>
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
