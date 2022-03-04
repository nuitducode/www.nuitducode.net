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
                <a class="btn btn-light btn-sm mb-4" href="/console/{{request()->segment(2)}}" role="button"><i class="fas fa-arrow-left"></i></a>
                <a class=" btn btn-light btn-sm btn-block text-left" href="/console/fiche-inscription" role="button"><i class="far fa-address-card pr-2"></i> fiche d'inscription</a>
                <a class=" btn btn-light btn-sm btn-block text-left" href="https://github.com/nuitducode/ORGANISATION/discussions" target="_blank" role="button"><i class="far fa-comment-alt pr-2"></i> discussions</a>
                <div class="text-monospace text-muted small mt-4">JEUX</div>
                <a class=" btn btn-light btn-sm btn-block text-left" href="/console/ndc" role="button">Nuit du c0de</a>
                <a class=" btn btn-light btn-sm btn-block text-left mt-1" href="/console/sltn" role="button">Sélections</a>
                <a class=" btn btn-light btn-sm btn-block text-left mt-3" href="/console/bas" role="button">Bac à sable</a>
            </div>

			<div class="col-md-9 offset-md-1">

    			@if (session('status'))
    				<div class="text-success text-monospace text-center pb-4" role="alert">
    					{{ session('status') }}
    				</div>
    			@endif

                <h1 class="mb-0">ÉVALUATIONS</h1>
                <div class="text-monospace text-muted small">
                    @if(request()->segment(2) == 'ndc') Nuit du c0de 2022 @endif
                    @if(request()->segment(2) == 'sltn') Sélections 2022 @endif
                    @if(request()->segment(2) == 'demo') Démo @endif
                </div>
                <?php
                $categories = ['C3' => 'Cycle 3', 'C4' => 'Cycle 4', 'LY' => 'Lycée'];
                foreach ($categories AS $categorie_code => $categorie){
                    $evaluations = App\Models\Evaluation::where([['etablissement_id', Auth::user()->id], ['type', request()->segment(2)], ['categorie', $categorie_code]])->get();
                    ?>
                    <h2>{{$categorie}}</h2>
                    @if(count($evaluations) == 0)
                        <div class="text-monospace text-danger small">~ pas d'évaluation dans cette catégorie ~</div>
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
                                            <td class="text-right">
                                                <a tabindex='0' class='btn btn-danger btn-sm text-light' role='button'  style="cursor:pointer;outline:none;" data-toggle="popover" data-trigger="focus" data-placement="left" data-html="true" data-content="<a href='/console/supprimer-evaluation/{{ Crypt::encryptString($evaluation->id) }}' class='btn btn-danger btn-sm text-light' role='button'>confirmer</a><a class='btn btn-light btn-sm ml-2' href='#' role='button'>annuler</a>"><i class='fas fa-trash fa-sm'></i></a>
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

        </div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
