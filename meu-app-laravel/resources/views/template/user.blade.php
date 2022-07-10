<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body class="container w-75 mt-5">
    <header>
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a href="{{ route('users.index') }}" class="nav-link text-white">Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('posts.index') }}" class="nav-link text-white">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('viacep.index') }}" class="nav-link text-white">Viacep</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    @yield("content")
</body>
</html>