<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/fonts.css">
</head>

<body>
    <main class="container">
        <form action="{{ route('register') }}" class="form" method="POST">

            @if (session()->has('success'))
                {{ session()->get('success') }}
            @elseif(session()->has('error'))
                {{ session()->get('error') }}
            @endif

            @csrf
            <div class="form__legend-register">
                <h3>Timesync</h3>
                <p>Faça seu cadastro abaixo e começe a agendar suas reuniões!</p>
            </div>

            <div class="form__input-actions">

                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" placeholder="João" />
                    {{ $errors->first('name') }}
                </div>

                <div class="form-group">
                    <label for="lastname">Sobrenome:</label>
                    <input type="text" name="lastname" placeholder="Silva" />
                    {{ $errors->first('lastname') }}

                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="joao.silva@gmail.com" />
                    {{ $errors->first('email') }}
                </div>

                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" placeholder="***********">
                </div>

                <div class="form-group">
                    <label for="confirm-password">Confirmar senha:</label>
                    <input type="password" name="confirm-password" placeholder="***********">
                </div>

                <input type="submit" value="Login" class="form__input-submit">
            </div>
            <div class="link-signup">
                <a href="/auth">Já possuo conta</a>
            </div>

        </form>
    </main>
</body>

</html>
