<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profissional | Mavih Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

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
        background: linear-gradient(180deg, var(--fundo1), var(--fundo2));
        font-family: 'Poppins', sans-serif;
    }

    .page-title {
        font-family: 'Parisienne', cursive;
        font-size: 48px;
        color: var(---cor-bg);
        text-align: center;
        margin-bottom: 10px;
        animation: fadeDown .8s ease;
    }

    .page-subtitle {
        text-align: center;
        color: var(----texto-suave);
        margin-bottom: 50px;
        animation: fadeUp .8s ease;
    }

    .equipe-card {
        background: #fff;
        border-radius: 22px;
        box-shadow: 0 15px 40px rgba(255, 79, 139, .18);
        padding: 25px;
        text-align: center;
        transition: all .4s ease;
        position: relative;
        overflow: hidden;
    }

    .equipe-card::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255, 79, 139, .15), rgba(248, 201, 214, .15));
        opacity: 0;
        transition: .4s;
    }

    .equipe-card:hover::before {
        opacity: 1;
    }

    .equipe-card:hover {
        transform: translateY(-10px);
    }

    .equipe-nome {
        font-weight: 600;
        color: var(---cor-bg);
        font-size: 20px;
    }

    .equipe-cargo {
        font-size: 14px;
        color: var(---cor-bg);
        margin-bottom: 10px;
    }



    .body-offset {
        margin-top: 140px;
    }

    .agenda-header {
        background: #ffffff;
        border-radius: 22px;
        padding: 32px;
        box-shadow: 0 8px 24px var(--blue);
    }

    @keyframes fadeDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .a {
        padding: 80px 0;
        background: var(--texto);
        /* opcional */
    }

    .equipe-card {
        background: #fff;
        border-radius: 22px;
        padding: 30px 25px;
        width: 100%;
        max-width: 360px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        transition: transform .3s ease, box-shadow .3s ease;
    }

    .equipe-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.12);
    }

    .equipe-foto {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px;
        box-shadow: 0 10px 30px var(--blue);
    }

    .equipe-meta {
        display: flex;
        justify-content: center;
        gap: 18px;
        font-size: 13px;
        color: #777;
        margin-bottom: 14px;
    }

    .meta-item i {
        color: var(--blue);
        margin-right: 6px;
    }

    .equipe-info {
        font-size: 14px;
        color: #555;
        line-height: 1.6;

        word-wrap: break-word;
        overflow-wrap: break-word;
        white-space: normal;
    }
    </style>
</head>

<body>
    <?php $this->load->view('cliente/includes/menu'); ?>

    <div class="container py-5 body-offset">
        <!-- Cabeçalho -->
        <div class="agenda-header text-center mb-5 ">
            <h1 class="page-title">Proficional</h1>
            <p class="page-subtitle">Profissionais apaixonadas por realçar sua beleza ✨</p>
        </div>

        <div class="a">
            <div class="container">
                <div class="row justify-content-center">
                    <?php foreach ($equipe->data as $Profissional): ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="equipe-card text-center mx-auto">

                            <img src="<?= base_url('uploads/usuarios/' . $Profissional->foto) ?>" class="equipe-foto">

                            <div class="equipe-nome"><?= $Profissional->nome ?></div>
                            <div class="equipe-cargo"><?= $Profissional->especialidade ?></div>

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

                            <p class="equipe-info"><?= $Profissional->descricao ?></p>

                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


    </div>

    </div>
    <?php $this->load->view('cliente/includes/footer') ?>

</body>

</html>