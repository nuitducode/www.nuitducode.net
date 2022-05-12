@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | console</title>
</head>
<body>

    @include('inc-nav-console')

	<div class="container mt-4 mb-5">
		<div class="row">

            <div class="col-md-2 mt-4">
                <a class="btn btn-light btn-sm mb-4" href="{{ url()->previous() }}" role="button"><i class="fas fa-arrow-left"></i></a>
            </div>

			<div class="col-md-10">

    			@if (session('status'))
    				<div class="text-success text-monospace text-center pb-4" role="alert">
    					{{ session('status') }}
    				</div>
    			@endif

                <h1 class="m-0 p-0">JEUX</h1>
                <div class="text-monospace text-muted small">
                    @if(request()->segment(2) == 'ndc') Nuit du c0de 2022 @endif
                    @if(request()->segment(2) == 'sltn') Sélections 2022 @endif
                    @if(request()->segment(2) == 'demo') Démo @endif
                </div>
                <h2>SCRATCH</h2>
                <div style="border:1px silver solid;border-radius:5px;padding:20px;background-color:white;">
                    <?php
                    $categories = ['C3' => 'Cycle 3', 'C4' => 'Cycle 4', 'LY' => 'Lycée'];
                    foreach ($categories AS $categorie_code => $categorie){
                        $jeux = App\Models\Game::where([['etablissement_id', Auth::user()->id], ['type', request()->segment(2)], ['categorie', $categorie_code]])->get();
                        ?>
                        <h3 class="m-0">{{$categorie}}</h3>
                        @if(count($jeux) == 0)
                            <div class="text-monospace text-danger small mb-4">~ pas de jeux dans cette catégorie ~</div>
                        @else
                            <div class="row row-cols-1 row-cols-md-3">
                            @foreach($jeux AS $jeu)

                            <div class="col mb-4">
                                <div class="card p-3">

                                    <h3 class="mt-0" style="color:#4cbf56">{{$jeu->nom_equipe}}</h3>
                                    @php
                                    $json = @file_get_contents("https://api.scratch.mit.edu/projects/".$jeu->scratch_id);
                                    @endphp
                                    @if ($json !== FALSE)

                                        <div style="position:relative">
                                            <div style="position:absolute;top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                <a href="https://scratch.mit.edu/projects/{{$jeu->scratch_id}}" class="btn btn-success btn-sm" target="_blank" role="button"><i class="fas fa-gamepad fa-2x"></i></a>
                                            </div>
                                            <img src="https://uploads.scratch.mit.edu/get_image/project/{{$jeu->scratch_id}}_282x218.png" class="img-fluid" style="border-radius:4px;" width="100%" />
                                        </div>

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

                                        <div class="mt-2 text-monospace small">
                                            <div>Nb d'évaluations élèves: <span class="text-primary font-weight-bold">{{ $nb_evaluations_eleves}}</span></div>
                                            <div>Nb d'évaluations enseignants: <span class="text-primary font-weight-bold">{{ $nb_evaluations_enseignants}}</span></div>
                                            <div>Note élèves: <span class="text-primary font-weight-bold">@if(count($note_eleves) != 0){{ round(array_sum($note_eleves)/count($note_eleves), 1) }} @else - @endif</span></div>
                                            <div>Note enseignants: <span class="text-primary font-weight-bold">@if(count($note_enseignants) != 0) {{ round(array_sum($note_enseignants)/count($note_enseignants),1) }} @else - @endif</span></div>
                                        </div>
                                        <kbd class="mt-2 text-center">Note globale:<span class="text-primary font-weight-bold">@if(count($note_globale) != 0) {{ round(array_sum($note_globale)/count($note_globale),1) }} @else - @endif</span></kbd>

                                    @else
                                        <div class="text-monospace small text-danger">Cet identifiant Scratch n'existe pas! [{{$jeu->scratch_id}}]</div>
                                        <div class="text-monospace small text-danger">Vérifier que le jeu a bien été partagé (bouton orange "Partager", ou "Share" en anglais).</div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <?php
                        }
                    ?>
                </div>

                <h2>PYTHON</h2>
                <div style="border:1px silver solid;border-radius:5px;padding:20px;background-color:white;">
                    <?php
                    $categories = ['PI' => 'Première', 'POO' => 'Terminale'];
                    foreach ($categories AS $categorie_code => $categorie){
                        $jeux = App\Models\Game::where([['etablissement_id', Auth::user()->id], ['type', request()->segment(2)], ['categorie', $categorie_code]])->get();
                        ?>
                        <h3 class="m-0">{{$categorie}}</h3>
                        @if(count($jeux) == 0)
                            <div class="text-monospace text-danger small mb-4">~ pas de jeux dans cette catégorie ~</div>
                        @else
                            <div class="row row-cols-1 row-cols-md-3">
                            @foreach($jeux AS $jeu)

                            <div class="col mb-4">
                                <div class="card p-3">

                                    <h3 class="mt-0" style="color:#4cbf56">{{$jeu->nom_equipe}}</h3>

                                    <div class="text-center">
                                        <a href="/console/jouer-jeu-pyxel/{{Auth::user()->jeton.'-'.$jeu->python_id}}" class="btn btn-success btn-sm" target="_blank" role="button"><i class="fas fa-gamepad fa-2x"></i></a>
                                    </div>

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

                                    <div class="mt-2 text-monospace small">
                                        <div>Nb d'évaluations élèves: <span class="text-primary font-weight-bold">{{ $nb_evaluations_eleves}}</span></div>
                                        <div>Nb d'évaluations enseignants: <span class="text-primary font-weight-bold">{{ $nb_evaluations_enseignants}}</span></div>
                                        <div>Note élèves: <span class="text-primary font-weight-bold">@if(count($note_eleves) != 0){{ round(array_sum($note_eleves)/count($note_eleves), 1) }} @else - @endif</span></div>
                                        <div>Note enseignants: <span class="text-primary font-weight-bold">@if(count($note_enseignants) != 0) {{ round(array_sum($note_enseignants)/count($note_enseignants),1) }} @else - @endif</span></div>
                                    </div>
                                    <kbd class="mt-2 text-center">Note globale:<span class="text-primary font-weight-bold">@if(count($note_globale) != 0) {{ round(array_sum($note_globale)/count($note_globale),1) }} @else - @endif</span></kbd>

                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <?php
                        }
                    ?>
                </div>

            </div>

        </div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
