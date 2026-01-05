<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Serviço</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <?php $this->load->view('links_paginas/link_cliente_home') ?>

    <style>
        body {
            background: #f2f4f8;
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

    </style>
</head>

<body>

    <?php
    $this->load->view('cliente/includes/menu');

    $dados = $horarios_salvos->data; // seu array vindo do backend
    
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

        <!-- SERVIÇO -->
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="service-card mb-4 align-items-center">
                <img src="<?= base_url('/uploads/servicos/' . ($servico->data->foto ?? 'serviço.png')); ?>"
                    class="service-img">

                <div class="p-4">
                    <h2 class="fw-bold"><?= $servico->data->nome ?></h2>

                    <span class="badge bg-warning text-dark px-3 py-2 mb-2">
                        ⏱ <?= $servico->data->duracao ?> min
                    </span>

                    <p class="fs-4 fw-bold text-success">
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
                <span class="me-2 ms-2 text-muted fw-semibold">Dias disponíveis</span>
            </div>

            <div class="d-flex align-items-center">
                <div style="width:22px; height:22px; border-radius:6px; background:#ffd6d6; border:1px solid #ff9a9a;">
                </div>
                <span class="ms-2 me-2 text-muted fw-semibold">Horários esgotados</span>
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

                        <div class="p-1">
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
        <button id="btnConfirmar" class="btn btn-success btn-lg w-100 rounded-pill d-none">
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

        // CLIQUE NO DIA
        document.querySelectorAll(".day.available").forEach(btn => {
            btn.onclick = () => {

                document.querySelectorAll(".day").forEach(d => d.classList.remove("selected"));
                btn.classList.add("selected");

                idDiaSelecionado = btn.dataset.id;
                dataSelecionada = btn.dataset.data;   // "2025-03-10"
                diaSelecionado = btn.dataset.dia;     // "10"

                document.getElementById("dataEscolhida").innerText = ` - Dia ${diaSelecionado}`;

                const duracao = "<?= $servico->data->duracao ?>";

                carregarHorarios(idDiaSelecionado, duracao);
            };
        });

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
                        const b = document.createElement("button");
                        b.classList.add("btn", "btn-outline-primary", "m-1");
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
    </script>
</body>

</html>