<?php

$usuarios = $this->cliente_model->listar_clientes('usuarios');
?>
<h3 class="mb-4 fade-in">Clientes</h3>
<button class="btn btn-dark" onclick="location.reload()" style="margin:0 0 10px 0;">
            <i class="bi bi-arrow-left"></i> Voltar
        </button>
      <style>
   .zoom-image:hover {
    transform: scale(2) translateX(20px); /* aumenta e anda 20px para direita */
    position: relative;
    z-index: 999;
}

    
</style>
<div class="table-responsive fade-in">
    <table id="clientesTable" class="table table-striped dt-responsive nowrap w-100" responsive="true">
        <thead>

            <tr>
                <th></th>
                <th>Foto</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>WhatsApp</th>
                <th>Último Serviço</th>
                <th>Dia do Cadastro</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario->id; ?></td>
                    <td>
                        <img src="<?= base_url('/uploads/usuarios/' . ($usuario->foto ?? 'placeholder.png')); ?>"
                            class="zoom-image"
                            data-full="<?= base_url('/uploads/usuarios/' . ($usuario->foto ?? 'placeholder.png')) ?>"
                            style="width:80px; height:80px; object-fit:cover; cursor:zoom-in; border-radius:10px; transition: transform 0.3s ease;">
                            </div>
                    </td>
                    <td><?= $usuario->nome; ?></td>
                    <td><?= $usuario->email; ?></td>
                    <td><?= $usuario->telefone; ?></td>
                    <td><?php if($usuario->ultimo_servico != null  && $usuario->ultimo_dia_servico != null): ?>
                    <?=$usuario->ultimo_servico  .' <br>'. $usuario->ultimo_dia_servico ; ?></php></td>
                    <?php else: ?>--<?php endif; ?>
                    <td><?= $usuario->data_cadastro; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
  

    </table>
</div> 