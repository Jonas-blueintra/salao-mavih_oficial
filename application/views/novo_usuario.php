<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <base href="<?php echo base_url(); ?>">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro de Usuário</title>

  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <?php $this->load->view('links_style_login/links_css') ?>
</head>

<body class="body_usuario">

  <div class="card shadow p-4" style="max-width: 550px; width: 100%; margin: 40px auto;">
    <h3 class="text-center mb-3 text-primary"><i class="bi bi-person-plus"></i> Cadastro de Usuário</h3>
    <p class="text-center text-muted mb-4">Preencha os dados abaixo para criar seu acesso.</p>

    <!-- NOTICE: id added aqui para compatibilidade -->
    <form id="formAddUsuario" enctype="multipart/form-data" method="post"
      action="<?php echo base_url('Login/cadastrar_usuario') ?>">

      <!-- NOME -->
      <div class="mb-3">
        <label class="form-label">Nome completo</label>
        <input type="text" name="nome" class="form-control" placeholder="Digite seu nome" required>
      </div>

      <!-- EMAIL -->
      <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" placeholder="Digite seu e-mail" required>
      </div>

      <!-- LOGIN -->
      <div class="mb-3">
        <label class="form-label">Login</label>
        <input type="text" name="login" class="form-control" placeholder="Escolha um login" required>
      </div>

      <!-- SENHA -->
      <div class="mb-3">
        <label class="form-label">Senha</label>
        <input type="password" name="senha" class="form-control" placeholder="Digite sua senha" required>
      </div>

      <!-- FOTO -->
      <div class="mb-3">
        <label class="form-label">Foto</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
      </div>

      <!-- SEXO -->
      <div class="mb-3">
        <label class="form-label" for="sexo">Sexo</label>
        <select name="sexo" class="form-select form-control" required>
          <option value="">Selecione</option>
          <option value="m">Masculino</option>
          <option value="f">Feminino</option>
        </select>
      </div>

      <!-- TELEFONE -->
      <div class="mb-3">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone" class="form-control" placeholder="(00) 00000-0000" required>
      </div>

      <!-- ENDEREÇO -->
      <div class="mb-3">
        <label class="form-label">Endereço</label>
        <input type="text" name="endereco" class="form-control" placeholder="Rua, número, bairro...">
      </div>

      <!-- BOTÃO -->
      <button type="submit" class="btn btn-primary w-100 py-2 btn-usuario">
        <span class="btn-text"><i class="bi bi-check-circle"></i> Cadastrar</span>
        <span class="spinner-border spinner-border-sm d-none btn-spinner" role="status" aria-hidden="true"></span>
      </button>

    </form>

    <div class="text-center mt-3">
      <a href="<?php echo base_url('login') ?>" class="text-primary">Já tem conta? Fazer login</a>
    </div>
  </div>

  <!-- SCRIPTS NECESSÁRIOS (jQuery, SweetAlert2, Bootstrap JS) -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>$(function () {
      const form = $("#formAddUsuario");
      if (!form.length) return;

      const btn = form.find(".btn-usuario");
      const btnText = form.find(".btn-text");
      const btnSpinner = form.find(".btn-spinner");
      const originalText = btnText.text();

      form.on("submit", function (e) {
        e.preventDefault();

        let fd = new FormData(this);

        $.ajax({
          url: form.attr("action"),
          method: "POST",
          data: fd,
          contentType: false,
          processData: false,
          dataType: "json",

          beforeSend: function () {
            btn.prop("disabled", true);
            btnText.addClass("d-none");
            btnSpinner.removeClass("d-none");
          },

          success: function (json) {
            // Validação básica da resposta
            if (!json || typeof json.error === "undefined") {
              Swal.fire("Erro", "Resposta inválida do servidor.", "error");
              return;
            }

            const isOk = json.error == "0";

            Swal.fire({
              icon: isOk ? "success" : "error",
              title: isOk ? "Sucesso" : "Erro",
              text: json.msg || ""
            }).then(() => {

              if (isOk) {
                // redireciona sempre para login
                let base = $("base").attr("href") || "";
                window.location.href = base + "login";
                return;
              }

            });


          },

          error: function (xhr) {
            Swal.fire("Erro Ajax", xhr.responseText || "Erro desconhecido", "error");
          },

          complete: function () {
            btn.prop("disabled", false);
            btnSpinner.addClass("d-none");
            btnText.removeClass("d-none").text(originalText);
          }
        });
      });
    });</script>

  <!-- SEU JS AJAX -->

</body>

</html>