<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>notification</title>
</head>
<body>
<pre>
@foreach($data as $key => $value)
{{$key}} : {{$value}}
@endforeach
</pre>
</body>
</html>
