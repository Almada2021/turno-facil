<?php
$this->assign('title', 'Contacto');
$email =  'almadeussoftware@gmail.com';
?>

<head>

</head>


<body>
    <header>
        <?= $this->element('header') ?>
    </header>
    <main class="container">
        <!-- Form -->
        <div>

        </div>
        <h1><?= h($title) ?></h1>
        <p>Para consultas, sugerencias o soporte, por favor contáctanos a través de los siguientes medios:</p>
        <ul>
            <li>Email: <a href="mailto:
            <?= h($email) ?>"> <?= h($email) ?></a></li>
            <li>Teléfono: <a href="tel:<?= h($phone) ?>"><?= h($phone) ?></a></li>
            <li>Dirección: <?= h($address) ?></li>
        </ul>
        <p>También puedes seguirnos en nuestras redes sociales:</p>
        <ul>
            <li><a href="<?= h($facebook) ?>">Facebook</a></li>
            <li><a href="<?= h($twitter) ?>">Twitter</a></li>
            <li><a href="<?= h($instagram) ?>">Instagram</a></li>
        </ul>
        <p>Estamos aquí para ayudarte. No dudes en ponerte en contacto con nosotros.</p>
        <p>Gracias por elegir Turno Facil.</p>
        <p>Atentamente,</p>
        <p>El equipo de Turno Facil</p>
        <p>Si tienes alguna pregunta o necesitas más información, no dudes en contactarnos.</p>
        <p>¡Esperamos poder ayudarte pronto!</p>
        <p>Saludos cordiales,</p>
        <p>El equipo de Turno Facil</p>
    </main>
    <footer>
        <?= $this->element('footer') ?>
    </footer>
</body>