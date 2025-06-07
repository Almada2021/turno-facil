<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img
                src="/img/turno-facil-logo.png"
                alt="Logo TurnoFácil"
                loading="lazy"
                class="d-inline-block align-text-top"
                style="height: 100%; width: 100%;max-height: 70px; object-fit: contain;"
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

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if ($this->request->getSession()->read('Auth')): ?>
                    <li class="nav-item bg-primary rounded ">
                        <a class="nav-link active text-light" aria-current="page" href="/">Registros</a>
                    </li>
                <?php else: ?>

                <?php endif; ?>
            </ul>
            <form class="d-flex flex-column flex-md-row gap-3" role="search">
                <input class="form-control me-2" type="buscar" placeholder="Buscar Un negocio para reservar" aria-label="Buscar Un negocio para reservar" />
                <button class="btn btn-outline-success" type="submit">Buscar</button>

                <?php if ($this->request->getSession()->read('Auth')): ?>
                    <span class="nav-link text-center fw-light text-primary">
                        Bienvenido
                        <?= $this->request->getSession()->read('Auth')->email ?>
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