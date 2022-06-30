@extends("template.user")
@section("title", $user->name . " User edit")

@section("content")
<div class="container mt-5">
    <h1>Editar {{ $user->name }}</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @method("PUT")
        @csrf
        <div class="mb-3">
            <input type="nome" value="{{ $user->name }}" name="name" class="form-control" placeholder="digite seu nome">
        </div>
        <div class="mb-3">
            <input type="email" value="{{ $user->email }}" name="email" class="form-control" placeholder="digite seu email">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="digite sua senha"/> 
        </div>
        <button type="submit" class="btn btn-outline-dark btn-sm">Submit</button>
        <a href="{{ route('users.index') }}" class="btn btn-outline-primary btn-sm">VOLTAR</a>
    </form>
</div>
@endsection