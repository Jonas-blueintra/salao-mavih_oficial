<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Serviço</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <?php $this->load->view('links_paginas/link_cliente_home') ?>

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
        padding: 40px 0;
        padding-top: 160px;
    }

    .service-card {
        max-width: 600px;
        border-radius: 20px;
        background: #fff;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }

    .service-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .calendar {
        background: #fff;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .calendar-header {
        font-size: 1.4rem;
        font-weight: 700;
    }

    .day {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        margin: 4px;
        font-weight: bold;
        transition: .2s;
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

    .day:hover.available {
        background: #c0ffc9;
    }

    .day.selected {
        border: 3px solid #0d6efd;
        background: #bfe0ff !important;
        color: #003c87 !important;
    }

    .horarios button {
        margin: 6px;
    }

    .horarios .active {
        background: #0d6efd !important;
        color: #fff !important;
    }

    .cal-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        /* 7 colunas sempre */
        gap: 6px;
    }

    * {
        box-sizing: border-box;
    }



    .cal-grid {
        display: grid;
        grid-template-columns: repeat(7, minmax(0, 1fr));
        gap: 4px;
        width: 100%;
    }

    .day {
        width: 100%;
        aspect-ratio: 1 / 1;
        font-size: 13px;
        border-radius: 10px;
    }

    @media (max-width: 576px) {

        .calendar {
            padding: 10px;
        }

        .calendar-header {
            font-size: 18px;
            text-align: center;
        }

        .row.fw-bold .col {
            font-size: 12px;
            padding: 0;
        }

    }

    .sem-horario-card {
        max-width: 420px;
        margin: 0 auto;
        background: linear-gradient(145deg, #1c1c1c, #111);
        border-radius: 28px;
        padding: 40px 28px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
        border: 1px solid #2a2a2a;
        color: #fff;
    }

    .sem-horario-icon {
        font-size: 3rem;
        width: 80px;
        height: 80px;
        margin: 0 auto;
        background: linear-gradient(135deg, #1e3a8a, #000);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 30px rgba(30, 58, 138, 0.6);
    }

    .badge-sem-horario {
        display: inline-block;
        background: linear-gradient(135deg, #1e3a8a, #000);
        color: #fff;
        font-weight: 600;
        border-radius: 999px;
        font-size: 0.9rem;
    }

    /* ===== FULLCALENDAR PREMIUM BARBEARIA ===== */

    #calendario {
        max-width: 860px;
        margin: 30px auto;
        background: linear-gradient(145deg, #0f0f0f, #181818);
        padding: 18px;
        border-radius: 22px;
        border: 1px solid #222;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.7);
        animation: fadeIn 0.4s ease;
        margin-bottom: 50px;

    }

    .fc-button:hover {
        background: linear-gradient(135deg, #1e3a8a, #000) !important;
        color: #fff !important;
        transform: scale(1.1);
    }

    .fc-daygrid-day {
        background: #181818;
        border: 1px solid #2a2a2a;
        transition: 0.2s;
        text-align: center;
    }

    .fc-daygrid-day:hover {
        background: #222;
    }

    .fc-daygrid-day-number {
        font-size: 1.2rem;
        color: #aaa;
        padding: 6px;
        border-radius: 50%;
        transition: 0.2s;
    }

    /* hoje */
    .fc-day-today {
        background: rgba(197, 157, 95, 0.15) !important;
        border: 1px solid #c59d5f !important;
    }

    /* selecionado (quando clicar) */
    .fc-day-selected,
    .fc-daygrid-day.fc-day-today:hover {
        background: linear-gradient(135deg, #1e3a8a, #000) !important;
    }

    /* eventos (dias disponíveis) */


    /* remove bordas feias */
    .fc-theme-standard td,
    .fc-theme-standard th {
        border-color: #2a2a2a;
    }

    /* mobile */
    @media (max-width: 576px) {
        #calendario {
            padding: 15px;
        }

        .fc-toolbar-title {
            font-size: 1.1rem;
        }
    }

    /* header */
    .fc-header-toolbar {
        margin-bottom: 10px !important;
    }

    /* título */
    .fc-toolbar-title {
        color: #c59d5f;
        font-weight: 600;
        letter-spacing: 1px;
        font-size: 2rem !important;
        font-weight: 600;
    }

    .fc-daygrid-day:hover {
        background: #1a1a1a;
        border-radius: 10px;
    }

    /* hoje */
    .fc-day-today .fc-daygrid-day-number {
        background: #c59d5f;
        color: #000;
        border-radius: 50%;
        width: 28px;
        height: 28px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    /* evento (dia disponível) */
    .fc-event {
        width: 40px;
        height: 5px;
        margin-top: 2px;
        border-radius: 10px;
        border-radius: 6px;
    }

    .fc-theme-standard td,
    .fc-theme-standard th {
        border: none !important;
    }

    .fc-button {
        background: transparent !important;
        color: #777 !important;
        font-size: 0.8rem;
        border: 1px solid #333 !important;
        border-radius: 10px !important;
        transition: 0.3s;
    }

    .fc-col-header-cell {
        color: #555;
        border: none !important;
        background: transparent;
        color: #666;
        font-size: 1.5rem;
        border: none !important;
        font-weight: 600;
        padding: 10px 0;
    }

    .fc-daygrid-day:hover .fc-daygrid-day-number {
        background: #1f1f1f;
        color: #fff;
    }

    .fc-day-selected .fc-daygrid-day-number {
        background: linear-gradient(135deg, #1e3a8a, #000);
        color: #fff;
    }

    #calendario {
        animation: fadeIn 0.4s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .horarios {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }

    /* botão horário */
    .horario-btn {
        padding: 10px 16px;
        border-radius: 12px;
        border: 1px solid #2a2a2a;

        background: linear-gradient(145deg, #1a1a1a, #0f0f0f);
        color: #ccc;

        font-weight: 600;
        font-size: 0.9rem;

        cursor: pointer;
        transition: all 0.25s ease;

        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4);
    }

    /* hover */
    .horario-btn:hover {
        transform: translateY(-2px);
        color: #fff;
        border-color: #c59d5f;
    }

    /* ativo (selecionado) */
    .horario-btn.active {
        background: linear-gradient(135deg, #c59d5f, #8b6b2e);
        color: #000;
        border: none;
        box-shadow: 0 8px 25px rgba(197, 157, 95, 0.5);
    }

    /* disponível (verde) */
    .fc-daygrid-day.has-event.disponivel .fc-daygrid-day-number {
        border: 2px solid #22c55e;
    }

    /* fechado (vermelho) */
    .fc-daygrid-day.has-event.fechado .fc-daygrid-day-number {
        border: 2px solid #ef4444;
    }

    /* ===== RESPONSIVO TABLET ===== */
    @media (max-width: 992px) {
        #calendario {
            max-width: 100%;
            padding: 15px;
        }

        .fc-toolbar-title {
            font-size: 1.4rem !important;
            text-align: center;
        }

        .fc-daygrid-day-number {
            font-size: 1rem;
        }

        .fc-col-header-cell {
            font-size: 0.9rem;
        }
    }

    /* ===== RESPONSIVO MOBILE ===== */
    @media (max-width: 576px) {

        #calendario {
            max-width: 100%;
            padding: 10px;
            border-radius: 16px;
        }

        /* deixa header mais compacto */
        .fc-header-toolbar {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .fc-toolbar-title {
            font-size: 1.1rem !important;
            text-align: center;
        }

        /* dias menores */
        .fc-daygrid-day-number {
            font-size: 0.85rem;
            padding: 4px;
        }

        /* cabeçalho dias semana */
        .fc-col-header-cell {
            font-size: 0.7rem;
            padding: 6px 0;
        }

        /* botões menores */
        .fc-button {
            font-size: 0.7rem !important;
            padding: 4px 6px !important;
        }
    }

    /* evita overflow lateral */
    .fc {
        max-width: 100%;
        overflow-x: hidden;
    }
    </style>
</head>

<body>

    <?php
    $this->load->view('cliente/includes/menu');

    $dados = $horarios_salvos->data; // seu array vindo do backend

    ?>




    <div class="container container-agenda">

        <!-- SERVIÇO -->
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="service-card mb-4 align-items-center">
                <img src="<?= base_url('/uploads/servicos/' . ($servico->data->foto ?? 'serviço.png')); ?>"
                    class="service-img">

                <div class="p-4">
                    <h2 class="fw-bold"><?= $servico->data->nome ?></h2>

                    <span class="badge bg-black text-white px-3 py-2 mb-2">
                        ⏱ <?= $servico->data->duracao ?> min
                    </span>

                    <p class="fs-4 fw-bold text-black">
                        R$ <?= number_format($servico->data->valor, 2, ',', '.'); ?>
                    </p>

                    <p class="text-muted"><?= $servico->data->descricao ?></p>
                </div>
            </div>

        </div>
        <!-- LEGENDA DO CALENDÁRIO -->
        <div class="d-flex justify-content-center mb-4  ">

            <div class="d-flex align-items-center">
                <div style="width:22px; height:22px; border-radius:6px; background:#d7ffe0; border:1px solid #8ee09a;">
                </div>
                <span class="me-2 ms-2 text-white fw-semibold">Dias disponíveis</span>
            </div>

            <div class="d-flex align-items-center">
                <div style="width:22px; height:22px; border-radius:6px; background:#ffd6d6; border:1px solid #ff9a9a;">
                </div>
                <span class="ms-2 me-2 text-white fw-semibold">Horários esgotados</span>
            </div>

            <div class="d-flex align-items-center">
                <div style="width:22px; height:22px; border-radius:6px; background:#bed9ff; border:1px solid #7fb1ff;">
                </div>
                <span class="ms-2 text-white fw-semibold">Salão fechado</span>
            </div>

        </div>

        <!-- CALENDÁRIO -->
        <?php if ($dados):?>
        <div id="calendario"></div>

        <?php else:?><div class="sem-horario-card text-center my-5">
            <div class="sem-horario-icon mb-3">🚫</div>

            <h3 class="fw-bold mb-2">Nenhum horário disponível</h3>

            <p class="mb-3">
                No momento não há horários livres para este serviço.
                Fique tranquilo, em breve novos horários serão liberados. 💈
            </p>

            <span class="badge-sem-horario px-4 py-2">
                ⏳ Aguarde ou tente novamente mais tarde
            </span>
        </div>
        <?php endif;?>
        <!-- HORÁRIOS -->
        <div class="card p-4 d-none" id="boxHorarios">
            <h4 class="fw-bold mb-3">
                <i class="bi bi-clock"></i> Horários disponíveis
                <span id="dataEscolhida" class="text-primary fw-bold"></span>
            </h4>

            <div id="listaHorarios" class="horarios"></div>
        </div>
        <!-- CONFIRMAR -->
        <button id="btnConfirmar" class="btn btn-success btn-lg w-100 rounded-pill d-none mt-4 mb-5 ">
            Confirmar Agendamento
        </button>



    </div>
    <?php $this->load->view('cliente/includes/footer') ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    const boxHorarios = document.getElementById("boxHorarios");
    const listaHorarios = document.getElementById("listaHorarios");
    const btnConfirmar = document.getElementById("btnConfirmar");

    let horarioSelecionado = null;



    // BUSCA OS HORÁRIOS NO BACKEND
    function carregarHorarios(idDia, duracao) {

        boxHorarios.classList.remove("d-none");
        listaHorarios.innerHTML = "<p>Carregando horários...</p>";

        fetch(`<?= base_url('cliente/agendar/horarios_por_dia?id_dia=') ?>${idDia}&duracao=${duracao}`)
            .then(r => r.json())
            .then(ret => {

                listaHorarios.innerHTML = "";

                if (!ret.horarios.length) {
                    listaHorarios.innerHTML = `
                    <div class="alert alert-warning">Nenhum horário disponível.</div>
                `;
                    return;
                }

                ret.horarios.forEach(h => {
                    const b = document.createElement("div");
                    b.classList.add("horario-btn");
                    b.innerText = h;

                    b.onclick = () => {
                        6
                        document.querySelectorAll("#listaHorarios button")
                            .forEach(x => x.classList.remove("active"));

                        b.classList.add("active");
                        horarioSelecionado = h;

                        btnConfirmar.classList.remove("d-none");
                    };

                    listaHorarios.appendChild(b);
                });
            });
    }


    // CONFIRMAR
    btnConfirmar.onclick = () => {
        if (!horarioSelecionado) return;

        fetch("<?= base_url('cliente/agendar/salvar') ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: new URLSearchParams({
                    dia: diaSelecionado,
                    data: dataSelecionada,
                    id_dia: idDiaSelecionado,
                    horario: horarioSelecionado,
                    id_servico: <?= $servico->data->id ?>,
                    valor: <?= $servico->data->valor ?>,
                })
            })
            .then(r => r.json())
            .then(response => {
                if (response.error == "0") {
                    Swal.fire({
                        icon: "success",
                        title: "Sucesso!",
                        text: "Aguarde, estamos te levando para sua agenda 😊"
                    }).then(() => {
                        window.location.href = "<?= base_url('cliente/minha_agenda') ?>";

                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Erro!",
                        text: response.msg
                    });
                }
            })
            .catch(err => {
                Swal.fire({
                    icon: "error",
                    title: "Erro",
                    text: "Erro ao enviar os dados."
                });
            });
    };
    document.addEventListener('DOMContentLoaded', function() {

        const calendarEl = document.getElementById('calendario');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'pt-br',

            selectable: true,
            dateClick: function(info) {

                // remove seleção antiga
                document.querySelectorAll('.fc-day-selected')
                    .forEach(el => el.classList.remove('fc-day-selected'));

                info.dayEl.classList.add('fc-day-selected');

                const dataClicada = info.dateStr;

                // acha o evento daquele dia
                const evento = calendar.getEvents().find(e => e.startStr === dataClicada);

                if (!evento) {
                    Swal.fire({
                        icon: "warning",
                        title: "Ops!",
                        text: "Este dia não possui horários disponíveis."
                    });
                    return;
                }

                const props = evento.extendedProps;
                console.log(props);
                if (props.abre === 'fechado' || props.fecha === 'fechado') {
                    Swal.fire({
                        icon: "warning",
                        title: "Fechado",
                        text: "Este dia não está disponível."
                    });
                    return;
                }
                // seta variáveis globais (igual você já usa)
                idDiaSelecionado = props.id;
                dataSelecionada = props.data;
                diaSelecionado = props.dia;

                document.getElementById("dataEscolhida").innerText =
                    " - Dia " + props.dia;

                const duracao = "<?= $servico->data->duracao ?>";

                carregarHorarios(idDiaSelecionado, duracao);
            },
            events: [
                <?php foreach ($dados as $dia): ?> {
                    title: '',
                    start: "<?= $dia->data ?>",

                    display: 'block',

                    color: "<?= ($dia->abre == 'fechado' && $dia->fecha == 'fechado')  ? '#ef4444' : '#22c55e' ?>",

                    textColor: "#fff",

                    extendedProps: {
                        id: "<?= $dia->id ?>",
                        data: "<?= $dia->data ?>",
                        dia: "<?= date('d', strtotime($dia->data)) ?>",
                        abre: "<?= $dia->abre ?>",
                        fecha: "<?= $dia->fecha ?>"
                    }
                },
                <?php endforeach; ?>
            ]
        });

        calendar.render();

        calendar.getEvents().forEach(event => {
            const date = event.startStr;
            const el = document.querySelector(`[data-date="${date}"]`);


            if (el) {
                el.classList.add('has-event');

                if (event.extendedProps.abre === 'fechado') {
                    el.classList.add('fechado');
                } else {
                    el.classList.add('disponivel');
                }
            }
        });
    });
    </script>
</body>

</html>