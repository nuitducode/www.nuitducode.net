@include('inc-top')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('inc-meta')
    <title>{{ config('app.name', 'Laravel') }}</title>
	<!-- Matomo - données anonymisées - pas de cookies - RGPD -->
	<script>
		var _paq = window._paq = window._paq || [];
		/* tracker methods like "setCustomDimension" should be called before "trackPageView" */
		_paq.push(['trackPageView']);
		_paq.push(['enableLinkTracking']);
		(function() {
			var u="//www.awame.net/matomo/";
			_paq.push(['setTrackerUrl', u+'matomo.php']);
			_paq.push(['setSiteId', '10']);
			var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
			g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
		})();
	</script>
	<!-- End Matomo Code -->
</head>
<body>

	<div class="container mt-4 mb-5">

		<div class="row mb-4">

			<div class="col-md-6 offset-md-1 text-center">
				<img src="{{ asset('img/nuitducode-scratch-python.svg') }}" width="260" />
				<p class="text-monospace small" style="font-weight:bold">~ 6<sup>e</sup> édition ~<br />
					<b style="color:#4cbf56">du 2 mai au 11 juin 2022</b>
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

		</div><!-- row -->

		<div class="row">

			<div class="col-md-6 offset-md-1">

				<p class="text-monospace text-muted small text-justify">
					La <b style="color:#2c3e50">Nuit du c0de</b> est un marathon de programmation <a href="https://scratch.mit.edu/" target="_blank"><img src="{{ asset('img/scratch-logo.svg') }}" /></a> et <a href="https://www.python.org/" target="_blank"><img src="{{ asset('img/python-logo.svg') }}" /></a>. Il s'adresse à tous les établissements scolaires français (cours moyen / collège / lycée) de l'étranger et de France.
				</p>
				<p class="text-monospace text-muted small text-justify">
					Chaque établissement peut inscrire autant d'élèves qu'il le souhaite. Il n'y a pas de limite sur le nombre de participants. Les inscriptions sont gratuites.
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

				<!--
				<p class="text-center mt-3">
					<a class="btn btn-warning" href="register" role="button"><img src="{{ asset('img/icon-green-flag.svg') }}" width="12" class="mr-2" />inscrire un établissement</a>
				</p>
				-->

				<p class="m-0 mt-5 mb-2 text-monospace font-weight-bold" style="color:#cf63cf">Jeux 2022</p>
				<div class="mb-1 text-monospace">
					Scratch&nbsp;: <a class="btn btn-primary btn-sm" href="/ndc2022/C3" role="button">Cycle 3 (CM1>6<sup>e</sup>)</a>
					<a class="btn btn-primary btn-sm" href="/ndc2022/C4" role="button">Cycle 4 (5<sup>e</sup>>3<sup>e</sup>)</a>
					<a class="btn btn-primary btn-sm" href="/ndc2022/LY" role="button">Lycée (2<sup>de</sup>>Tle)</a><br />
				</div>
				<div class="mb-5 text-monospace">
					Python&nbsp;&nbsp;: <a class="btn btn-primary btn-sm" href="/ndc2022/P" role="button">Première NSI</a>
					<a class="btn btn-primary btn-sm" href="/ndc2022/T" role="button">Terminale NSI</a>
				</div>

				<iframe style="border-radius:5px" width="100%" height="300px" frameborder="0" allowfullscreen src="//umap.openstreetmap.fr/en/map/nuit-du-code_759208?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=false&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=null&onLoadPanel=undefined&captionBar=false"></iframe>

				<p class="text-monospace text-muted small text-justify mt-4">
					Par équipes de deux ou trois réparties en plusieurs catégories, les élèves auront six heures pour programmer entièrement un jeu avec le logiciel Scratch (ou en Python) à partir d'un univers de jeu fourni.
				</p>
				<p class="text-monospace text-muted small text-justify mt-2">
					Organisation de l'édition 2022:
					<ul class="text-monospace text-muted small text-justify">
						<li class="mb-3">Chaque établissement organise sa <b style="color:#2c3e50">Nuit du c0de</b> entre <b style="color:#4cbf56">le 2 mai et le 11 juin 2022</b> (selon ses ressources et ses contraintes). Le Lycée Français de Tokyo (qui prend cette année le relais du Lycée Français de Taipei), organisateur de l'évènement, se charge de l'élaboration et de la diffusion de tous les documents et supports nécessaires à l'organisation du concours.</li>
						<li class="mb-3">À l'issue du jeu, chaque établissement sélectionne ses équipes championnes. Elles le représenteront pour le classement international.</li>
						<li class="mb-3">Le Lycée Français de Tokyo centralisera les jeux de toutes les équipes championnes.</li>
						<li class="mb-3">Un classement international est établi par un jury d'enseignants.</li>
					</ul>
				</p>
				<br />
				<p class="text-monospace text-muted small text-justify mt-2">
					La <b style="color:#2c3e50">Nuit du c0de</b> se déroule forcément la nuit ? Non. Heureusement. Chaque établissement organise sa <b style="color:#2c3e50">Nuit du c0de</b> en fonction de ses ressources et de ses contraintes. Le matin, l'après-midi, le soir, en semaine, le week-end, c'est selon.
				</p>
				<p class="text-monospace text-muted small text-justify mt-2">
					Alors, pourquoi la <b style="color:#2c3e50"><u>Nuit</u> du c0de</b> ? Car, lors des premières éditions, les établissements de la zone Asie-Pacifique se retrouvaient à Taipei le temps d'un week-end riche en rencontres et aventures (grâce à Alexis Kauffmann et Jean-Yves Labouche). Le concours proprement dit débutait à 18h pour se finir à minuit. De nuit donc.
				</p>

			</div>

			<div class="col-md-3 text-center">

				<div class="text-monospace text-right mx-auto" style="width:150px;color:#dadee2;font-size:70%;line-height: 1.1;">pour préparer<br />la prochaine édition</div>

				<div class="bouton mt-1">
					<a href="presentation">
						<svg xmlns="http://www.w3.org/2000/svg" width="150" viewBox="0 0 241 58">
							<g aria-label="scratchbox" font-size="1.5em" color="#ffffff" fill="#ffffff" font-family="Nunito" font-weight="400" letter-spacing="0" style="line-height:1.25" word-spacing="0">
						    	<path fill="#cf63cf" stroke="#bd42bd" d="M0.5 4.5a4 4 0 0 1 4-4h8c2 0 3 1 4 2l4 4c1 1 2 2 4 2h12c2 0 3-1 4-2l4-4c1-1 2-2 4-2h188a4 4 0 0 1 4 4v40a4 4 0 0 1-4 4h-188c-2 0-3 1-4 2l-4 4c-1 1-2 2-4 2h-12c-2 0-3-1-4-2l-4-4c-1-1-2-2-4-2h-8a4 4 0 0 1-4-4z"/>
								<text x="0.7em" y="1.6em">présentation</text>
							</g>
						</svg>
					</a>
				</div>

				<div class="bouton">
					<a href="https://nuitducode.github.io/DOCUMENTATION/organisation/" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="150" viewBox="0 0 241 58">
							<g aria-label="scratchbox" font-size="1.5em" color="#ffffff" fill="#ffffff" font-family="Nunito" font-weight="400" letter-spacing="0" style="line-height:1.25" word-spacing="0">
						    	<path fill="#cf63cf" stroke="#bd42bd" d="M0.5 4.5a4 4 0 0 1 4-4h8c2 0 3 1 4 2l4 4c1 1 2 2 4 2h12c2 0 3-1 4-2l4-4c1-1 2-2 4-2h188a4 4 0 0 1 4 4v40a4 4 0 0 1-4 4h-188c-2 0-3 1-4 2l-4 4c-1 1-2 2-4 2h-12c-2 0-3-1-4-2l-4-4c-1-1-2-2-4-2h-8a4 4 0 0 1-4-4z"/>
								<text x="0.7em" y="1.6em">organisation</text>
							</g>
						</svg>
					</a>
				</div>

				<div class="bouton">
					<a href="https://nuitducode.github.io/DOCUMENTATION/regles-conseils/" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="150" viewBox="0 0 241 58">
							<g aria-label="scratchbox" font-size="1.5em" color="#ffffff" fill="#ffffff" font-family="Nunito" font-weight="400" letter-spacing="0" style="line-height:1.25" word-spacing="0">
						    	<path fill="#cf63cf" stroke="#bd42bd" d="M0.5 4.5a4 4 0 0 1 4-4h8c2 0 3 1 4 2l4 4c1 1 2 2 4 2h12c2 0 3-1 4-2l4-4c1-1 2-2 4-2h188a4 4 0 0 1 4 4v40a4 4 0 0 1-4 4h-188c-2 0-3 1-4 2l-4 4c-1 1-2 2-4 2h-12c-2 0-3-1-4-2l-4-4c-1-1-2-2-4-2h-8a4 4 0 0 1-4-4z"/>
								<text x="0.7em" y="1.6em">règles et conseils</text>
							</g>
						</svg>
					</a>
				</div>

				<div class="bouton">
					<a href="editions-en-video">
						<svg xmlns="http://www.w3.org/2000/svg" width="150" viewBox="0 0 241 58">
							<g aria-label="scratchbox" font-size="1.5em" color="#ffffff" fill="#ffffff" font-family="Nunito" font-weight="400" letter-spacing="0" style="line-height:1.25" word-spacing="0">
						    	<path fill="#cf63cf" stroke="#bd42bd" d="M0.5 4.5a4 4 0 0 1 4-4h8c2 0 3 1 4 2l4 4c1 1 2 2 4 2h12c2 0 3-1 4-2l4-4c1-1 2-2 4-2h188a4 4 0 0 1 4 4v40a4 4 0 0 1-4 4h-188c-2 0-3 1-4 2l-4 4c-1 1-2 2-4 2h-12c-2 0-3-1-4-2l-4-4c-1-1-2-2-4-2h-8a4 4 0 0 1-4-4z"/>
								<text x="0.7em" y="1.6em">éditions en vidéo</text>
							</g>
						</svg>
					</a>
				</div>

				<div class="bouton mb-4">
					<a href="images">
						<svg xmlns="http://www.w3.org/2000/svg" width="150" viewBox="0 0 241 58">
							<g aria-label="scratchbox" font-size="1.5em" color="#ffffff" fill="#ffffff" font-family="Nunito" font-weight="400" letter-spacing="0" style="line-height:1.25" word-spacing="0">
						    	<path fill="#cf63cf" stroke="#bd42bd" d="M0.5 4.5a4 4 0 0 1 4-4h8c2 0 3 1 4 2l4 4c1 1 2 2 4 2h12c2 0 3-1 4-2l4-4c1-1 2-2 4-2h188a4 4 0 0 1 4 4v40a4 4 0 0 1-4 4h-188c-2 0-3 1-4 2l-4 4c-1 1-2 2-4 2h-12c-2 0-3-1-4-2l-4-4c-1-1-2-2-4-2h-8a4 4 0 0 1-4-4z"/>
								<text x="0.7em" y="1.6em">logos & affiches</text>
							</g>
						</svg>
					</a>
				</div>

				<div class="bouton">
					<a href="https://nuitducode.github.io/DOCUMENTATION/SCRATCH/01-introduction/" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="150" viewBox="0 0 241 58">
							<g aria-label="scratchbox" font-size="1.5em" color="#ffffff" fill="#ffffff" font-family="Nunito" font-weight="400" letter-spacing="0" style="line-height:1.25" word-spacing="0">
								<path fill="#4c97ff" stroke="#3373cc" d="M0.5 4.5a4 4 0 0 1 4-4h8c2 0 3 1 4 2l4 4c1 1 2 2 4 2h12c2 0 3-1 4-2l4-4c1-1 2-2 4-2h188a4 4 0 0 1 4 4v40a4 4 0 0 1-4 4h-188c-2 0-3 1-4 2l-4 4c-1 1-2 2-4 2h-12c-2 0-3-1-4-2l-4-4c-1-1-2-2-4-2h-8a4 4 0 0 1-4-4z"/>
								<text x="0.7em" y="1.6em">entraînement scratch</text>
							</g>
						</svg>
					</a>
				</div>

				<div class="bouton">
					<a href="https://nuitducode.github.io/DOCUMENTATION/PYTHON/01-presentation/" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="150" viewBox="0 0 241 58">
							<g aria-label="scratchbox" font-size="1.5em" color="#ffffff" fill="#ffffff" font-family="Nunito" font-weight="400" letter-spacing="0" style="line-height:1.25" word-spacing="0">
								<path fill="#4c97ff" stroke="#3373cc" d="M0.5 4.5a4 4 0 0 1 4-4h8c2 0 3 1 4 2l4 4c1 1 2 2 4 2h12c2 0 3-1 4-2l4-4c1-1 2-2 4-2h188a4 4 0 0 1 4 4v40a4 4 0 0 1-4 4h-188c-2 0-3 1-4 2l-4 4c-1 1-2 2-4 2h-12c-2 0-3-1-4-2l-4-4c-1-1-2-2-4-2h-8a4 4 0 0 1-4-4z"/>
								<text x="0.7em" y="1.6em">entraînement python</text>
							</g>
						</svg>
					</a>
				</div>

				<div class="bouton mt-3">
					<a href="https://github.com/nuit-du-code/ORGANISATION/discussions" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="150" viewBox="0 0 241 58">
							<g aria-label="scratchbox" font-size="1.5em" color="#ffffff" fill="#ffffff" font-family="Nunito" font-weight="400" letter-spacing="0" style="line-height:1.25" word-spacing="0">
						    	<path fill="#9966ff" stroke="#774dcb" d="M0.5 4.5a4 4 0 0 1 4-4h8c2 0 3 1 4 2l4 4c1 1 2 2 4 2h12c2 0 3-1 4-2l4-4c1-1 2-2 4-2h188a4 4 0 0 1 4 4v40a4 4 0 0 1-4 4h-188c-2 0-3 1-4 2l-4 4c-1 1-2 2-4 2h-12c-2 0-3-1-4-2l-4-4c-1-1-2-2-4-2h-8a4 4 0 0 1-4-4z"/>
								<text x="0.7em" y="1.6em">discussions</text>
							</g>
						</svg>
					</a>
				</div>



				<!--
				<div class="bouton"><a href="presentation"><img src="{{ asset('img/bouton_presentation.svg') }}" /></a></div>
				<div class="bouton"><a href="organisation"><img src="{{ asset('img/bouton_organisation.svg') }}" /></a></div>
				<div class="bouton"><a href="faq"><img src="{{ asset('img/bouton_faq.svg') }}" /></a></div>
				-->
			</div>

		</div><!-- row -->

	</div><!-- container -->

	@include('inc-footer')
	@include('inc-bottom-js')

</body>
</html>
