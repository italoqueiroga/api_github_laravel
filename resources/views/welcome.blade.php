<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta da API do Github</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <div class="row mb-4 mt-2 justify-content-center">
        <div class="col-6">
            <h1>Busca de usuário do Github</h1>

            <form action="/" method="get" autocomplete="off">
                <input type="text" name="busca" class="form-control mb-3" style="line-height: 30px;" placeholder="usuário a buscar">
                <button type="submit" class="btn btn-primary btn-block col-4 mx-auto" style="display: block;">Buscar</button>
            </form>

        </div>
    </div>

    <hr>



    @if($search)
    @if($user)

    <div class="row justify-content-evenly">
        <div class="col-3">
            <img src="{{ $user->avatar_url }}" alt="avatar" style="max-width: 100%;">
        </div>
        <div class="col-8">
            <h2 class="fw-bolder">{{ $search }}</h2>


            <form action="">
                @if($user->name)
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control mb-2" value="{{ $user->name }}" disabled>
                @endif

                @if($user->bio)
                <label for="bio" class="form-label">Bio</label>
                <input type="text" name="bio" class="form-control mb-2" value="{{ $user->bio }}" disabled>
                @endif

                @if($user->email)
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control mb-2" value="{{ $user->email }}" disabled>
                @endif

                @if($user->location)
                <label for="location" class="form-label">Local</label>
                <input type="text" name="location" class="form-control mb-2" value="{{ $user->location }}" disabled>
                @endif

                @if($user->company)
                <label for="company" class="form-label">Empresa</label>
                <input type="text" name="company" class="form-control mb-2" value="{{ $user->company }}" disabled>
                @endif

                @if($user->blog)
                <label for="blog" class="form-label">Blog</label>
                <input type="text" name="blog" class="form-control mb-2" value="{{ $user->blog }}" disabled>
                @endif

                @if($user->twitter_username)
                <label for="twitter_username" class="form-label">Twitter</label>
                <input type="text" name="twitter_username" class="form-control mb-2" value="{{ $user->twitter_username }}" disabled>
                @endif


            </form>
        </div>
    </div>

    @else

    <div class="row justify-content-evenly">
        <div class="col-6">
            <div class="alert alert-warning" role="alert">
                Procurei por <strong>{{ $search }}</strong>, mas não encontrei :/
            </div>
        </div>
    </div>

    @endif
    @endif

</div>

</body>
</html>
