<div id="sidebar">
    <div class="mt-5 show sidebar" style="text-align:center; ">

        <a href="<?= base_url('admin/perfil') ?>" style="text-decoration:none;">
            <img src="uploads/admin/<?= $this->session->userdata('foto') ?>" 
                width="70" height="70" 
                class="rounded-circle mb-2" 
                style="object-fit:cover; border:3px solid #fff; cursor:pointer;">
                <h4 style="color:#fff; font-size:17px;">
            Olá <?= $this->session->userdata('nome'); ?>
        </h4>
        </a>
    </div>

    <a  onclick="loadPage('dashboard')"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <a  onclick="loadPage('servicos')"><i class="bi bi-scissors"></i> Serviços</a>
    <a  onclick="loadPage('agenda')"><i class="bi bi-calendar-check"></i> Agendamentos</a>
    <a  onclick="loadPage('clientes')"><i class="bi bi-people"></i> Clientes</a>
    <a  onclick="loadPage('equipe')"><i class="bi bi-person-lines-fill"></i> Equipe</a>
    <a  onclick="loadPage('configuracao')"><i class="bi bi-gear"></i> Configurações</a>
    <a href="<?= base_url('Login/logout') ?>"><i class="bi bi-box-arrow-right"></i> Sair</a>
</div>
