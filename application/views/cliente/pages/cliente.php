<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salão BellaVida - Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Bootstrap -->

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
    }

    /* ===== BODY ===== */
    .body_cliente_home {
        background: linear-gradient(180deg, #121212, #1c1c1c);
        color: var(--texto);
    }


    .hero {
        position: relative;
        height: 100vh;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
    }

    .hero-video {
        position: absolute;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        transform: translate(-50%, -50%);
        object-fit: cover;
        z-index: 1;
    }

    .hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        /* overlay elegante */
        z-index: 2;
    }

    .hero-content {
        position: relative;
        z-index: 3;
        text-shadow: 0 4px 20px rgba(0, 0, 0, .8);
        animation: fadeIn 1.5s ease;
    }



    /* ===== SEÇÕES ===== */
    section h2 {
        color: var(--cor-principal);
    }

    section h2::after {
        background: linear-gradient(90deg, var(--cor-principal), #ffffff);
    }

    section h2::after {
        content: "";
        display: block;
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, var(--rosa-principal), var(--rosa-claro));
        margin: 15px auto 0;
        border-radius: 10px;
    }

    /* ===== CARDS GERAIS ===== */
    .card {
        background: var(--cor-card);
        color: var(--texto);
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 60px rgba(255, 79, 139, .3);
    }

    /* ===== SERVIÇOS ===== */
    .service-card img {
        border-radius: 18px;
    }

    .service-card h5 {
        color: var(--rosa-principal);
    }



    .service-card .btn:hover {
        filter: brightness(1.05);
    }

    /* ===== CARROSSEL ===== */
    .carousel-inner {
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(30, 58, 138, 0.3);
    }

    /* ===== EQUIPE ===== */
    #equipe .card {
        padding-top: 30px;
    }

    #equipe img {
        /* border: 5px solid var(--blue); */
        box-shadow: 0 10px 30px var(--blue);
        transition: transform .4s ease;
    }

    #equipe .card:hover img {
        transform: scale(1.08);
    }

    #equipe h5 {
        color: var(--rosa-principal);
        margin-top: 15px;
    }

    #equipe p {
        color: var(--texto-suave);
    }

    /* ===== AVALIAÇÕES ===== */
    #avaliacoes .card {
        font-style: italic;
    }

    /* ===== FADE ANIMATION ===== */
    .fade-up {
        opacity: 0;
        transform: translateY(30px);
        transition: all .8s ease;
    }

    .fade-up.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* ===== DARK MODE (se usar) ===== */
    body.dark {
        background: #1c1c1c;
        color: #fff;
    }

    body.dark .card {
        background: #2b2b2b;
        color: #fff;
    }

    .stars {
        color: #ffb703;
        font-size: 1.3rem;
        margin-bottom: 10px;
    }

    .nova-avaliacao {
        background: #fff;
        border-radius: 30px;
        padding: 35px;
        box-shadow: 0 18px 40px rgba(176, 42, 107, .25);
    }

    .rating i {
        font-size: 2rem;
        color: var(--blue);
        cursor: pointer;
        transition: .3s;
    }

    .rating i:hover,
    .rating i.active {
        color: var(--blue);
    }

    .btn-avaliar {
        background: linear-gradient(135deg, var(--blue), var(--cor-principal));
        color: #fff;
        font-weight: 600;
        padding: 12px;
        border-radius: 999px;
    }




    .avaliacao-card {
        max-width: 360px;
        margin: auto;
        background: #fff;
        border-radius: 28px;
        padding: 26px;
        border: 1px solid #f4c2d7;
    }

    .avaliacao-topo {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
    }



    .avaliacao-card {
        background: var(--texto);
        border-radius: 28px;
        padding: 28px;
        transition: transform .35s ease, box-shadow .35s ease;
    }

    .avaliacao-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 32px 70px var(--blue);
    }

    .avaliacao-avatar {
        width: 62px;
        height: 62px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 8px 22px var(--blue);
    }

    .avaliacao-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .avaliacao-nome {
        font-weight: 700;
        font-size: 1.05rem;
        color: var(--cor-secundaria);
    }

    .stars {
        line-height: 1;
    }

    .star {
        font-size: 1.15rem;
        color: var(--blue);
        margin-right: 2px;
    }

    .star.filled {
        color: var(--blue);
    }

    .avaliacao-data {
        font-size: .75rem;
        color: var(--texto-suave);
    }

    .avaliacao-texto {
        color: #6f5b63;
        font-size: .95rem;
        font-style: italic;
        line-height: 1.6;
        padding-left: 6px;
        border-left: 3px solid var(--blue);
    }

    .avaliacao-convite {
        display: flex;
        justify-content: center;
        margin: 60px 0 30px;
    }

    .avaliacao-convite-card {
        position: relative;
        background: linear-gradient(160deg, #fff1f7, #ffffff);
        border-radius: 36px;
        padding: 42px 34px;
        max-width: 560px;
        text-align: center;
        box-shadow: 0 30px 70px rgba(176, 42, 107, 0.25);
        border: 1px solid #f7c6dc;
        animation: cardFloat 5s ease-in-out infinite;
    }

    /* selo exclusivo */
    .convite-selo {
        position: absolute;
        top: 18px;
        right: 22px;
        background: linear-gradient(135deg, #ff6f91, #b02a6b);
        color: #fff;
        font-size: .65rem;
        font-weight: 700;
        letter-spacing: 1px;
        padding: 6px 12px;
        border-radius: 999px;
        box-shadow: 0 6px 18px rgba(176, 42, 107, .45);
    }

    .convite-icon {
        font-size: 3rem;
        margin-bottom: 14px;
        animation: pulseSoft 2.5s infinite;
    }

    .avaliacao-convite-card h3 {
        font-weight: 800;
        color: #b02a6b;
        margin-bottom: 14px;
    }

    .avaliacao-convite-card p {
        color: #6f5b63;
        font-size: 1.05rem;
        line-height: 1.6;
        margin-bottom: 14px;
    }

    .avaliacao-convite-card span {
        font-size: .9rem;
        color: #9b7a88;
    }

    .convite-seta {
        font-size: 2.6rem;
        margin-top: 18px;
        color: #ff6f91;
        animation: arrowBounce 1.8s infinite;
    }

    /* animações delicadas */
    @keyframes cardFloat {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }

        100% {
            transform: translateY(0);
        }
    }

    @keyframes pulseSoft {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.12);
        }

        100% {
            transform: scale(1);
        }
    }

    @keyframes arrowBounce {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(8px);
        }

        100% {
            transform: translateY(0);
        }
    }

    .avaliacao-convite {
        display: flex;
        justify-content: center;
        align-items: center;
        /* 👈 garante centro visual */
        width: 100%;
    }

    .avaliacao-convite-card {
        margin: 0 auto;
        /* 👈 centraliza de vez */
    }

    .avaliacao-convite {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        padding: 0 16px;
        /* respiro no mobile */
    }

    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;600&display=swap');

    /* Fade animation */
    .fade-up {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease;
    }

    .fade-up.show {
        opacity: 1;
        transform: translateY(0);
    }



    /* Tipografia */
    .sobre-nos-titulo {
        color: var(--rosa-principal);
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
    }

    .sobre-nos-texto {
        color: var(--texto-suave);
        font-family: 'Poppins', sans-serif;
        font-size: 1.15rem;
        line-height: 1.75;
        margin-bottom: 20px;
    }

    /* Botão estilizado */
    .sobre-nos-btn {
        border-radius: 40px;
        font-weight: 600;
        font-size: 1.1rem;
        border: solid 2px blue;
        color: var(--texto-claro);
        background: linear-gradient(135deg, var(--rosa-principal), var(--rosa-claro));
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .sobre-nos-btn:hover {
        box-shadow: 0 12px 30px blue;
        transform: translateY(-4px);
    }

    /* Responsividade */
    @media (max-width: 991px) {
        #sobre-nos h3 {
            font-size: 2rem;
            text-align: center;
        }

        #sobre-nos p {
            text-align: center;
        }

        .sobre-nos-btn {
            display: block;
            margin: 20px auto 0;
        }
    }

    .sobre-nos-imagem {
        width: 300px;
        height: 700px;
        object-fit: cover;
        /* importante para vídeo/imagem preencher e cortar o excesso */
        border-radius: 16px;
        /* opcional: cantos arredondados */
    }

    .hero-content h1 {
        font-family: 'Playfair Display', serif;
        font-weight: 900;
        font-size: clamp(3.5rem, 6vw, 5rem);
        color: #c59d5f;
        text-shadow: 0 5px 20px rgba(0, 0, 0, 0.8);
        margin-bottom: 0.5rem;
        letter-spacing: 0.05em;
    }

    .hero-content p {
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        font-size: 1.25rem;
        color: #ffffffff;
        margin-top: 1rem;
        letter-spacing: 0.03em;
        line-height: 1.5;
    }

    .hero-content a.btn {
        background: linear-gradient(135deg, var(--rosa-principal), var(--rosa-claro));
        color: white !important;
        font-weight: 700;
        padding: 14px 40px;
        border-radius: 50px;
        box-shadow: 0 10px 30px rgba(255, 79, 139, 0.4);
        transition: all 0.3s ease;
        font-size: 1.1rem;
        display: inline-block;
        margin-top: 1.5rem;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
    }

    .hero-content a.btn:hover {
        filter: brightness(1.1);
        transform: translateY(-5px);
        box-shadow: 0 18px 50px rgba(255, 79, 139, 0.55);
        text-decoration: none;
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
        background: var(--blue);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 25px var(--blue);
    }

    /* Badge custom */
    .badge-agenda {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        background: linear-gradient(135deg, #ff98b7ff, #ff5c8a);
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

    .cor {
        color: var(--cor-principal) !important;
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
        background: linear-gradient(135deg, #000, #000);
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






    .service-card {
        border-radius: 28px;
        overflow: hidden;
        background: #ffffff;
        transition: all .35s ease;
        box-shadow: 0 10px 28px blue;
        height: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid #000;
    }

    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.25);
    }

    .service-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .service-card h4 {
        color: var(--cor-bg);
        font-weight: 600;
    }

    .price-tag {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--cor-bg);
        margin-bottom: 8px;
    }

    .badge-time {
        background: var(--cor-bg);
        color: var(--texto);
        font-weight: 500;
        border-radius: 20px;
        font-size: .9rem;
    }

    .service-card p.text-muted {
        color: var(--texto-suave) !important;
        font-size: .95rem;
    }

    .service-card .btn {
        background: linear-gradient(135deg, #000000, #000000);
        border: none;
        color: #fff;
        font-weight: 600;
        padding: 12px;
        transition: .3s;
    }

    .service-card .btn:hover {
        background: linear-gradient(135deg, #1f2937, #1e3a8a);
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
        background: blue;
        border-radius: 50%;
        opacity: 1;
        box-shadow: 0 8px 22px rgba(blue, 0.45);
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
        box-shadow: 0 12px 30px rgba(black, 0.45);
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



    .confira-servicos-header {
        max-width: 600px;
        margin: 0 auto;
    }

    .confira-servicos-header .header-icon {
        font-size: 3rem;
        color: var(--blue);
        animation: pulseSoft 3s infinite ease-in-out;
    }

    .confira-servicos-header h1 {
        font-family: 'Playfair Display', serif;
        color: var(--rosa-principal);
    }

    .confira-servicos-header p {
        font-size: 1.1rem;
        color: #6f5b63;
    }

    .badge-servicos {
        background: linear-gradient(135deg, var(--blue), var(--cor-principal));
        color: #fff;
        font-weight: 600;
        border-radius: 30px;
        display: inline-flex;
        align-items: center;
        transition: filter 0.3s ease;
    }

    .badge-servicos:hover {
        filter: brightness(1.1);
        text-decoration: none;
    }

    .badge-servicos i {
        font-size: 1.2rem;
    }

    @keyframes pulseSoft {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }
    }

    .equipe-meta {
        display: flex;
        justify-content: center;
        gap: 18px;
        font-size: 15px;
        color: #777;
        margin-bottom: 14px;
        margin-top: 15px;
    }

    .meta-item i {
        color: var(--blue);
        margin-right: 6px;
    }
    </style>

</head>

<body class="body_cliente_home">

    <!-- menu -->
    <?php $this->load->view('cliente/includes/menu');
    ?>


    <!-- HERO -->
    <!-- <section class="hero">
        <div>
            <h1 class="display-3 fw-bold">Realce Sua Beleza</h1>
            <p class="lead mt-3">Transformação, estilo e bem-estar em um único lugar</p>
            <a href="#servicos" class="btn btn-light btn-lg mt-4 shadow">Agendar Agora</a>
        </div>
    </section> -->
    <section class="hero mt-5">
        <video class="hero-video" autoplay muted loop playsinline preload="auto">
            <source src="<?= base_url('video_home_cliente/transferir.mp4') ?>" type="video/mp4">
        </video>
        <div class="hero-content">
            <h1 class="display-3 fw-bold">Seu Visual, Seu Poder</h1>
            <p class="lead mt-3">Do corte à barba, elevamos seu estilo</p>
            <a href="<?= base_url('cliente/Servicos_cliente') ?>" class="btn btn-light btn-lg mt-4 shadow">
                Agendar Agora
            </a>
        </div>
    </section>
    <section id="sobre-nos" class="container py-5">
        <h2 class="text-center fw-bold mb-5 fade-up"><?= $informacoes->nome_salao ?></h2>
        <div class="row align-items-center gy-4">
            <div class="col-lg-6 fade-up sobre-nos-imagem-wrapper">
                <video class="img-fluid w-100 sobre-nos-imagem" autoplay muted loop playsinline preload="auto">
                    <source src="<?= base_url('video_home_cliente/transferir2.mp4') ?>" type="video/mp4" />
                    Seu navegador não suporta vídeo.
                </video>
            </div>

            <div class="col-lg-6 fade-up">
                <h3 class="fw-bold mb-4 sobre-nos-titulo">Bem-vindo à Barbearia Ellite</h3>

                <p class="sobre-nos-texto">
                    A Barbearia Ellite atua no mercado oferecendo cortes modernos, barba e cuidados masculinos com
                    qualidade,
                    precisão e estilo. Nosso compromisso é elevar a sua aparência, valorizando sua identidade e
                    presença.
                </p>

                <p class="sobre-nos-texto">
                    Trabalhamos com técnicas atualizadas, profissionais especializados e produtos de alta qualidade.
                    Aqui, cada atendimento é único, focado no seu conforto e na sua satisfação, em um ambiente pensado
                    para quem valoriza estilo, atitude e um bom atendimento.
                </p>

                <a href="<?= base_url('cliente/Servicos_cliente') ?>" class="btn sobre-nos-btn mt-4 px-5 py-3">
                    Conheça nossos serviços
                </a>
            </div>
        </div>
    </section>

    <!-- SERVIÇOS -->
    <section id="servicos" class="container py-5">
        <h2 class="text-center fw-bold mb-5 fade-up">Nossos Serviços & Preços</h2>

        <div class="container ">

            <div id="carouselServicos" class="carousel slide carousel-agenda" data-bs-ride="false">
                <div class="carousel-inner">

                    <?php
                    $active = true;
                    foreach ($mostrar_serviços->data as $ser):
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

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselServicos"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselServicos"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>
    <div class="confira-servicos-header text-center my-5">
        <div class="header-icon mb-3">✂️</div>

        <h1 class="fw-bold cor mb-2">Nossos Serviços de Barbearia</h1>

        <p class=" mb-3" style="color:#fff">
            Cortes modernos, barba na régua e estilo de verdade.
            Escolha o serviço ideal e eleve seu visual com a Barbearia Ellite. 💈
        </p>

        <a href="<?= base_url('cliente/Servicos_cliente') ?>"
            class="badge badge-servicos px-4 py-2 text-decoration-none">
            <i class="bi bi-list-stars me-1"></i>
            Ver Serviços<i class="bi bi-arrow-right-short ms-2"></i>
        </a>
    </div>

    <!-- EQUIPE -->
    <section id="equipe" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5 fade-up">Profissional</h2>

            <div class="row g-4">
                <?php $total = count($equipe->data); ?>

                <?php foreach ($equipe->data as $membro): ?>

                <?php
                    $classeCol = 'col-md-4';

                    if ($total == 1)
                        $classeCol = 'col-md-4 offset-md-4';
                    if ($total == 2)
                        $classeCol = 'col-md-4 offset-md-2';
                    ?>

                <div class="<?= $classeCol ?> fade-up">
                    <div class="card text-center p-3">
                        <img src="<?= base_url('uploads/usuarios/' . $membro->foto) ?>" class="rounded-circle mx-auto"
                            style="width: 150px; height: 150px;">
                        <div class="equipe-meta">
                            <div class="meta-item">
                                <i class="bi bi-person"></i>
                                23 anos
                            </div>
                            <div class="meta-item">
                                <i class="bi bi-geo-alt"></i>
                                Vinhedo
                            </div>
                        </div>
                        <h5 class="mt-3"><?= $membro->nome ?></h5>
                        <p><?= $membro->especialidade ?></p>
                        <p class="equipe-info"><?= $membro->descricao ?></p>

                    </div>
                </div>

                <?php endforeach; ?>


            </div>
        </div>
    </section>
    <section id="avaliacoes" class="container py-5">

        <h2 class="text-center fw-bold mb-5 cor">Avaliações</h2>
        <?php if ($comentario): ?>
        <div id="carouselAvaliacoes" class="carousel slide carousel-agenda" data-bs-ride="carousel"
            data-bs-interval="4500" data-bs-pause="false">

            <div class="carousel-inner">

                <?php $i = 0; ?>
                <?php foreach ($comentario as $avaliacao): ?>
                <div class="carousel-item <?= $i == 0 ? 'active' : '' ?> my-4">
                    <div class="row justify-content-center g-4">
                        <div class="agenda-col col-12 col-md-4 d-flex">
                            <div class="agenda-card avaliacao-card w-100">
                                <div class="avaliacao-topo">
                                    <img src="<?= base_url('uploads/usuarios/' . $avaliacao->foto) ?>"
                                        class="avaliacao-avatar">

                                    <div class="avaliacao-info">
                                        <span class="avaliacao-nome"><?= $avaliacao->nome ?></span>

                                        <div class="stars">
                                            <?php for ($s = 1; $s <= 5; $s++): ?>
                                            <?php if ($s <= $avaliacao->estrelas): ?>
                                            <span class="star filled">★</span>
                                            <?php else: ?>
                                            <span class="star">★</span>
                                            <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>

                                        <span class="avaliacao-data">
                                            <?= date('d/m/Y', strtotime($avaliacao->data_comentario)); ?>
                                        </span>
                                    </div>
                                </div>

                                <p class="avaliacao-texto"><?= $avaliacao->comentario ?></p>
                            </div>

                        </div>
                    </div>
                </div>
                <?php $i++; endforeach; ?>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselAvaliacoes"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselAvaliacoes"
                data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>
        <?php else: ?>
        <div class="avaliacao-convite-card">

            <div class="convite-selo">EXCLUSIVO</div>
            <div class="convite-icon">💖</div>
            <h3>Que tal ser a primeira a avaliar?</h3>
            <p>
                Sua experiência é única.<br>
                Compartilhe como foi seu momento no <strong>Mavih Studio</strong>.
            </p>
            <span>
                Seu comentário aparecerá logo abaixo e ajudará outras clientes a se sentirem seguras ✨
            </span>
            <div class="convite-seta">↓</div>
        </div>
        </div>
        <?php endif; ?>
        <!-- Nova Avaliação -->
        <form action="<?= base_url('cliente/home/salvar') ?>" method="POST" id="formAvaliacao">

            <div class="row justify-content-center my-5">
                <div class="col-lg-6">
                    <div class="card nova-avaliacao shadow-lg">

                        <h5 class=" text-center mb-3" style="color: #000;">Deixe sua Avaliação</h5>

                        <div class="rating text-center mb-3">
                            <i class="bi bi-star" data-value="1"></i>
                            <i class="bi bi-star" data-value="2"></i>
                            <i class="bi bi-star" data-value="3"></i>
                            <i class="bi bi-star" data-value="4"></i>
                            <i class="bi bi-star" data-value="5"></i>
                        </div>

                        <input type="hidden" name="rating" id="rating">

                        <textarea name="comentario" class="form-control mb-3"
                            placeholder="Conte como foi sua experiência..." required></textarea>

                        <button type="submit" class="btn btn-avaliar w-100">Enviar Avaliação</button>

                    </div>
                </div>
            </div>

        </form>


    </section>


    <!-- CONTATO -->
    <?php $this->load->view('cliente/includes/footer') ?>

    <!-- Scripts -->

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

    function fadeCheck() {
        document.querySelectorAll('.fade-up').forEach(el => {
            if (el.getBoundingClientRect().top < window.innerHeight - 60) {
                el.classList.add('show');
            }
        });
    }
    window.addEventListener('scroll', fadeCheck);
    window.addEventListener('load', fadeCheck);

    // Fade efeito
    const fadeElements = document.querySelectorAll('.fade-up');

    function fadeCheck() {
        fadeElements.forEach(el => {
            if (el.getBoundingClientRect().top < window.innerHeight - 60) {
                el.classList.add('show');
            }
        });
    }
    window.addEventListener('scroll', fadeCheck);
    fadeCheck();

    // Dark Mode
    document.getElementById('toggleDark').addEventListener('click', function() {
        document.body.classList.toggle('dark');
        let icon = this.querySelector("i");

        if (document.body.classList.contains("dark")) {
            icon.classList.replace("bi-moon-stars", "bi-brightness-high");
            this.classList.replace("btn-outline-light", "btn-light");
        } else {
            icon.classList.replace("bi-brightness-high", "bi-moon-stars");
            this.classList.replace("btn-light", "btn-outline-light");
        }
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    document.querySelectorAll('#carouselAvaliacoes.carousel-agenda').forEach(carousel => {

        if (window.innerWidth < 768) return;

        const items = carousel.querySelectorAll('.carousel-item');
        const total = items.length;

        items.forEach((el, i) => {

            for (let n = 1; n < 3; n++) { // 3 cards por slide
                let next = i + n;
                if (next >= total) return;

                const clone = items[next]
                    .querySelector('.agenda-col')
                    .cloneNode(true);

                el.querySelector('.row').appendChild(clone);
            }

        });
    });

    const stars = document.querySelectorAll('.rating i');
    const ratingInput = document.getElementById('rating');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            ratingInput.value = value;

            stars.forEach(s => {
                if (s.getAttribute('data-value') <= value) {
                    s.classList.add('active');
                    s.classList.remove('bi-star');
                    s.classList.add('bi-star-fill');
                } else {
                    s.classList.remove('active');
                    s.classList.remove('bi-star-fill');
                    s.classList.add('bi-star');
                }
            });
        });
    });
    document.getElementById('formAvaliacao').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = this;
        const formData = new FormData(form);

        if (!formData.get('rating')) {
            Swal.fire("Ops!", "Selecione as estrelas ⭐", "warning");
            return;
        }

        fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(r => r.json())
            .then(resp => {
                if (resp.error == 0) {
                    Swal.fire({
                        title: "Obrigado!",
                        text: resp.msg,
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });

                    form.reset();
                    document.querySelectorAll('.rating i').forEach(i => {
                        i.classList.remove('bi-star-fill', 'active');
                        i.classList.add('bi-star');
                    });

                } else {
                    Swal.fire("Erro", resp.msg, "error");
                }

            });
    });
    </script>




</body>

</html>