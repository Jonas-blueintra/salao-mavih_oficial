<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
       body {
      background: linear-gradient(135deg, #0d6efd, #003a75);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

        .card {
            border-radius: 12px;
            padding: 25px;
        }

        .btn-primary {
            width: 100%;
        }

        .logo {
            width: 70px;
            margin-bottom: 15px;
        }
    </style>
  <?php $this->load->view('links_style_login\links_css') ?>

</head>
<body class="body_recuperar" >

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card _recuperar shadow-sm">

                <div class="text-center">
                    <img src="<?= base_url('assets/img/logo.png') ?>" class="logo_recuperar" alt="Logo">
                    <h4 class="mb-3">Recuperar Senha</h4>
                    <p class="text-muted">
                        Informe seu e-mail para enviarmos o link de redefinição.
                    </p>
                </div>

                <form action="<?= base_url('login/enviar_recuperacao'); ?>" method="post">

                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" 
                               name="email" 
                               class="form-control" 
                               placeholder="seuemail@exemplo.com" 
                               required>
                    </div>

                    <button type="submit" class="btn btn-primary botao_enviar mt-3">
                        Enviar link de recuperação
                    </button>

                </form>

                <div class="text-center mt-3">
                    <a href="<?= base_url('home'); ?>">Voltar ao Login</a>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
