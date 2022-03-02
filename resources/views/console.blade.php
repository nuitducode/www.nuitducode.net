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

			<div class="col-md-2 mt-5">
                <a class=" btn btn-light btn-sm btn-block text-left" href="console/fiche-inscription" role="button"><i class="far fa-address-card pr-2"></i> fiche d'inscription</a>
                <a class=" btn btn-light btn-sm btn-block text-left" href="https://github.com/nuitducode/ORGANISATION/discussions" target="_blank" role="button"><i class="far fa-comment-alt pr-2"></i> discussions</a>
                <div class="text-monospace text-muted small mt-4">JEUX</div>
                <a class=" btn btn-light btn-sm btn-block text-left" href="console/ndc" target="_blank" role="button">Nuit du c0de</a>
                <a class=" btn btn-light btn-sm btn-block text-left mt-1" href="console/sltn" target="_blank" role="button">Sélections</a>
                <a class=" btn btn-light btn-sm btn-block text-left mt-1" href="console/demo" target="_blank" role="button">Démo</a>
            </div>

			<div class="col-md-9 offset-md-1">

				@if (session('status'))
					<div class="text-success text-monospace text-center pb-4" role="alert">
						{{ session('status') }}
					</div>
				@endif

                <h2>ORGANISATION</h2>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center text-monospace text-muted small p-2">
                        <span><i class="far fa-check-square"></i> Inscription de l'établissement</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-monospace small p-2">
                        <span><i class="far fa-square"></i> Choix de la date de l'événement (saisir cette date dans la section "JOUR J")</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-monospace small p-2">
                        <span>
                            <i class="far fa-square"></i> Préparation de l'événement dans l'établissement (date, lieux, autoriations, affiches, ordinateurs, nourriture, boissons, décoration...)
                        </span>
                        <div class="text-right">
                            <a class="btn btn-light btn-sm" style="padding:2px 10px 0px 10px" href="presentation" role="button" target="_blank"><i class="fas fa-book"></i></a>
                            <a class="btn btn-light btn-sm" style="margin-top:3px;padding:2px 10px 0px 10px" href="affiches" role="button" target="_blank"><i class="fas fa-book"></i></a>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-monospace small p-2"><span><i class="far fa-square"></i> Entraînement des élèves</span><a class="btn btn-light btn-sm" style="padding:2px 10px 0px 10px" href="https://nuitducode.github.io/DOCUMENTATION/" target="_blank" role="button"><i class="fas fa-book"></i></a></li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-monospace small p-2"><span><i class="far fa-square"></i> Sélection des élèves (si le nombre d'élèves intéressés est trop grand)</span></li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-monospace small p-2"><span><i class="far fa-square"></i> Création des équipes qui participeront à l'événement (indiquer, ci-dessous, le nombre d'équipes et d'élèves pour chaque catégories, mettre 0 pour les catégories sans participants)</span></li>
                </ul>

                <h2>JOUR J</h2>
                <form method="POST" action="{{ route('fiche-inscription-details_post') }}">

                    @csrf

                    <?php
                    $datetime = new DateTime(Auth::user()->ndc_date);
                    $jour = $datetime->format('j');
                    $mois = $datetime->format('m');
                    $heure = $datetime->format('H').':'.$datetime->format('i');
                    ?>
                    <table class="table table-borderless table-sm table-responsive">
                        <tr>
                            <td style="width:160px;"></td>
                            <td class="small text-center text-muted">Jour</td>
                            <td class="small text-center text-muted">Mois</td>
                        </tr>
                        <tr>
                            <td class="text-right">Date</td>
                            <td class="text-center">
                                <select id="ndc_jour" name="ndc_jour" class="form-control form-control-sm">
                                    @for ($j = 1; $j <= 31; $j++)
                                    <option value="{{$j}}" @if($jour == $j) selected @endif>{{ $j }}</option>
                                    @endfor
                                </select>
                            </td>
                            <td class="text-center">
                                <select id="ndc_mois" name="ndc_mois" class="form-control form-control-sm">
                                    <option value="04" @if($mois == '04') selected @endif>avril</option>
                                    <option value="05" @if($mois == '05') selected @endif>mai</option>
                                    <option value="06" @if($mois == '06') selected @endif>juin</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right pt-3" style="width:160px;">Heure de fin <sup><i class="fas fa-question-circle text-muted" data-toggle="tooltip" data-placement="right" title="Cette indication sera utilisée pour vérifier que des jeux n'auront pas été modifiés après le temps limite."></i></sup></td>
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
                        <tr>
                            <td class="text-right"><button type="submit" class="btn btn-primary btn-sm mb-2"><i class="fas fa-check"></i></button></td>
                            <td></td>
                        </tr>
                    </table>


                <h2>SCRATCH</h2>

                    <table class="table table-borderless table-sm table-responsive">
                        <tr>
                            <td style="width:160px;"></td>
                            <td class="small text-center text-muted">Nombre<br />d'équipes</td>
                            <td class="small text-center text-muted">Nombre<br />d'élèves</td>
                        </tr>
                        <tr>
                            <td class="text-right">Cycle 3 <small>(CM1 > 6<sup>e</sup>)</small></td>
                            <td class="text-center"><input id="scratch_nb_equipes_c3" name="scratch_nb_equipes_c3" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->scratch_nb_equipes_c3}}" /></td>
                            <td class="text-center"><input id="scratch_nb_eleves_c3" name="scratch_nb_eleves_c3" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->scratch_nb_eleves_c3}}" /></td>
                        </tr>
                        <tr>
                            <td class="text-right">Cycle 4 <small>(5<sup>e</sup> > 3<sup>e</sup>)</small></td>
                            <td class="text-center"><input id="scratch_nb_equipes_c4" name="scratch_nb_equipes_c4" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->scratch_nb_equipes_c4}}" /></td>
                            <td class="text-center"><input id="scratch_nb_eleves_c4" name="scratch_nb_eleves_c4" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->scratch_nb_eleves_c4}}" /></td>
                        </tr>
                        <tr>
                            <td class="text-right">Lycée</td>
                            <td class="text-center"><input id="scratch_nb_equipes_lycee" name="scratch_nb_equipes_lycee" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->scratch_nb_equipes_lycee}}" /></td>
                            <td class="text-center"><input id="scratch_nb_eleves_lycee" name="scratch_nb_eleves_lycee" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->scratch_nb_eleves_lycee}}" /></td>
                        </tr>
                        <tr>
                            <td class="text-right"><button type="submit" class="btn btn-primary btn-sm mb-2"><i class="fas fa-check"></i></button></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>


                <h2>PYTHON</h2>

                    <table class="table table-borderless table-sm table-responsive">
                        <tr>
                            <td style="width:160px;"></td>
                            <td class="small text-center text-muted">Nombre<br />d'équipes</td>
                            <td class="small text-center text-muted">Nombre<br />d'élèves</td>
                        </tr>
                        <tr>
                            <td class="text-right">Première NSI <sup><i class="fas fa-question-circle text-muted" data-toggle="tooltip" data-placement="right" title="Élèves de Première NSI ou élèves ayant les connaissances suffisantes en programmation impérative Python"></i></sup></td>
                            <td class="text-center"><input  id="python_nb_equipes_pi" name="python_nb_equipes_pi" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->python_nb_equipes_pi}}" /></td>
                            <td class="text-center"><input  id="python_nb_eleves_pi" name="python_nb_eleves_pi" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->python_nb_eleves_pi}}" /></td>
                        </tr>
                        <tr>
                            <td class="text-right">Terminale NSI <sup><i class="fas fa-question-circle text-muted" data-toggle="tooltip" data-placement="right" title="Élèves de Terminale NSI ou élèves ayant les connaissances suffisantes en programmation orientée objet Python"></i></sup></td>
                            <td class="text-center"><input  id="python_nb_equipes_poo" name="python_nb_equipes_poo" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->python_nb_equipes_poo}}" /></td>
                            <td class="text-center"><input  id="python_nb_eleves_poo" name="python_nb_eleves_poo" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->python_nb_eleves_poo}}" /></td>
                        </tr>
                        <tr>
                            <td class="text-right"><button type="submit" class="btn btn-primary btn-sm mb-2"><i class="fas fa-check"></i></button></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>

                </form>

            </div>

        </div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
