<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Service> $service
 */
?>
<style>
    .list-container {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .header-card {
        background: linear-gradient(135deg, var(--bs-success), var(--bs-info));
        border-radius: 15px;
        color: white;
        margin-bottom: 2rem;
    }

    .stats-card {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 15px;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .table-modern {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .table-modern thead th {
        background: linear-gradient(45deg, var(--bs-success), var(--bs-info));
        color: white;
        border: none;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.85rem;
        padding: 1rem;
        position: relative;
    }

    .table-modern thead th a {
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .table-modern thead th a:hover {
        color: rgba(255, 255, 255, 0.8);
        transform: translateX(2px);
    }

    .table-modern tbody tr {
        transition: all 0.3s ease;
        border: none;
    }

    .table-modern tbody tr:nth-child(even) {
        background: rgba(var(--bs-success-rgb), 0.02);
    }

    .table-modern tbody tr:hover {
        background: rgba(var(--bs-success-rgb), 0.08);
        transform: translateX(5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .table-modern tbody td {
        border: none;
        padding: 1rem;
        vertical-align: middle;
    }

    .btn-action {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        margin: 0 2px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .btn-view {
        background: linear-gradient(45deg, var(--bs-info), var(--bs-primary));
        color: white;
    }

    .btn-edit {
        background: linear-gradient(45deg, var(--bs-warning), var(--bs-orange, #fd7e14));
        color: white;
    }

    .btn-delete {
        background: linear-gradient(45deg, var(--bs-danger), var(--bs-pink, #d63384));
        color: white;
    }

    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        color: white;
    }

    .btn-new-service {
        background: linear-gradient(45deg, var(--bs-success), var(--bs-primary));
        border: none;
        border-radius: 50px;
        padding: 12px 30px;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-new-service:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(var(--bs-success-rgb), 0.4);
        color: white;
    }

    .btn-new-service::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .btn-new-service:hover::before {
        left: 100%;
    }

    .pagination-modern {
        background: white;
        border-radius: 15px;
        padding: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .pagination-modern .pagination {
        margin: 0;
        justify-content: center;
    }

    .pagination-modern .page-link {
        border: none;
        border-radius: 10px;
        margin: 0 3px;
        color: var(--bs-success);
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .pagination-modern .page-link:hover {
        background: var(--bs-success);
        color: white;
        transform: translateY(-2px);
    }

    .pagination-modern .page-item.active .page-link {
        background: linear-gradient(45deg, var(--bs-success), var(--bs-info));
        border: none;
    }

    .price-badge {
        background: linear-gradient(45deg, var(--bs-success), var(--bs-info));
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .time-badge {
        background: linear-gradient(45deg, var(--bs-warning), var(--bs-orange, #fd7e14));
        color: white;
        padding: 4px 10px;
        border-radius: 15px;
        font-weight: 500;
        font-size: 0.8rem;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .business-link {
        color: var(--bs-success);
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        padding: 4px 8px;
        border-radius: 8px;
    }

    .business-link:hover {
        background: rgba(var(--bs-success-rgb), 0.1);
        color: var(--bs-success);
        transform: translateX(3px);
    }

    .section-title {
        background: linear-gradient(45deg, var(--bs-success), var(--bs-info));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 800;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--bs-secondary);
    }

    .empty-state i {
        font-size: 4rem;
        opacity: 0.5;
        margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .table-responsive {
            border-radius: 15px;
        }

        .btn-action {
            padding: 4px 8px;
            font-size: 0.75rem;
        }

        .stats-card {
            margin-bottom: 1rem;
        }
    }
</style>

<div class="container-fluid py-4" style="min-height: 90vh;">
    <!-- Encabezado -->
    <div class="header-card p-4 mb-4">
        <div class="row align-items-center">
            <div class="col-12 col-md-8">
                <h1 class="h2 mb-2 d-flex align-items-center">
                    <i class="bi bi-tools me-3"></i>
                    Gestión de Servicios
                </h1>
                <p class="mb-0 opacity-75">
                    Administra y controla todos tus servicios desde aquí
                </p>
            </div>
            <div class="col-12 col-md-4 text-md-end mt-3 mt-md-0">
                <?= $this->Html->link(
                    '<i class="bi bi-plus-circle me-2"></i>Nuevo Servicio',
                    ['action' => 'add'],
                    [
                        'class' => 'btn btn-new-service',
                        'escape' => false
                    ]
                ) ?>
            </div>
        </div>
    </div>

    <!-- Estadísticas rápidas -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="stats-card p-3 text-center text-success">
                <i class="bi bi-tools display-6 mb-2"></i>
                <h3 class="h5 mb-1">Total</h3>
                <p class="mb-0 fw-bold">
                    <?= $this->Paginator->counter('{{count}}') ?> servicios
                </p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stats-card p-3 text-center text-success">
                <i class="bi bi-eye display-6 mb-2"></i>
                <h3 class="h5 mb-1">Mostrando</h3>
                <p class="mb-0 fw-bold">
                    <?= $this->Paginator->counter('{{current}}') ?> servicios
                </p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stats-card p-3 text-center text-success">
                <i class="bi bi-file-earmark display-6 mb-2"></i>
                <h3 class="h5 mb-1">Página</h3>
                <p class="mb-0 fw-bold">
                    <?= $this->Paginator->counter('{{page}}') ?> de <?= $this->Paginator->counter('{{pages}}') ?>
                </p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stats-card p-3 text-center text-success">
                <i class="bi bi-clock display-6 mb-2"></i>
                <h3 class="h5 mb-1">Actualizado</h3>
                <p class="mb-0 fw-bold">Ahora</p>
            </div>
        </div>
    </div>

    <!-- Tabla de servicios -->
    <div class="list-container p-4">
        <?php if (!empty($service)): ?>
            <div class="table-responsive">
                <table class="table table-modern">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id', '#') ?></th>
                            <th><?= $this->Paginator->sort('business_id', 'Negocio') ?></th>
                            <th><?= $this->Paginator->sort('name', 'Servicio') ?></th>
                            <th><?= $this->Paginator->sort('price', 'Precio') ?></th>
                            <th><?= $this->Paginator->sort('time_to_end', 'Duración') ?></th>
                            <th><?= $this->Paginator->sort('created', 'Creado') ?></th>
                            <th><?= $this->Paginator->sort('modified', 'Modificado') ?></th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($service as $service): ?>
                            <tr>
                                <td>
                                    <span class="badge bg-secondary">
                                        <?= $this->Number->format($service->id) ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if ($service->hasValue('business')): ?>
                                        <?= $this->Html->link(
                                            $service->business->name,
                                            ['controller' => 'Business', 'action' => 'view', $service->business->id],
                                            ['class' => 'business-link']
                                        ) ?>
                                    <?php else: ?>
                                        <span class="text-muted">Sin asignar</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <strong><?= h($service->name) ?></strong>
                                    <?php if (!empty($service->description)): ?>
                                        <br><small class="text-muted">
                                            <?= mb_substr(h($service->description), 0, 50) ?>...
                                        </small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="price-badge">
                                        Gs. <?= $this->Number->format($service->price) ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="time-badge">
                                        <i class="bi bi-clock"></i>
                                        <?php
                                        $minutes = $service->time_to_end;
                                        if ($minutes >= 60) {
                                            $hours = floor($minutes / 60);
                                            $remainingMinutes = $minutes % 60;
                                            echo $hours . 'h';
                                            if ($remainingMinutes > 0) {
                                                echo ' ' . $remainingMinutes . 'm';
                                            }
                                        } else {
                                            echo $minutes . 'm';
                                        }
                                        ?>
                                    </span>
                                </td>
                                <td>
                                    <?php
                                    $created = $service->created;
                                    echo '<span class="datetime" data-datetime="' . $created->format(DATE_ATOM) . '"></span>';
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $modified = $service->modified;
                                    echo '<span class="datetime" data-datetime="' . $modified->format(DATE_ATOM) . '"></span>';
                                    ?>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center flex-wrap gap-1">
                                        <?= $this->Html->link(
                                            '<i class="bi bi-eye"></i>',
                                            ['action' => 'view', $service->id],
                                            [
                                                'class' => 'btn-action btn-view',
                                                'escape' => false,
                                                'title' => 'Ver detalles'
                                            ]
                                        ) ?>
                                        <?= $this->Html->link(
                                            '<i class="bi bi-pencil"></i>',
                                            ['action' => 'edit', $service->id],
                                            [
                                                'class' => 'btn-action btn-edit',
                                                'escape' => false,
                                                'title' => 'Editar'
                                            ]
                                        ) ?>
                                        <?= $this->Form->postLink(
                                            '<i class="bi bi-trash"></i>',
                                            ['action' => 'delete', $service->id],
                                            [
                                                'method' => 'delete',
                                                'confirm' => '¿Estás seguro de que quieres eliminar el servicio #' . $service->id . '?',
                                                'class' => 'btn-action btn-delete',
                                                'escape' => false,
                                                'title' => 'Eliminar'
                                            ]
                                        ) ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <i class="bi bi-tools"></i>
                <h3 class="h4 mb-3">No hay servicios disponibles</h3>
                <p class="text-muted mb-4">
                    Aún no has creado ningún servicio. ¡Comienza agregando tu primer servicio!
                </p>
                <?= $this->Html->link(
                    '<i class="bi bi-plus-circle me-2"></i>Crear mi primer servicio',
                    ['action' => 'add'],
                    [
                        'class' => 'btn btn-new-service',
                        'escape' => false
                    ]
                ) ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Paginación -->
    <?php if (!empty($service)): ?>
        <div class="pagination-modern mt-4">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="text-muted mb-0">
                        <i class="bi bi-info-circle me-1"></i>
                        <?= $this->Paginator->counter('Página {{page}} de {{pages}}, mostrando {{current}} de {{count}} servicios') ?>
                    </p>
                </div>
                <div class="col-12 col-md-6">
                    <nav aria-label="Navegación de servicios">
                        <ul class="pagination mb-0">
                            <?= $this->Paginator->first('<i class="bi bi-chevron-double-left"></i>', ['escape' => false]) ?>
                            <?= $this->Paginator->prev('<i class="bi bi-chevron-left"></i>', ['escape' => false]) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next('<i class="bi bi-chevron-right"></i>', ['escape' => false]) ?>
                            <?= $this->Paginator->last('<i class="bi bi-chevron-double-right"></i>', ['escape' => false]) ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
    const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;

    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll('.datetime').forEach(el => {
            const utcDate = new Date(el.dataset.datetime);
            const localDate = utcDate.toLocaleString(undefined, {
                dateStyle: 'short',
                timeStyle: 'short'
            });
            el.innerText = localDate;
        });
    });
</script>