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
            body {
                background: linear-gradient(135deg, #fde2e4, #fff1f2);
                min-height: 100vh;
            }

            .agenda-header {
                background: #ffffff;
                border-radius: 22px;
                padding: 32px;
                box-shadow: 0 8px 24px rgba(244, 180, 204, .35);
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
                border-bottom: 4px solid #f6c1d1;
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
                color: #c2185b;
            }

            .agenda-info i {
                color: #ff6f91;
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
                color: #b02a6b !important;
            }

            /* MOBILE – CONTINUA COM NO MÁX 2 */
            @media (max-width: 768px) {
                .agenda-grid {
                    grid-template-columns: repeat(2, 1fr);
                }

                .agenda-img {
                    height: 570px;
                }
            }

            @media (max-width: 480px) {
                .agenda-grid {
                    grid-template-columns: 1fr;
                }
            }

            .agenda-header {
                background: linear-gradient(135deg, #ffffff, #fff0f5);
                border-radius: 26px;
                padding: 42px 28px;
                box-shadow: 0 14px 35px rgba(244, 180, 204, 0.45);
            }

            /* Ícone superior */
            .header-icon {
                font-size: 2.6rem;
                width: 70px;
                height: 70px;
                margin: 0 auto;
                background: linear-gradient(135deg, #ff9dbf, #ff6f91);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 10px 25px rgba(255, 111, 145, 0.45);
            }

            /* Badge custom */
            .badge-agenda {
                display: inline-flex;
                /* 🔑 chave do alinhamento */
                align-items: center;
                /* centraliza vertical */
                justify-content: center;
                /* centraliza horizontal */
                gap: 6px;

                background: linear-gradient(135deg, #ff98b7ff, #ff5c8a);
                color: #fff;

                font-size: 0.95rem;
                font-weight: 600;

                border-radius: 999px;
                box-shadow: 0 8px 22px rgba(255, 92, 138, 0.35);
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

            .btn-voltar {
                border: 2px solid #ff6f91;
                color: #ff4f8b;
                background: transparent;
                font-weight: 600;
                transition: all 0.3s ease;
                box-shadow: 0 6px 18px rgba(255, 111, 145, 0.25);
            }

            /* Hover elegante */
            .btn-voltar:hover {
                background: linear-gradient(135deg, #ff9dbf, #ff6f91);
                color: #fff;
                transform: translateY(-2px);
                box-shadow: 0 10px 28px rgba(255, 111, 145, 0.45);
            }

            .icon-historico {
                font-size: 1.2rem;
                animation: arrowBack 1.6s infinite ease-in-out;
            }

            /* Pausa animação no hover */
            .btn-voltar:hover .icon-historico {
                animation-play-state: paused;
            }

            /* Animação indicando "voltar" */
            @keyframes arrowBack {
                0% {
                    transform: translateX(0);
                    opacity: 0.6;
                }

                50% {
                    transform: translateX(1px);
                    opacity: 1;
                }

                100% {
                    transform: translateX(0);
                    opacity: 0.6;
                }
            }

            /* ===== EFEITO NUVEM PISCANDO ===== */
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
            
        </style>


    </head>
    <?php
    $pendente = false;
    $confirmado = false;
    foreach ($minha_agenda as $existe_status) {
        if ($existe_status->status == 'pendente') {
            $pendente = true;
            continue;
        }
        if ($existe_status->status == 'confirmado') {
            $confirmado = true;
            continue;
        }
    } ?>

<body>
    <?php $this->load->view('cliente/includes/menu'); ?>
    <div class="container  body-offset">
        <div class="agenda-header text-center mb-5 position-relative">
            <div class="position-absolute top-0 end-0 mt-3 me-2 ms-3">
                <button class="btn btn-voltar rounded-pill px-3 py-1 d-inline-flex align-items-center gap-2"
                    onclick="window.location.href='<?= base_url('cliente/minha_agenda/historico_agenda') ?>'">
                    Histórico<i class="bi bi-clipboard2-fill icon-historico"></i>
                </button>
            </div>
            <div class="header-icon mb-3">📅</div>
            <h1 class="fw-bold cor mb-2">Minhas agendas</h1>
            <p class="text-muted mb-3">
                Neste espaço estão reunidas todas as suas agendas confirmadas e pendentes, cuidadosamente acompanhadas
                para sua tranquilidade. 💖
            </p>
            <span class="badge badge-agenda px-4 py-2">
                <i class="bi bi-check-circle-fill me-1"></i>
                Confire suas agendas 
                <i class="bi bi-arrow-down-short arrow-down"></i>
            </span>
        </div>
        <?php if ($pendente || $confirmado): ?>
            <div class="agenda-grid">

                <?php foreach ($minha_agenda as $agenda): ?>
                    <?php $servico = $this->Servicos_model->servico($agenda->id_servico);

                    if ($agenda->status == 'cancelado' || $agenda->status == 'concluido') {
                        continue;
                    }
                    ?>


                    <div class="agenda-card">

                        <img src="<?= base_url('uploads/servicos/' . ($servico->data->foto ?? 'servico.png')) ?>"
                            class="agenda-img">
                        <div class="p-4 agenda-info">
                            <div class="d-flex flex-column flex-md-row justify-content-between mb-3">

                                <!-- INFORMAÇÕES (ESQUERDA) -->
                                <div>
                                    <h5 class="fw-bold mb-1 text-danger"><?= $agenda->servico ?></h5>

                                    <div class="mb-1">
                                        <i class="bi bi-calendar-heart"></i>
                                        <strong><?= date('d/m/Y', strtotime($agenda->data)) ?></strong>
                                    </div>

                                    <div class="mb-1">
                                        <i class="bi bi-clock"></i>
                                        <strong><?= $agenda->hora_inicio ?></strong> às
                                        <strong><?= $agenda->hora_fim ?></strong>
                                    </div>

                                    <div class="mb-1">
                                        <i class="bi bi-hourglass-split"></i>
                                        Duração: <strong><?= $servico->data->duracao ?> min</strong>
                                    </div>

                                    <div class="mb-2">
                                        <i class="bi bi-cash-coin"></i>
                                        <span class="price">R$ <?= number_format($servico->data->valor, 2, ',', '.') ?></span>
                                    </div>
                                </div>

                                <!-- STATUS (DIREITA) -->
                                <div class="text-end mt-2 mt-md-0">

                                    <?php if ($agenda->status == 'pendente'): ?>
                                        <p class="badge bg-danger d-block text-wrap mb-1 aviso-nuvem">
                                            Aguardando a confirmação da Mavih <i class="bi bi-clock text-white"></i>
                                        </p>
                                        <span class="badge bg-warning">Pendente</span>
                                    <?php endif; ?>

                                    <?php if ($agenda->status == 'confirmado'): ?>
                                        <span class="badge bg-success">Confirmado</span>
                                    <?php endif; ?>

                                    <?php if ($agenda->status == 'concluido'): ?>
                                        <span class="badge bg-primary">Concluído</span>
                                    <?php endif; ?>

                                    <?php if ($agenda->status == 'cancelado'): ?>
                                        <span class="badge bg-danger">Cancelado</span>
                                    <?php endif; ?>

                                </div>

                            </div>
                            <?php if ($agenda->status != 'cancelado'):
                                if ($agenda->status != 'concluido'): ?>
                                    <button class="btn btn-outline-danger w-100 btn-cancelar"
                                        onclick="cancelarAgenda(<?= $agenda->id ?>)">
                                        <i class="bi bi-x-circle"></i> Cancelar Agendamento
                                    </button>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php else: ?>
            <div class="aviso-vazio text-center mt-5">
                <div class="aviso-icone mb-3">💗</div>
                <h5 class="fw-bold">Tudo certo por aqui!</h5>
                <p> Nenhuma agenda estar Pendente ou Confirmado até o momento.<br>
                    Assim que houver alguma alteração, você poderá acompanhar por aqui</p>
            </div>
        <?php endif; ?>
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
                            const quem = 'cliente';
                            fetch(`<?= base_url('cliente/agendar/cancelar_agenda') ?>/${id}?motivo=${motivo}&quem_cancelou=${quem}`)

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




    </script>

</body>

</html>