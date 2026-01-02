<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Editar Perfil</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


  <style>
    body {
      background: linear-gradient(135deg, #fde2e4, #fff5f7);
      font-family: Poppins, system-ui, sans-serif;
      padding-top: 110px;
    }

    .profile-card {
      background: #fff;
      border-radius: 26px;
      box-shadow: 0 14px 35px rgba(176, 42, 107, .2);
      padding: 40px;
    }

    .profile-img {
      width: 140px;
      height: 140px;
      object-fit: cover;
      border-radius: 50%;
      border: 5px solid #ff9dbf;
      box-shadow: 0 8px 22px rgba(255, 111, 145, .45);
    }

    .section-title {
      color: #b02a6b;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .form-control {
      border-radius: 20px;
    }

    .btn-save {
      background: linear-gradient(135deg, #e63982, #b02a6b);
      border: none;
      color: #fff;
      font-weight: 600;
      padding: 12px 32px;
      border-radius: 30px;
    }

    .upload-btn {
      border: 2px dashed #ff6f91;
      color: #b02a6b;
      background: #fff;
      transition: .3s;
    }

    .upload-btn:hover {
      background: #ff6f91;
      color: #fff;
    }

    /* Botão voltar – feminino premium */
    .btn-voltar {
      border: 2px solid #ff6f91;
      color: #ff4f8b;
      background: transparent;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 6px 18px rgba(255, 111, 145, 0.25);
    }

    /* Hover elegante */
    .btn-voltar:hover {
      background: linear-gradient(135deg, #ff9dbf, #ff6f91);
      color: #fff;
      transform: translateY(-2px);
      box-shadow: 0 10px 28px rgba(255, 111, 145, 0.45);
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

        <!-- FORM -->
        <form id="formPerfil" action="<?= base_url('cliente/perfil/salvar') ?>" method="post"
          enctype="multipart/form-data">

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

              <div class="text-center mb-3">

                <label for="uploadFoto" class="btn btn-outline-pink px-4 py-2 rounded-pill shadow-sm upload-btn">
                  <i class="bi bi-camera"></i> Trocar Foto
                </label>

                <input type="file" id="uploadFoto" name="foto" hidden accept="image/*">

                <div id="nomeArquivo" class="small text-muted mt-2">Nenhum arquivo selecionado</div>

              </div>


              <h3 class="fw-bold"><?= $usuario->data->nome ?></h3>
            </div>

            <!-- DADOS PESSOAIS -->
            <h5 class="section-title"><i class="bi bi-person"></i> Dados Pessoais</h5>
            <div class="row g-3 mb-4">

              <div class="col-md-6">
                <label>Nome</label>
                <input name="nome" class="form-control" value="<?= $usuario->data->nome ?>">
              </div>

              <div class="col-md-6">
                <label>Email</label>
                <input name="email" type="email" class="form-control" value="<?= $usuario->data->email ?>">
              </div>

              <div class="col-md-4">
                <label>Sexo</label>
                <select name="sexo" class="form-control">
                  <option value="m" <?= $usuario->data->sexo == 'm' ? 'selected' : '' ?>>Masculino</option>
                  <option value="f" <?= $usuario->data->sexo == 'f' ? 'selected' : '' ?>>Feminino</option>
                </select>
              </div>

              <div class="col-md-4">
                <label>Telefone</label>
                <input name="telefone" class="form-control" value="<?= $usuario->data->telefone ?>">
              </div>

              <div class="col-md-4">
                <label>Endereço</label>
                <input name="endereco" class="form-control" value="<?= $usuario->data->endereco ?>">
              </div>
            </div>

            <!-- DADOS DE ACESSO -->
            <h5 class="section-title"><i class="bi bi-shield-lock"></i> Dados de Acesso</h5>
            <div class="row g-3 mb-4">

              <div class="col-md-6">
                <label>Login</label>
                <input class="form-control" value="<?= $usuario->data->login ?>" readonly>
              </div>

              <div class="col-md-6">
                <label>Nova Senha</label>
                <input type="password" name="senha" class="form-control" placeholder="Deixe em branco para não alterar">
              </div>


            </div>

            <!-- AÇÕES -->
            <div class="text-center mt-4">
              <button type="submit" class="btn btn-save">
                <i class="bi bi-save"></i> Salvar Alterações
              </button>
            </div>

          </div>

        </form>
      </div>
    </div>
  </div>

  <?php $this->load->view('cliente/includes/footer'); ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    const form = document.getElementById('formPerfil');
    console.log(form);
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      const formData = new FormData(form);

      fetch(form.action, {
        method: "POST",
        body: formData
      })
        .then(r => r.json())
        .then(response => {
          console.log(response, 'jonas');
          if (response.error == "0") {
            Swal.fire({
              icon: "success",
              title: "Sucesso!",
              text: response.msg
            }).then(() => {
              window.location.href = "<?= base_url('cliente/perfil') ?>";
            });

          } else {
            Swal.fire({
              icon: "error",
              title: "Erro!",
              text: response.msg
            });
          }

        })
        .catch(() => {
          Swal.fire({
            icon: "error",
            title: "Erro",
            text: "Erro ao enviar os dados."
          });
        });
    });

  </script>
  <script>
    document.getElementById('uploadFoto').addEventListener('change', function (e) {
      const file = e.target.files[0];
      if (!file) return;

      // Preview
      const reader = new FileReader();
      reader.onload = () => document.querySelector('.profile-img').src = reader.result;
      reader.readAsDataURL(file);

      // Nome do arquivo
      document.getElementById('nomeArquivo').innerText = file.name;
    });
  </script>

</body>

</html>