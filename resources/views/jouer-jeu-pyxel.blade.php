@include('inc-top')
<!doctype html>
<html lang="fr">
<head>
    @include('inc-meta')
    <title>NdC Console | Jouer Jeu Pyxel</title>
</head>
<body>

        @include('inc-nav-console')

    	<div class="container mt-3 mb-5">
    		<div class="row">

                <div class="col-md-2 mt-4">
                    <a class="btn btn-light btn-sm mb-4" href="{{ url()->previous() }}" role="button"><i class="fas fa-arrow-left"></i></a>
                    <a class=" btn btn-light btn-sm btn-block text-left" href="/console/fiche-inscription" role="button"><i class="far fa-address-card pr-2"></i> fiche d'inscription</a>
                    <a class=" btn btn-light btn-sm btn-block text-left" href="https://github.com/nuitducode/ORGANISATION/discussions" target="_blank" role="button"><i class="far fa-comment-alt pr-2"></i> discussions</a>
                    <div class="text-monospace text-muted small mt-4">JEUX</div>
                    <a class=" btn btn-light btn-sm btn-block text-left" href="/console/ndc" role="button">Nuit du c0de</a>
                    <a class=" btn btn-light btn-sm btn-block text-left mt-1" href="/console/sltn" role="button">Sélections</a>
                    <a class=" btn btn-light btn-sm btn-block text-left mt-3" href="/console/bas" role="button">Bac à sable</a>
                </div>

    			<div class="col-md-9 offset-md-1 mt-4">

<pre class="m-0"><code id="htmlViewer" style="color:rgb(216, 222, 233); font-weight:400;background-color:rgb(46, 52, 64);background:rgb(46, 52, 64);display:block;padding: 1.5em;border-radius:5px;"><span style="color:rgb(129, 161, 193); font-weight:400;">import</span> requests
<span style="color:rgb(129, 161, 193); font-weight:400;">import</span> os

# ================
code = <span style="color:rgb(163, 190, 140); font-weight:400;">'{{$jeu_id}}'</span>
# ================

url = <span style="color:rgb(163, 190, 140); font-weight:400;">'https://www.nuitducode.net/storage/pyxapp/'</span>
jeu = code + <span style="color:rgb(163, 190, 140); font-weight:400;">'.pyxapp'</span>
<span style="color:rgb(129, 161, 193); font-weight:400;">data</span> = requests.<span style="color:rgb(129, 161, 193); font-weight:400;">get</span>(url + jeu)
with <span style="color:rgb(129, 161, 193); font-weight:400;">open</span>(jeu, <span style="color:rgb(163, 190, 140); font-weight:400;">'wb'</span>) <span style="color:rgb(129, 161, 193); font-weight:400;">as</span> file:
    file.write(<span style="color:rgb(129, 161, 193); font-weight:400;">data</span>.content)
os.system(<span style="color:rgb(163, 190, 140); font-weight:400;">'pyxel play '</span> + jeu)</code></pre>
<div class="text-monospace text-muted p-2" style="text-align:justify;font-size:70%;">
    Copier-coller ce code dans un environnement Python possédant la bibliothèque <a href="https://github.com/kitao/pyxel/" target="_blank">Pyxel</a> pour lancer le jeu.<br />
    Pour installer un environnement Python + Pyxel, voir la <a href="https://nuitducode.github.io/DOCUMENTATION/PYTHON/02-installation/" target="_blank">documentation</a>.
</div>


            </div>
        </div><!-- /row -->
	</div><!-- /container -->

	@include('inc-bottom-js')

</body>
</html>
