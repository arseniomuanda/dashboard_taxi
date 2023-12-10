<!--start page wrapper -->
<div class="page-wrapper">
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Novo Utilizador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/admin/register" id="newAdmin" class="row" method="POST" onsubmit="event.preventDefault();configVue.addAdmin(this)" autocomplete="off" autocapitalize="on">

                        <div class="col-md-12">
                            <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Nome<span class="fw-bold text-danger">*</span></span>
                                <input type="text" class="form-control" required="" aria-label="name" name="name">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Apelido<span class="fw-bold text-danger">*</span></span>
                                <input type="text" class="form-control" required="" aria-label="nick_name" name="nick_name">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">BI<span class="fw-bold text-danger">*</span></span>
                                <input class="form-control nome" name="bilhete_identidade" maxlength="14" required="" aria-label="bi" aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Telefone<span class="fw-bold text-danger">*</span></span>
                                <input class="form-control nome" name="telefone" required="" aria-label="tel" aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Email<span class="fw-bold text-danger">*</span></span>
                                <input class="form-control nome" name="email" type="email" aria-label="email" aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Endereço<span class="fw-bold text-danger">*</span></span>
                                <input class="form-control nome" name="address" required="" aria-label="address" aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group mb-1"> <span class="fw-bold input-group-text fw-bold" id="basic-addon1">Password<span class="fw-bold text-danger">*</span></span>
                                <input class="form-control nome" name="password" required="" disabled readonly aria-label="address" value="123456" aria-describedby="basic-addon1">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="newAdmin" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Body -->
    <div class="page-content" id="app">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3 fw-bold pb-3" style="background-color:#F5F5DC;">
            <div class="breadcrumb-title pe-3">Utilizadores</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb" id="app">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="/config">Configurações</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lista de Utilizadores</li>
                    </ol>
                </nav>
            </div>

        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex mb-3" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-info me-2" type="submit">Pesquisar</button>
                            <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-success" type="submit">Adicionar Utilizador</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Opção</th>
                                        <th>Nome</th>
                                        <th>BI</th>
                                        <th>Telefone</th>
                                        <th>Email</th>
                                        <th>Acesso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in users">
                                        <td>
                                            <a class="btn btn-info" :href="'/drivers/' + item.bilhete_identidade">
                                                <i class="bx bx-show text-center"></i>
                                            </a>
                                        </td>
                                        <td>{{item.name}}</td>
                                        <td>{{item.bilhete_identidade}}</td>
                                        <td>{{item.telefone}}</td>
                                        <td>{{item.email}}</td>
                                        <td>{{item.role == 0 ? 'Admin' : item.role == 1 ? 'Motorista' : 'User'}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>