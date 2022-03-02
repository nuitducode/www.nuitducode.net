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

                <h1 class="mb-0">JEUX</h1>
                @if(request()->segment(2) == 'ndc') Nuit du c0de @endif
                @if(request()->segment(2) == 'sltn') Sélections @endif
                @if(request()->segment(2) == 'demo') Démo @endif


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



            </div>

        </div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
