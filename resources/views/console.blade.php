@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <title>NdC Console</title>
</head>
<body>

    @include('inc-nav-console')

	<div class="container mt-4 mb-5">
		<div class="row">

            <div class="col-md-2 mt-5 mb-5">
                <a class=" btn btn-info btn-sm btn-block text-left" href="https://nuitducode.github.io/DOCUMENTATION/organisation/" role="button" target="_blank">organisation</a>
                <a class=" btn btn-info btn-sm btn-block text-left" href="https://nuitducode.github.io/DOCUMENTATION/regles-conseils/" role="button" target="_blank">règles et conseils</a>
                <a class=" btn btn-info btn-sm btn-block text-left" href="https://www.nuitducode.net/images" role="button" target="_blank">logos & affiches</a>

                <a class=" btn btn-secondary btn-sm btn-block text-left mt-4" href="https://nuitducode.github.io/DOCUMENTATION/SCRATCH/01-introduction/" role="button" target="_blank">entrainement scratch</a>
                <a class=" btn btn-secondary btn-sm btn-block text-left" href="https://nuitducode.github.io/DOCUMENTATION/PYTHON/01-presentation/" role="button" target="_blank">entrainement python</a>

                <a class=" btn btn-light btn-sm btn-block text-left mt-4" href="/console/fiche-inscription" role="button"><i class="far fa-address-card pr-2"></i> fiche d'inscription</a>
                <a class=" btn btn-light btn-sm btn-block text-left" href="https://github.com/nuitducode/ORGANISATION/discussions" target="_blank" role="button"><i class="far fa-comment-alt pr-2"></i> discussions</a>

                @if (Auth::user()->is_admin == 1)
                    <a class=" btn btn-danger btn-sm text-left mt-3" href="/console/admin" role="button"><i class="fas fa-shield-alt"></i></a>
                @endif

            </div>

			<div class="col-md-10">

				@if (session('status'))
					<div class="text-success text-monospace text-center pb-4" role="alert">
						{{ session('status') }}
					</div>
				@endif

                <h1 class="m-0 p-0">NUIT DU C0DE 2022</h1>
                <div class="small text-monospace" style="color:silver">2 mai - 11 juin</div>


                <div style="border:1px solid #dfdfdf;border-radius:4px;padding:20px;">
                    <div class="row">
                        <div class="col-12">

                            <div class="text-monospace text-danger small" style="text-align:justify">
                                <b>IMPORTANT</b><br />
                                <ul>
                                    <li class="mb-1">Les univers de jeu ainsi que les liens sont <u>confidentiels</u>. Ils ne doivent être partagés qu'avec les élèves qui participent à la Nuit du code. Il est important de bien indiquer aux élèves qu'ils ne doivent s'en servir que pour créer leur jeu pendant la durée de la Nuit du code et qu'ils ne doivent les partager avec personne d'autre.</li>
                                    <li class="mb-1">Autre information importante pour les élèves qui utiliseront Scratch : le titre du jeu créé par une équipe doit être le nom de l'équipe. Les mots suivants ne doivent pas apparaître dans le titre ni dans les champs "Instructions" et "Notes et Crédits" du jeu (ou des différentes versions du jeu): "nuit", "code", "c0de", "2022", "NdC", "ndc".</li>
                                    <li class="mb-1">Toujours concernant Scratch : les élèves ne doivent créer leur jeu qu'à partir des éléments fournis. Une fois qu'ils ont choisi leur univers de jeu, ils cliquent sur "Remix". Il n'est pas autorisé d'importer des ressources d'autres univers (images, lutins, scènes ou sons). Tout comme il n'est pas autorisé de regarder ou copier/coller des scripts d'autres projets présents sur l'ordinateur ou sur internet. Enfin, il n'est pas autorisé d'aller chercher des tutoriels (vidéos ou autres) durant l'événement. Par contre, les élèves peuvent solliciter les encadrants et s'entraider. C'est même recommandé.</li>
                                    <li>Pour Scratch et Python, les élèves doivent écrire une courte documentation (ou mode d'emploi) du jeu. Pour Scratch, cette documentation doit être placée dans le champ "Instructions". Et pour Python, elle doit être écrite dans des "docstrings" en début de code dans le fichier .py.
                                </ul>
                            </div>

                            <h3 class="m-0 mt-5 mb-2"><span class="badge badge-pill badge-primary">1</span> Documents pour les équipes <sup><i class="fas fa-question-circle text-muted" data-boundary="window" data-toggle="tooltip" data-placement="auto" title="Documents à distribuer aux équipes le jour de la Nuit du c0de ou quelques jours avant."></i></sup></h3>
                            <div class="row">
                                <div class="col-3">
                                    <a class=" btn btn-light btn-block btn-sm" href="https://github.com/nuitducode/DOCUMENTATION/raw/main/regles-et-conseils-scratch.pdf" role="button">Règles et Conseils<br /><span style="font-size:80%;color:gray">Scratch</span></a>
                                    <div class="text-center text-monospace mt-1" style="color:silver;font-size:55%">à distribuer (format papier ou numérique)</div>
                                </div>
                                <div class="col-3">
                                    <a class=" btn btn-light btn-block btn-sm" href="https://github.com/nuitducode/DOCUMENTATION/raw/main/regles-et-conseils-python.pdf" role="button">Règles et Conseils<br /><span style="font-size:80%;color:gray">Python</span></a>
                                    <div class="text-center text-monospace mt-1" style="color:silver;font-size:55%">à distribuer (format papier ou numérique)</div>
                                </div>
                                <div class="col-3">
                                    <a class=" btn btn-light btn-block btn-sm" href="https://github.com/nuitducode/DOCUMENTATION/raw/main/carnet-de-bord-scratch.pdf" role="button">Carnet de bord<br /><span style="font-size:80%;color:gray">Scratch</span></a>
                                    <div class="text-center text-monospace mt-1" style="color:silver;font-size:55%">optionnel: à imprimer et distribuer</div>
                                </div>
                                <div class="col-3">
                                    <a class=" btn btn-light btn-block btn-sm" href="https://github.com/nuitducode/DOCUMENTATION/raw/main/carnet-de-bord-python.pdf" role="button">Carnet de bord<br /><span style="font-size:80%;color:gray">Python</span></a>
                                    <div class="text-center text-monospace mt-1" style="color:silver;font-size:55%">optionnel: à imprimer et distribuer</div>
                                </div>
                            </div>

                            <h3 class="mt-5"><span class="badge badge-pill badge-primary">2</span> Univers de jeu</h3>
                            <div class="mt-1 ml-4">
                                <div><u>Scratch</u> <sup><i class="fas fa-question-circle text-muted" data-boundary="window" data-toggle="tooltip" data-placement="auto" title="Lien vers les univers de jeu Scratch. Plusieurs univers de jeu sont proposés. Les équipes en prennent connaissance, les étudient et elles en choisissent un qu'elles 'remixent'."></i></sup></div>
                                <!--
                                Vous pouvez fournir aux élèves soit le lien (pour qu'ils puissent "mixer" les univers de jeu) soit les fichiers (pour qu'ils puissent les importer).
                                -->
                                Lien à fournir aux équipes : <span class="text-monospace text-success">{!!$scratch_lien!!}</span></li>
                            </div>
                            <div class="mt-3 ml-4">
                                <div><u>Python / Pyxel</u> <sup><i class="fas fa-question-circle text-muted" data-boundary="window" data-toggle="tooltip" data-placement="auto" title="Lien vers les univers de jeu Pyxel (fichiers .pyxres). Les équipes ne sont pas obligées d'en choisir un. Elles peuvent créer leurs propres images avec l'éditeur Pyxel. Elles peuvent aussi créer un jeu sans images, en utilisant seulement les formes géométriques."></i></sup></div>
                                Lien à fournir aux équipes : <span class="text-monospace text-success">{!!$python_fichiers!!}</span>
                            </div>

                            <h3 class="mt-5"><span class="badge badge-pill badge-primary">3</span> Enregistrement et Évaluation des Jeux</h3>
                            <div class="mb-1 ml-4">
                                <a class=" btn btn-success" href="/console/ndc?p=enregistrement" role="button">enregistrement</a>
                                <a class=" btn btn-success" href="/console/ndc?p=evaluation" role="button">évaluation</a>
                            </div>

                            <h3 class="mt-5"><span class="badge badge-pill badge-primary">4</span> Bilan des évaluations</h3>
                            <div class="mb-1 ml-4">
                                <a class=" btn btn-info" href="/console/ndc/jeux-evaluations" role="button"><i class="fas fa-trophy"></i></a>
                            </div>

                            <h3 class="mt-5"><span class="badge badge-pill badge-primary">5</span> Finalistes</h3>
                            <div class="ml-2 mb-1 ml-4 pl-4 pr-4 pb-4 pt-3" style="border-radius:4px;border:1px solid #dfdfdf;@if(Auth::user()->fin_evaluations == 0) background-color:#f3f5f7 @else  background-color:#ffc905 @endif">
                                <?php
                                $categories = ['C3' => 'Scratch - Cycle 3', 'C4' => 'Scratch - Cycle 4', 'LY' => 'Scratch - Lycée', 'PI' => 'Python - Première', 'POO' => 'Python - Terminale'];
                                $finalistes = [];
                                foreach ($categories AS $categorie_code => $categorie){
                                    $jeux = App\Models\Game::where([['etablissement_id', Auth::user()->id], ['type', 'ndc'], ['categorie', $categorie_code]])->get();
                                    $evaluations = [];
                                    foreach($jeux AS $jeu){
                                        $note = App\Models\Evaluation::where([['etablissement_id', Auth::user()->id], ['game_id', $jeu->id]])->avg('note');
                                        $evaluations[$jeu->id] = ["nom_equipe"=>$jeu->nom_equipe, "jeu_id"=>$jeu->id, "note"=>$note];
                                    }
                                    uasort($evaluations, fn($a, $b) => $a['note'] <=> $b['note']);
                                    $evaluations = array_reverse($evaluations);
                                    if(isset($evaluations[0])){
                                        if(isset($evaluations[0]) and $evaluations[0]["note"] > 0){
                                            if(Auth::user()->fin_evaluations == 0 ){
                                                echo "<h4>" . $categorie . "</h4>";
                                            }else{
                                                echo "<h4><i class='fas fa-crown mr-2' style='color:#f39c12'></i>" . $categorie . "</h4>";
                                            }
                                        }

                                        echo "<ul>";
                                        if(isset($evaluations[0]) and $evaluations[0]["note"] > 0){
                                            $finalistes[] = $evaluations[0]["jeu_id"];
                                            echo "<li>" . $evaluations[0]["nom_equipe"] . "</li>";
                                        }
                                        if(isset($evaluations[1]) and $evaluations[1]["note"] > 0){
                                            $finalistes[] = $evaluations[1]["jeu_id"];
                                            echo "<li>" . $evaluations[1]["nom_equipe"] . "</li>";
                                        }
                                        echo "</ul>";
                                    }
                                }
                                ?>
                                @if(Auth::user()->fin_evaluations == 0)
                                <form method="POST" action="{{ route('valider-finalistes') }}">
                                @else
                                <form method="POST" action="{{ route('invalider-finalistes') }}">
                                @endif
                                    @csrf
                                    <input type="hidden" name="finalistes" value="{{serialize($finalistes)}}" />
                                    @if(Auth::user()->fin_evaluations == 0)
                                    <div class="text-center"><button type="submit" class="btn btn-primary btn-sm mt-2 pl-4 pr-4" data-boundary="window" data-html="truer" data-toggle="tooltip" data-placement="top" title="fin des évaluations<br />valider la liste"><i class="fas fa-unlock"></i></button></div>
                                    @else
                                    <div class="text-center"><button type="submit" class="btn btn-primary btn-sm mt-2 pl-4 pr-4" data-boundary="window" data-toggle="tooltip" data-placement="top" title="dévérouiller la liste"><i class="fas fa-lock"></i></button></div>
                                    @endif
                                </form>
                            </div>

                            <h3 class="mt-5"><span class="badge badge-pill badge-primary">6</span> Évaluation des finalistes</h3>
                            <div class="mb-1 ml-4">
                                <a class="btn btn-success" href="/console/evaluation-finalistes-categories" role="button">évaluer</a>
                            </div>

                        </div>
                    </div>
                </div>

                <h2 class="mb-0">DONNÉES<sup class="text-danger">*</sup></h2>
                <div class="text-danger text-monospace" style="font-size:70%">à mettre à jour au fur et à mesure que les données sont connues</div>

                <form method="POST" action="{{ route('fiche-inscription-details_post') }}" style="border:1px solid #dfdfdf;border-radius:4px;padding:20px;background-color:#f3f5f7;">
                    @csrf

                    <div class="row">


                        <div class="col-md-4">

                            <h3 class="m-0">JOUR J</h3>
                            <?php
                            $datetime = new DateTime(Auth::user()->ndc_date);
                            $jour = $datetime->format('j');
                            $mois = $datetime->format('m');
                            $heure = $datetime->format('H').':'.$datetime->format('i');
                            ?>
                            <table class="table table-borderless table-sm table-responsive mt-1">
                                <tr>
                                    <td></td>
                                    <td class="text-center text-muted" style="line-height:1em;font-size:70%"><br />Mois</td>
                                    <td class="text-center text-muted" style="line-height:1em;font-size:70%"><br />Jour</td>
                                </tr>
                                <tr>
                                    <td class="text-right">Date</td>
                                    <td class="text-center">
                                        <select id="ndc_mois" name="ndc_mois" class="form-control form-control-sm">
                                            <option value="05" @if($mois == '05') selected @endif>mai</option>
                                            <option value="06" @if($mois == '06') selected @endif>juin</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <select id="ndc_jour" name="ndc_jour" class="form-control form-control-sm">
                                            @for ($j = 1; $j <= 31; $j++)
                                            <option value="{{$j}}" @if($jour == $j) selected @endif>{{ $j }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right pt-3">Cloture</td>
                                    <td class="text-center pt-3">
                                        <select id="ndc_heure_fin" name="ndc_heure_fin" class="form-control form-control-sm">
                                            @for ($h = 12; $h <= 23; $h++)
                                            <option value="{{$h}}:00" @if($heure == $h.':00') selected @endif>{{$h}}h00</option>
                                            <option value="{{$h}}:30" @if($heure == $h.':30') selected @endif>{{$h}}h30</option>
                                            @endfor
                                            <option value="00:00" @if($heure == '00:00') selected @endif>minuit</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>

                        </div>

                        <div class="col-md-4">

                            <h3 class="m-0">SCRATCH</h3>
                            <table class="table table-borderless table-sm table-responsive mt-1">
                                <tr>
                                    <td></td>
                                    <td class="text-center text-muted" style="line-height:1em;font-size:70%">Nombre<br />d'équipes</td>
                                    <td class="text-center text-muted" style="line-height:1em;font-size:70%">Nombre<br />d'élèves</td>
                                </tr>
                                <tr>
                                    <td class="text-right" style="line-height:1em">Cycle 3<br /><span style="font-size:70%;color:gray">CM1 > 6<sup>e</sup></span></td>
                                    <td class="text-center"><input id="scratch_nb_equipes_c3" name="scratch_nb_equipes_c3" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->scratch_nb_equipes_c3}}" /></td>
                                    <td class="text-center"><input id="scratch_nb_eleves_c3" name="scratch_nb_eleves_c3" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->scratch_nb_eleves_c3}}" /></td>
                                </tr>
                                <tr>
                                    <td class="text-right" style="line-height:1em">Cycle 4<br /><span style="font-size:70%;color:gray">5<sup>e</sup> > 3<sup>e</sup></span></td>
                                    <td class="text-center"><input id="scratch_nb_equipes_c4" name="scratch_nb_equipes_c4" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->scratch_nb_equipes_c4}}" /></td>
                                    <td class="text-center"><input id="scratch_nb_eleves_c4" name="scratch_nb_eleves_c4" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->scratch_nb_eleves_c4}}" /></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Lycée</td>
                                    <td class="text-center"><input id="scratch_nb_equipes_lycee" name="scratch_nb_equipes_lycee" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->scratch_nb_equipes_lycee}}" /></td>
                                    <td class="text-center"><input id="scratch_nb_eleves_lycee" name="scratch_nb_eleves_lycee" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->scratch_nb_eleves_lycee}}" /></td>
                                </tr>
                            </table>

                        </div>

                        <div class="col-md-4">

                            <h3 class="m-0">PYTHON</h3>
                            <table class="table table-borderless table-sm table-responsive mt-1">
                                <tr>
                                    <td></td>
                                    <td class="text-center text-muted" style="line-height:1em;font-size:70%">Nombre<br />d'équipes</td>
                                    <td class="text-center text-muted" style="line-height:1em;font-size:70%">Nombre<br />d'élèves</td>
                                </tr>
                                <tr>
                                    <td class="text-right">1<sup>re</sup> NSI <sup><i class="fas fa-question-circle text-muted" data-boundary="window" data-toggle="tooltip" data-placement="auto" title="Élèves de Première NSI ou élèves ayant les connaissances suffisantes en programmation impérative Python"></i></sup></td>
                                    <td class="text-center"><input  id="python_nb_equipes_pi" name="python_nb_equipes_pi" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->python_nb_equipes_pi}}" /></td>
                                    <td class="text-center"><input  id="python_nb_eleves_pi" name="python_nb_eleves_pi" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->python_nb_eleves_pi}}" /></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Tle NSI <sup><i class="fas fa-question-circle text-muted" data-boundary="window" data-toggle="tooltip" data-placement="auto" title="Élèves de Terminale NSI ou élèves ayant les connaissances suffisantes en programmation orientée objet Python"></i></sup></td>
                                    <td class="text-center"><input  id="python_nb_equipes_poo" name="python_nb_equipes_poo" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->python_nb_equipes_poo}}" /></td>
                                    <td class="text-center"><input  id="python_nb_eleves_poo" name="python_nb_eleves_poo" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->python_nb_eleves_poo}}" /></td>
                                </tr>
                            </table>

                        </div>

                    </div><!-- /row -->

                    <div class="text-center"><button type="submit" class="btn btn-primary btn-sm mt-2 pl-4 pr-4"><i class="fas fa-check"></i></button></div>
                </form>


                <h2 class="m-0">
                    <a data-toggle="collapse" href="#collapse_preparation" role="button" aria-expanded="false" aria-controls="collapse_preparation"><i class="fas fa-plus-square"></i></a>
                    PRÉPARATION
                </h2>
                <div class="collapse" id="collapse_preparation">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center text-monospace small p-2">
                            <span><i class="fas fa-angle-right text-danger"></i> Inscription de l'établissement</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center text-monospace small p-2">
                            <span><i class="fas fa-angle-right text-danger"></i> Choix de la date de l'événement (saisir cette date dans la section "JOUR J")</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center text-monospace small p-2">
                            <span><i class="fas fa-angle-right text-danger"></i> Préparation de l'événement dans l'établissement (date, lieux, autoriations, affiches, ordinateurs, nourriture, boissons, décoration...)</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center text-monospace small p-2">
                            <span><i class="fas fa-angle-right text-danger"></i> Entraînement des élèves</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center text-monospace small p-2"><span><i class="fas fa-angle-right text-danger"></i> Sélection des élèves (si le nombre d'élèves intéressés est trop grand)</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center text-monospace small p-2"><span><i class="fas fa-angle-right text-danger"></i> Création des équipes qui participeront à l'événement (indiquer, ci-dessous, le nombre d'équipes et d'élèves pour chaque catégories, mettre 0 pour les catégories sans participants)</span></li>
                    </ul>
                </div>

                <h2 class="m-0">
                    <a data-toggle="collapse" href="#collapse_selections" role="button" aria-expanded="false" aria-controls="collapse_selections"><i class="fas fa-plus-square"></i></a>
                    SÉLECTIONS & BAC à SABLE
                </h2>
                <div class="collapse" id="collapse_selections">
                    <div class="row">
                        <div class="col-md-4 mt-2 mb-3">
                            <a class=" btn btn-light btn-sm btn-block" href="/console/sltn" role="button">Organiser des sélections</a>
                            <a class=" btn btn-light btn-sm btn-block mt-2" style="opacity:0.8" href="/console/bas" role="button">Bac à sable</a>
                        </div>
                    </div>
                </div>

            </div>

        </div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
