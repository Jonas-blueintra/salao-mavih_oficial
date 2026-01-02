<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
    body {
        background: #f2f4f8;
        padding-top: 140px;
    }

    .container-agenda {
        max-width: 900px;
        margin: auto;
    }

    .card-custom {
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }

    .service-item {
        cursor: pointer;
        transition: .2s;
    }

    .service-item:hover {
        background: #eef6ff;
    }

    .service-item.active {
        border: 2px solid #0d6efd;
    }

    .day {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-weight: bold;
        user-select: none;
    }

    .day.available {
        background: #d7ffe0;
        color: #0d6d00;
    }

    .day.unavailable {
        background: #ffd6d6;
        color: #7a0000;
        cursor: not-allowed;
    }

    .day.selected {
        border: 3px solid #0d6efd;
        background: #bfe0ff !important;
        color: #003c87 !important;
    }

    <style>
    /* ==== CARROSSEL DE SERVIÇO (MODELO DO CATÁLOGO, VERSÃO MENOR) ==== */

    .service-card {
        border-radius: 18px;
        overflow: hidden;
        background: #fff;
        transition: .3s;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.10);
        height: 100%;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 26px rgba(0, 0, 0, 0.15);
    }

    .service-img {
        width: 100%;
        height: 150px;
        /* <<< menor */
        object-fit: cover;
    }

    .service-card h4 {
        font-size: 1rem;
        /* menor */
        font-weight: 600;
    }

    .service-card p {
        font-size: .85rem;
        /* menor */
    }

    .price-tag {
        font-size: 1.15rem;
        font-weight: bold;
        color: #28a745;
    }

    .badge-time {
        background: #ffe08a;
        color: #805900;
        font-size: .75rem;
        padding: 4px 10px;
        border-radius: 8px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        filter: invert(1);
        width: 32px;
        height: 32px;
    }

    /* MOBILE */
    @media (max-width: 576px) {
        .service-card {
            width: 92%;
            margin: 0 auto;
        }

        .service-img {
            height: 130px !important;
        }
    }
    .cal-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr); /* 7 dias da semana */
    gap: 8px;
}
@media (max-width: 576px) {
    .cal-grid {
        gap: 4px;
    }

    .day {
        width: 42px;
        height: 42px;
        font-size: 0.9rem;
    }
}
/* DESKTOP: mantém normal */
.horarios {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

/* MOBILE: 2 horários por linha */
@media (max-width: 576px) {
    .horarios {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .horarios button {
        width: 100%;
        font-size: 0.9rem;
        padding: 10px 0;
    }
}

</style>

</style>

<?php $dados = $horarios_salvos->data; // seu array vindo do backend

$agrupado = [];

foreach ($dados as $dia) {

    $mesAno = $dia->mes_atual; // ex: "12/2025"

    if (!isset($agrupado[$mesAno])) {
        $agrupado[$mesAno] = [];
    }

    $agrupado[$mesAno][] = $dia;
}
?>
<?php
function mesPortugues($mesAno)
{
    list($mes, $ano) = explode("/", $mesAno);

    $nomes = [
        "01" => "Janeiro",
        "02" => "Fevereiro",
        "03" => "Março",
        "04" => "Abril",
        "05" => "Maio",
        "06" => "Junho",
        "07" => "Julho",
        "08" => "Agosto",
        "09" => "Setembro",
        "10" => "Outubro",
        "11" => "Novembro",
        "12" => "Dezembro"
    ];

    return $nomes[$mes] . " de " . $ano;
}
?>
<div class="container container-agenda">
    <h2 class="fw-bold mb-4 text-center">Criar Nova Agenda</h2>

    <!-- FORMULÁRIO -->
    <div class="card card-custom p-4 mb-4">
        <h4 class="fw-bold mb-3"><i class="bi bi-person"></i> Informações do Cliente</h4>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Nome do Cliente</label>
              <input type="text" id="nomeCliente" class="form-control" placeholder="Digite o nome" />
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Telefone</label>
                <input type="text" id="telefoneCliente" class="form-control" placeholder="(00) 00000-0000" />
            </div>
        </div>
    </div>

    <!-- SERVIÇOS COM CARROSSEL -->
    <div class="card card-custom p-4 mb-4">
        <h4 class="fw-bold mb-3"><i class="bi bi-scissors"></i> Escolha o Serviço</h4>
        <!-- CARROSSEL -->
        <?php if ($mostrar_serviços): ?>

            <?php $grupos = array_chunk($mostrar_serviços, 3); ?>
            <?php $ativo = true; ?>




            <?php if (!empty($mostrar_serviços)): ?>

                <?php $grupos = array_chunk($mostrar_serviços, 3); ?>

                <form method="POST" action="<?= base_url('cliente/agendar/selecionarServico'); ?>">
                    <div id="carouselServicos" class="carousel slide" data-bs-ride="false">

                        <div class="carousel-inner">

                            <?php $ativo = true; ?>
                            <?php foreach ($grupos as $grupo): ?>

                                <div class="carousel-item <?= $ativo ? 'active' : '' ?>">
                                    <div class="row g-4 justify-content-center">

                                        <?php foreach ($grupo as $ser): ?>
                                            <div class="col-12 col-sm-6 col-lg-4">

                                                <div class="service-card p-2">

                                                    <!-- RADIO BUTTON (apenas 1 pode ser selecionado) -->


                                                    <img src="<?= base_url('/uploads/servicos/' . ($ser->foto ?? 'servico.png')) ?>"
                                                        class="service-img rounded">

                                                    <div class="p-2">
                                                        <h4><?= $ser->nome ?></h4>
                                                        <span class="badge badge-time">⏱ <?= $ser->duracao ?> min</span>

                                                        <p class="price-tag">
                                                            R$ <?= number_format($ser->valor, 2, ",", ".") ?>
                                                        </p>

                                                        <p class="text-muted"><?= $ser->descricao ?></p>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input servico-radio" type="radio" name="id_servico"
                                                            value="<?= $ser->id ?>" data-duracao="<?= $ser->duracao ?>"
                                                            data-valor="<?= $ser->valor ?>" id="serv<?= $ser->id ?>">

                                                        <label class="form-check-label fw-bold" for="serv<?= $ser->id ?>">
                                                            Selecionar Serviço
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                </div>

                                <?php $ativo = false; ?>
                            <?php endforeach; ?>

                        </div>

                        <!-- CONTROLES -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselServicos"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#carouselServicos"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>

                    </div>

                    <!-- BOTÃO CONFIRMAR -->

                </form>

            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>


<!-- CALENDÁRIO (AGORA COM CARROSSEL) -->
<div class="container container-agenda">

    <!-- SERVIÇO -->

    <!-- LEGENDA DO CALENDÁRIO -->
    <div class="d-flex gap-3 align-items-center mb-3">

        <div class="d-flex align-items-center">
            <div style="width:22px; height:22px; border-radius:6px; background:#d7ffe0; border:1px solid #8ee09a;">
            </div>
            <span class="ms-2 text-muted fw-semibold">Dias disponíveis</span>
        </div>

        <div class="d-flex align-items-center">
            <div style="width:22px; height:22px; border-radius:6px; background:#ffd6d6; border:1px solid #ff9a9a;">
            </div>
            <span class="ms-2 text-muted fw-semibold">Horários esgotados</span>
        </div>

        <div class="d-flex align-items-center">
            <div style="width:22px; height:22px; border-radius:6px; background:#bed9ff; border:1px solid #7fb1ff;">
            </div>
            <span class="ms-2 text-muted fw-semibold">Salão fechado</span>
        </div>

    </div>

    <!-- CALENDÁRIO -->
    <?php foreach ($agrupado as $mesAno => $diasDoMes): ?>

        <!-- Título do mês -->
        <div class="calendar mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="calendar-header"><?= mesPortugues($mesAno); ?></h3>
            </div>

            <!-- Cabeçalho da semana -->
            <div class="row fw-bold text-center mb-2">
                <div class="col">Dom</div>
                <div class="col">Seg</div>
                <div class="col">Ter</div>
                <div class="col">Qua</div>
                <div class="col">Qui</div>
                <div class="col">Sex</div>
                <div class="col">Sáb</div>
            </div>

            <div class="cal-grid text-center">
                <?php foreach ($diasDoMes as $horarios):

                    if ($horarios->abre == "fechado" || $horarios->fecha == "fechado"):
                        $class = "unavailable";
                    else:
                        $class = "available";
                    endif;
                    ?>

                    <div class="p-1 cal-grid text-center">
                        <div class="day <?= $class ?>" data-id="<?= $horarios->id ?>"
                            data-dia="<?= date("d", strtotime($horarios->data)); ?>" data-data="<?= $horarios->data ?>">
                            <?= date("d", strtotime($horarios->data)); ?>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>

        </div>

    <?php endforeach; ?>

    <!-- HORÁRIOS -->
    <div class="card p-4 d-none" id="boxHorarios">
        <h4 class="fw-bold mb-3">
            <i class="bi bi-clock"></i> Horários disponíveis
            <span id="dataEscolhida" class="text-primary fw-bold"></span>
        </h4>

        <div id="listaHorarios" class="horarios"></div>
    </div>
    <!-- CONFIRMAR -->
    <button  id="btnConfirmar" class="btn btn-success btn-lg w-100 rounded-pill d-none">
        Confirmar Agendamento
    </button>
</div>
</div>