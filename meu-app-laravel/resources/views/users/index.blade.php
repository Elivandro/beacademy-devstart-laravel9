@extends("template.user")
@section("title", "Listagem usuarios")

@section("content")
    <div class="container">
        <h3 class="text-center">Usuarios</h3>
        <a href="{{ route('users.create') }}" class="btn btn-outline-primary btn-sm mb-3">Novo usuario</a>
            <table class="table table-dark table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th colspan="2">DATA DE CADASTRO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ date('d/m/Y - H:m', strtotime($user->created_at)) }}</td>
                        <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-light btn-sm">VISUALIZAR</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection