<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Busines $busines
 * @var array $products
 */

use chillerlan\QRCode\QRCode;

$fullUrl = $this->Url->build(['action' => 'view', $busines->id], ['fullBase' => true]);

// Función helper para formatear precios en guaraníes paraguayos
function formatPrice($price)
{
    return number_format($price, 0, ',', '.') . ' ₲';
}
?>

<!-- MEJORA: Estructura más semántica y responsive con mejor jerarquía visual -->
<div class="business-profile" style="min-height: 100vh; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">

    <!-- MEJORA: Header con hero section más atractivo y funcional -->
    <header class="hero-section position-relative overflow-hidden">
        <!-- MEJORA: Overlay gradient para mejor legibilidad del texto sobre imagen -->
        <div class="hero-background position-relative">
            <img src="/img/default-bg.jpg"
                class="img-fluid w-100"
                alt="<?= h($busines->name) ?> - Imagen de fondo"
                style="height: 400px; object-fit: cover; filter: brightness(0.7);">
            <div class="position-absolute top-0 start-0 w-100 h-100"
                style="background: linear-gradient(45deg, rgba(0,0,0,0.4), rgba(0,0,0,0.2));"></div>
        </div>

        <!-- MEJORA: Información del negocio con mejor posicionamiento y diseño -->
        <div class="business-info position-absolute top-50 start-50 translate-middle text-center text-white w-100 px-3">
            <div class="d-flex flex-column align-items-center">
                <!-- MEJORA: Avatar más prominente con mejor styling -->
                <div class="avatar-container mb-3">
                    <img src="<?= $this->Url->build('/img/default-logo.png', ['fullBase' => true]) ?>"
                        class="rounded-circle border border-4 border-white shadow-lg"
                        alt="Logo de <?= h($busines->name) ?>"
                        style="width: 120px; height: 120px; object-fit: cover; background: white;">
                </div>

                <!-- MEJORA: Tipografía más impactante y legible -->
                <h1 class="display-4 fw-bold mb-3  business-name" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
                    <?= h($busines->name) ?>
                </h1>

                <!-- MEJORA: Descripción con mejor presentación -->
                <?php if (!empty($busines->description)): ?>
                    <p class="lead fs-5 mb-4 px-md-5" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.8); max-width: 600px;">
                        <?= h($busines->description) ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- MEJORA: Contenido principal con mejor organización y espaciado -->
    <main class="container-fluid py-5" style="background: linear-gradient(to bottom, #f8f9fa, #ffffff);">
        <div class="container">

            <!-- MEJORA: Sección de productos con diseño de cards moderno -->
            <?php if (!empty($products)): ?>
                <section class="products-section mb-5  products-container">
                    <!-- MEJORA: Título de sección más atractivo -->
                    <div class="text-center mb-5">
                        <h2 class="display-5 fw-bold text-primary mb-3">
                            <i class=" bi bi-person-raised-hand me-2"></i>Nuestros Servicios
                        </h2>
                        <div class="mx-auto" style="width: 100px; height: 4px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 2px;"></div>
                    </div>

                    <!-- MEJORA: Título de sección más atractivo -->
                    <div class="text-center mb-5">
                        <h2 class="display-5 fw-bold text-primary mb-3">
                            <i class="bi bi-bag me-2"></i>Nuestros Productos
                        </h2>
                        <div class="mx-auto" style="width: 100px; height: 4px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 2px;"></div>
                    </div>

                    <!-- MEJORA: Grid responsive para productos con mejor UX -->
                    <div class="row g-4">
                        <?php foreach ($products as $product): ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <!-- MEJORA: Card con hover effects y mejor jerarquía visual -->
                                <div class="product-card h-100 shadow-sm border-0 rounded-3 overflow-hidden"
                                    style="transition: all 0.3s ease; cursor: pointer;">

                                    <!-- MEJORA: Header del producto con gradiente -->
                                    <div class="card-header border-0 p-0">
                                        <div class="product-header p-4 text-white text-center"
                                            style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                            <h5 class="card-title mb-0 fw-bold">
                                                <?= h($product['name']) ?>
                                            </h5>
                                        </div>
                                        <div>
                                            <img
                                                src="<?= $product['photo_url'] ?>"
                                                class="w-100"
                                                style="max-height: 150px; object-fit:contain;">
                                        </div>
                                    </div>

                                    <!-- MEJORA: Cuerpo del producto con mejor presentación del precio -->
                                    <div class="card-body p-4 d-flex flex-column">
                                        <div class="price-section text-center mt-auto">
                                            <!-- MEJORA: Precio destacado con moneda paraguaya -->
                                            <div class="price-display p-3 rounded-2"
                                                style="background: linear-gradient(135deg, #28a745, #20c997); color: white;">
                                                <span class="price-label d-block small text-uppercase mb-1"
                                                    style="opacity: 0.9;">Precio</span>
                                                <span class="price-amount display-6 fw-bold">
                                                    <?= formatPrice($product['price']) ?>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- MEJORA: Botón de acción más atractivo -->
                                        <div class="mt-3 text-center">
                                            <button class="btn btn-outline-primary btn-lg px-4 rounded-pill"
                                                style="transition: all 0.3s ease;">
                                                <i class="fas fa-heart me-2"></i>Me Interesa
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <!-- MEJORA: Sección de QR con mejor presentación y funcionalidad -->
            <section class="qr-section text-center py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <!-- MEJORA: Card para el QR con mejor diseño -->
                        <div class="qr-card bg-white rounded-4 shadow-lg p-5 border-0">
                            <h3 class="h4 fw-bold text-primary mb-4">
                                <i class="fas fa-qrcode me-2"></i>Comparte Este Negocio
                            </h3>

                            <!-- MEJORA: QR con mejor presentación -->
                            <div class="qr-container mb-4">
                                <div class="d-inline-block p-3 bg-light rounded-3">
                                    <?php echo '<img src="' . (new QRCode())->render($fullUrl) . '" 
                                                   class="img-fluid" 
                                                   style="max-width: 200px; height: 200px;" 
                                                   alt="Código QR para ' . h($busines->name) . '" />'; ?>
                                </div>

                            </div>

                            <!-- MEJORA: Instrucciones claras para el usuario -->
                            <p class="text-muted mb-4">
                                Escanea este código QR con tu celular para compartir o guardar la información de este negocio
                            </p>

                            <!-- MEJORA: Botones de acción adicionales -->
                            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center btns-qr">
                                <button class="btn btn-primary btn-lg rounded-pill px-4"
                                    onclick="navigator.share({title: '<?= h($busines->name) ?>', url: '<?= $fullUrl ?>'}) || copyToClipboard('<?= $fullUrl ?>')">
                                    <i class="fas fa-share-alt me-2"></i>Compartir
                                </button>
                                <button class="btn btn-outline-secondary btn-lg rounded-pill px-4"
                                    onclick="window.print()">
                                    <i class="fas fa-print me-2"></i>Imprimir QR
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>

<!-- MEJORA: Estilos CSS adicionales para mejor UX -->
<style>
    /* Mejoras en hover effects para productos */
    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15) !important;
    }

    /* Mejora en botones con efectos hover */
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    /* Responsive improvements */
    @media (max-width: 768px) {
        .hero-section .business-info h1 {
            font-size: 2.5rem !important;
        }

        .products-section .display-5 {
            font-size: 2rem !important;
        }

        .price-amount {
            font-size: 1.8rem !important;
        }
    }

    /* Mejora en accesibilidad */
    .product-card:focus-within {
        outline: 3px solid #667eea;
        outline-offset: 2px;
    }

    @media print {
        .footer,

        .navbar-collapse,

        .navbar-toggler,

        .products-container,
        .btns-qr,
        .hero-background {

            display: none !important;
        }

        .business-info {
            position: relative;
            display: block;
        }



    }
</style>

<!-- MEJORA: JavaScript para funcionalidades adicionales -->
<script>
    // Función para copiar URL al portapapeles
    function copyToClipboard(text) {
        if (navigator.clipboard) {
            navigator.clipboard.writeText(text).then(() => {
                alert('¡Enlace copiado al portapapeles!');
            });
        } else {
            // Fallback para navegadores más antiguos
            const textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            alert('¡Enlace copiado al portapapeles!');
        }
    }

    // MEJORA: Smooth scroll y animaciones de entrada
    document.addEventListener('DOMContentLoaded', function() {
        // Animación de entrada para las cards
        const cards = document.querySelectorAll('.product-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            setTimeout(() => {
                card.style.transition = 'all 0.6s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });
</script>