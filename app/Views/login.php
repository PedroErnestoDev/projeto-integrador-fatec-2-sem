<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$erroLogin = $_SESSION['erro_login'] ?? null;
unset($_SESSION['erro_login']);

?>
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

    <style>
        :root {
            --playpark-pink: #ff0066;
            --playpark-blue: #0787ff;
            --playpark-yellow: #ffd000;
            --dark: #0f172a;
            --text: #172033;
            --muted: #718096;
            --border: #e4e8ef;
            --background: #f5f7fb;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--background);
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: var(--text);
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: stretch;
            padding: 24px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1180px;
            min-height: calc(100vh - 48px);
            margin: auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #fff;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 24px 70px rgba(15, 23, 42, 0.12);
        }

        /* Lado da marca */
        .brand-panel {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px;
            background: var(--dark);
            overflow: hidden;
        }

        .brand-panel::before {
            content: "";
            position: absolute;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: rgba(7, 135, 255, 0.10);
            top: -180px;
            left: -150px;
        }

        .brand-panel::after {
            content: "";
            position: absolute;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            background: rgba(255, 0, 102, 0.08);
            bottom: -190px;
            right: -150px;
        }

        .brand-content {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 430px;
            text-align: center;
        }

        .brand-logo {
            width: min(100%, 390px);
            height: auto;
            display: block;
            margin: 0 auto 38px;
        }

        .brand-title {
            margin: 0 0 12px;
            color: #fff;
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: -0.6px;
        }

        .brand-description {
            margin: 0;
            color: #aab4c5;
            font-size: 0.98rem;
            line-height: 1.7;
        }

        .brand-line {
            width: 54px;
            height: 4px;
            margin: 28px auto 0;
            border-radius: 20px;
            background: linear-gradient(90deg, var(--playpark-pink), var(--playpark-blue), var(--playpark-yellow));
        }

        /* Lado do formulário */
        .form-panel {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px clamp(32px, 7vw, 90px);
            background: #fff;
        }

        .login-content {
            width: 100%;
            max-width: 420px;
        }

        .system-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 18px;
            color: var(--playpark-blue);
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .system-label::before {
            content: "";
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--playpark-blue);
            box-shadow: 0 0 0 5px rgba(7, 135, 255, 0.10);
        }

        .login-title {
            margin: 0;
            color: var(--dark);
            font-size: clamp(2rem, 3vw, 2.65rem);
            font-weight: 750;
            letter-spacing: -1.2px;
        }

        .login-subtitle {
            margin: 10px 0 34px;
            color: var(--muted);
            font-size: 0.98rem;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            margin-bottom: 8px;
            color: #303b4d;
            font-size: 0.86rem;
            font-weight: 650;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 16px;
            width: 18px;
            height: 18px;
            transform: translateY(-50%);
            color: #8994a6;
            pointer-events: none;
        }

        .form-control {
            min-height: 54px;
            padding: 12px 16px 12px 48px;
            border: 1px solid var(--border);
            border-radius: 13px;
            color: var(--text);
            background: #fbfcfe;
            font-size: 0.95rem;
            box-shadow: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--playpark-blue);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(7, 135, 255, 0.10);
        }

        .form-control::placeholder {
            color: #a0a9b7;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 14px;
            transform: translateY(-50%);
            border: 0;
            padding: 5px;
            color: #8994a6;
            background: transparent;
            cursor: pointer;
        }

        .password-toggle:hover {
            color: var(--playpark-blue);
        }

        .password-input {
            padding-right: 48px;
        }

        .btn-login {
            width: 100%;
            min-height: 54px;
            margin-top: 10px;
            border: 0;
            border-radius: 13px;
            color: #fff;
            background: linear-gradient(135deg, var(--playpark-blue), #0569d8);
            font-size: 0.98rem;
            font-weight: 700;
            box-shadow: 0 10px 24px rgba(7, 135, 255, 0.20);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-login:hover {
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 13px 28px rgba(7, 135, 255, 0.27);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .login-footer {
            margin-top: 42px;
            padding-top: 20px;
            border-top: 1px solid #edf0f4;
            color: #9aa3b1;
            font-size: 0.76rem;
            line-height: 1.6;
            text-align: center;
        }

        .alert {
            border: 0;
            border-radius: 12px;
            margin-bottom: 18px;
            font-size: 0.88rem;
        }

        @media (max-width: 850px) {
            .login-page {
                padding: 0;
            }

            .login-wrapper {
                min-height: 100vh;
                border-radius: 0;
                grid-template-columns: 1fr;
            }

            .brand-panel {
                min-height: 280px;
                padding: 42px 30px;
            }

            .brand-logo {
                width: min(310px, 80%);
                margin-bottom: 20px;
            }

            .brand-title,
            .brand-description,
            .brand-line {
                display: none;
            }

            .form-panel {
                padding: 44px 28px 50px;
            }
        }

        @media (max-width: 480px) {
            .brand-panel {
                min-height: 220px;
            }

            .form-panel {
                padding: 34px 22px 42px;
            }

            .login-title {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>

<div class="login-page">
    <main class="login-wrapper">

        <section class="brand-panel">
            <div class="brand-content">
                <img
                    src="/assets/logo-play-park.png"
                    alt="PlayPark"
                    class="brand-logo"
                >

                <h2 class="brand-title">Sistema de Gestão de Ocorrências</h2>
                <p class="brand-description">
                    Organização, acompanhamento e controle das ocorrências da PlayPark em um só lugar.
                </p>
                <div class="brand-line"></div>
            </div>
        </section>

        <section class="form-panel">
            <div class="login-content">

                <div class="system-label">Acesso ao sistema</div>

                <h1 class="login-title">Bem-vindo(a)!</h1>
                <p class="login-subtitle">
                    Entre com suas credenciais para acessar o sistema PlayPark.
                </p>

                <div id="alert-container">
                    <?php if ($erroLogin): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= htmlspecialchars($erroLogin, ENT_QUOTES, 'UTF-8') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <form action="/login" method="POST">

                    <div class="form-group">
                        <label for="login" class="form-label">Login</label>

                        <div class="input-wrapper">
                            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path d="M20 21a8 8 0 0 0-16 0"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>

                            <input
                                type="text"
                                class="form-control"
                                id="login"
                                name="login_usuario"
                                placeholder="Digite seu login"
                                autocomplete="username"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="senha" class="form-label">Senha</label>

                        <div class="input-wrapper">
                            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <rect x="4" y="10" width="16" height="11" rx="2"/>
                                <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                            </svg>

                            <input
                                type="password"
                                class="form-control password-input"
                                id="senha"
                                name="senha_usuario"
                                placeholder="Digite sua senha"
                                autocomplete="current-password"
                                required
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                id="toggle-password"
                                aria-label="Mostrar senha"
                            >
                                <svg id="eye-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"/>
                                    <circle cx="12" cy="12" r="2.5"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-login">
                        Entrar
                    </button>

                </form>

                <div class="login-footer">
                    PlayPark • Sistema de Gestão de Ocorrências<br>
                    Acesso destinado aos usuários autorizados.
                </div>

            </div>
        </section>

    </main>
</div>

<script>
    const senha = document.getElementById('senha');
    const togglePassword = document.getElementById('toggle-password');
    const eyeIcon = document.getElementById('eye-icon');

    togglePassword.addEventListener('click', function () {
        const mostrar = senha.type === 'password';
        senha.type = mostrar ? 'text' : 'password';
        togglePassword.setAttribute(
            'aria-label',
            mostrar ? 'Ocultar senha' : 'Mostrar senha'
        );

        eyeIcon.innerHTML = mostrar
            ? '<path d="M3 3l18 18"/><path d="M10.6 10.6a2.5 2.5 0 0 0 3.5 3.5"/><path d="M9.9 5.2A11.8 11.8 0 0 1 12 5c6.5 0 10 7 10 7a18.2 18.2 0 0 1-3.2 3.9"/><path d="M6.2 6.2C3.6 8.1 2 12 2 12s3.5 7 10 7a10.8 10.8 0 0 0 4-.8"/>'
            : '<path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"/><circle cx="12" cy="12" r="2.5"/>';
    });
</script>

</body>
</html>
