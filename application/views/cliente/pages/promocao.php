<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Promoções Mavih</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(180deg, #fff0f6, #ffe6ef);
            font-family: Poppins, sans-serif;
            overflow-x: hidden;
        }

        .hero {
            position: relative;
            height: 90vh;
            background: linear-gradient(135deg, #ff5f9e, #b02a6b);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hero-glow {
            position: absolute;
            width: 420px;
            height: 420px;
            background: radial-gradient(circle, #fff, transparent 70%);
            opacity: .18;
            filter: blur(60px);
            animation: glowFloat 10s infinite alternate;
        }

        @keyframes glowFloat {
            0% {
                transform: translate(-80px, -60px)
            }

            100% {
                transform: translate(80px, 60px)
            }
        }

        .hero-content {
            position: relative;
            text-align: center;
            color: white;
            z-index: 2;
        }

        .hero-content h1 {
            font-size: clamp(2.8rem, 6vw, 4.3rem);
            font-weight: 900;
            text-shadow: 0 10px 40px rgba(0, 0, 0, .3);
        }

        .hero-content p {
            opacity: .95;
            margin: 14px 0 25px;
            font-size: 30px;
        }

        .hero-btn {
            display: inline-block;
            padding: 16px 45px;
            border-radius: 50px;
            background: white;
            color: #b02a6b;
            font-weight: 800;
            text-decoration: none;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .4);
            transition: .4s;
        }

        .hero-btn:hover {
            transform: translateY(-8px) scale(1.05);
        }

        .hero-wave {
            position: absolute;
            bottom: 0;
            width: 100%;
        }


        .carousel-inner {
            padding: 40px 0;
        }

        .carousel-item .row {
            justify-content: center;
        }

        .carousel-flex {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .promo-card {
            flex: 1;
            max-width: 450px;
            background: white;
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(176, 42, 107, .25);
            overflow: hidden;
            position: relative;
            transition: .4s;
        }

        .promo-card:hover {
            transform: translateY(-12px) scale(1.03);
        }

        .promo-img {
            width: 100%;
            height: 230px;
            object-fit: cover;
        }

        .promo-content {
            padding: 20px;
            text-align: center;
        }

        .promo-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: linear-gradient(135deg, #ff6f91, #b02a6b);
            color: white;
            padding: 7px 16px;
            border-radius: 30px;
            font-weight: 700;
        }

        @media(max-width:991px) {
            .carousel-flex {
                flex-wrap: wrap;
            }

            .promo-card {
                max-width: 45%;
            }
        }

        @media(max-width:576px) {
            .promo-card {
                max-width: 100%;
            }

            .hero {
                height: 70vh;
            }

            .hero-content p {
                font-size: 18px;
            }
        }

        .promo-col {
            width: 100%;
            max-width: 360px;
        }

        @media(min-width:768px) {
            .promo-col {
                width: 48%;
            }
        }

        @media(min-width:992px) {
            .promo-col {
                width: 32%;

            }
        }

        .promo-card {
            background: linear-gradient(180deg, #ffffff, #fff5fa);
            border-radius: 28px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 20px 45px rgba(176, 42, 107, .25);
            transition: all .45s cubic-bezier(.2, .9, .2, 1);
        }

        .promo-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(130deg, rgba(255, 255, 255, .35), transparent 60%);
            pointer-events: none;
        }

        .promo-card:hover {
            transform: translateY(-16px) scale(1.04);
            box-shadow: 0 35px 70px rgba(176, 42, 107, .4);
        }

        .promo-img {
            height: 80%;
            width: 100%;
            object-fit: cover;
            border-bottom: 1px solid #f2dbe5;
        }

        .promo-badge {
            position: absolute;
            top: 18px;
            left: 18px;
            background: linear-gradient(135deg, #ff5f9e, #b02a6b);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 700;
            font-size: .8rem;
            box-shadow: 0 5px 20px rgba(176, 42, 107, .5);
            animation: pulse 2s infinite;
        }

        .promo-content {
            padding: 22px;
            text-align: center;
        }

        .promo-content h4 {
            color: #b02a6b;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .promo-content p {
            color: #7c5865;
            font-size: .9rem;
        }

        .btn-promo {
            margin-top: 12px;
            width: 100%;
            border-radius: 50px;
            background: linear-gradient(135deg, #ff6f91, #b02a6b);
            color: white;
            font-weight: 700;
            padding: 13px;
            border: none;
            transition: .4s;
        }

        .btn-promo:hover {
            transform: scale(1.07);
            box-shadow: 0 10px 30px rgba(176, 42, 107, .5);
        }

        @keyframes pulse {
            0% {
                transform: scale(1)
            }

            50% {
                transform: scale(1.15)
            }

            100% {
                transform: scale(1)
            }
        }

        .promo-content {
            padding: 26px 24px 28px;
        }

        .promo-content h4 {
            font-size: 1.7rem;
            letter-spacing: .3px;
        }

        .promo-content p {
            font-size: 1.2rem;
        }

        .promo-small {
            display: block;
            margin-top: 6px;
            font-size: .7rem;
            color: #b695a3;
        }

        .promo-price {
            margin-top: auto;
            margin-bottom: 14px;
        }

        .promo-price s {
            font-size: .8rem;
            color: #c1a0ae;
            display: block;
        }

        .promo-price b {
            font-size: 1.25rem;
            color: #ff4f88;
            font-weight: 800;
        }

        .price-main {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }

        .price-old {
            font-size: .75rem;
            color: #c0a0ad;
            text-decoration: line-through;
        }

        .price-new {
            font-size: 1.4rem;
            font-weight: 900;
            color: #ff4f88;
        }

        .promo-off {
            font-size: .65rem;
            background: #ffe0ea;
            color: #b02a6b;
            padding: 6px 14px;
            border-radius: 30px;
            font-weight: 700;
            white-space: nowrap;
        }


        .carousel-control-prev,
        .carousel-control-next {
            width: 45px;
            height: 45px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #ff6f91, #b02a6b);
            border-radius: 50%;
            opacity: 1;
            box-shadow: 0 10px 30px rgba(176, 42, 107, .6);
            transition: .4s;
        }

        .carousel-control-prev {
            left: -8px;
        }

        .carousel-control-next {
            right: -8;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            transform: translateY(-50%) scale(1.15);
            box-shadow: 0 18px 45px rgba(176, 42, 107, .9);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 1.2rem;
            height: 1.2rem;
        }

        .hero-content {
            animation: heroFloat 4s ease-in-out infinite alternate;
        }

        @keyframes heroFloat {
            from {
                transform: translateY(0)
            }

            to {
                transform: translateY(-18px)
            }
        }

        .promo-card {
            opacity: 0;
            transform: translateY(40px) scale(.95);
            animation: cardUp .8s ease forwards;
        }

        .carousel-item.active .promo-card:nth-child(1) {
            animation-delay: .1s
        }

        .carousel-item.active .promo-card:nth-child(2) {
            animation-delay: .3s
        }

        .carousel-item.active .promo-card:nth-child(3) {
            animation-delay: .5s
        }

        @keyframes cardUp {
            to {
                opacity: 1;
                transform: translateY(0) scale(1)
            }
        }

        .btn-promo {
            animation: btnPulse 2.5s infinite;
        }

        @keyframes btnPulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 111, 145, .6)
            }

            70% {
                box-shadow: 0 0 0 18px rgba(255, 111, 145, 0)
            }

            100% {
                box-shadow: 0 0 0 0 rgba(255, 111, 145, 0)
            }
        }

        .carousel-control-prev,
        .carousel-control-next {
            animation: arrowFloat 3s ease-in-out infinite alternate;
        }

        @keyframes arrowFloat {
            from {
                transform: translateY(-50%)
            }

            to {
                transform: translateY(-60%)
            }
        }
        @media (max-width: 576px) {
    .promo-card {
        max-width: 340px;
    }

  

    .carousel-control-prev,
    .carousel-control-next {
        width: 42px;
        height: 42px;
        top: 50%;
        transform: translateY(-50%);
    }

    .promo-card {
        padding: 0;
    }

    .promo-img {
        width: 100%;
        height: auto;          /* mantém proporção */
        display: block;
        object-fit: contain;   /* não corta a imagem */
    }
}
section.container2 {
    position: relative;
    padding-bottom: 170px;
}
.promo-card {
    margin: 0 auto;
}
footer {
    position: relative;
    z-index: 1;
    margin-top: 80px;
}
@media (min-width: 768px) {

    .promo-card {
        max-width: 360px;
        width: 100%;
    }

    .promo-desc {
        font-size: .95rem;
        color: #7c5865;
        line-height: 1.4;
        margin-bottom: 16px;
    }

  
        .promo-img {
            width: 100%;
        }

}

    </style>

</head>

<body>
    <?php $this->load->view('cliente/includes/menu'); ?>


    <section class="hero">
        <div class="hero-glow"></div>
        <div class="hero-content">
            <h1>Promoções Especiais</h1>
            <p>Cuide de você com estilo e economia ✨</p>
            <a href="#promoCarousel" class="hero-btn">Ver Ofertas</a>
        </div>

        <svg class="hero-wave" viewBox="0 0 1440 120">
            <path fill="#fff0f6"
                d="M0,40 C120,80 240,20 360,40 480,60 600,100 720,60 840,20 960,80 1080,60 1200,40 1320,80 1440,60 L1440,120 L0,120Z" />
        </svg>
    </section>


    <section class="container d-block d-md-none mt-4">
    <div id="promoMobile" class="carousel slide" data-bs-touch="true">
        <div class="carousel-inner">

            <?php foreach ($servico_promocao->data as $i => $promocao): ?>
                <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                    <div class="promo-card mx-auto">

                        <div class="promo-badge">
                            <?php
                            $desconto = (($promocao->preco_antigo - $promocao->valor) / $promocao->preco_antigo) * 100;
                            echo round($desconto);
                            ?>%
                        </div>

                        <img src="<?= base_url('uploads/servicos/' . $promocao->foto) ?>" class="promo-img">

                        <div class="promo-content">
                            <h4><?= $promocao->nome ?></h4>
                            <p><?= $promocao->descricao  ?></p>

                            <div class="promo-price">
                                <span class="price-old">R$<?= $promocao->preco_antigo ?></span>
                                <span class="price-new">R$<?= $promocao->valor ?></span>
                            </div>

                            <a href="<?= base_url('cliente/agendar/index/' . $promocao->id); ?>" class="btn btn-promo">
                                Agendar
                            </a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <button class="carousel-control-prev" data-bs-target="#promoMobile" data-bs-slide="prev" type="button">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" data-bs-target="#promoMobile" data-bs-slide="next" type="button">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

<section class="container d-none d-md-block my-5">
    <div class="row justify-content-center gy-5">

        <?php foreach ($servico_promocao->data as $promocao): ?>
            <div class="col-lg-4 col-md-6 d-flex justify-content-center">

                <div class="promo-card h-100 d-flex flex-column">

                    <div class="promo-badge">
                        <?php
                        $desconto = (($promocao->preco_antigo - $promocao->valor) / $promocao->preco_antigo) * 100;
                        echo round($desconto);
                        ?>%
                    </div>

                    <img src="<?= base_url('uploads/servicos/' . $promocao->foto) ?>" class="promo-img">

                    <div class="promo-content d-flex flex-column flex-grow-1">

                        <h4><?= $promocao->nome ?></h4>

                        <p class="promo-desc">
                            <?= $promocao->descricao ?>
                        </p>

                        <div class="promo-price mt-auto">
                            <span class="price-old">R$<?= $promocao->preco_antigo ?></span>
                            <span class="price-new">R$<?= $promocao->valor ?></span>
                        </div>

                        <a href="<?= base_url('cliente/agendar/index/' . $promocao->id); ?>" 
                           class="btn btn-promo mt-3">
                            Agendar
                        </a>

                    </div>

                </div>

            </div>
        <?php endforeach; ?>

    </div>
</section>



    <?php $this->load->view('cliente/includes/footer') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>