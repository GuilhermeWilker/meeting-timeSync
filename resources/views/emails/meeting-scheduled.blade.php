<p>
    Olá, 👋
</p>

<p>
    Viemos informar que <strong>{{ $visitorName }}</strong> está interessado(a) <br>
    em solicitar uma reunião com o organizador <strong>{{ $user->name }} {{ $user->lastname }} </strong>.
</p>

<p>
    A reunião foi solicitada para o dia <strong>{{ $meetingDate }}</strong> 🚀 <br>
    Acreditamos que essa oportunidade será valiosa para ambas as partes compartilhar <br>
    suas ideias e insights cruciais, promovendo colaboração e um bom papo!
</p>

<p>
    <small>
        ps**{{ $user->name }} {{ $user->lastname }}
        não deixe de enviar um email de resposta ao
        remetente!
    </small>
</p>


<p>
    Atenciosamente, <br>
    A Equipe {{ config('app.name') }} 👨‍💻
</p>
