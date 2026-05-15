<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$logo = $this->global_model->get('tela_cliente', 1, true);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Salão Mavih</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- PWA / Android -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#5A1F2D">

    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <meta name="apple-mobile-web-app-title" content="Salão Mavih">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
html {
    scroll-behavior: smooth;
}

:root {
    --rosa: #ff4f8b;
    --rosa-soft: #ffd1e1;
    --rosa-dark: #b02a6b;
    --bg: #fff0f6;
    --shadow: rgba(176, 42, 107, .25);
}

/* FUNDO */
body {
    background: linear-gradient(135deg, #ffe3ef, #fff) !important;
    font-family: 'Poppins', sans-serif;
    min-height: 100vh;
    overflow-x: hidden;
}

#mainContainer {
    min-height: 70vh;
    display: flex;
    align-items: center;
}

/* animação fundo */
body::before {
    content: '';
    position: fixed;
    inset: 0;
    background:
        radial-gradient(circle at 20% 20%, #ffd6e8 0, transparent 40%),
        radial-gradient(circle at 80% 80%, #ffeaf3 0, transparent 40%);
    animation: bgMove 12s infinite alternate;
    z-index: 0;
}

@keyframes bgMove {
    from {
        transform: scale(1) translateY(0);
    }

    to {
        transform: scale(1.1) translateY(-20px);
    }
}

/* CONTAINER */
#mainContainer {
    position: relative;
    z-index: 2;
}

/* CARD */
.card {
    background: linear-gradient(180deg, #fff, #fff5fa);
    border-radius: 36px !important;
    box-shadow: 0 30px 80px var(--shadow) !important;
    animation: cardFloat 4s ease-in-out infinite;
}

@keyframes cardFloat {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-8px);
    }
}

/* ÍCONE */
.icon-glow {
    background: linear-gradient(135deg, var(--rosa), var(--rosa-soft)) !important;
    box-shadow: 0 12px 30px rgba(255, 79, 139, .55);
    animation: pulse 2.5s infinite;
}

@keyframes pulse {

    0%,
    100% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.12);
    }
}

/* TEXTOS */
h3 {
    color: var(--rosa-dark);
}

p {
    color: #8a5a6d !important;
}

/* INPUTS */
.form-control,
.input-group-text {
    border-radius: 999px !important;
    border: 1px solid #f4c2d7 !important;
    background: #fff;
}

.form-control:focus {
    border-color: var(--rosa);
    box-shadow: 0 0 0 .2rem rgba(255, 79, 139, .25);
}

/* BOTÃO */
.btn-login {
    border: none;
    padding: 14px;
    border-radius: 999px;
    background: linear-gradient(135deg, var(--rosa), var(--rosa-dark));
    color: #fff;
    font-weight: 700;
    font-size: 1.05rem;
    box-shadow: 0 12px 30px rgba(255, 79, 139, .45);
    transition: .35s;
}

.btn-login:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(255, 79, 139, .6);
}

/* LINKS */
a {
    color: var(--rosa-dark);
    font-weight: 600;
}

/* ENTRADA SUAVE */
.card {
    animation: fadeInUp 1s ease;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* CARD DOWNLOAD APP */
.app-download {
    position: fixed;
    bottom: 16px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 9999;
    width: calc(100% - 24px);
    max-width: 380px;
    pointer-events: auto;
}

.app-download a {
    text-decoration: none
}

.app-badge {
    background: linear-gradient(135deg, #ffe3ef, #fff);
    border-radius: 22px;
    padding: 16px;
    display: flex;
    align-items: center;
    gap: 14px;
    box-shadow: 0 12px 30px rgba(230, 90, 141, .25);
    border: 1px solid #f5bfd7;
    transition: .35s;
}

.app-badge:hover {
    transform: translateY(-4px)
}

.app-icon {
    width: 54px;
    height: 54px;
    border-radius: 16px;
    background: linear-gradient(135deg, #ff7aa6, #c53c6a);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 24px;
    box-shadow: 0 10px 25px rgba(230, 90, 141, .5);
}

.app-info strong {
    color: #7b2545
}

.app-info span {
    display: block;
    font-size: 12px;
    color: #a0657f
}

.app-btn {
    margin-left: auto;
    background: linear-gradient(135deg, #ff4f8b, #b02a6b);
    padding: 8px 18px;
    border-radius: 999px;
    color: #fff;
    font-weight: 700;
    font-size: 13px;
    box-shadow: 0 8px 20px rgba(255, 79, 139, .45);
}

.ios-steps {
    margin-top: 10px;
    background: #fff;
    border-radius: 18px;
    padding: 14px;
    box-shadow: 0 8px 20px rgba(230, 90, 141, .18);
    display: none;
    animation: fadeIOS .35s ease;
    font-size: 13px;
    color: #7b2545;
}

@keyframes fadeIOS {
    from {
        opacity: 0;
        transform: translateY(10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Só mostra em mobile */
@media (min-width: 768px) {
    .app-download {
        display: none !important;
    }
}



.install-area {
    width: 100%;
    max-width: 420px;
    margin: 18px auto 40px auto;
    padding: 0 14px;
    z-index: 0;
}

.app-download {
    position: relative;
    width: 100%;
    margin-top: 14px;
}

.action-btn {
    flex: 1;
    text-decoration: none;
    padding: 14px 16px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    font-weight: 600;
    font-size: 14px;
    transition: .35s;
}

.action-soft {
    background: #fff;
    color: #b02a6b;
    box-shadow: 0 8px 22px rgba(230, 90, 141, .18);
}

.action-soft:hover {
    transform: translateY(-3px);
    box-shadow: 0 14px 35px rgba(230, 90, 141, .3);
}

.action-outline {
    border: 2px solid #ff7aa6;
    color: #b02a6b;
}

.action-outline:hover {
    background: #ff7aa6;
    color: #fff;
    transform: translateY(-3px);
}

#toggleSenha {
    border-radius: 999px;
    border: 1px solid #f4c2d7;
    background: #fff;
    color: #b02a6b;
}

#toggleSenha:hover {
    background: #ffe3ef;
}

.login_card {
    background: linear-gradient(180deg, #fff, #fff5fa);
    border-radius: 32px;
    padding: 32px 26px;
    box-shadow: 0 30px 80px rgba(176, 42, 107, .35);
    text-align: center;
    max-width: 400px;
    animation: swalFadeUp .45s ease;
}

.card_login {
    width: 90px;
    height: 90px;
    margin: 0 auto 18px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 42px;
    color: #fff;
    box-shadow: 0 18px 40px rgba(255, 79, 139, .55);
    animation: pulse 2.5s infinite;
}

.card_login_nome {
    background: #ffe3ef;
    color: #7b2545;
    padding: 12px;
    border-radius: 14px;
    font-size: 14px;
    font-weight: 600;
}

@keyframes swalFadeUp {
    from {
        opacity: 0;
        transform: translateY(30px) scale(.96);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.card_nome_erro {
    background: #fff1f2;
    color: #b91c1c;
    padding: 12px;
    border-radius: 14px;
    font-size: 14px;
    font-weight: 600;
}

.login_card h2 {
    font-size: 24px;
    font-weight: 700;
    color: #b02a6b;
    margin-bottom: 6px;
}

.login_card p {
    font-size: 15px;
    color: #8a5a6d;
    margin-bottom: 18px;
}

.img_login_card {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}
</style>

<body class="bg-primary bg-gradient">

    <div class="container  d-flex justify-content-center align-items-center" id="mainContainer">
        <div class="card  shadow-lg border-0 rounded-4 p-2" style="width: 100%; max-width: 420px;">
            <div class="card-body p-4">

                <div class="text-center mb-4">
                    <div class="bg-primary bg-gradient rounded-circle d-inline-flex justify-content-center align-items-center icon-glow"
                        style="width: 85px; height: 85px;">
                        <!-- <i class="bi bi-person-fill text-white display-5"></i> -->
                        <img style="width: 85px; height: 85px;" src="<?= base_url('uploads/logo/' . $logo->logo) ?>"
                            class="profile-img mb-3">
                    </div>

                    <h3 class="mt-3 fw-bold">Bem-vindo</h3>
                    <p class="text-muted">Faça login para continuar</p>
                </div>
                <div class="form">
                    <form class="form-ajax" id="loginForm" action="<?= base_url('login/validar_login') ?>"
                        method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Login</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                                <input type="text" id="login" name="email" class="form-control"
                                    placeholder="Digite seu Login">
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
                        <div class="d-flex gap-3 mt-2">
                            <a href="<?= base_url('login/recuperar_senha') ?>" class="action-btn action-soft">
                                <i class="bi bi-key-fill"></i>
                                <span>Esqueceu a senha?</span>
                            </a>

                            <a href="<?= base_url('login/primeiro_acesso'); ?>" class="action-btn action-outline">
                                <i class="bi bi-person-plus-fill"></i>
                                <span>Primeiro Acesso</span>
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="install-area my-5">
        <div id="ios-install" class="app-download" style="display:none">
            <div class="app-badge" onclick="toggleIOSInstall()">
                <div class="app-icon">🍎</div>

                <div class="app-info">
                    <strong>Instalar App no iPhone</strong>
                    <span>Adicionar Mavih à sua Tela Inicial</span>
                </div>

                <div class="app-btn">INSTRUÇÕES</div>
            </div>

            <div id="ios-steps" class="ios-steps">
                <div>1️⃣ Toque em <strong>Compartilhar</strong></div>
                <div>2️⃣ Escolha <strong>Adicionar à Tela de Início</strong></div>
                <div>3️⃣ Confirme em <strong>Adicionar</strong></div>
            </div>
        </div>


        <div id="android-install" class="app-download" style="display:none">
            <a href="https://www.mavihstudio.com.br/app/app-release.apk">
                <div class="app-badge">
                    <div class="app-icon">💖</div>
                    <div class="app-info">
                        <strong>Baixar App Mavih</strong>
                        <span>Aplicativo oficial para Android</span>
                    </div>
                    <div class="app-btn">
                        INSTALAR
                    </div>
                </div>
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    const toggleSenha = document.getElementById("toggleSenha");
    const inputSenha = document.getElementById("senha");
    const iconSenha = toggleSenha.querySelector("i");

    toggleSenha.addEventListener("click", function() {
        if (inputSenha.type === "password") {
            inputSenha.type = "text";
            iconSenha.classList.remove("bi-eye");
            iconSenha.classList.add("bi-eye-slash");
        } else {
            inputSenha.type = "password";
            iconSenha.classList.remove("bi-eye-slash");
            iconSenha.classList.add("bi-eye");
        }
    });




    function toggleIOSInstall() {
        const el = document.getElementById("ios-steps");
        const body = document.body;

        const aberto = el.style.display === "block";

        el.style.display = aberto ? "none" : "block";
        body.classList.toggle("has-ios-open", !aberto);
    }



    function esconderInstalacao() {
        document.getElementById("android-install")?.remove();
        document.getElementById("ios-install")?.remove();
    }

    document.addEventListener("mavih_app_ready", esconderInstalacao);

    if (window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone === true) {
        esconderInstalacao();
    }
    $(document).ready(function() {

        const form = $("form.form-ajax");
        if (!form.length) return;

        const btnLogin = form.find(".btn-login");
        const btnText = form.find(".btn-text");
        const btnSpinner = form.find(".btn-spinner");

        const originalBtnText = btnText.length ? btnText.text() : btnLogin.text();

        form.on("submit", function(e) {
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

                beforeSend: function() {
                    form.addClass('enviando');
                    button.prop('disabled', true);
                    btnText.text("Entrando...");
                    btnSpinner.removeClass("d-none");
                },

                error: function(xhr) {
                    console.log("STATUS:", xhr.status);
                    console.log("HEADERS:", xhr.getAllResponseHeaders());
                    console.log("RESPOSTA ERRO:", xhr.responseText);

                    Swal.fire({
                        title: "Erro",
                        text: "Erro na requisição. Tente novamente.",
                        icon: "error"
                    });
                },

                success: function(json) {
                    const fotoUsuario =
                        "<?= base_url('uploads/usuarios/' ); ?>";
                    singular = '';
                    if (json.data != null) {
                        if (json.data.sexo === 'm') {
                            singular = 'o';
                        } else {
                            singular = 'a';
                        }
                    }

                    const isSuccess = json.error === '0';
                    Swal.fire({
                        background: 'transparent',
                        showConfirmButton: !isSuccess,
                        timer: isSuccess ? 3000 : undefined,
                        icon: undefined,
                        allowOutsideClick: false,
                        html: `
                                 <div class="login_card" style="">
                                  <div class="card_login" style="background: ${isSuccess ? 'linear-gradient(135deg, #ff7aa6, #ff4f8b)' : 'linear-gradient(135deg, #fecaca, #f87171)'};">
                                 ${isSuccess ? `<img class="img_login_card" src="${fotoUsuario}${json.data.foto}">` : '✕'}
                                 </div>
                                   <h2>
                                     ${isSuccess ? `Bem-vind${singular}!` : 'Algo não deu certo'}
                                   </h2>
                                   <p>
                                     ${json.msg}
                                   </p>
                                   ${isSuccess ? `<div class="card_login_nome">
                                           👤 ${json.data.nome}
                                         </div>`
                                         : `<div class="card_nome_erro">
                                           Verifique seu login e senha e tente novamente
                                         </div>`}
                                 </div>`,
                        willClose: () => {
                            if (isSuccess) {
                                window.location.href = json
                                    .redirencionar_pagina;
                            }
                        }
                    });

                },


                complete: function() {
                    form.removeClass('enviando');
                    button.prop('disabled', false);
                    btnText.text(originalBtnText);
                    btnSpinner.addClass("d-none");
                }
            });

            return false;
        });

    });


    const urlParams = new URLSearchParams(window.location.search);
    const isApp = urlParams.get("mavih_app") === "1";

    if (isApp) {
        document.getElementById("android-install")?.remove();
        document.getElementById("ios-install")?.remove();
    } else {
        if (/android/i.test(navigator.userAgent)) {
            document.getElementById("android-install").style.display = "block";
        }
        if (/iphone|ipad|ipod/i.test(navigator.userAgent)) {
            document.getElementById("ios-install").style.display = "block";
        }
    }
    </script>

</body>

</html>