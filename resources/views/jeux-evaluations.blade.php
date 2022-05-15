@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | console</title>
</head>
<body>

    @include('inc-nav-console')

    <?php
    $etablissement_id = Auth::user()->id;
    $etablissement_jeton = Auth::user()->jeton;
    ?>

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
                        $jeux = App\Models\Game::where([['etablissement_id', $etablissement_id], ['type', request()->segment(2)], ['categorie', $categorie_code]])->get();
                        dd($jeux);
                        ?>
                        <h3 class="m-0 mb-1">{{$categorie}}</h3>
                        @if(count($jeux) == 0)
                            <div class="text-monospace text-danger small mb-4">~ pas de jeux dans cette catégorie ~</div>
                        @else
                            <div class="row row-cols-1 row-cols-md-3">

                                <?php
                                $evaluations = [];
                                foreach($jeux AS $jeu){
                                    $nb_eval_eleves = App\Models\Evaluation::where([['etablissement_id', $etablissement_id], ['game_id', $jeu->id], ['jury_type', 'eleve']])->count();
                                    $nb_eval_enseignants = App\Models\Evaluation::where([['etablissement_id', $etablissement_id], ['game_id', $jeu->id], ['jury_type', 'enseignant']])->count();
                                    $note_eleves = App\Models\Evaluation::where([['etablissement_id', $etablissement_id], ['game_id', $jeu->id], ['jury_type', 'eleve']])->avg('note');
                                    $note_enseignants = App\Models\Evaluation::where([['etablissement_id', $etablissement_id], ['game_id', $jeu->id], ['jury_type', 'enseignant']])->avg('note');
                                    $note = App\Models\Evaluation::where([['etablissement_id', $etablissement_id], ['game_id', $jeu->id]])->avg('note');
                                    $json = @file_get_contents("https://api.scratch.mit.edu/projects/".$jeu->scratch_id);
                                    $evaluations[$jeu->id] = ["nom_equipe"=>$jeu->nom_equipe, "scratch_id"=>$jeu->scratch_id, "json"=>$json, "nb_eval_eleves"=>$nb_eval_eleves, "nb_eval_enseignants"=>$nb_eval_enseignants, "note_eleves"=>$note_eleves, "note_enseignants"=>$note_enseignants, "note"=>$note];
                                }
                                uasort($evaluations, fn($a, $b) => $a['note'] <=> $b['note']);
                                $evaluations = array_reverse($evaluations, TRUE);
                                ?>

                                @foreach($evaluations AS $evaluation)
                                    <div class="col mb-4">
                                        <div class="card p-3" @if(($loop->iteration == 1 OR $loop->iteration == 2) AND $evaluation['note'] != 0) style="background-color:#ffc905;border-radius:5px;" @endif>

                                            <h3 class="mt-0" style="color:#4cbf56">@if(($loop->iteration == 1 OR $loop->iteration == 2) AND $evaluation['note'] != 0)<i class="fas fa-crown mr-1" style="color:#f39c12"></i>@endif {{$evaluation['nom_equipe']}}</h3>
                                            @if ($evaluation['json'] !== FALSE)

                                                <div style="position:relative">
                                                    <div style="position:absolute;top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                        <a href="https://scratch.mit.edu/projects/{{$evaluation['scratch_id']}}" class="btn btn-success btn-sm" target="_blank" role="button"><i class="fas fa-gamepad fa-2x"></i></a>
                                                    </div>
                                                    <img src="https://uploads.scratch.mit.edu/get_image/project/{{$evaluation['scratch_id']}}_282x218.png" class="img-fluid" style="border-radius:4px;" width="100%" />
                                                </div>

                                                <div class="mt-2 text-monospace small">
                                                    <div>Nb d'évaluations élèves: <span class="text-primary font-weight-bold">{{ $evaluation['nb_eval_eleves'] }}</span></div>
                                                    <div>Nb d'évaluations enseignants: <span class="text-primary font-weight-bold">{{ $evaluation['nb_eval_enseignants'] }}</span></div>
                                                    <div>Note élèves: <span class="text-primary font-weight-bold">@if($evaluation['note_eleves'] != 0){{ round($evaluation['note_eleves'], 1) }} @else - @endif</span></div>
                                                    <div>Note enseignants: <span class="text-primary font-weight-bold">@if($evaluation['note_enseignants'] != 0) {{ round($evaluation['note_enseignants'],1) }} @else - @endif</span></div>
                                                </div>

                                                <kbd class="mt-2 text-center">Note globale:<span class="text-primary font-weight-bold">@if($evaluation['note'] != 0) {{ round($evaluation['note'],1) }} @else - @endif</span></kbd>

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
                        $jeux = App\Models\Game::where([['etablissement_id', $etablissement_id], ['type', request()->segment(2)], ['categorie', $categorie_code]])->get();
                        ?>
                        <h3 class="m-0 mb-1">{{$categorie}}</h3>
                        @if(count($jeux) == 0)
                            <div class="text-monospace text-danger small mb-4">~ pas de jeux dans cette catégorie ~</div>
                        @else
                            <div class="row row-cols-1 row-cols-md-3">

                                <?php
                                $evaluations = [];
                                foreach($jeux AS $jeu){
                                    $nb_eval_eleves = App\Models\Evaluation::where([['etablissement_id', $etablissement_id], ['game_id', $jeu->id], ['jury_type', 'eleve']])->count();
                                    $nb_eval_enseignants = App\Models\Evaluation::where([['etablissement_id', $etablissement_id], ['game_id', $jeu->id], ['jury_type', 'enseignant']])->count();
                                    $note_eleves = App\Models\Evaluation::where([['etablissement_id', $etablissement_id], ['game_id', $jeu->id], ['jury_type', 'eleve']])->avg('note');
                                    $note_enseignants = App\Models\Evaluation::where([['etablissement_id', $etablissement_id], ['game_id', $jeu->id], ['jury_type', 'enseignant']])->avg('note');
                                    $note = App\Models\Evaluation::where([['etablissement_id', $etablissement_id], ['game_id', $jeu->id]])->avg('note');
                                    $evaluations[$jeu->id] = ["nom_equipe"=>$jeu->nom_equipe, "scratch_id"=>$jeu->scratch_id, "nb_eval_eleves"=>$nb_eval_eleves, "nb_eval_enseignants"=>$nb_eval_enseignants, "note_eleves"=>$note_eleves, "note_enseignants"=>$note_enseignants, "note"=>$note];
                                }
                                uasort($evaluations, fn($a, $b) => $a['note'] <=> $b['note']);
                                $evaluations = array_reverse($evaluations, TRUE);
                                ?>

                                @foreach($evaluations AS $evaluation)

                                    <div class="col mb-4">
                                        <div class="card p-3" @if(($loop->iteration == 1 OR $loop->iteration == 2) AND $evaluation['note'] != 0) style="background-color:#ffc905;border-radius:5px;" @endif>

                                            <h3 class="mt-0" style="color:#4cbf56">{{ $evaluation['nom_equipe'] }}</h3>

                                            <div class="text-center">
                                                <a href="/console/jouer-jeu-pyxel/{{$etablissement_jeton.'-'.$jeu->python_id}}" class="btn btn-success btn-sm" target="_blank" role="button"><i class="fas fa-gamepad fa-2x"></i></a>
                                            </div>

                                            <div class="mt-2 text-monospace small">
                                                <div>Nb d'évaluations élèves: <span class="text-primary font-weight-bold">{{ $evaluation['nb_eval_eleves'] }}</span></div>
                                                <div>Nb d'évaluations enseignants: <span class="text-primary font-weight-bold">{{ $evaluation['nb_eval_enseignants'] }}</span></div>
                                                <div>Note élèves: <span class="text-primary font-weight-bold">@if($evaluation['note_eleves'] != 0){{ round($evaluation['note_eleves'], 1) }} @else - @endif</span></div>
                                                <div>Note enseignants: <span class="text-primary font-weight-bold">@if($evaluation['note_enseignants'] != 0) {{ round($evaluation['note_enseignants'],1) }} @else - @endif</span></div>
                                            </div>

                                            <kbd class="mt-2 text-center">Note globale:<span class="text-primary font-weight-bold">@if($evaluation['note'] != 0) {{ round($evaluation['note'],1) }} @else - @endif</span></kbd>

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
