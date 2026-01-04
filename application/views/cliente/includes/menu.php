<?php 
$tem_agenda = $this->agenda_model->buscar_agenda($this->session->userdata('id'));
$informacao = $this->global_model->get('tela_cliente', 1, true);
$promocao = $this->Servicos_model->servico_promocao();
$url = $_SERVER['REQUEST_URI'];


if ($tem_agenda) {
    $width = '40%';
} else {
    $width = '100%';
} ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-1 shadow-sm fixed-top" style="z-index:9999;">
    <div class="container">
        <style>
            /* Container que segura logo + botão */
            /* Linha principal do topo */
            .navbar-top-row {
                width:
                    <?= $width ?>
                ;
                display: flex;
                justify-content: space-between;
                position: relative;
                padding: 5px 10px;
            }

            /* LOGO ESQUERDA */
            .logo-mini {
                width: 100px;
                height: auto;
            }

            /* TÍTULO CENTRAL */
            .logo-title {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                font-family: "Parisienne", cursive;
                font-size: 22px;
                font-weight: 500;
                color: white;
            }

            /* BOTÃO MENU DIREITA */
            .navbar-toggler {
                border: none;
                box-shadow: none;
            }

            @media (max-width: 1280px) {
                .navbar-top-row {
                    width: 40%;

                }


            }

            /* Desktop mantém tudo normal */
            @media (min-width: 992px) {
                .navbar-top-row {
                    justify-content: flex-start;
                }

                .logo-title {
                    position: static;
                    transform: none;
                    margin-left: 125px;
                    font-size: 30px;
                }


            }

             .gift-wrap2 {
                position: absolute;
                right: -6px;
                top: -10px;
                background: linear-gradient(135deg, #ff4f88, #ff9acb);
                width: 30px;
                height: 30px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 8px 22px rgba(255, 79, 136, .7);
                animation: giftRing 1.1s infinite;
            }

          

            /* brilho pulsando */
            .gift-wrap2::after {
                content: '';
                position: absolute;
                inset: -6px;
                border-radius: 50%;
                background: radial-gradient(circle, #ffd1e0 20%, transparent 60%);
                opacity: .6;
                animation: pulseGlow 2s infinite;
                z-index: -1;
            }

            @keyframes pulseGlow {
                0% {
                    transform: scale(.8);
                    opacity: .3
                }

                50% {
                    transform: scale(1.3);
                    opacity: .7
                }

                100% {
                    transform: scale(.8);
                    opacity: .3
                }
            }

            /* sino */
            @keyframes giftRing {
                0% {
                    transform: rotate(0deg)
                }

                15% {
                    transform: rotate(14deg)
                }

                30% {
                    transform: rotate(-14deg)
                }

                45% {
                    transform: rotate(10deg)
                }

                60% {
                    transform: rotate(-10deg)
                }

                75% {
                    transform: rotate(6deg)
                }

                100% {
                    transform: rotate(0deg)
                }
            }

            @media (max-width: 552px) {
                .logo-mini {
                    width: 80px;
                    height: auto;
                }

                .logo-title {
                    font-size: 30px;
                }

                .navbar-top-row {
                    width: 95%;

                }

                  .gift-wrap2 {
                right: 20px;
                  }

            }

            /* ===== ESTILO GERAL DO MENU (APENAS CORES) ===== */
            .navbar {
                background: linear-gradient(135deg, #ff4f8b, #f8c9d6) !important;
                border-bottom: 2px solid #f0a7bc;
            }

            /* Links */
            .navbar-nav .nav-link {
                color: #ffffff !important;
                font-weight: 500;
                transition: color .3s ease;
            }

            .navbar-nav .nav-link:hover {
                color: #ffe0ec !important;
                text-decoration: underline;
            }

            /* Título */
            .logo-title {
                color: #ffffff;
                text-shadow: 0 2px 6px rgba(0, 0, 0, .15);
            }

            /* Ícone do botão mobile */
            .navbar-toggler-icon {
                filter: invert(1);
            }

            /* Avatar */
            .navbar-nav img {
                border: 3px solid #f8c9d6;
            }

            /* ===== DROPDOWN DESKTOP ===== */
            .dropdown-menu {
                background: #ffedf1;
                border-radius: 15px;
                border: none;
                box-shadow: 0 8px 20px rgba(0, 0, 0, .1);
            }


            .sair {
                color: #ff0c0cff;
            }

            .sair:hover {
                background: #ff6f9e;
                color: #ffffff;
            }

            .sair1:hover {
                background: #ff6f9e;
                color: #ffffff;
            }

            /* ===== MENU MOBILE ===== */
            .navbar-nav.d-lg-none {
                background: #ffedf1 !important;
                border-radius: 12px;
            }

            .navbar-nav.d-lg-none .nav-link {
                color: #ff4f8b !important;
            }

            .navbar-nav.d-lg-none .nav-link:hover {
                background: #ff4f8b;
                color: #ffffff !important;
            }

            /* Divisores */
            .dropdown-divider {
                border-color: #f3b6c7;
            }

            /* ===== TRANSIÇÕES GERAIS ===== */
            .navbar,
            .navbar * {
                transition: all 0.35s ease;
            }

            /* ===== EFEITO SUAVE AO PASSAR O MOUSE NOS LINKS ===== */
            .navbar-nav .nav-link {
                position: relative;
            }

            .navbar-nav .nav-link::after {
                content: "";
                position: absolute;
                bottom: -4px;
                left: 50%;
                width: 0;
                height: 2px;
                background: #ffe0ec;
                transition: all .3s ease;
                transform: translateX(-50%);
                border-radius: 10px;
            }

            .navbar-nav .nav-link:hover::after {
                width: 70%;
            }

            /* ===== BRILHO FEMININO SUAVE NA NAVBAR ===== */
            .navbar::before {
                content: "";
                position: absolute;
                inset: 0;
                background: linear-gradient(120deg,
                        rgba(255, 255, 255, 0.15),
                        rgba(255, 255, 255, 0));
                pointer-events: none;
            }

            /* ===== LOGO COM LEVE GLOW ===== */
            .logo-mini {
                filter: drop-shadow(0 4px 6px rgba(255, 79, 139, 0.4));
            }

            /* ===== TÍTULO COM EFEITO DELICADO ===== */
            .logo-title {
                animation: brilhoFeminino 4s infinite alternate;
            }

            @keyframes brilhoFeminino {
                0% {
                    text-shadow: 0 2px 6px rgba(255, 255, 255, .2);
                }

                100% {
                    text-shadow: 0 4px 12px rgba(255, 255, 255, .6);
                }
            }

            /* ===== BOTÃO MOBILE COM HOVER SUAVE ===== */
            .navbar-toggler {
                border-radius: 50%;
            }

            .navbar-toggler:hover {
                background: rgba(255, 255, 255, 0.15);
            }

            /* ===== AVATAR COM EFEITO DESTAQUE ===== */
            .navbar-nav img {
                transition: transform .3s ease, box-shadow .3s ease;
            }

            .navbar-nav img:hover {
                transform: scale(1.08);
                box-shadow: 0 0 0 4px rgba(255, 111, 165, 0.35);
            }

            .whatsapp {
                position: fixed;
                right: 20px;
                bottom: 20px;
                background: #25d366;
                color: white;
                width: 55px;
                height: 55px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 28px;
                box-shadow: 0 8px 20px rgba(0, 0, 0, .3);
                z-index: 999;
            }

            /* ===== DROPDOWN COM ENTRADA SUAVE ===== */
            .dropdown-menu {
                animation: fadeFeminino .35s ease;
            }

            @keyframes fadeFeminino {
                from {
                    opacity: 0;
                    transform: translateY(8px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* ===== MENU MOBILE COM SOMBRA SUAVE ===== */
            .navbar-nav.d-lg-none {
                box-shadow: 0 10px 30px rgba(255, 79, 139, 0.25);
            }

            .navbar-collapse {
                flex-grow: 0;

            }

            .navbar {
                overflow: visible !important;
            }

            /* Botão */
            .promo-toggler {
                background: linear-gradient(135deg, #ff9ab5, #b02a6b);
                border: none;
                width: 58px;
                height: 48px;
                border-radius: 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                box-shadow: 0 12px 28px rgba(182, 75, 127, 0.5);
                transition: .4s;
            }

            .promo-toggler:hover {
                transform: scale(1.08);
                box-shadow: 0 16px 40px rgba(176, 42, 107, .7);
            }

            .promo-toggler .navbar-toggler-icon {
                filter: invert(1);
            }

            /* Presente */
            .gift-wrap {
                position: absolute;
                right: -6px;
                top: -10px;
                background: linear-gradient(135deg, #ff4f88, #ff9acb);
                width: 30px;
                height: 30px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 8px 22px rgba(255, 79, 136, .7);
                animation: giftRing 1.1s infinite;
            }

            .bi-gift-fill {
                color: white;
                font-size: 1rem;
            }

            /* brilho pulsando */
            .gift-wrap::after {
                content: '';
                position: absolute;
                inset: -6px;
                border-radius: 50%;
                background: radial-gradient(circle, #ffd1e0 20%, transparent 60%);
                opacity: .6;
                animation: pulseGlow 2s infinite;
                z-index: -1;
            }

            @keyframes pulseGlow {
                0% {
                    transform: scale(.8);
                    opacity: .3
                }

                50% {
                    transform: scale(1.3);
                    opacity: .7
                }

                100% {
                    transform: scale(.8);
                    opacity: .3
                }
            }

            /* sino */
            @keyframes giftRing {
                0% {
                    transform: rotate(0deg)
                }

                15% {
                    transform: rotate(14deg)
                }

                30% {
                    transform: rotate(-14deg)
                }

                45% {
                    transform: rotate(10deg)
                }

                60% {
                    transform: rotate(-10deg)
                }

                75% {
                    transform: rotate(6deg)
                }

                100% {
                    transform: rotate(0deg)
                }
            }



            /* Presente */
           


            .promo-cloud {
                position: absolute;
                top: 38px;
                /* agora fica embaixo */
                right: -36px;
                background: white;
                color: #b02a6b;
                font-size: .65rem;
                font-weight: 700;
                padding: 6px 12px;
                border-radius: 50px;
                white-space: nowrap;
                box-shadow: 0 10px 25px rgba(176, 42, 107, .3);
                opacity: 0;
                transform: translateY(-8px) scale(.9);
                animation: cloudFloat 3.5s infinite;
                z-index: 10;
            }

            /* pontinha da nuvem */
            .promo-cloud::after {
                content: '';
                position: absolute;
                top: -6px;
                right: 26px;
                width: 12px;
                height: 12px;
                background: white;
                transform: rotate(45deg);
                border-radius: 2px;
            }

            /* sobe e some */
            @keyframes cloudFloat {
                0% {
                    opacity: 0;
                    transform: translateY(-8px) scale(.9)
                }

                20% {
                    opacity: 1;
                    transform: translateY(0) scale(1)
                }

                60% {
                    opacity: 1
                }

                85% {
                    opacity: 0;
                    transform: translateY(10px) scale(.9)
                }

                100% {
                    opacity: 0
                }
            }
        </style>

        <div class="navbar-top-row d-flex align-items-center">

            <!-- LOGO ESQUERDA -->
            <img class="logo-mini" src="<?= base_url('uploads\logo/' . $informacao->logo); ?>" alt="Logo">

            <!-- TÍTULO CENTRAL -->
            <span class="logo-title">Mavih Studio</span>

            <!-- BOTÃO MOBILE (direita) -->
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuCliente">
    <span class="navbar-toggler-icon"></span>
</button> -->
            <button class="navbar-toggler promo-toggler position-relative" type="button" data-bs-toggle="collapse"
                data-bs-target="#menuCliente">

                <span class="navbar-toggler-icon"></span>
                <?php if ($promocao->data && $url != '/salao-mavih/cliente/promocao/promocao'): ?>

                    <span class="gift-wrap">
                        <i class="bi bi-gift-fill"></i>
                        <span class="promo-cloud">Tem promoção!</span>
                    </span>
                <?php endif; ?>

            </button>



        </div>



        <div class="collapse navbar-collapse" id="menuCliente" style="margin: 0 0 0 0px;">

            <!-- LINKS ESQUERDA -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('cliente/home') ?>">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('cliente/Servicos_cliente') ?>">Serviços</a>
                </li>
                <?php if ($promocao->data->tempo_promocao > date('d-m-Y') ):?>

                    <li class="nav-item"><a class="nav-link" href="<?= base_url('cliente/promocao/promocao') ?>">Promoção
                       <?php if ($url != '/salao-mavih/cliente/promocao/promocao'):?>
                            <span class="gift-wrap2">
                                <i class="bi bi-gift-fill"></i>
                                <span class="promo-cloud">Tem promoção!</span>
                            </span><?php endif; ?>
                        </a></li>
                <?php endif;?>
                <?php if ($tem_agenda):
                    ?>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('cliente/minha_agenda') ?>">Minha Agenda
                        </a></li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('cliente/equipe') ?>">Proficional</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('cliente/contato') ?>">Contato</a></li>
            </ul>

            <!-- DESKTOP -->
            <ul class="navbar-nav align-items-center d-none d-lg-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                        <img src="<?= base_url('uploads\usuarios/' . $this->session->userdata('foto')); ?>" width="35"
                            height="35" class="rounded-circle me-2">
                        <?= $this->session->userdata('nome') ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li><a class="dropdown-item sair1" href="<?= base_url('cliente/perfil') ?>">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item sair " href="<?= base_url('Login/logout') ?>">Sair</a></li>
                    </ul>
                </li>
            </ul>

            <!-- MOBILE -->
            <ul class="navbar-nav d-lg-none mt-3 bg-dark rounded p-2">

                <li class="nav-item d-flex align-items-center mb-2">
                    <img src="<?= base_url('uploads\usuarios/' . $this->session->userdata('foto')); ?>" width="35"
                        height="35" class="rounded-circle me-2">
                    <a class="nav-link text-white p-0" href="<?= base_url('cliente/perfil') ?>">Seu Perfil</a>
                </li>

                <li>
                    <hr class="dropdown-divider bg-secondary">
                </li>

                <li class="nav-item">
                    <a class="nav-link sair" href="<?= base_url('Login/logout') ?>">
                        <i class="bi bi-box-arrow-right"></i> Sair
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>
<a class="whatsapp" href="https://wa.me/+5519993250801?text=Ol%C3%A1%20vim%20atravez%20do%20aplicativo%20queria%20tirar%20duvidas!"><i class="bi bi-whatsapp"></i></a>