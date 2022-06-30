@extends("template.user")
@section("title", $user->name . " User")

@section("content")
<div class="container mt-5">
        <h3 class="text-center">Usuario {{ $user->name }}</h3>
        <a href="{{ route('users.index') }}" class="btn btn-outline-primary btn-sm mb-3">VOLTAR</a>
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
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ date('d/m/Y - H:m', strtotime($user->created_at)) }}</td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @method("DELETE")
                            @csrf
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-warning btn-sm">EDITAR</a>
                            <button type="submit" class="btn btn-outline-danger btn-sm">DELETAR</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection