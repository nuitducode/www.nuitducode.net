@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | console</title>
</head>
<body>

    @include('inc-nav-console')

	<div class="container mt-3 mb-5 pb-5">
        <div class="row">

            <div class="col-md-2 mt-4">
                <a class="btn btn-light btn-sm mb-4" href="/console" role="button"><i class="fas fa-arrow-left"></i></a>
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

                <?php
                if(request()->segment(2) == 'ndc') $type='Nuit du c0de 2022';
                if(request()->segment(2) == 'sltn') $type='Sélections 2022';
                if(request()->segment(2) == 'bas') $type='Bas à sable';

                $jeton = Auth::user()->jeton;
                // salt eleve : 'hez'
                // salt enseignant : 'jwa'
                $token_eleve = $jeton[3].'h'.$jeton[2].'e'.$jeton[1].'z'.$jeton[0];
                $token_enseignant = $jeton[3].'j'.$jeton[2].'w'.$jeton[1].'a'.$jeton[0];
                ?>

                <h1 class="mb-1">{{$type}}</h1>
                @if (request()->segment(2) == 'ndc')
                <div class="text-danger text-monospace small">Ne pas utiliser cette section avant la date de la Nuit du c0de.</div>
                @endif
                @if (request()->segment(2) == 'sltn')
                <div class="text-info text-monospace small">Cette section peut être utilisée pour organiser des sélections.</div>
                @endif
                @if (request()->segment(2) == 'bas')
                <div class="text-danger text-monospace small">Cette section peut être utilisée pour se familiariser avec les outils ou faire des tests.</div>
                @endif

                <div class="mt-4 mb-1 text-center"><a class="btn btn-primary" href="/console/{{request()->segment(2)}}/jeux" role="button">LISTE DES JEUX</a></div>

                <h2>Enregistrement des jeux</h2>
                <ul class="text-justify">
                    <li>
                        Soit les élèves enregistrent eux-mêmes leur jeu : après avoir décidé du compte qui hébergera le jeu  (compte d'un des membres de l'équipe, ou compte fourni par les organisateurs) et après avoir "remixé" l'univers sur lequel l'équipe va travailler, l'équipe enregistre son jeu en utilisant l'adresse ci-dessous qui sera fournie aux élèves. L'enregistrement du jeu peut se faire en début ou en fin d'événement.<br />
                        <div class="p-3 text-center" style="background-color:white;border:1px silver solid; border-radius:4px;">
                            Lien à fournir aux élèves pour qu'ils enregistrent leurs jeux : <kbd><a href="https://www.nuitducode.net/{{request()->segment(2)}}/{{strtoupper(Auth::user()->jeton)}}" class="text-monospace text-success" target="_blank">https://www.nuitducode.net/{{request()->segment(2)}}/{{strtoupper(Auth::user()->jeton)}}</a></kbd>
                        </div>
                    </li>
                    <li class="mt-3">
                        Soit les organisateurs enregistrent les jeux par lots depuis cette interface en cliquant sur "enregistrer des jeux". Pour ce faire, chaque équipe devra partager son jeu et envoyer aux organisateurs le lien ou l'identifiant du jeu. Les organisateurs peuvent enregistrer directement ces identifiants, ou "remixer" d'abord tous les jeux dans un "studio" Scratch créé pour l'occasion puis ensuite enregistrer les identifiant des jeux "remixés".
                        <div class="p-1 text-center">
                            <a class="btn btn-success btn-sm text-monospace" href="#" role="button">enregister des jeux</a>
                        </div>
                    </li>
                </ul>


                <h2>Évaluation par les élèves</h2>
                <div  class="text-justify">
                    Par équipe, les élèves évaluent les jeux des équipes appartenant à une catégorie différente de la leur. Le croisement des catégories sera défini par les organisateurs et communiqué aux élèves. Il est préférable que cette évaluation soit faite sous la surveillance des organisateurs pour éviter toute erreur de manipulation (évaluations multiples, équipes qui évaluent leurs propres jeux...). Les évaluations peuvent être organisées juste après la fin de l'événement ou un autre jour.
                </div>
                <div class="p-3 text-center" style="background-color:white;border:1px silver solid; border-radius:4px;">
                    Lien à fournir aux élèves pour l'évaluation des jeux : <kbd><a href="https://www.nuitducode.net/{{request()->segment(2)}}/{{strtoupper($token_eleve)}}" class="text-monospace  text-success" target="_blank">https://www.nuitducode.net/{{request()->segment(2)}}/{{strtoupper($token_eleve)}}</a></kbd>
                </div>


                <h2>Évaluation par les enseignants</h2>
                <div class="p-3 text-center" style="background-color:white;border:1px silver solid; border-radius:4px;">
                    Lien à fournir aux enseignants pour l'évaluation des jeux : <kbd><a href="https://www.nuitducode.net/{{request()->segment(2)}}/{{strtoupper($token_enseignant)}}" class="text-monospace text-success" target="_blank">https://www.nuitducode.net/{{request()->segment(2)}}/{{strtoupper($token_enseignant)}}</a></kbd>
                </div>

            </div>

        </div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
