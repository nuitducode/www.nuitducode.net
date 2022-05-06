@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <link href="{{ asset('css/dropzone-basic.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
    <title>Nuit du c0de | Dépôt jeu SCRATCH ou PYTHON</title>
</head>
<body>

    @include('inc-nav')

	<div class="container mb-5">
		<div class="row">

			<div class="col-md-6 offset-md-3">

                <div class="text-center mb-4"><img src="{{ url('/')}}/img/nuitducode-scratch-python.svg" width="320" /></div>

                <div class="mt-5 text-center text-success text-monospace">
                    <span style="font-size:50px">👍</span><br />
                    <h1 class="text-center text-success text-monospace mt-2">JEU DÉPOSÉ<h1>
                </div>
                <?php
                $fichiers = $_GET['f'];
                $fichiers = str_replace("@", "</kbd> et <kbd>", $fichiers);
                ?>
                <div>
                    Vous avez déposé : <kbd><?php echo $fichiers ?></kbd>
                    <br />
                    <br />
                    S'il s'agit d'une erreur, vous pouvez prévenir votre enseignant. Il supprimera ce dépôt et vous pourrez recommencer.
                </div>
                
                <div class="mt-5 text-center text-monospace small" style="color:silver">
                    vous pouvez quitter cette page
                </div>

			</div>

		</div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
