<?php
if (Auth::user()->is_admin != 1) {
    exit;
}
?>
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <title>ADMIN | ÉVALUATIONS</title>
</head>
<body>

    @include('inc-nav-console')

	<div class="container mt-3 mb-5">
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

                <h1 class="mb-0">ÉVALUATIONS</h1>
                <div class="text-monospace text-muted small">Nuit du c0de 2022</div>
                <?php
                $user = App\Models\User::find(request()->get('id'));
                ?>
                <div class="text-monospace text-muted small">{{$user->etablissement}}-{{$user->ville}}-{{$user->pays}}</div>


                <h2>SCRATCH</h2>
                <div style="border:1px silver solid;border-radius:5px;padding:20px;background-color:white;">
                <?php
                $categories = ['C3' => 'Cycle 3', 'C4' => 'Cycle 4', 'LY' => 'Lycée'];
                foreach ($categories AS $categorie_code => $categorie){
                    $evaluations = App\Models\Evaluation::where([['etablissement_id', request()->get('id')], ['type', 'ndc'], ['categorie', $categorie_code]])->get();
                    ?>
                    <h3 class="m-0">{{$categorie}}</h3>
                    @if(count($evaluations) == 0)
                        <div class="text-monospace text-danger small mb-4">~ pas d'évaluation dans cette catégorie ~</div>
                    @else

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover table-striped table-sm text-monospace text-muted small">
                                    <thead><tr><th scope="col">Évaluateur</th><th scope="col">Catégorie</th><th scope="col">Identifiant Scratch</th><th scope="col">Note</th><th scope="col"></th></tr></thead>
                                    <tbody>
                                        @foreach($evaluations AS $evaluation)
                                        <tr>
                                            <td class="align-middle">{{$evaluation->jury_nom}}</td>
                                            <td class="align-middle">{{$evaluation->jury_type}}</td>
                                            <td class="align-middle"><a href="https://scratch.mit.edu/projects/{{$evaluation->scratch_id}}" target="_blank">{{$evaluation->scratch_id}}</a></td>
                                            <td class="align-middle">{{$evaluation->note}}</td>
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

                <h2>PYTHON</h2>
                <div style="border:1px silver solid;border-radius:5px;padding:20px;background-color:white;">
                <?php
                $categories = ['PI' => 'Première', 'POO' => 'Terminale'];
                foreach ($categories AS $categorie_code => $categorie){
                    $evaluations = App\Models\Evaluation::where([['etablissement_id', request()->get('id')], ['type', 'ndc'], ['categorie', $categorie_code]])->get();
                    ?>
                    <h3 class="m-0">{{$categorie}}</h3>
                    @if(count($evaluations) == 0)
                        <div class="text-monospace text-danger small mb-4">~ pas d'évaluation dans cette catégorie ~</div>
                    @else

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-borderless table-hover table-striped table-sm text-monospace text-muted small">
                                    <thead><tr><th scope="col">Évaluateur</th><th scope="col">Catégorie</th><th scope="col">Identifiant Python</th><th scope="col">Note</th><th scope="col"></th></tr></thead>
                                    <tbody>
                                        @foreach($evaluations AS $evaluation)
                                        <tr>
                                            <td class="align-middle">{{$evaluation->jury_nom}}</td>
                                            <td class="align-middle">{{$evaluation->jury_type}}</td>
                                            <td class="align-middle"><a href="/console/jouer-jeu-pyxel/{{Auth::user()->jeton.'-'.$evaluation->python_id}}" target="_blank">{{$evaluation->python_id}}</a></td>
                                            <td class="align-middle">{{$evaluation->note}}</td>
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
