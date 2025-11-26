<?= $this->extend("layout\layoutHome") ?>

<?= $this->section("conteudo") ?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url("assets/images/bg_2.jpg") ?>');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?= base_url() ?>">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Planos de Serviços <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-0 bread">Nossos Planos de Serviços</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container"> 
            <div class="row d-flex no-gutters">
                <div class="col-md-12">
                    <div class="heading-section pt-md-5">
                        <h2 class="mb-4">Escolha o Plano Ideal para Seu Pet</h2>
                        <p>Oferecemos planos personalizados para cuidar do seu pet com qualidade e carinho.</p>
                    </div>
                    <div class="row">
                        <?php foreach ($precos as $precos): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card <?= $precos['highlight'] ? 'border-primary' : '' ?>" style="height: 100%;">
                                    <div class="card-header">
                                        <h5 class="card-title"><?= esc($precos['name']) ?> <?= $precos['highlight'] ? '<span class="badge bg-primary">Destaque</span>' : '' ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-muted">R$ <?= number_format($precos['price'], 2, ',', '.') ?></h6>
                                        <ul class="list-group list-group-flush">
                                            <?php foreach (json_decode($precos['benefits'], true) as $benefit): ?>
                                                <li class="list-group-item"><?= esc($benefit) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>
