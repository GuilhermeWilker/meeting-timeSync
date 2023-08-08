<div>
    <div>
        <input type="text" readonly wire:model="guestLink" placeholder="clique para copiar o link.." />
        <button wire:click="generateGuestLink">Gerar link</button>
    </div>

    @if ($linkGenerated)
        <small>
            <span style="color: green;">Copie o link acima!</span>
        </small>
    @endif
</div>

<script></script>
