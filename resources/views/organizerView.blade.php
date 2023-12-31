<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/font.css">
    <style>
        .organizador__actions-dashboard {
            width: 1326px;
            height: 860px;
            border-radius: 11px;

            background-color: #fff;
            padding: 25px 40px;
        }

        .actions-dashboard {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .calendar-dashboard {
            padding: 25px;
            background-color: #F2F2F2;
            border: 1px solid #AEAEAE;
            border-radius: 6px;
            width: 520px;

            display: flex;
            gap: 15px;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }

        .calendar-dashboard p {
            margin-inline-end: auto;
        }

        .calendar-dashboard td.unavailable {
            background-color: #D1D1D1;
            color: #fff;
            cursor: not-allowed;
        }

        .bio-textarea {
            padding: 15px;
            border: 1px solid #AEAEAE;
            border-radius: 6px;
            width: 520px;
            height: 480px;

            resize: none;

            display: flex;
            gap: 15px;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }

        .organizador__actions-dashboard .plataformas {
            display: flex;
            align-items: center;
            margin-top: 65px;
            gap: 35px
        }

        .organizador__actions-dashboard .plataformas .plataforma {
            width: 245px;
            height: 90px;
            flex-shrink: 0;
            border-radius: 6px;
            background: #f1f1f1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;

            cursor: pointer;
            transition: .3s;
        }

        .organizador__actions-dashboard .plataformas .plataforma:hover {
            background: #d1d1d1;
        }

        .organizador__actions-dashboard .plataformas .plataforma:nth-child(2n) {
            gap: 0px;
            cursor: pointer;
        }

        .organizador__actions-dashboard .plataformas .plataforma .img img {
            max-width: 25px;
            max-height: 25px;
        }

        .organizador__actions-dashboard .plataformas .plataforma:nth-child(2n) .img img {
            max-width: 70px;
            max-height: 70px;
        }
    </style>

</head>

<body>
    <main class="container">
        <article class="organizador__actions-dashboard">

            <div class="organizador__actions-sidebar">
                <header class="organizador__actions-header">
                    <div>
                        <div class="logout-btn">
                            <a href="{{ route('login.destroy') }}">logout</a>
                        </div>

                        @auth
                            <h1>
                                {{ auth()->user()->name }} {{ auth()->user()->lastname }}
                            </h1>
                        @endauth

                        <p>Agende uma call para discutirmos seu projeto!</p>

                        <livewire:link-generator />
                    </div>
                </header>

                <div class="bio-dashboard">
                    <livewire:bio-textarea />
                </div>
            </div>


            <div class="actions-dashboard">
                <div>
                    <p>Selecione os dias onde não realiza meetings..</p>
                    <div class="calendar-dashboard">
                        <livewire:calendar />
                    </div>
                </div>
            </div>

        </article>
    </main>
    @livewireScripts

</body>

</html>
