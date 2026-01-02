<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- Ícones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #6366f1, #ec4899, #10b981, #818cf8);
            background-size: 300% 300%;
            animation: gradientMove 12s ease infinite;
            padding: 35px;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .profile-card {
            max-width: 850px;
            margin: auto;
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(12px);
            padding: 30px;
            border-radius: 25px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.25);
            animation: fadeIn 0.8s ease forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .profile-img {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            border: 4px solid #fff;
            object-fit: cover;
            transition: 0.3s;
            box-shadow: 0 0 20px rgba(255,255,255,0.4);
        }

        .profile-img:hover {
            transform: scale(1.05);
        }

        .btn-gradient {
            background: linear-gradient(135deg, #6366f1, #ec4899);
            border: none;
            color: white;
            padding: 8px 18px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .btn-gradient:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }

        .form-control, .form-select {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 12px;
        }

        .form-control:focus, .form-select:focus {
            border-color: #818cf8;
            box-shadow: 0 0 8px rgba(129, 140, 248, 0.5);
        }

        hr {
            border-color: rgba(255,255,255,0.6);
        }

        label {
            font-weight: 600;
            color: #111;
        }
    </style>
</head>

<body>

    <div class="profile-card">

        <h2 class="text-center mb-4 text-white fw-bold">
            <i class="bi bi-person-lines-fill"></i> Perfil do Usuário
        </h2>

        <div class="text-center">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modalFoto">
                <img src="<?= base_url('uploads/users/'.$this->session->userdata('foto')); ?>"
                     class="profile-img shadow" id="userPhoto">
            </a>

            <br><br>
            <button class="btn-gradient btn-sm" data-bs-toggle="modal" data-bs-target="#modalFoto">
                Alterar Foto
            </button>
        </div>

        <hr class="mt-4 mb-4">

        <!-- FORMULÁRIO -->
        <form method="POST" action="<?= base_url('usuario/salvarPerfil'); ?>">

            <div class="row g-3">

                <div class="col-md-6">
                    <label>Nome completo:</label>
                    <input type="text" class="form-control"
                           name="nome" value="<?= $this->session->userdata('nome'); ?>">
                </div>

                <div class="col-md-6">
                    <label>Email:</label>
                    <input type="email" class="form-control"
                           name="email" value="<?= $this->session->userdata('email'); ?>">
                </div>

                <div class="col-md-6">
                    <label>Telefone:</label>
                    <input type="text" class="form-control"
                           name="telefone" value="<?= $this->session->userdata('telefone'); ?>">
                </div>

                <div class="col-md-6">
                    <label>Status:</label>
                    <select class="form-select" name="status">
                        <option value="ativo" <?= $this->session->userdata('status') == 'ativo' ? 'selected' : '' ?>>Ativo</option>
                        <option value="inativo" <?= $this->session->userdata('status') == 'inativo' ? 'selected' : '' ?>>Inativo</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Sexo:</label>
                    <select class="form-select" name="sexo">
                        <option value="masculino" <?= $this->session->userdata('sexo') == 'masculino' ? 'selected' : '' ?>>Masculino</option>
                        <option value="feminino" <?= $this->session->userdata('sexo') == 'feminino' ? 'selected' : '' ?>>Feminino</option>
                        <option value="outro" <?= $this->session->userdata('sexo') == 'outro' ? 'selected' : '' ?>>Outro</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Endereço:</label>
                    <input type="text" class="form-control"
                           name="endereco" value="<?= $this->session->userdata('endereco'); ?>">
                </div>

            </div>

            <div class="text-end mt-4">
                <button class="btn-gradient btn-lg">
                    <i class="bi bi-check-circle"></i> Salvar Alterações
                </button>
            </div>
        </form>

    </div>


    <!-- MODAL PARA TROCAR FOTO -->
    <div class="modal fade" id="modalFoto" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Alterar Foto de Perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" action="<?= base_url('usuario/alterarFoto'); ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label class="form-label">Selecione uma nova foto:</label>
                        <input type="file" name="foto" accept="image/*" class="form-control" required>
                    </div>

                    <div class="modal-footer">
                        <button class="btn-gradient btn-sm">Enviar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
