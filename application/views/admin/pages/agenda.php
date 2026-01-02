<?php

$agenda = $this->agenda_model->listar_agenda();

?>

<h3 class="mb-4 fade-in">Agendamentos</h3>
<div class="table-responsive fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <button class="btn btn-dark mb-3" onclick="location.reload()">
            <i class="bi bi-arrow-left"></i> voltar
        </button>
        <button class="btn btn-primary mb-3" onclick="loadPage('historico_agenda')">
            <i class="bi bi-clipboard2-fill"></i> Historico
        </button>
    </div>

    <table id="agendaTable" class="table table-striped dt-responsive nowrap w-100" responsive="true">
        <thead>
            <tr>
                <th></th>
                <th>Foto</th>
                <th>Cliente</th>
                <th>Serviço</th>
                <th>Valor</th>
                <th>Telefone</th>
                <th>Data</th>
                <th>Dia</th>
                <th>Horario</th>
                <th>Status</th>
                <th>Ações</th>
                <th>Finalizar</th>
            </tr>
        </thead>
              
        <tbody>
          <?php  if($agenda->data): ?>
            <?php foreach ($agenda->data as $a):
                if ($a->status == 'concluido') {
                    continue;
                } 
                if($a->status == 'cancelado'){
                    continue;
                }
                ?>

                <tr>
                    <td><?= $a->id; ?></td>

                    <td>
                        <img src="<?= base_url('/uploads/usuarios/' . ($a->foto ?? 'placeholder.png')); ?>"
                            class="zoom-image"
                            data-full="<?= base_url('/uploads/usuarios/' . ($a->foto ?? 'placeholder.png')) ?>"
                            style="width:80px; height:80px; object-fit:cover; cursor:zoom-in; border-radius:10px; transition: transform 0.3s ease;">
    </div>
    </td>
    <td><?= $a->nome; ?></td>
    <td><?= $a->servico; ?></td>
    <td>R$<?= $a->valor ?></td>
    <td><?= $a->telefone; ?></td>
    <td><?= DateTime::createFromFormat('Y-m-d', $a->data)->format('d/m/Y');?></td>
    <td><?= $a->dia; ?></td>
    <td><?= $a->hora; ?></td>

    <td>
        <?php if ($a->status == 'pendente'): ?>
            <span class="badge bg-warning">Pendente</span>
        <?php endif; ?>

        <?php if ($a->status == 'confirmado'): ?>
            <span class="badge bg-success ">Confirmado</span>
        <?php endif; ?>

        <?php if ($a->status == 'concluido'): ?>
            <span class="badge bg-primary">concluido</span>
        <?php endif; ?>

        <?php if ($a->status == 'cancelado'): ?>
            <span class="badge bg-danger">Cancelado</span>
        <?php endif; ?>

    </td>

    <td>
        <?php if ($a->status != 'concluido'): ?>
            <button class="btn btn-danger btn-sm "onclick="cancelarAgenda('<?= $a->id ?>')">Cancelar</button>
        <?php endif; ?>
        <?php if ($a->status == 'pendente'): ?>
            <button class="btn btn-success btn-sm confirmado" type="button"
                onclick="confirmarAgenda('<?= $a->id ?>')">Confirmar</button>
        <?php endif; ?>
    </td>
    <td>
        <?php if ($a->status != 'pendente' && $a->status == 'confirmado'): ?>
            <button class="btn btn-primary btn-sm" type="button" onclick="concluirAgenda('<?= $a->id ?>')">concluir</button>
        <?php endif; ?>
    </td>
    </tr>
<?php endforeach; ?>
<?php else: ?>
    
     <div class="alert alert-warning text-center fw-semibold shadow-sm py-3 rounded fade-in">
                            <i class="bi bi-calendar-x"></i>
                            <?= $agenda->message ?>
                        </div>
    <?php endif; ?>
</tbody>
</table>

</script>
</div>
