<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <base href="<?php echo base_url(); ?>">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Salão</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables + Bootstrap -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Ícones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <style>
        body {
            background: #f6f7fb;
            overflow-x: hidden;
        }

        #agendaTable {
            border-radius: 10px !important;
            overflow: hidden;
        }

        table.dataTable thead th {
            background: #111827;
            color: #fff !important;
            font-weight: 500;
        }

        table.dataTable tbody tr:hover {
            background-color: #f6f7fb !important;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 10px;
            padding: 6px 10px;
        }

        .dataTables_wrapper .dataTables_length select {
            border-radius: 10px;
            padding: 4px 10px;
        }

        .bell-anim {
            display: inline-block;
            animation: bellring 1.5s infinite;
            transform-origin: top center;
        }

        @keyframes bellring {
            0% {
                transform: rotate(0);
            }

            15% {
                transform: rotate(25deg);
            }

            30% {
                transform: rotate(-20deg);
            }

            45% {
                transform: rotate(15deg);
            }

            60% {
                transform: rotate(-10deg);
            }

            75% {
                transform: rotate(5deg);
            }

            100% {
                transform: rotate(0);
            }
        }

        .pulse-anim {
            animation: pulse 1.2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .close-noti:hover {
            background-color: #160c0cff;
            border-radius: 50%;
        }




        /* MENU LATERAL */
        #sidebar {
            width: 260px;
            height: 100vh;
            background: #111827;
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px 0;
            transition: 0.3s;
            z-index: 9999;
        }

        #sidebar a {
            display: block;
            padding: 14px 25px;
            color: #e5e7eb;
            font-size: 15px;
            text-decoration: none;
            transition: 0.3s;
        }

        #sidebar a:hover {
            background: #1f2937;
            padding-left: 35px;
        }

        #sidebar h4 {
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
        }

        /* CONTEÚDO */
        #content {
            margin-left: 260px;
            padding: 30px;
            transition: 0.3s;
        }

        /* CARDS */
        .card-dashboard {
            border: none;
            border-radius: 15px;
            padding: 25px;
            color: #fff;
            transition: 0.3s;
        }

        .card-dashboard:hover {
            transform: translateY(-5px);
        }

        .bg1 {
            background: linear-gradient(135deg, #6366f1, #818cf8);
        }

        .bg2 {
            background: linear-gradient(135deg, #ec4899, #f472b6);
        }

        .bg3 {
            background: linear-gradient(135deg, #10b981, #34d399);
        }

        .bg4 {
            background: linear-gradient(135deg, #f97316, #fb923c);
        }

        .bg5 {
            background: linear-gradient(135deg, #0ea5e9, #38bdf8);
        }

        .bg6 {
            background: linear-gradient(135deg, #8b5cf6, #c4b5fd);
        }


        /* ANIMAÇÃO */
        .fade-in {
            animation: fadeIn 0.6s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* MENU MOBILE */
        #mobile-menu {
            display: none;
            background: #111827;
            padding: 10px 15px;
            z-index: 99999;
            /* Opcional mas recomendado */
            position: relative;
        }

        #mobile-menu button {
            background: none;
            border: none;
            color: #fff;
            font-size: 26px;
        }

        @media(max-width: 768px) {
            #sidebar {
                left: -260px;
            }

            #sidebar.active {
                left: 0;
            }

            #content {
                margin-left: 0;
            }

            #mobile-menu {
                display: block;
            }
        }

        .dataTables_length select {
            appearance: none !important;
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            padding-right: 25px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-down-fill' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592c.86 0 1.319 1.013.753 1.658l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right .15rem center;
        }

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

        .select-wrapper {
            position: relative;
        }

        .select-wrapper::after {
            content: ">";
            font-size: 18px;
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%) rotate(0deg);
            /* vira para baixo */
            pointer-events: none;
            transition: 0.25s ease;
        }

        /* Quando o select recebe foco → seta vira para cima */
        .select-wrapper:focus-within::after {
            transform: translateY(-50%) rotate(90deg);
        }
    </style>


</head>

<body>

    <!-- MENU MOBILE -->
    <div id="mobile-menu">
        <button id="openMenu"><i class="bi bi-list"></i></button>
    </div>

    <!-- MENU LATERAL -->
    <?php $this->load->view('admin/includes/menu'); ?>


    <!-- CONTEÚDO -->
    <div id="content">

        <div id="mainPage" class="fade-in">
            <h2 class="mb-4">Bem-vindo, Administrador!</h2>

            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card-dashboard bg1 fade-in">
                        <h4>Dashboard</h4>
                        <p>Gerencie serviços, profissionais, horários e resultados do seu salão.</p>
                        <button class="btn btn-light btn-sm" onclick="loadPage('dashboard')">Dashboard</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-dashboard bg2 fade-in">
                        <h4>servicos</h4>
                        <p>Gerencie serviços, profissionais, horários e resultados do seu salão.</p>
                        <button class="btn btn-light btn-sm" onclick="loadPage('servicos')">Ver
                            servicos</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-dashboard bg3 fade-in">
                        <h4>Agenda</h4>
                        <p>Confirme e visualize horários marcados..</p>
                        <button class="btn btn-light btn-sm" onclick="loadPage('agenda')">Ver Agendas</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-dashboard bg4 fade-in">
                        <h4>Clientes</h4>
                        <p>Histórico, cadastro e preferências.</p>
                        <button class="btn btn-light btn-sm" onclick="loadPage('clientes')">Ver clientes</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-dashboard bg5 fade-in">
                        <h4>Equipe</h4>
                        <p>Gerencie sua equipe e acompanhe o desempenho de cada profissional.</p>
                        <button class="btn btn-light btn-sm" onclick="loadPage('equipe')">Ver Equipe</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-dashboard bg6 fade-in">
                        <h4>Configuração</h4>
                        <p>Configure tudo do seu sistema em um só lugar.</p>
                        <button class="btn btn-light btn-sm" onclick="loadPage('configuracao')">Configuração</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- DataTables Responsive -->
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script>



        const sidebar = document.getElementById("sidebar");
        const openMenu = document.getElementById("openMenu");

        openMenu.addEventListener("click", () => {
            sidebar.classList.toggle("active");
        });

        // FECHAR AO CLICAR EM QUALQUER ITEM DO MENU
        sidebar.querySelectorAll("a").forEach(link => {
            link.addEventListener("click", () => {
                sidebar.classList.remove("active");
            });
        });


        document.addEventListener("click", (e) => {
            if (!sidebar.contains(e.target) && !openMenu.contains(e.target)) {
                sidebar.classList.remove("active");
            }
        });

        console.log("link_servico_js carregado!");
        //         function loadPage(page) {
        //     fetch("<?= base_url('admin/home/page/'); ?>" + page)
        //     .then(response => response.text())
        //     .then(data => {

        //         document.getElementById("content").innerHTML = `
        //             <div id="mainPage" class="fade-in">${data}</div>
        //         `;

        //         // 🔥 se a página carregada tiver o formulário de serviço, ativamos o AJAX
        //         if (typeof initFormServico === "function") {
        //             initFormServico();
        //         }
        //         if(typeof initFormServicosalvar === "function")
        //         {
        //             initFormServicosalvar();
        //         }
        //     })
        //     .catch(err => console.error("Erro ao carregar página:", err));
        // }
        function initPageServicos() {
            console.log("Página Serviços carregada!");

            if ($('#servicosTable').length) {
                $('#servicosTable').DataTable({
                    responsive: true,
                    paging: true,
                    searching: true,
                    info: true,
                    columnDefs: [
                        { targets: 0, visible: false }, // Esconde a coluna ID
                        { targets: 1, orderable: true }, // Seta nesta coluna
                    ],
                    order: [[0, 'desc']], //
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                    },
                    layout: {
                        topStart: 'search',
                        topEnd: 'pageLength',
                        bottomStart: 'info',
                        bottomEnd: 'paging'
                    }
                });
            }
        }



        function initPageDashboard() {

            const selectMes = document.getElementById('mesFaturamento');
            const faturamentoEl = document.getElementById('faturamentoMes');

            if (!selectMes || !faturamentoEl) {
                console.warn('Dashboard ainda não disponível');
                return;
            }

            function carregarFaturamento(mes) {
                fetch(`${BASE_URL}admin/home/faturamento_total/${mes}`)
                    .then(r => r.json())
                    .then(resp => {
                        faturamentoEl.innerText =
                            'R$ ' + Number(resp.total || 0).toLocaleString('pt-BR', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                    })
                    .catch(err => {
                        console.error(err);
                        faturamentoEl.innerText = 'R$ 0,00';
                    });
            }

            selectMes.addEventListener('change', () => {
                carregarFaturamento(selectMes.value);
            });

            // carrega mês inicial
            carregarFaturamento(selectMes.value);
            if ($('#dashboardTable').length) {
                $('#dashboardTable').DataTable({
                    responsive: true,
                    paging: true,
                    searching: true,
                    info: true,
                    order: [], // Ordena pelo ID (coluna oculta)
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                    },
                    layout: {
                        topStart: 'search',
                        topEnd: 'pageLength',
                        bottomStart: 'info',
                        bottomEnd: 'paging'
                    }
                });
            }
        }
        // }
        function initPageAgenda() {
            if ($('#agendaTable').length) {
                $('#agendaTable').DataTable({
                    responsive: true,
                    paging: true,
                    searching: true,
                    info: true,
                    columnDefs: [
                        { targets: 0, visible: false }, // Esconde a coluna ID
                        { targets: 1, orderable: true }, // Seta nesta coluna
                    ],
                    order: [[0, 'desc']], // Ordena pelo ID (coluna oculta)
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                    },
                    layout: {
                        topStart: 'search',
                        topEnd: 'pageLength',
                        bottomStart: 'info',
                        bottomEnd: 'paging'
                    }
                });
            }
        }
        function initPageClientes() {
            console.log("Página Serviços carregada!");

            if ($('#clientesTable').length) {
                $('#clientesTable').DataTable({
                    responsive: true,
                    paging: true,
                    searching: true,
                    info: true,
                    columnDefs: [
                        { targets: 0, visible: false }, // Esconde a coluna ID
                        { targets: 1, orderable: true }, // Seta nesta coluna
                    ],
                    order: [[0, 'desc']], //
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                    },
                    layout: {
                        topStart: 'search',
                        topEnd: 'pageLength',
                        bottomStart: 'info',
                        bottomEnd: 'paging'
                    }
                });
            }
        }
        function initPageConfiguracao() {
            const inputLogo = document.getElementById("logo");
            const preview = document.getElementById("previewLogo");
            const icon = document.getElementById("uploadIcon");
            const text = document.getElementById("uploadText");

            inputLogo.addEventListener("change", () => {
                const file = inputLogo.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                    preview.classList.remove("d-none");
                    icon.style.display = "none";
                    text.style.display = "none";
                };
                reader.readAsDataURL(file);
            });




            $('#configuracaoTable').DataTable({
                responsive: true,
                paging: true,
                searching: true,
                info: true,
                order: [],
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                }
            });

            const form = document.getElementById("formSalao");

            form.addEventListener("submit", function (e) {
                e.preventDefault(); // 🔴 impede reload

                const formData = new FormData(this);

                fetch(this.action, {
                    method: "POST",
                    body: formData
                })
                    .then(res => res.json())
                    .then(data => {

                        if (data.error === "0") {
                            Swal.fire({
                                icon: "success",
                                title: "Sucesso!",
                                text: data.msg,
                                showConfirmButton: true,
                            }).then(() => {
                                loadPage('configuracao');
                            });
                        }
                        else {
                            Swal.fire({
                                icon: "warning",
                                title: "Ops!",
                                text: data.msg
                            });
                        }

                    })
                    .catch(() => {
                        Swal.fire({
                            icon: "error",
                            title: "Erro",
                            text: "Erro inesperado ao salvar."
                        });
                    });
            });


        }

        function initPageHistorico_agenda() {
            console.log("Página Serviços carregada!");

            if ($('#historicoTable').length) {
                $('#historicoTable').DataTable({
                    responsive: true,
                    paging: true,
                    searching: true,
                    info: true,
                    columnDefs: [
                        { targets: 0, visible: false }, // Esconde a coluna ID
                        { targets: 1, orderable: true }, // Seta nesta coluna
                    ],
                    order: [[1, 'desc']], //
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                    },
                    layout: {
                        topStart: 'search',
                        topEnd: 'pageLength',
                        bottomStart: 'info',
                        bottomEnd: 'paging'
                    }
                });
            }
        }
        function loadPageDashboard(page, tipoNotificacao = null) {

            fetch("<?= base_url('admin/home/page/'); ?>" + page)
                .then(response => response.text())
                .then(data => {

                    document.getElementById("content").innerHTML = `
            <div id="mainPage" class="fade-in">${data}</div>
        `;

                    // funções da página
                    if (typeof window["initPage" + page.charAt(0).toUpperCase() + page.slice(1)] === "function") {
                        window["initPage" + page.charAt(0).toUpperCase() + page.slice(1)]();
                    }

                    if (typeof initFormServico === "function") initFormServico();
                    if (typeof initFormServicosalvar === "function") initFormServicosalvar();
                    if (typeof initFormServicosalvar === "function") initPageDashboard();



                    // ---- CHAMADA DEPOIS ----
                    if (tipoNotificacao !== null) {
                        fetch("<?= base_url('admin/notificacao/exluir_notificacao/'); ?>" + tipoNotificacao)
                            .then(response => response.json())
                            .then(data => console.log("Notificação excluída:", data))
                            .catch(error => console.error("Erro:", error));
                    }

                })
                .catch(err => console.error("Erro ao carregar página:", err));
        }

        function loadPage(page) {
            fetch("<?= base_url('admin/home/page/'); ?>" + page)
                .then(response => response.text())
                .then(data => {

                    document.getElementById("content").innerHTML = `
                <div id="mainPage" class="fade-in">${data}</div>
            `;

                    // 🔥 init automático por nome da página
                    const initFn = "initPage" + page.charAt(0).toUpperCase() + page.slice(1);
                    if (typeof window[initFn] === "function") {
                        window[initFn]();
                    }

                    // 🔥 INIT DOS FORMULÁRIOS
                    if (typeof initFormServico === "function") initFormServico();
                    if (typeof initFormPromocao === "function") initFormPromocao();
                    if (typeof initFormServicosalvar === "function") initFormServicosalvar();

                    if (typeof initPageAgendaCliente === "function") initPageAgendaCliente();
                })
                .catch(err => console.error("Erro ao carregar página:", err));
        }




    </script>
    <script>
        function confirmarAgenda(id) {

            Swal.fire({
                title: "Confirmar Agendamento?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Sim",
                cancelButtonText: "Cancelar"
            }).then((result) => {

                if (result.isConfirmed) {

                    fetch(`admin/agenda/confirmar_agenda/${id}`)
                        .then(res => res.json())
                        .then(response => {

                            console.log(response);

                            if (response.error == "0") {

                                Swal.fire({
                                    icon: "success",
                                    title: "Agendado!",
                                    text: response.msg,
                                }).then(() => {
                                    loadPage("agenda"); // recarrega lista
                                });

                            } else {

                                Swal.fire({
                                    icon: "error",
                                    title: "Erro!",
                                    text: response.msg
                                });
                            }
                        });
                }
            });
        };
        function concluirAgenda(id) {

            Swal.fire({
                title: "Concluir agendamento?",
                icon: "question",
                text: "Não podera Desmarcar essa Opção",
                showCancelButton: true,
                confirmButtonText: "Sim",
                cancelButtonText: "Cancelar"
            }).then((result) => {

                if (result.isConfirmed) {

                    fetch(`admin/agenda/concluir_agenda/${id}`)
                        .then(res => res.json())
                        .then(response => {

                            console.log(response);

                            if (response.error == "0") {

                                Swal.fire({
                                    icon: "success",
                                    title: "Agendado!",
                                    text: response.msg,
                                }).then(() => {
                                    loadPage("agenda"); // recarrega lista
                                });

                            } else {

                                Swal.fire({
                                    icon: "error",
                                    title: "Erro!",
                                    text: response.msg
                                });
                            }
                        });
                }
            });
        };
        function excluirServico(id, nome) {

            Swal.fire({
                title: "Tem certeza? de excluir" + " (" + nome + ")",
                text: "Você não poderá desfazer essa ação!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sim, excluir!",
                cancelButtonText: "Cancelar"
            }).then((result) => {

                if (result.isConfirmed) {

                    fetch(`admin/servicos/excluir/${id}`)
                        .then(res => res.json())
                        .then(response => {
                            console.log(response);
                            if (response.error == "0") {

                                Swal.fire({
                                    icon: "success",
                                    title: "Excluído!",
                                    text: response.msg,
                                }).then(() => {
                                    loadPage("servicos"); // recarrega lista
                                });

                            } else {

                                Swal.fire({
                                    icon: "error",
                                    title: "Erro!",
                                    text: response.msg
                                });
                            }
                        });
                }
            });
        };
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

                            const quem = 'admin';
                            fetch(`<?= base_url('admin/agenda/cancelar_agenda') ?>/${id}?motivo=${motivo}&quem_cancelou=${quem}`)
                                .then(r => r.json())
                                .then(response => {

                                    if (response.error == "0") {

                                        Swal.fire({
                                            icon: "success",
                                            title: "Cancelado!",
                                            text: response.msg
                                        }).then(() => {
                                            loadPage("agenda");
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

        document.addEventListener("DOMContentLoaded", () => {

            function initFormPromocao() {

                const form = document.getElementById("formAddServicopromocao");
                if (!form) return;

                const btn = form.querySelector(".btn-servico");
                const spinner = form.querySelector(".btn-spinner");
                const btnText = form.querySelector(".btn-text");

                form.onsubmit = (e) => {
                    e.preventDefault();

                    btn.disabled = true;
                    btnText.classList.add("d-none");
                    spinner.classList.remove("d-none");

                    let formData = new FormData(form);

                    fetch(form.action, {
                        method: "POST",
                        body: formData
                    })
                        .then(res => res.json())
                        .then(response => {

                            btn.disabled = false;
                            btnText.classList.remove("d-none");
                            spinner.classList.add("d-none");

                            if (response.error === "0") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Sucesso!",
                                    text: response.msg
                                }).then(() => {
                                    loadPage("servicos");
                                });
                            } else {
                                Swal.fire("Erro!", response.msg, "error");
                            }
                        })
                        .catch(() => {
                            btn.disabled = false;
                            btnText.classList.remove("d-none");
                            spinner.classList.add("d-none");

                            Swal.fire("Erro", "Erro ao enviar os dados.", "error");
                        });
                };
            }

            // 🔥 TORNA GLOBAL
            window.initFormPromocao = initFormPromocao;

        });



        document.addEventListener("DOMContentLoaded", () => {
            $(document).on("submit", "#formCadastro", function (e) {
                e.preventDefault();

                const form = $(this);
                const btn = form.find(".btn-cadastrar");
                const btnText = form.find(".btn-text");
                const btnSpinner = form.find(".btn-spinner");

                let formData = new FormData(this);

                $.ajax({
                    url: form.attr("action"),
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: "json",

                    beforeSend: function () {
                        btn.prop("disabled", true);
                        btnText.addClass("d-none");
                        btnSpinner.removeClass("d-none");
                    },

                    success: function (json) {
                        console.log(json);

                        if (!json || typeof json.error === "undefined") {
                            Swal.fire("Erro", "Resposta inválida do servidor.", "error");
                            return;
                        }

                        const isOk = json.error === "0";

                        Swal.fire({
                            icon: isOk ? "success" : "error",
                            title: isOk ? "Sucesso" : "Erro",
                            text: json.msg
                        }).then(() => {
                            if (isOk && json.redirencionar_pagina) {
                                loadPage(json.redirencionar_pagina);
                            }
                        });
                    },

                    complete: function () {
                        btn.prop("disabled", false);
                        btnSpinner.addClass("d-none");
                        btnText.removeClass("d-none");
                    }
                });
            });

            console.log("JS Global carregado...");
            // Função que inicializa o AJAX para o formulário de serviço
            function initFormServico() {

                const form = document.getElementById("formAddServico");
                if (!form) return; // se não está na página, ignora

                const btn = form.querySelector(".btn-servico");
                const spinner = form.querySelector(".btn-spinner");
                const btnText = form.querySelector(".btn-text");

                form.onsubmit = (e) => {
                    e.preventDefault();

                    btn.disabled = true;
                    btnText.classList.add("d-none");
                    spinner.classList.remove("d-none");

                    let formData = new FormData(form);

                    fetch(form.action, {
                        method: "POST",
                        body: formData
                    })
                        .then(res => res.json())
                        .then(response => {

                            btn.disabled = false;
                            btnText.classList.remove("d-none");
                            spinner.classList.add("d-none");

                            if (response.error === "0") {

                                Swal.fire({
                                    icon: "success",
                                    title: "Sucesso!",
                                    text: response.msg
                                }).then(() => {
                                    loadPage("servicos"); // volta para lista
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
                            btn.disabled = false;
                            btnText.classList.remove("d-none");
                            spinner.classList.add("d-none");

                            Swal.fire({
                                icon: "error",
                                title: "Erro",
                                text: "Erro ao enviar os dados."
                            });
                        });
                };
            }

            // OBS: quando loadPage carregar HTML novo, precisamos ativar o JS de novo
            window.initFormServico = initFormServico;

        });
        document.addEventListener("click", function (e) {

            // --- Abrir zoom ---
            if (e.target.classList.contains("zoom-image")) {
                const overlay = document.getElementById("zoomOverlay");
                const full = document.getElementById("zoomFullImg");

                full.src = e.target.dataset.full || e.target.src;
                overlay.style.display = "flex";

                e.preventDefault();
                e.stopPropagation();
                return;
            }

            // --- Fechar zoom ---
            if (e.target.id === "zoomOverlay" || e.target.id === "zoomFullImg") {
                document.getElementById("zoomOverlay").style.display = "none";
            }
        });

        document.addEventListener("DOMContentLoaded", () => {

            // Função que inicializa o AJAX para o formulário de serviço
            function initFormServicosalvar() {

                const form = document.getElementById("editarServico");
                if (!form) return; // se não está na página, ignora


                const btn = form.querySelector(".btn-salvar-servico");
                const spinner = form.querySelector(".btn-spinner-salvar");
                const btnText = form.querySelector(".btn-text-salvar");

                form.onsubmit = (e) => {
                    e.preventDefault();

                    btn.disabled = true;
                    btnText.classList.add("d-none");
                    spinner.classList.remove("d-none");

                    let formData = new FormData(form);

                    fetch(form.action, {
                        method: "POST",
                        body: formData
                    })
                        .then(res => res.json())
                        .then(response => {

                            btn.disabled = false;
                            btnText.classList.remove("d-none");
                            spinner.classList.add("d-none");

                            if (response.error === "0") {

                                Swal.fire({
                                    icon: "success",
                                    title: "Sucesso!",
                                    text: response.msg
                                }).then(() => {
                                    loadPage("servicos"); // volta para lista
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
                            btn.disabled = false;
                            btnText.classList.remove("d-none");
                            spinner.classList.add("d-none");

                            Swal.fire({
                                icon: "error",
                                title: "Erro",
                                text: "Erro ao enviar os dados."
                            });
                        });
                };
            }

            // OBS: quando loadPage carregar HTML novo, precisamos ativar o JS de novo
            window.initFormServicosalvar = initFormServicosalvar;





        });
        function fecharNotificacao(event, elemento, tipo) {
            event.stopPropagation();

            // Remove visualmente
            elemento.closest('li').remove();

            // Chama o controller sem recarregar a página
            fetch(base_url + "admin/notificacao/exluir_notificacao/" + tipo)
                .then(response => response.json())
                .then(data => {
                    console.log("Notificação marcada como vista");
                })
                .catch(error => console.error("Erro:", error));
        }

    </script>
    <script>
        const base_url = "<?= base_url(); ?>";
    </script>

    </script>
    </script>
    <!-- Bootstrap JS -->

    <script>

       function RemoverHorarioEspecial(id) {

    fetch("<?= base_url('admin/configuracao/remover_horario_especial'); ?>", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ id }),
    })
    .then(response => response.json())
    .then(res => {

        if (Number(res.error) === 0) {
            Swal.fire("Sucesso!", res.msg, "success");
            loadPage("configuracao");
        } else {
            Swal.fire("Erro!", res.msg || "Erro inesperado", "error");
        }

    })
    .catch(err => {
        console.error(err);
        Swal.fire("Erro!", "Falha de comunicação.", "error");
    });
}



        function salvarHorarioEspecial() {

    let data = document.getElementById("data_especial").value;
    let status = document.getElementById("status_especial").value;

    if (!data) {
        Swal.fire("Atenção", "Selecione uma data!", "warning");
        return;
    }

    if (!status) {
        Swal.fire("Atenção", "Selecione o status!", "warning");
        return;
    }

    fetch("<?= base_url('admin/configuracao/salvar_horario_especial'); ?>", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ data, status }),
    })
    .then(response => response.json())
    .then(res => {

        if (Number(res.error) === 0) {
            Swal.fire("Sucesso!", res.msg, "success");

            document.getElementById("data_especial").value = "";

            const horario = document.getElementById("horario_especial");
            if (horario) horario.value = "";

            loadPage("configuracao");
        } else {
            Swal.fire("Erro!", res.msg || "Erro inesperado", "error");
        }

    })
    .catch(err => {
        console.error("Erro fetch:", err);
        Swal.fire("Erro!", "Falha de comunicação.", "error");
    });
}

        let diasAplicados = [];

        /* ==================== Carregar dias do mês ==================== */
        /* ================= CARREGAR DIAS ================= */
        function carregarDias() {
            let mes = document.getElementById("mesSelecionado").value;
            let container = document.getElementById("diasContainer");
            container.innerHTML = "";

            if (!mes) return;

            let [ano, mesNum] = mes.split("-");
            let totalDias = new Date(ano, mesNum, 0).getDate();

            for (let dia = 1; dia <= totalDias; dia++) {
                let div = document.createElement("div");
                div.className = "col-2";

                div.innerHTML = `
            <div class="day-box" onclick="toggleDia(this)" data-dia="${dia}">
                ${dia}
            </div>
        `;
                container.appendChild(div);
            }
        }

        /* ================= SELECIONAR/DESMARCAR DIA ================= */
        function toggleDia(el) {
            el.classList.toggle("selected");
        }

        /* ============== ENVIAR PARA O CONTROLLER ================= */
        function enviarDiasParaController() {

            let mesSelected = document.getElementById("mesSelecionado").value;
            let horaAbre = document.getElementById("hora_abre").value;
            let horaFecha = document.getElementById("hora_fecha").value;

            if (!mesSelected) {
                alert("Selecione um mês!");
                return;
            }

            if (!horaAbre || !horaFecha) {
                alert("Informe horário de abertura e fechamento.");
                return;
            }

            let selecionados = [...document.querySelectorAll(".day-box.selected")];

            if (selecionados.length === 0) {
                alert("Nenhum dia selecionado!");
                return;
            }

            // monta array final
            let diasParaEnviar = selecionados.map(el => {
                let dia = el.getAttribute("data-dia");
                return {
                    data: `${mesSelected}-${String(dia).padStart(2, '0')}`,
                    abre: horaAbre,
                    fecha: horaFecha
                };
            });

            console.log("ENVIANDO AO CONTROLLER:", diasParaEnviar);

            $.ajax({
                url: "<?= base_url('admin/configuracao/salvar_dias') ?>",
                type: "POST",
                data: { dias: JSON.stringify(diasParaEnviar) },
                dataType: "json",
                success: function (response) {

                    if (response.error === "0") {
                        Swal.fire({
                            icon: "success",
                            title: "Sucesso!",
                            text: response.msg,
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            loadPage("configuracao");
                        });

                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Erro!",
                            text: response.msg
                        });
                    }
                },

                error: function () {
                    Swal.fire({
                        icon: "error",
                        title: "Erro inesperado",
                        text: "Não foi possível processar a requisição."
                    });
                }
            });

        }



        window.BASE_URL = "<?= base_url() ?>";


        function initPageAgendaCliente() {

            let servicoSelecionado = null;
            let duracaoSelecionada = null;
            let valorServico = null;

            let idDiaSelecionado = null;
            let dataSelecionada = null;
            let diaSelecionado = null;

            let horarioSelecionado = null;

            const boxHorarios = document.getElementById("boxHorarios");
            const listaHorarios = document.getElementById("listaHorarios");
            const btnConfirmar = document.getElementById("btnConfirmar");

            if (!boxHorarios) {
                console.log("Agenda não está na tela");
                return;
            }

            /* SERVIÇO */
            document.querySelectorAll(".servico-radio").forEach(radio => {
                radio.addEventListener("change", () => {
                    servicoSelecionado = radio.value;
                    duracaoSelecionada = radio.dataset.duracao;
                    valorServico = radio.dataset.valor;

                    document.querySelectorAll(".day").forEach(d => d.classList.remove("selected"));
                    boxHorarios.classList.add("d-none");
                    btnConfirmar.classList.add("d-none");
                    horarioSelecionado = null;

                    console.log("Serviço OK:", servicoSelecionado, duracaoSelecionada);
                });
            });

            /* DIA */
            document.querySelectorAll(".day.available").forEach(btn => {
                btn.addEventListener("click", () => {

                    if (!duracaoSelecionada) {
                        Swal.fire("Atenção", "Selecione um serviço primeiro", "warning");
                        return;
                    }

                    document.querySelectorAll(".day").forEach(d => d.classList.remove("selected"));
                    btn.classList.add("selected");

                    idDiaSelecionado = btn.dataset.id;
                    dataSelecionada = btn.dataset.data;
                    diaSelecionado = btn.dataset.dia;

                    document.getElementById("dataEscolhida").innerText =
                        ` - Dia ${diaSelecionado}`;

                    carregarHorarios(idDiaSelecionado, duracaoSelecionada);
                });
            });

            /* HORÁRIOS */
            function carregarHorarios(idDia, duracao) {

                boxHorarios.classList.remove("d-none");
                listaHorarios.innerHTML = "<p>Carregando horários...</p>";

                const url = `<?= base_url('cliente/agendar/horarios_por_dia') ?>?id_dia=${idDia}&duracao=${duracao}`;
                console.log("FETCH URL:", url);

                fetch(url)

                    .then(r => r.json())
                    .then(ret => {

                        listaHorarios.innerHTML = "";

                        if (!ret.horarios || !ret.horarios.length) {
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
                                document.querySelectorAll("#listaHorarios button")
                                    .forEach(x => x.classList.remove("active"));

                                b.classList.add("active");
                                horarioSelecionado = h;
                                btnConfirmar.classList.remove("d-none");
                            };

                            listaHorarios.appendChild(b);
                        });
                    })
                    .catch(err => console.error("Erro fetch:", err));
            }

            /* CONFIRMAR */
            btnConfirmar.onclick = () => {

                // 🔒 valida horário
                if (!horarioSelecionado) {
                    Swal.fire("Atenção", "Selecione um horário.", "warning");
                    return;
                }

                // 🔒 valida serviço
                if (!servicoSelecionado) {
                    Swal.fire("Atenção", "Selecione um serviço.", "warning");
                    return;
                }

                // 🔒 valida nome e telefone
                const nome = document.getElementById("nomeCliente").value.trim();
                const telefone = document.getElementById("telefoneCliente").value.trim();

                if (!nome || !telefone) {
                    Swal.fire(
                        "Campos obrigatórios",
                        "Informe o nome e o telefone do cliente.",
                        "warning"
                    );
                    return;
                }

                // 🔄 loading visual
                btnConfirmar.disabled = true;
                btnConfirmar.innerText = "Salvando...";

                fetch(`${window.BASE_URL}admin/agenda/salvar_como_admin`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: new URLSearchParams({
                        nome: nome,
                        telefone: telefone,
                        id_servico: servicoSelecionado,
                        valor: valorServico,
                        id_dia: idDiaSelecionado,
                        data: dataSelecionada,
                        dia: diaSelecionado,
                        horario: horarioSelecionado
                    })
                })
                    .then(r => r.json())
                    .then(resp => {
                        console.log(resp);

                        if (resp.error === "0") {
                            Swal.fire({
                                icon: "success",
                                title: "Sucesso!",
                                text: resp.msg,
                                timer: 4000,
                                showConfirmButton: false
                            }).then(() => {
                                loadPage("nova_agenda");
                            });

                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Erro!",
                                text: resp.msg
                            });
                        }
                    })
                    .catch(err => {
                        console.error("Fetch error:", err);
                        Swal.fire({
                            icon: "error",
                            title: "Erro inesperado",
                            text: "Não foi possível processar a requisição."
                        });
                    });


            };

        }


        function initPageEquipe() {
            console.log("Página Serviços carregada!");

            if ($('#equipeTable').length) {
                $('#equipeTable').DataTable({
                    responsive: true,
                    paging: true,
                    searching: true,
                    info: true,

                    order: [[0, 'desc']], //
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                    },
                    layout: {
                        topStart: 'search',
                        topEnd: 'pageLength',
                        bottomStart: 'info',
                        bottomEnd: 'paging'
                    }
                });
            }

            document.getElementById('foto_equipe').addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (!file) return;

                const preview = document.getElementById('previewFoto');
                const conteudo = document.getElementById('uploadConteudo');

                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
                conteudo.style.display = 'none';
            });

            // salvar
            const form = document.getElementById("formequipe");
            if (!form) return;

            const btnSubmit = form.querySelector('button[type="submit"]');

            form.addEventListener("submit", function (e) {
                e.preventDefault();

                botaoSalvando(btnSubmit);

                const formData = new FormData(form);

                const url = modoEdicao
                    ? "<?= base_url('admin/equipe/update') ?>"
                    : "<?= base_url('admin/equipe/salvar') ?>";

                fetch(url, {
                    method: "POST",
                    body: formData
                })
                    .then(r => r.json())
                    .then(resp => {
                        if (resp.error == 0) {
                            Swal.fire({
                                icon: "success",
                                title: "Sucesso!",
                                text: resp.msg
                            }).then(() => {
                                loadPage("equipe");
                            });

                            resetFormEquipe();
                        } else {
                            Swal.fire("Erro", resp.msg, "error");
                        }
                    })
                    .catch(() => {
                        Swal.fire("Erro", "Falha ao enviar formulário", "error");
                    })
                    .finally(() => {
                        botaoNormal(btnSubmit);
                    });
            });

        }

        // update
        function resetFormEquipe() {
            const form = document.getElementById("formequipe");

            form.reset();

            document.getElementById("previewFoto").style.display = "none";
            document.getElementById("uploadConteudo").style.display = "block";

            const id = document.getElementById("id_integrante");
            if (id) id.remove();

            document.getElementById("btnAtualizar").classList.add("d-none");
            document.getElementById("btnSalvar").classList.remove("d-none");
        }

        function podeEnviar() {
            const form = document.getElementById("formequipe");

            if (!form.checkValidity()) {
                Swal.fire(
                    "Atenção",
                    "Preencha todos os campos obrigatórios",
                    "warning"
                );
                return false;
            }
            return true;
        }


        function salvarIntegrante() {
            if (!podeEnviar()) return;
            botaoCarregando("btnSalvar", "Salvando...");
            const form = document.getElementById("formequipe");
            const formData = new FormData(form);

            fetch("<?= base_url('admin/equipe/salvar') ?>", {
                method: "POST",
                body: formData
            })
                .then(r => r.json())
                .then(resp => {
                    if (resp.error == 0) {
                        Swal.fire("Sucesso", resp.msg, "success")
                            .then(() => loadPage("equipe"));

                        resetFormEquipe();
                    } else {
                        Swal.fire("Erro", resp.msg, "error");
                    }
                })
                .catch(() => {
                    Swal.fire("Erro", "Falha ao salvar", "error");
                });
        }


        function updateIntegrante() {
            botaoCarregando("btnAtualizar", "Atualizando...");

            const form = document.getElementById("formequipe");
            const formData = new FormData(form); // <-- ID vai junto

            fetch("<?= base_url('admin/equipe/update_integrante') ?>", {
                method: "POST",
                body: formData
            })
                .then(r => r.json())
                .then(resp => {
                    console.log(resp);
                    if (resp.error == 0) {
                        Swal.fire("Sucesso", resp.msg, "success").then(() => {
                            loadPage("equipe");
                        });
                    } else {
                        Swal.fire("Erro", resp.msg, "error");
                    }
                })
                .finally(() => {
                    botaoNormal("btnAtualizar", "Atualizar Integrante");
                });
        }



        function editarIntegrante(id) {

            fetch(`<?= base_url('admin/equipe/buscar/') ?>${id}`)
                .then(r => r.json())
                .then(resp => {
                    if (resp.error == 0) {
                        const d = resp.data;
                        const form = document.getElementById("formequipe");

                        form.nome.value = d.nome;
                        form.especialidade.value = d.especialidade;
                        form.descricao.value = d.descricao;
                        form.status.value = d.status;

                        let inputId = document.getElementById("id_integrante");
                        if (!inputId) {
                            inputId = document.createElement("input");
                            inputId.type = "hidden";
                            inputId.name = "id";
                            inputId.id = "id_integrante";
                            form.appendChild(inputId);
                        }
                        inputId.value = d.id;

                        if (d.foto) {
                            previewFoto.src = `<?= base_url('uploads/usuarios/') ?>${d.foto}`;
                            previewFoto.style.display = "block";
                            uploadConteudo.style.display = "none";
                        }
                        document.getElementById("foto_atual").value = d.foto;
                        document.getElementById('id_integrante').value = id;

                        document.getElementById("btnSalvar").classList.add("d-none");
                        document.getElementById("btnAtualizar").classList.remove("d-none");

                        Swal.fire("Modo edição", "Edite os dados e clique em atualizar", "info");
                    }
                });
        }


        function botaoSalvando(btn) {
            btn.disabled = true;
            btn.dataset.textoOriginal = btn.innerHTML;
            btn.innerHTML = `
        <span class="spinner-border spinner-border-sm me-2"></span>
        Salvando...
    `;
        }

        function botaoNormal(btn) {
            btn.disabled = false;
            btn.innerHTML = btn.dataset.textoOriginal;
        }
        function excluirIntegrante(id) {
            Swal.fire({
                title: 'Tem certeza?',
                text: 'Esse integrante será removido definitivamente.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sim, excluir',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`<?= base_url('admin/equipe/excluir/') ?>${id}`, {
                        method: 'POST'
                    })
                        .then(r => r.json())
                        .then(resp => {
                            if (resp.error == 0) {
                                Swal.fire('Excluído!', resp.msg, 'success')
                                    .then(() => loadPage('equipe'));
                            } else {
                                Swal.fire('Erro', resp.msg, 'error');
                            }
                        })
                        .catch(() => {
                            Swal.fire('Erro', 'Falha ao excluir integrante', 'error');
                        });
                }
            });
        }
        function botaoCarregando(idBotao, texto) {
            const btn = document.getElementById(idBotao);
            btn.disabled = true;
            btn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span>${texto}`;
        }
        function botaoNormal(idBotao, texto, icon) {
            const btn = document.getElementById(idBotao);
            btn.disabled = false;
            btn.innerHTML = `<i class="${icon}"></i> ${texto}`;
        }

    </script>

</body>

</html>