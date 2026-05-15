<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Meu Perfil — Prévia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
        font-family: Poppins, system-ui, sans-serif
    }

    .profile-card {
        background: #fff;
        border-radius: 26px;
        box-shadow: 0 14px 35px rgba(176, 42, 107, .2);
        padding: 40px
    }

    .profile-img {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: 0 8px 22px var(--blue)
    }

    .badge-status {
        background: linear-gradient(135deg, #4caf50, #2e7d32);
        color: #fff;
        border-radius: 999px;
        padding: 6px 18px;
        font-size: .85rem
    }

    .section-title {
        color: var(--cor-bg);
        font-weight: 600;
        margin-bottom: 20px
    }

    .form-control {
        border-radius: 20px
    }

    .btn-save {
        background: var(--blue);
        border: none;
        color: #fff;
        font-weight: 600;
        padding: 12px 28px;
        border-radius: 30px
    }

    body {
        padding-top: 110px;
    }

    /* Botão voltar – feminino premium */
    .btn-voltar {
        border: 2px solid var(--cor-bg);
        color: var(--cor-bg);
        background: transparent;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 6px 18px var(--blue)
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

    /* Wrapper do botão voltar */
    .btn-voltar-wrapper {
        position: fixed;
        top: 90px;
        /* abaixo do menu */
        left: 20px;
        z-index: 9999;
        /* maior que o menu */
    }

    /* Mobile ajuste fino */
    @media (max-width: 576px) {
        .btn-voltar-wrapper {
            top: 85px;
            left: 12px;
        }
    }

    /* Card como referência */
    .profile-card {
        position: relative;
    }

    /* Botão voltar dentro do card */
    .profile-card .btn-voltar-wrapper {
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 5;
    }

    /* Mobile ajuste */
    @media (max-width: 576px) {
        .profile-card .btn-voltar-wrapper {
            top: 15px;
            left: 15px;
        }
    }
    </style>
</head>

<body>
    <?php $this->load->view('cliente/includes/menu'); ?>



    <div class="container my-5">

        <div class="row justify-content-center">
            <div class="col-lg-9">

                <div class="profile-card">
                    <div class="btn-voltar-wrapper">
                        <button class="btn btn-voltar rounded-pill px-3 py-1 d-inline-flex align-items-center gap-2"
                            onclick="window.history.back()">

                            <i class="bi bi-arrow-left icon-voltar"></i>
                            Voltar
                        </button>
                    </div>

                    <!-- TOPO -->
                    <div class="text-center mb-4">
                        <img src="<?= base_url('uploads/usuarios/' . $usuario->data->foto) ?>" class="profile-img mb-3">
                        <h3 class="fw-bold"><?= $usuario->data->nome ?></h3>
                        <span class="badge badge-status"><?= $usuario->data->status ?></span>
                    </div>

                    <!-- DADOS PESSOAIS -->
                    <h5 class="section-title"><i class="bi bi-person"></i> Dados Pessoais</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label>Nome</label>
                            <input class="form-control" value="<?= $usuario->data->nome ?>" readonly>
                        </div>

                        <div class="col-md-6">
                            <label>Email</label>
                            <input class="form-control" value="<?= $usuario->data->email ?>" readonly>
                        </div>

                        <div class="col-md-4">
                            <label>Sexo</label>
                            <input class="form-control" value="<?php if ($usuario->data->sexo == 'm'):
                echo 'Masculino';
              else:
                echo 'Feminino';
              endif; ?>" readonly>
                        </div>

                        <div class="col-md-4">
                            <label>Telefone</label>
                            <input class="form-control" value="<?= $usuario->data->telefone ?>" readonly>
                        </div>

                        <div class="col-md-4">
                            <label>Endereço</label>
                            <input class="form-control" value="<?= $usuario->data->endereco ?>" readonly>
                        </div>
                    </div>

                    <!-- DADOS DE ACESSO -->
                    <h5 class="section-title"><i class="bi bi-shield-lock"></i> Dados de Acesso</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label>Login</label>
                            <input class="form-control" value="<?= $usuario->data->login ?>" readonly>
                        </div>

                        <div class="col-md-4">
                            <label>Senha</label>
                            <div class="input-group">
                                <input type="password" id="senha" class="form-control"
                                    value="<?=$usuario->data->senha?>" readonly>
                                <span class="input-group-text" style="cursor:pointer" onclick="toggleSenha()">
                                    <i id="iconSenha" class="bi bi-eye"></i>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Tipo</label>
                            <input class="form-control" value="<?= $usuario->data->tipo ?>" readonly>
                        </div>
                    </div>

                    <!-- INFORMAÇÕES DO SISTEMA -->
                    <h5 class="section-title"><i class="bi bi-info-circle"></i> Informações do Sistema</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label>Status</label>
                            <input class="form-control" value="<?= $usuario->data->status ?>" readonly>
                        </div>

                        <div class="col-md-6">
                            <label>Data de Cadastro</label>
                            <input class="form-control"
                                value="<?= date("d/m/Y", strtotime($usuario->data->data_cadastro)).' as '.date("H:i:s", strtotime($usuario->data->data_cadastro))  ?>"
                                readonly>
                        </div>
                    </div>

                    <!-- AÇÕES -->
                    <div class="text-center mt-4">
                        <a class="btn btn-save" href="<?= base_url('cliente/perfil/editar_perfil') ?>">
                            <i class="bi bi-pencil"></i> Editar Perfil
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('cliente/includes/footer') ?>

    <script>
    function toggleSenha() {
        const input = document.getElementById('senha');
        const icon = document.getElementById('iconSenha');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    }
    </script>

</body>

</html>