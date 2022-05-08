@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | console</title>
</head>
<body>

    @include('inc-nav-console')

	<div class="container mt-4 mb-5">
        <div class="row">

            <div class="col-md-2 mt-4">
                <a class="btn btn-light btn-sm mb-4" href="/console" role="button"><i class="fas fa-arrow-left"></i></a>
            </div>

            <div class="col-md-10">

                <?php
                $display_enregistrement = "block";
                $display_evaluation = "block";
                if (request()->get('p') == 'enregistrement'){
                    $display_evaluation = "none";
                }
                if (request()->get('p') == 'evaluation'){
                    $display_enregistrement = "none";
                }

                if(request()->segment(2) == 'ndc') $type='Nuit du c0de 2022';
                if(request()->segment(2) == 'sltn') $type='Sélections 2022';
                if(request()->segment(2) == 'bas') $type='Bas à sable';

                $jeton = Auth::user()->jeton;
                // salt eleve : 'hez'
                // salt enseignant : 'jwa'
                $token_eleve = $jeton[3].'h'.$jeton[2].'e'.$jeton[1].'z'.$jeton[0];
                $token_enseignant = $jeton[3].'j'.$jeton[2].'w'.$jeton[1].'a'.$jeton[0];
                ?>

                <h1 class="m-0 p-0">{{$type}}</h1>
                @if (request()->segment(2) == 'ndc')
                <div class="text-danger text-monospace small">Ne pas utiliser cette section avant la date de la Nuit du c0de.</div>
                @endif
                @if (request()->segment(2) == 'sltn')
                <div class="text-info text-monospace small">Cette section peut être utilisée pour organiser des sélections.</div>
                @endif
                @if (request()->segment(2) == 'bas')
                <div class="text-danger text-monospace small">Cette section peut être utilisée pour se familiariser avec les outils ou faire des tests.</div>
                @endif

                @if (request()->get('p') == 'enregistrement')
                    <div class="mt-4 mb-1">
                        <a class="btn btn-primary" href="/console/{{request()->segment(2)}}/liste-jeux" role="button">LISTE DES JEUX</a>
                    </div>
                @elseif (request()->get('p') == 'evaluation')
                    <div class="mt-4 mb-1">
                        <a class="btn btn-primary" href="/console/{{request()->segment(2)}}/liste-evaluations" role="button">LISTE DES ÉVALUATIONS</a>
                    </div>
                @else
                    <div class="mt-4 mb-1">
                        <a class="btn btn-info mr-1" href="/console/{{request()->segment(2)}}/jeux-evaluations" role="button" data-boundary="window" data-toggle="tooltip" data-placement="top" title="Bilan des évaluations"><i class="fas fa-trophy"></i></a>
                        <a class="btn btn-primary ml-1" href="/console/{{request()->segment(2)}}/liste-jeux" role="button">LISTE DES JEUX</a>
                        <a class="btn btn-primary ml-1" href="/console/{{request()->segment(2)}}/liste-evaluations" role="button">LISTE DES ÉVALUATIONS</a>
                    </div>
                @endif

                <div id="enregistrement" style="display:{{$display_enregistrement}}">
                    <h2>Enregistrement des jeux</h2>
                    Lien à fournir aux équipes pour qu'elles enregistrent leurs jeux :
                    <div class="mt-1 p-2 text-center">
                        <a href="/{{request()->segment(2)}}/{{strtoupper(Auth::user()->jeton)}}" class="text-monospace text-success" target="_blank">https://www.nuitducode.net/{{request()->segment(2)}}/{{strtoupper(Auth::user()->jeton)}}</a>
                    </div>
                    <ul class="text-justify mt-4">
                        <li>
                            <u>Pour Scratch</u><br />
                            Après avoir décidé du compte qui hébergera le jeu  (compte d'un des membres de l'équipe ou compte fourni par les organisateurs) et après avoir "remixé" l'univers avec lequel l'équipe va travailler, l'équipe enregistre son jeu en utilisant le lien ci-dessus.<br />

                            <u>Pour Python / Pyxel</u><br />
                            L'équipe dépose son fichier <code>.py</code> et, s'il existe, son fichier <code>.pyxres</code> en utilisant le lien ci-dessus.
                        </li>
                        <li class="mt-3">
                            Les organisateurs peuvent enregistrer eux-mêmes les jeux Scratch par lots en cliquant sur le bouton ci-dessous. Pour ce faire, chaque équipe devra partager son jeu et envoyer aux organisateurs le lien ou l'identifiant du jeu. Les organisateurs peuvent enregistrer directement ces identifiants, ou "remixer" d'abord tous les jeux dans un "studio" Scratch créé pour l'occasion puis ensuite enregistrer les identifiant des jeux "remixés".
                            <div class="mt-2 text-center">
                                <a class="btn btn-light btn-sm text-monospace" data-toggle="collapse" href="#collapse" role="button" aria-expanded="false" aria-controls="collapse">Enregistrer manuellement des jeux Scratch</a>
                            </div>
                            @if (session('message'))
                                <div class="text-success text-monospace text-center pb-4" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <div class="mt-3 collapse @if($errors->any()) show @endif" id="collapse">
                                <div class="card card-body">
                                    <form method="POST" action="{{ route('jeux-lot-ajouter_post') }}">
                                        @csrf

                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td class="text-left">
                                                        <div for="categorie" class="text-info mb-1">CATÉGORIE <sup class="text-danger">*</sup></div>
                                                        <div class="form-group">
                                                            <select id="categorie" name="categorie" class="custom-select @error('categorie') is-invalid @enderror" required>
                                                                <option selected disabled value="">choisir...</option>
                                                                <option value="C3" @if(old('categorie') == 'C3') selected @endif>Cycle 3 : CM1 > 6e</option>
                                                                <option value="C4" @if(old('categorie') == 'C4') selected @endif>Cycle 4 : 5e > 3e</option>
                                                                <option value="LY" @if(old('categorie') == 'LY') selected @endif>Lycée</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div for="nom_equipe" class="text-info">NOM DE L'ÉQUIPE <sup class="text-danger">*</sup></div>
                                                        <div class="text-monospace text-muted small text-justify">
                                                            Choisir un nom d'équipe de 20 caractères maximum et sans caractères spéciaux.
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div for="scratch_id" class="text-info">IDENTIFIANT DU PROJET <sup class="text-danger">*</sup></div>
                                                        <div class="text-monospace text-muted small text-justify">
                                                            L'identifiant du projet est le la suite de chiffres présente dans son adresse. Exemple: si l'adresse est "scratch.mit.edu/projects/6535/", l'identifiant est "6535"
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <input id="nom_equipe" name="nom_equipe[]" type="text" class="form-control @error('nom_equipe.0') is-invalid d-block @enderror" value="{{ old('nom_equipe.0') }}" />
                                                        @error('nom_equipe.0')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </td>
                                                    <td class="text-left">
                                                        <input id="scratch_id" name="scratch_id[]" type="text" class="form-control @error('scratch_id.0') is-invalid d-block @enderror" value="{{ old('scratch_id.0') }}" />
                                                        @error('scratch_id.0')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input id="nom_equipe" name="nom_equipe[]" type="text" class="form-control" value="{{ old('nom_equipe.1') }}"></td>
                                                    <td><input id="scratch_id" name="scratch_id[]" type="text" class="form-control" value="{{ old('scratch_id.1') }}"></td>
                                                </tr>
                                                <tr>
                                                    <td><input id="nom_equipe" name="nom_equipe[]" type="text" class="form-control" value="{{ old('nom_equipe.2') }}"></td>
                                                    <td><input id="scratch_id" name="scratch_id[]" type="text" class="form-control" value="{{ old('scratch_id.2') }}"></td>
                                                </tr>
                                                <tr>
                                                    <td><input id="nom_equipe" name="nom_equipe[]" type="text" class="form-control" value="{{ old('nom_equipe.3') }}"></td>
                                                    <td><input id="scratch_id" name="scratch_id[]" type="text" class="form-control" value="{{ old('scratch_id.3') }}"></td>
                                                </tr>
                                                <tr>
                                                    <td><input id="nom_equipe" name="nom_equipe[]" type="text" class="form-control" value="{{ old('nom_equipe.4') }}"></td>
                                                    <td><input id="scratch_id" name="scratch_id[]" type="text" class="form-control" value="{{ old('scratch_id.4') }}"></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <input id="type" name="type" type="hidden" value="{{request()->segment(2)}}" />
                                        <div class="text-center"><button type="submit" class="btn btn-primary btn-sm mb-2 pl-5 pr-5"><i class="fas fa-check"></i></button></div>
                                    </form>
                                </div>
                            </div>

                        </li>
                    </ul>
                </div>

                <div id="evaluation" style="display:{{$display_evaluation}}">
                    <h2>Évaluation par les élèves</h2>
                    Lien à fournir aux élèves pour l'évaluation des jeux :
                    <div class="p-3 text-center">
                        <a href="/{{request()->segment(2)}}/{{strtoupper($token_eleve)}}" class="text-monospace  text-success" target="_blank">https://www.nuitducode.net/{{request()->segment(2)}}/{{strtoupper($token_eleve)}}</a>
                    </div>
                    <div  class="text-justify mt-2">
                        Par équipe, les élèves évaluent les jeux des équipes appartenant à une catégorie différente de la leur. Le croisement des catégories sera défini par les organisateurs et communiqué aux élèves. Il est préférable que cette évaluation soit faite sous la surveillance des organisateurs pour éviter toute erreur de manipulation (évaluations multiples, équipes qui évaluent leurs propres jeux...). Les évaluations peuvent être organisées juste après la fin de l'événement ou un autre jour.
                    </div>



                    <h2 class="mt-4">Évaluation par les enseignants</h2>
                    Lien à fournir aux enseignants pour l'évaluation des jeux :
                    <div class="p-3 text-center">
                        <a href="/{{request()->segment(2)}}/{{strtoupper($token_enseignant)}}" class="text-monospace text-success" target="_blank">https://www.nuitducode.net/{{request()->segment(2)}}/{{strtoupper($token_enseignant)}}</a>
                    </div>
                </div>

            </div>

        </div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
