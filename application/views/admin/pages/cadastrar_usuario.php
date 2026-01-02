



<style>
body {
    background: #f0f3f8;
    font-family: 'Inter', sans-serif;
}

/* Card principal */
.card-custom {
    border-radius: 16px;
    padding: 35px;
    background: #fff;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    animation: fadeIn 0.5s ease;
}

/* Animação */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* Área de upload */
.upload-area {
    border: 2px dashed #b8c0d1;
    padding: 35px;
    text-align: center;
    border-radius: 12px;
    cursor: pointer;
    transition: .2s;
}
.upload-area:hover {
    border-color: #0d6efd;
    background: #eef5ff;
}
.upload-area i {
    font-size: 36px;
    color: #0d6efd;
}
</style>

    <div class="card card-custom">

        <h3 class="mb-4 fw-bold">
            <i class="bi bi-person-plus"></i> Cadastro de Usuário
        </h3>

        <form id="formCadastro" enctype="multipart/form-data"  method="post"
                    action="<?= base_url('Login/cadastrar_usuario')?>">

            <div class="row g-4">

                <!-- FOTO -->
                    <label class="fw-semibold mb-2">Foto de Perfil</label>

                <div class="col-md-4">
                    <label class="upload-area" for="foto">
                        <i class="bi bi-cloud-arrow-up"></i>
                        <p class="mt-2 mb-0 text-muted">Clique ou arraste aqui</p>
                    </label>
                    <input type="file" name="foto" id="foto" class="d-none">
                </div>

                <div class="col-md-8">

                    <!-- NOME -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nome completo</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required>
                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                </div>

            </div>

            <div class="row g-4 mt-1">

                <!-- LOGIN -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Login</label>
                    <input type="text" class="form-control" id="login" name="login" placeholder="Escolha um login" required>
                </div>

                <!-- SENHA -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite uma senha" required>
                </div>

                <!-- SEXO -->
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Sexo</label>
                    <select class="form-select" name="sexo" id="sexo" required>
                        <option value="" selected>Selecione</option>
                        <option value="h">Masculino</option>
                        <option value="m">Feminino</option>
                    </select>
                </div>

                <!-- TELEFONE -->
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Telefone</label>
                    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="(00) 00000-0000">
                </div>

                <!-- STATUS -->
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Status</label>
                    <select class="form-select" name="status" id="status">
                        <option value="ativo" selected>Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>

                <!-- ENDEREÇO -->
                <div class="col-md-12">
                    <label class="form-label fw-semibold">Endereço</label>
                    <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Rua, número, bairro...">
                </div>

                <!-- TIPO -->
                <div class="col-md-12">
                    <label class="form-label fw-semibold">Tipo</label>
                    <select class="form-select" name="tipo" id="tipo">
                        <option value="cliente" selected>Cliente</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 btn-cadastrar">
        <span class="btn-text"><i class="bi bi-check-circle"></i> Cadastrar</span>
        <span class="spinner-border spinner-border-sm d-none btn-spinner" role="status" aria-hidden="true"></span>
      </button>


        </form>
    </div>

