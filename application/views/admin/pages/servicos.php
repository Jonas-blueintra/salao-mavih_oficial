<style>.preco-antigo {
    text-decoration: line-through;
    color: #999;
    margin-right: 8px;
}
</style>
<?php
$servicos = $this->Servicos_model->listar_paginado();
?>

<div class="servicos-container">
    <h3 class="mb-4 fade-in">Gerenciar Serviços</h3>
    <div class="d-flex justify-content-between align-items-center mb-4">

        <button class="btn btn-primary mb-3" onclick="loadPage('novo_servico')">
            <i class="bi bi-plus-circle"></i> Novo Serviço
        </button>
        <button class="btn btn-dark mb-3" onclick="location.reload()">
            <i class="bi bi-arrow-left"></i> Voltar
        </button>

    </div>


    <div class="table-responsive fade-in">
        <?php if ($servicos->susses == true): ?>
            <table id="servicosTable" class="table table-striped dt-responsive nowrap w-100">

                <thead>
                    <tr>
                        <th></th>
                        <th>Foto</th>
                        <th>Serviço</th>
                        <th>Preço</th>
                        <th>Promoção</th>
                        <th>Duração</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($servicos->data as $s): 
                    
                    if($s->promocao == 'ativo'):
                    $promocao =' <i class="bi bi-gift-fill"></i>'.'<br>'. 'R$'.number_format($s->preco_antigo, 2, ',', '.')?>
                            <?php else:
                               $promocao = '';
                                ?>
                                <?php endif;?>
                        <tr>

                            <td><?= $s->id; ?></td>

                            <td>
                                <img src="<?= base_url('/uploads/servicos/' . ($s->foto ?? 'placeholder.png')); ?>"
                                    class="zoom-image"
                                    data-full="<?= base_url('/uploads/servicos/' . ($s->foto ?? 'placeholder.png')) ?>"
                                    style="width:80px; height:80px; object-fit:cover; cursor:zoom-in; border-radius:10px; transition: transform 0.3s ease;">
            </div>
            </td>
            <td><?= $s->nome ?></td>
            <td>R$ <?= number_format($s->valor, 2, ',', '.')  ?> <rem class="preco-antigo"> <?=$promocao?></rem></td>
            <td><?= $s->promocao ?></td>
            <td><?= $s->duracao ?? '--' ?></td>
            <td>
                <button class="btn btn-warning btn-sm" onclick="loadPage('editar_servicos?id=<?= $s->id ?>&promocao=<?= $s->promocao?>')">Editar</button>
                <button class="btn btn-danger btn-sm"
                    onclick="excluirServico('<?= $s->id ?>', '<?= $s->nome ?>')">Excluir</button>
            </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning text-center fw-semibold shadow-sm py-3 rounded fade-in">
            <i class="bi bi-calendar-x"></i>
            <?= $servicos->message ?>
        </div>
    <?php endif; ?>
</div>
</div>