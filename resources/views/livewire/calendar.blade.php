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
                            <td wire:click="markDateUnavailable('{{ $date }}')"
                                class="{{ $isUnavailable ? 'unavailable' : 'available' }}" id="{{ $cellId }}">
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
</div>


<style>
    header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    header h2 {
        font-weight: 500;
        font-size: 18px
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
    }

    button {
        padding: 3px 6px;
        cursor: pointer;
    }

    /* Estilo para os dias de outros meses */
    .month-day {
        opacity: 1;
    }
</style>
