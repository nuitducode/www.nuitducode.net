<?php
if (Auth::user()->is_admin != 1) {
    exit;
}
?>
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <title>ADMIN | NOTES</title>
</head>
<body>

    @include('inc-nav-console')

	<div class="container mt-3 mb-5">
		<div class="row">

            <div class="col-md-2 mt-4">
                <a class="btn btn-light btn-sm mb-4" href="{{ url()->previous() }}" role="button"><i class="fas fa-arrow-left"></i></a>
            </div>

            <div class="col-md-10">

                <h1 class="mb-0">ÉVALUATIONS</h1>
                <div class="text-monospace text-muted small">Nuit du c0de 2022</div>

                <h2>SCRATCH</h2>
                <div style="border:1px silver solid;border-radius:5px;padding:20px;background-color:white;">
                    <?php
                    $excluded_games = [762, 569, 676, 470, 520, 540, 724, 411, 779, 313, 207, 225, 156, 730, 364, 562, 578, 603, 324, 715, 667, 778, 258, 572, 333, 229, 373, 344, 33, 773, 660, 231, 277, 202, 678, 366, 454, 423, 241, 501, 175, 771, 468, 243, 494, 321, 456, 367, 194, 354, 714, 351, 89, 582, 493, 656, 492, 499, 461, 211, 219, 218, 181, 349, 677, 180, 291, 589, 336, 362, 521, 416, 382, 634, 287, 208, 490, 783, 488, 727, 497, 587, 581, 705, 504, 659, 576, 683, 460, 288, 684, 210, 484, 363, 500, 498, 697, 628, 320, 573, 575, 458, 204, 633, 217, 323, 618, 590, 685, 249, 766, 422, 209, 646, 723, 360, 247, 574, 579, 246, 639, 341, 591, 590];
                    $categories = ['C3' => 'Cycle 3', 'C4' => 'Cycle 4', 'LY' => 'Lycée'];
                    foreach ($categories AS $categorie_code => $categorie){
                        $jeux = App\Models\Game::where([['type', 'ndc'], ['categorie', $categorie_code], ['finaliste', 1]])->get();
                        $nb_jeux = App\Models\Game::where([['type', 'ndc'], ['categorie', $categorie_code], ['finaliste', 1]])->count();
                        ?>
                        <h3 class="m-0 mb-1">{{$categorie}} [{{$nb_jeux}}]</h3>
                        @if(count($jeux) == 0)
                            <div class="text-monospace text-danger small mb-4">~ pas de jeux dans cette catégorie ~</div>
                        @else
                            <div class="row row-cols-1 row-cols-md-4">

                                <?php
                                $evaluations = [];
                                foreach($jeux AS $jeu){
                                    $nb_evals = App\Models\Evaluation_finaliste::where([['game_id', $jeu->id]])->count();
                                    $note = App\Models\Evaluation_finaliste::where([['game_id', $jeu->id]])->avg('note');
                                    $json = @file_get_contents("https://api.scratch.mit.edu/projects/".$jeu->scratch_id);
                                    $evaluations[$jeu->id] = ["nom_equipe"=>$jeu->nom_equipe, "etablissement_id"=>$jeu->etablissement_id, "scratch_id"=>$jeu->scratch_id, "json"=>$json, "nb_evals"=>$nb_evals, "note"=>$note];
                                }
                                uasort($evaluations, fn($a, $b) => $a['note'] <=> $b['note']);
                                $evaluations = array_reverse($evaluations, TRUE);
                                ?>

                                @foreach($evaluations AS $id => $evaluation)
                                    <div class="col mb-4">
                                        <div class="card h-100 p-3" @if(($loop->iteration <= 8) AND $evaluation['note'] != 0) style="background-color:#ffc905;border-radius:5px;" @endif>

                                            @if ($evaluation['json'] !== FALSE)

                                                <div class="card-body p-0">
                                                    <h3 class="mt-0" style="@if(in_array($id, $excluded_games)) text-decoration: line-through; @endif color:#4cbf56">@if(($loop->iteration <= 8) AND $evaluation['note'] != 0)<i class="fas fa-crown mr-1" style="color:#f39c12"></i>@endif {{$evaluation['nom_equipe']}}</h3>

                                                    <?php
                                                    $etablissement = App\Models\User::where('id', $evaluation['etablissement_id'])->first();
                                                    ?>
                                                    <div class="text-monospace text-muted small mb-1" style="font-size:70%;color:silver;">[{{$id}}] {{$etablissement->etablissement}} - {{$etablissement->ville}} - {{$etablissement->pays}} - {{$etablissement->email}}</div>
                                                </div>

                                                <div class="card-footer mt-2">

                                                    <div style="position:relative">
                                                        <div style="position:absolute;top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                                            <a href="https://scratch.mit.edu/projects/{{$evaluation['scratch_id']}}" class="btn btn-success btn-sm" target="_blank" role="button"><i class="fas fa-gamepad fa-2x"></i></a>
                                                        </div>
                                                        <img src="https://uploads.scratch.mit.edu/get_image/project/{{$evaluation['scratch_id']}}_282x218.png" class="img-fluid" style="border-radius:4px;" width="100%" />
                                                    </div>

                                                    <div class="mt-2 mb-1 text-monospace small">
                                                        <div>Nb d'évaluations: <span class="text-primary font-weight-bold">{{ $evaluation['nb_evals'] }}</span></div>
                                                    </div>
                                                    <div class="text-center">
                                                        <kbd class="text-center" style="display:block;">Note globale:<span class="text-primary font-weight-bold">@if($evaluation['note'] != 0) {{ round($evaluation['note'],2) }} @else - @endif</span></kbd>
                                                    </div>
                                                </div>

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
                        $jeux = App\Models\Game::where([['type', 'ndc'], ['categorie', $categorie_code], ['finaliste', 1]])->get();
                        $nb_jeux = App\Models\Game::where([['type', 'ndc'], ['categorie', $categorie_code], ['finaliste', 1]])->count();
                        ?>
                        <h3 class="m-0 mb-1">{{$categorie}} [{{$nb_jeux}}]</h3>
                        @if(count($jeux) == 0)
                            <div class="text-monospace text-danger small mb-4">~ pas de jeux dans cette catégorie ~</div>
                        @else
                            <div class="row row-cols-1 row-cols-md-4">

                                <?php
                                $evaluations = [];
                                foreach($jeux AS $jeu){
                                    $nb_evals = App\Models\Evaluation_finaliste::where([['game_id', $jeu->id]])->count();
                                    $note = App\Models\Evaluation_finaliste::where([['game_id', $jeu->id]])->avg('note');
                                    $evaluations[$jeu->id] = ["nom_equipe"=>$jeu->nom_equipe, "etablissement_id"=>$jeu->etablissement_id, "etablissement_jeton"=>$jeu->etablissement_jeton, "python_id"=>$jeu->python_id, "nb_evals"=>$nb_evals, "note"=>$note];
                                }
                                uasort($evaluations, fn($a, $b) => $a['note'] <=> $b['note']);
                                $evaluations = array_reverse($evaluations, TRUE);
                                ?>

                                @foreach($evaluations AS $id => $evaluation)

                                    <div class="col mb-4">
                                        <div class="card h-100 p-3" @if(($loop->iteration <= 8) AND $evaluation['note'] != 0) style="background-color:#ffc905;border-radius:5px;" @endif>

                                            <div class="card-body p-0">
                                                <h3 class="mt-0" style="@if(in_array($id, $excluded_games)) text-decoration: line-through; @endif color:#4cbf56">@if(($loop->iteration <= 8) AND $evaluation['note'] != 0)<i class="fas fa-crown mr-1" style="color:#f39c12"></i>@endif {{ $evaluation['nom_equipe'] }}</h3>

                                                <?php
                                                $etablissement = App\Models\User::where('id', $evaluation['etablissement_id'])->first();
                                                ?>
                                                <div class="text-monospace text-muted small" style="font-size:70%;color:silver;">[{{$id}}] {{$etablissement->etablissement}} - {{$etablissement->ville}} - {{$etablissement->pays}} - {{$etablissement->email}}</div>
                                            </div>

                                            <div class="card-footer mt-2">
                                                <div class="text-center">
                                                    <a href="/console/jouer-jeu-pyxel/{{$evaluation['etablissement_jeton'].'-'.$evaluation['python_id']}}" class="btn btn-success btn-sm" target="_blank" role="button"><i class="fas fa-gamepad fa-2x"></i></a>
                                                </div>
                                                <div class="mt-2 mb-1 text-monospace small">
                                                    <div>Nb d'évaluations: <span class="text-primary font-weight-bold">{{ $evaluation['nb_evals'] }}</span></div>
                                                </div>
                                                <div class="text-center">
                                                    <kbd class="text-center" style="display:block;">Note globale:<span class="text-primary font-weight-bold">@if($evaluation['note'] != 0) {{ round($evaluation['note'],2) }} @else - @endif</span></kbd>
                                                </div>
                                            </div>

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
