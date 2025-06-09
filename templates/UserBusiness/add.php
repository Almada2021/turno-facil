<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserBusines $userBusines
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $businesses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List User Business'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="userBusiness form content">
            <?= $this->Form->create($userBusines) ?>
            <fieldset>
                <legend><?= __('Add User Busines') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('business_id', ['options' => $businesses]);
                    echo $this->Form->control('role');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
