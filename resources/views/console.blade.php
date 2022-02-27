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
                <a class=" btn btn-light btn-sm btn-block text-left" href="console/fiche-inscription" role="button"><i class="far fa-address-card pr-2"></i> fiche d'inscription</a>
                <a class=" btn btn-light btn-sm btn-block text-left" href="https://nuitducode.github.io/DOCUMENTATION/" target="_blank"role="button"><i class="fas fa-gamepad pr-2"></i> préparation des élèves</a>
            </div>

			<div class="col-md-9 offset-md-1">

				@if (session('status'))
					<div class="text-success text-monospace text-center pb-4" role="alert">
						{{ session('status') }}
					</div>
				@endif

                <h2>JOUR J</h2>
                <form method="POST" action="{{ route('fiche-inscription-details_post') }}">

                    @csrf

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
                                    @for ($j = 1; $j <= 31; $j++) {
                                    <option value="{{$j}}">{{ $j }}</option>
                                    @endfor
                                </select></td>
                            <td class="text-center">
                                <select id="ndc_mois" name="ndc_mois" class="form-control form-control-sm">
                                    <option value="avril">avril</option>
                                    <option value="mai">mai</option>
                                    <option value="juin">juin</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right pt-4" style="width:160px;">Heure de fin <sup><i class="fas fa-question-circle text-muted" style="cursor:help" data-toggle="tooltip" data-placement="right" title="Cette indication sera utilisée pour vérifier que des jeux n'auront pas été modifiés après le temps limite."></i></sup></td>
                            <td class="text-center pt-4">
                                <select id="ndc_heure_fin" name="ndc_heure_fin" class="form-control form-control-sm">
                                    @for ($h = 12; $h <= 24; $h++) {
                                    <option value="{{$h}}00">{{$h}}h00</option>
                                    <option value="{{$h}}h30">{{$h}}h30</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">Heure de fin Cycle 3 <sup><i class="fas fa-question-circle text-muted" style="cursor:help" data-toggle="tooltip" data-placement="right" title="Si, pour les élèves de Cycle 3, un temps plus court leur a été proposé (4h ou lieu de 6 par exemple), l'heure de fin peut être différente de celle des autres catégories d'élèves."></i></sup></td>
                            <td class="text-center">
                                <select id="ndc_heure_fin_c3" name="ndc_heure_fin_c3" class="form-control form-control-sm">
                                    @for ($h = 12; $h <= 24; $h++) {
                                    <option value="{{$h}}00">{{$h}}h00</option>
                                    <option value="{{$h}}h30">{{$h}}h30</option>
                                    @endfor
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
                            <td class="text-right">Cycle 3 (CM1 > 6<sup>e</sup>)</td>
                            <td class="text-center"><input id="scratch_nb_equipes_c3" name="scratch_nb_equipes_c3" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->scratch_nb_equipes_c3}}" /></td>
                            <td class="text-center"><input id="scratch_nb_eleves_c3" name="scratch_nb_eleves_c3" class="form-control form-control-sm" style="display:inline;width:40px" value="{{Auth::user()->scratch_nb_eleves_c3}}" /></td>
                        </tr>
                        <tr>
                            <td class="text-right">Cycle 4 (5<sup>e</sup> > 3<sup>e</sup>)</td>
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
                            <td class="text-right">Première NSI <sup><i class="fas fa-question-circle text-muted" style="cursor:help" data-toggle="tooltip" data-placement="right" title="Élèves de Première NSI ou élèves ayant les connaissances suffisantes en programmation impérative Python"></i></sup></td>
                            <td class="text-center"><input  id="python_nb_equipes_pi" name="python_nb_equipes_pi" class="form-control form-control-sm" style="display:inline;width:40px" /></td>
                            <td class="text-center"><input  id="python_nb_eleves_pi" name="python_nb_eleves_pi" class="form-control form-control-sm" style="display:inline;width:40px" /></td>
                        </tr>
                        <tr>
                            <td class="text-right">Terminale NSI <sup><i class="fas fa-question-circle text-muted" style="cursor:help" data-toggle="tooltip" data-placement="right" title="Élèves de Terminale NSI ou élèves ayant les connaissances suffisantes en programmation orientée objet Python"></i></sup></td>
                            <td class="text-center"><input  id="python_nb_equipes_poo" name="python_nb_equipes_poo" class="form-control form-control-sm" style="display:inline;width:40px" /></td>
                            <td class="text-center"><input  id="python_nb_eleves_poo" name="python_nb_eleves_poo" class="form-control form-control-sm" style="display:inline;width:40px" /></td>
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
