@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }} | Évaluation - étape 2</title>
</head>
<body>

    @include('inc-nav')

	<div class="container mt-4 mb-5">
		<div class="row pt-3">
			<div class="col-md-2"></div>

			<div class="col-md-10">

                @if (session('message'))
                    <div class="text-success text-monospace text-center mt-5 pb-4" role="alert">
                        {{ session('message') }}
                        <br />
                        <a class="btn btn-light btn-sm mt-3" href="/" role="button"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    @php
                    exit;
                    @endphp
                @endif

                <?php
                $etablissement_jeton = $token[6].$token[4].$token[2].$token[0];
                $jeux = App\Models\Game::where([['etablissement_jeton', $etablissement_jeton], ['type', request()->segment(1)], ['categorie', $categorie]])->get();

                if (count($jeux) !== 0){
                    ?>
                    <form method="POST" action="{{ route(request()->segment(1).'-evaluation-etape-2_post') }}">
                        @csrf

                        <?php
                        foreach ($jeux AS $jeu) {
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $json = file_get_contents("https://api.scratch.mit.edu/projects/".$jeu->scratch_id);
                                    $jeu_scratch = json_decode($json);
                                    ?>
                                    <h2 class="mb-1" style="color:#4cbf56">{{$jeu->nom_equipe}}</h2>
                                    <h3 class="mb-1 mt-1">[NdC 2022 - C3] {{$jeu_scratch->title}}</h3>
                                    <div class="text-monospace small">Création : {{$jeu_scratch->history->created}}</div>
                                    <div class="text-monospace small">Derniere modification : {{$jeu_scratch->history->modified}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <iframe src="https://scratch.mit.edu/projects/{{$jeu->scratch_id}}/embed" allowtransparency="true" width="100%" height="402" frameborder="0" scrolling="no" allowfullscreen></iframe>
                                    <div class="small text-monospace" style="border:1px solid silver; padding:10px;border-radius:4px; background-color:white;">{{$jeu_scratch->instructions}}</div>
                                    <div class="text-monospace small text-muted pt-1 pl-1">
                                        <i class="fas fa-gamepad" style="font-size:140%;vertical-align:-1px;"></i> <a href="https://scratch.mit.edu/projects/{{$jeu_scratch->id}}" target="_blank">{{$jeu_scratch->id}}</a> ~
                                        <i class="fas fa-user-circle"></i> <a href="https://scratch.mit.edu/users/{{$jeu_scratch->author->username}}" target="_blank">{{$jeu_scratch->author->username}}</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    /*
                                    https://www.jeuxdenim.be/news-404
                                    https://dane.ac-bordeaux.fr/robotique/wp-content/uploads/sites/7/2021/03/Grille-devaluation-des-jeux-par-jury.docx.pdf
                                    */
                                    ?>
                                    <div style="color:#cf63cf">Jouabilité</div>
                                    <div class="text-monospace text-muted small text-justify">Cette note de 1 à 5 mesure le degré de complexité des mécanismes du jeu, qui influence le temps d'explication ou de compréhension des règles et la maîtrise des détails.</div>
                                    <div class="row mt-2 mb-3">
                                        <div class="col">
                                            <input type="range" id="{{$jeu->scratch_id}}_critere1" name="evaluation[{{$jeu->scratch_id}}]['critere1']" class="custom-range" value="0" min="0" max="5" step="1" oninput="curseur(this.id, this.value);">
                                        </div>
                                        <div class="col-auto text-secondary text-center" id="{{$jeu->scratch_id}}_critere1_note" style="width:40px;">0</div>
                                    </div>

                                    <div style="color:#cf63cf">Richesse / complexité</div>
                                    <div class="text-monospace text-muted small text-justify">Cette note de 1 à 5 mesure le degré de complexité des mécanismes du jeu, qui influence le temps d'explication ou de compréhension des règles et la maîtrise des détails.</div>
                                    <div class="row mt-2 mb-3">
                                        <div class="col">
                                            <input type="range" id="{{$jeu->scratch_id}}_critere2" name="evaluation[{{$jeu->scratch_id}}]['critere2']" class="custom-range" value="0" min="0" max="5" step="1" oninput="curseur(this.id, this.value);">
                                        </div>
                                        <div class="col-auto text-secondary text-center" id="{{$jeu->scratch_id}}_critere2_note" style="width:40px;">0</div>
                                    </div>

                                    <div style="color:#cf63cf">Utilisation des lutins</div>
                                    <div class="text-monospace text-muted small text-justify">Cette note de 1 à 5 mesure le degré de complexité des mécanismes du jeu, qui influence le temps d'explication ou de compréhension des règles et la maîtrise des détails.</div>
                                    <div class="row mt-2 mb-3">
                                        <div class="col">
                                            <input type="range" id="{{$jeu->scratch_id}}_critere3" name="evaluation[{{$jeu->scratch_id}}]['critere3']" class="custom-range" value="0" min="0" max="5" step="1" oninput="curseur(this.id, this.value);">
                                        </div>
                                        <div class="col-auto text-secondary text-center" id="{{$jeu->scratch_id}}_critere3_note" style="width:40px;">0</div>
                                    </div>

                                    <div style="color:#cf63cf">Originalité</div>
                                    <div class="text-monospace text-muted small text-justify">Cette note de 1 à 5 mesure le degré de complexité des mécanismes du jeu, qui influence le temps d'explication ou de compréhension des règles et la maîtrise des détails.</div>
                                    <div class="row mt-2 mb-3">
                                        <div class="col">
                                            <input type="range" id="{{$jeu->scratch_id}}_critere4" name="evaluation[{{$jeu->scratch_id}}]['critere4']" class="custom-range" value="0" min="0" max="5" step="1" oninput="curseur(this.id, this.value);">
                                        </div>
                                        <div class="col-auto text-secondary text-center" id="{{$jeu->scratch_id}}_critere4_note" style="width:40px;">0</div>
                                    </div>

                                </div>
                            </div>
                            <br />
                            <br />


                        <?php
                        }
                        ?>
                        <input id="etablissement_jeton" name="etablissement_jeton" type="hidden" value="{{$etablissement_jeton}}" />
                        <input id="categorie" name="categorie" type="hidden" value="{{$categorie}}" />
                        <input id="jury_nom" name="jury_nom" type="hidden" value="{{$jury_nom}}" />
                        <input id="jury_type" name="jury_type" type="hidden" value="{{$jury_type}}" />
                        <button type="submit" id="inscription" class="btn btn-primary"><i class="fas fa-check"></i></button>
                    </form>

                    <?php
                } else {
                    ?>

                    <div class="text-success text-monospace text-center mt-5 pb-4" role="alert">
                        Pas de jeu à évaluer.
                        <br />
                        <a class="btn btn-light btn-sm mt-3" href="{{ URL::previous() }}" role="button"><i class="fas fa-arrow-left"></i></a>
                    </div>

                    <?php
                }
                ?>

            </div>
        </div><!-- /row -->
	</div><!-- /container -->

    <script>
    function curseur(id, note) {
        document.getElementById(id+"_note").innerHTML = note;
    }
    </script>

    <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    </script>

	@include('inc-bottom-js')

</body>
</html>
