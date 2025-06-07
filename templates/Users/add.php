<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <header>
        <?= $this->element('header') ?>
    </header>
    <div class="column column-80">
        <div class="users form content container">
            <?= $this->Form->create($user) ?>
            <div class="bg-light col  m-auto p-4  my-5 1">
                <fieldset>
                    <legend><?= __('Registrarse') ?></legend>

                    <?php
                    echo $this->Form->control('email', [
                        'type' => 'email',
                        'autocomplete' => 'email',
                        'label' => 'Correo Electrónico',
                        'required' => true
                    ]);
                    echo $this->Form->control('password', [
                        'type' => 'password',
                        'autocomplete' => 'new-password',
                        'label' => 'Contraseña',
                        'required' => true
                    ]);
                    ?>
                </fieldset>
                <fieldset class="my-2 ">

                    <label for="terms">
                        <input type="checkbox" id="terms" name="terms" value="false" aria-label="Acepto los términos y condiciones">
                        Al Marcar esta casilla, acepto los
                        <a href="<?= $this->Url->build('/documents/turno-facil-terminos-condiciones.pdf') ?>" target="_blank" rel="noopener noreferrer">
                            <strong>términos y condiciones</strong>
                        </a>
                        de Turno Fácil.
                    </label>
                </fieldset>
                <?= $this->Form->button(__('Registrarse'), [
                    'class' => 'btn btn-primary w-100'
                ]) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>