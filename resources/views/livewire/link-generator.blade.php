<div>
    @if ($linkGenerated)
        <small>
            <span style="color: green;">Copie o link abaixo!</span>
        </small>
    @endif

    <div>
        <input type="text" readonly wire:model="guestLink" placeholder="seu link será gerado aqui.." />
        <button wire:click="generateGuestLink">Gerar link</button>
    </div>

</div>

<script></script>
