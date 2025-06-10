<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Busines> $business
 */
?>
<header>
    <?= $this->element('header') ?>
</header>
<div class="business index content p-4" style="min-height: 90vh;">

    <?= $this->Html->link(__('  Nuevo negocio'), ['action' => 'add'], [
        'class' => 'btn btn-primary  bi bi-shop fw-bold ',
        'title' => 'Para agregar un nuevo negocio haz click aqui',
        'aria-label' => 'Agregar Tienda'
    ]) ?>
    <h3 class="mt-2"><?= __('Negocios') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name', 'Nombre') ?></th>
                    <th><?= $this->Paginator->sort('address', 'Direccion') ?></th>
                    <th><?= $this->Paginator->sort('phone', 'Telefono') ?></th>
                    <th><?= $this->Paginator->sort('email', 'Correo') ?></th>
                    <th><?= $this->Paginator->sort('created', 'creado') ?></th>
                    <th><?= $this->Paginator->sort('modified', 'Modificado') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($business as $busines): ?>
                    <tr>
                        <td><?= $this->Number->format($busines->id) ?></td>
                        <td><?= h($busines->name) ?></td>
                        <td><?= h($busines->address) ?></td>
                        <td><?= h($busines->phone) ?></td>
                        <td><?= h($busines->email) ?></td>
                        <td><?= h($busines->created) ?></td>
                        <td><?= h($busines->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $busines->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $busines->id]) ?>
                            <?= $this->Form->postLink(
                                __('Delete'),
                                ['action' => 'delete', $busines->id],
                                [
                                    'method' => 'delete',
                                    'confirm' => __('Are you sure you want to delete # {0}?', $busines->id),
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
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, Mostrado {{current}} registros de un total de {{count}} Tiendas')) ?></p>
    </div>
</div>
<footer>
    <?= $this->element('footer') ?>
</footer>