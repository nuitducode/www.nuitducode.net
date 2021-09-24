@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>

	<div class="container mt-4 mb-5">

		<div class="row mb-5">
			<div class="col-md-6 offset-md-1 text-center">
				<img src="{{ asset('img/nuitducode.svg') }}" width="140" /></a>
			</div>
			<div class="col-md-3 text-center">
					<a href="https://twitter.com/nuitducode" target="_blank"><button type="button" class="btn btn-light btn-sm text-muted ml-1 pt-2"><i class="fab fa-twitter"></i></button></a>
					<!--
					<a href="" target="_blank"><button type="button" class="btn btn-light btn-sm text-muted ml-1 pt-2"><i class="fab fa-github-alt"></i></button></a>
					<a href="" target="_blank"><button type="button" class="btn btn-light btn-sm text-muted ml-1 pt-2"><i class="fab fa-youtube"></i></button></a>
					<a href="" target="_blank"><button type="button" class="btn btn-light btn-sm text-muted ml-1 pt-2"><img src="{{ asset('img/icon-scratch.svg') }}" width="13" /></button></a>
					-->
					<br />
					<br />
					<a class="btn btn-outline-secondary btn-sm" style="font-size:80%;opacity:0.3;margin:2px 0px 0px 4px" href="login" role="button">se connecter</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 offset-md-1">

				<p class="text-monospace text-muted small text-justify">
					La <b>Nuit du c0de</b> est un concours de programmation <a href="https://scratch.mit.edu/" target="_blank"><img src="{{ asset('img/scratch.svg') }}" /></a>. Il s’adresse à tous les collèges / lycées de France et du monde.
				</p>
				<p class="text-monospace text-muted small text-justify">
					Chaque établissement peut inscrire autant d’élèves qu’il le souhaite, il n’y a pas de limite sur le nombre de participants. Les inscriptions sont gratuites.
				</p>
				<p class="text-center mt-3">
					<span class="small" style="font-weight:bold;color:#d35400">{{ DB::table('users')->count(); }}</span>
					<span class="text-monospace small" style="color:silver"> établissements inscrits</span>
					<span class="ml-3 small" style="font-weight:bold;color:#d35400">{{ DB::table('users')->sum('nb_participants'); }}</span>
					<span class="text-monospace small" style="color:silver"> élèves</span>
					<span class="ml-3 small" style="font-weight:bold;color:#d35400">{{ DB::table('users')->distinct()->count('ville'); }}</span>
					<span class="text-monospace small" style="color:silver"> villes</span>
					<span class="ml-3 small" style="font-weight:bold;color:#d35400">{{ DB::table('users')->distinct()->count('pays'); }}</span>
					<span class="text-monospace small" style="color:silver"> pays</span>
				</p>
				<p class="text-center mt-3">
					<a class="btn btn-warning" href="register" role="button"><img src="{{ asset('img/icon-green-flag.svg') }}" width="12" class="mr-2" />inscrire un établissement</a>
				</p>

				<p class="text-monospace text-muted small text-justify mt-5">
					Par équipes de deux ou trois réparties en plusieurs catégories, les élèves auront six heures pour programmer entièrement un jeu avec le logiciel Scratch à partir d’un univers de jeu fourni.
				</p>
				<p class="text-monospace text-muted small text-justify mt-2">
					L'organisation de l'édition 2022 est similaire à celle de 2021:
					<ul class="text-monospace text-muted small text-justify">
						<li class="mb-3">Chaque établissement organisera sa <b>Nuit du c0de</b> avec tous les supports que nous fournirons. Le Lycée français de Tokyo (qui prend cette année le relais du Lycée Français de Taipei), organisateur de l’évènement, se charge de l’élaboration et de la diffusion de tous les documents nécessaires à l’organisation du concours.</li>
						<li class="mb-3">Chaque établissement pourra organiser l'épreuve <b style="color:#4cbf56">entre fin avril et fin mai 2022</b> (des dates plus précises seront fournies dans les  prochaines semaines).</li>
						<li class="mb-3">Tous les établissements de l'étranger et de France peuvent s'inscrire.</li>
						<li class="mb-3">À l’issue du jeu, chaque établissement sélectionne ses équipes championnes. Elles le représenteront pour le classement international.</li>
						<li class="mb-3">Les champions réalisent une courte vidéo de leur projet (vidéo de type gaming).</li>
						<li class="mb-3">Le Lycée Français de Tokyo centralisera les jeux de toutes les équipes championnes.</li>
						<li class="mb-3">Un classement international est établi par un jury d’enseignant.</li>
					</ul>
				</p>
				<p class="text-monospace text-muted small text-justify mt-2">
					La <b>Nuit du c0de</b> se déroule forcément la nuit ? Non. Heureusement. Chaque établissement organise sa <b>Nuit du c0de</b> en fonction de ses ressources et de ses contraintes. Le matin, l'après-midi, le soir, en semaine, le week-end, c'est selon.
				</p>
				<p class="text-monospace text-muted small text-justify mt-2">
					Alors, pourquoi la <b><u>Nuit</u> du c0de</b> ? Car, lors des premières éditions, les établissements de la zone Asie-Pacifique se retrouvaient à Taipei le temps d'un week-end riche en rencontres et aventures (grâce à Alexis Kauffmann et Jean-Yves Labouche). Le concours proprement dit débutait à 18h pour se finir à minuit. De nuit donc.
				</p>


			</div>

			<div class="col-md-3 text-center">
				<div class="bouton"><a href="regles-conseils"><img src="{{ asset('img/bouton_regles-conseils.svg') }}" /></a></div>
				<div class="bouton"><a href="https://github.com/nuit-du-code/ORGANISATION/discussions" target="_blank"><img src="{{ asset('img/bouton_discussions.svg') }}" /></a></div>

				<!--
				<div class="bouton"><a href="presentation"><img src="{{ asset('img/bouton_presentation.svg') }}" /></a></div>
				<div class="bouton"><a href="organisation"><img src="{{ asset('img/bouton_organisation.svg') }}" /></a></div>
				<div class="bouton"><a href="faq"><img src="{{ asset('img/bouton_faq.svg') }}" /></a></div>
				-->
			</div>


		</div><!-- row -->

		<div class="row">
			<!--
			<div class="col-md-12">
				<div class="embed-responsive embed-responsive-16by9 mt-5">
				<iframe class="embed-responsive-item" style="border-radius:5px;" src="https://www.youtube-nocookie.com/embed/4L9GvP7wetU?autoplay=1&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			-->
		</div><!-- row -->
	</div><!-- container -->

	@include('inc-footer')
	@include('inc-bottom-js')
<!--
<script>
$('.videoplay').on('click', function() {
    $("#video")[0].src += "?autoplay=1";
});
</script>
-->
</body>
</html>
