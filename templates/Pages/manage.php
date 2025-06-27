<style>
    .menu-card {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.95);
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        transition: all 0.3s ease;
    }

    .menu-btn {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        border-radius: 15px;
        position: relative;
        overflow: hidden;
        min-height: 140px;
        backdrop-filter: blur(5px);
    }

    .menu-btn:hover {
        transform: translateY(-8px) scale(1.05);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2) !important;
    }

    .menu-btn:active {
        transform: translateY(-4px) scale(1.02);
    }

    .menu-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .menu-btn:hover::before {
        left: 100%;
    }

    .menu-icon {
        font-size: 3.5rem;
        margin-bottom: 0.5rem;
        transition: all 0.3s ease;
    }

    .menu-btn:hover .menu-icon {
        transform: scale(1.2) rotate(5deg);
    }

    .menu-title {
        font-weight: 700;
        font-size: 1.1rem;
        letter-spacing: 0.5px;
    }

    .section-title {
        background: linear-gradient(45deg, var(--bs-primary), var(--bs-info));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 800;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .menu-btn {
            min-height: 120px;
        }

        .menu-icon {
            font-size: 2.5rem;
        }
    }
</style>

<section style="min-height: 90svh;" class="py-4">
    <div class="container">
        <!-- Título Principal -->
        <div class="text-center mb-5">
            <h1 class="section-title display-4 mb-3">Panel de Control</h1>
            <p class="lead text-muted">Gestiona tus productos y servicios de manera eficiente</p>
        </div>

        <!-- Sección Productos -->
        <div class="menu-card p-4 mb-5">
            <div class="row align-items-center mb-4">
                <div class="col">
                    <h2 class="h3 text-primary mb-0">
                        <i class="bi bi-cup-hot me-2"></i>
                        Gestión de Productos
                    </h2>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <a href="/product/add" class="btn btn-primary menu-btn w-100 d-flex flex-column align-items-center justify-content-center shadow-sm">
                        <i class="bi bi-plus-circle menu-icon"></i>
                        <span class="menu-title">Crear Producto</span>
                        <small class="text-white-50 mt-1">Agregar nuevo producto</small>
                    </a>
                </div>
                <div class="col-12 col-md-6">
                    <a href="/product" class="btn btn-outline-primary menu-btn w-100 d-flex flex-column align-items-center justify-content-center shadow-sm">
                        <i class="bi bi-list-ul menu-icon"></i>
                        <span class="menu-title">Listar Productos</span>
                        <small class="opacity-75 mt-1">Ver todos los productos</small>
                    </a>
                </div>
            </div>
        </div>

        <!-- Sección Servicios -->
        <div class="menu-card p-4 mb-5">
            <div class="row align-items-center mb-4">
                <div class="col">
                    <h2 class="h3 text-success mb-0">
                        <i class="bi bi-person-badge me-2"></i>
                        Gestión de Servicios
                    </h2>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <a href="/service/add" class="btn btn-success menu-btn w-100 d-flex flex-column align-items-center justify-content-center shadow-sm">
                        <i class="bi bi-plus-circle menu-icon"></i>
                        <span class="menu-title">Crear Servicio</span>
                        <small class="text-white-50 mt-1">Agregar nuevo servicio</small>
                    </a>
                </div>
                <div class="col-12 col-md-6">
                    <a href="/service" class="btn btn-outline-success menu-btn w-100 d-flex flex-column align-items-center justify-content-center shadow-sm">
                        <i class="bi bi-list-check menu-icon"></i>
                        <span class="menu-title">Listar Servicios</span>
                        <small class="opacity-75 mt-1">Ver todos los servicios</small>
                    </a>
                </div>
            </div>
        </div>

        <!-- Sección Adicional - Reportes y Configuración -->
        <div class="row g-3">
            <div class="col-12 col-md-6 col-lg-3">
                <button class="btn btn-info menu-btn w-100 d-flex flex-column align-items-center justify-content-center shadow-sm">
                    <i class="bi bi-bar-chart menu-icon"></i>
                    <span class="menu-title">Reportes</span>
                    <small class="text-white-50 mt-1">Estadísticas</small>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <button class="btn btn-warning menu-btn w-100 d-flex flex-column align-items-center justify-content-center shadow-sm">
                    <i class="bi bi-gear menu-icon"></i>
                    <span class="menu-title">Configuración</span>
                    <small class="text-white-50 mt-1">Ajustes</small>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <button class="btn btn-secondary menu-btn w-100 d-flex flex-column align-items-center justify-content-center shadow-sm">
                    <i class="bi bi-people menu-icon"></i>
                    <span class="menu-title">Usuarios</span>
                    <small class="text-white-50 mt-1">Gestionar usuarios</small>
                </button>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <button class="btn btn-dark menu-btn w-100 d-flex flex-column align-items-center justify-content-center shadow-sm">
                    <i class="bi bi-shield-check menu-icon"></i>
                    <span class="menu-title">Seguridad</span>
                    <small class="text-white-50 mt-1">Control de acceso</small>
                </button>
            </div>
        </div>
    </div>
</section>