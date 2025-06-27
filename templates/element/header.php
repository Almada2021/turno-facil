<?php
// templates/element/navigation.php
$route = $this->request->getParam('action');
$user = $this->request->getSession()->read('Auth');
$menuItems = $this->Navigation->getMenuItems($user, $route);
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img
                src="/img/turno-facil-logo.png"
                alt="Logo TurnoFácil"
                loading="lazy"
                class="d-inline-block align-text-top"
                style="height: 70px; width: auto; max-height: 70px; object-fit: contain;"
                title="TurnoFácil Logo"
                id="logo">
        </a>

        <!-- Toggle button para móvil -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Menú principal -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-2">
                <?php foreach ($menuItems as $item): ?>
                    <?= $this->Navigation->renderMenuItem($item) ?>
                <?php endforeach; ?>
            </ul>

            <!-- Formulario de búsqueda y botones de usuario -->
            <form class="d-flex flex-column flex-md-row gap-3" role="search">
                <input class="form-control me-2" type="search"
                    placeholder="Buscar Un negocio para reservar"
                    aria-label="Buscar Un negocio para reservar" />
                <button class="btn btn-outline-success" type="submit">Buscar</button>

                <?php if ($user): ?>
                    <!-- Usuario autenticado -->
                    <span class="nav-link text-center fw-light text-primary"
                        onclick="window.location.href='/users/profile'"
                        style="cursor: pointer;">
                        <?= h(substr(($user->name ?? '') . ' ' . ($user->lastname ?? ''), 0, 13)) ?>
                    </span>

                    <button class="btn btn-danger p-0">
                        <a class="d-block nav-link h-100 w-100 p-2 text-white" href="/users/logout">
                            Salir
                        </a>
                    </button>
                <?php else: ?>
                    <!-- Usuario no autenticado -->
                    <button class="btn btn-outline-primary p-0">
                        <a class="nav-link p-2" href="/users/add">
                            Registrarse
                        </a>
                    </button>

                    <button class="btn btn-primary p-0">
                        <a class="d-block nav-link h-100 w-100 p-2 text-white" href="/users/login">
                            Ingresar
                        </a>
                    </button>
                <?php endif; ?>
            </form>
        </div>
    </div>
</nav>