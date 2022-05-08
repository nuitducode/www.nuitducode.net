@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <title>NdC Console | Jeux</title>
</head>
<body>

    @include('inc-nav-console')

	<div class="container mt-3 mb-5">
		<div class="row">

            <div class="col-md-2 mt-4">
                <a class="btn btn-light btn-sm mb-4" href="/console/{{request()->segment(2)}}" role="button"><i class="fas fa-arrow-left"></i></a>
            </div>

			<div class="col-md-10">

    			@if (session('status'))
    				<div class="text-success text-monospace text-center pb-4" role="alert">
    					{{ session('status') }}
    				</div>
    			@endif

                <h1 class="mb-0">JEUX</h1>
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
                        <div class="text-monospace text-danger small mb-4">~ pas de jeu dans cette catégorie ~</div>
                    @else
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover table-striped table-sm text-monospace text-muted small">
                                    <thead><tr><th scope="col">Nom de l'équipe</th><th scope="col">Identifiant</th><th scope="col"></th></tr></thead>
                                    <tbody>
                                        @foreach($jeux AS $jeu)
                                        <tr>
                                            <td class="align-middle">{{$jeu->nom_equipe}}</td>
                                            <td class="align-middle"><a href="https://scratch.mit.edu/projects/{{$jeu->scratch_id}}" target="_blank">{{$jeu->scratch_id}}</a></td>
                                            <td class="text-right">
                                                <a tabindex='0' class='btn btn-danger btn-sm text-light' role='button'  style="cursor:pointer;outline:none;" data-toggle="popover" data-trigger="focus" data-placement="left" data-html="true" data-content="<a href='/console/supprimer-jeu/{{ Crypt::encryptString($jeu->id) }}' class='btn btn-danger btn-sm text-light' role='button'>confirmer</a><a class='btn btn-light btn-sm ml-2' href='#' role='button'>annuler</a>"><i class='fas fa-trash fa-sm'></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                    <?php
                }
                ?>
                </div>
                <h2 class="mt-3">PYTHON</h2>
                <div style="border:1px silver solid;border-radius:5px;padding:20px;background-color:white;">
                <?php
                $categories = ['PI' => 'Première', 'POO' => 'Terminale'];
                foreach ($categories AS $categorie_code => $categorie){
                    $jeux = App\Models\Game::where([['etablissement_id', Auth::user()->id], ['type', request()->segment(2)], ['categorie', $categorie_code]])->get();
                    ?>
                    <h3 class="m-0">{{$categorie}}</h3>
                    @if(count($jeux) == 0)
                        <div class="text-monospace text-danger small mb-4">~ pas de jeu dans cette catégorie ~</div>
                    @else
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover table-striped table-sm text-monospace text-muted small">
                                    <thead><tr><th scope="col">Nom de l'équipe</th><th scope="col">Identifiant</th><th scope="col"></th></tr></thead>
                                    <tbody>
                                        @foreach($jeux AS $jeu)
                                        <tr>
                                            <td class="align-middle">{{$jeu->nom_equipe}}</td>
                                            <td class="align-middle"><a href="/console/jouer-jeu-pyxel/{{Auth::user()->jeton.'-'.$jeu->python_id}}" target="_blank">{{$jeu->python_id}}</a></td>
                                            <td class="text-right">
                                                <a tabindex='0' class='btn btn-danger btn-sm text-light' role='button'  style="cursor:pointer;outline:none;" data-toggle="popover" data-trigger="focus" data-placement="left" data-html="true" data-content="<a href='/console/supprimer-jeu/{{ Crypt::encryptString($jeu->id) }}' class='btn btn-danger btn-sm text-light' role='button'>confirmer</a><a class='btn btn-light btn-sm ml-2' href='#' role='button'>annuler</a>"><i class='fas fa-trash fa-sm'></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
