<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Busines $busines
 */

use chillerlan\QRCode\QRCode;

$fullUrl = $this->Url->build(['action' => 'view', $busines->id], ['fullBase' => true]);

?>

<div class="row" style="min-height: 90vh;">
    <?php
    // echo '<img src="' . (new QRCode())->render($fullUrl) . '" style="max-height:300px; object-fit:contain" alt="QR Code" />';
    ?>
    <!-- <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Busines'), ['action' => 'edit', $busines->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Busines'), ['action' => 'delete', $busines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $busines->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Business'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Busines'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside> -->
    <div class="d-flex flex-column">
        <img
            src="/img/default-bg.jpg"
            class="img-fluid"
            alt="Business Image"
            style="max-height: 300px; object-fit: cover; width: 100%;"></img>
        <div class="d-flex flex-row align-items-center  mx-2 mx-md-5 position-absolute  start-0 " style="top:300px;">
            <!-- Avatar Img -->
            <img
                src="<?= $this->Url->build('/img/default-logo.png', ['fullBase' => true]) ?>"
                class="rounded-circle bg-white shadow-sm"
                alt="Business Avatar"
                style="width: 100px; height: 100px; object-fit: cover; margin-right: 20px;">

            <h3 class="display-5 fw-bold shadow-lg text-dark text-warning-emphasis rounded px-2 text-wrap"><?= h($busines->name) ?></h3>
        </div>

        <div class="mx-2 d-flex flex-column flex-md-row  container" style="margin-top: 100px;">
            <p class="col-12 col-md-9 fs-5 text-wrap">
                <?= $busines->description ?>
            </p>
            <?php
            echo '<img src="' . (new QRCode())->render($fullUrl) . '" style="max-height:300px; object-fit:contain" alt="QR Code" />';
            ?>
        </div>
    </div>
    <!-- <div class="column column-80">
        <div class="business view content">
            <h3><?= h($busines->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
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
    </div> -->
</div>