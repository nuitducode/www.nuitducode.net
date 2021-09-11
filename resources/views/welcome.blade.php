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
			<div class="col-md-5 offset-md-2 text-center">
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
			<div class="col-md-5 offset-md-2">

				<p class="text-monospace text-muted small text-justify">
					La <b>Nuit du c0de</b> est un concours de programmation <a href="https://scratch.mit.edu/" target="_blank"><img src="{{ asset('img/scratch.svg') }}" /></a>. Il s’adresse à tous les collèges / lycées de France et du monde.
				</p>
				<p class="text-monospace text-muted small text-justify">
					Chaque établissement peut inscrire autant d’élèves qu’il le souhaite, il n’y a pas de limite sur le nombre de participants. Les inscriptions sont gratuites.
				</p>
				<p class="text-center mt-5">
					<a class="btn btn-warning" href="register" role="button"><img src="{{ asset('img/icon-green-flag.svg') }}" width="12" class="mr-2" />inscrire un établissement</a>
				</p>
				<p class="text-center mt-5">
					<span class="small" style="font-weight:bold;color:#d35400">{{ DB::table('users')->count(); }}</span>
					<span class="text-monospace small" style="color:silver"> établissements inscrits</span>
					<span class="ml-3 small" style="font-weight:bold;color:#d35400">{{ DB::table('users')->sum('nb_participants'); }}</span>
					<span class="text-monospace small" style="color:silver"> élèves</span>
					<span class="ml-3 small" style="font-weight:bold;color:#d35400">{{ DB::table('users')->distinct()->count('ville'); }}</span>
					<span class="text-monospace small" style="color:silver"> villes</span>
					<span class="ml-3 small" style="font-weight:bold;color:#d35400">{{ DB::table('users')->distinct()->count('pays'); }}</span>
					<span class="text-monospace small" style="color:silver"> pays</span>
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
<script>
$('.videoplay').on('click', function() {
    $("#video")[0].src += "?autoplay=1";
});
</script>
</body>
</html>
