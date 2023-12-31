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
    <main class="container">
        <article class="organizador__actions">
            <div class="organizador__actions-sidebar">
                <header class="organizador__actions-header">
                    <div>
                        <h1>{{ $user->name }} {{ $user->lastname }}</h1>
                        <p>Agende uma call para discutirmos seu projeto!</p>
                    </div>
                </header>

                <div class="organizador__actions-bio">
                    <p>
                        {!! nl2br($user->bio) !!}
                    </p>
                </div>

                <div class="organizador__actions-plataformas">
                    <small>*{{ $user->name }}* aceita as seguintes plataformas para meeting!</small>


                    <div class="plataformas">
                        <div class="plataforma">
                            <div class="img">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Google_Meet_icon_%282020%29.svg/512px-Google_Meet_icon_%282020%29.svg.png?20221213135236"
                                    alt="plataforma de meeting, Google Meet">
                            </div>

                            <h3>Google meet</h3>
                        </div>
                        <div class="plataforma">
                            <div class="img">
                                <img src="https://www.freepnglogos.com/uploads/zoom-logo-png/zoom-meeting-logo-transparent-png-21.png"
                                    alt="plataforma de meeting, Zoom">
                            </div>

                            <h3>Zoom</h3>
                        </div>
                    </div>

                </div>

                <h1 class="minutes-per-call">25min ~ 45min.</h1>
            </div>
        </article>

        <section class="calendario">
            <div>
                <h4>
                    Selecione um dia disponível para notificar <br />
                    o organizador da reunião!
                </h4>
            </div>

            <livewire:calendar :organizerId="$user->id" />


        </section>
    </main>
    @livewireScripts

</body>

</html>
