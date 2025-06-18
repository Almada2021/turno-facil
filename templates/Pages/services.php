<div style="min-height: 90svh;">
    <section
        class="bg-primary d-flex justify-content-end   p-4"
        style="min-height: 100px;">
        <h6
            class="text-white fw-bold mx-2 fs-3"
            style="line-height: 1.5;">
            Busca Negocios
        </h6>
        <input
            type="text"
            class="rounded w-25"
            style="max-height: 40px;" />
    </section>
    <section class="mb-5 pb-5">
        <h4 class="display-6 px-4 mt-4 fw-bold">Descubre Negocios</h4>
        <ul class="d-flex flex-column align-items-center align-items-md-start flex-md-row gap-4 flex-wrap w-100 mt-5 ">
            <?php foreach ($listOfBussiness as $business): ?>
                <div class="card" style="width: 18rem;">
                    <img
                        src="/img/default-bg.jpg"
                        class="img-fluid"
                        alt="Business Image"
                        style="max-height: 300px; object-fit: cover; width: 100%;">
                    <div class="d-flex flex-row align-items-center   justify-content-center position-absolute  top-0" style="top:300px; left:35%">

                        <img
                            src="<?= $this->Url->build('/img/default-logo.png', ['fullBase' => true]) ?>"
                            class="rounded-circle bg-white shadow-sm"
                            alt="Business Avatar"
                            style="width: 100px; height: 100px; object-fit: cover; margin-right: 20px;">
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center ">
                        <h5 class="card-title mx-auto fw-bold"><?= $business->name ?></h5>
                        <p class="card-text text-truncate"><?= substr($business->description, 0, 30) ?></p>
                        <?= $this->Html->link(
                            __('Ver Tienda'),
                            [
                                'action' => 'view',
                                $business->id,
                                'controller' => 'business',
                            ],
                            [
                                'class' => 'btn btn-primary mx-auto',
                            ]
                        ) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </ul>
    </section>

</div>