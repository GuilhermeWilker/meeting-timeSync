<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autenticação</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/fonts.css">
</head>

<body>
    <main class="container">
        <form action="" class="form">
            <div class="form__legend">
                <h3>Timesync</h3>
                <p>Faça seu login abaixo para começar a utilizar e começar a agendar suas reuniões!</p>
            </div>

            <div class="form__input-actions">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="joao.silva@gmail.com" />
                </div>

                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" placeholder="***********"> <br>
                    <small class="password-tip">
                        Esqueci minha senha
                    </small>
                </div>

                <input type="submit" value="Login" class="form__input-submit">
            </div>
            <div class="link-signup">
                <a href="/register">Ainda não tenho <br> uma conta..</a>
            </div>

        </form>
    </main>
</body>

</html>
