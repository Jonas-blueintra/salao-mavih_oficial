console.log("LOGIN.JS CARREGADO");

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

            error: function () {
                $.NotificationApp.send("Oh não!", "Erro Ajax.", "top-right", "#bf441d", "error");
            },

            success: function (json) {

                switch (json.error) {
                    case '1':
                        type = 'error';
                        tag = 'Ops!';
                        break;
                    case '0':
                        type = 'success';
                        tag = 'Bem Vindo!';
                        break;
                }

                if (json.error == '0') {
                    Swal.fire({
                        title: tag + ' ' + json.data.nome,
                        text: json.msg ,
                        type: type,
                    }).then(() => {
                        if (json.redirencionar_pagina) {
                            let base = document.querySelector("base")?.href || "";
                            window.location = base.replace(/\/$/, "") + "/" + json.redirencionar_pagina.replace(/^\//, "");
                        }
                        
                    });
                }else
                    {
                        Swal.fire({
                            title: tag,
                            text: json.msg,
                            type: type,});
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
