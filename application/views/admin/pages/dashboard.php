<style>
    body {
        background: #f4f7fc;
        font-family: 'Inter', sans-serif;
    }

    .card-dashboard {
        border-radius: 16px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .card-dashboard:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .badge-status {
        border-radius: 50px;
        padding: 0.5em 0.75em;
        font-size: 0.85rem;
    }

    .table thead {
        background: #0d6efd;
        color: #fff;
    }

    .shortcut-btn {
        transition: 0.3s;
        border-radius: 12px;
        font-weight: 600;
    }

    .shortcut-btn:hover {
        transform: translateY(-3px);
    }

    .card-graph {
        border-radius: 16px;
        height: 320px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #888;
        font-weight: 500;
    }
</style>



<div class="container py-4">

    <h2 class="mb-4 fw-bold"><i class="bi bi-speedometer2"></i> Dashboard</h2>

    <!-- CARDS DE RESUMO -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow card-dashboard p-3 text-center">
                <i class="bi bi-people fs-1 text-primary"></i>
                <h5 class="mt-2">Clientes</h5>
                <h2 class="fw-bold" id="totalClientes"><?= $usuarios ?></h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow card-dashboard p-3 text-center">
                <i class="bi bi-calendar-check fs-1 text-success"></i>
                <h5 class="mt-2">Agendamentos Hoje</h5>
                <h2 class="fw-bold" id="agendamentosHoje"><?= $agenda_total ?></h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow card-dashboard p-3 text-center">
                <i class="bi bi-clock-history fs-1 text-warning"></i>
                <h5 class="mt-2">Pendentes</h5>
                <h2 class="fw-bold" id="pendentes"><?= $agenda_pendente ?></h2>
            </div>
        </div>
     
    </div>
   <div class="col-md-12 mb-3">
            <div class="card shadow card-dashboard p-3 text-center">

                <i class="bi bi-cash-coin fs-1 text-danger"></i>

                <select id="mesFaturamento" class="form-select">
                    <?php
                    $meses = [
                        1 => 'Janeiro',
                        2 => 'Fevereiro',
                        3 => 'Março',
                        4 => 'Abril',
                        5 => 'Maio',
                        6 => 'Junho',
                        7 => 'Julho',
                        8 => 'Agosto',
                        9 => 'Setembro',
                        10 => 'Outubro',
                        11 => 'Novembro',
                        12 => 'Dezembro'
                    ];

                    $mesAtual = date('n'); // 1 a 12
                    
                    foreach ($meses as $numero => $nome): ?>
                        <option value="<?= $numero ?>" <?= $numero == $mesAtual ? 'selected' : '' ?>>
                            <?= $nome ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <h5 class="mt-2">Faturamento</h5>


                <h2 class="fw-bold" id="faturamentoMes">R$ 0,00</h2>

            </div>
        </div>

    <!-- AGENDA + NOTIFICAÇÕES -->
    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="card shadow p-3">
                <h4 class="fw-bold mb-3"><i class="bi bi-calendar-day"></i> Agenda de Hoje</h4>
                <div class="table-responsive">
                    <?php if ($agenda_hoje->data == null): ?>
                        <div class="alert alert-warning text-center fw-semibold shadow-sm py-3 rounded fade-in">
                            <i class="bi bi-calendar-x"></i>
                            <?= $agenda_hoje->message ?>
                        </div>
                    <?php else: ?>
                        <table id="dashboardTable" class="table table-striped dt-responsive nowrap w-100" responsive="true">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Horario</th>
                                    <th>Serviço</th>
                                    <th>Status</th>
                                    <th>--</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($agenda_hoje->data as $agenda): ?>
                                    <tr>
                                        <td><?= $agenda->nome ?></td>
                                        <td><?= $agenda->hora ?></td>
                                        <td><?= $agenda->servico ?></td>
                                        <td>
                                            <?php if ($agenda->status == 'pendente'): ?>
                                                <span class="badge bg-warning">Pendente</span>
                                            <?php endif; ?>

                                            <?php if ($agenda->status == 'confirmado'): ?>
                                                <span class="badge bg-success ">Confirmado</span>
                                            <?php endif; ?>

                                            <?php if ($agenda->status == 'concluido'): ?>
                                                <span class="badge bg-primary">concluido</span>
                                            <?php endif; ?>

                                            <?php if ($agenda->status == 'cancelado'): ?>
                                                <span class="badge bg-danger">Cancelado</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($agenda->status == 'pendente'): ?>
                                                <button class="btn btn-danger btn-sm" onclick="loadPage('agenda')">Precisa
                                                    Confirmar</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if ($notificação_cadastro > 0 || $notificacao_agenda > 0) {
            $class = ' bell-anim';
            $style = 'color:green';

        } else {
            $class = null;
            $style = null;
        }
        if ($notificação_cadastro > 1) {
            $s = 's';
        } else {
            $s = '';
        }
        if ($notificacao_agenda > 1) {
            $s = 's';
        } else {
            $s = '';
        }
        ?>
        <div class="col-lg-4">
            <div class="card shadow p-3 h-100">
                <h4 class="fw-bold mb-3" style="<?= $style ?>">
                    <i class="bi bi-bell <?= $class ?>" style="<?= $style ?>"></i> Notificações
                </h4>

                <ul class="list-group list-group-flush">
                    <?php if ($notificacao_agenda > 0): ?>
                        <li class="list-group-item pulse-anim d-flex justify-content-between align-items-center"
                            onclick="loadPageDashboard('agenda', 'agendamento');">
                            <div>
                                <i class="bi bi-info-circle text-primary"></i>
                                <?= $notificacao_agenda . ' ' ?> novo<?= $s ?> agendamentos aguardando confirmação
                            </div>
                            <button class="btn btn-sm btn-light border-0"
                                onclick="fecharNotificacao(event, this, 'agendamento')">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </li>
                    <?php endif; ?>

                    <?php if ($notificação_cadastro > 0): ?>
                        <li class="list-group-item pulse-anim d-flex justify-content-between align-items-center"
                            onclick="loadPageDashboard('clientes', 'cadastro');">

                            <div>
                                <i class="bi bi-person-plus text-success"></i>
                                <?= $notificação_cadastro . ' ' ?> Novo<?= $s ?> cliente cadastrado
                            </div>

                            <button class="btn btn-sm btn-light border-0"
                                onclick="fecharNotificacao(event, this, 'cadastro')">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </li>
                    <?php endif; ?>



                    <li class="list-group-item ">
                        <i class="bi bi-x-circle text-danger"></i>
                        1 agendamento cancelado hoje
                    </li>
                </ul>
            </div>
        </div>

    </div>

    <!-- GRÁFICOS -->
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card shadow card-graph">
                <div class="container mt-4">

                    <h4 class="mb-3 text-center">Acessos dos últimos <?= $dias ?> dias</h4>

                    <div class="text-center mb-4">
                        <h1 class="display-4 fw-bold"><?= $total_acessos ?></h1>
                        <p class="text-muted">Total de acessos</p>
                    </div>

                    <div class="text-center mb-4">
                        <button class="btn btn-primary" onclick="loadPage('dashboard/7')">7 dias</button>
                        <button class="btn btn-secondary" onclick="loadPage('dashboard/15')">15 dias</button>
                        <button class="btn btn-dark" onclick="loadPage('dashboard/30')">30 dias</button>
                    </div>



                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow card-graph">
                <div class="container mt-4">

                    <h4 class="mb-3 text-center">Cadastros dos últimos <?= $dias ?> dias</h4>

                    <div class="text-center mb-4">
                        <h1 class="display-4 fw-bold"><?= $total_cadastros ?>
                        </h1>
                        <p class="text-muted">Cadastros de acessos</p>
                    </div>

                    <div class="text-center mb-4">
                        <button class="btn btn-primary" onclick="loadPage('dashboard/7')">7 dias</button>
                        <button class="btn btn-secondary" onclick="loadPage('dashboard/15')">15 dias</button>
                        <button class="btn btn-dark" onclick="loadPage('dashboard/30')">30 dias</button>
                    </div>



                </div>
            </div>
        </div>

    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>


</script>


<!-- ATALHOS -->
<div class="card shadow p-4 mb-5">
    <h4 class="fw-bold mb-3"><i class="bi bi-lightning-charge"></i> Atalhos Rápidos</h4>
    <div class="row g-3">
        <div class="col-md-3">
            <button class="btn btn-primary w-100 py-3 shortcut-btn" onclick="loadPage('nova_agenda')"><i
                    class="bi bi-plus-circle"></i> Novo
                Agendamento</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-secondary w-100 py-3 shortcut-btn" onclick="loadPage('cadastrar_usuario')"><i
                    class="bi bi-person-plus"></i> Cadastrar Cliente</button>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-info w-100 py-3 shortcut-btn text-white"
                onclick="loadPage('novo_servico')"><i class="bi bi-scissors"></i> Serviços</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-success w-100 py-3 shortcut-btn" onclick="loadPage('agenda')"><i
                    class="bi bi-calendar-week"></i> Agenda Completa</button>
        </div>
    </div>
</div>

</div>