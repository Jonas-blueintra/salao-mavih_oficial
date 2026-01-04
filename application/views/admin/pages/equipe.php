<style>
    body {
        background: #eef2f7;
        font-family: 'Inter', sans-serif;
    }

    .card-config {
        background: #fff;
        border-radius: 14px;
        padding: 25px;
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.08);
        animation: fadeIn .5s;
    }

    .section-title {
        font-size: 18px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Upload de foto */
    .upload-area {
        border: 2px dashed #bbb;
        padding: 30px;
        border-radius: 12px;
        text-align: center;
        cursor: pointer;
        transition: 0.3s;
    }

    .upload-area:hover {
        border-color: #0d6efd;
        background: #e7f1ff;
    }

    /* Foto na tabela */
    .avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #ddd;
    }

    .upload-area {
        width: 250px;
        height: 250px;
        border: 2px dashed #0d6efd;
        border-radius: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        background: #f8f9fa;
    }

    #previewFoto {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        object-fit: cover;
        display: none;
    }

    #uploadConteudo {
        text-align: center;
        color: #0d6efd;
    }

    #uploadConteudo i {
        font-size: 40px;
    }

    #uploadConteudo p {
        margin: 0;
        font-size: 14px;
    }


    .upload-area p {
        margin-top: 8px;
        color: #6c757d;
        font-size: 14px;
    }

    #previewFoto {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: none;
        position: absolute;
        top: 0;
        left: 0;
    }
</style>
<?php $equipe = $this->cliente_model->listar_clientes('equipe'); ?>

<div class="container py-4">

    <h2 class="fw-bold mb-4">
        <i class="bi bi-people-fill"></i> Gestão da Equipe
    </h2>

    <div class="row g-4">

        <div class="col-lg-5">
            <form method="post" id="formequipe" action="<?= base_url('admin/equipe/salvar') ?>"
                enctype="multipart/form-data">

                <div class="card-config">

                    <h4 class="section-title">
                        <i class="bi bi-person-plus-fill"></i> Adicionar Integrante
                    </h4>
                    <hr>
                    <label class="form-label fw-semibold">Foto da profissional</label>

                    <label class="form-label fw-semibold text-center d-block">
                        Foto da profissional
                    </label>

                    <div class="d-flex justify-content-center mb-3">
                        <div class="upload-area" onclick="document.getElementById('foto_equipe').click()">
                            <img id="previewFoto" />
                            <div id="uploadConteudo">
                                <i class="bi bi-camera-fill"></i>
                                <p>Clique para enviar a foto</p>
                            </div>
                        </div>
                    </div>


                    <input type="file" id="foto_equipe" name="foto" accept="image/*" hidden required>
                    <input type="hidden" name="foto_atual" id="foto_atual">
                    <input type="hidden" name="id" id="id_integrante">

                    <div class="mb-2">
                        <label class="form-label fw-semibold">Nome</label>
                        <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Idade</label>
                        <input type="text" name="idade" class="form-control" placeholder="Idade" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Cidade</label>
                        <input type="text" name="cidade" class="form-control" placeholder="Cidade-UF" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Especialidade</label>
                        <input type="text" name="especialidade" class="form-control" placeholder="Especialidade" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label fw-semibold" required>Descrição curta</label>
                        <textarea required name="descricao" class="form-control" rows="2" ></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="" selected disabled>Selecione o status</option>
                            <option value="ativo">Ativa</option>
                            <option value="inativo">Inativa</option>
                        </select>
                    </div>

                    <button type="button" id="btnSalvar" class="btn btn-success w-100" onclick="salvarIntegrante()">
                        <i class="bi bi-check-circle"></i> Salvar Integrante
                    </button>

                    <button type="button" id="btnAtualizar" class="btn btn-primary w-100 d-none"
                        onclick="updateIntegrante()">
                        <i class="bi bi-save"></i> Atualizar Integrante
                    </button>


                </div>
            </form>

        </div>

        <!-- ================= LISTAGEM DA EQUIPE ================= -->
        <div class="col-lg-7">
            <div class="card-config">

                <h4 class="section-title">
                    <i class="bi bi-list-ul"></i> Integrantes Cadastrados
                </h4>
                <hr>

                <div class="table-responsive">
                    <table id="equipeTable" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nome</th>
                                <th>Idade</th>
                                <th>Cidade</th>
                                <th>Especialidade</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- EXEMPLO -->
                            <?php foreach ($equipe as $usuario): ?>

                                <tr>
                                    <td>
                                        <img src="<?= base_url('uploads/usuarios/' . $usuario->foto) ?>" class="avatar">
                                    </td>
                                    <td><?= $usuario->nome ?></td>
                                    <td><?= $usuario->idade ?></td>
                                    <td><?= $usuario->cidade ?></td>
                                    <td><?= $usuario->especialidade ?></td>
                                    <td>
                                        <?php if ($usuario->status == 'ativo'): ?>
                                            <span class="badge bg-success"><?= $usuario->status ?></span>
                                        <?php else: ?>
                                            <span class="badge bg-danger"><?= $usuario->status ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary"
                                            onclick="editarIntegrante(<?= $usuario->id ?>)">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <button class="btn btn-sm btn-danger"
                                            onclick="excluirIntegrante(<?= $usuario->id ?>)">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

</script>