<?php

$agenda = $this->agenda_model->listar_agenda();
?>
<h3 class="mb-4 fade-in">Historico de agendamentos</h3>
<div class="table-responsive fade-in">
    <button class="btn btn-dark mb-3" onclick="loadPage('agenda')">
        <i class="bi bi-arrow-left"></i> voltar
    </button>
    <table id="historicoTable" class="table table-striped dt-responsive nowrap w-100" responsive="true">
        <thead>
            <tr>
                <th>id</th>
                <th>Foto</th>
                <th>Cliente</th>
                <th>Serviço</th>
                <th>Valor</th>
                <th>Telefone</th>
                <th>Data</th>
                <th>Dia</th>
                <th>Horario</th>
                <th>Status</th>
                <th>Motivo do cancelamento</th>
                <th>Quem cancelou</th>
                <th>data cancelamento</th>
            </tr>
        </thead>

        <tbody>
             <?php  if($agenda->data): ?>
            <?php foreach ($agenda->data as $a): ?>
                <?php if ($a->status == 'pendente' || $a->status == 'confirmado') {
                    continue;
                }?>
                <tr>

                    <td><?= $a->id; ?></td>
                    <td>
                        <img src="<?= base_url('/uploads/usuarios/' . ($a->foto ?? 'placeholder.png')); ?>"
                            class="zoom-image"
                            data-full="<?= base_url('/uploads/usuarios/' . ($a->foto ?? 'placeholder.png')) ?>" style="width:80px; height:80px; object-fit:cover; cursor:zoom-in; border-radius:10px; transition: 
                            transform 0.3s ease;">
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
    <td><?php if($a->motivo_cancelamento) :
       echo $a->motivo_cancelamento;
    else: echo '<i class="bi bi-clipboard2-check" style="color:green;  font-size: 2rem;"></i>';
    endif
     ?></td>
     <td><?php
     if($a->quem_cancelou == 'admin')
     {
        $quem = 'Você';
     }
     else{
        $quem = $a->nome;
     }
      echo $quem ?></td>
      <td><?= $a->data_hora_cancelamento ?></td>
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