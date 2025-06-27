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
        background: linear-gradient(135deg, var(--bs-primary), var(--bs-info));
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
        border-color: var(--bs-primary);
        box-shadow: 0 0 0 0.25rem rgba(var(--bs-primary-rgb), 0.25);
        transform: translateY(-2px);
    }

    .form-floating>label {
        padding: 1rem 0.75rem;
        font-weight: 500;
        color: var(--bs-secondary);
    }

    .btn-submit {
        background: linear-gradient(45deg, var(--bs-success), var(--bs-primary));
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
        box-shadow: 0 8px 25px rgba(var(--bs-success-rgb), 0.4);
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
    }

    .btn-link-custom:hover {
        background: rgba(255, 255, 255, 0.3);
        color: white;
        transform: translateX(5px);
    }

    .section-title {
        background: linear-gradient(45deg, var(--bs-primary), var(--bs-info));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 800;
    }

    .photo-preview {
        border: 2px dashed var(--bs-primary);
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        background: rgba(var(--bs-primary-rgb), 0.05);
        transition: all 0.3s ease;
    }

    .photo-preview:hover {
        background: rgba(var(--bs-primary-rgb), 0.1);
        transform: translateY(-2px);
    }

    .price-input {
        position: relative;
    }

    .price-input::before {
        content: 'Gs';
        position: absolute;
        left: 90%;
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

    @media (max-width: 768px) {
        .form-card {
            margin: 0 10px;
        }

        .actions-card {
            margin-bottom: 20px;
        }
    }
</style>

<div class="container-fluid py-4">
    <div class="row g-4">
        <!-- Panel de Acciones -->
        <div class="col-12 col-lg-3">
            <div class="actions-card p-4">
                <h4 class="h5 mb-3 d-flex align-items-center">
                    <i class="bi bi-lightning-charge me-2"></i>
                    Acciones Rápidas
                </h4>
                <div class="d-flex flex-column gap-2">
                    <?= $this->Html->link(
                        '<i class="bi bi-list-ul me-2"></i>Listar Productos',
                        ['action' => 'index'],
                        [
                            'class' => 'btn-link-custom',
                            'escape' => false
                        ]
                    ) ?>
                    <a href="#" class="btn-link-custom">
                        <i class="bi bi-plus-circle me-2"></i>
                        Crear Otro
                    </a>
                    <a href="#" class="btn-link-custom">
                        <i class="bi bi-arrow-left me-2"></i>
                        Volver al Panel
                    </a>
                </div>
            </div>
        </div>

        <!-- Formulario Principal -->
        <div class="col-12 col-lg-9">
            <div class="form-card p-4 p-md-5">
                <!-- Encabezado -->
                <div class="text-center mb-4">
                    <h1 class="section-title display-6 mb-2">
                        <i class="bi bi-plus-circle me-3"></i>
                        Crear Nuevo Producto
                    </h1>
                    <p class="text-muted lead">Completa la información para agregar un producto a tu catálogo</p>
                </div>

                <?= $this->Form->create($product, ['class' => 'needs-validation', 'novalidate' => true]) ?>

                <div class="row g-4">
                    <!-- Información Básica -->
                    <div class="col-12">
                        <h3 class="h5 text-primary mb-3">
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
                                Seleccionar Negocio
                            </label>
                        </div>
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
                            <label for="price">Precio del Producto</label>
                        </div>
                        <small class="text-muted">
                            <i class="bi bi-info-circle me-1"></i>
                            Precio mínimo: Gs 100, incrementos de Gs 100
                        </small>
                    </div>

                    <!-- Imagen del Producto -->
                    <div class="col-12 col-md-6">
                        <h3 class="h5 text-warning mb-3">
                            <i class="bi bi-image me-2"></i>
                            Imagen del Producto
                        </h3>
                        <div class="form-floating">
                            <?= $this->Form->text('photo_url', [
                                'class' => 'form-control',
                                'id' => 'photo_url',
                                'placeholder' => 'URL de la imagen (temporal)'
                            ]) ?>
                            <label for="photo_url">
                                <i class="bi bi-link-45deg me-2"></i>
                                URL de la Imagen (Temporal)
                            </label>
                        </div>
                        <div class="photo-preview mt-3">
                            <i class="bi bi-cloud-upload text-primary" style="font-size: 2rem;"></i>
                            <p class="mb-0 mt-2 text-muted">
                                <strong>Próximamente:</strong> Subida de archivos<br>
                                <small>Por ahora, ingresa una URL de imagen</small>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="d-flex flex-column flex-md-row gap-3 justify-content-center align-items-center">
                            <?= $this->Form->button(
                                'Crear Producto',
                                [
                                    'class' => 'btn btn-submit text-white',
                                    'type' => 'submit',
                                    'escape' => false,

                                ]
                            ) ?>
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