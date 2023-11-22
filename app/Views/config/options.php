<div class="col-lg-3">
    <?php if (isset($mostrar_opcao)) : ?>
        <div class="d-grid gap-2 mb-2 card p-2 fw-bold" style="background-color:#F5F5DC;">
            <div class="portlet-title bg-grey-salt bg-font-grey mb-0 text-uppercase text-center">
                <div class="caption">
                    Opções
                </div>
            </div>
            <div style="font-size: 15px" class="portlet-body">
                <a class="text-danger">
                    <i class='bx bxs-lock'></i> Bloquear
                </a>
                <hr style=" margin-top: 8px; margin-bottom: 8px; ">
                <a class="text-danger">
                    <i class='bx bxs-lock-open-alt'></i> Desbloquear
                </a>
                <hr style=" margin-top: 8px; margin-bottom: 8px; ">
                <a class="text-danger">
                    <i class='bx bxs-trash-alt'></i></i> Eliminar
                </a>
            </div>
        </div>
    <?php endif ?>

    <div class="d-grid gap-2 mb-2 card p-2 fw-bold" style="background-color:#F5F5DC;">
        <div class="portlet-title bg-grey-salt bg-font-grey mb-0 text-uppercase text-center">
            <div class="caption">
                <span class="text-danger m-1">0</span>Configurações
            </div>
        </div>
        <div style="font-size: 15px" class="portlet-body">
            <a href="/config/acesso" class="">
                <span class="text-danger m-1">0.10</span>Acessos
            </a>
            <hr style=" margin-top: 8px; margin-bottom: 8px; ">
            <a href="/config/utilizador" class="">
                <span class="text-danger m-1">0.11</span>Utilizadores
            </a>
        </div>
    </div>

</div>
</div>
</div>
</div>

<script>
    const configVue = new Vue({
        el: '#app',
        data() {
            return {
                users: []
            }
        },
        methods: {
            getUsers: async function() {
                const options = {
                    method: 'GET',
                    headers: {
                        /* 'User-Agent': 'insomnia/2023.5.8', */
                        Authorization: 'Bearer ' + sessionStorage.token
                    }
                };

                await fetch(endpoins.api + endpoins.users, options)
                    .then(response => response.json())
                    .then(response => {
                        try {
                            this.users = response.data;
                            console.log(response);
                        } catch (error) {
                            drivers: []
                        }
                    })
                    .catch(err => console.error(err));
            },

            addAdmin: async function(form) {
                var object = {};
                new FormData(form).forEach(function(value, key) {
                    object[key] = value;
                });
                var json = JSON.stringify(object);

                const options = {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        /* 'User-Agent': 'insomnia/2023.5.8' */
                    },
                    body: json
                };

                fetch(endpoins.api + '/admin/register', options)
                    .then(response => response.json())
                    .then(response => {
                        location.reload()
                    })
                    .catch(err => console.error(err));
            },
        },
        mounted() {
            this.getUsers();
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