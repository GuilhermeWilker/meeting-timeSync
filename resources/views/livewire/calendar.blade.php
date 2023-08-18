<div>
    <header>
        <h2>{{ date('F Y', strtotime($year . '-' . $month . '-01')) }}</h2>
    </header>
    <table>
        <thead>
            <tr>
                <th>Dom</th>
                <th>Seg</th>
                <th>Ter</th>
                <th>Qua</th>
                <th>Qui</th>
                <th>Sex</th>
                <th>Sáb</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weeks as $week)
                <tr>
                    @foreach ($week as $index => $day)
                        @if ($day)
                            @php
                                $date = $day['date'];
                                $cellId = 'cell_' . $year . '_' . $month . '_' . $day['day'] . '_' . $index;
                                $isUnavailable = $day['isUnavailable'];
                            @endphp
                            <td
                                @auth
wire:click="markDateUnavailable('{{ $date }}')"
                                class="{{ $isUnavailable ? 'unavailable' : 'available' }}"
                                id="{{ $cellId }}"
                            @else
                                class="{{ $isUnavailable ? 'unavailable' : 'available' }} visitor-cell"
                                @if (!$isUnavailable)
                                wire:click="openModal('{{ $date }}')"
                                @endif @endauth>
                                {{ $day['day'] }}
                            </td>
                        @else
                            <!-- Célula vazia para os dias dos meses anteriores e/ou seguintes. -->
                            <td></td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Modal --}}
    <div>
        @if ($isModalOpen)
            <div class="modal-background">
                <form class="modal">
                    <legend>
                        Agende sua reunião com <span>{{ $user->name }}</span>,
                        <br> insira seu nome e email abaixo!
                    </legend>

                    <div class="form-group">
                        <label for="visitorName">Seu nome:</label>
                        <input type="text" name="visitorName" wire:model="visitorName" />
                    </div>

                    <div class="form-group">
                        <label for="visitorEmail">Seu email:</label>
                        <input type="email" name="visitorEmail" wire:model="visitorEmail" />
                    </div>

                    <button type="button" wire:click="scheduleMeeting">Agendar reunião</button>
                    <button type="button" wire:click="closeModal">Cancelar</button>
                </form>
            </div>
        @endif
    </div>


    <style>
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-block: 2px;
        }

        header h2 {
            font-weight: 600;
            font-size: 15px;
            padding-inline-start: 76%;
        }

        td {
            border-radius: 6px;
            text-align: center;

            padding: 5px;
            width: 60px;
            height: 60px;

            cursor: pointer;
            background-color: #fff;

            opacity: 0.25;
            transition: .3s;
        }

        .available {
            opacity: 1;
        }


        .unavailable {
            background-color: #958d99;
            color: #000;
            cursor: not-allowed;
        }

        td:hover {
            background-color: #D1D1D1;
        }

        tr th {
            padding-block: 25px;
            font-size: 16px;

            font-weight: 400;
        }

        button {
            padding: 3px 6px;
            cursor: pointer;
        }

        /* Estilo para os dias de outros meses */
        .month-day {
            opacity: 1;
        }

        .visitor-cell {
            cursor: pointer;
        }

        .modal-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .modal legend {
            font-weight: 600;
        }

        .modal legend>span {
            text-decoration: underline;
            font-weight: 600;

            cursor: pointer;
        }

        .modal .form-group {
            width: 100%;
            margin-block: 20px;
        }

        .modal .form-group label {
            color: #000;
            font-size: 14px;

            font-weight: 709;
        }

        .modal .form-group input {
            width: 100%;
            height: 50px;
            border-radius: 3px;
            border: 2px solid #F1F1F1;

            padding: 20px;
        }

        .modal button {
            padding: 8px;
            width: 100%;
            font-weight: 600;
            margin-block: 3px;
            border: 1px solid #0101;
            border-radius: 6px;

            background-color: #E5EBC3;
        }

        .modal button:last-child {
            background-color: #EBC3C3;
        }
    </style>
