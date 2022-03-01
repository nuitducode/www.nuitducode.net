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
		<div class="row pt-3">
			<div class="col-md-2"></div>

			<div class="col-md-10">

				@if (session('status'))
					<div class="text-success text-monospace text-center pb-4" role="alert">
						{{ session('status') }}
					</div>
				@endif

    			<div class="row">
                    <div class="col-md-12">
                        <?php
                        $json = file_get_contents("https://api.scratch.mit.edu/projects/310928987");
                        $jeu = json_decode($json);
                        ?>
                        <h2 class="mb-0">[NdC 2022 - C3] {{$jeu->title}}</h2>
                        <div class="text-monospace small">Création : {{$jeu->history->created}}</div>
                        <div class="text-monospace small">Derniere modification : {{$jeu->history->modified}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <iframe src="https://scratch.mit.edu/projects/310928987/embed" allowtransparency="true" width="100%" height="402" frameborder="0" scrolling="no" allowfullscreen></iframe>
                        <div class="small text-monospace" style="border:1px solid silver; padding:10px;border-radius:4px; background-color:white;">{{$jeu->instructions}}</div>
                        <div class="text-monospace small text-muted pt-1 pl-1">
                            <i class="fas fa-gamepad" style="font-size:140%;vertical-align:-1px;"></i> <a href="https://scratch.mit.edu/projects/{{$jeu->id}}" target="_blank">{{$jeu->id}}</a> ~
                            <i class="fas fa-user-circle"></i> <a href="https://scratch.mit.edu/users/{{$jeu->author->username}}" target="_blank">{{$jeu->author->username}}</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        Critère 1
                        <input type="range" class="custom-range" min="0" max="5" step="1" id="customRange3">
                        Critère 2
                        <input type="range" class="custom-range" min="0" max="5" step="1" id="customRange3">
                        Critère 3
                        <input type="range" class="custom-range" min="0" max="5" step="1" id="customRange3">
                        Critère 4
                        <input type="range" class="custom-range" min="0" max="5" step="1" id="customRange3">
                        Critère 5
                        <input type="range" class="custom-range" min="0" max="5" step="1" id="customRange3">
    				</div>
    			</div>
            </div>
        </div>
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
