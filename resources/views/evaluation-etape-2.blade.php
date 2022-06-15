@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <title>Nuit du c0de | Évaluation - étape 2</title>
</head>
<body>

    @include('inc-nav')

    <?php
    if (Auth::user()->fin_evaluations == 1){
        echo '<div class="text-success text-monospace text-center mt-5 pb-4" role="alert">';
        echo 'LES ÉVALUATIONS SONT MAINTEANT TERMINÉES';
        echo '</div>';
        echo '</body>';
        echo '</html>';
        exit;
    }
    ?>

	<div class="container mt-4 mb-5">
		<div class="row pt-3">
			<div class="col-md-2"></div>

			<div class="col-md-10">

                @if (session('message'))
                    <div class="text-success text-monospace text-center mt-5 pb-4" role="alert">
                        {{ session('message') }}
                        <br />
                        <a class="btn btn-light btn-sm mt-3" href="/" role="button"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    @php
                    exit;
                    @endphp
                @endif

                <?php
                $etablissement_jeton = $token[6].$token[4].$token[2].$token[0];
                $jeux = App\Models\Game::where([['etablissement_jeton', $etablissement_jeton], ['type', request()->segment(1)], ['categorie', $categorie]])->get();
                if (count($jeux) !== 0) {

                    // SCRATCH
                    $critere1_scratch_titre = "Jouabilité";
                    $critere1_scratch_description = "Facilité et rapidité de la prise en main, absence de bogues, environnement intuitif, nombre de niveaux / scènes, difficulté progressive...";
                    $critere2_scratch_titre = "Richesse / Complexité";
                    $critere2_scratch_description = "Nombre de lutins et décors, niveaux / scènes multiples, variété des actions, défilements, effets...";
                    $critere3_scratch_titre = "Originalité / Créativité";
                    $critere3_scratch_description = "Utilisation originale des lutins et des décors, orginalité du scénario, lutins à contre emploi, présentation décalée...";
                    $critere4_scratch_titre = "Respect des consignes / Documentation";
                    $critere4_scratch_description = "Absence d'éléments extérieurs, intégrité des lutins, documentation claire et complète...";

                    if (in_array($categorie, ['C3', 'C4', 'LY'])) {
                        ?>

                        <form method="POST" action="{{ route(request()->segment(1).'-evaluation-etape-2_post') }}">
                            @csrf

                            <?php
                            foreach ($jeux AS $jeu) {
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="mb-1" style="color:#4cbf56">{{$jeu->nom_equipe}}</h2>
                                    </div>
                                </div>
                                <?php
                                $json = @file_get_contents("https://api.scratch.mit.edu/projects/".$jeu->scratch_id);
                                if ($json !== FALSE) {
                                    $jeu_scratch = json_decode($json);
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            @if($jury_type != 'eleve')
                                            <h3 class="mb-1 mt-1">[NdC 2022 - C3] {{$jeu_scratch->title}}</h3>
                                            <div class="text-monospace small text-muted">Création : {{$jeu_scratch->history->created}}</div>
                                            <div class="text-monospace small text-muted">Derniere modification : {{$jeu_scratch->history->modified}}</div>
                                            @endif
                                            <div class="text-monospace small">Si le jeu ne s'affiche pas correctement, vous pouvez l'ouvrir dans un autre onglet en cliquant <a href="https://scratch.mit.edu/projects/{{$jeu_scratch->id}}" target="_blank">ici</a>.</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <div><img src="https://uploads.scratch.mit.edu/get_image/project/{{$jeu->scratch_id}}_282x218.png" class="img-fluid" style="border-radius:4px;" width="100%" /></div>
                                            <button type="button" class="btn btn-success btn-sm mt-2 mb-3" onClick="this.previousElementSibling.innerHTML='<iframe src=\'https://scratch.mit.edu/projects/{{$jeu->scratch_id}}/embed\' width=\'100%\' height=\'402\' frameborder=\'0\' scrolling=\'no\'></iframe>'">lancer / recharger le jeu</button>
                                            <div class="small text-monospace text-left" style="border:1px solid silver; padding:10px;border-radius:4px; background-color:white;">
                                                @if ($jeu_scratch->instructions != NULL)
                                                    {{$jeu_scratch->instructions}}
                                                @else
                                                    <span class="text-danger">pas d'instructions</span>
                                                @endif
                                            </div>
                                            @if($jury_type != 'eleve')
                                            <div class="text-monospace small text-muted pt-1 pl-1">
                                                <i class="fas fa-gamepad" style="font-size:140%;vertical-align:-1px;"></i> <a href="https://scratch.mit.edu/projects/{{$jeu_scratch->id}}" target="_blank">{{$jeu_scratch->id}}</a> ~
                                                <i class="fas fa-user-circle"></i> <a href="https://scratch.mit.edu/users/{{$jeu_scratch->author->username}}" target="_blank">{{$jeu_scratch->author->username}}</a>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">

                                            <div class="text-uppercase" style="color:#cf63cf">
                                                {{$critere1_scratch_titre}} <sup class="ml-1" style="color:silver;cursor:pointer;"><i class="fas fa-question-circle" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="right" data-content="{{$critere1_scratch_description}}"></i></sup>
                                            </div>
                                            <div class="row mt-2 mb-3">
                                                <div class="col">
                                                    <input type="range" id="{{$jeu->scratch_id}}_critere1" name="evaluation[{{$jeu->scratch_id}}]['critere1']" class="custom-range" value="-1" min="-1" max="5" step="1" oninput="curseur(this.id, this.value);">
                                                </div>
                                                <div class="col-auto text-secondary text-center font-weight-bold" id="{{$jeu->scratch_id}}_critere1_note" style="width:40px;">
                                                    <i class="fas fa-times text-danger"></i>
                                                </div>
                                            </div>

                                            <div class="text-uppercase" style="color:#cf63cf">
                                                {{$critere2_scratch_titre}} <sup class="ml-1" style="color:silver;cursor:pointer;"><i class="fas fa-question-circle" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="right" data-content="{{$critere2_scratch_description}}"></i></sup>
                                            </div>
                                            <div class="row mt-2 mb-3">
                                                <div class="col">
                                                    <input type="range" id="{{$jeu->scratch_id}}_critere2" name="evaluation[{{$jeu->scratch_id}}]['critere2']" class="custom-range" value="-1" min="-1" max="5" step="1" oninput="curseur(this.id, this.value);">
                                                </div>
                                                <div class="col-auto text-secondary text-center font-weight-bold" id="{{$jeu->scratch_id}}_critere2_note" style="width:40px;">
                                                    <i class="fas fa-times text-danger"></i>
                                                </div>
                                            </div>

                                            <div class="text-uppercase" style="color:#cf63cf">
                                                {{$critere3_scratch_titre}} <sup class="ml-1" style="color:silver;cursor:pointer;"><i class="fas fa-question-circle" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="right" data-content="{{$critere3_scratch_description}}"></i></sup>
                                            </div>
                                            <div class="row mt-2 mb-3">
                                                <div class="col">
                                                    <input type="range" id="{{$jeu->scratch_id}}_critere3" name="evaluation[{{$jeu->scratch_id}}]['critere3']" class="custom-range" value="-1" min="-1" max="5" step="1" oninput="curseur(this.id, this.value);">
                                                </div>
                                                <div class="col-auto text-secondary text-center font-weight-bold" id="{{$jeu->scratch_id}}_critere3_note" style="width:40px;">
                                                    <i class="fas fa-times text-danger"></i>
                                                </div>
                                            </div>

                                            <div class="text-uppercase" style="color:#cf63cf">
                                                {{$critere4_scratch_titre}} <sup class="ml-1" style="color:silver;cursor:pointer;"><i class="fas fa-question-circle" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="right" data-content="{{$critere4_scratch_description}}"></i></sup>
                                            </div>
                                            <div class="row mt-2 mb-3">
                                                <div class="col">
                                                    <input type="range" id="{{$jeu->scratch_id}}_critere4" name="evaluation[{{$jeu->scratch_id}}]['critere4']" class="custom-range" value="-1" min="-1" max="5" step="1" oninput="curseur(this.id, this.value);">
                                                </div>
                                                <div class="col-auto text-secondary text-center font-weight-bold" id="{{$jeu->scratch_id}}_critere4_note" style="width:40px;">
                                                    <i class="fas fa-times text-danger"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                <?php
                                } else {
                                    ?>
                                    <div class="text-monospace small text-danger">Cet identifiant Scratch n'existe pas! [{{$jeu->scratch_id}}]</div>
                                    <div class="text-monospace small text-danger">Vérifier que le jeu a bien été partagé (bouton orange "Partager", ou "Share" en anglais).</div>
                                    <br />
                                    <br />
                                    <?php
                                }
                            }
                            ?>
                            <input id="etablissement_jeton" name="etablissement_jeton" type="hidden" value="{{$etablissement_jeton}}" />
                            <input id="categorie" name="categorie" type="hidden" value="{{$categorie}}" />
                            <input id="jury_nom" name="jury_nom" type="hidden" value="{{$jury_nom}}" />
                            <input id="jury_type" name="jury_type" type="hidden" value="{{$jury_type}}" />
                            <input id="langage" name="langage" type="hidden" value="scratch" />
                            <button type="submit" id="submit_jeu" class="btn btn-primary" disabled><i class="fas fa-check"></i></button>
                        </form>
                        <?php
                    }

                    // PYTHON
                    $critere1_python_titre = "Jouabilité";
                    $critere1_python_description = "Facilité et rapidité de la prise en main, absence de bogues, environnement intuitif, nombre de niveaux / scènes, difficulté progressive...";
                    $critere2_python_titre = "Richesse / complexité";
                    $critere2_python_description = "Nombre de personnages / objets / décors, niveaux / scènes multiples, variété des actions, défilements, effets...";
                    $critere3_python_titre = "Originalité / créativité";
                    $critere3_python_description = "Utilisation originale des personnages / objets / décors, orginalité du scénario, présentation décalée...";
                    $critere4_python_titre = "Documentation";
                    $critere4_python_description = "Documentation claire et complète.";

                    if (in_array($categorie, ['PI', 'POO'])) {
                        ?>

                        <form method="POST" action="{{ route(request()->segment(1).'-evaluation-etape-2_post') }}">
                            @csrf

                            <?php
                            foreach ($jeux AS $jeu) {
                                if(File::exists(storage_path("app/public/fichiers_pyxel/".$jeu->etablissement_jeton.'-'.$jeu->python_id))) {
                                    $files = File::files(storage_path("app/public/fichiers_pyxel/".$jeu->etablissement_jeton.'-'.$jeu->python_id));
                                    ?>
                                    @if($jury_type != 'eleve')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="mb-1" style="color:#4cbf56">{{$jeu->nom_equipe}}</h2>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-md-6">
<pre class="m-0"><code id="htmlViewer" style="color:rgb(216, 222, 233); font-weight:400;background-color:rgb(46, 52, 64);background:rgb(46, 52, 64);display:block;padding: 1.5em;border-radius:5px;"><span style="color:rgb(129, 161, 193); font-weight:400;">import</span> requests, os
code = <span style="color:rgb(163, 190, 140); font-weight:400;">'{{$jeu->etablissement_jeton}}-{{$jeu->python_id}}'</span>
site = <span style="color:rgb(163, 190, 140); font-weight:400;">'https://www.nuitducode.net'</span>
url = site + <span style="color:rgb(163, 190, 140); font-weight:400;">'/storage/fichiers_pyxel/'</span> + code
@foreach($files as $file)
<span style="color:rgb(129, 161, 193); font-weight:400;">{{pathinfo($file, PATHINFO_EXTENSION)}}</span> = requests.<span style="color:rgb(129, 161, 193); font-weight:400;">get</span>(url + <span style="color:rgb(163, 190, 140); font-weight:400;">'/{{basename($file)}}'</span>)
with <span style="color:rgb(129, 161, 193); font-weight:400;">open</span>(<span style="color:rgb(163, 190, 140); font-weight:400;">'{{basename($file)}}'</span>, <span style="color:rgb(163, 190, 140); font-weight:400;">'wb'</span>) <span style="color:rgb(129, 161, 193); font-weight:400;">as</span> file:
    file.write(<span style="color:rgb(129, 161, 193); font-weight:400;">{{pathinfo($file, PATHINFO_EXTENSION)}}</span>.content)
@endforeach
@foreach($files as $file)
@if(pathinfo($file, PATHINFO_EXTENSION) == 'py')
print(<span style="color:rgb(129, 161, 193); font-weight:400;">py</span>.content.<span style="color:rgb(129, 161, 193); font-weight:400;">decode</span>())
os.system(<span style="color:rgb(163, 190, 140); font-weight:400;">'pyxel run "{{basename($file)}}"'</span>)
@endif
@endforeach
</code></pre>
<div class="text-monospace text-muted p-2" style="text-align:justify;font-size:70%;">
    Copier-coller ce code dans un environnement Python possédant la bibliothèque <a href="https://github.com/kitao/pyxel/" target="_blank">Pyxel</a> pour lancer le jeu.<br />
    Pour installer un environnement Python + Pyxel, voir la <a href="https://nuitducode.github.io/DOCUMENTATION/PYTHON/02-installation/" target="_blank">documentation</a>.
</div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="text-uppercase" style="color:#cf63cf">
                                                {{$critere1_python_titre}} <sup class="ml-1" style="color:silver;cursor:pointer;"><i class="fas fa-question-circle" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="right" data-content="{{$critere1_python_description}}"></i></sup>
                                            </div>
                                            <div class="row mt-2 mb-3">
                                                <div class="col">
                                                    <input type="range" id="{{$jeu->python_id}}_critere1" name="evaluation[{{$jeu->python_id}}]['critere1']" class="custom-range" value="-1" min="-1" max="5" step="1" oninput="curseur(this.id, this.value);">
                                                </div>
                                                <div class="col-auto text-secondary text-center font-weight-bold" id="{{$jeu->python_id}}_critere1_note" style="width:40px;">
                                                    <i class="fas fa-times text-danger"></i>
                                                </div>
                                            </div>

                                            <div class="text-uppercase" style="color:#cf63cf">
                                                {{$critere2_python_titre}} <sup class="ml-1" style="color:silver;cursor:pointer;"><i class="fas fa-question-circle" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="right" data-content="{{$critere2_python_description}}"></i></sup>
                                            </div>
                                            <div class="row mt-2 mb-3">
                                                <div class="col">
                                                    <input type="range" id="{{$jeu->python_id}}_critere2" name="evaluation[{{$jeu->python_id}}]['critere2']" class="custom-range" value="-1" min="-1" max="5" step="1" oninput="curseur(this.id, this.value);">
                                                </div>
                                                <div class="col-auto text-secondary text-center font-weight-bold" id="{{$jeu->python_id}}_critere2_note" style="width:40px;">
                                                    <i class="fas fa-times text-danger"></i>
                                                </div>
                                            </div>

                                            <div class="text-uppercase" style="color:#cf63cf">
                                                {{$critere3_python_titre}} <sup class="ml-1" style="color:silver;cursor:pointer;"><i class="fas fa-question-circle" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="right" data-content="{{$critere3_python_description}}"></i></sup>
                                            </div>
                                            <div class="row mt-2 mb-3">
                                                <div class="col">
                                                    <input type="range" id="{{$jeu->python_id}}_critere3" name="evaluation[{{$jeu->python_id}}]['critere3']" class="custom-range" value="-1" min="-1" max="5" step="1" oninput="curseur(this.id, this.value);">
                                                </div>
                                                <div class="col-auto text-secondary text-center font-weight-bold" id="{{$jeu->python_id}}_critere3_note" style="width:40px;">
                                                    <i class="fas fa-times text-danger"></i>
                                                </div>
                                            </div>

                                            <div class="text-uppercase" style="color:#cf63cf">
                                                {{$critere4_python_titre}} <sup class="ml-1" style="color:silver;cursor:pointer;"><i class="fas fa-question-circle" data-toggle="popover" data-trigger="hover" data-html="true" data-placement="right" data-content="{{$critere4_python_description}}"></i></sup>
                                            </div>
                                            <div class="row mt-2 mb-3">
                                                <div class="col">
                                                    <input type="range" id="{{$jeu->python_id}}_critere4" name="evaluation[{{$jeu->python_id}}]['critere4']" class="custom-range" value="-1" min="-1" max="5" step="1" oninput="curseur(this.id, this.value);">
                                                </div>
                                                <div class="col-auto text-secondary text-center font-weight-bold" id="{{$jeu->python_id}}_critere4_note" style="width:40px;">
                                                    <i class="fas fa-times text-danger"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                <?php
                                }
                            }
                            ?>
                            <input id="etablissement_jeton" name="etablissement_jeton" type="hidden" value="{{$etablissement_jeton}}" />
                            <input id="categorie" name="categorie" type="hidden" value="{{$categorie}}" />
                            <input id="jury_nom" name="jury_nom" type="hidden" value="{{$jury_nom}}" />
                            <input id="jury_type" name="jury_type" type="hidden" value="{{$jury_type}}" />
                            <input id="langage" name="langage" type="hidden" value="python" />
                            <button type="submit" id="submit_jeu" class="btn btn-primary" disabled><i class="fas fa-check"></i></button>
                        </form>
                        <?php
                    }
                } else {
                    ?>
                    <div class="text-success text-monospace text-center mt-5 pb-4" role="alert">
                        Pas de jeu à évaluer.
                        <br />
                        <a class="btn btn-light btn-sm mt-3" href="{{ URL::previous() }}" role="button"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div><!-- /row -->
	</div><!-- /container -->

    <script>
    function curseur(id, note) {
        if (note == "-1") {
            document.getElementById(id+"_note").innerHTML = '<i class="fas fa-times text-danger">';
        }else {
            document.getElementById(id+"_note").innerHTML = note;
        }
        var inputs, index, values;
        values = []
        inputs = document.getElementsByTagName('input');
        for (index = 0; index < inputs.length; ++index) {
            values.push(inputs[index].value);
        }
        document.getElementById('submit_jeu').disabled = values.includes("-1");
    }
    </script>

    <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    </script>

	@include('inc-bottom-js')

</body>
</html>
