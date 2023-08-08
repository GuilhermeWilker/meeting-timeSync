<div>
    <header>
        <h2>
            {{ date('F Y', strtotime($year . '-' . $month . '-01')) }}
        </h2>
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
                    @foreach ($week as $day)
                        @if ($day)
                            @php
                                // Verificar se é dia de outro mês
                                $otherMonth = $day['date'] !== date('Y-m-d', strtotime($year . '-' . $month . '-01'));
                                
                                // Verificar se a data está selecionada
                                $isUnavailable = in_array($day['date'], $unavailableDates);
                            @endphp

                            <td wire:click="markDateUnavailable('{{ $day['date'] }}')"
                                class="{{ $isUnavailable ? 'unavailable' : 'available' }}">
                                {{ $day['day'] }}
                            </td>
                        @else
                            <td></td> // Célula vazia paras datas dos meses anteriores e/ou seguintes.
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
