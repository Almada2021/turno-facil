<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserBusines $userBusines
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Busines'), ['action' => 'edit', $userBusines->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Busines'), ['action' => 'delete', $userBusines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userBusines->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Business'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Busines'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="userBusiness view content">
            <h3><?= h($userBusines->role) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userBusines->hasValue('user') ? $this->Html->link($userBusines->user->email, ['controller' => 'Users', 'action' => 'view', $userBusines->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Business') ?></th>
                    <td><?= $userBusines->hasValue('business') ? $this->Html->link($userBusines->business->name, ['controller' => 'Business', 'action' => 'view', $userBusines->business->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($userBusines->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userBusines->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($userBusines->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($userBusines->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>