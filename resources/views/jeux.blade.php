@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | console</title>
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
                <a class=" btn btn-light btn-sm btn-block text-left mt-1" href="/console/demo" role="button">Démo</a>
            </div>

			<div class="col-md-9 offset-md-1">

    			@if (session('status'))
    				<div class="text-success text-monospace text-center pb-4" role="alert">
    					{{ session('status') }}
    				</div>
    			@endif

                <h1 class="mb-0">JEUX</h1>
                <div class="text-monospace text-muted small">
                    @if(request()->segment(2) == 'ndc') Nuit du c0de 2022 @endif
                    @if(request()->segment(2) == 'sltn') Sélections 2022 @endif
                    @if(request()->segment(2) == 'demo') Démo @endif
                </div>
                <?php
                $categories = ['C3' => 'Cycle 3', 'C4' => 'Cycle 4', 'LY' => 'Lycée'];
                foreach ($categories AS $categorie_code => $categorie){
                    $jeux = App\Models\Game::where([['etablissement_id', Auth::user()->id], ['type', request()->segment(2)], ['categorie', $categorie_code]])->get();
                    ?>
                    <h2>{{$categorie}}</h2>
                    @if(count($jeux) == 0)
                        <div class="text-monospace text-danger small">~ pas de jeux dans cette catégorie ~</div>
                    @else
                        @foreach($jeux AS $jeu)
                            <div class="mb-5">
                                <h3 class="mt-1" style="color:#4cbf56">{{$jeu->nom_equipe}}</h3>
                                <div class="row">
                                    <div class="col-md-auto">
                                        <a href="https://scratch.mit.edu/projects/{{$jeu->scratch_id}}" target="_blank"><img src="https://uploads.scratch.mit.edu/get_image/project/{{$jeu->scratch_id}}_200x200.png" style="border-radius:4px;" /></a>
                                    </div>
                                    <div class="col">
                                        <?php
                                        $evaluations = App\Models\Evaluation::where([['etablissement_id', Auth::user()->id], ['game_id', $jeu->id]])->get();
                                        $evaluations_eleves = App\Models\Evaluation::where([['etablissement_id', Auth::user()->id], ['game_id', $jeu->id], ['jury_type', 'eleve']])->get();
                                        $evaluations_enseignants = App\Models\Evaluation::where([['etablissement_id', Auth::user()->id], ['game_id', $jeu->id], ['jury_type', 'enseignant']])->get();

                                        $nb_evaluations_eleves = count($evaluations_eleves);
                                        $nb_evaluations_enseignants = count($evaluations_enseignants);

                                        $note_globale = [];
                                        $note_eleves = [];
                                        $note_enseignants = [];
                                        foreach ($evaluations_eleves AS $evaluation) {
                                            $note_globale[] = $evaluation->note;
                                            $note_eleves[] = $evaluation->note;
                                        }
                                        foreach ($evaluations_enseignants AS $evaluation) {
                                            $note_globale[] = $evaluation->note;
                                            $note_enseignants[] = $evaluation->note;
                                        }


                                        ?>
                                        <div class="text-monospace small">
                                            <div>Nombre d'évaluations d'élèves: <span class="text-primary font-weight-bold">{{ $nb_evaluations_eleves}}</span></div>
                                            <div>Nombre d'évaluations d'enseignants: <span class="text-primary font-weight-bold">{{ $nb_evaluations_enseignants}}</span></div>
                                            <div>Note élèves: <span class="text-primary font-weight-bold">@if(count($note_eleves) != 0){{ round(array_sum($note_eleves)/count($note_eleves), 1) }} @else - @endif</span></div>
                                            <div>Note enseignants: <span class="text-primary font-weight-bold">@if(count($note_enseignants) != 0) {{ round(array_sum($note_enseignants)/count($note_enseignants),1) }} @else - @endif</span></div>
                                        </div>
                                        <kbd>Note globale:<span class="text-primary font-weight-bold">@if(count($note_globale) != 0) {{ round(array_sum($note_globale)/count($note_globale),1) }} @else - @endif</span></kbd>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <?php
                    }
                    ?>
            </div>

        </div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
