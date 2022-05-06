@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <link href="{{ asset('css/dropzone-basic.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }} | Nouveau jeu</title>
</head>
<body>

    @include('inc-nav')

	<div class="container mb-5">
		<div class="row">

			<div class="col-md-6 offset-md-3">

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

                <div class="text-center mb-4"><img src="{{ url('/')}}/img/nuitducode-scratch-python.svg" width="320" /></div>

                <form id="python_submit" method="POST" action="{{ route(request()->segment(1).'-jeu-deposer_post') }}" enctype="multipart/form-data">

					@csrf

                    <div class="form-group">
						<div for="nom_equipe" class="text-info">NOM DE L'ÉQUIPE <sup class="text-danger">*</sup></div>
                        <div class="text-monospace text-muted small mb-1">Choisir un nom d'équipe de 20 caractères maximum et sans caractères spéciaux.</div>
						<input id="nom_equipe" name="nom_equipe" type="text" class="form-control @error('nom_equipe') is-invalid @enderror" value="{{ old('nom_equipe') }}" autofocus required>
						@error('nom_equipe')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

                    <div class="form-group">
                        <div for="categorie" class="text-info">CATÉGORIE <sup class="text-danger">*</sup></div>
                        <select id="categorie" name="categorie" class="custom-select @error('categorie') is-invalid @enderror" required>
                            <option selected disabled value="">choisir...</option>
                            <option value="PI" @if(old('categorie') == 'PI') selected @endif>Première</option>
                            <option value="POO" @if(old('categorie') == 'POO') selected @endif>Terminale</option>
                        </select>
					</div>

                    <!-- dropzone field -->
                   <div class="text-info">FICHIERS PYXEL <sup class="text-danger">*</sup></div>
                   <div class="text-monospace text-muted small mb-1">Déposer ci-dessous le fichier <kbd>.py</kbd> du jeu et, s'il existe, le fichier <kbd>.pyxres</kbd>.</div>
                   <div id="formdropzone" class="dropzone"></div>
                    <div id="alert_two_files" class="mt-2 text-danger text-monospace small"></div>

					<button type="submit" id="submit_request" class="btn btn-primary mt-3"><i class="fas fa-check"></i></button>

				</form>


			</div>

		</div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')
    <script src="{{ asset('js/dropzone.js') }}"></script>

    <script>
    $("#submit_request").on("click", function() {
        var $myForm = $('#python_submit');
        if(! $myForm[0].checkValidity()) {
          // If the form is invalid, submit it. The form won't actually submit;
          // this will just cause the browser to display the native HTML5 error messages.
          $myForm.find(':submit').click();
        }
    })
    </script>

    <script>
        // disable auto discover
        Dropzone.autoDiscover = false;
        // init dropzone on id (form or div)
        $(document).ready(function() {
            var formdropzone = new Dropzone("#formdropzone", {
                url: "{{ route(request()->segment(1).'-jeu-deposer_post') }}",
                paramName: "fichiers_pyxel",
                autoProcessQueue: false,
                uploadMultiple: true, // uplaod files in a single request
                parallelUploads: 2, // use it with uploadMultiple
                maxFilesize: 10, // MB
                maxFiles: 2,
                addRemoveLinks: true,
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                acceptedFiles: ".py, .pyxres",
                // Language Strings
                dictFileTooBig: "Ce fichier est trop lourd. 10 Mo max.",
                dictInvalidFileType: "format non valide",
                dictCancelUpload: "annuler",
                dictRemoveFile: "supprimer",
                dictMaxFilesExceeded: "un seul document autorisé",
                dictDefaultMessage: "glisser-déposer ici ou <span class='btn btn-outline-dark btn-sm'>parcourir</span>",
            });
        });
        Dropzone.options.formdropzone = {
            // The setting up of the dropzone
            init: function() {
                dz = this; // Makes sure that 'this' is understood inside the functions below.

                // for Dropzone to process the queue (instead of default form behavior):
                $("#submit_request").on("click", function(e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    if (dz.files.length == 1 || dz.files.length == 2) {
                        ext_bool = false;
                        get = "f=";
                        $.each(dz.files, function(key, value){
                            var fileExt = value.name.split('.').pop();
                            get += value.name + "@";
                            if (fileExt == "py") ext_bool = true;
                        });
                        if (ext_bool) {
                            dz.processQueue();
                        } else {
                            $("#alert_two_files").text("vous devez déposer au moins un fichier '.py'.");
                        }
                    } else {
                        $("#alert_two_files").text("vous devez déposer le fichier '.py' et, s'il existe, le fichier '.pyxres'.");
                    }
                });

                //send all the form data along with the files:
                this.on("sendingmultiple", function(data, xhr, formData) {
                    formData.append("nom_equipe", jQuery("#nom_equipe").val());
                    formData.append("categorie", jQuery("#categorie").val());
                    formData.append("etablissement_jeton", "{{$etablissement_jeton}}");
                    formData.append("langage", "python");
                });
                this.on("successmultiple", function(files, response) {
                    console.log('success sending')
                    console.log('response:'+response);
                    window.location = "/jeu-depot-confirmation?"+get.slice(0, -1);
                });
                this.on("errormultiple", function(files, response) {
                    console.log('error sending')
                    console.log(response)
                    $("#alert_two_files").text(response);
                });

            }
        };
    </script>

</body>
</html>
