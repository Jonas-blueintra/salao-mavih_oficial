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
}



#contato .container {
    background: #ffffff;
    border-radius: 26px;
    padding: 40px 30px;
    box-shadow: 0 12px 30px var(--blue);
}

#contato h2 {
    color: var(--cor-bg);
    font-weight: 700;
}

#contato p {
    color: var(--texto-suave);
    font-size: 1rem;
    margin-bottom: 6px;
}

#contato iframe {
    border: none;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
}

/* ===== FOOTER ===== */
.footer_home {
    background: var(--blue);
    color: #fff;
    padding: 20px 10px;
    font-size: .95rem;
    font-weight: 500;
    letter-spacing: .4px;
    box-shadow: 0 -6px 18px rgba(0, 0, 0, 0.15);
}

.footer_home p {
    margin: 0;
}

/* ===== ANIMAÇÃO SUAVE ===== */
.fade-up {
    animation: fadeUp .8s ease forwards;
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

/* ===== MOBILE ===== */
@media (max-width: 576px) {
    #contato .container {
        padding: 30px 20px;
    }

    #contato iframe {
        height: 240px;
    }
}
</style>
<section id="contato" class="bg-light py-5" style="background-color:#ff4f8b;">
    <div class="container text-center">
        <h2 class="fw-bold mb-4 fade-up">Onde Estamos</h2>
        <p>Rua 5 de junho 63 - Centro</p>
        <p>Telefone: (11) 99999-9999</p>

        <iframe class="rounded mt-4" width="100%" height="300"
            src="https://maps.google.com/maps?q=Rua Cinco de Junho, 68 - Chácara Lago&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
    </div>
</section>

<!-- FOOTER -->
<footer class="text-center footer_home">
    <p class="m-0">© 2025 Salão Mavih - Todos os direitos reservados::<strong>Desenvolvido por jonas anjos</strong></p>
</footer>