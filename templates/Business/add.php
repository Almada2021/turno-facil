<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Busines $busines
 */
?>
<header>
    <?= $this->element('header') ?>
</header>
<div class="row bg-light" style="min-height: 90vh;">
    <div class="p-5">

        <div class="">

            <div class="column column-80 bg-white rounded-5 p-5">
                <div class="business form content">
                    <?= $this->Form->create($busines) ?>
                    <fieldset>
                        <legend><?= __('Crear Negocio') ?></legend>
                        <?php
                        echo $this->Form->control('name', ['label' => 'Nombre del Negocio']);
                        echo $this->Form->control('description', ['label' => 'Descripción del Negocio']);
                        echo $this->Form->control('address', ['label' => 'Dirección del Negocio']);
                        echo $this->Form->control('phone', ['label' => 'Teléfono del Negocio']);
                        echo $this->Form->control('email', ['label' => 'Correo Electrónico del Negocio']);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Crear', ['class' => 'btn btn-primary'])) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>


</div>
<footer>
    <?= $this->element('footer') ?>
</footer>