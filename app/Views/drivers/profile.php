<div class="page-wrapper">
    <div class="page-content" id="app">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-1 fw-bold pb-3" style="background-color:#F5F5DC;">
            <div class="breadcrumb-title pe-3">Motorista</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="/drivers">Motoristas </a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{driver.user.name}}</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="card" style="background-color: #ede7d5">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link fw-bold active" data-bs-toggle="tab" data-bs-target="#profile-overview">Dados do Motorista</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#viaturas">Viaturas</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#profile-docs">Documentos Anexados</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#profile-propretario">Histórico de Proprietários</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#profile-opcoes">Opcões</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade profile-overview active show" id="profile-overview">

                            <div class="card" style="background-color: #777777;">
                                <div class="card-body">
                                    <form action="/admin/register" id="newAdmin" class="row" method="POST" onsubmit="event.preventDefault();configVue.addAdmin(this)" autocomplete="off" autocapitalize="on">

                                        <div class="col-md-6">
                                            <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Nome<span class="fw-bold text-danger">*</span></span>
                                                <input type="text" class="form-control" required="" aria-label="name" :value="driver.user.name" name="name">
                                                <input type="hidden" class="form-control" required="" aria-label="name" value="634" name="password">
                                                <input type="hidden" class="form-control" required="" aria-label="name" value="teste" name="nick_name">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">BI<span class="fw-bold text-danger">*</span></span>
                                                <input class="form-control nome" :value="driver.user.bilhete_identidade" name="bilhete_identidade" maxlength="14" required="" aria-label="bi" aria-describedby="basic-addon1">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Telefone<span class="fw-bold text-danger">*</span></span>
                                                <input class="form-control nome" :value="driver.user.telefone" name="telefone" required="" aria-label="tel" aria-describedby="basic-addon1">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Email<span class="fw-bold text-danger">*</span></span>
                                                <input class="form-control nome" :value="driver.user.email" name="email" type="email" aria-label="email" aria-describedby="basic-addon1">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Estado<span class="fw-bold text-danger">*</span></span>
                                                <select class="form-select nome" name="is_banned" required="" aria-label="address" aria-describedby="basic-addon1">
                                                    <option value="">Selecionar Estado</option>
                                                    <option :selected="!driver.is_banned" value="false">Admintido</option>
                                                    <option :selected="driver.is_banned" value="true">Banido</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Rating<span class="fw-bold text-danger">*</span></span>
                                                <input class="form-control nome" name="rating" :value="driver.rating" readonly="" disabled aria-label="address" aria-describedby="basic-addon1">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade profile-overview" id="viaturas">
                            <div class="row">
                                <div class="card" style="background-color: #777777;">
                                    <div class=" card-body">
                                        <div class="card-title d-flex align-items-center">
                                            <div><i class="bx bxs-user me-1 font-22 text-danger"></i>
                                            </div>
                                            <h5 class="mb-0 text-white fw-bold"> Lista de Viaturas</h5>
                                        </div>
                                        <hr>
                                        <div class="row" v-for="item in driver.Veiculo">
                                            <form action="/api/admin/proprietarioterreno/4" class="row" method="POST" onsubmit="event.preventDefault();functions.editViatura(this)" autocomplete="off" autocapitalize="on">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-1">
                                                            <span class="fw-bold input-group-text fw-bold nome" id="basic-addon1">Matricula<span class="fw-bold text-danger">*</span></span>
                                                            <input type="text" class="form-control" required="" aria-label="tel" :value="item.matricula" name="matricula">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group mb-1">
                                                            <span class="fw-bold input-group-text fw-bold nome" id="basic-addon1">Marca<span class="fw-bold text-danger">*</span></span>
                                                            <input type="text" class="form-control" required="" aria-label="tel" name="marca" :value="item.marca">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <p class="mb-1">
                                                            <a class="btn position-relative" style="background-color: black; color:aliceblue" data-bs-toggle="modal" data-bs-target="#anexo_bi_propietario_antigo4">Ver Anexo
                                                                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-warning rounded-circle">
                                                                    <span class="visually-hidden">.</span>
                                                                </span>
                                                            </a>
                                                        </p>
                                                        <div class="modal fade" id="anexo_bi_propietario_antigo4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="anexo_bi_propietario_antigoLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-fullscreen" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="anexo_bi_propietario_antigoLabel">Vehicle Image</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <object v-if="item.VehicleImage.length > 0" :data="item.VehicleImage[0].image_url" type="application/pdf" width="100%" height="1000px"></object>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="input-group mb-1">
                                                            <span class="fw-bold input-group-text" id="basic-addon1">Modelo<span class="fw-bold text-danger">*</span></span>
                                                            <input type="text" class="form-control" :value="item.modelo" aria-label=" tel" name="modelo">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Cor<span class="fw-bold text-danger">*</span></span>
                                                            <input type="text" class="form-control" required="" aria-label="tel" name="cor" :value="item.cor">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Ano de Fabrico<span class="fw-bold text-danger">*</span></span>
                                                            <input type="text" class="form-control" required="" aria-label="tel" name="ano_fabrico" :value="item.ano_fabrico">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Nº do Quadro</span>
                                                            <input type="text" class="form-control " aria-label="tel" name="quadro_num" :value="item.quadro_num">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 col-md-12">
                                                        <div class="col-md-7"></div>
                                                        <div class="col-md-2">
                                                            <button type="submit" class="btn btn-success btn-md w-100 btn-save"><i class="bx bx-save mr-1"></i>Salvar</button>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="button" onclick="functions.deleteProprietarioTerreno('/api/admin/delete/proprietarioterreno/4','Teste 2','Terreno de Teste', '9487343874', '394858w')" class="btn btn-danger btn-md w-100 btn-save"><i class="bx bxs-trash mr-1"></i>Eliminar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="card" style="background-color: #777777;">
                                    <div class="card-body">
                                        <div class="card-title d-flex align-items-center">
                                            <div><i class="bx bxs-user me-1 font-22 text-danger"></i>
                                            </div>
                                            <h5 class="mb-0 text-white fw-bold">Adicionar Nova Viatura</h5>
                                        </div>
                                        <hr>
                                        <form action="/api/admin/proprietarioterreno/4" class="row" method="POST" onsubmit="event.preventDefault();perfilDriver.addViatura(this)" autocomplete="off" autocapitalize="on">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span class="fw-bold input-group-text fw-bold nome" id="basic-addon1">Matricula<span class="fw-bold text-danger">*</span></span>
                                                        <input type="text" class="form-control" required="" aria-label="tel" name="license_plate">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span class="fw-bold input-group-text fw-bold nome" id="basic-addon1">Marca<span class="fw-bold text-danger">*</span></span>
                                                        <input type="text" class="form-control" required="" aria-label="tel" name="brand">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="input-group mb-1">
                                                        <span class="fw-bold input-group-text" id="basic-addon1">Modelo<span class="fw-bold text-danger">*</span></span>
                                                        <input type="text" class="form-control" required aria-label=" tel" name="model">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Cor<span class="fw-bold text-danger">*</span></span>
                                                        <input type="text" class="form-control" required="" aria-label="tel" name="color">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Ano de Fabrico<span class="fw-bold text-danger">*</span></span>
                                                        <input type="text" class="form-control" required="" aria-label="tel" name="year">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Nº do Quadro<span class="fw-bold text-danger">*</span></span>
                                                        <input type="text" class="form-control" required aria-label="tel" name="frame_number">
                                                    </div>
                                                </div>
                                                <div class="row mb-3 col-md-12">
                                                    <div class="col-md-7"></div>
                                                    <div class="col-md-4">
                                                        <button type="submit" class="btn btn-success btn-md w-100 btn-save"><i class="bx bx-save mr-1"></i>Salvar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show profile-overview" id="profile-docs">
                            <div class="row">
                                <div class="card" style="background-color: #777777;">
                                    <div class=" card-body">
                                        <div class="card-title d-flex align-items-center">
                                            <div><i class="bx bxs-file-pdf me-1 font-22 text-danger"></i>
                                            </div>
                                            <h5 class="mb-0 text-white fw-bold">Documentos Anexados</h5>
                                        </div>
                                        <hr>
                                        <!-- Button trigger modal -->
                                        <a type="button" class="btn btn-dark btn-save position-relative" data-bs-toggle="modal" data-bs-target="#memoria_descritiva">
                                            Memoria Descritiva

                                            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-warning rounded-circle">
                                                <span class="visually-hidden">.</span>
                                            </span>

                                        </a>
                                        <a class="btn position-relative" style="background-color: black; color:aliceblue" data-bs-toggle="collapse" href="#editmemoria_descritiva" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Actualizar
                                        </a>
                                        <div class="modal fade" id="memoria_descritiva" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="biLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-fullscreen" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="biLabel">Memoria Descritiva</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <object data="http://localhost:8080//file/terrenos/16.jpg" type="application/pdf" width="100%" height="1000px"></object>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse multi-collapse" id="editmemoria_descritiva">
                                            <form action="/api/admin/file/terreno/16" method="post" onsubmit="event.preventDefault();functions.edit(this)">
                                                <div class="row">
                                                    <div class="col-md-6 mt-2">
                                                        <input type="file" class="form-control" required="" name="memoria_descritiva">
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Pass de Segurança<span class="fw-bold text-danger">*</span></span>
                                                            <input class="form-control" required="" name="seguranca">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <button type="submit" class="btn btn-info btn-md w-50 form-control">Salvar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--  -->
                                        <a type="button" class="btn btn-dark btn-save position-relative" data-bs-toggle="modal" data-bs-target="#requirimento_doc">
                                            Requerimento
                                            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-warning rounded-circle">
                                                <span class="visually-hidden">.</span>
                                            </span>

                                        </a>
                                        <a class="btn position-relative" style="background-color: black; color:aliceblue" data-bs-toggle="collapse" href="#editrequirimento_doc" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Actualizar
                                        </a>
                                        <div class="modal fade" id="requirimento_doc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="biLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-fullscreen" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="biLabel">Requerimento</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <object data="http://localhost:8080//file/terrenos/16.jpg" type="application/pdf" width="100%" height="1000px"></object>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse multi-collapse" id="editrequirimento_doc">
                                            <form action="/api/admin/file/terreno/16" method="post" onsubmit="event.preventDefault();functions.edit(this)">
                                                <div class="row">
                                                    <div class="col-md-6 mt-2">
                                                        <input type="file" class="form-control" required="" name="requirimento_doc">
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Pass de Segurança<span class="fw-bold text-danger">*</span></span>
                                                            <input class="form-control" required="" name="seguranca">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <button type="submit" class="btn btn-info btn-md w-50 form-control">Salvar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--  -->
                                        <a class="btn position-relative" style="background-color: black; color:aliceblue" data-bs-toggle="collapse" href="#editcroqui_doc" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Anexar Croqui de Localização
                                        </a>
                                        <div class="collapse multi-collapse" id="editcroqui_doc">
                                            <form action="/api/admin/file/terreno/16" method="post" onsubmit="event.preventDefault();functions.edit(this)">
                                                <div class="row">
                                                    <div class="col-md-6 mt-2">
                                                        <input type="file" class="form-control" required="" name="croqui_doc">
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Pass de Segurança<span class="fw-bold text-danger">*</span></span>
                                                            <input class="form-control" required="" name="seguranca">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <button type="submit" class="btn btn-info btn-md w-50 form-control">Salvar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--  -->
                                        <a class="btn position-relative" style="background-color: black; color:aliceblue" data-bs-toggle="collapse" href="#editpagamento_doc" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Anexar Pagamento
                                        </a>
                                        <div class="collapse multi-collapse" id="editpagamento_doc">
                                            <form action="/api/admin/file/terreno/16" method="post" onsubmit="event.preventDefault();functions.edit(this)">
                                                <div class="row">
                                                    <div class="col-md-6 mt-2">
                                                        <input type="file" class="form-control" required="" name="pagamento_doc">
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Pass de Segurança<span class="fw-bold text-danger">*</span></span>
                                                            <input class="form-control" required="" name="seguranca">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <button type="submit" class="btn btn-info btn-md w-50 form-control">Salvar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--  -->
                                        <a type="button" class="btn btn-dark btn-save position-relative" data-bs-toggle="modal" data-bs-target="#direito_superficie">
                                            Direito de Superfície

                                            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-warning rounded-circle">
                                                <span class="visually-hidden">.</span>
                                            </span>

                                        </a>
                                        <a class="btn position-relative" style="background-color: black; color:aliceblue" data-bs-toggle="collapse" href="#editdireito_superficie" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Actualizar
                                        </a>
                                        <div class="modal fade" id="direito_superficie" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="biLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-fullscreen" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="biLabel">Direito de Superfície</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <object data="http://localhost:8080//file/terrenos/16.jpg" type="application/pdf" width="100%" height="1000px"></object>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse multi-collapse" id="editdireito_superficie">
                                            <form action="/api/admin/file/terreno/16" method="post" onsubmit="event.preventDefault();functions.edit(this)">
                                                <div class="row">
                                                    <div class="col-md-6 mt-2">
                                                        <input type="file" class="form-control" required="" name="direito_superficie">
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Pass de Segurança<span class="fw-bold text-danger">*</span></span>
                                                            <input class="form-control" required="" name="seguranca">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <button type="submit" class="btn btn-info btn-md w-50 form-control">Salvar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--  -->
                                        <a class="btn position-relative" style="background-color: black; color:aliceblue" data-bs-toggle="collapse" href="#editanexo_bi_propietario_actual" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Anexar BI do Proprietário
                                        </a>
                                        <div class="collapse multi-collapse" id="editanexo_bi_propietario_actual">
                                            <form action="/api/admin/file/terreno/16" method="post" onsubmit="event.preventDefault();functions.edit(this)">
                                                <div class="row">
                                                    <div class="col-md-6 mt-2">
                                                        <input type="file" class="form-control" required="" name="anexo_bi_propietario_actual">
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Pass de Segurança<span class="fw-bold text-danger">*</span></span>
                                                            <input class="form-control" required="" name="seguranca">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <button type="submit" class="btn btn-info btn-md w-50 form-control">Salvar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--  -->
                                        <a class="btn position-relative" style="background-color: black; color:aliceblue" data-bs-toggle="collapse" href="#editdoc_compra" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Anexar Declaração de Compra
                                        </a>
                                        <div class="collapse multi-collapse" id="editdoc_compra">
                                            <form action="/api/admin/file/terreno/16" method="post" onsubmit="event.preventDefault();functions.edit(this)">
                                                <div class="row">
                                                    <div class="col-md-6 mt-2">
                                                        <input type="file" class="form-control" required="" name="doc_compra">
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Pass de Segurança<span class="fw-bold text-danger">*</span></span>
                                                            <input class="form-control" required="" name="seguranca">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <button type="submit" class="btn btn-info btn-md w-50 form-control">Salvar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--  -->
                                        <a class="btn position-relative" style="background-color: black; color:aliceblue" data-bs-toggle="collapse" href="#editdoc_venda" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Anexar Declaração de Venda
                                        </a>
                                        <div class="collapse multi-collapse" id="editdoc_venda">
                                            <form action="/api/admin/file/terreno/16" method="post" onsubmit="event.preventDefault();functions.edit(this)">
                                                <div class="row">
                                                    <div class="col-md-6 mt-2">
                                                        <input type="file" class="form-control" required="" name="doc_venda">
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Pass de Segurança<span class="fw-bold text-danger">*</span></span>
                                                            <input class="form-control" required="" name="seguranca">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <button type="submit" class="btn btn-info btn-md w-50 form-control">Salvar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--  -->
                                        <a class="btn position-relative" style="background-color: black; color:aliceblue" data-bs-toggle="collapse" href="#editescritura_doc" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Anexar Escritúra Pública
                                        </a>
                                        <div class="collapse multi-collapse" id="editescritura_doc">
                                            <form action="/api/admin/file/terreno/16" method="post" onsubmit="event.preventDefault();functions.edit(this)">
                                                <div class="row">
                                                    <div class="col-md-6 mt-2">
                                                        <input type="file" class="form-control" required="" name="escritura_doc">
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Pass de Segurança<span class="fw-bold text-danger">*</span></span>
                                                            <input class="form-control" required="" name="seguranca">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-2">
                                                        <button type="submit" class="btn btn-info btn-md w-50 form-control">Salvar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show profile-overview" id="profile-propretario">

                        </div>

                        <div class="tab-pane fade show profile-overview" id="profile-opcoes">

                            <div class="row">
                                <div v-if="driver.is_approved" class="col-md-3">
                                    <button class="btn btn-success" @click="approveDriver()">Desprovar Motorista</button>
                                </div>
                                <div v-else class="col-md-3">
                                    <button class="btn btn-danger" @click="approveDriver()">Aprovar Motorista</button>
                                </div>

                                <div v-if="driver.is_banned" class="col-md-3">
                                    <button class="btn btn-danger" @click="bannirDriver()">Desbanir Motorista</button>
                                </div>
                                <div v-else class="col-md-3">
                                    <button class="btn btn-success" @click="bannirDriver()">Bannir Motorista</button>
                                </div>

                            </div>

                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const perfilDriver = new Vue({
        el: '#app',
        data() {
            return {
                driver: {}
            }
        },
        methods: {
            getDriver: async function() {
                const options = {
                    method: 'GET',
                    headers: {
                        /* 'User-Agent': 'insomnia/2023.5.8', */
                        Authorization: 'Bearer ' + sessionStorage.token
                    }
                };

                await fetch(endpoins.api + endpoins.driverProfile + '<?= $id ?>', options)
                    .then(response => response.json())
                    .then(response => {
                        try {
                            this.driver = response;
                            console.log(response);
                        } catch (error) {
                            driver: {}
                        }
                    })
                    .catch(err => console.error(err));
            },

            approveDriver: async function() {
                let request;
                const options = {
                    method: 'GET',
                    headers: {
                        /* 'User-Agent': 'insomnia/2023.5.8', */
                        Authorization: 'Bearer ' + sessionStorage.token
                    }
                };


                await fetch(endpoins.api + '/admin/drivers/approve/<?= $id ?>', options)
                    .then(response => response.json())
                    .then(response => {
                        try {
                            console.log(response);
                            setTimeout(() => {
                                location.reload();
                            }, 3000);
                        } catch (error) {
                            driver: {}
                        }
                    })
                    .catch(err => console.error(err));
            },

            bannirDriver: async function() {
                let request;
                const options = {
                    method: 'PATCH',
                    headers: {
                        /* 'User-Agent': 'insomnia/2023.5.8', */
                        Authorization: 'Bearer ' + sessionStorage.token
                    }
                };
                if (this.driver.is_banned) {
                    //request await fetch(endpoins.api + '/admin/drivers/approve/<?= $id ?>', options)
                } else {
                    await fetch(endpoins.api + '/driver/ban/<?= $id ?>', options)
                        .then(response => response.json())
                        .then(response => {
                            try {
                                console.log(response);
                                setTimeout(() => {
                                    location.reload();
                                }, 3000);
                            } catch (error) {
                                driver: {}
                            }
                        })
                    request.catch(err => console.error(err));
                }

            },

            addViatura: async function(form) {
                var object = {};
                new FormData(form).forEach(function(value, key) {
                    object[key] = value;
                });

                var json = JSON.stringify(object);

                const options = {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        Authorization: 'Bearer ' + sessionStorage.token
                    },
                    body: json
                };

                await fetch(endpoins.api + '/vehicle', options)
                    .then(response => response.json())
                    .then(response => {
                        try {
                            console.log(response);
                            setTimeout(() => {
                                // location.reload();
                            }, 3000);
                        } catch (error) {
                            driver: {}
                        }
                    })
                    .catch(err => {
                        console.log(err.message)
                    });

            },

            editViatura: function(form) {}
        },
        mounted() {
            this.getDriver();
        },
        beforeMount() {},
        beforeDestroy() {
            alert("Sessão incerrada por falha na autenticação!");
        },
        destroyed() {
            sessionStorage.clear();
            location.reload();
        },
    })
</script>