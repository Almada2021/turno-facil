<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserBusines $userBusines
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $businesses
 */
?>
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
                    <legend><?= __('Registrar Empleado') ?></legend>

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
                <fieldset>
                    <legend><?= __('Datos y Permisos') ?></legend>
                    <?php
                    echo $this->Form->control('business_id', [
                        'options' => $businesses,
                        'label' => 'Negocio',
                    ]);
                    echo $this->Form->control('role', [
                        // 'options' => ['owner', 'employee'],
                        'options' => [
                            'owner' => 'Propietario',
                            'employee' => 'Empleado'
                        ],
                        'labelOptions' => true,
                        'label' => 'Rol',
                        'required' => true,
                        'empty' => 'Selecciona un rol'
                    ]);
                    ?>
                    <?= $this->Form->button(__('Registrarse'), [
                        'class' => 'btn btn-primary w-100',
                    ]) ?>
                    <?= $this->Form->end() ?>
            </div>

        </div>
    </div>
</div>