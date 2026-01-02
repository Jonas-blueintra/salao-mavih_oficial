<?php
$servicos = $this->crud->servico($this->input->get('id'));
$promocao = $this->input->get('promocao');
?>

<div class="fade-in">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold ">
            <i class="bi bi-pencil-square"></i> Editar Serviço
        </h3>
        <button class="btn btn-dark" onclick="loadPage('servicos')">
            <i class="bi bi-arrow-left"></i> Voltar
        </button>
    </div>
    <?php if ($promocao == 'inativo'): ?>
        <!-- editar_serviço sem promoção -->
        <div class="card shadow-sm border-0" style="border-radius: 18px;">
            <div class="card-body p-4">
                <div class="form">
                    <form id="editarServico" enctype="multipart/form-data" method="post"
                        action="<?= base_url('admin/servicos/salvar/' . $servicos->data->id); ?>">
                        <input type="hidden" name="id" value="<?php echo $servicos->data->id; ?>">
                        <div class="row g-4">

                            <!-- NOME -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nome do Serviço</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white">
                                        <i class="bi bi-scissors"></i>
                                    </span>
                                    <input type="text" name="nome" class="form-control" value="<?= $servicos->data->nome ?>"
                                        placeholder="Corte Masculino, Manicure..." required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Descrição</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white"><i
                                            class="bi bi-chat-right-text"></i></span>
                                    <input type="text" name="descricao" class="form-control"
                                        value="<?= $servicos->data->descricao ?>" required>
                                </div>
                            </div>
                            <!-- VALOR -->
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Valor</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white">R$</span>
                                    <input type="number" name="valor" class="form-control" step="0.01" placeholder="50.00"
                                        value="<?= $servicos->data->valor ?>" required>
                                </div>
                            </div>

                            <!-- DURAÇÃO -->
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Duração (Minutos)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white">
                                        <i class="bi bi-clock"></i>
                                    </span>
                                    <input type="time" name="duracao" class="form-control" placeholder="Ex: 30"
                                        value="<?= $servicos->data->duracao ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold" for="tipo_servico">Tipo de Serviço</label>

                                <div class="select-wrapper">
                                    <select name="tipo_servico" id="tipo_servico" class="form-control" required>
                                        <option value=""></option>
                                        <option value="cabelo" <?= ($servicos->data->tipo_servico == 'cabelo') ? 'selected' : '' ?>>Cabelo</option>
                                        <option value="unha" <?= ($servicos->data->tipo_servico == 'unha') ? 'selected' : '' ?>>Unha</option>
                                        <option value="sobrancelha" <?= ($servicos->data->tipo_servico == 'sobrancelha') ? 'selected' : '' ?>>Sobrancelha</option>
                                        <option value="depilacao" <?= ($servicos->data->tipo_servico == 'depilacao') ? 'selected' : '' ?>>Depilação</option>
                                    </select>
                                </div>

                            </div>
                            <!-- FOTO + PREVIEW -->
                            <div class="">
                                <div class="d-flex align-items-start gap-4 row">
                                    <!-- INPUT FILE -->
                                    <div class=" col-md-6">
                                        <label class="form-label fw-semibold">Foto do Serviço</label>
                                        <input type="file" name="foto" class="form-control" accept="image/*">
                                        <small class="text-muted">Opcional — JPG, PNG, até 2MB.</small>
                                    </div>

                                   
                                    <div>
                                        <img src="<?= base_url('/uploads/servicos/' . ($servicos->data->foto ?? 'placeholder.png')) ?>"
                                            class="zoom-image"
                                            data-full="<?= base_url('/uploads/servicos/' . ($servicos->data->foto ?? 'placeholder.png')) ?>"
                                            style="width:120px; height:120px; object-fit:cover; cursor:zoom-in; border-radius:10px;">

                                        <!-- MODAL DE ZOOM PRÓPRIO (não usa Bootstrap) -->




                                    </div>
                                </div>

                            </div>

                            <hr class="my-4">

                            <button class="btn btn-primary px-4 py-2 btn-salvar-servico" type="submit">
                                <span class="btn-text-salvar">Salvar Serviço</span>
                                <span class="spinner-border spinner-border-sm d-none btn-spinner-salvar"></span>
                            </button>

                    </form>
                </div>
            </div>
        </div>s
    <?php else: ?>
        <div class="card shadow-sm border-0" style="border-radius: 18px;">
            <div class="card-body p-4">
                <div class="form">
                    <form id="formAddServicopromocao" enctype="multipart/form-data" method="post"
                        action="<?= base_url('admin/servicos/salvar_promocao/'.$servicos->data->id) ?>">


                        <div class="row g-4">

                            <!-- NOME -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nome do Serviço</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white"><i class="bi bi-scissors"></i></span>
                                    <input type="text" name="nome" class="form-control" value="<?= $servicos->data->nome ?>"
                                        placeholder="Corte Masculino, Manicure..." required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Descrição</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white"><i
                                            class="bi bi-chat-right-text"></i></span>
                                    <input type="text" name="descricao" class="form-control"
                                        placeholder="Uma Pequena Descrição do Serviço "
                                        value="<?= $servicos->data->descricao ?>" required>
                                </div>
                            </div>

                            <!-- VALOR -->
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Valor</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white">R$</span>
                                    <input type="number" name="valor" class="form-control"
                                        value="<?= $servicos->data->valor ?>" step="0.01" placeholder="50.00" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Valor antigo</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white preco-antigo">R$</span>
                                    <input type="number" name="valor_antigo" value="<?= $servicos->data->preco_antigo ?>"
                                        class="form-control" step="0.01" placeholder="50.00" required>
                                </div>
                            </div>
                            <!-- DURAÇÃO -->
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Duração (Minutos)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white"><i class="bi bi-clock"></i></span>
                                    <input type="time" name="duracao" class="form-control"
                                        value="<?= $servicos->data->duracao ?>" placeholder="Ex: 30" required>
                                </div>
                            </div>



                            <!-- FOTO -->
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Foto do Serviço</label>
                                    <input type="file" name="foto" class="form-control" accept="image/*">
                                    <small class="text-muted">Opcional — JPG, PNG, até 2MB.</small>
                                </div>


                                <?php
                                $dataFinal = '';

                                if (!empty($servicos->data->tempo_promocao)) {
                                    $data = DateTime::createFromFormat('d/m/Y', $servicos->data->tempo_promocao);
                                    if ($data) {
                                        $dataFinal = $data->format('Y-m-d');
                                    }
                                }
                                ?>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Data Final da promoção</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-dark text-white">
                                            <i class="bi bi-calendar-event"></i>
                                        </span>
                                        <input type="date" min="<?= date('d-m-Y') ?>" name="data_final" class="form-control"
                                            value="<?= $dataFinal?>" required>
                                    </div>
                                </div>
                                  <div class="col-md-4">
                                <label class="form-label fw-semibold" for="tipo_servico">Tipo de Serviço</label>

                                <div class="select-wrapper">
                                    <select name="tipo_servico" id="tipo_servico" class="form-control" required>
                                        <option value=""></option>
                                        <option value="cabelo" <?= ($servicos->data->tipo_servico == 'cabelo') ? 'selected' : '' ?>>Cabelo</option>
                                        <option value="unha" <?= ($servicos->data->tipo_servico == 'unha') ? 'selected' : '' ?>>Unha</option>
                                        <option value="sobrancelha" <?= ($servicos->data->tipo_servico == 'sobrancelha') ? 'selected' : '' ?>>Sobrancelha</option>
                                        <option value="depilacao" <?= ($servicos->data->tipo_servico == 'depilacao') ? 'selected' : '' ?>>Depilação</option>
                                    </select>
                                </div>

                            </div>

                               
                                <div>
                                    <img src="<?= base_url('/uploads/servicos/' . ($servicos->data->foto ?? 'placeholder.png')) ?>"
                                        class="zoom-image"
                                        data-full="<?= base_url('/uploads/servicos/' . ($servicos->data->foto ?? 'placeholder.png')) ?>"
                                        style="width:120px; height:120px; object-fit:cover; cursor:zoom-in; border-radius:10px;">

                                    <!-- MODAL DE ZOOM PRÓPRIO (não usa Bootstrap) -->




                                </div>


                            </div>

                        </div>

                        <hr class="my-4">

                        <button class="btn btn-primary px-4 py-2 btn-servico" type="submit">
                            <span class="btn-text">Salvar Serviço</span>
                            <span class="spinner-border spinner-border-sm d-none btn-spinner"></span>
                        </button>


                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- editar promoçao -->
</div>
<div id="zoomOverlay" style="
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.85);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 99999;
    cursor: zoom-out;
">
    <img id="zoomFullImg" src="" style="
        max-width: 90%;
        max-height: 90%;
        border-radius: 10px;
    ">
</div>