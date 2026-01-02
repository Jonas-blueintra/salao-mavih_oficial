<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Equipe | Mavih Studio</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"
            rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
body {
    background: linear-gradient(180deg, #fde4ec, #fff);
    font-family: 'Poppins', sans-serif;
}

.page-title {
    font-family: 'Parisienne', cursive;
    font-size: 48px;
    color: #ff4f8b;
    text-align: center;
    margin-bottom: 10px;
    animation: fadeDown .8s ease;
}

.page-subtitle {
    text-align: center;
    color: #8a4f63;
    margin-bottom: 50px;
    animation: fadeUp .8s ease;
}

.equipe-card {
    background: #fff;
    border-radius: 22px;
    box-shadow: 0 15px 40px rgba(255,79,139,.18);
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
    background: linear-gradient(135deg, rgba(255,79,139,.15), rgba(248,201,214,.15));
    opacity: 0;
    transition: .4s;
}

.equipe-card:hover::before {
    opacity: 1;
}

.equipe-card:hover {
    transform: translateY(-10px);
}

.equipe-foto {
    width: 140px;
    height: 140px;
    object-fit: cover;
    border-radius: 50%;
    border: 5px solid #f8c9d6;
    margin-bottom: 15px;
    box-shadow: 0 10px 30px rgba(255,79,139,.35);
}

.equipe-nome {
    font-weight: 600;
    color: #ff4f8b;
    font-size: 20px;
}

.equipe-cargo {
    font-size: 14px;
    color: #8a4f63;
    margin-bottom: 10px;
}

.equipe-info {
    font-size: 14px;
    color: #6f5b63;
}
 .body-offset {
                margin-top: 140px;
            }
            .agenda-header {
                background: #ffffff;
                border-radius: 22px;
                padding: 32px;
                box-shadow: 0 8px 24px rgba(244, 180, 204, .35);
            }
@keyframes fadeDown {
    from {opacity:0; transform: translateY(-20px);}
    to {opacity:1; transform: translateY(0);}
}

@keyframes fadeUp {
    from {opacity:0; transform: translateY(20px);}
    to {opacity:1; transform: translateY(0);}
}
</style>
</head>
<body>
   <?php $this->load->view('cliente/includes/menu'); ?>

<div class="container py-5 body-offset">
 <!-- Cabeçalho -->
        <div class="agenda-header text-center mb-5 ">
            <h1 class="page-title">Nossa Equipe</h1>
            <p class="page-subtitle">Profissionais apaixonadas por realçar sua beleza ✨</p>
        </div>

    <div class="row g-4">

        <!-- MEMBRO -->
        <div class="col-md-4">
            <div class="equipe-card">
                <img src="https://via.placeholder.com/300" class="equipe-foto">
                <div class="equipe-nome">Maria Silva</div>
                <div class="equipe-cargo">Cabeleireira • 32 anos</div>
                <p class="equipe-info">Especialista em cortes femininos, coloração e tratamentos capilares. Atua há mais de 10 anos no mercado da beleza.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="equipe-card">
                <img src="https://via.placeholder.com/300" class="equipe-foto">
                <div class="equipe-nome">Ana Paula</div>
                <div class="equipe-cargo">Designer de Sobrancelhas • 28 anos</div>
                <p class="equipe-info">Apaixonada por design facial, realça a beleza natural com técnicas modernas e delicadas.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="equipe-card">
                <img src="https://via.placeholder.com/300" class="equipe-foto">
                <div class="equipe-nome">Juliana Costa</div>
                <div class="equipe-cargo">Manicure & Pedicure • 35 anos</div>
                <p class="equipe-info">Especialista em unhas decoradas, esmaltação em gel e cuidados completos para mãos e pés.</p>
            </div>
        </div>

    </div>
</div>
    <?php $this->load->view('cliente/includes/footer') ?>

</body>
</html>
