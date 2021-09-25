<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('inc-meta')
    <title>Les éditions en vidéo</title>
</head>
<body data-spy="scroll" data-target="#navbar-scrollspy" data-offset="90">

	<div class="container mb-5">
		<div class="row">

			<div class="col-md-3">
                <div class="sticky-top mb-5 pt-2">
					@include('inc-nav')
                    <nav id="navbar-scrollspy" class="navbar pt-5">
                        <nav class="nav nav-pills flex-column">
                            <a class="nav-link" href="#item-2-6">2021</a>
                            <a class="nav-link" href="#item-2-5">2020</a>
                            <a class="nav-link" href="#item-2-4">2019</a>
                            <a class="nav-link" href="#item-2-3">2018</a>
                            <a class="nav-link" href="#item-2-2">2017</a>
                            <a class="nav-link" href="#item-2-1">2016</a>
                        </nav>
                    </nav>
                </div>
			</div>

			<div class="col-md-9 text-justify">

                <div style="margin-bottom:800px">
                    <h1 id="item-1-0">LES ÉDITIONS EN VIDÉO</h1>
                    <p>Toutes les éditions de la Nuit du c0de en vidéo.</p>

                    <h2 id="item-2-6" class="pt-3">2021</h2>
					<p class="mb-1">Cinquième édition mais première édition à distance. Parmis les 50 établissements inscrits, le collège La Source d'Amnéville.</p>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" style="border-radius:5px;" src="https://www.youtube-nocookie.com/embed/kyWePsm__nA?autoplay=0&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>


                    <h2 id="item-2-5" class="pt-3">2020</h2>
					<p class="mb-1">Édition annulée pour cause de Covid.</p>

                    <h2 id="item-2-4" class="pt-3">2019</h2>
					<p class="mb-1">Quatrième édition.</p>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" style="border-radius:5px;" src="https://www.youtube-nocookie.com/embed/4QJCBPgeynQ?autoplay=0&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>

                    <h2 id="item-2-3" class="pt-3">2018</h2>
					<p class="mb-1">Troisième édition.</p>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" style="border-radius:5px;" src="https://www.youtube-nocookie.com/embed/lMQorCyj-EA?autoplay=0&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>

                    <h2 id="item-2-2" class="pt-3">2017</h2>
					<p class="mb-1">Deuxième édition.</p>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" style="border-radius:5px;" src="https://www.youtube-nocookie.com/embed/HlhyWItxktk?autoplay=0&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>

                    <h2 id="item-2-1" class="pt-3">2016</h2>
					<p class="mb-1">Première édition.</p>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" style="border-radius:5px;" src="https://www.youtube-nocookie.com/embed/WgSGSRSX3lc?autoplay=0&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>

                </div>

			</div>

		</div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
