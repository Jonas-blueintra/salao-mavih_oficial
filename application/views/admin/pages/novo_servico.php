<div class="fade-in">
  <h3 class="fw-bold m-0 mb-3">
        <i class="bi bi-plus-circle"></i> Novo Serviço
    </h3>
    <div class="d-flex justify-content-between align-items-center mb-4">

    <!-- Lado esquerdo -->
    <button class="btn btn-dark" onclick="loadPage('servicos')">
        <i class="bi bi-arrow-left"></i> Voltar
    </button>

    <!-- Centro -->
  

    <!-- Lado direito -->
    <button class="btn btn-dark" onclick="loadPage('promocao')">
         <i class="bi bi-gift-fill"></i> Promoção
    </button>

</div>


    <div class="card shadow-sm border-0" style="border-radius: 18px;">
        <div class="card-body p-4">
            <div class="form">
                <form id="formAddServico" enctype="multipart/form-data" method="post"
                    action="<?= base_url('admin/servicos/cadastrar') ?>">


                    <div class="row g-4">

                        <!-- NOME -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nome do Serviço</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-white"><i class="bi bi-scissors"></i></span>
                                <input type="text" name="nome" class="form-control"
                                    placeholder="Corte Masculino, Manicure..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Descrição</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-white"><i
                                        class="bi bi-chat-right-text"></i></span>
                                <input type="text" name="descricao" class="form-control"
                                    placeholder="Uma Pequena Descrição do Serviço " required>
                            </div>
                        </div>

                        <!-- VALOR -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Valor</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-white">R$</span>
                                <input type="number" name="valor" class="form-control" step="0.01" placeholder="50.00"
                                    required>
                            </div>
                        </div>

                        <!-- DURAÇÃO -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Duração (Minutos)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-white"><i class="bi bi-clock"></i></span>
                                <input type="time" name="duracao" class="form-control" placeholder="Ex: 30" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold" for="tipo_servico">Tipo de Serviço</label>

                            <div class="select-wrapper">
                                <select name="tipo_servico" id="tipo_servico" class="form-control" required>
                                    <option value=""></option>
                                    <option value="cabelo">Cabelo</option>
                                    <option value="unha" >Unha</option>
                                    <option value="sobrancelha" >Sobrancelha</option>
                                    <option value="depilacao" >Depilação</option>
                                </select>
                            </div>

                        </div>


                        <!-- FOTO -->
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Foto do Serviço</label>
                                <input type="file" name="foto" class="form-control" accept="image/*">
                                <small class="text-muted">Opcional — JPG, PNG, até 2MB.</small>
                            </div>

                          
                        </div>

                    </div>

                    <hr class="my-4">

                    <button class="btn btn-primary px-4 py-2 btn-servico" type="submit">
                        <span class="btn-text">Salvar Serviço</span>
                        <span class="spinner-border spinner-border-sm d-none btn-spinner"></span>
                    </button>


                </form>
            </div>
        </div>
    </div>
</div>