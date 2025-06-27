<style>
    .form-card {
        background: rgba(255, 255, 255, 0.95);
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .form-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
    }

    .actions-card {
        background: linear-gradient(135deg, var(--bs-warning), var(--bs-orange, #fd7e14));
        border-radius: 15px;
        color: white;
        transition: all 0.3s ease;
    }

    .actions-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .form-floating {
        margin-bottom: 1.5rem;
    }

    .form-floating>.form-control,
    .form-floating>.form-select {
        border-radius: 10px;
        border: 2px solid rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        padding: 1rem 0.75rem;
        height: auto;
    }

    .form-floating>.form-control:focus,
    .form-floating>.form-select:focus {
        border-color: var(--bs-warning);
        box-shadow: 0 0 0 0.25rem rgba(var(--bs-warning-rgb), 0.25);
        transform: translateY(-2px);
    }

    .form-floating>label {
        padding: 1rem 0.75rem;
        font-weight: 500;
        color: var(--bs-secondary);
    }

    .btn-submit {
        background: linear-gradient(45deg, var(--bs-warning), var(--bs-success));
        border: none;
        border-radius: 50px;
        padding: 12px 40px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(var(--bs-warning-rgb), 0.4);
    }

    .btn-submit::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .btn-submit:hover::before {
        left: 100%;
    }

    .btn-link-custom {
        color: white;
        text-decoration: none;
        padding: 8px 20px;
        border-radius: 25px;
        background: rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 8px;
        width: 100%;
        justify-content: flex-start;
    }

    .btn-link-custom:hover {
        background: rgba(255, 255, 255, 0.3);
        color: white;
        transform: translateX(5px);
    }

    .btn-delete {
        background: rgba(var(--bs-danger-rgb), 0.2);
        border: 1px solid rgba(var(--bs-danger-rgb), 0.3);
    }

    .btn-delete:hover {
        background: rgba(var(--bs-danger-rgb), 0.3);
        border-color: var(--bs-danger);
    }

    .section-title {
        background: linear-gradient(45deg, var(--bs-warning), var(--bs-orange, #fd7e14));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 800;
    }

    .photo-preview {
        border: 2px dashed var(--bs-warning);
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        background: rgba(var(--bs-warning-rgb), 0.05);
        transition: all 0.3s ease;
    }

    .photo-preview:hover {
        background: rgba(var(--bs-warning-rgb), 0.1);
        transform: translateY(-2px);
    }

    .price-input {
        position: relative;
    }

    .price-input::before {
        content: '$';
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--bs-success);
        font-weight: bold;
        font-size: 1.2rem;
        z-index: 10;
    }

    .price-input .form-control {
        padding-left: 35px;
    }

    .edit-badge {
        background: linear-gradient(45deg, var(--bs-warning), var(--bs-orange, #fd7e14));
        color: white;
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .current-data {
        background: rgba(var(--bs-info-rgb), 0.1);
        border: 1px solid rgba(var(--bs-info-rgb), 0.2);
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1rem;
    }

    .current-data h6 {
        color: var(--bs-info);
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .current-data p {
        margin-bottom: 0;
        color: var(--bs-dark);
    }

    @media (max-width: 768px) {
        .form-card {
            margin: 0 10px;
        }

        .actions-card {
            margin-bottom: 20px;
        }

        .btn-link-custom {
            font-size: 0.9rem;
            padding: 6px 16px;
        }
    }
</style>

<div class="container-fluid py-4">
    <div class="row g-4">
        <!-- Panel de Acciones -->
        <div class="col-12 col-lg-3">
            <div class="actions-card p-4">
                <h4 class="h5 mb-3 d-flex align-items-center">
                    <i class="bi bi-gear me-2"></i>
                    Acciones del Producto
                </h4>

                <!-- Información del producto actual -->
                <div class="current-data mb-3">
                    <h6>
                        <i class="bi bi-info-circle me-1"></i>
                        Editando:
                    </h6>
                    <p><strong><?= h($product->name) ?></strong></p>
                    <small class="text-muted">ID: #<?= $product->id ?></small>
                </div>

                <div class="d-flex flex-column gap-2">
                    <?= $this->Html->link(
                        '<i class="bi bi-list-ul me-2"></i>Listar Productos',
                        ['action' => 'index'],
                        [
                            'class' => 'btn-link-custom',
                            'escape' => false
                        ]
                    ) ?>

                    <?= $this->Html->link(
                        '<i class="bi bi-eye me-2"></i>Ver Producto',
                        ['action' => 'view', $product->id],
                        [
                            'class' => 'btn-link-custom',
                            'escape' => false
                        ]
                    ) ?>

                    <?= $this->Html->link(
                        '<i class="bi bi-plus-circle me-2"></i>Crear Nuevo',
                        ['action' => 'add'],
                        [
                            'class' => 'btn-link-custom',
                            'escape' => false
                        ]
                    ) ?>

                    <hr style="border-color: rgba(255,255,255,0.3);">

                    <?= $this->Form->postLink(
                        '<i class="bi bi-trash me-2"></i>Eliminar Producto',
                        ['action' => 'delete', $product->id],
                        [
                            'confirm' => '¿Estás seguro de que quieres eliminar el producto "' . $product->name . '"?',
                            'class' => 'btn-link-custom btn-delete',
                            'escape' => false
                        ]
                    ) ?>
                </div>
            </div>
        </div>

        <!-- Formulario Principal -->
        <div class="col-12 col-lg-9">
            <div class="form-card p-4 p-md-5">
                <!-- Encabezado -->
                <div class="text-center mb-4">
                    <div class="edit-badge mb-3">
                        <i class="bi bi-pencil-square"></i>
                        Modo Edición
                    </div>
                    <h1 class="section-title display-5 mb-2">
                        <i class="bi bi-pencil-square me-3"></i>
                        Editar Producto
                    </h1>
                    <p class="text-muted lead">Actualiza la información del producto seleccionado</p>
                </div>

                <?= $this->Form->create($product, ['class' => 'needs-validation', 'novalidate' => true]) ?>

                <div class="row g-4">
                    <!-- Información Básica -->
                    <div class="col-12">
                        <h3 class="h5 text-warning mb-3">
                            <i class="bi bi-info-circle me-2"></i>
                            Información Básica
                        </h3>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-floating">
                            <?= $this->Form->select(
                                'business_id',
                                $businesses,
                                [
                                    'class' => 'form-select',
                                    'id' => 'business_id',
                                    'required' => true
                                ]
                            ) ?>
                            <label for="business_id">
                                <i class="bi bi-building me-2"></i>
                                Negocio Asignado
                            </label>
                        </div>
                        <?php if ($product->business): ?>
                            <small class="text-muted">
                                <i class="bi bi-info-circle me-1"></i>
                                Actualmente: <strong><?= h($product->business->name) ?></strong>
                            </small>
                        <?php endif; ?>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-floating">
                            <?= $this->Form->text('name', [
                                'class' => 'form-control',
                                'id' => 'name',
                                'placeholder' => 'Nombre del producto',
                                'required' => true
                            ]) ?>
                            <label for="name">
                                <i class="bi bi-tag me-2"></i>
                                Nombre del Producto
                            </label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating">
                            <?= $this->Form->textarea('description', [
                                'class' => 'form-control',
                                'id' => 'description',
                                'placeholder' => 'Descripción del producto',
                                'style' => 'height: 120px',
                                'required' => true
                            ]) ?>
                            <label for="description">
                                <i class="bi bi-card-text me-2"></i>
                                Descripción del Producto
                            </label>
                        </div>
                    </div>

                    <!-- Precio -->
                    <div class="col-12 col-md-6">
                        <h3 class="h5 text-success mb-3">
                            <i class="bi bi-cash-coin me-2"></i>
                            Información de Precio
                        </h3>
                        <div class="form-floating price-input">
                            <?= $this->Form->number('price', [
                                'class' => 'form-control',
                                'id' => 'price',
                                'min' => '100',
                                'step' => '100',
                                'placeholder' => '0.00',
                                'required' => true
                            ]) ?>
                            <label for="price">Nuevo Precio</label>
                        </div>
                        <small class="text-muted mb-2">
                            <i class="bi bi-info-circle me-1"></i>
                            Precio actual: <strong class="text-success">$<?= $this->Number->format($product->price) ?></strong>
                        </small><br>
                        <small class="text-muted">
                            <i class="bi bi-exclamation-circle me-1"></i>
                            Precio mínimo: $100, incrementos de $100
                        </small>
                    </div>

                    <!-- Imagen del Producto -->
                    <div class="col-12 col-md-6">
                        <h3 class="h5 text-info mb-3">
                            <i class="bi bi-image me-2"></i>
                            Imagen del Producto
                        </h3>
                        <div class="form-floating">
                            <?= $this->Form->text('photo_url', [
                                'class' => 'form-control',
                                'id' => 'photo_url',
                                'placeholder' => 'URL de la imagen'
                            ]) ?>
                            <label for="photo_url">
                                <i class="bi bi-link-45deg me-2"></i>
                                URL de la Imagen
                            </label>
                        </div>
                        <?php if (!empty($product->photo_url)): ?>
                            <small class="text-muted mb-2">
                                <i class="bi bi-check-circle me-1 text-success"></i>
                                Imagen actual configurada
                            </small>
                        <?php else: ?>
                            <small class="text-muted mb-2">
                                <i class="bi bi-exclamation-triangle me-1 text-warning"></i>
                                Sin imagen actual
                            </small>
                        <?php endif; ?>
                        <div class="photo-preview mt-3">
                            <i class="bi bi-cloud-upload text-warning" style="font-size: 2rem;"></i>
                            <p class="mb-0 mt-2 text-muted">
                                <strong>Próximamente:</strong> Subida de archivos<br>
                                <small>Por ahora, actualiza la URL de imagen</small>
                            </p>
                        </div>
                    </div>

                    <!-- Información adicional -->
                    <div class="col-12">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <div class="current-data">
                                    <h6>
                                        <i class="bi bi-calendar3 me-1"></i>
                                        Fecha de Creación
                                    </h6>
                                    <p><?= $product->created->format('d/m/Y H:i:s') ?></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="current-data">
                                    <h6>
                                        <i class="bi bi-clock me-1"></i>
                                        Última Modificación
                                    </h6>
                                    <p><?= $product->modified->format('d/m/Y H:i:s') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="d-flex flex-column flex-md-row gap-3 justify-content-center align-items-center">
                            <?= $this->Form->button(
                                '<i class="bi bi-check-circle me-2"></i>Actualizar Producto',
                                [
                                    'class' => 'btn btn-submit text-white',
                                    'type' => 'submit',
                                    'escape' => false
                                ]
                            ) ?>
                            <a href="<?= $this->Url->build(['action' => 'view', $product->id]) ?>" class="btn btn-outline-info btn-lg">
                                <i class="bi bi-eye me-2"></i>
                                Ver Producto
                            </a>
                            <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-outline-secondary btn-lg">
                                <i class="bi bi-x-circle me-2"></i>
                                Cancelar
                            </a>
                        </div>
                    </div>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>