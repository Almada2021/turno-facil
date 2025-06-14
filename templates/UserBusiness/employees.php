<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UserBusines> $userBusiness
 */
$tranlationsRole = [
    'owner' => 'Dueño',
    'employee' => 'Empleado',
];
?>

<div class="userBusiness index content p-4">

    <?= $this->Html->link(__('  Nuevo Empleado'), ['action' => 'add'], [
        'class' => 'btn btn-primary  bi bi-shop fw-bold ',
        'title' => 'Para agregar un nuevo Empleado haz click aqui',
        'aria-label' => 'Agregar Empleado'
    ]) ?>
    <h3 class="mt-2"><?= __('Empleados') ?></h3>
    <div class="table-responsive" style="min-height: 80vh;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('user_id', [
                            'label' => 'Empleado',
                        ]) ?></th>
                    <th><?= $this->Paginator->sort('business_id', [
                            'label' => 'Negocio',
                        ]) ?></th>
                    <th><?= $this->Paginator->sort('role', [
                            'label' => 'Rol',
                        ]) ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userBusiness as $userBusines): ?>
                    <tr>
                        <td><?= $userBusines->hasValue('user') ? $this->Html->link($userBusines->user->email, ['controller' => 'Users', 'action' => 'view', $userBusines->user->id]) : '' ?></td>
                        <td><?= $userBusines->hasValue('business') ? $this->Html->link($userBusines->business->name, ['controller' => 'Business', 'action' => 'view', $userBusines->business->id]) : '' ?></td>
                        <td><?= h($tranlationsRole[$userBusines->role]) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Ver'), ['action' => 'view', $userBusines->id]) ?>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $userBusines->id]) ?>
                            <?= $this->Form->postLink(
                                __('Eliminar'),
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
            <?= $this->Paginator->first('<< ' . __('Primero')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} de un total {{count}} ')) ?></p>
    </div>
</div>