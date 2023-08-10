<div>
    <p>Adicione uma pequena bio..</p> <br>
    <textarea wire:model="bio" class="bio-textarea" placeholder="fale um pouco sobre você.." maxlength="450"></textarea>

    <div class="char-limit-indicator">
        {{ strlen($bio) }} / 450
        @if (strlen($bio) >= 450)
            <span class="char-limit-exceeded">(Limite excedido)</span>
        @endif
    </div>

</div>

<style>
    .char-limit-indicator {
        font-size: 12px;
    }

    .bio-textarea {
        outline: none;
        height: 450px !important;
    }
</style>
