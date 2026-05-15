<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Minha Agenda</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!DOCTYPE html>

    <html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <title>Minha Agenda</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"
            rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Bootstrap -->

        <style>
        :root {
            --cor-principal: #c59d5f;
            /* dourado */
            --cor-secundaria: #000;
            /* preto */
            --cor-bg: #000;
            /* fundo escuro */
            --cor-card: #1f1f1f;
            /* cards */
            --texto: #eaeaea;
            /* texto claro */
            --texto-suave: #aaaaaa;
            /* cinza suave */
            --blue: blue;
            --fundo1: #121212;
            --fundo2: #1c1c1c;
        }

        body {
            background: linear-gradient(135deg, var(--fundo1), var(--fundo2));
            min-height: 100vh;
        }



        /* GRID CENTRALIZADO – MÁX 2 POR LINHA */
        .agenda-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 28px;
            justify-content: center;
        }

        .agenda-card {
            background: #ffffff;
            border-radius: 26px;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(244, 180, 204, .4);
            transition: .35s ease;
            height: 100%;
        }

        .agenda-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(244, 180, 204, .55);
        }

        .agenda-img {
            width: 100%;
            height: 570px;
            object-fit: cover;
            border-bottom: 4px solid var(--blue);
        }

        .badge-status {
            font-size: .75rem;
            padding: 6px 14px;
            border-radius: 999px;
            font-weight: 600;
        }

        .status-confirmado {
            background: linear-gradient(135deg, #ff9dbf, #ff6f91);
            color: #fff;
        }

        .price {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--cor-bg);
        }

        .agenda-info i {
            color: var(--blue);
            margin-right: 6px;
        }

        .btn-cancelar {
            border-radius: 999px;
            border: 2px solid #ff9dbf;
            color: #ff4f8b;
            font-weight: 600;
            transition: .25s;
        }

        .btn-cancelar:hover {
            background: #ff4f8b;
            border-color: #ff4f8b;
            color: #fff;
        }

        .body-offset {
            margin-top: 140px;
        }

        .cor {
            color: var(var(--cor-bg)) !important;
        }

        /* MOBILE – CONTINUA COM NO MÁX 2 */
        @media (max-width: 768px) {
            .agenda-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .agenda-img {
                height: 370px;
            }
        }

        @media (max-width: 480px) {
            .agenda-grid {
                grid-template-columns: 1fr;
            }
        }

        .aviso-nuvem {
            position: relative;
            animation: nuvemPisca 2.5s infinite ease-in-out;
            box-shadow: 0 6px 20px rgba(255, 79, 139, 0.35);
        }

        /* Brilho tipo nuvem */
        .aviso-nuvem::before {
            content: "";
            position: absolute;
            inset: -6px;
            background: radial-gradient(circle,
                    rgba(255, 255, 255, 0.45),
                    rgba(255, 255, 255, 0));
            border-radius: 50px;
            opacity: 0.6;
            z-index: -1;
            animation: brilhoNuvem 2.5s infinite ease-in-out;
        }

        /* Animação principal */
        @keyframes nuvemPisca {
            0% {
                opacity: 0.85;
                transform: translateY(0);
            }

            50% {
                opacity: 1;
                transform: translateY(-2px);
            }

            100% {
                opacity: 0.85;
                transform: translateY(0);
            }
        }

        /* Animação do brilho */
        @keyframes brilhoNuvem {
            0% {
                opacity: 0.3;
            }

            50% {
                opacity: 0.7;
            }

            100% {
                opacity: 0.3;
            }
        }

        /* GRID NORMAL (DESKTOP) */
        @media (max-width: 768px) {

            #carouselAgenda .carousel-item .row {
                flex-wrap: nowrap;
                justify-content: center;
            }

            #carouselAgenda .agenda-item {
                flex: 0 0 100%;
                max-width: 100%;
                display: flex;
                justify-content: center;
            }

            #carouselAgenda .agenda-card {
                width: 92%;
                max-width: 400px;
            }
        }



        #carouselAgenda .carousel-control-prev,
        #carouselAgenda .carousel-control-next {
            width: 52px;
            height: 52px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--blue);
            border-radius: 50%;
            opacity: 1;
            box-shadow: 0 8px 22px var(--blue);
            transition: all 0.35s ease;
        }

        /* posição */
        #carouselAgenda .carousel-control-prev {
            left: 12px;
        }

        #carouselAgenda .carousel-control-next {
            right: 12px;
        }

        /* ícones */
        #carouselAgenda .carousel-control-prev-icon,
        #carouselAgenda .carousel-control-next-icon {
            filter: brightness(0) invert(1);
            width: 22px;
            height: 22px;
        }

        /* hover elegante */
        #carouselAgenda .carousel-control-prev:hover,
        #carouselAgenda .carousel-control-next:hover {
            transform: translateY(-50%) scale(1.08);
            box-shadow: 0 12px 30px var(--blue);
        }

        /* efeito de clique */
        #carouselAgenda .carousel-control-prev:active,
        #carouselAgenda .carousel-control-next:active {
            transform: translateY(-50%) scale(0.95);
        }

        /* mobile: levemente mais delicado */
        @media (max-width: 576px) {

            #carouselAgenda .carousel-control-prev,
            #carouselAgenda .carousel-control-next {
                width: 46px;
                height: 46px;
            }
        }

        @media (max-width: 768px) {

            #carouselConcluidos .carousel-item .row {
                flex-wrap: nowrap;
                justify-content: center;
            }

            #carouselConcluidos .agenda-item {
                flex: 0 0 100%;
                max-width: 100%;
                display: flex;
                justify-content: center;
            }

            #carouselConcluidos .agenda-card {
                width: 92%;
                max-width: 400px;
            }
        }



        #carouselConcluidos .carousel-control-prev,
        #carouselConcluidos .carousel-control-next {
            width: 52px;
            height: 52px;
            top: 50%;
            transform: translateY(-50%);
            background: var(--blue);
            border-radius: 50%;
            opacity: 1;
            box-shadow: 0 8px 22px var(--blue);
            transition: all 0.35s ease;
        }

        /* posição */
        #carouselConcluidos .carousel-control-prev {
            left: 12px;
        }

        #carouselConcluidos .carousel-control-next {
            right: 12px;
        }

        /* ícones */
        #carouselConcluidos .carousel-control-prev-icon,
        #carouselConcluidos .carousel-control-next-icon {
            filter: brightness(0) invert(1);
            width: 22px;
            height: 22px;
        }

        /* hover elegante */
        #carouselConcluidos .carousel-control-prev:hover,
        #carouselConcluidos .carousel-control-next:hover {
            transform: translateY(-50%) scale(1.08);
            box-shadow: 0 12px 30px var(--blue);
        }

        /* efeito de clique */
        #carouselConcluidos .carousel-control-prev:active,
        #carouselConcluidos .carousel-control-next:active {
            transform: translateY(-50%) scale(0.95);
        }

        /* mobile: levemente mais delicado */
        @media (max-width: 576px) {

            #carouselConcluidos .carousel-control-prev,
            #carouselConcluidos .carousel-control-next {
                width: 46px;
                height: 46px;
            }
        }

        .agenda-header {
            background: linear-gradient(135deg, #ffffff);
            border-radius: 26px;
            padding: 42px 28px;
            box-shadow: 0 14px 35px var(--blue);
        }

        /* Ícone superior */
        .header-icon {
            font-size: 2.6rem;
            width: 70px;
            height: 70px;
            margin: 0 auto;
            background: var(--blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px var(--blue);
        }

        .badge-agenda {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            background: linear-gradient(135deg, var(--blue), var(--cor-principal));
            color: #fff;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 999px;
        }

        /* Título */
        .agenda-header h1 {
            font-size: 1.9rem;
        }

        /* Mobile */
        @media (max-width: 576px) {
            .agenda-header {
                padding: 32px 20px;
            }

            .agenda-header h1 {
                font-size: 1.6rem;
            }
        }

        .arrow-down {
            font-size: 2.2rem;
            color: #ffffffff;
            /* tom feminino */
            display: inline-block;
            animation: arrowBounce 1.4s infinite ease-in-out;
        }

        /* Animação */
        @keyframes arrowBounce {
            0% {
                transform: translateY(0);
                opacity: 0.6;
            }

            50% {
                transform: translateY(10px);
                opacity: 1;
            }

            100% {
                transform: translateY(0);
                opacity: 0.6;
            }
        }

        .aviso-vazio {
            background: linear-gradient(135deg, #fff0f4, #ffe6ed);
            border-radius: 24px;
            padding: 40px 24px;
            max-width: 520px;
            margin-left: auto;
            margin-right: auto;

            box-shadow: 0 12px 30px rgba(255, 92, 138, 0.25);
            animation: fadeUp 0.8s ease;
        }

        .aviso-icone {
            font-size: 3rem;
            animation: pulseSoft 2.5s infinite ease-in-out;
        }

        .aviso-vazio h5 {
            color: #c2185b;
        }

        .aviso-vazio p {
            color: #8b3a62;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        /* animações suaves */
        @keyframes pulseSoft {
            0% {
                transform: scale(1);
                opacity: 0.8;
            }

            50% {
                transform: scale(1.08);
                opacity: 1;
            }

            100% {
                transform: scale(1);
                opacity: 0.8;
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===== CARROSSEL RESPONSIVO ÚNICO ===== */

        /* Desktop: 3 cards */
        @media (min-width: 768px) {
            .carousel-agenda .carousel-item .agenda-col {
                flex: 0 0 33.3333%;
                max-width: 33.3333%;
            }
        }

        /* Mobile: 1 card */
        @media (max-width: 767px) {
            .carousel-agenda .carousel-item .agenda-col {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        /* Centralização mobile */
        .carousel-agenda .agenda-card {
            margin: auto;
            max-width: 420px;
        }

        .agenda-flex {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        /* LADO ESQUERDO */
        .md1 {
            flex: 1;
        }

        /* CAIXA DE MOTIVO */
        .md2 {
            align-self: flex-end;
            background: linear-gradient(135deg, var(--cor-card));
            border-left: 4px solid var(--blue);
            border-radius: 16px;
            padding: 14px 16px;
            font-size: 0.9rem;
            color: var(--texto);
            box-shadow: 0 6px 18px var(--blue);
        }

        .md2 i {
            color: var(--texto);
            margin-right: 6px;
        }

        .md2 p {
            margin: 6px 0 0;
            line-height: 1.4;
        }

        /* MOBILE – motivo vem abaixo */
        @media (max-width: 768px) {
            .agenda-flex {
                flex-direction: column;
            }

            .md2 {
                max-width: 100%;
                margin-top: 12px;
                align-self: stretch;
            }
        }

        /* Botão voltar – feminino premium */
        .btn-voltar {
            border: 2px solid var(--cor-bg);
            color: var(--cor-bg);
            background: transparent;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 6px 18px var(--blue);
        }

        /* Hover elegante */
        .btn-voltar:hover {
            background: linear-gradient(135deg, var(--blue), var(--cor-principal));
            color: #fff;
            transform: translateY(-2px);
        }

        /* Ícone animado */
        .icon-voltar {
            font-size: 1.2rem;
            animation: arrowBack 1.6s infinite ease-in-out;
        }

        /* Pausa animação no hover */
        .btn-voltar:hover .icon-voltar {
            animation-play-state: paused;
        }

        /* Animação indicando "voltar" */
        @keyframes arrowBack {
            0% {
                transform: translateX(0);
                opacity: 0.6;
            }

            50% {
                transform: translateX(-6px);
                opacity: 1;
            }

            100% {
                transform: translateX(0);
                opacity: 0.6;
            }
        }
        </style>


    </head>
    <?php
    $cancelado = false;
    $concluido = false;
    foreach ($historico_agenda as $existe_status) {
        if ($existe_status->status == 'cancelado') {
            $cancelado = true;
            continue;
        }
        if ($existe_status->status == 'concluido') {
            $concluido = true;
            continue;
        }
    } ?>

<body>
    <?php $this->load->view('cliente/includes/menu'); ?>

    <div class="container body-offset">


        <!-- Cabeçalho -->
        <div class="agenda-header text-center mb-5 position-relative">

            <!-- BOTÃO NO TOPO DIREITO -->
            <div class="position-absolute top-0 start-0 mt-3 me-3 ms-3">
                <button class="btn btn-voltar rounded-pill px-3 py-1 d-inline-flex align-items-center gap-2"
                    onclick="window.location.href='<?= base_url('cliente/minha_agenda') ?>'">

                    <i class="bi bi-arrow-left icon-voltar"></i>
                    Voltar
                </button>

            </div>

            <!-- CONTEÚDO CENTRAL -->
            <div class="header-icon mb-3">📌</div>

            <h1 class="fw-bold cor mb-2">Histórico da Agenda</h1>

            <p class=" mb-3">
                Aqui você encontra todos os seus atendimentos concluídos,
                acompanhados com carinho e atenção em cada detalhe. 💖
            </p>

            <span class="badge badge-agenda px-4 py-2">
                <i class="bi bi-check-circle-fill me-1"></i>
                Agendas concluídas
                <i class="bi bi-arrow-down-short arrow-down"></i>
            </span>

        </div>

        <?php if ($concluido): ?>

        <div id="carouselConcluidos" class="carousel slide carousel-agenda" data-bs-ride="false">
            <div class="carousel-inner">

                <?php
                    $active = true;
                    foreach ($historico_agenda as $agenda):
                        if ($agenda->status == 'cancelado' || $agenda->status == 'pendente' || $agenda->status == 'confirmado')
                            continue;
                        $servico = $this->Servicos_model->servico($agenda->id_servico);
                        ?>

                <div class="carousel-item <?= $active ? 'active' : '' ?>">
                    <div class="row justify-content-center g-4">

                        <div class="agenda-col d-flex">
                            <div class="agenda-card w-100">
                                <img src="<?= base_url('uploads/servicos/' . ($servico->data->foto ?? 'servico.png')) ?>"
                                    class="agenda-img">

                                <div class="p-4 agenda-info">
                                    <h5 class="fw-bold "><?= $agenda->servico ?></h5>
                                    <div><i class="bi bi-calendar-heart"></i>
                                        <?= date('d/m/Y', strtotime($agenda->data)) ?></div>
                                    <div><i class="bi bi-clock"></i> <?= $agenda->hora_inicio ?> às
                                        <?= $agenda->hora_fim ?></div>
                                    <div><i class="bi bi-hourglass-split"></i> <?= $servico->data->duracao ?> min</div>
                                    <div class="price mt-2">
                                        <i class="bi bi-cash-coin"></i>
                                        R$ <?= number_format($servico->data->valor, 2, ',', '.') ?>
                                    </div>
                                    <?php if ($agenda->status == 'concluido'): ?>
                                    <span class="badge bg-primary mt-3">Concluído</span>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <?php
                        $active = false;
                    endforeach;
                    ?>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselConcluidos"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselConcluidos"
                data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>


        <?php else: ?>
        <div class="aviso-vazio text-center mt-5">
            <div class="aviso-icone mb-3">💗</div>
            <h5 class="fw-bold">Tudo certo por aqui!</h5>
            <p> Nenhuma agenda foi concluida até o momento.<br>
                Assim que houver alguma alteração, você poderá acompanhar por aqui</p>
        </div>
        <?php endif; ?>
        <div class="agenda-header text-center my-5">
            <div class="header-icon mb-3">📌</div>

            <h1 class="fw-bold cor mb-2">Histórico da Agenda</h1>

            <p class="text-muted mb-3">
                Imprevistos acontecem — aqui estão seus atendimentos cancelados, organizados com carinho para você. 🌷
            </p>

            <span class="badge badge-agenda px-4 py-2">
                <i class="bi bi-check-circle-fill me-1"></i>
                Agendas cancelados<i class="bi bi-arrow-down-short arrow-down"></i>
            </span>
        </div>
        <?php if ($cancelado): ?>

        <div id="carouselAgenda" class="carousel slide carousel-agenda" data-bs-ride="false">
            <div class="carousel-inner">

                <?php
                    $active = true;
                    foreach ($historico_agenda as $agenda):
                        if ($agenda->status == 'concluido' || $agenda->status == 'pendente' || $agenda->status == 'confirmado')
                            continue;
                        $servico = $this->Servicos_model->servico($agenda->id_servico);
                        ?>

                <div class="carousel-item <?= $active ? 'active' : '' ?>">
                    <div class="row justify-content-center g-4">

                        <div class="agenda-col d-flex">
                            <div class="agenda-card w-100">
                                <img src="<?= base_url('uploads/servicos/' . ($servico->data->foto ?? 'servico.png')) ?>"
                                    class="agenda-img">

                                <div class="p-4 agenda-info">
                                    <h5 class="fw-bold"><?= $agenda->servico ?></h5>
                                    <div><i class="bi bi-calendar-heart"></i>
                                        <?= date('d/m/Y', strtotime($agenda->data)) ?></div>
                                    <div><i class="bi bi-clock"></i> <?= $agenda->hora_inicio ?> às
                                        <?= $agenda->hora_fim ?></div>
                                    <div><i class="bi bi-hourglass-split"></i> <?= $servico->data->duracao ?> min</div>
                                    <div class="price mt-2">
                                        <i class="bi bi-cash-coin"></i>
                                        R$ <?= number_format($servico->data->valor, 2, ',', '.') ?>
                                    </div>
                                    <?php if ($agenda->status == 'cancelado'): ?>
                                    <span class="badge bg-danger mt-3">cancelado</span>
                                    <?php endif; ?>
                                    <?php if ($agenda->status == 'cancelado'):
                                                if($agenda->quem_cancelou == 'admin')
                                                {
                                                    $quem = 'Mavih';
                                                }else
                                                {
                                                    $quem = 'Você';
                                                }
                                                ?>
                                    <div class="md2 mt-3">

                                        <i class="bi bi-chat-left-heart mb-3"> <?= $quem?> cancelou</i>
                                        <strong>Motivo do cancelamento</strong>
                                        <p><?= nl2br($agenda->motivo_cancelamento) ?></p>
                                        <i class="bi">Data:</i>
                                        <strong><?=$agenda->data_hora_cancelamento?></strong>

                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <?php
                        $active = false;
                    endforeach;
                    ?>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselAgenda" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselAgenda" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
        <?php else: ?>
        <div class="aviso-vazio text-center mt-5">
            <div class="aviso-icone mb-3">💗</div>
            <h5 class="fw-bold">Tudo certo por aqui!</h5>
            <p> Nenhuma agenda foi cancelada até o momento.<br>
                Assim que houver alguma alteração, você poderá acompanhar por aqui</p>
        </div>
        <?php endif; ?>
        <!-- CAROUSEL DESKTOP -->
    </div>
    <?php $this->load->view('cliente/includes/footer') ?>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    function cancelarAgenda(id) {

        Swal.fire({
            title: "Cancelar Agendamento?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sim, cancelar",
            cancelButtonText: "Voltar"
        }).then((result) => {

            if (result.isConfirmed) {

                // Abre a caixinha para pegar o motivo
                Swal.fire({
                    title: "Motivo do cancelamento",
                    input: "textarea",
                    inputLabel: "Descreva rapidamente o motivo",
                    inputPlaceholder: "Digite aqui...",
                    inputAttributes: {
                        "aria-label": "Digite o motivo"
                    },
                    showCancelButton: true,
                    confirmButtonText: "Enviar",
                    cancelButtonText: "Cancelar",
                    preConfirm: (motivo) => {
                        if (!motivo) {
                            Swal.showValidationMessage("Você precisa informar um motivo!");
                            return false;
                        }
                        return motivo;
                    }
                }).then((resMotivo) => {

                    if (resMotivo.isConfirmed) {

                        const motivo = encodeURIComponent(resMotivo.value);
                        fetch(`<?= base_url('admin/agenda/cancelar_agenda') ?>/${id}?motivo=${motivo}`)

                            .then(r => r.json())
                            .then(response => {

                                if (response.error == "0") {

                                    Swal.fire({
                                        icon: "success",
                                        title: "Cancelado!",
                                        text: 'Se preferir remarcar, confira os horários disponíveis e escolha o melhor para você 💖'
                                    }).then(() => {
                                        location.reload();
                                    });

                                } else {

                                    Swal.fire({
                                        icon: "error",
                                        title: "Erro ao Cancelar a agenda!",
                                        text: response.msg
                                    });
                                }

                            });

                    }

                });

            }
        });
    };


    document.querySelectorAll('.carousel-agenda').forEach(carousel => {

        if (window.innerWidth < 768) return;

        const items = carousel.querySelectorAll('.carousel-item');

        // ✅ SE TIVER APENAS 1 ITEM, NÃO CLONA
        if (items.length <= 1) return;

        items.forEach(el => {
            let next = el.nextElementSibling;

            for (let i = 1; i < 3; i++) {

                if (!next) break; // 🔑 NÃO VOLTA PARA O PRIMEIRO

                const clone = next.querySelector('.agenda-col').cloneNode(true);
                el.querySelector('.row').appendChild(clone);
                next = next.nextElementSibling;
            }
        });
    });
    </script>

</body>

</html>