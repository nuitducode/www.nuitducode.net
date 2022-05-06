@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <title>NdC Console</title>
</head>
<body>

    @include('inc-nav-console')

	<div class="container mb-5">
		<div class="row">

            <div class="col-md-2 mt-5">
                <a class=" btn btn-info btn-sm btn-block text-left" href="https://nuitducode.github.io/DOCUMENTATION/organisation/" role="button" target="_blank">organisation</a>
                <a class=" btn btn-info btn-sm btn-block text-left" href="https://nuitducode.github.io/DOCUMENTATION/regles-conseils/" role="button" target="_blank">règles et conseils</a>
                <a class=" btn btn-info btn-sm btn-block text-left" href="https://www.nuitducode.net/affiches" role="button" target="_blank">affiches</a>

                <a class=" btn btn-secondary btn-sm btn-block text-left mt-4" href="https://nuitducode.github.io/DOCUMENTATION/SCRATCH/01-introduction/" role="button" target="_blank">entrainement scratch</a>
                <a class=" btn btn-secondary btn-sm btn-block text-left" href="https://nuitducode.github.io/DOCUMENTATION/PYTHON/01-presentation/" role="button" target="_blank">entrainement python</a>

                <a class=" btn btn-light btn-sm btn-block text-left mt-4" href="/console/fiche-inscription" role="button"><i class="far fa-address-card pr-2"></i> fiche d'inscription</a>
                <a class=" btn btn-light btn-sm btn-block text-left" href="https://github.com/nuitducode/ORGANISATION/discussions" target="_blank" role="button"><i class="far fa-comment-alt pr-2"></i> discussions</a>

                @if (Auth::user()->is_admin == 1)
                    <a class=" btn btn-danger btn-sm text-left mt-3" href="/console/admin" role="button"><i class="fas fa-shield-alt"></i></a>
                @endif

            </div>

			<div class="col-md-9 offset-md-1">

				@if (session('status'))
					<div class="text-success text-monospace text-center pb-4" role="alert">
						{{ session('status') }}
					</div>
				@endif

                <h2 class="m-0">NUIT DU C0DE 2022</h2>
                <div class="small text-monospace" style="color:silver">2 mai - 11 juin</div>
                <div class="text-center mt-3 mb-4">
                    <a class=" btn btn-success" href="/console/ndc" role="button">Enregistrement et Évaluation des Jeux</a>
                </div>

                <div style="border:1px solid #dfdfdf;border-radius:4px;padding:20px;">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="m-0">Univers de jeu</h3>
                            <div class="text-monospace text-danger small mt-3 mb-3" style="text-align:justify">
                                <b>IMPORTANT</b><br />
                                <ul>
                                <li>Les univers de jeu ainsi que les liens sont <u>confidentiels</u>. Ils ne doivent être partagés qu'avec les élèves qui participent à la Nuit du code. Il est important de bien indiquer aux élèves qu'ils ne doivent s'en servir que pour créer leur jeu pendant la durée de la Nuit du code et qu'ils ne doivent les partager avec personne d'autre.</li>
                                <li>Autre information importante pour les élèves : le titre du jeu créé par une équipe doit être le nom de l'équipe. Les mots suivants ne doivent pas apparaître dans le titre ou la description du jeu (ou des différentes versions du jeu): "nuit", "code", "c0de", "2022", "NdC", "ndc".</li>
                                <li>Dernier point concernant Scratch : les élèves ne doivent créer leur jeu qu'à partir des éléments fournis. Une fois qu'ils ont choisi leur univers de jeu, ils cliquent sur "Remix". Il n'est pas autorisé d'importer des ressources d'autres univers (images, lutins, scènes ou sons). Tout comme il n'est pas autorisé de regarder ou copier/coller des scripts d'autres projets présents sur l'ordinateur ou sur internet. Enfin, il n'est pas autorisé d'aller chercher des tutoriels (vidéos ou autres) durant l'événement. Par contre, les élèves peuvent solliciter les encadrants et s'entraider. C'est même recommandé.</li>
                            </ul>
                            </div>
                            <div class="mt-2" style="text-align:justify">
                                <u>Scratch</u><br />
                                Ci-dessous, le lien à fournir aux élèves pour qu'ils puissent découvrir et "remixer" les univers de jeu Scratch.<br />
                                <!--
                                Vous pouvez fournir aux élèves soit le lien (pour qu'ils puissent "mixer" les univers de jeu) soit les fichiers (pour qu'ils puissent les importer).
                                -->
                                Lien : <span class="text-monospace small text-success">{{$scratch_lien}}</span></li>
                            </div>
                            <div class="mt-3" style="text-align:justify">
                                <u>Python / Pyxel</u><br />
                                Plusieurs univers de jeu (fichiers .pyxres) sont proposés à l'adresse ci-dessous. Cependant, les élèves ne sont pas obligés de les utiliser. Ils peuvent créer leurs propres images avec l'éditeur Pyxel. Ils peuvent aussi créer un jeu sans images, en utilisant seulement les formes géométriques.<br />
                                Fichiers .pyxres : <span class="text-monospace small text-success">{{$python_fichiers}}</span>
                            </div>

                            <h3 class="m-0 mt-5 mb-2">Documents pour les élèves</h3>

                        </div>
                    </div>
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
                </div>


                <h2>PRÉPARATION</h2>
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

                <h2 class="m-0">SÉLECTIONS</h2>
                <div class="row">
                    <div class="col-md-4 offset-md-4 mt-2 mb-3">
                        <a class=" btn btn-light btn-sm btn-block" href="/console/sltn" role="button">Enregistrement et évaluation des jeux</a>
                        <a class=" btn btn-light btn-sm btn-block mt-2" style="opacity:0.8" href="/console/bas" role="button">Bac à sable</a>
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

            </div>

        </div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
