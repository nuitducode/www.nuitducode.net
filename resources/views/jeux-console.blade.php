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
                <a class="btn btn-light btn-sm mb-4" href="/console" role="button"><i class="fas fa-arrow-left"></i></a>
                <a class=" btn btn-light btn-sm btn-block text-left" href="/console/fiche-inscription" role="button"><i class="far fa-address-card pr-2"></i> fiche d'inscription</a>
                <a class=" btn btn-light btn-sm btn-block text-left" href="https://github.com/nuitducode/ORGANISATION/discussions" target="_blank" role="button"><i class="far fa-comment-alt pr-2"></i> discussions</a>
                <div class="text-monospace text-muted small mt-4">JEUX</div>
                <a class=" btn btn-light btn-sm btn-block text-left" href="/console/ndc" role="button">Nuit du c0de</a>
                <a class=" btn btn-light btn-sm btn-block text-left mt-1" href="/console/sltn" role="button">Sélections</a>
                <a class=" btn btn-light btn-sm btn-block text-left mt-1" href="/console/demo" role="button">Démo</a>
            </div>

            <div class="col-md-9 offset-md-1">

                @if (session('status'))
                    <div class="text-success text-monospace text-center pb-4" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <?php
                    if(request()->segment(2) == 'ndc') $type='Nuit du c0de 2022';
                    if(request()->segment(2) == 'sltn') $type='Sélections 2022';
                    if(request()->segment(2) == 'demo') $type='Démo';
                ?>

                <h1 class="mb-0">{{$type}}</h1>

                <div class="font-weight-bold mt-3">Enregistrement des jeux</div>
                <p>Lien à fournir aux élèves pour qu'ils enregistrent leurs jeux : <kbd><a href="https://www.nuitducode.net/ndc/{{Auth::user()->jeton}}" class="text-monospace text-light" target="_blank">https://www.nuitducode.net/ndc/{{Auth::user()->jeton}}</a></kbd></p>

                <div class="font-weight-bold">Évaluation par les élèves</div>
                <p>Lien à fournir aux élèves pour l'évaluation des jeux : <kbd><a href="https://www.nuitducode.net/ndc/{{Auth::user()->jeton}}" class="text-monospace text-light" target="_blank">https://www.nuitducode.net/ndc/{{Auth::user()->jeton}}</a></kbd></p>

                <div class="font-weight-bold">Évaluation par les enseignants</div>
                <p>Lien à fournir aux enseignants pour l'évaluation des jeux : <kbd><a href="https://www.nuitducode.net/ndc/{{Auth::user()->jeton}}" class="text-monospace text-light" target="_blank">https://www.nuitducode.net/ndc/{{Auth::user()->jeton}}</a></kbd></p>

                <div class="mt-4"><a class="btn btn-primary" href="/console/{{request()->segment(2)}}/jeux" role="button">JEUX</a></div>

            </div>

        </div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
