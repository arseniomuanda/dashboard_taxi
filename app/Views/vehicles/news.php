<div class="page-content" id="main">
    <!--breadcrumb-->
    <input type="hidden" value="<?= @$id ?>" id="main_id">
    <input type="hidden" value="<?= @$apt ?>" id="apt">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-1 fw-bold pb-3" style="background-color:#F5F5DC;">
        <div class="breadcrumb-title pe-3">Morador</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/morador">Morador </a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{morador.nome}}</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-lg-9 col-xs-12">
            <div class="row">
                <div class="card" style="background-color: #d8d7adee;">
                    <div class="card-body">
                        <form method="POST" onsubmit="event.preventDefault();salvar()" autocomplete="off" autocapitalize="on">
                            <fieldset class="row" :disabled="!is_admin && !is_super_admin">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-store me-1 font-22 text-danger"></i>
                                    </div>
                                    <h5 class="mb-0 text-danger fw-bold" title="Dados do apartamento">Dados do Apartamento</h5>

                                </div>

                                <hr>

                                <div class="col-md-6" title="Apartamento">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Imóvel</span>
                                        <span type="text" class="form-control fw-bold" :readonly="!is_admin && !is_super_admin" aria-label="morada" id="referencia_apt" aria-describedby="basic-addon1">{{apartamento.edificio + ' - ' + apartamento.numero + ' - ' + apartamento.tipologia}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Nº Inscrição</span>
                                        <input type="text" class="form-control fw-bold" :readonly="!is_admin && !is_super_admin" aria-label="morada" id="referencia_apt" :value="apartamento.referencia" aria-describedby="basic-addon1">
                                    </div>
                                </div>


                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-key me-1 font-22 text-danger"></i>
                                    </div>
                                    <h5 class="mb-0 text-danger fw-bold">Identificação (BI ou Passaporte)</h5>
                                </div>
                                <hr>

                                <!--  -->
                                <div class="col-md-6">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Nome</span>
                                        <input type="text" class="form-control fw-bold" :readonly="!is_admin && !is_super_admin" id="nome_morador" aria-label="name" :value="morador.nome" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Telefone</span>
                                        <input type="number" class="form-control fw-bold" :readonly="!is_admin && !is_super_admin" id="telefone_morador" pattern="(9)(\d{8})" maxlength="9" placeholder="" :value="morador.telefone" aria-label="tel" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">WhatsApp</span>
                                        <input type="text" class="form-control fw-bold" :readonly="!is_admin && !is_super_admin" placeholder="" pattern="(9)(\d{8})" maxlength="9" id="whatsapp_morador" :value="morador.whatsapp" aria-label="tel" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Email</span>
                                        <input type="email" class="form-control fw-bold" :readonly="!is_admin && !is_super_admin" aria-label="morada" id="email_morador" :value="morador.email" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <!--  -->

                                <div class="col-md-6">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Pai</span>
                                        <input type="text" class="form-control" :readonly="!is_admin && !is_super_admin" placeholder="" :value="pessoa.pai" id="pai_bi" aria-label="tel" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Mãe</span>
                                        <input type="text" class="form-control" :readonly="!is_admin && !is_super_admin" placeholder="" :value="pessoa.mae" id="mae_bi" aria-label="tel" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-md-6" title="Número de BI ou Passaporte">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">BIª</span>
                                        <input type="text" class="form-control" :readonly="!is_admin && !is_super_admin" :value="pessoa.bi" id="bi" aria-label="morada" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Residência</span>
                                        <input type="text" class="form-control" :readonly="!is_admin && !is_super_admin" :value="pessoa.residencia" aria-label="morada" id="residencia_bi" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Natural de</span>
                                        <input type="text" class="form-control" :readonly="!is_admin && !is_super_admin" :value="pessoa.naturalidade" aria-label="morada" id="naturadilida_bi" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-6" title="Data de Nascimento">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Data Nasc.</span>
                                        <input type="text" class="form-control" :readonly="!is_admin && !is_super_admin" :value="pessoa.data_nasce" aria-label="morada" id="datanasc_bi" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-1" title="Estrangeiro"> <span class="input-group-text w-25" id="basic-addon1">Estrang.<span class="text-danger">*</span></span>
                                        <select class="form-select fw-bold" aria-label="morada" aria-describedby="basic-addon1" id="is_passaport" @change="verificarNacionalidade()">
                                            <option value="">Escolher Opção</option>
                                            <option v-bind:selected="'1' == pessoa.is_passaport" value="1">Sim</option>
                                            <option v-bind:selected="'0' == pessoa.is_passaport" value="0">Não</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-1" title="Pessoa Portadora de Deficiência"> <span class="input-group-text w-25" id="basic-addon1">PPD<span class="text-danger">*</span></span>
                                        <select class="form-select fw-bold" aria-label="morada" aria-describedby="basic-addon1" id="is_pdd">
                                            <option value="">Escolher Opção</option>
                                            <option v-bind:selected="'1' == pessoa.is_ppd" value="1">Sim</option>
                                            <option v-bind:selected="'0' == pessoa.is_ppd" value="0">Não</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6" v-if="!isEstrangeiro">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Província<span class="text-danger">*</span></span>
                                        <select type="text" class="form-select" placeholder="" required aria-label="tel" id="provincia_bi">
                                            <option value="">Selecionar Província</option>
                                            <option v-for="item in provincia" v-bind:selected="item.nome == pessoa.provincia" :value="item.nome">{{item.nome}}</option>
                                            <option value="N/A">N/A</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6" v-else>
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">País<span class="text-danger">*</span></span>
                                        <select type="text" class="form-select" aria-label="tel" id="pais">
                                            <option :value="pessoa.pais">{{pessoa.pais}}</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Aland Islands">Aland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
                                            <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote D&apos;ivoire">Cote D'ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Curacao">Curacao</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Territories">French Southern Territories</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea, Democratic People&apos;s Republic of">Korea, Democratic People's Republic of</option>
                                            <option value="Korea, Republic of">Korea, Republic of</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Lao People&apos;s Democratic Republic">Lao People's Democratic Republic</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macao">Macao</option>
                                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Sexo</span>
                                        <select class="form-select" :readonly="!is_admin && !is_super_admin" aria-label="morada" id="sexo_bi" aria-describedby="basic-addon1">
                                            <option value="M">Masculino</option>
                                            <option value="F">Feminino</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Altura</span>
                                        <input type="text" class="form-control" :readonly="!is_admin && !is_super_admin" :value="pessoa.altura" id="altura_bi" aria-label="morada" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-md-6" title="Estado Civil">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Est. Civil</span>
                                        <input type="text" class="form-control" :readonly="!is_admin && !is_super_admin" :value="pessoa.estado_civil" id="estadocivil_bi" aria-label="morada" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-md-6" title="Data de Emissão">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Data Emi.</span>
                                        <input type="date" class="form-control" :readonly="!is_admin && !is_super_admin" :value="pessoa.data_emissao" id="detaemissao_bi" aria-label="morada" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-md-6" title="Data de Expiração">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Data Exp.</span>
                                        <input type="date" class="form-control" :readonly="!is_admin && !is_super_admin" :value="pessoa.data_validade" id="dataexpiracao_bi" aria-label="morada" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-key me-1 font-22 text-danger"></i>
                                    </div>
                                    <h5 class="mb-0 text-danger fw-bold">Dados de Cartões</h5>
                                </div>
                                <hr>
                                <div class="col-md-6" title="Cartão de Munínipe">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Cart. Muníc.</span>
                                        <input type="text" class="form-control" :value="pessoa.cart_municipe" id="cart_municipe" aria-label="morada" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-6" title="Cartão de Eleitor">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Cart. Eleit</span>
                                        <input type="text" class="form-control" :value="pessoa.cart_eleitor" id="cart_eleitor" aria-label="morada" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-6" title="Número de Identificação Fiscal">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">NIF</span>
                                        <input type="text" class="form-control" :value="pessoa.nif" id="nif_bi" aria-label="morada" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-6" title="Número de Segurança Sócial">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">NISS</span>
                                        <input type="text" class="form-control" :value="pessoa.niss" id="niss" aria-label="morada" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <!--  -->
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-key me-1 font-22 text-danger"></i>
                                    </div>
                                    <h5 class="mb-0 text-danger fw-bold">Outras Informações</h5>
                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Profissão</span>
                                        <input type="text" class="form-control" :value="morador.profissao" id="profissao" aria-label="morada" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-6" title="Nome da Empresa">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">N. da Empr.</span>
                                        <input type="text" class="form-control" :value="morador.nome_empresa" id="nome_empresa" aria-label="morada" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-12" title="Local de Trabalho">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Local de Trabalho</span>
                                        <input type="text" class="form-control" :value="morador.local_trabalho" id="local_trabalho" aria-label="morada" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-12" title="Habilidades Literárias">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Habilidades Liter.</span>
                                        <input type="text" class="form-control" :value="morador.habilidade_literaria" id="habilidade_literaria" aria-label="morada" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-map-pin me-1 font-22 text-danger"></i>
                                    </div>
                                    <h5 class="mb-0 text-danger fw-bold">Validade do Contracto</h5>
                                </div>
                                <hr>

                                <div class="col-md-6" title="Data de Entrada">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Inicio<span class="text-danger">*</span></span>
                                        <input type="date" class="form-control" id="dataentrada" :value="morador.dataentrada" required aria-label="morada" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-6" title="Data de Saída">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Fim</span>
                                        <input type="date" class="form-control" id="datasaida" :value="morador.datasaida" aria-label="morada" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-file-pdf me-1 font-22 text-danger"></i>
                                    </div>
                                    <h5 class="mb-0 text-danger fw-bold">Foto do Morador</h5>
                                </div>
                                <hr>

                                <div class="input-group mb-1">
                                    <label class="input-group-text w-25" for="foto_morador">Anexo em Imagem</label>
                                    <input type="file" v-if="!is_admin && !is_super_admin" readonly class="form-control" id="foto_morador">
                                    <input type="file" v-else @change="salvarAnexo()" class="form-control" id="foto_morador">
                                </div>

                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-file-pdf me-1 font-22 text-danger"></i>
                                    </div>
                                    <h5 class="mb-0 text-danger fw-bold">Documento de Arrendamento</h5>
                                </div>
                                <hr>
                                <div class="input-group mb-1">
                                    <label class="input-group-text w-25" for="anexo">Anexo em PDF</label>
                                    <input type="file" class="form-control" v-if="!is_admin && !is_super_admin" readonly id="doc_arrendamento">
                                    <input type="file" class="form-control" v-else @change="salvarAnexo2()" id="doc_arrendamento">
                                </div>
                                <hr>
                                <div v-if="is_admin || is_super_admin" class="col-12">
                                    <div class="position-relative m-4">
                                        <div class="position-absolute bottom-0 end-0">
                                            <button type="submit" class="btn btn-primary px-5 lg">Salvar</button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card" style="background-color: #d8d7adee;">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-danger"></i>
                            </div>
                            <h5 class="mb-0 text-danger fw-bold">Lista de Agregados</h5>
                        </div>
                        <hr>

                        <div class="row" v-for="item in agregados">

                            <div class="col-md-6">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Nome</span>
                                    <input type="text" class="form-control" readonly aria-label="name" :value="item.nome" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Nome</span>
                                    <input type="text" class="form-control" readonly aria-label="name" :value="item.nome" aria-describedby="basic-addon1">
                                </div>
                            </div> -->
                            <div class="col-md-6" title="Grau de Parentesco">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">G. Parent</span>
                                    <input type="text" class="form-control" readonly placeholder="" :value="item.parentesco" aria-label="tel" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">PPD</span>
                                    <select type="number" class="form-control" readonly placeholder="" required aria-label="tel" aria-describedby="basic-addon1">
                                        <option value="">Selecionar Opção</option>
                                        <option value="1" :selected="item.pdd== 1">Sim</option>
                                        <option value="0" :selected="item.pdd== 0">Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Data Nasc.</span>
                                    <input type="date" class="form-control" readonly placeholder="" :value="item.data_nasc" aria-label="tel" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-6" title="É Estrangeiro?">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Estrang</span>
                                    <select type="number" class="form-control" placeholder="" readonly aria-label="tel" aria-describedby="basic-addon1">
                                        <option value="">Selecionar Opção</option>
                                        <option value="1" :selected="item.is_stranger== 1">Sim</option>
                                        <option value="0" :selected="item.is_stranger== 0">Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" title="Sexo">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Sexo</span>
                                    <select type="number" class="form-control" placeholder="" readonly aria-label="tel" aria-describedby="basic-addon1">
                                        <option value="">Selecionar Opção</option>
                                        <option value="M" :selected="item.sexo=='M'">Masculino</option>
                                        <option value="F" :selected="item.sexo=='F'">Feminino</option>
                                    </select>
                                </div>
                            </div>
                            <div class=" col-md-6" title="Tipo de Documento">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Tipo Doc.</span>
                                    <input type="text" class="form-control" readonly aria-label="morada" :value="item.tipo_documento" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-6" title="Número do Documento">
                                <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Nº Doc</span>
                                    <input type="text" class="form-control" readonly aria-label="morada" :value="item.n_documento" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div v-if="true" class="row mb-3">
                                <div class="col-md-3">
                                    <a :href="'/agregado/perfil/' + item.id" type="button" class="btn btn-primary btn-md w-100"><i class='bx bx-edit-alt mr-1'></i>Editar</a>
                                </div>
                                <div class="col-md-3" v-if="is_admin || is_super_admin">
                                    <button type="button" @doubleclick="deletar(item.id)" class="btn btn-danger btn-md w-100"><i class='bx bxs-trash mr-1'></i>Eliminar</button>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card" style="background-color: #d8d7adee;">
                    <div class="card-body">
                        <form class="row" method="POST" onsubmit="event.preventDefault();salvarAgregado()" autocomplete="off" autocapitalize="on">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-danger"></i>
                                </div>
                                <h5 class="mb-0 text-danger fw-bold">Novo Agregado</h5>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Nome<span class="text-danger">*</span></span>
                                        <input type="text" class="form-control" aria-label="name" id="nome_agregado" required aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-6" title="Grau de Parentesco">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">G. Parent<span class="text-danger">*</span></span>
                                        <select type="number" class="form-control" placeholder="" required aria-label="tel" id="parentesco_agregado" aria-describedby="basic-addon1">
                                            <option value="">Selecionar Parentesco</option>
                                            <option value="Filho/Filha">Filho/Filha</option>
                                            <option value="Esposo/Esposa">Esposo/Esposa</option>
                                            <option value="Avô/Avó">Avô/Avó</option>
                                            <option value="Pai/Mãe">Pai/Mãe</option>
                                            <option value="Filho/Filha">Filho/Filha</option>
                                            <option value="Afilhado/Afilhada">Afilhado/Afilhada</option>
                                            <option value="Sobrinho/Sobrinha">Sobrinho/Sobrinha</option>
                                            <option value="Primo/Prima">Primo/Prima</option>
                                            <option value="Irmão/irmã">Irmão/irmã</option>
                                            <option value="Tio/Tia">Tio/Tia</option>
                                            <option value="Sogro/Sogra">Sogro/Sogra</option>
                                            <option value="Genro/Nora">Genro/Nora</option>
                                            <option value="Cunhado/Cunhada">Cunhado/Cunhada</option>
                                            <option value="Amigo/Amiga">Amigo/Amiga</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" title="Data de Nascimento">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Data Nasc.<span class="text-danger">*</span></span>
                                        <input type="date" class="form-control" placeholder="" id="data_nasc_agregado" required aria-label="tel" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">PPD<span class="text-danger">*</span></span>
                                        <select type="number" class="form-control" placeholder="" required id="ppd_agregado" aria-label="tel" aria-describedby="basic-addon1">
                                            <option value="">Selecionar Opção</option>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Sexo<span class="text-danger">*</span></span>
                                        <select type="number" class="form-control" placeholder="" required id="sexo_agregado" aria-label="tel" aria-describedby="basic-addon1">
                                            <option value="">Selecionar Opção</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" title="É Estrangeiro?">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Estrang<span class="text-danger">*</span></span>
                                        <select type="text" class="form-select" aria-label="morada" id="estrangeiro_agregado" required aria-describedby="basic-addon1">
                                            <option value="">Selecionar Opção</option>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6" title="Tipo de Documento">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Tipo Doc.</span>
                                        <select type="text" class="form-select" aria-label="morada" id="tipo_doc_agregado" aria-describedby="basic-addon1">
                                            <option value="">Selecionar Tipo Doc.</option>
                                            <option value="Certidão de Nascimento">Certidão de Nascimento</option>
                                            <option value="BI">BI</option>
                                            <option value="Passaporte">Passaporte</option>
                                            <option value="Outro">Outro</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6" title="Número do Documento">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Nº Doc</span>
                                        <input type="text" class="form-control" aria-label="morada" id="numero_doc_agregado" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                                <div class="col-md-6" title="Data de Nascimento">
                                    <div class="input-group mb-1"> <span class="input-group-text w-25" id="basic-addon1">Foto</span>
                                        <input type="file" class="form-control" id="foto_agregado" aria-label="tel" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12" v-if="is_admin || is_super_admin">
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

        <div class="col-lg-3">
            <div class="d-grid gap-2 mb-2 card p-2" style="background-color:#F5F5DC;">
                <h6 class="mb-0 text-uppercase text-center fw-bold">Opções</h6>
                <hr />
                <a data-bs-toggle="modal" data-bs-target="#novaTipologia" class="btn btn-primary blue btn-lg" style="margin-bottom: 10px;"><i class='bx bxs-file-pdf mr-1'></i>Mostrar Anexo</a>
                <a href="" target="_blank" class="btn btn-primary blue btn-lg" style="margin-bottom: 10px;"><i class='bx bxs-file-pdf mr-1'></i>Imprimir Ficha Do Morador</a>
            </div>
            <div class="d-grid gap-2 mb-2 card p-2" style="background-color:#F5F5DC;">
                <h6 class="mb-0 text-uppercase text-center fw-bold">Foto do Morador</h6>
                <hr />
                <img width="100%" height="100%" :src="morador.foto">
            </div>
        </div>
    </div>
</div>