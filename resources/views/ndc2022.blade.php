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

            <div class="col-md-2 mt-4">
                <a class="btn btn-light btn-sm mb-4" href="/" role="button"><i class="fas fa-arrow-left" aria-hidden="true"></i></a>
            </div>

			<div class="col-md-10">

                <h1 class="mb-0">Nuit du c0de 2022</h1>

                <?php
                if(isset($categorie)) {

                    $C3_1 = ["695103644", "GET OUT OF THE GARDEN", "French American Academy<br />Jersey City - État-Unis", "The point of the game is to plant and harvest each vegetable shown here, then you would find a key opening the gate. You cannot leave the garden without harvesting every veggie. Read all instructions carefully.<br />
    - Move the fox with the up, down, right, left arrows or with w, a, s, d<br />
    - Watch out of bombs the chick might throw!<br />
    - Watch out of holes rabbits have dug in the ground.<br />
    You have 4 lives in this game. Be careful and have FUN!!"];
                    $C3_2 = ["703681012", "CHASSE AUX LÉGUMES", "École Internationale Provence - Alpes - Côte d'Azur<br />Manosque - France", "Dans ce jeu vous devez bouger le renard avec les flèches sans toucher ni les haies, ni le drapeau, ni la bombe et ni le bidon toxique.
    Le but du jeu est de ramasser touts les légumes puis de rentrer par la porte pour gagner."];
                    $C3_3 = ["701768380", "LES COUREURS CARRÉS", "Lycée Français de Los Angeles<br />Los Angeles - État-Unis", "Pour jouer il faut récupérer la clé et la mettre dans la serrure pour passer au niveau suivant et ou récolter les étoiles. Il y a 5 niveaux différents, utilisez les touches fléchées pour vous déplacer ! Faites également attention aux lasers et aux blocs de danger. Maintenant, choisissez votre caractère!"];
                    $C3_4 = ["701786916", "LES MARMOTTES", "Collège Stanislas de Québec<br />Québec - Canada", "Le but du jeu est de cliquer avec le pointeur de souris sur les animaux, mais il faut éviter de cliquer sur le ballon et la bombe, car ils vont exploser et vous faire mourir. Si vous vos point arrive à 160 vous gagner!"];
                    $C3_5 = ["688054055", "THE UNTITLED CODERS", "École Française Internationale de Philadelphie<br />Philadelphie - Etat-Unis", "Utilise les fleches pour te deplacer
    espace pour tirer
    tu dois survivre les trois niveaux
    amuse toi!"];
                    $C3_6 = ["702627896", "PAOLAELISE", "Collège Beaumarchais<br />Paris - France", "Vous êtes Charlie, un poussin jardinier. Vous devez terminer votre potager en évitant Foxy le renard et les obstacles.<br />
    -Appuyez sur les flèches pour vous déplacer<br />
    -Attrapez les légumes pour les planter<br />
    -Quand la clé apparait, attrapez-la pour changer de niveau<br />
    -Attrapez les pièces et les rubis pour gagner des points"];
                    $C3_7 = ["694171156", "RENARDS VÉGÉTARIENS", "Lycée Français de New York<br />New York - État-Unis", "Attendez que vos plantes poussent, quand elles poussent ramassez-les et vendez-les à la vente. Une fois que vous vendez, vous gagnerez un cochon. Les gemmes sont la monnaie. Pour obtenir des gemmes, vous devez avoir un cochon. Les cochons vous donnent des gemmes rouges. Avec lui les gemmes rouges, passez par le rocher et par un lapin. Le lapin fera une gemme bleue. Avec la gemme bleue, par un poussin. Mettre tous vos animals sur la porte au meme temps pur finir. BONNE CHANCE!"];
                    $C3_8 = ["701803809", "LILLY ET ARIANE", "Collège Stanislas de Québec<br />Québec - Canada", "Utilise les flèches de ton clavier pour te rendre à la porte puis ensuite au trophée pour gagner en évitant les obstacles :)"];

                    $C4_1 = ["703681012", "", "", ""];
                    $C4_2 = ["703681012", "", "", ""];
                    $C4_3 = ["703681012", "", "", ""];
                    $C4_4 = ["703681012", "", "", ""];
                    $C4_5 = ["703681012", "", "", ""];
                    $C4_6 = ["703681012", "", "", ""];
                    $C4_7 = ["703681012", "", "", ""];
                    $C4_8 = ["703681012", "", "", ""];

                    $LY_1 = ["703681012", "", "", ""];
                    $LY_2 = ["703681012", "", "", ""];
                    $LY_3 = ["703681012", "", "", ""];
                    $LY_4 = ["703681012", "", "", ""];
                    $LY_5 = ["703681012", "", "", ""];
                    $LY_6 = ["703681012", "", "", ""];
                    $LY_7 = ["703681012", "", "", ""];
                    $LY_8 = ["703681012", "", "", ""];

                    $C3_jeux = [$C3_1, $C3_2, $C3_3,$C3_4,$C3_5,$C3_6,$C3_7,$C3_8];
                    $C4_jeux = [$C4_1, $C4_2, $C4_3,$C4_4,$C4_5,$C4_6,$C4_7,$C4_8];
                    $LY_jeux = [$LY_1, $LY_2, $LY_3,$LY_4,$LY_5,$LY_6,$LY_7,$LY_8];

                    shuffle($C3_jeux);
                    shuffle($C4_jeux);
                    shuffle($LY_jeux);

                    if($categorie == "C3") {
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="pt-1" style="text-transform: capitalize;">Sélection Cycle 3 (CM1 > 6<sup>e</sup>)</h2>
                                <p class="text-monospace small" style="text-align:justify">Toutes catégories confondues, plus de 1000 jeux ont été créés lors cette 6<sup>e</sup> édition de la Nuit du c0de. Ci-dessous, les 2<sup>3</sup> (ou 1000<sub>2</sub>) jeux sélectionnés pour la catégorie "Cycle 3" (élèves du CM1 à la 6<sup>e</sup>). Bravo aux élèves et à leurs enseignants. Amusez-vous bien!</p>
                                <p class="text-monospace text-muted" style="font-size:70%;color:silver"><i>L'ordre des jeux est aléatoire</i></p>
                            </div>
                        </div>
                        <?php
                        foreach($C3_jeux AS $C3_jeu){
                            ?>
                            <div class="row mt-4">
                                <div class="text-center" style="width:505px;">
                                    <div id="{{ $C3_jeu[0] }}" style="padding:0px 10px 0px 10px;"><img src="https://cdn2.scratch.mit.edu/get_image/project/{{ $C3_jeu[0] }}_480x360.png" class="img-fluid" style="border-radius:4px;" width="100%" /></div>
                                    <div class="small text-monospace text-left" style="margin:10px;border:1px solid silver; padding:10px;border-radius:4px; background-color:white;">
                                        {!! $C3_jeu[3] !!}
                                    </div>
                                </div>
                                <div class="col">
                                    <h3 class="pt-0 mt-0 mb-1">{{ $C3_jeu[1] }}</h3>
                                    <p class="text-monospace text-muted small">{!! $C3_jeu[2] !!}</p>
                                    <button type="button" class="btn btn-success mt-2 mb-5" onClick="document.getElementById({{ $C3_jeu[0] }}).innerHTML='<iframe src=\'https://scratch.mit.edu/projects/{{ $C3_jeu[0] }}/embed\' width=\'485\' height=\'402\' frameborder=\'0\' scrolling=\'no\' style=\'border-radius:5px\'></iframe>'">Jouez !</button>
                                    <div class="mt-5 text-monospace text-muted" style="font-size:70%">Si le jeu ne s'affiche pas correctement,<br />vous pouvez l'ouvrir dans un autre<br />onglet en cliquant <a href="https://scratch.mit.edu/projects/{{ $C3_jeu[0] }}" target="_blank">ici</a>.</div>
                                </div>
                            </div>
                            <br />
                            <br />
                            <?php
                        }
                    }
                }
                ?>

            </div><!-- /col -->
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
