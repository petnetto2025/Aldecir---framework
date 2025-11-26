<?php 

    $this->extend('layout/layoutSistema');
    $this->section('conteudo');

    ?>

    <?= exibeTitulo("Preço de Serviços", ['acao' => 'new']) ?>
    
    <div class="table-responsive table_custom">
        <table class="table table-hover table-bordered table-striped table-sm" id="tbListaPlans">
            <thead>
                <tr class="text-weight-bold">
                    <td>Nome do Plano</td>
                    <td>Preço</td>
                    <td>Benefícios</td>
                    <td>Destaque</td>
                    <td>Opções</td>
                </tr>
            </thead>
            <tbody>
                <?php if (count($data) > 0): ?>
                    <?php foreach ($data as $value): ?>
                        <tr>
                            <td><?= $value['name'] ?></td>
                            <td>R$ <?= number_format($value['price'], 2, ',', '.') ?></td>
                            <td><?= implode(', ', json_decode($value['benefits'], true)) ?></td>
                            <td><?= $value['highlight'] ? 'Sim' : 'Não' ?></td>
                            <td>
                                <a href="<?= base_url() ?>/Precos/form/view/<?= $value['id'] ?>" class="btn btn-secondary btn-sm btn-icons-crud" title="Visualizar"><i class="fa fa-eye" aria-hidden="true"></i></a>    
                                <a href="<?= base_url() ?>/Precos/form/update/<?= $value['id'] ?>" class="btn btn-secondary btn-sm btn-icons-crud" title="Alterar"><i class="fa fa-file" aria-hidden="true"></i></a>    
                                <a href="<?= base_url() ?>/Precos/form/delete/<?= $value['id'] ?>" class="btn btn-secondary btn-sm btn-icons-crud" title="Excluir"><i class="fa fa-trash" aria-hidden="true"></i></a>                               
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Nenhum registro localizado...</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

<?= getDataTables("tbListaPrecos") ?>

<?= $this->endSection() ?>```
