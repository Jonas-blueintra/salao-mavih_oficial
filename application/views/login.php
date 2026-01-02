<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Sistema</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Ícones -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body class="bg-primary bg-gradient">

  <div class="container vh-100 d-flex justify-content-center align-items-center" id="mainContainer">
    <div class="card shadow-lg border-0 rounded-4 p-2" style="width: 100%; max-width: 420px;">
      <div class="card-body p-4">

        <div class="text-center mb-4">
          <div
            class="bg-primary bg-gradient rounded-circle d-inline-flex justify-content-center align-items-center icon-glow"
            style="width: 85px; height: 85px;">
            <i class="bi bi-person-fill text-white display-5"></i>
          </div>

          <h3 class="mt-3 fw-bold">Bem-vindo</h3>
          <p class="text-muted">Faça login para continuar</p>
        </div>
        <div class="form">
          <form class="form-ajax" id="loginForm" action="<?= base_url('login/validar_login') ?>" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="text" id="login" name="email" class="form-control" placeholder="Digite seu e-mail">
              </div>
            </div>

            <div class="mb-3">
              <label for="senha" class="form-label">Senha</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha">
                <button class="btn btn-outline-secondary" type="button" id="toggleSenha">
                  <i class="bi bi-eye"></i>
                </button>
              </div>
            </div>

            <!-- BOTÃO LOGIN -->
            <div class="d-grid mb-3">
              <button type="submit" class="btn-login">
                <span class="btn-text">Entrar</span>
                <span class="btn-spinner d-none">
                  <i class="fa fa-spinner fa-spin"></i>
                </span>
              </button>

            </div>

            <!-- BOTÃO ESQUECEU SENHA -->
            <div class="d-flex gap-2">
              <div class="d-grid mb-2 ">
                <a href="<?= base_url('login/recuperar_senha') ?>" class="btn  btn-light text-primary   ">
                  <i class="bi bi-key"></i> Esqueceu a senha?
                </a>
              </div>

              <!-- BOTÃO CADASTRAR NOVO USUÁRIO -->
              <div class="d-grid">
                <a href="<?= base_url('login/primeiro_acesso'); ?>" class="btn btn-light text-primary">
                  <i class="bi bi-person-plus"></i> Primeiro Acesso
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap JS -->
  <!-- Bootstrap JS -->

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
   console.log("LOGIN.JS CARREGADO");
console.log(typeof $);
console.log(typeof jQuery);

    $(document).ready(function () {

      const form = $("form.form-ajax");
      if (!form.length) return;

      const btnLogin = form.find(".btn-login");
      const btnText = form.find(".btn-text");
      const btnSpinner = form.find(".btn-spinner");

      const originalBtnText = btnText.length ? btnText.text() : btnLogin.text();

      form.on("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        let button = btnLogin;

    $.ajax({
  url: form.attr('action'),
  data: formData,
  type: 'POST',
  cache: false,
  contentType: false,
  processData: false,
  dataType: "json",

  beforeSend: function () {
    form.addClass('enviando');
    button.prop('disabled', true);
    btnText.text("Entrando...");
    btnSpinner.removeClass("d-none");
  },

  error: function (xhr) {
    console.log("STATUS:", xhr.status);
    console.log("HEADERS:", xhr.getAllResponseHeaders());
    console.log("RESPOSTA ERRO:", xhr.responseText);

    Swal.fire({
      title: "Erro",
      text: "Erro na requisição. Tente novamente.",
      icon: "error"
    });
  },

  success: function (json) {

    let type = 'error';
    let tag = 'Ops!';

    if (json.error === '0') {
      type = 'success';
      tag = 'Bem-vindo!';
    }

    if (json.error === '0') {
      Swal.fire({
        title: tag + ' ' + json.data.nome,
        text: json.msg,
        icon: type,
        timer: 1200,
        showConfirmButton: false,
        willClose: () => {
          window.location.href = json.redirencionar_pagina;
        }
      });
    } else {
      Swal.fire({
        title: tag,
        text: json.msg,
        icon: type
      });
    }
  },

  complete: function () {
    form.removeClass('enviando');
    button.prop('disabled', false);
    btnText.text(originalBtnText);
    btnSpinner.addClass("d-none");
  }
});

        return false;
      });

    });


const toggleSenha = document.getElementById("toggleSenha");
    const inputSenha = document.getElementById("senha");
    const icon = toggleSenha.querySelector("i");

    toggleSenha.addEventListener("click", () => {
      const isPassword = inputSenha.type === "password";

      inputSenha.type = isPassword ? "text" : "password";
      icon.classList.toggle("bi-eye");
      icon.classList.toggle("bi-eye-slash");
    });
 
  </script>

</body>

</html>