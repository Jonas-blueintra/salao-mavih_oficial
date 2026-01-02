<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Serviços</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <?php $this->load->view('links_paginas/link_cliente_home') ?>

    <style>
       body {
            background: linear-gradient(135deg, #fde2e4, #fff5f7);
            padding-top: 110px;
            font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
        }

        .header {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 26px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        .header h1 {
            color: #b02a6b;
        }

        .header p {
            color: #7a5a65;
        }

        .service-card {
            border-radius: 28px;
            overflow: hidden;
            background: #ffffff;
            transition: all .35s ease;
            box-shadow: 0 10px 28px rgba(176, 42, 107, 0.15);
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid #f4c2d7;
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 40px rgba(176, 42, 107, 0.25);
        }

        .service-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .service-card h4 {
            color: #8f2c5c;
            font-weight: 600;
        }

        .price-tag {
            font-size: 1.5rem;
            font-weight: 700;
            color: #e63982;
            margin-bottom: 8px;
        }

        .badge-time {
            background: linear-gradient(135deg, #ffd6e8, #fcbad3);
            color: #7a1244;
            font-weight: 500;
            border-radius: 20px;
            font-size: .9rem;
        }

        .service-card p.text-muted {
            color: #7a5a65 !important;
            font-size: .95rem;
        }

        .service-card .btn {
            background: linear-gradient(135deg, #e63982, #b02a6b);
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 12px;
            transition: .3s;
        }

        .service-card .btn:hover {
            background: linear-gradient(135deg, #b02a6b, #8f2c5c);
            transform: scale(1.02);
        }

        .legend {
            background: #ffffff;
            padding: 25px;
            border-radius: 22px;
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.08);
        }

        .legend i {
            font-size: 1.4rem;
        }

        .legend p {
            color: #7a5a65;
            font-weight: 500;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(1);
        }

        input.form-control {
            border-radius: 30px;
            padding: 14px 20px;
            border: 1px solid #f4c2d7;
            box-shadow: 0 6px 14px rgba(176, 42, 107, 0.12);
        }

        input.form-control:focus {
            border-color: #e63982;
            box-shadow: 0 0 0 0.2rem rgba(230, 57, 130, 0.25);
        }

        /* MOBILE */
        @media (max-width: 576px) {
            .service-card {
                width: 92%;
                margin: 0 auto;
            }

            .service-img {
                height: 100% !important;
            }

            .header {
                padding: 30px 20px;
            }
        }

        .body-offset {
            margin-top: 50px;
        }

        @media (max-width: 768px) {

            #carouselServicos .carousel-item .row {
                flex-wrap: nowrap;
                justify-content: center;
            }

            #carouselServicos .agenda-item {
                flex: 0 0 100%;
                max-width: 100%;
                display: flex;
                justify-content: center;
            }

            #carouselServicos .agenda-card {
                width: 92%;
                max-width: 400px;
            }
        }



        #carouselServicos .carousel-control-prev,
        #carouselServicos .carousel-control-next {
            width: 52px;
            height: 52px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #ff9dbf, #ff6f91);
            border-radius: 50%;
            opacity: 1;
            box-shadow: 0 8px 22px rgba(255, 111, 145, 0.45);
            transition: all 0.35s ease;
        }

        /* posição */
        #carouselServicos .carousel-control-prev {
            left: 12px;
        }

        #carouselServicos .carousel-control-next {
            right: 12px;
        }

        /* ícones */
        #carouselServicos .carousel-control-prev-icon,
        #carouselServicos .carousel-control-next-icon {
            filter: brightness(0) invert(1);
            width: 22px;
            height: 22px;
        }

        /* hover elegante */
        #carouselServicos .carousel-control-prev:hover,
        #carouselServicos .carousel-control-next:hover {
            transform: translateY(-50%) scale(1.08);
            box-shadow: 0 12px 30px rgba(255, 111, 145, 0.6);
        }

        /* efeito de clique */
        #carouselServicos .carousel-control-prev:active,
        #carouselServicos .carousel-control-next:active {
            transform: translateY(-50%) scale(0.95);
        }

        /* mobile: levemente mais delicado */
        @media (max-width: 576px) {

            #carouselServicos .carousel-control-prev,
            #carouselServicos .carousel-control-next {
                width: 46px;
                height: 46px;
            }
        }

        /* ===== CARROSSEL SERVIÇOS – DESKTOP 3 / MOBILE 1 ===== */

        /* Desktop: 3 cards */
        @media (min-width: 768px) {
            #carouselServicos.carousel-agenda .carousel-item .agenda-col {
                flex: 0 0 33.3333%;
                max-width: 33.3333%;
            }
        }

        /* Mobile: 1 card */
        @media (max-width: 767px) {
            #carouselServicos.carousel-agenda .carousel-item .agenda-col {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        /* Centraliza */
        #carouselServicos .agenda-card {
            margin: auto;
            max-width: 420px;
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

        .cor {
            color: #b02a6b !important;
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

        .servico-tipo {
            width: 100%;
            background: linear-gradient(135deg, #ff9dbf, #ff6f91);

            color: #fff;
            font-weight: 700;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;

            padding: 12px 16px;
            text-align: center;

            border-radius: 28px 28px 0 0;
            box-shadow: 0 8px 20px rgba(255, 111, 145, 0.45);
        }

        /* carroel 2 */
        @media (max-width: 768px) {

            #carouselServicos2 .carousel-item .row {
                flex-wrap: nowrap;
                justify-content: center;
            }

            #carouselServicos2 .agenda-item {
                flex: 0 0 100%;
                max-width: 100%;
                display: flex;
                justify-content: center;
            }

            #carouselServicos2 .agenda-card {
                width: 92%;
                max-width: 400px;
            }
        }



        #carouselServicos2 .carousel-control-prev,
        #carouselServicos2 .carousel-control-next {
            width: 52px;
            height: 52px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #ff9dbf, #ff6f91);
            border-radius: 50%;
            opacity: 1;
            box-shadow: 0 8px 22px rgba(255, 111, 145, 0.45);
            transition: all 0.35s ease;
        }

        /* posição */
        #carouselServicos2 .carousel-control-prev {
            left: 12px;
        }

        #carouselServicos2 .carousel-control-next {
            right: 12px;
        }

        /* ícones */
        #carouselServicos2 .carousel-control-prev-icon,
        #carouselServicos2 .carousel-control-next-icon {
            filter: brightness(0) invert(1);
            width: 22px;
            height: 22px;
        }

        /* hover elegante */
        #carouselServicos2 .carousel-control-prev:hover,
        #carouselServicos2 .carousel-control-next:hover {
            transform: translateY(-50%) scale(1.08);
            box-shadow: 0 12px 30px rgba(255, 111, 145, 0.6);
        }

        /* efeito de clique */
        #carouselServicos2 .carousel-control-prev:active,
        #carouselServicos2 .carousel-control-next:active {
            transform: translateY(-50%) scale(0.95);
        }

        /* mobile: levemente mais delicado */
        @media (max-width: 576px) {

            #carouselServicos2 .carousel-control-prev,
            #carouselServicos2 .carousel-control-next {
                width: 46px;
                height: 46px;
            }
        }

        /* ===== CARROSSEL SERVIÇOS – DESKTOP 3 / MOBILE 1 ===== */

        /* Desktop: 3 cards */
        @media (min-width: 768px) {
            #carouselServicos2.carousel-agenda .carousel-item .agenda-col {
                flex: 0 0 33.3333%;
                max-width: 33.3333%;
            }
        }

        /* Mobile: 1 card */
        @media (max-width: 767px) {
            #carouselServicos2.carousel-agenda .carousel-item .agenda-col {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        /* Centraliza */
        #carouselServicos2 .agenda-card {
            margin: auto;
            max-width: 420px;
        }

        /* carrosel 3 */
        @media (max-width: 768px) {

            #carouselServicos3 .carousel-item .row {
                flex-wrap: nowrap;
                justify-content: center;
            }

            #carouselServicos3 .agenda-item {
                flex: 0 0 100%;
                max-width: 100%;
                display: flex;
                justify-content: center;
            }

            #carouselServicos3 .agenda-card {
                width: 92%;
                max-width: 400px;
            }
        }



        #carouselServicos3 .carousel-control-prev,
        #carouselServicos3 .carousel-control-next {
            width: 52px;
            height: 52px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #ff9dbf, #ff6f91);
            border-radius: 50%;
            opacity: 1;
            box-shadow: 0 8px 22px rgba(255, 111, 145, 0.45);
            transition: all 0.35s ease;
        }

        /* posição */
        #carouselServicos3 .carousel-control-prev {
            left: 12px;
        }

        #carouselServicos3 .carousel-control-next {
            right: 12px;
        }

        /* ícones */
        #carouselServicos3 .carousel-control-prev-icon,
        #carouselServicos3 .carousel-control-next-icon {
            filter: brightness(0) invert(1);
            width: 22px;
            height: 22px;
        }

        /* hover elegante */
        #carouselServicos3 .carousel-control-prev:hover,
        #carouselServicos3 .carousel-control-next:hover {
            transform: translateY(-50%) scale(1.08);
            box-shadow: 0 12px 30px rgba(255, 111, 145, 0.6);
        }

        /* efeito de clique */
        #carouselServicos3 .carousel-control-prev:active,
        #carouselServicos3 .carousel-control-next:active {
            transform: translateY(-50%) scale(0.95);
        }

        /* mobile: levemente mais delicado */
        @media (max-width: 576px) {

            #carouselServicos3 .carousel-control-prev,
            #carouselServicos3 .carousel-control-next {
                width: 46px;
                height: 46px;
            }
        }

        /* ===== CARROSSEL SERVIÇOS – DESKTOP 3 / MOBILE 1 ===== */

        /* Desktop: 3 cards */
        @media (min-width: 768px) {
            #carouselServicos3.carousel-agenda .carousel-item .agenda-col {
                flex: 0 0 33.3333%;
                max-width: 33.3333%;
            }
        }

        /* Mobile: 1 card */
        @media (max-width: 767px) {
            #carouselServicos3.carousel-agenda .carousel-item .agenda-col {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        /* Centraliza */
        #carouselServicos3 .agenda-card {
            margin: auto;
            max-width: 420px;
        }

        /* carroseu 4 */
        @media (max-width: 768px) {

            #carouselServicos4 .carousel-item .row {
                flex-wrap: nowrap;
                justify-content: center;
            }

            #carouselServicos4 .agenda-item {
                flex: 0 0 100%;
                max-width: 100%;
                display: flex;
                justify-content: center;
            }

            #carouselServicos4 .agenda-card {
                width: 92%;
                max-width: 400px;
            }
        }



        #carouselServicos4 .carousel-control-prev,
        #carouselServicos4 .carousel-control-next {
            width: 52px;
            height: 52px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #ff9dbf, #ff6f91);
            border-radius: 50%;
            opacity: 1;
            box-shadow: 0 8px 22px rgba(255, 111, 145, 0.45);
            transition: all 0.35s ease;
        }

        /* posição */
        #carouselServicos4 .carousel-control-prev {
            left: 12px;
        }

        #carouselServicos4 .carousel-control-next {
            right: 12px;
        }

        /* ícones */
        #carouselServicos4 .carousel-control-prev-icon,
        #carouselServicos4 .carousel-control-next-icon {
            filter: brightness(0) invert(1);
            width: 22px;
            height: 22px;
        }

        /* hover elegante */
        #carouselServicos4 .carousel-control-prev:hover,
        #carouselServicos4 .carousel-control-next:hover {
            transform: translateY(-50%) scale(1.08);
            box-shadow: 0 12px 30px rgba(255, 111, 145, 0.6);
        }

        /* efeito de clique */
        #carouselServicos4 .carousel-control-prev:active,
        #carouselServicos4 .carousel-control-next:active {
            transform: translateY(-50%) scale(0.95);
        }

        /* mobile: levemente mais delicado */
        @media (max-width: 576px) {

            #carouselServicos4 .carousel-control-prev,
            #carouselServicos4 .carousel-control-next {
                width: 46px;
                height: 46px;
            }
        }

        /* ===== CARROSSEL SERVIÇOS – DESKTOP 3 / MOBILE 1 ===== */

        /* Desktop: 3 cards */
        @media (min-width: 768px) {
            #carouselServicos4.carousel-agenda .carousel-item .agenda-col {
                flex: 0 0 33.3333%;
                max-width: 33.3333%;
            }
        }

        /* Mobile: 1 card */
        @media (max-width: 767px) {
            #carouselServicos4.carousel-agenda .carousel-item .agenda-col {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        /* Centraliza */
        #carouselServicos4 .agenda-card {
            margin: auto;
            max-width: 420px;
        }
    </style>

</head>

<body>

    <?php $this->load->view('cliente/includes/menu'); ?>

    <div class="container body-offset">


        <div class="agenda-header text-center my-5">
            <div class="header-icon mb-3">💆🏻‍♀️</div>

            <h1 class="fw-bold cor mb-2">Catálogo de Serviços</h1>

            <p class="text-muted mb-3">
                Confira todos os serviços disponíveis com descrição, preço, duração e imagem
                ilustrativa. 🌷
            </p>

            <span class="badge badge-agenda px-4 py-2">
                <i class="bi bi-check-circle-fill me-1"></i>
                Agende Seu Serviço agora<i class="bi bi-arrow-down-short arrow-down"></i>
            </span>
        </div>

        <?php
        $unha = false;
        $cabelo = false;
        $sobrancelha = false;
        $depilacao = false;
        foreach ($mostrar_serviços as $existe) {
            if ($existe->tipo_servico == 'unha')
                $unha = true;
            if ($existe->tipo_servico == 'cabelo')
                $cabelo = true;
            if ($existe->tipo_servico == 'sobrancelha')
                $sobrancelha = true;
            if ($existe->tipo_servico == 'depilacao')
                $depilacao = true;
        }
        ?>
        <!-- CARROSSEL -->
        <?php if ($mostrar_serviços): ?>

            <?php $grupos = array_chunk($mostrar_serviços, 3); ?>
            <div class="legend d-flex justify-content-around text-center mb-4 flex-wrap" style="margin: 30px 0 0 0;">
                <div class="legend-item m-2">
                    <i class="bi bi-clock-history text-warning"></i>
                    <p class="m-0 small">Duração</p>
                </div>
                <div class="legend-item m-2">
                    <i class="bi bi-cash-coin text-success"></i>
                    <p class="m-0 small">Preço</p>
                </div>
                <div class="legend-item m-2">
                    <i class="bi bi-card-image text-primary"></i>
                    <p class="m-0 small">Imagem</p>
                </div>
                <div class="legend-item m-2">
                    <i class="bi bi-journal-text text-secondary"></i>
                    <p class="m-0 small">Descrição</p>
                </div>
            </div>
            <?php if ($cabelo): ?>
                <div id="carouselServicos" class="carousel slide carousel-agenda" data-bs-ride="false">
                    <div class="carousel-inner">

                        <?php
                        $active = true;
                        foreach ($mostrar_serviços as $ser):
                            if ($ser->tipo_servico != 'cabelo')
                                continue; ?>

                            <div class="carousel-item <?= $active ? 'active' : '' ?>">
                                <div class="row justify-content-center g-4">

                                    <div class="agenda-col d-flex">
                                        <div class="agenda-card w-100 service-card">
                                            <!-- FAIXA DO TIPO DO SERVIÇO -->
                                            <div class="servico-tipo">
                                                <?= $ser->tipo_servico ?>
                                            </div>
                                            <img src="<?= base_url('uploads/servicos/' . ($ser->foto ?? 'servico.png')) ?>"
                                                class="service-img">

                                            <div class="p-4">
                                                <h4><?= $ser->nome ?></h4>

                                                <span class="badge badge-time px-3 py-2 mb-2 d-inline-block">
                                                    ⏱ <?= $ser->duracao ?> min
                                                </span>

                                                <p class="price-tag">
                                                    R$ <?= number_format($ser->valor, 2, ',', '.') ?>
                                                </p>

                                                <p class="text-muted"><?= $ser->descricao ?></p>

                                                <a href="<?= base_url('cliente/agendar/index/' . $ser->id); ?>"
                                                    class="btn btn-dark w-100 mt-3 rounded-pill">
                                                    Agendar
                                                </a>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <?php
                            $active = false;
                        endforeach; ?>

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselServicos" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselServicos" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>

                <!-- CONTROLES -->

            <?php endif; ?>


            <?php if ($unha): ?>
                <div id="carouselServicos2" class="carousel slide carousel-agenda" data-bs-ride="false">
                    <div class="carousel-inner">

                        <?php
                        $active = true;
                        foreach ($mostrar_serviços as $ser):
                            if ($ser->tipo_servico != 'unha')
                                continue ?>

                                <div class="carousel-item  my-5 <?= $active ? 'active' : '' ?>">
                                <div class="row justify-content-center g-4">

                                    <div class="agenda-col d-flex">
                                        <div class="agenda-card w-100 service-card">
                                            <div class="servico-tipo">
                                                <?= $ser->tipo_servico ?>
                                            </div>
                                            <img src="<?= base_url('uploads/servicos/' . ($ser->foto ?? 'servico.png')) ?>"
                                                class="service-img">

                                            <div class="p-4">
                                                <h4><?= $ser->nome ?></h4>

                                                <span class="badge badge-time px-3 py-2 mb-2 d-inline-block">
                                                    ⏱ <?= $ser->duracao ?> min
                                                </span>

                                                <p class="price-tag">
                                                    R$ <?= number_format($ser->valor, 2, ',', '.') ?>
                                                </p>

                                                <p class="text-muted"><?= $ser->descricao ?></p>

                                                <a href="<?= base_url('cliente/agendar/index/' . $ser->id); ?>"
                                                    class="btn btn-dark w-100 mt-3 rounded-pill">
                                                    Agendar
                                                </a>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <?php
                            $active = false;
                        endforeach; ?>

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselServicos2"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselServicos2"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>

                    <!-- CONTROLES -->


                </div>
            <?php endif; ?>
            <?php if ($sobrancelha): ?>
                <div id="carouselServicos3" class="carousel slide carousel-agenda" data-bs-ride="false">
                    <div class="carousel-inner">

                        <?php
                        $active = true;
                        foreach ($mostrar_serviços as $ser):
                            if ($ser->tipo_servico != 'sobrancelha')
                                continue ?>

                                <div class="carousel-item  my-5 <?= $active ? 'active' : '' ?>">
                                <div class="row justify-content-center g-4">

                                    <div class="agenda-col d-flex">
                                        <div class="agenda-card w-100 service-card">
                                            <div class="servico-tipo">
                                                <?= $ser->tipo_servico ?>
                                            </div>
                                            <img src="<?= base_url('uploads/servicos/' . ($ser->foto ?? 'servico.png')) ?>"
                                                class="service-img">

                                            <div class="p-4">
                                                <h4><?= $ser->nome ?></h4>

                                                <span class="badge badge-time px-3 py-2 mb-2 d-inline-block">
                                                    ⏱ <?= $ser->duracao ?> min
                                                </span>

                                                <p class="price-tag">
                                                    R$ <?= number_format($ser->valor, 2, ',', '.') ?>
                                                </p>

                                                <p class="text-muted"><?= $ser->descricao ?></p>

                                                <a href="<?= base_url('cliente/agendar/index/' . $ser->id); ?>"
                                                    class="btn btn-dark w-100 mt-3 rounded-pill">
                                                    Agendar
                                                </a>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <?php
                            $active = false;
                        endforeach; ?>

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselServicos3"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselServicos3"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>

                <!-- CONTROLES -->


            </div>
        <?php endif; ?>

        <?php if ($depilacao): ?>
            <div id="carouselServicos4" class="carousel slide carousel-agenda" data-bs-ride="false">
                <div class="carousel-inner">

                    <?php
                    $active = true;
                    foreach ($mostrar_serviços as $ser):
                        if ($ser->tipo_servico != 'depilacao')
                            continue ?>

                            <div class="carousel-item  my-5 <?= $active ? 'active' : '' ?>">
                            <div class="row justify-content-center g-4">

                                <div class="agenda-col d-flex">
                                    <div class="agenda-card w-100 service-card">
                                        <div class="servico-tipo">
                                            Depilação
                                        </div>
                                        <img src="<?= base_url('uploads/servicos/' . ($ser->foto ?? 'servico.png')) ?>"
                                            class="service-img">

                                        <div class="p-4">
                                            <h4><?= $ser->nome ?></h4>

                                            <span class="badge badge-time px-3 py-2 mb-2 d-inline-block">
                                                ⏱ <?= $ser->duracao ?> min
                                            </span>

                                            <p class="price-tag">
                                                R$ <?= number_format($ser->valor, 2, ',', '.') ?>
                                            </p>

                                            <p class="text-muted"><?= $ser->descricao ?></p>

                                            <a href="<?= base_url('cliente/agendar/index/' . $ser->id); ?>"
                                                class="btn btn-dark w-100 mt-3 rounded-pill">
                                                Agendar
                                            </a>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <?php
                        $active = false;
                    endforeach; ?>

                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselServicos4" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselServicos4" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>

            <!-- CONTROLES -->


            </div>
        <?php endif; ?>

    <?php endif; ?>


    <script>
        let input = document.getElementById('buscarServicos');
        let itens = document.querySelectorAll('.servico-item');

        input.addEventListener('keyup', () => {
            let filtro = input.value.toLowerCase();

            itens.forEach(card => {
                let nome = card.querySelector('h4').innerText.toLowerCase();
                card.style.display = nome.includes(filtro) ? "" : "none";
            });
        });
    </script>
    <script>
        document.querySelectorAll('.carousel-agenda').forEach(carousel => {

            if (window.innerWidth < 768) return;

            const items = carousel.querySelectorAll('.carousel-item');
            const totalItems = items.length;

            // Se tiver menos de 3 itens, NÃO clona
            if (totalItems < 3) return;

            items.forEach((el, index) => {
                let nextIndex = index + 1;

                for (let i = 1; i < 3; i++) {

                    if (nextIndex >= totalItems) break;

                    const clone = items[nextIndex]
                        .querySelector('.agenda-col')
                        .cloneNode(true);

                    el.querySelector('.row').appendChild(clone);
                    nextIndex++;
                }
            });
        });
    </script>



    <?php $this->load->view('cliente/includes/footer') ?>

</body>

</html>