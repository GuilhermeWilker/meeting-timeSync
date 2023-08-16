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

    <div>
        @if ($isModalOpen)
            <div class="modal-background">
                <div class="modal">
                    <h3>Disponibilidade para {{ $selectedDate }}</h3>
                    <button wire:click="closeModal">Fechar</button>
                </div>
            </div>
        @endif
    </div>

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
        width: 300px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>
