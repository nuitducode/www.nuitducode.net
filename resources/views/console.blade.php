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

                <h2>ENREGISTREMENT ET ÉVALUATION DES JEUX</h2>
                <div class="row">
                    <div class="col-md-4 offset-md-4 mt-2 mb-3">
                        <a class=" btn btn-success btn-block" href="/console/ndc" role="button">Nuit du c0de</a>
                        <a class=" btn btn-light btn-sm btn-block" href="/console/sltn" role="button">Sélections</a>
                        <a class=" btn btn-light btn-sm btn-block mt-2" style="opacity:0.8" href="/console/bas" role="button">Bac à sable</a>
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
