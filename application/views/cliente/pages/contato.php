<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Contato - Salão Mavih</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php $this->load->view('links_paginas/link_cliente_home') ?>

    <style>
        :root {
            --rosa-principal: #ff4f8b;
            --rosa-claro: #f8c9d6;
            --rosa-bg: #fde4ec;
            --texto-suave: #6f5b63;
        }

        body {
            background: linear-gradient(180deg, var(--rosa-bg), #fff);
            font-family: 'Poppins', sans-serif;
        }

        h2 {
            color: var(--rosa-principal);
            font-family: 'Playfair Display', serif;
        }

        .card-contato {
            background: #fff;
            border-radius: 28px;
            padding: 35px;
            box-shadow: 0 20px 45px rgba(176, 42, 107, .25);
            border: 1px solid #f4c2d7;
        }

        .info-item {
            display: flex;
            gap: 15px;
            align-items: center;
            margin-bottom: 18px;
            color: var(--texto-suave);
        }

        .info-item i {
            font-size: 1.6rem;
            color: var(--rosa-principal);
        }

        .form-control {
            border-radius: 30px;
            padding: 14px 20px;
            border: 1px solid #f4c2d7;
        }

        .form-control:focus {
            border-color: var(--rosa-principal);
            box-shadow: 0 0 0 .2rem rgba(255, 79, 139, .25);
        }

        .btn-enviar {
            background: linear-gradient(135deg, var(--rosa-principal), var(--rosa-claro));
            color: #fff;
            font-weight: 600;
            padding: 14px;
            border-radius: 999px;
            border: none;
            transition: .3s;
        }

        .btn-enviar:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(255, 79, 139, .4);
        }

        iframe {
            border-radius: 22px;
            box-shadow: 0 12px 30px rgba(176, 42, 107, .25);
        }

        .maps {

            color: inherit;
            text-decoration: none;
        }
.maps:hover{

            color: #f4c2d7;
            
        }
        .zap {
            color: inherit;
            text-decoration: none;
        }
        .zap:hover{

            color: #f4c2d7;
            
        }
          .ligar {
            color: inherit;
            text-decoration: none;
        }
        
        .ligar:hover{

            color: #f4c2d7;
            
        }
    </style>
</head>

<body>

    <?php $this->load->view('cliente/includes/menu'); ?>

    <section class="container py-5">
        <h2 class="text-center fw-bold mb-5">Fale Conosco</h2>

        <div class="row g-5">

            <!-- INFORMAÇÕES -->
            <div class="col-lg-5">
                <div class="card-contato">

                    <h4 class="fw-bold mb-4 cor">Salão Mavih</h4>

                    <div class="info-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <a class="maps" href="https://maps.app.goo.gl/WcRByyrP6yjrWZ6s8">Rua 5 de junho
                            Capela-vinhedo<br>São Paulo - SP</a>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-whatsapp"></i>
                        <a class="zap"
                            href="https://wa.me/+5519993250801?text=Ol%C3%A1%20vim%20atravez%20do%20aplicativo%20queria%20tirar%20duvidas!">(19)
                            99325-0801</a>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-envelope-fill"></i>
                        <a class="ligar">contato@salaomavih.com.br</a>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-clock-fill"></i>
                        <span>
                           Horarios disponiveis na tela de agendar serviços
                        </span>
                    </div>

                </div>
            </div>

            <!-- FORMULÁRIO -->
            <div class="col-lg-7">
                <div class="card-contato text-center">

                    <h4 class="fw-bold mb-3 cor">Entre em Contato</h4>

                    <p class="text-muted mb-4">
                        Escolha a melhor forma de falar com a gente 💖
                        Estamos prontas para te atender!
                    </p>

                    <a href="https://wa.me/+5519993250801?text=Ol%C3%A1%20vim%20atravez%20do%20aplicativo%20queria%20tirar%20duvidas!" target="_blank" class="btn btn-enviar w-100 mb-3">
                        <i class="bi bi-whatsapp me-2"></i>
                        Falar no WhatsApp
                    </a>

                    <a href="<?= base_url('cliente/Servicos_cliente') ?>"
                        class="btn btn-outline-secondary w-100 mb-3 rounded-pill">
                        <i class="bi bi-calendar-check me-2"></i>
                        Agendar um Horário
                    </a>

                    <a  href="tel:19993250801" class="btn btn-outline-secondary w-100 mb-3 rounded-pill">
                        <i class="bi bi-telephone-fill me-2"></i>
                        Ligar Agora
                    </a>

                    <a href="https://maps.app.goo.gl/WcRByyrP6yjrWZ6s8" target="_blank"
                        class="btn btn-outline-secondary w-100 rounded-pill">
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        Ver no Mapa
                    </a>

                </div>

            </div>

        </div>

        <!-- MAPA -->
        <div class="mt-5">
            <iframe src="https://www.google.com/maps?q=Rua%20Exemplo%20123%20Centro&output=embed" width="100%"
                height="320" allowfullscreen="" loading="lazy">
            </iframe>
        </div>

    </section>

    <?php $this->load->view('cliente/includes/footer'); ?>

</body>

</html>