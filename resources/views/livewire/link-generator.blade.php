<div>


    <div class="link-generator">
        <input class="link-generator__input" type="text" readonly wire:model="guestLink"
            placeholder="seu link será gerado aqui.." />
        <button class="link-generator__button" wire:click="generateGuestLink">Gerar link!</button>

        <br>
        @if ($linkGenerated)
            <small>
                <span style="color: green;">Copie o link acima!</span>
            </small>
        @endif

    </div>


</div>

<style>
    .link-generator {
        margin-block: 25px;

        position: relative;
    }

    .link-generator__input {
        padding: 26px 16px;
        width: 375px;
        height: 45px;
        border-radius: 6px;
        border: 1px solid #AEAEAE;
        color: #AAA;
        font-size: 16px;
    }

    .link-generator__button {
        position: absolute;
        left: 265px;
        top: 4px;
        padding: 12px 17px;
        width: 105px;
        height: 46px;
        border: none;
        border-radius: 6px;
        background: #131313;
        color: #FFF;
        font-size: 15px;

        font-weight: 400;
    }

    .link-generator__button:hover {
        background: #1d1d1d;
    }
</style>
