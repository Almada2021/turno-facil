<!-- in /templates/Users/login.php -->

<div class="users form " style="min-height: 90vh;">
    <?= $this->Flash->render() ?>
    <div class="w-75 m-auto bg-light p-4 my-5">
        <h3>Ingresar</h3>

        <?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __('Por favor ingresa tus datos') ?></legend>
            <?= $this->Form->control('email', ['required' => true, 'label' => 'Correo Electronico']) ?>
            <?= $this->Form->control('password', ['required' => true, 'label' => 'Contraseña']) ?>
        </fieldset>
        <?= $this->Form->submit(__('Ingresar')); ?>
        <?= $this->Form->end() ?>
        <p class="mt-4">
            ¿No tienes una cuenta?
            <?= $this->Html->link("Registrarme", ['action' => 'add']) ?>
            ¿Olvidaste tu contraseña?
            <?= $this->Html->link("Recuperar", ['action' => 'add']) ?>
        </p>

    </div>

</div>