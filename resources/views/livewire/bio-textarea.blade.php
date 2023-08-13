<div class="bio-textarea_component">
    <form wire:submit.prevent="saveBio">
        <p>Adicione uma pequena bio..</p>
        <textarea wire:model="bio" class="bio-textarea" placeholder="{{ auth()->user()->bio }}" maxlength="450"></textarea>

        <div class="char-limit-indicator">
            {{ strlen($bio) }} / 450
            @if (strlen($bio) >= 450)
                <span class="char-limit-exceeded">(Limite excedido)</span>
            @endif
        </div>

        <button type="submit">Salvar Bio</button>
    </form>
</div>

<style>
    .bio-textarea_component {
        width: 100%;
    }

    .bio-textarea_component p {
        padding-block: 5px;
        font-weight: 300;
        color: #262626;
    }

    .char-limit-indicator {
        padding-top: 8px;
        font-size: 12px;
        font-weight: 500;
    }

    .bio-textarea {
        outline: none;
        height: 450px !important;
        width: 100%;

        color: #a7a7a7;
    }
</style>
