<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <title>Login</title>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img src="assets/images/logo-icon.png" width="180" alt="" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Sign in</h3>
                                    </div>
                                    <div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
                                        <hr />
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" onsubmit="event.preventDefault();login(this)">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email BI</label>
                                                <input type="text" name="bilhete_identidade" class="form-control" maxlength="14" value="005367905CA043" id="inputEmailAddress" placeholder="Email BI">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Enter
                                                    Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" value="1234" placeholder="Enter Password">
                                                    <a href="javascript:;" class="input-group-text bg-transparent">
                                                        <i class='bx bx-hide'></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end"> <a href="authentication-forgot-password.html">Forgot Password ?</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div id="sms">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script src="assets/js/consts.js"></script>
    <script>
        if (sessionStorage.online) {
            location.href = '/'
        }

        async function login(form) {

            var object = {};
            new FormData(form).forEach(function(value, key) {
                object[key] = value;
            });
            var json = JSON.stringify(object);

            const options = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'User-Agent': 'insomnia/2023.5.8'
                },
                body: json
            };

            await fetch(endpoins.api + endpoins.login, options)
                .then(response => response.json())
                .then(response => {
                    try {
                        var base64Url = response.token.split('.')[1];
                        var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
                        var jsonPayload = decodeURIComponent(window.atob(base64).split('').map(function(c) {
                            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
                        }).join(''));

                        let user = JSON.parse(jsonPayload);

                        if (user.token != "undefined") {
                            setUser(user, response.token);
                            location.reload();
                        }

                        console.log(response)
                    } catch (error) {
                        document.getElementById('sms').innerHTML = `
                            <div class="d-grid">
                                 <h2 class="btn btn-lg w-10 bg-gradient-bloody text-dark">${response.message}</h2>
                            </div>
                        `
                        console.log(response.message)
                    }


                })
                .catch(err => {
                    console.log(err.message)
                });
        }

        function setUser(user, token) {
            sessionStorage.setItem('id', user.id)
            sessionStorage.setItem('token', token)
            sessionStorage.setItem('bilhete_identidade', user.bilhete_identidade)
            sessionStorage.setItem('name', user.name)
            sessionStorage.setItem('telefone', user.telefone)
            sessionStorage.setItem('email', user.email)
            sessionStorage.setItem('nick_name', user.nick_name)
            sessionStorage.setItem('address', user.address)
            sessionStorage.setItem('role', user.role)
            sessionStorage.setItem('is_banned', user.is_banned)
            sessionStorage.setItem('created_at', user.created_at)
            sessionStorage.setItem('updated_at', user.updated_at)
            sessionStorage.setItem('is_driver', user.is_driver)
            sessionStorage.setItem('online', user.online)
        }

        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
</body>

</html>