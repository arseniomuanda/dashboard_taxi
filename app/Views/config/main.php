<div class="page-wrapper">
    <div class="page-content" id="main">
        <!--breadcrumb-->
        <input type="hidden" id="main_id" :value="id">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-1 fw-bold pb-3" style="background-color:#F5F5DC;">
            <div class="breadcrumb-title pe-3"><span class="text-danger m-1">0</span>Configuração de Edifício</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-lg-9 col-xs-12">
                <div class="card" style="background-color: #d8d7adee;">
                    <div class="card-body">
                        <form class="row" autocomplete="off" enctype="multipart/form-data" onsubmit="event.preventDefault();salvar()" autocapitalize="on">

                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-buildings me-1 font-22 text-danger"></i>
                                </div>
                                <h5 class="mb-0 text-danger">Dados do Edifício</h5>
                            </div>
                            <hr>
                            <div class="col-md-6">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Edifício <span class="text-danger">*</span></span>
                                    <input v-if="edificio.nome == null" type="search" required class="form-control" @focusout="checkIsExistent()" id="edificio">
                                    <input v-else="edificio.nome == null" type="text" required class="form-control" :value="edificio.nome" id="edificio">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Nº Andar<span class="text-danger">*</span></span>
                                    <input v-if="edificio.nome == null" type="number" required class="form-control" placeholder="" aria-label="tel" id="n_andares">
                                    <input v-else type="number" required class="form-control" placeholder="" :value="edificio.n_andares" aria-label="tel" id="n_andares">
                                </div>
                            </div>
                            <div class="col-md-6" title="Apartamentos por andar">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Imóvel/Andar<span class="text-danger">*</span></span>
                                    <input v-if="edificio.nome == null" type="text" required class="form-control" aria-label="morada" id="aptandar">
                                    <input v-else type="text" required class="form-control" :value="edificio.apts_andar" aria-label="morada" id="aptandar">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Tipologia<span class="text-danger">*</span></span>
                                    <select type="text" class="form-select" required aria-label="morada" id="tipologia">
                                        <option value="">Selecionar Tipologia</option>
                                        <option v-for="item in tipologias" v-bind:selected="item.nome == edificio.tipologia" :value="item.nome">{{item.nome}}</option>
                                    </select>
                                    <datalist id="ttipologia">
                                        <option value="">Não existe</option>
                                        <option v-for="item in tipologias" v-bind:selected="item.nome == edificio.tipologia" :value="item.nome">{{item.nome}}</option>
                                    </datalist>
                                </div>
                            </div>

                            <!--span class="input-group-text w-25" id="basic-addon1">Tem Lojas?<span!-- class="text-danger">*</span!-->
                            <!--input type="checkbox" oninput="temLoja(this)" class="form-check-input" required aria-label="morada" id="aptandar"-->

                            <details v-if="!is_created" class="col-md-12" onclick="if(this.open){tloja.innerText='Tem Lojas?';ope(false);}else{tloja.innerText='Tem Lojas &#10003;';ope(true)}">
                                <summary class="text-center">
                                    <h5 class="mb-0 text-danger" style="display: inline;" id="tloja">Tem Lojas?</h5>
                                </summary>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-1" title="Tipo de loja"> <span class="input-group-text w-25" id="ltipoloja">T.Loja<span class="text-danger">&nbsp;*</span></span>
                                            <input list="ttipologia" type="text" class="form-control" aria-label="tipoloja" id="tipoloja">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-1" title="Quantidade de Lojas"> <span class="input-group-text w-25" id="basic-addon1">Quantid.<span class="text-danger">&nbsp;*</span></span>
                                            <input type="number" min="2" class="form-control" aria-label="quantidade" id="quantidade" placeholder="Quantidade de Lojas">
                                        </div>
                                    </div>
                                </div>



                            </details>
                            <br />
                            <hr>
                            <!--  -->

                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-map-pin me-1 font-22 text-danger"></i>
                                </div>
                                <h5 class="mb-0 text-danger">Endereço</h5>
                            </div>
                            <hr>

                            <div class="col-md-6">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Província<span class="text-danger">*</span></span>
                                    <select type="text" @change="getMunicipio()" class="form-control" placeholder="" required aria-label="tel" id="provincia">
                                        <option value="">Selecionar Província</option>
                                        <option v-for="item in provincia" v-bind:selected="item.nome == edificio.provincia" :value="item.cod">{{item.nome}}</option>
                                        <option value="">N/A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" v-if="municipio!=null || !is_criarEdificio">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Município<span class="text-danger">*</span></span>
                                    <select type="text" @change="getDistrito()" class="form-control" placeholder="" required aria-label="tel" id="municipio">
                                        <option v-if="!is_criarEdificio" selected>{{edificio.municipio}}</option>
                                        <option v-for="item in municipio" :value="item.cod">{{item.nome}}</option>
                                        <option value="">N/A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" v-if="distrito!=null || !is_criarEdificio">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Distrito<span class="text-danger">*</span></span>
                                    <select type="text" @change="getBairro()" class="form-control" placeholder="" required aria-label="tel" id="distrito">
                                        <option v-if="!is_criarEdificio" selected>{{edificio.distrito}}</option>
                                        <option v-for="item in distrito" :value="item.cod">{{item.nome}}</option>
                                        <option value="">N/A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" v-if="bairro!=null || !is_criarEdificio">
                                <div class="input-group mb-1" title="Município ou Districto"> <span class="input-group-text w-25" id="basic-addon1">Comuna</span>
                                    <select type="text" @change="getRua()" class="form-control" placeholder="" aria-label="tel" id="bairro">
                                        <option v-if="!is_criarEdificio" value="" selected>{{edificio.bairro}}</option>
                                        <option v-else selected value="">Selecionar Comuna</option>
                                        <option v-for="item in bairro" :value="item.cod">{{item.nome}}</option>
                                        <option value="">N/A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" v-if="bairro!=null || !is_criarEdificio">
                                <div class="input-group mb-1" title="Município ou Districto"> <span class="input-group-text w-25" id="basic-addon1">Bairro</span>
                                    <select type="text" @change="getRua()" class="form-control" placeholder="" aria-label="tel" id="bairro">
                                        <option v-if="!is_criarEdificio" value="" selected>{{edificio.bairro}}</option>
                                        <option v-else selected value="">Selecionar Bairro</option>
                                        <option v-for="item in bairro" :value="item.cod">{{item.nome}}</option>
                                        <option value="">N/A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" v-show="(bairro!=null || !is_criarEdificio) && edificio.rua != null">
                                <div class="input-group mb-1" title="Município ou Districto"> <span class="input-group-text w-25" id="basic-addon1">Rua</span>
                                    <select type="text" class="form-select" placeholder="" aria-label="tel" id="rua">
                                        <option v-if="!is_criarEdificio" value="" selected>{{edificio.rua}}</option>
                                        <option v-else selected value="">Selecionar Rua</option>
                                        <option v-for="item in rua" :value="item.cod">{{item.nome}}</option>
                                        <option value="">N/A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" title="Apartamentos por andar">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Quarteirao<span class="text-danger">*</span></span>
                                    <input v-if="edificio.nome == null" type="text" class="form-control" required aria-label="morada" id="quarteirao">
                                    <input v-else type="text" class="form-control" :value="edificio.quarteirao" required aria-label="morada" id="quarteirao">
                                </div>
                            </div>
                            <div class="col-md-6" title="Apartamentos por andar">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Praceta<span class="text-danger">*</span></span>
                                    <input v-if="edificio.nome == null" type="text" class="form-control" required aria-label="morada" id="praceta">
                                    <input v-else type="text" class="form-control" :value="edificio.praceta" required aria-label="morada" id="praceta">
                                </div>
                            </div>
                            <div class="col-md-6" title="Apartamentos por andar">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Largo<span class="text-danger">*</span></span>
                                    <input v-if="edificio.nome == null" type="text" class="form-control" required aria-label="morada" id="largo">
                                    <input v-else type="text" class="form-control" :value="edificio.largo" required aria-label="morada" id="largo">
                                </div>
                            </div>
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bx-globe me-1 font-22 text-danger"></i>
                                </div>
                                <h5 class="mb-0 text-danger">Mapa</h5>
                            </div>
                            <hr>
                            <div class="col-md-6" title="Apartamentos por andar">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Latitude</span>
                                    <input v-if="edificio.nome == null" type="text" class="form-control" aria-label="morada" id="gps_latitude">
                                    <input v-else type="text" class="form-control" :value="edificio.gps_latitude" aria-label="morada" id="gps_latitude">
                                </div>
                            </div>
                            <div class="col-md-6" title="Apartamentos por andar">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Longetude</span>
                                    <input v-if="edificio.nome == null" type="text" class="form-control" aria-label="morada" id="gps_longitude">
                                    <input v-else type="text" class="form-control" :value="edificio.gps_longitude" aria-label="morada" id="gps_longitude">
                                </div>
                            </div>
                            <div class="col-md-6" title="Apartamentos por andar">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">What3Words</span>
                                    <input v-if="edificio.nome == null" type="text" class="form-control" aria-label="morada" id="w3w">
                                    <input v-else type="text" class="form-control" :value="edificio.w3w" aria-label="morada" id="w3w">
                                </div>
                            </div>
                            <!-- Depois de preencher todos os dados bloquar os campos para apenas o admin do editar -->
                            <!-- Adicionar as informaçoes sobre os campos como tamanho de imagens e outros -->
                            <!-- O super utilizador vai poder editar mesmo em tela blaqueada -->
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-bank me-1 font-22 text-danger"></i>
                                </div>
                                <h5 class="mb-0 text-danger">Coordenadas Bancárias</h5>
                            </div>
                            <hr>

                            <div class="col">
                                <div class="col-md-12">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Banco 1</span>
                                        <input v-if="edificio.nome == null" type="text" class="form-control" placeholder="" aria-label="tel" id="banco1">
                                        <input v-else type="text" class="form-control" placeholder="" :value="edificio.banco1" aria-label="tel" id="banco1">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group mb-1" title="Número da Conta"> <span class="input-group-text w-25" id="basic-addon1">Nº Conta 1</span>
                                        <input v-if="edificio.nome == null" type="text" class="form-control" placeholder="" aria-label="tel" id="n_conta1">
                                        <input v-else type="text" class="form-control" placeholder="" :value="edificio.conta1" aria-label="tel" id="n_conta1">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">IBAN 1</span>
                                        <input v-if="edificio.nome == null" type="text" class="form-control" placeholder="" aria-label="tel" id="iban1">
                                        <input v-else type="text" class="form-control" placeholder="" :value="edificio.iban1" aria-label="tel" id="iban1">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col">
                                <div class="col-md-12">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Banco 2</span>
                                        <input v-if="edificio.nome == null" type="text" class="form-control" placeholder="" aria-label="tel" id="banco2">
                                        <input v-else type="text" class="form-control" placeholder="" :value="edificio.banco2" aria-label="tel" id="banco2">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group mb-1" title="Número da Conta"> <span class="input-group-text w-25" id="basic-addon1">Nº Conta 2</span>
                                        <input v-if="edificio.nome == null" type="text" class="form-control" placeholder="" aria-label="tel" id="n_conta2">
                                        <input v-else type="text" class="form-control" placeholder="" :value="edificio.conta2" aria-label="tel" id="n_conta2">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">IBAN 2</span>
                                        <input v-if="edificio.nome == null" type="text" class="form-control" placeholder="" aria-label="tel" id="iban2">
                                        <input v-else type="text" class="form-control" placeholder="" :value="edificio.iban2" aria-label="tel" id="iban2">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col">
                                <div class="col-md-12">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Banco 3</span>
                                        <input v-if="edificio.nome == null" type="text" class="form-control" placeholder="" aria-label="tel" id="banco3">
                                        <input v-else type="text" class="form-control" placeholder="" :value="edificio.banco3" aria-label="tel" id="banco3">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group mb-1" title="Número da Conta"> <span class="input-group-text w-25" id="basic-addon1">Nº Conta 3</span>
                                        <input v-if="edificio.nome == null" type="text" class="form-control" placeholder="" aria-label="tel" id="n_conta3">
                                        <input v-else type="text" class="form-control" placeholder="" :value="edificio.conta3" aria-label="tel" id="n_conta3">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">IBAN 3</span>
                                        <input v-if="edificio.nome == null" type="text" class="form-control" placeholder="" aria-label="tel" id="iban3">
                                        <input v-else type="text" class="form-control" placeholder="" :value="edificio.iban3" aria-label="tel" id="iban3">
                                    </div>
                                </div>
                            </div>


                            <!-- <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-cog me-1 font-22 text-danger"></i>
                            </div>
                            <h5 class="mb-0 text-danger">Tipologia</h5>
                        </div>
                        <hr>

                        <div class="col-md-3">
                            <a type="button" class="btn btn-secondary btn-md w-100">Loja 1</a>
                        </div>
                        <div class="col-md-3">
                            <a type="button" class="btn btn-secondary btn-md w-100">Loja 2</a>
                        </div>
                        <div class="col-md-3">
                            <a type="button" class="btn btn-secondary btn-md w-100">Loja 3</a>
                        </div>
                        <div class="col-md-3">
                            <a type="button" class="btn btn-secondary btn-md w-100">Loja 4</a>
                        </div> 
                        
                        <div class="position-relative">
                            <div class="col-md-3 position-static bottom-0 end-0">
                                <a type="button" class="btn btn-primary btn-md w-75" data-bs-toggle="modal" data-bs-target="#novaTipologia">Add
                                    Tipologia</a>
                            </div>
                        </div>
                        -->

                            <!-- 
                        <div class="row" v-if="edificio.nome!=null"></div>
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-store me-1 font-22 text-danger"></i>
                            </div>
                            <h5 class="mb-0 text-danger">Lojas</h5>
                        </div>
                        <hr>

                        
                        <div class="col-md-3">
                            <a type="button" class="btn btn-secondary btn-md w-100">Loja 1</a>
                        </div>
                        <div class="col-md-3">
                            <a type="button" class="btn btn-secondary btn-md w-100">Loja 2</a>
                        </div>
                        <div class="col-md-3">
                            <a type="button" class="btn btn-secondary btn-md w-100">Loja 3</a>
                        </div>
                        <div class="col-md-3">
                            <a type="button" class="btn btn-secondary btn-md w-100">Loja 4</a>
                        </div>
                          

                        <div class="position-relative">
                            <div class="col-md-3 position-static bottom-0 end-0">
                                <a type="button" class="btn btn-primary btn-md w-75" data-bs-toggle="modal" data-bs-target="#novaLoja">Add
                                    Loja</a>
                            </div>
                        </div>
                            -->
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-file-pdf me-1 font-22 text-danger"></i>
                                </div>
                                <h5 class="mb-0 text-danger">Impressão nos Documentos</h5>
                            </div>
                            <hr>

                            <div class="col-md-12">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Rodapé Recibo</span>
                                    <textarea v-if="edificio.nome == null" type="text" class="form-control" placeholder="" aria-label="tel" id="msg_rodape"></textarea>
                                    <textarea v-else type="text" class="form-control" placeholder="" :value="edificio.rodape_recibo" aria-label="tel" id="msg_rodape"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Mensagem Recibo</span>
                                    <textarea v-if="edificio.nome == null" type="text" class="form-control" placeholder="" aria-label="tel" id="msg_recibo"></textarea>
                                    <textarea v-else type="text" class="form-control" placeholder="" :value="edificio.msg_recibo" aria-label="tel" id="msg_recibo"></textarea>
                                </div>
                            </div>

                            <div class="input-group mb-1">
                                <label class="input-group-text w-25" for="logotipo">Logotipo1</label>
                                <input type="file" class="form-control" id="logotipo1">
                            </div>

                            <div class="input-group mb-1">
                                <label class="input-group-text w-25" for="logotipo">Logotipo2</label>
                                <input type="file" class="form-control" id="logotipo2">
                            </div>

                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-chat me-1 font-22 text-danger"></i>
                                </div>
                                <h5 class="mb-0 text-danger">Mensagem</h5>
                            </div>
                            <hr>

                            <div class="col-md-12" title="Mensagem de login">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Mensagem de Login</span>
                                    <textarea v-if="edificio.nome == null" type="text" class="form-control" placeholder="" id="msg_login"></textarea>
                                    <textarea v-else type="text" class="form-control" placeholder="" id="msg_login" :value="edificio.msg_login"></textarea>
                                </div>
                            </div>
                            <hr>

                            <div class="col-12">
                                <div class="position-relative m-4">
                                    <div class="position-absolute bottom-0 end-0">
                                        <button type="submit" class="btn btn-primary px-5 lg">Salvar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="novaTipologia" tabindex="-1" aria-labelledby="novaTipologiaLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Documento de Arrendamento do apartamento Nº {{apartamento.numero}}</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <iframe :src="morador.doc_arrendamento" height="100%" width="100%"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>