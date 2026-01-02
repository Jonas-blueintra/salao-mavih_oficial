<style>
    body {
        background: #eef2f7;
        font-family: 'Inter', sans-serif;
    }

    .card-config {
        background: #fff;
        border-radius: 14px;
        padding: 25px;
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.08);
        animation: fadeIn .5s;
    }

    .section-title {
        font-size: 18px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .upload-area {
        border: 2px dashed #bbb;
        padding: 5px;
        border-radius: 12px;
        text-align: center;
        cursor: pointer;
        transition: 0.3s;
    }

    .upload-area:hover {
        border-color: #0d6efd;
        background: #e7f1ff;
    }

    .avatar-upload {
        width: 200px;
        height: 200px;
        background: #000;
        border-radius: 50%;
        cursor: pointer;

        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;

        overflow: hidden;
        margin: auto;
    }

    .avatar-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
</style>

<div class="container py-4">

    <h2 class="fw-bold mb-4"><i class="bi bi-gear"></i> Configurações do Sistema</h2>

    <div class="row g-4">

        <!-- AVISOS DO SALÃO -->
        <div class="col-lg-6">
            <div class="card-config">
                <h4 class="section-title"><i class="bi bi-megaphone-fill"></i> Avisos do Salão</h4>
                <hr>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Aviso geral</label>
                    <textarea id="aviso_geral" class="form-control" rows="3"
                        placeholder="Mensagem exibida no app do cliente..."></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Aviso do dia</label>
                    <textarea id="aviso_dia" class="form-control" rows="2"
                        placeholder="Ex: Hoje funcionamento até 15h"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Aviso para feriados</label>
                    <textarea id="aviso_feriado" class="form-control" rows="2"
                        placeholder="Mensagem automática para feriados"></textarea>
                </div>

                <button class="btn btn-primary w-100" onclick="salvarAvisos()">Salvar avisos</button>
            </div>
        </div>

        <!-- INFORMAÇÕES DO SALÃO -->
        <div class="col-lg-6">
            <div class="card-config">

                <form id="formSalao" method="post" action="<?= base_url('admin/configuracao/salvar_salao') ?>"
                    enctype="multipart/form-data">

                    <h4 class="section-title">
                        <i class="bi bi-shop"></i> Informações do Salão
                    </h4>
                    <hr>
                    <?php $logoAtual = 'uploads\logo\logo_mavih.png' ?>
                    <!-- Logo -->
                    <label class="form-label fw-semibold">Logo do salão</label>

                    <label class="upload-area  text-center avatar-upload" for="logo">

                        <i class="bi bi-cloud-arrow-up" id="uploadIcon"
                            style="font-size:40px;color:#0d6efd; <?= $logoAtual ? 'display:none;' : '' ?>"></i>

                        <p class="text-muted mt-2" id="uploadText" style="<?= $logoAtual ? 'display:none;' : '' ?>">
                            Clique para enviar uma imagem
                        </p>

                        <img id="previewLogo" src="<?= base_url('/uploads/logo/' . ($informacao_tela->logo ?? 'placeholder.png')); ?>"
                            class="avatar-img <?= $logoAtual ? '' : 'd-none' ?>">
                    </label>


                    <input type="file" id="logo" name="foto" class="d-none" accept="image/*">



                    <div class="mb-2">
                        <label class="form-label">Nome do salão</label>
                        <input  type="text" id="nome_salao" name="nome_salao" class="form-control" required value="<?= $informacao_tela->nome_salao?>">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">WhatsApp</label>
                        <input type="text" id="whats" name="whats" class="form-control" value="<?= $informacao_tela->whatssap?>">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Endereço</label>
                        <input type="text" id="endereco" name="endereco" class="form-control" value="<?= $informacao_tela->endereco?>">
                    </div>

                    <button  type="submit" class="btn btn-primary w-100 mt-2">
                        Salvar informações
                    </button>

                </form>

            </div>
        </div>


        <!-- DIAS DE FUNCIONAMENTO -->
        <style>
            .section-title {
                font-size: 18px;
                font-weight: 700;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .day-box {
                padding: 10px;
                border-radius: 10px;
                text-align: center;
                cursor: pointer;
                border: 2px solid #ddd;
                transition: .2s;
                user-select: none;
            }

            .day-box.selected {
                background: #0d6efd;
                color: white;
                border-color: #0a58ca;
            }

            .day-box:hover {
                background: #f5f5f5;
            }
        </style>


        <div class="container py-4">

            <!-- ================= DIAS E HORÁRIOS ================= -->
            <div class="col-lg-12">
                <div class="card-config">
                    <h4><i class="bi bi-calendar-range"></i> Selecionar Dias e Criar Horários</h4>
                    <small class="text-muted">Selecione os dias e defina o horário de abertura/fechamento.</small>
                    <hr>

                    <!-- Seleção do mês -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="fw-semibold">Mês</label>
                            <input type="month" id="mesSelecionado" class="form-control" onchange="carregarDias()">
                        </div>
                    </div>

                    <!-- Dias -->
                    <div id="diasContainer" class="row g-2 mb-4"></div>

                    <hr>

                    <!-- Hora de abertura -->
                    <div class="row">
                        <div class="col-md-4">
                            <label class="fw-semibold">Hora de Abertura</label>
                            <input type="time" id="hora_abre" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="fw-semibold">Hora de Fechamento</label>
                            <input type="time" id="hora_fecha" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-success w-100 mt-4" onclick="enviarDiasParaController()">
                        Salvar no Sistema
                    </button>

                </div>

            </div>

            <div class="col-lg-12 my-2">
                <div class="card-config">

                    <h4 class="section-title"><i class="bi bi-calendar-x"></i> Horários Especiais</h4>
                    <hr>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Data</label>
                            <input type="date" id="data_especial" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select id="status_especial" class="form-select">
                                <option value="fechado">Fechado</option>
                                <option value="feriado">Feriado</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-success w-100 mt-3" onclick="salvarHorarioEspecial()">Adicionar horário
                        especial</button>

                </div>
            </div>
            <!-- ================= TABELA FINAL ================= -->
            <div class="col-lg-12 mt-5">
                <div class="card-config">
                    <h4><i class="bi bi-list-check"></i> Horários Aplicados</h4>
                    <?php if ($horarios_salvos->data != null): ?>
                        <div class="table-responsive fade-in">

                            <table id="configuracaoTable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Abertura</th>
                                        <th>Fechamento</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody id="tabelaDias">
                                    <?php foreach ($horarios_salvos->data as $horario): ?>
                                        <tr>
                                            <td><?= $data_formatada = date("d/m/Y", strtotime($horario->data)); ?></td>
                                            <td><?php if ($horario->abre == 'fechado'):
                                                echo $horario->abre;
                                            else:
                                                echo $hora_formatada = date("H:i", strtotime($horario->abre)) . "h";
                                            endif; ?></td>
                                            <td><?php if ($horario->abre == 'fechado'):
                                                echo $horario->fecha;
                                            else:
                                                echo $hora_formatada = date("H:i", strtotime($horario->fecha)) . "h";
                                            endif; ?></td>

                                            <td>
                                                <button onclick="RemoverHorarioEspecial(<?= $horario->id ?>)" class="btn btn-danger btn-sm">Remover</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    <?php else: ?>
                        <div class="alert alert-warning text-center fw-semibold shadow-sm py-3 rounded fade-in">
                            <i class="bi bi-calendar-x"></i>
                            <?= $horarios_salvos->message ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>