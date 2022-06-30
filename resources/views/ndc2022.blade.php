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

            <div class="col-md-2 mt-4 pr-5">
                <a class="btn btn-light btn-sm mb-4" href="/" role="button"><i class="fas fa-arrow-left" aria-hidden="true"></i></a>
                <?php
                if(isset($categorie)) {
                    ?>
                    <h4>Scratch</h4>
                    <a class=" btn btn-info btn-sm btn-block text-left" href="/ndc2022/C3" role="button">Cycle 3</a>
                    <a class=" btn btn-info btn-sm btn-block text-left" href="/ndc2022/C4" role="button">Cycle 4</a>
                    <a class=" btn btn-info btn-sm btn-block text-left" href="/ndc2022/LY" role="button">Lycée</a>
                    <h4>Python</h4>
                    <a class=" btn btn-info btn-sm btn-block text-left" href="/ndc2022/P" role="button">Première</a>
                    <a class=" btn btn-info btn-sm btn-block text-left" href="/ndc2022/T" role="button">Terminale</a>
                    <?php
                } ?>
            </div>

			<div class="col-md-10">

                <h1 class="mb-0">Nuit du c0de 2022</h1>

                <?php
                if(isset($categorie)) {
                    if (in_array($categorie, ['C3', 'C4', 'LY'])) {

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

                        $C4_1 = ["710350232", "Les Cringes", "Collège Augustin Malroux<br />Blaye les Mines - France", "Notre jeu The Frog Epic raconte l'aventure de la plus courageuse ninja grenouille. Évite les nombreux pièges et les monstres controlés par la Dark grenouille. Un jeu plein de fun et de rebondissements !"];
                        $C4_2 = ["710350254", "Les codeurs de la Nuit", "Lycée Français International de Tokyo<br />Tokyo - Japon", "Attention, now the project is in french.<br />
                        ->Tu as perdu recommances:: game over, restart<br />
                        ->Tu as retrouve ton frere finit:: you won and finnaly found your brother"];
                        $C4_3 = ["710350271", "Esteban et Joaquim", "Collège<br />Launaguet - France", "Le but du jeu est d'arriver à 50 points pour combattre le boss final. Pour cela vous devrez affronter une multitude d'ennemis et un mini boss avec seulement 5 vies. "];
                        $C4_4 = ["710350266", "The Pandacorns", "Lycée Condorcet Sydney<br />Sydney - Australie", "You can stick to the roof because you are a NINJA!!!! Move with arrow keys. PLEASE PRESS TWICE  THE GREEN FLAG BECAUSE OF THE SPRITE LAYERING"];
                        $C4_5 = ["710350239", "Equipe Qui Pique", "Collège de l'Astarac<br />Mirande - France", "Au début, le jeu vous demande par quel niveau vous voulez commencer. Le but du jeu est d’éviter et d’éliminer toutes les créatures qui cherchent à nous envahir. Les créatures changent en fonction du niveau du jeu. Nous pouvons les éliminer d’une seule manière : en leur lançant des boules de feu. Pour les éviter, on peut utiliser les touches Q, S, D et Z pour que l’astro-soldat se déplace. La touche Q sert à se déplacer vers la gauche, la touche D, de se déplacer vers la droite. La touche S permet de faire descendre le lutin et la touche Z de le faire monter. Lorsque vous avez éliminé 10 créatures, le jeu passe au niveau suivant. Il faut donc arriver jusqu’au niveau 7 et donc la fin du jeu. Si vous perdez, c’est qu’une créature vous a heurté. Des missiles peuvent apparaitre au niveau 7. "];
                        $C4_6 = ["710350220", "The Squirrels", "École Francaise International de Philadelphie<br />Philadelphia - État-Unis", "Double cliquer le drapeau pour commencer. Utilise les fleches pour bouger. Évite les differents pièges, pense à prendre les clés pour ouvrir les differents portes."];
                        $C4_7 = ["710350208", "MMD2007", "Collège Montaigne<br />Tours - France", "Dans ce jeu vous êtes immortelle, il suffit d'avoir le meilleur score et de terminer la vague 5.<br />
                        Contrôle:<br />
                        -Aller à gauche `Flèche de gauche`<br />
                        -Aller à droite `Flèche de droite`<br />
                        -Tirer `Espace`<br />
                        -Tir spéciale (+Barre d'énergie chargé à fond) `v`"];
                        $C4_8 = ["710350187", "Aleg", "Lycée Franco-Hellénique Eugène Delacroix<br />Athènes - Grèce", "Mouvement:<br />
                        Flèches pour se déplacer<br />
                        Espace pour tirer<br />
                        <br />
                        But du jeu:<br />
                        Le but du jeu est d'avoir le plus de points possible, pour gagner un point il faut passer d'un feu de camp à l'autre. Vous avez 2 vie. BONNE CHANCE!<br />
                        <br />
                        Ennemis:<br />
                        -Piques: ne marchez pas dessus<br />
                        -Météorite: évitez la<br />
                        -Trex: il vous fonceras dessus, tirez lui dessus<br />
                        -Ptérodactile: il plane de gauche à droite, tirez lui dessus.
                         "];

                        $LY_1 = ["710354739", "Ninja Frog - Les Goats", "Lycée Français de Séoul<br />Séoul - Corée du Sud", "Il était une fois, dans le royaume de Croaticia, un trésor mythique d’une  valeur inestimable : le Magick Chicken. Il était détenu par le roi Croato, souverain de ces terres. Mais un jour, ce poulet légendaire disparu. Il fut enlevé par le clan des Natus, constitué de maintes créatures plus féroces les unes que les autres. Alors, le roi demanda au grand Ninja Frog de partir aux trousses de ces voleurs, et de lui ramener le Magick Chicken. C'est ainsi que votre voyage commence…"];
                        $LY_2 = ["710354729", "Mysticlef", "Lycée public de Saint-Just<br />Lyon - France", "Ce jeu est un jeu de plateforme, dans lequel vous incarnez la fameuse grenouille-ninja, partie conquérir les graduellement dangereux niveaux en tentant de récupérer les délicieux fruits !<br />
                        Pour vous déplacer, utilisez Q (gauche) et D (droite)<br />
                        Pour sauter, Z (vous disposez d'un double-saut)<br />
                        Pour faire une roulade, espace (la roulade vous rend intangible et vous redonne un saut supplémentaire)<br />
                        Bonne chance !"];
                        $LY_3 = ["710354716", "MOYMOYStudios", "Lycée Jean Guéhenno<br />Fougères - France", "Le but est de tuer \"The mechant\". Il faut utiliser les flèches et la barre d'espace."];
                        $LY_4 = ["710354708", "Ze Veri Perfekt Team", "Lycée Franco-Hellénique Eugène Delacroix<br />Athènes - Grèce", "Le jeu consiste à une aventure d'un robot magnet.<br />
                        Vous devez utiliser les flèches du haut et du bats pour bouger.<br />
                        Alors que les flèches de droite et de gauche servent à effectuer une rotation.<br />
                        Grâce à l'espace, vous pouvez déplacer des blocs et empêcher que les lasers vous touchent.<br />
                        Le but est d'arriver au carré jaune pour passer à la prochaine piste."];
                        $LY_5 = ["710354696", "Ethan et Gabin", "LEGT Saint Louis<br />Lorient - France", "Fléches directionnelles pour bouger.<br />
                        Ennemis : Projectiles du tronc et de la plante, Pics, Scie, Poule, Feu (quand allumé), Boite Piquante, Oiseau.<br />
                        Vous pouvez passer a travers la plateforme grise en passant par le bas et en sauter en utilisant la flèche du bas si vous êtes dessus.<br />
                        Il y a 5 niveaux à compléter, bonne chance !"];
                        $LY_6 = ["710354688", "L2-21", "Lycée Chateaubriand<br />Rome - Italie", "Déplacez vous avec les flèches droites et gauches.<br />
                        Pour sauter, appuyez sur espace et tirer des lances avec la flèche du haut.<br />
                        Faites votre meilleur score au dépit des obstacles et monstres hostiles qui seront de plus en plus rapide durant la partie !<br />
                        Ne vous en faites pas, pour regagnez votre vie restez en vie jusqu'à trouver un feu de camp, un bon rôti vous attend !!"];
                        $LY_7 = ["710354691", "Space Protectors", "Lycée Français International de Panama<br />Panama City - Panama", "Select ship, Move with arrows, try to avoid being killed...Good luck!"];
                        $LY_8 = ["710354677", "Pizza Sisters", "Lycée Français International de Tokyo<br />Tokyo - Japon", "Aidez Balthazar le petit oiseau tropical à satisfaire sa faim en l'aidant à collecter des petits fruits mignons dans un monde rempli de pièges et de dangers !<br />
                        Son plat préféré : la salade de fruits.<br />
                        Parviendrez-vous à le préparer ?<br />
                        Utilisez les flèches pour aller dans la direction de votre choix : la flèche droite pour aller à droite, la gauche pour aller à gauche, etc...<br />
                        Vous devez ainsi attraper les divers fruits éparpillés dans le monde !! (compteur de fruits restants en haut à droite)<br />
                        Vous disposez de trois vies. Pas plus !<br />
                        ATTENTION : évitez de toucher les différents obstacles ou projectiles, sous peine de perdre un coeur !<br />
                        Bon courage ! (n'oubliez pas d'activer le son)"];

                        $C3_jeux = [$C3_1, $C3_2, $C3_3,$C3_4,$C3_5,$C3_6,$C3_7,$C3_8];
                        $C4_jeux = [$C4_1, $C4_2, $C4_3,$C4_4,$C4_5,$C4_6,$C4_7,$C4_8];
                        $LY_jeux = [$LY_1, $LY_2, $LY_3,$LY_4,$LY_5,$LY_6,$LY_7,$LY_8];

                        shuffle($C3_jeux);
                        shuffle($C4_jeux);
                        shuffle($LY_jeux);

                        if($categorie == "C3") {
                            $jeux = $C3_jeux;
                            $categorie_titre = "SCRATCH - Sélection Cycle 3 (CM1 > 6<sup>e</sup>)";
                            $categorie_desc = "\"Cycle 3\" (élèves du CM1 à la 6<sup>e</sup>)";
                        }
                        if($categorie == "C4") {
                            $jeux = $C4_jeux;
                            $categorie_titre = "SCRATCH - Sélection Cycle 4 (6<sup>e</sup> > 3<sup>e</sup>)";
                            $categorie_desc = "\"Cycle 4\" (élèves de la 6<sup>e</sup> à la 3<sup>e</sup>)";
                        }
                        if($categorie == "LY") {
                            $jeux = $LY_jeux;
                            $categorie_titre = "SCRATCH - Sélection Lycée (Seconde > Terminale)";
                            $categorie_desc = "\"Lycée\" (élèves de la Seconde à la Terminale)";
                        }
                        ?>

                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="pt-1" style="text-transform: capitalize;">{!! $categorie_titre !!}</h2>
                                <p class="text-monospace small" style="text-align:justify">Toutes catégories confondues, plus de 1000 jeux ont été créés lors cette 6<sup>e</sup> édition de la Nuit du c0de. Ci-dessous, les 2<sup>3</sup> (ou 1000<sub>2</sub>) jeux sélectionnés pour la catégorie {!! $categorie_desc !!}. Bravo aux élèves et à leurs enseignants. Amusez-vous bien!</p>
                                <p class="text-monospace text-muted" style="font-size:70%;color:silver"><i>L'ordre des jeux est aléatoire</i></p>
                            </div>
                        </div>
                        <?php
                        foreach($jeux AS $jeu){
                            ?>
                            <div class="row mt-4">
                                <div class="text-center" style="width:505px;">
                                    <div id="{{ $jeu[0] }}" style="padding:0px 10px 0px 10px;"><img src="https://cdn2.scratch.mit.edu/get_image/project/{{ $jeu[0] }}_480x360.png" class="img-fluid" style="border-radius:4px;" width="100%" /></div>
                                    <div class="small text-monospace text-left" style="margin:10px;border:1px solid silver; padding:10px;border-radius:4px; background-color:white;">
                                        {!! $jeu[3] !!}
                                    </div>
                                </div>
                                <div class="col">
                                    <h3 class="pt-0 mt-0 mb-1">{{ $jeu[1] }}</h3>
                                    <p class="text-monospace text-muted small">{!! $jeu[2] !!}</p>
                                    <button type="button" class="btn btn-success mt-2 mb-5" onClick="document.getElementById({{ $jeu[0] }}).innerHTML='<iframe src=\'https://scratch.mit.edu/projects/{{ $jeu[0] }}/embed\' width=\'485\' height=\'402\' frameborder=\'0\' scrolling=\'no\' style=\'border-radius:5px\'></iframe>'">Jouez !</button>
                                    <div class="mt-5 text-monospace text-muted" style="font-size:70%">Si le jeu ne s'affiche pas correctement,<br />vous pouvez l'ouvrir dans un autre<br />onglet en cliquant <a href="https://scratch.mit.edu/projects/{{ $jeu[0] }}" target="_blank">ici</a>.</div>
                                </div>
                            </div>
                            <br />
                            <br />
                            <?php
                        }
                    }

                    if (in_array($categorie, ['P', 'T'])) {
                        $PI_1 = ["6z5e-9gmz", "GROWYGARDENS", "Lycée Claudel<br />Ottawa - Canada", "GrowyGardens.py", "GrowyGardens.pyxres", "Bienvenue dans notre jardin en pleine croissance : Growy Gardens! L'objectif du jeu est de faire pousser le plus de plantes possible en 3 minutes en les plantant rapidement et en assommant les corbeaux qui ont faim! Vous pouvez suivre votre score en bas à gauche. Pour vous déplacer utilisez les touches WASD ou les flèches. Vous pouvez effectuer trois actions : arroser une plante en appuyant sur la touche 1 ou J, planter des graines en appuyant sur la touche 2 ou K, et assommer un corbeau avec la touche 3 ou L. Quand les bacs a plantes sont sèches vous devez les arroser pour que votre plante puisse grandir. Une fois que la plante a grandi, courrez dessus pour la prendre et regardez votre score augmenter. Bonne chance!"];
                        $PI_2 = ["8cls-ymhp", "MARSE", "Lycée Jean Zay<br />Orléans - France", "NUIT DU CODE.py", "tokyores.pyxres", "Le but du jeu est de survivre le plus longtemps dans tokyo la nuit. L'environnement est peuplé d'enemmis des ninjas ainsi que des rats on va pouvoir se deplacer avec les touches Q à gauche et D à droite ou les fleches du claviers. On pourra sauter avec espace. On pourra sortir une épée afin de pouvoir tué les enemmis avec E. Le but est d'avoir le score le plus haut. Vous avez 3 vies. Bonne chance."];
                        $PI_3 = ["cm2d-ut36", "SAM ON T'AIME DE OUF <3", "Lycée Montesquieu<br />Libourne - France", "Nuit du c0de 2022V1.py", "graphisme.pyxel.pyxres", "Le but du jeu est de tuer des monstres marins à l'aide d'un poulpe rose (tout mignon) qui peut se déplacer et se tourner sur les côtés, vers le haut et le bas ainsi que sur ses diagonales. Des salves d'oursins agressifs arrivent à chaque nouveau niveau. Ils peuvent arriver de tout les côtés. Attention! Si un enemis vous touche , vous mourrez. Les enemis rebondissent sur les murs pour repartir à l'attaque. A chaque salve de monstres marins détruite, Un nouveau niveau débute, plus dur jusqu'au bosse final. La touche E sert a quitter le jeu, la touche R sert à recommencer lorsque que l'on a perdu, la touche D pour tourner de 45 degrès dans le sens des aiguilles d'une montre, et Q pour le sens inverse. Enfin, les flèches servent à se déplacer. Bisous !"];
                        $PI_4 = ["vw6j-5lhg", "XIAOLONGBAO", "Lycée Français International de Tokyo<br />Tokyo - Japon", "xiaolongbao.py", "xiaolongbao.pyxres", "Le joueur contrôle un bonbon rose à travers diverses aventures.<br />
                        Dans le menu des niveaux :<br />
                        - avec la touche V on arrive dans les vestiaires, où on peut choisir avec les flèches un costume pour le bonbon, qui sera sélectionné en pressant sur ENTER<br />
                        - avec la touche L on accède au mode libre, où tous les niveaux sont déjà accessibles<br />
                        - avec la touche N on joue dans le mode normal, c'est-à-dire qu’il faut réussir un niveau pour débloquer le suivant. La progression est enregistrée.<br />
                        En cliquant sur les numéros des niveaux disponibles on lance le jeu auquel correspond le chiffre.<br />
                        À tout moment, vous pouvez revenir au menu en cliquant sur la touche M.<br />
                        La touche Q vous permet de quitter le jeu.<br />
                        Nous vous proposons également une petite mélodie de qualité :)"];
                        $PI_5 = ["tbxc-vw2d", "YANNISB-NOAHDJ-THÉOT", "Lycée en Forêt<br />Montargis - France", "jeu_nuit_code.py", "1.pyxres", "Bonjour et bienvenue sur EcoInvasion !<br />Tout d'abord le but du jeux est de récupérer les pieuvres rose et laisser les oiseaux aller à la mer. Utilisez les flèches pour vous déplacer. Pour chaque oiseaux ramasser vous perdez 3 de score. Pour chaque extraterrestre détruit vous gagnez 1 ! A partir de 10 de score si vous laissez passer un oiseau dans la mer vous gagnez 1 et au contraire si vous laissez passer une extraterrestre vous perdez 4. Si vous redescendez en dessous de 10 de score ce mode se désactive. La vitesse augmente de 20% tout les 10 de score. BOSS : Tout les 15 de score il y'a 2 fois plus de monstres. Pour une expérience plus immersive veuillez vous munir d'écouteurs"];
                        $PI_6 = ["uhr7-cn2v", "LLC COURBE", "Lycée Français International André Malraux<br />Rabat - Maroc", "main.py", "3.pyxres", "Jeu de plateforme en 2D qui se joue sur deux mondes différents à la fois. Lors de votre aventure dans notre 1er niveau, vous tomberez sur de multiples obstacles à franchir et ennemis à battre. Toutefois, vous devrez vous munir de votre mystérieux pouvoir afin de franchir certains d'entre eux... Voyagez à travers les mondes afin d'arriver à la sortie de nos parcours ! La AMA vous souhaite une excellente et agréable expérience de jeu. Se déplacer à droite : Flèche de droite. Se déplacer à gauche : Flèche de gauche. Sauter : Touche Espace. Changer de dimension : Touche A"];
                        $PI_7 = ["pcjb-kdwh", "LOSCRAKOS", "Lycée Vaugelas<br />Chambéry - France", "aim_training.py", "2.pyxres", "NOUS AVONS CONCEPTUALISÉ UN \"AIM TRAINER\". IL S'AGIT D'UN JEU OU L'ON DOIT CLIQUER SUR LES MONSTRES QUI APPARAISSENT A L'ÉCRAN. LORSQUE L'ON CLIQUE DESSUS LE MONSTRE DISPARAIT. PLUS LE JEU AVANCE PLUS LE NOMBRE D'ENNEMI AUGMENTE. SI UN MONSTRE ARRIVE EN BAS DE L'ÉCRAN ON PERD UNE VIE PUIS AU BOUT DE TROIS VIE PERDU LA PARTIE EST TÉRMINÉE. POUR CLIQUER SUR LES MONSTRES IL SUFFIT DE DIRIGER LE CURSEUR AVEC LA SOURIS."];
                        $PI_8 = ["tbxc-m6sv", "ARA", "Lycée en Forêt<br />Montargis - France", "nuit du code.finalpy.py", "perso.pyxres", "Le but est d'atteindre la pièce à l'aide de la touche espace pour sauter et des touches directionnelles pour se déplacer horizontalement. Un scénario est présenter: le personnage doit récupérer toutes les pièces pour repartir chez lui."];

                        $POO_1 = ["aunh-kwcz", "STAR START", "Le Bon Sauveur<br />Le Vésinet - France", "star captain.py", "2.pyxres", "Utilisez les flèches pour vous déplacer, espace pour tirer. Les astéroïdes en fond ne sont pas des obstacles. Vous avez 20 munitions, une fois que vous les avez toutes utilisées, elles se rechargent en une seconde. Vous avez 6 points de vie, les ennemis font des dégâts allant de 1 à 6 lorsqu'ils vous touchent ou vous tirent dessus. Les ennemis arrivent par série de 10, suivis d'un boss, avec une difficulté progressive. Il y a deux types d'ennemis différents par niveau. Après les boss 1 et 3, vous recevez une amélioration de la puissance de tir. Vous gagnez après avoir vaincu le 5e boss."];
                        $POO_2 = ["vw6j-al4y", "UTACHIN17", "Lycée Français International de Tokyo<br />Tokyo - Japon", "ndc.py", "", "Ce jeu consiste a faire avancer le joueur vers l'arrivée en traversant les obstacles. Pour cela, il faut cliquer avec la souris sur un mur ou plafond pour faire bouger le joueur comme s'il s'accrochait a une liane. Plus le joueur appuie longtemps sur la souris, plus il pourra s’approcher du point clique et plus il pourra partir loin.Il peut egalement se deplacer avec les touches a et d. Il existe certains sols fait de lave, si le joueur le touche il meurt, l'environnement est également un espace toxique rempli de gaz, au bout d'un certain temps si le joueur n'arrive pas a reprendre de l'air, il meurt par intoxication et doit repartir du départ."];
                        $POO_3 = ["nprk-3d6c", "LYCEE CHOISEUL TOURS", "Lycée Choiseul<br />Tours - France", "NuitducodeLyceeChoiseulTours.py", "5.pyxres", "Le jeu est un smash bros like avec 2 personnage pouvant sauter et tirer avec chaque tir enlevant 1 hp a la personne adverse. Le joueur 1 se dirige avec fleche droite, fleche gauche, control et M. Le joueur 2 se dirige avec D, Q, space et E."];
                        $POO_4 = ["x9tr-rayk", "MIROU", "Lycée Dumont d'Urville<br />Caen - France", "nuit_du_code.py", "arthur_mathis.pyxres", "Appuyer sur les flèches directionnelles pour vous déplacer. \"Espace\" pour tirer, \"D\" pour acheter un boost de degat contre 250 d'argent, \"A\" pour acheter un boost d'argent contre 500 d'argent et \"V\" pour acheter un boost de vitesse contre 500 d'argent (limité à 4 achat). Le but est de faire le meilleur score tout en changeant de salle. Pour gagner du score il faut éliminer des ennemis mais attention à ne pas les touchers ! Appuyer sur \"R\" pour recommencer à tout moment et \"Q\" pour quitter."];
                        $POO_5 = ["29yv-n3le", "L2", "Lycée André Maurois<br />Elbeuf - France", "pioche bonome leo lola.py", "bonome.pyxres", "Notre jeu s'appelle pioche-bonome le but est de trouver la pièce derrière la terre en minant en appuyant sur A, le personnage s'appelle tohnya et peut dire hi en appuyant sur h et un coeur en appuyant sur L, il peut utiliser un jet pack en restant appuyé sur espace."];
                        $POO_6 = ["cm2d-dzp3", "NEW FOLDER", "Lycée Montesquieu<br />Libourne - France", "Jeu_v4.py", "1v12.pyxres", "Utiliser :<br />
                        -les flèches directionnelles pour se déplacer<br />
                        -la barre espace pour taper à l'épée<br />
                        Les portes sont active seulement après la mort de l'intégralité des monstres de la salle. Lors de l'apparition dans une salle, un temps d'invincibilité vous est octroyé, mais vous ne pouvez plus utiliser votre épée. Si un monstre vous touche, vous mourez =)"];
                        $POO_7 = ["pcjb-qbel", "VAUGELAS LOUIS&OSCAR", "Lycée Vaugelas<br />Chambéry - France", "main.py", "1.pyxres", "Le jeu ce joue à 2. L'objectif est de détruire le chateau adverse, pour ce faire nous invoquons des soldats qui ont tous un cout et des statistiques différents. Ce jeu utilise une monnaie par joueur. On peut gagner de ces pièces chaque seconde ou en tuant une unitée adverse.<br />
                        Unités:<br />
                        ---<br />
                          nom  | prix  | stats<br />
                          <br />
                        soldat |   50  | basique<br />
                        géant  |  500  | bcp de vie mais lent<br />
                        oiseau |  350  | rapide mais moins de vie<br />
                        boss   | 1000  | surpuissant<br />
                        <br />
                        Touches:<br />
                        ---<br />
                        Vert: A-Z-E-S<br />
                        Rouges: I-O-P-L."];
                        $POO_8 = ["aunh-89cs", "GHOST/DEV", "Le Bon Sauveur<br />Le Vésinet - France", "main.py", "main.pyxres", "KnockOut !<br />
                        Jeu de combat et d'éjection sur plateforme<br />
                        Joueur 1:<br />
                        z : saut<br />
                        q : se déplacer à gauche<br />
                        d : se déplacer à droite<br />
                        f : changer de capacités (passer de corps à corps à attaque à distance et inversement)<br />
                        a : attaque rapide<br />
                        e : attaque lourde # Non terminée<br />
                        <br />
                        Joueur 2:<br />
                        8 (numpad) : saut<br />
                        4 (numpad) : se déplacer à gauche<br />
                        6 (numpad) : se déplacer à droite<br />
                        + (numpad) : changer de capacités (passer de corps à corps à attaque à distance et inversement)<br />
                        7 : attaque rapide<br />
                        9 : attaque lourde # Non terminée<br />
                        <br />
                        Pour gagner, il faut éjecter 3 fois son adversaire du terrain.<br />
                        Plus on le tape, plus son adversaire prendra de dégâts et donc sera éjecté loin!<br />
                        Lorsqu'un joueur n'a plus de vie, le jeu se ferme automatiquement"];

                        $PI_jeux = [$PI_1, $PI_2, $PI_3,$PI_4,$PI_5,$PI_6,$PI_7,$PI_8];
                        $POO_jeux = [$POO_1, $POO_2, $POO_3,$POO_4,$POO_5,$POO_6,$POO_7,$POO_8];

                        shuffle($PI_jeux);
                        shuffle($POO_jeux);

                        if($categorie == "P") {
                            $jeux = $PI_jeux;
                            $categorie_titre = "PYTHON - Sélection Première NSI";
                            $categorie_desc = "\"Première NSI\"";
                        }
                        if($categorie == "T") {
                            $jeux = $POO_jeux;
                            $categorie_titre = "PYTHON - Sélection Terminale NSI";
                            $categorie_desc = "\"Terminale NSI\"";
                        }
                        ?>

                        <div class="row">
                            <div class="col-md-7">
                                <h2 class="pt-1" style="text-transform: capitalize;">{!! $categorie_titre !!}</h2>
                                <p class="text-monospace small" style="text-align:justify">Toutes catégories confondues, plus de 1000 jeux ont été créés lors cette 6<sup>e</sup> édition de la Nuit du c0de. Ci-dessous, les 2<sup>3</sup> (ou 1000<sub>2</sub>) jeux sélectionnés pour la catégorie {!! $categorie_desc !!}. Bravo aux élèves et à leurs enseignants. Amusez-vous bien!</p>
                                <p class="text-monospace text-muted" style="font-size:70%;color:silver"><i>L'ordre des jeux est aléatoire</i></p>
                            </div>
                        </div>

                        <?php
                        foreach($jeux AS $jeu){
                            ?>

                            <div class="row mt-4">
                                <div class="col-md-7">

<pre class="m-0"><code id="htmlViewer" style="color:rgb(216, 222, 233); font-weight:400;background-color:rgb(46, 52, 64);background:rgb(46, 52, 64);display:block;padding: 1.5em;border-radius:5px;"><span style="color:rgb(129, 161, 193); font-weight:400;">import</span> requests, os
code = <span style="color:rgb(163, 190, 140); font-weight:400;">'{!! $jeu[0] !!}'</span>
site = <span style="color:rgb(163, 190, 140); font-weight:400;">'https://www.nuitducode.net'</span>
url = site + <span style="color:rgb(163, 190, 140); font-weight:400;">'/storage/fichiers_pyxel/'</span> + code
<span style="color:rgb(129, 161, 193); font-weight:400;">py</span> = requests.<span style="color:rgb(129, 161, 193); font-weight:400;">get</span>(url + <span style="color:rgb(163, 190, 140); font-weight:400;">'/{!! $jeu[3] !!}'</span>)
with <span style="color:rgb(129, 161, 193); font-weight:400;">open</span>(<span style="color:rgb(163, 190, 140); font-weight:400;">'{!! $jeu[3] !!}'</span>, <span style="color:rgb(163, 190, 140); font-weight:400;">'wb'</span>) <span style="color:rgb(129, 161, 193); font-weight:400;">as</span> file:
    file.write(<span style="color:rgb(129, 161, 193); font-weight:400;">py</span>.content)
<span style="color:rgb(129, 161, 193); font-weight:400;">pyxres</span> = requests.<span style="color:rgb(129, 161, 193); font-weight:400;">get</span>(url + <span style="color:rgb(163, 190, 140); font-weight:400;">'/{!! $jeu[4] !!}'</span>)
<?php if($jeu[4] !== "") { ?>
with <span style="color:rgb(129, 161, 193); font-weight:400;">open</span>(<span style="color:rgb(163, 190, 140); font-weight:400;">'{!! $jeu[4] !!}'</span>, <span style="color:rgb(163, 190, 140); font-weight:400;">'wb'</span>) <span style="color:rgb(129, 161, 193); font-weight:400;">as</span> file:
    file.write(<span style="color:rgb(129, 161, 193); font-weight:400;">pyxres</span>.content)
<?php } ?>
print(<span style="color:rgb(129, 161, 193); font-weight:400;">py</span>.content.<span style="color:rgb(129, 161, 193); font-weight:400;">decode</span>())
os.system(<span style="color:rgb(163, 190, 140); font-weight:400;">'pyxel run "{!! $jeu[3] !!}"'</span>)
</code></pre>
                                    <div class="small text-monospace text-left" style="margin-top:10px;border:1px solid silver; padding:10px;border-radius:4px; background-color:white;">
                                        {!! $jeu[5] !!}
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <h3 class="pt-0 mt-0 mb-1">{{ $jeu[1] }}</h3>
                                    <p class="text-monospace text-muted small">{!! $jeu[2] !!}</p>
                                    <div class="text-monospace small" style="text-align:justify;">
                                        Pour lancer le jeu, copier-coller le code ci-contre un environnement Python possédant les bibliothèques <i><a href="https://github.com/kitao/pyxel/" target="_blank">pyxel</a></i> et <i><a href="https://pypi.org/project/requests/" target="_blank">requests</a></i>.<br />
                                        Pour installer un environnement Python + Pyxel, voir la <a href="https://nuitducode.github.io/DOCUMENTATION/PYTHON/02-installation/" target="_blank">documentation</a>.
                                    </div>

                                </div>
                            </div>
                            <br />
                            <br />

                            <?php
                        }
                    }
                } else {
                    ?>
                    <h2 class="pt-1 mb-4">LES JEUX</h2>
                    <div class="row">
                        <div class="col-md-2">
                            <h4>Scratch</h4>
                            <a class=" btn btn-info btn-sm btn-block text-left" href="/ndc2022/C3" role="button">Cycle 3</a>
                            <a class=" btn btn-info btn-sm btn-block text-left" href="/ndc2022/C4" role="button">Cycle 4</a>
                            <a class=" btn btn-info btn-sm btn-block text-left" href="/ndc2022/LY" role="button">Lycée</a>
                            <h4>Python</h4>
                            <a class=" btn btn-info btn-sm btn-block text-left" href="/ndc2022/P" role="button">Première</a>
                            <a class=" btn btn-info btn-sm btn-block text-left" href="/ndc2022/T" role="button">Terminale</a>
                        </div>
                    </div>
                    <?php
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
