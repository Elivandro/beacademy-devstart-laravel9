@extends("template.user")
@section("title", "Listagem usuarios")

@section("content")
    <div class="container mt-5">
        <h3 class="text-center">Usuarios</h3>
        <a href="{{ route('users.create') }}" class="btn btn-outline-primary btn-sm mb-3">Novo usuario</a>
            <table class="table table-dark table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>FOTO</th>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th colspan="2">DATA DE CADASTRO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>

                        @if($user->image)
                            <td>
                                <img src="{{ asset('storage/'.$user->image) }}" width="40px" class="rounded-circle"/>
                            </td>
                        @else
                            <td>
                                <img src="{{ asset('storage/profile/null-avatar.jpg') }}" width="40px" class="rounded-circle"/>
                            </td>
                        @endif

                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-light btn-sm">VISUALIZAR</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection