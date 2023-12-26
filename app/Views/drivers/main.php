<!--start page wrapper -->
<div class="page-wrapper">

    <!-- Body -->
    <div class="page-content" id="app">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3 fw-bold pb-3" style="background-color:#F5F5DC;">
            <div class="breadcrumb-title pe-3">Motoristas</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $show == 'all' ? 'Todos os motoristas' : 'Motoristas não aprovados' ?></li>
                    </ol>
                </nav>
            </div>

        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <form class="d-flex mb-3" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <!-- <th>#</th> -->
                                        <th>Opção</th>
                                        <th>Nome</th>
                                        <th>BI</th>
                                        <th>Telefone</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in drivers">
                                        <td>
                                            <a class="btn btn-info" :href="'/drivers/' + item.user.bilhete_identidade">
                                                <i class="bx bx-show text-center"></i>
                                            </a>
                                        </td>
                                        <td>{{item.user.name}}</td>
                                        <td>{{item.user.bilhete_identidade}}</td>
                                        <td>999999999</td>
                                        <td>{{item.user.email}}</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div style="background-color:#F5F5DC;" class="card col-lg-3 col-xs-12 pull-right p-3" style="padding-right: 0px">
                <h6 class="mb-0 text-uppercase">Opções</h6>
                <hr />
                <a href="/drivers/new" class="btn btn-primary  blue btn-lg" style="margin-bottom: 10px;"><i class="bx bx-plus mr-1"></i>Adicionar de Motorista</a>
                <br>
            </div>
        </div>



    </div>
</div>

<script>
    const listDrivers = new Vue({
        el: '#app',
        data() {
            return {
                drivers: []
            }
        },
        methods: {
            getDrivers: async function() {
                const options = {
                    method: 'GET',
                    headers: {
                        /* 'User-Agent': 'insomnia/2023.5.8', */
                        Authorization: 'Bearer ' + sessionStorage.token
                    }
                };

                // Exemplo de uso:
                let list = '<?= $show ?>' == 'all' ? endpoins.allDrivers : endpoins.unappprevedDrivers;

                await fetch(endpoins.api + list, options)
                    .then(response => response.json())
                    .then(response => {
                        try {
                            if ('<?= $show ?>' == 'all') {
                                this.drivers = response;
                            } else {
                                this.drivers = response.drivers;
                            }
                            console.log(response);
                        } catch (error) {
                            drivers: []
                        }
                    })
                    .catch(err => console.error(err));


                /* var myHeaders = new Headers();
                myHeaders.append(
                    "Authorization",
                    "Bearer " + sessionStorage.getItem("token")
                );

                var formdata = new FormData();
                formdata.append("edificio", this.edificio);

                var requestOptions = {
                    method: "POST",
                    headers: myHeaders,
                    body: formdata,
                    redirect: "follow",
                };

                fetch(base_url + "/apartamento", requestOptions)
                    .then((response) => response.json())
                    .then((result) => {
                        if (result.status == 401) {
                            alert(result.message);
                            // this.$destroy();                       
                        } else if (result.status == 402) {
                            return alert(result.message);
                        } else if (result.status == 403) {
                            return alert(result.message);
                        } else {
                            console.log(result);
                            this.apartamentos = result.apartamentos;
                        }
                    })
                    .catch((error) => console.log("error", error)); */
            },
        },
        mounted() {
            this.getDrivers();
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