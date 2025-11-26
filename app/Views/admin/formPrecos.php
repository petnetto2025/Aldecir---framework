<?php 

$this->extend('layout/layoutSistema');
$this->section('conteudo');

?>

<?= exibeTitulo("Planos de Preços", ['acao' => $action]) ?>

<?= form_open("PrecosAdmin/". ($action == "edit" ? 'update/' . setaValor('id', $data) : 'store')) ?>

    <div class="row">

        <div class="form-group col-12 col-md-4">
            <label for="name" class="form-label">Plano de Preço</label>
            <input type="text" name="name" id="name" class="form-control" maxlength="255" value="<?= setaValor('name', $data) ?>" required autofocus>
            <?= setaMsgErrorCampo('name', $errors) ?>
        </div>

        <div class="form-group col-12 col-md-4">
            <label for="price" class="form-label">Preço</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="<?= setaValor('price', $data) ?>" required>
            <?= setaMsgErrorCampo('price', $errors) ?>
        </div>

        <div class="form-group col-12 col-md-4">
            <label for="highlight" class="form-label">Destaque</label>
            <div class="form-check">
                <input type="checkbox" name="highlight" id="highlight" class="form-check-input" value="1" <?= setaValor('highlight', $data) ? 'checked' : '' ?>>
                <label class="form-check-label" for="highlight">Marcar como destaque</label>
            </div>
            <?= setaMsgErrorCampo('highlight', $errors) ?>
        </div>

    </div>

    <div class="row">
        <div class="form-group col-12 col-md-12">
            <label for="benefits" class="form-label">Beneficios oferecidos:</label>
            <textarea name="benefits[]" id="benefits" class="form-control" rows="5" placeholder="Ex: Banho&#10;Tosa&#10;Vacinação" required><?php if (isset($data['benefits']) && is_array($data['benefits'])) { foreach ($data['benefits'] as $benefit) echo $benefit . "\n"; } elseif (isset($data['benefits'])) { echo implode("\n", json_decode($data['benefits'], true)); } ?></textarea>
            <?= setaMsgErrorCampo('benefits', $errors) ?>
        </div>

        <input type="hidden" name="action" value="<?= $action ?>">
        <input type="hidden" name="id" value="<?= setaValor("id", $data) ?>">
    </div>
    <div class="row">
        <div class="form-group col-12 col-md-12">
            <a href="<?= base_url() ?>/PrecosAdmin">Voltar</a>
            <button type="submit" value="submit" class="button button-login ml-3">Gravar</button>
        </div>
    </div>

<?= form_close() ?>

<?= $this->endSection() ?>
