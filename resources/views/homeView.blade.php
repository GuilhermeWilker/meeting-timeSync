<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Time Sync</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/fonts.css">
</head>

<body>
    <header class="header_home">
        <h3 class="header_home-logo">TimeSync</h3>

        <nav class="header_home-navbar">
            <ul>
                <li><a href="#slides_container">Começar a utilizar o TimeSync</a></li>
                <li class="nav_link-dashboard"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            </ul>
        </nav>
    </header>
    <main class="container-home">
        <section class="hero">
            <small>Em apenas alguns cliques suas</small>
            <h1>Reuniões com agilidade</h1>

            <div class="markup"></div>
        </section>

        <div class="flag"></div>

        <section class="slides_container" id="slides_container">
            <article class="slide">
                <img src="/assets/images/dashboard.png" alt="">
                <div class="slide_description">
                    <h4>Dashboard Simples e Interativa</h4>
                    <p>
                        Você encontrará todas as informações cruciais, incluindo um calendário que permite que você,
                        <br>
                        Como organizador, defina suas datas disponíveis para reuniões ou bloqueie aquelas em que
                        prefira não ser interrompido.
                    </p>

                    <p>
                        Você também terá acesso a um prático gerador de links para convidados,
                        que será detalhado abaixo!
                    </p>

                    <p>
                        Personalização é a chave! Sua bio pode refletir sua personalidade e destacar o que você
                        considera importante.
                    </p>
                    <p> Transmita suas características demaneira única e deixe uma
                        impressão
                        marcante desde o primeiro contato.
                    </p>
                </div>
            </article>

            <article class="slide">
                <img src="/assets/images/guestview.png" alt="">
                <div class="slide_description">
                    <h4>Simplicidade para os Convidados!</h4>
                    <p>
                        A jornada dos convidados é igualmente descomplicada. Eles terão acesso à sua bio, portanto,
                        capriche ao se apresentar!
                    </p>

                    <p>
                        O processo é tão fácil quanto contar até três. Basta que o convidado escolha uma das datas
                        disponíveis na sua dashboard e... pronto!
                    </p>

                    <p>
                        Após isso, enviaremos e-mails para guiar ambos pelos próximos passos: escolher a plataforma e
                        definir o horário da reunião. Tudo foi pensado para ser incrivelmente simples!
                    </p>
                </div>
            </article>
        </section>
    </main>
</body>

</html>
