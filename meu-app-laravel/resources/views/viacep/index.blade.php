<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIA CEP</title>
</head>
<body>
    <form action="{{ route('viacep.index.post'); }}" method="post">
        @csrf
        <input type="text" name="cep"/>
        <button type="submit">BUSCAR CEP</button>
    </form>
</body>
</html>