<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UserBusines> $userBusiness
 */
?>
<div class="userBusiness index content">
    <?= $this->Html->link(__('New User Busines'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Business') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('business_id') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userBusiness as $userBusines): ?>
                <tr>
                    <td><?= $this->Number->format($userBusines->id) ?></td>
                    <td><?= $userBusines->hasValue('user') ? $this->Html->link($userBusines->user->email, ['controller' => 'Users', 'action' => 'view', $userBusines->user->id]) : '' ?></td>
                    <td><?= $userBusines->hasValue('business') ? $this->Html->link($userBusines->business->name, ['controller' => 'Business', 'action' => 'view', $userBusines->business->id]) : '' ?></td>
                    <td><?= h($userBusines->role) ?></td>
                    <td><?= h($userBusines->created) ?></td>
                    <td><?= h($userBusines->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userBusines->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userBusines->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $userBusines->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $userBusines->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>