@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <title>Nuit du c0de | Évaluation - étape 2</title>
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



                    // SCRATCH
                    $critere1_scratch_titre = "Jouabilité";
                    $critere1_scratch_description = "Facilité et rapidité de la prise en main, absence de bogues, environnement intuitif, nombre de niveaux / scènes, difficulté progressive...";
                    $critere2_scratch_titre = "Richesse / Complexité";
                    $critere2_scratch_description = "Nombre de lutins et décors, niveaux / scènes multiples, variété des actions, défilements, effets...";
                    $critere3_scratch_titre = "Originalité / Créativité";
                    $critere3_scratch_description = "Utilisation originale des lutins et des décors, orginalité du scénario, lutins à contre emploi, présentation décalée...";
                    $critere4_scratch_titre = "Respect des consignes / Documentation";
                    $critere4_scratch_description = "Absence d'éléments extérieurs, intégrité des lutins, documentation claire et complète...";


                        ?>




                            <?php

                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="mb-1" style="color:#4cbf56">{{$jeu->nom_equipe}}</h2>
                                    </div>
                                </div>
                                <?php
                                $json = @file_get_contents("https://api.scratch.mit.edu/projects/".$jeu->scratch_id);
                                if ($json !== FALSE) {
                                    $jeu_scratch = json_decode($json);
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            @if($jury_type != 'eleve')
                                            <h3 class="mb-1 mt-1">[NdC 2022 - C3] {{$jeu_scratch->title}}</h3>
                                            <div class="text-monospace small text-muted">Création : {{$jeu_scratch->history->created}}</div>
                                            <div class="text-monospace small text-muted">Derniere modification : {{$jeu_scratch->history->modified}}</div>
                                            @endif
                                            <div class="text-monospace small">Si le jeu ne s'affiche pas correctement, vous pouvez l'ouvrir dans un autre onglet en cliquant <a href="https://scratch.mit.edu/projects/{{$jeu_scratch->id}}" target="_blank">ici</a>.</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <div><img src="https://uploads.scratch.mit.edu/get_image/project/{{$jeu->scratch_id}}_282x218.png" class="img-fluid" style="border-radius:4px;" width="100%" /></div>
                                            <button type="button" class="btn btn-success btn-sm mt-2 mb-3" onClick="this.previousElementSibling.innerHTML='<iframe src=\'https://scratch.mit.edu/projects/{{$jeu->scratch_id}}/embed\' width=\'100%\' height=\'402\' frameborder=\'0\' scrolling=\'no\'></iframe>'">lancer / recharger le jeu</button>
                                            <div class="small text-monospace text-left" style="border:1px solid silver; padding:10px;border-radius:4px; background-color:white;">
                                                @if ($jeu_scratch->instructions != NULL)
                                                    {{$jeu_scratch->instructions}}
                                                @else
                                                    <span class="text-danger">pas d'instructions</span>
                                                @endif
                                            </div>
                                            @if($jury_type != 'eleve')
                                            <div class="text-monospace small text-muted pt-1 pl-1">
                                                <i class="fas fa-gamepad" style="font-size:140%;vertical-align:-1px;"></i> <a href="https://scratch.mit.edu/projects/{{$jeu_scratch->id}}" target="_blank">{{$jeu_scratch->id}}</a> ~
                                                <i class="fas fa-user-circle"></i> <a href="https://scratch.mit.edu/users/{{$jeu_scratch->author->username}}" target="_blank">{{$jeu_scratch->author->username}}</a>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">

                                            

                                        </div>
                                    </div>
                                    <br />
                                    <br />





            </div>
        </div><!-- /row -->
	</div><!-- /container -->



    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>

	@include('inc-bottom-js')

</body>
</html>
