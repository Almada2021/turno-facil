<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">

    <div class="column column-80" style="min-height: 90vh;">
        <div class="users form content container">
            <?= $this->Form->create($user) ?>
            <div class="bg-light col  m-auto p-4  my-5 1">
                <fieldset>
                    <legend><?= __('Registrarse') ?></legend>

                    <?php
                    echo $this->Form->control('name', [
                        'type' => 'text',
                        'autocomplete' => 'name',
                        'label' => 'Nombre',
                        'required' => true
                    ]);
                    echo $this->Form->control('lastname', [
                        'type' => 'text',
                        'autocomplete' => 'family-name',
                        'label' => 'Apellido',
                        'required' => true
                    ]);
                    echo $this->Form->control('phonenumber', [
                        'type' => 'tel',
                        'autocomplete' => 'tel',
                        'label' => 'Teléfono',
                        'required' => true,
                        'placeholder' => 'Ej: 123-456-7890'
                    ]);
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
                        <input
                            required
                            class="form-check-input"
                            type="checkbox"
                            id="terms"
                            name="terms"
                            value="true"
                            aria-label="Acepto los términos y condiciones">
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