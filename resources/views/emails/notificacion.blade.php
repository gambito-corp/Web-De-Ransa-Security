// esta es la vista del correo
// podemos usar etiquetas HTML

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>enviar correo</title>
</head>
<body>
    <h1>recibiste un mensaje</h1>
    <p>el cliente se llama {{$data['nombre']}}</p>
    <p>quiere saber sobre {{$data['asunto']}}</p>

    <p>te dejo este comentario: <br> <br> {{$data['mensaje']}}</p>

    <p>contactate al correo: {{$data['correo']}}</p>


    <br>
    <p>igual estos datos se guardaron en tu BD</p>

</body>
</html>