<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Busines $busines
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Busines'), ['action' => 'edit', $busines->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Busines'), ['action' => 'delete', $busines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $busines->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Business'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Busines'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="business view content">
            <h3><?= h($busines->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($busines->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($busines->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($busines->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($busines->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($busines->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($busines->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($busines->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($busines->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>