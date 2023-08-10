<div>


    <div>
        <input type="text" readonly wire:model="guestLink" placeholder="seu link será gerado aqui.." />
        <button wire:click="generateGuestLink">Gerar link</button>
    </div>

    @if ($linkGenerated)
        <small>
            <span style="color: green;">Copie o link acima!</span>
        </small>
    @endif

</div>

<script></script>
