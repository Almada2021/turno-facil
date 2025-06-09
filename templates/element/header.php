<?php
// GET second parameter from url licke /contact  route be 'contact
$route = $this->request->getParam('action');
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img
                src="/img/turno-facil-logo.png"
                alt="Logo TurnoFácil"
                loading="lazy"
                class="d-inline-block align-text-top"
                style="height: 70px; width: auto;max-height: 70px; object-fit: contain;"
                title="TurnoFácil Logo"
                id="logo"
                aria-label="TurnoFácil Logo"
                aria-describedby="logo"
                aria-labelledby="logo"
                aria-hidden="true"
                aria-live="polite"
                aria-atomic="true"
                aria-relevant="text"
                aria-controls="logo"
                aria-haspopup="true">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-2">
                <li class="nav-item rounded d-flex align-items-center justify-content-md-center px-2 pt-1 <?= $route === 'services' ? 'text-decoration-underline' : '' ?>">
                    <i class="bi bi-person-badge mx-2"></i>
                    <?= $this->Html->link(
                        'Servicios',
                        [
                            'controller' => 'Pages',
                            'action' => 'services',
                        ],
                        ['class' => 'nav-link active text-dark fw-bold  ', 'aria-current' => 'page']
                    ) ?>
                </li>
                <?php if ($this->request->getSession()->read('Auth')): ?>
                    <li class="nav-item rounded d-flex align-items-center justify-content-md-center px-2 pt-1 <?= $route === 'contact' ? '  text-decoration-underline' : '' ?>" ">
                                            <i class=" bi bi-telephone mx-2 text-dark "></i>
    
                    <a class=" nav-link active text-dark fw-bold" aria-current="page" href="/">Registros</a>
                    </li>
                    <li class="nav-item rounded d-flex align-items-center justify-content-md-center px-2 pt-1 <?= $route === 'myBusiness' ? '  text-decoration-underline' : '' ?>" ">
<i class=" bi mx-2 bi-shop"></i>
                        <a class=" nav-link active text-dark fw-bold " aria-current="page" href="/my-businesses">Negocios</a>
                    </li>
                <?php else: ?>

                    <li class="nav-item rounded d-flex align-items-center justify-content-md-center px-2 pt-1 <?= $route === 'contact' ? '  text-decoration-underline' : '' ?>">
                        <i class="bi bi-telephone mx-2 text-dark "></i>
                        <?= $this->Html->link(
                            'Contacto',
                            [
                                'controller' => 'Pages',
                                'action' => 'contact',
                            ],
                            ['class' => 'nav-link active text-dark fw-bold  ', 'aria-current' => 'page']
                        ) ?>
                    </li>



                <?php endif; ?>
            </ul>
            <form class="d-flex flex-column flex-md-row gap-3" role="search">
                <input class="form-control me-2" type="buscar" placeholder="Buscar Un negocio para reservar" aria-label="Buscar Un negocio para reservar" />
                <button class="btn btn-outline-success" type="submit">Buscar</button>

                <?php if ($this->request->getSession()->read('Auth')): ?>
                    <span
                        class="nav-link text-center fw-light text-primary"
                        onclick="window.location.href='/users/profile'">
                        <?= substr($this->request->getSession()->read('Auth')->name . $this->request->getSession()->read('Auth')->lastname, 0, 13) ?>
                    </span>
                    <button
                        class="btn btn-danger p-0 ">
                        <a class=" d-block nav-link h-100 w-100 p-2" href="/users/logout">

                            Salir
                        </a>
                    </button>
                <?php else: ?>

                    <button
                        class="btn btn-outline-primary p-0">
                        <!-- el elemento a debe ocupar el 100% debes elimianr el padding de bootstrap -->
                        <a class="nav-link p-2" href="/users/add">

                            Registrarse
                        </a>
                    </button>
                    <button
                        class="btn btn-primary p-0 ">
                        <a class=" d-block nav-link h-100 w-100 p-2" href="/users/login">

                            Ingresar
                        </a>
                    </button>
                <?php endif; ?>


            </form>
        </div>
    </div>
</nav>