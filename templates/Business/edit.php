<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Busines $busines
 */
?>
<header>

    <?= $this->element('header') ?>
</header>
<div class="row p-4" style="min-height: 90vh;">

    <div class="column column-80">
        <div class="business form content">
            <?= $this->Form->create($busines) ?>
            <fieldset>
                <legend><?= __('Editar') ?></legend>
                <?php
                echo $this->Form->control('name');
                echo $this->Form->control('description');
                echo $this->Form->control('address');
                echo $this->Form->control('phone');
                echo $this->Form->control('email');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<footer>
    <?= $this->element('footer') ?>
</footer>