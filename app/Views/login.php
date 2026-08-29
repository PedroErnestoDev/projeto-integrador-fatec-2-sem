<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - PlayPark</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-12 col-sm-8 col-md-5 col-lg-4">

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">

                        <h1 class="text-center mb-4">
                            PlayPark
                        </h1>

                        <form action="/login" method="POST">

                            <div class="mb-3">
                                <label for="login" class="form-label">
                                    Login
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="login"
                                    name="login_usuario"
                                    placeholder="Digite seu login"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="senha" class="form-label">
                                    Senha
                                </label>

                                <input
                                    type="password"
                                    class="form-control"
                                    id="senha"
                                    name="senha_usuario"
                                    placeholder="Digite sua senha"
                                    required
                                >
                            </div>

                            <div class="d-grid">
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    Entrar
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>