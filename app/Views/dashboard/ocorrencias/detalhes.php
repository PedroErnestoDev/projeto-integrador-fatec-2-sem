<?php
$status = strtolower(trim($ocorrencia['status'] ?? ''));
$prioridade = strtolower(trim($ocorrencia['prioridade'] ?? ''));

$statusClass = 'status-default';

if (str_contains($status, 'abert')) {
    $statusClass = 'status-aberta';
} elseif (str_contains($status, 'andamento')) {
    $statusClass = 'status-andamento';
} elseif (str_contains($status, 'conclu')) {
    $statusClass = 'status-concluida';
}

$prioridadeClass = 'prioridade-default';

if (str_contains($prioridade, 'alta')) {
    $prioridadeClass = 'prioridade-alta';
} elseif (str_contains($prioridade, 'media') || str_contains($prioridade, 'média')) {
    $prioridadeClass = 'prioridade-media';
} elseif (str_contains($prioridade, 'baixa')) {
    $prioridadeClass = 'prioridade-baixa';
}

function formatarData($data): string
{
    if (empty($data)) {
        return '-';
    }

    return date('d/m/Y H:i', strtotime($data));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Play Park | Ocorrência #<?= (int)$ocorrencia['id_ocorrencia'] ?>
    </title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        :root {

            --sidebar-width: 260px;

            --sidebar-bg: #0f172a;

            --sidebar-hover: #1e293b;

            --primary: #4f46e5;

            --primary-light: #818cf8;

            --success: #10b981;

            --warning: #f59e0b;

            --danger: #ef4444;

            --info: #3b82f6;

            --border-color: #e2e8f0;

            --text-muted: #64748b;

            --bg-body: #f8fafc;

            --card-shadow:
                0 1px 3px rgba(0,0,0,.04),
                0 4px 12px rgba(0,0,0,.03);

        }


        * {
            font-family:
                'Inter',
                system-ui,
                -apple-system,
                sans-serif;
        }


        body {

            margin: 0;

            background:
                var(--bg-body);

            color: #1e293b;

            overflow-x: hidden;

        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            width:
                var(--sidebar-width);

            min-height:
                100vh;

            background:
                var(--sidebar-bg);

            position:
                fixed;

            top: 0;

            left: 0;

            z-index: 1040;

            display:
                flex;

            flex-direction:
                column;

            transition:
                transform .3s ease;

        }


        .sidebar-brand {

            padding:
                1.5rem 1.25rem;

            border-bottom:
                1px solid
                rgba(255,255,255,.06);

        }


        .sidebar-brand .logo-text {

            font-size:
                1.35rem;

            font-weight:
                700;

            letter-spacing:
                -.5px;

            color:
                #fff;

            line-height:
                1.2;

        }


        .sidebar-brand .logo-text span {

            background:
                linear-gradient(
                    135deg,
                    #6366f1,
                    #22d3ee
                );

            -webkit-background-clip:
                text;

            -webkit-text-fill-color:
                transparent;

            background-clip:
                text;

        }


        .sidebar-brand .logo-sub {

            font-size:
                .65rem;

            font-weight:
                500;

            letter-spacing:
                1.5px;

            color:
                #94a3b8;

            text-transform:
                uppercase;

            margin-top:
                2px;

        }


        .sidebar-nav {

            flex:
                1;

            padding:
                1rem .75rem;

            overflow-y:
                auto;

        }


        .nav-section-label {

            font-size:
                .65rem;

            font-weight:
                600;

            letter-spacing:
                1.2px;

            color:
                #64748b;

            text-transform:
                uppercase;

            padding:
                .75rem .75rem .4rem;

        }


        .sidebar .nav-link {

            display:
                flex;

            align-items:
                center;

            gap:
                .75rem;

            padding:
                .65rem .85rem;

            color:
                #94a3b8;

            border-radius:
                .5rem;

            font-size:
                .9rem;

            font-weight:
                500;

            margin-bottom:
                2px;

            transition:
                all .15s ease;

        }


        .sidebar .nav-link:hover {

            background:
                var(--sidebar-hover);

            color:
                #e2e8f0;

        }


        .sidebar .nav-link.active {

            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #6366f1
                );

            color:
                #fff;

            box-shadow:
                0 4px 12px
                rgba(79,70,229,.35);

        }


        .sidebar .nav-link i {

            font-size:
                1.15rem;

            width:
                1.35rem;

            text-align:
                center;

        }


        .sidebar-footer {

            padding:
                1rem .75rem;

            border-top:
                1px solid
                rgba(255,255,255,.06);

        }


        /* =====================================================
           MAIN
        ===================================================== */

        .main-content {

            margin-left:
                var(--sidebar-width);

            min-height:
                100vh;

        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {

            background:
                #fff;

            border-bottom:
                1px solid
                var(--border-color);

            padding:
                .85rem 1.75rem;

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            position:
                sticky;

            top:
                0;

            z-index:
                1020;

        }


        .topbar h1 {

            font-size:
                1.35rem;

            font-weight:
                700;

            margin:
                0;

            color:
                #0f172a;

        }


        .topbar .subtitle {

            font-size:
                .8rem;

            color:
                var(--text-muted);

            margin:
                0;

        }


        /* =====================================================
           USER
        ===================================================== */

        .user-dropdown {

            display:
                flex;

            align-items:
                center;

            gap:
                .6rem;

            padding:
                .35rem .6rem .35rem .35rem;

            border:
                1px solid
                var(--border-color);

            border-radius:
                .55rem;

            background:
                #fff;

        }


        .user-avatar {

            width:
                34px;

            height:
                34px;

            border-radius:
                50%;

            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #818cf8
                );

            color:
                #fff;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            font-weight:
                600;

            font-size:
                .85rem;

        }


        .user-info {

            line-height:
                1.2;

        }


        .user-info .name {

            font-size:
                .8rem;

            font-weight:
                600;

            color:
                #0f172a;

        }


        .user-info .role {

            font-size:
                .7rem;

            color:
                var(--text-muted);

        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .content-area {

            padding:
                1.5rem 1.75rem 2.5rem;

        }


        /* =====================================================
           BREADCRUMB
        ===================================================== */

        .breadcrumb {

            font-size:
                .78rem;

            margin-bottom:
                1rem;

        }


        .breadcrumb a {

            color:
                var(--primary);

            text-decoration:
                none;

        }


        /* =====================================================
           OCCURRENCE HEADER
        ===================================================== */

        .occurrence-header {

            background:
                #fff;

            border:
                1px solid
                var(--border-color);

            border-radius:
                .85rem;

            box-shadow:
                var(--card-shadow);

            padding:
                1.35rem 1.5rem;

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                1rem;

            margin-bottom:
                1rem;

        }


        .header-left {

            display:
                flex;

            align-items:
                center;

            gap:
                1rem;

        }


        .occurrence-number {

            width:
                46px;

            height:
                46px;

            border-radius:
                .65rem;

            background:
                #eef2ff;

            color:
                var(--primary);

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            font-size:
                1.2rem;

        }


        .header-title {

            margin:
                0;

            font-size:
                1.1rem;

            font-weight:
                700;

            color:
                #0f172a;

        }


        .header-subtitle {

            margin:
                .25rem 0 0;

            font-size:
                .76rem;

            color:
                var(--text-muted);

        }


        .header-status {

            display:
                flex;

            align-items:
                center;

            gap:
                .5rem;

        }


        /* =====================================================
           STATUS
        ===================================================== */

        .status {

            display:
                inline-flex;

            align-items:
                center;

            gap:
                .4rem;

            padding:
                .35rem .7rem;

            border-radius:
                999px;

            font-size:
                .72rem;

            font-weight:
                600;

        }


        .status::before {

            content:
                '';

            width:
                6px;

            height:
                6px;

            border-radius:
                50%;

        }


        .status-aberta {

            background:
                #dbeafe;

            color:
                #1d4ed8;

        }


        .status-aberta::before {
            background: #2563eb;
        }


        .status-andamento {

            background:
                #ffedd5;

            color:
                #c2410c;

        }


        .status-andamento::before {
            background: #f97316;
        }


        .status-concluida {

            background:
                #d1fae5;

            color:
                #047857;

        }


        .status-concluida::before {
            background: #10b981;
        }


        .status-default {

            background:
                #f1f5f9;

            color:
                #475569;

        }


        .status-default::before {
            background: #64748b;
        }


        /* =====================================================
           PRIORIDADE
        ===================================================== */

        .prioridade {

            display:
                inline-flex;

            padding:
                .35rem .7rem;

            border-radius:
                999px;

            font-size:
                .72rem;

            font-weight:
                600;

        }


        .prioridade-alta {

            background:
                #fee2e2;

            color:
                #b91c1c;

        }


        .prioridade-media {

            background:
                #fef3c7;

            color:
                #b45309;

        }


        .prioridade-baixa {

            background:
                #d1fae5;

            color:
                #047857;

        }


        .prioridade-default {

            background:
                #f1f5f9;

            color:
                #475569;

        }


        /* =====================================================
           INFORMATION STRIP
        ===================================================== */

        .info-strip {

            background:
                #fff;

            border:
                1px solid
                var(--border-color);

            border-radius:
                .85rem;

            box-shadow:
                var(--card-shadow);

            display:
                grid;

            grid-template-columns:
                repeat(4, 1fr);

            margin-bottom:
                1rem;

            overflow:
                hidden;

        }


        .info-box {

            padding:
                1rem 1.15rem;

            border-right:
                1px solid
                var(--border-color);

        }


        .info-box:last-child {
            border-right: none;
        }


        .info-label {

            font-size:
                .67rem;

            font-weight:
                600;

            color:
                var(--text-muted);

            text-transform:
                uppercase;

            letter-spacing:
                .5px;

            margin-bottom:
                .3rem;

        }


        .info-value {

            font-size:
                .85rem;

            font-weight:
                600;

            color:
                #334155;

        }


        .info-value i {

            color:
                #94a3b8;

            margin-right:
                .3rem;

        }


        /* =====================================================
           CONTENT PANELS
        ===================================================== */

        .panel {

            background:
                #fff;

            border:
                1px solid
                var(--border-color);

            border-radius:
                .85rem;

            box-shadow:
                var(--card-shadow);

            margin-bottom:
                1rem;

            overflow:
                hidden;

        }


        .panel-header {

            padding:
                .9rem 1.25rem;

            border-bottom:
                1px solid
                var(--border-color);

            display:
                flex;

            align-items:
                center;

            gap:
                .55rem;

        }


        .panel-header i {

            color:
                var(--primary);

        }


        .panel-header h5 {

            margin:
                0;

            font-size:
                .85rem;

            font-weight:
                600;

            color:
                #0f172a;

        }


        .panel-body {

            padding:
                1.25rem;

        }


        .text-content {

            color:
                #475569;

            font-size:
                .86rem;

            line-height:
                1.7;
        }


        .empty-content {

            color:
                #94a3b8;

            font-size:
                .82rem;

            font-style:
                italic;

        }


        /* =====================================================
           RIGHT SIDE
        ===================================================== */

        .side-panel {

            background:
                #fff;

            border:
                1px solid
                var(--border-color);

            border-radius:
                .85rem;

            box-shadow:
                var(--card-shadow);

            overflow:
                hidden;

        }


        .side-header {

            padding:
                .9rem 1.15rem;

            border-bottom:
                1px solid
                var(--border-color);

            font-size:
                .85rem;

            font-weight:
                600;

            color:
                #0f172a;

        }


        .side-body {

            padding:
                1rem 1.15rem;

        }


        .detail-row {

            display:
                flex;

            justify-content:
                space-between;

            align-items:
                flex-start;

            gap:
                1rem;

            padding:
                .75rem 0;

            border-bottom:
                1px solid
                #f1f5f9;

        }


        .detail-row:last-child {
            border-bottom: none;
        }


        .detail-row .label {

            font-size:
                .72rem;

            color:
                var(--text-muted);

        }


        .detail-row .value {

            text-align:
                right;

            font-size:
                .78rem;

            font-weight:
                600;

            color:
                #334155;

        }


        /* =====================================================
           ACTION BAR
        ===================================================== */

        .action-bar {

            background:
                #fff;

            border:
                1px solid
                var(--border-color);

            border-radius:
                .85rem;

            box-shadow:
                var(--card-shadow);

            padding:
                .9rem 1rem;

            display:
                flex;

            justify-content:
                space-between;

            align-items:
                center;

            gap:
                1rem;

        }


        .action-description {

            font-size:
                .75rem;

            color:
                var(--text-muted);

        }


        .action-buttons {

            display:
                flex;

            gap:
                .45rem;

            flex-wrap:
                wrap;

        }


        .action-buttons .btn {

            font-size:
                .76rem;

            font-weight:
                500;

        }


        /* =====================================================
           MOBILE
        ===================================================== */

        .sidebar-toggle {

            display:
                none;

            background:
                none;

            border:
                none;

            font-size:
                1.4rem;

            color:
                #334155;

            padding:
                .25rem;

        }


        .sidebar-overlay {

            display:
                none;

        }


        @media(max-width: 991.98px) {

            .sidebar {

                transform:
                    translateX(-100%);

            }


            .sidebar.show {

                transform:
                    translateX(0);

            }


            .main-content {

                margin-left:
                    0;

            }


            .sidebar-toggle {

                display:
                    block;

            }


            .sidebar-overlay {

                position:
                    fixed;

                inset:
                    0;

                background:
                    rgba(15,23,42,.5);

                z-index:
                    1035;

            }


            .sidebar-overlay.show {

                display:
                    block;

            }


            .info-strip {

                grid-template-columns:
                    repeat(2, 1fr);

            }


            .info-box:nth-child(2) {

                border-right:
                    none;

            }


            .info-box:nth-child(-n+2) {

                border-bottom:
                    1px solid
                    var(--border-color);

            }


            .occurrence-header {

                align-items:
                    flex-start;

                flex-direction:
                    column;

            }


            .action-bar {

                align-items:
                    flex-start;

                flex-direction:
                    column;

            }

        }


        @media(max-width: 575.98px) {

            .content-area {

                padding:
                    1rem;

            }


            .topbar {

                padding:
                    .8rem 1rem;

            }


            .info-strip {

                grid-template-columns:
                    1fr;

            }


            .info-box {

                border-right:
                    none !important;

                border-bottom:
                    1px solid
                    var(--border-color);

            }


            .info-box:last-child {

                border-bottom:
                    none;

            }


            .header-left {

                align-items:
                    flex-start;

            }


            .header-status {

                width:
                    100%;

            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     MOBILE OVERLAY
========================================================= -->

<div
    class="sidebar-overlay"
    id="sidebarOverlay"
    onclick="toggleSidebar()"
></div>


<!-- =========================================================
     SIDEBAR
========================================================= -->

<aside
    class="sidebar"
    id="sidebar"
>

    <div class="sidebar-brand">

        <div class="logo-text">

            PLAY <span>PARK</span>

        </div>

        <div class="logo-sub">

            Excelência Operacional

        </div>

    </div>


    <nav class="sidebar-nav">

        <div class="nav-section-label">
            Principal
        </div>


        <a
            href="/dashboard"
            class="nav-link"
        >

            <i class="bi bi-house-door-fill"></i>

            <span>
                Dashboard
            </span>

        </a>


        <a
            href="/dashboard/ocorrencias"
            class="nav-link active"
        >

            <i class="bi bi-file-earmark-text"></i>

            <span>
                Ocorrências
            </span>

        </a>


        <a
            href="/dashboard/ocorrencias/criar"
            class="nav-link"
        >

            <i class="bi bi-plus-square"></i>

            <span>
                Nova Ocorrência
            </span>

        </a>


        <div class="nav-section-label mt-3">
            Cadastros
        </div>


        <a
            href="#"
            class="nav-link"
        >

            <i class="bi bi-controller"></i>

            <span>
                Brinquedos
            </span>

        </a>


        <a
            href="#"
            class="nav-link"
        >

            <i class="bi bi-person-badge"></i>

            <span>
                Colaboradores
            </span>

        </a>


        <a
            href="#"
            class="nav-link"
        >

            <i class="bi bi-building"></i>

            <span>
                Setores
            </span>

        </a>


        <a
            href="#"
            class="nav-link"
        >

            <i class="bi bi-people"></i>

            <span>
                Usuários
            </span>

        </a>


        <div class="nav-section-label mt-3">
            Sistema
        </div>


        <a
            href="#"
            class="nav-link"
        >

            <i class="bi bi-bar-chart-line"></i>

            <span>
                Relatórios
            </span>

        </a>


        <a
            href="#"
            class="nav-link"
        >

            <i class="bi bi-gear"></i>

            <span>
                Configurações
            </span>

        </a>

    </nav>


    <div class="sidebar-footer">

        <a
            href="#"
            class="nav-link text-danger"
        >

            <i class="bi bi-box-arrow-right"></i>

            <span>
                Sair
            </span>

        </a>

    </div>

</aside>


<!-- =========================================================
     MAIN
========================================================= -->

<div class="main-content">


    <!-- TOPBAR -->

    <header class="topbar">

        <div class="d-flex align-items-center gap-3">

            <button
                class="sidebar-toggle"
                onclick="toggleSidebar()"
            >

                <i class="bi bi-list"></i>

            </button>


            <div>

                <h1>
                    Detalhes da Ocorrência
                </h1>

                <p class="subtitle">
                    Visualização e gerenciamento da ocorrência
                </p>

            </div>

        </div>


        <div class="d-flex align-items-center gap-2">

            <button
                class="btn btn-light border"
                style="width:40px;height:40px;"
            >

                <i class="bi bi-bell"></i>

            </button>


            <div class="user-dropdown">

                <div class="user-avatar">
                    AG
                </div>

                <div class="user-info d-none d-sm-block">

                    <div class="name">
                        Administrador
                    </div>

                    <div class="role">
                        Gerência
                    </div>

                </div>

                <i
                    class="bi bi-chevron-down text-muted"
                    style="font-size:.7rem;"
                ></i>

            </div>

        </div>

    </header>


    <!-- CONTENT -->

    <div class="content-area">


        <!-- BREADCRUMB -->

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

                <li class="breadcrumb-item">

                    <a href="/dashboard">
                        Dashboard
                    </a>

                </li>

                <li class="breadcrumb-item">

                    <a href="/dashboard/ocorrencias">
                        Ocorrências
                    </a>

                </li>

                <li
                    class="breadcrumb-item active"
                >

                    #<?= (int)$ocorrencia['id_ocorrencia'] ?>

                </li>

            </ol>

        </nav>


        <!-- =================================================
             HEADER DA OCORRÊNCIA
        ================================================= -->

        <section class="occurrence-header">

            <div class="header-left">

                <div class="occurrence-number">

                    <i class="bi bi-file-earmark-text"></i>

                </div>


                <div>

                    <h2 class="header-title">

                        Ocorrência
                        #<?= (int)$ocorrencia['id_ocorrencia'] ?>

                    </h2>


                    <p class="header-subtitle">

                        Ordem de produção:

                        <strong>

                            <?= htmlspecialchars(
                                $ocorrencia['ordem_producao']
                                ?? '-'
                            ) ?>

                        </strong>

                    </p>

                </div>

            </div>


            <div class="header-status">

                <span
                    class="prioridade <?= $prioridadeClass ?>"
                >

                    <?= htmlspecialchars(
                        $ocorrencia['prioridade']
                        ?? '-'
                    ) ?>

                </span>


                <span
                    class="status <?= $statusClass ?>"
                >

                    <?= htmlspecialchars(
                        $ocorrencia['status']
                        ?? '-'
                    ) ?>

                </span>

            </div>

        </section>


        <!-- =================================================
             RESUMO
        ================================================= -->

        <section class="info-strip">


            <div class="info-box">

                <div class="info-label">
                    Brinquedo
                </div>

                <div class="info-value">

                    <i class="bi bi-controller"></i>

                    <?= htmlspecialchars(
                        $ocorrencia['brinquedo']
                        ?? '-'
                    ) ?>

                </div>

            </div>


            <div class="info-box">

                <div class="info-label">
                    Colaborador
                </div>

                <div class="info-value">

                    <i class="bi bi-person"></i>

                    <?= htmlspecialchars(
                        $ocorrencia['colaborador']
                        ?? '-'
                    ) ?>

                </div>

            </div>


            <div class="info-box">

                <div class="info-label">
                    Usuário
                </div>

                <div class="info-value">

                    <i class="bi bi-person-badge"></i>

                    <?= htmlspecialchars(
                        $ocorrencia['usuario']
                        ?? '-'
                    ) ?>

                </div>

            </div>


            <div class="info-box">

                <div class="info-label">
                    Data de abertura
                </div>

                <div class="info-value">

                    <i class="bi bi-calendar3"></i>

                    <?= formatarData(
                        $ocorrencia['data_abertura']
                        ?? null
                    ) ?>

                </div>

            </div>


        </section>


        <!-- =================================================
             CONTEÚDO
        ================================================= -->

        <div class="row g-3">


            <!-- ==============================
                 COLUNA PRINCIPAL
            =============================== -->

            <div class="col-lg-8">


                <!-- DESCRIÇÃO -->

                <section class="panel">

                    <div class="panel-header">

                        <i class="bi bi-chat-left-text"></i>

                        <h5>
                            Descrição da ocorrência
                        </h5>

                    </div>


                    <div class="panel-body">

                        <?php if (
                            !empty(
                                $ocorrencia[
                                    'descricao_ocorrencia'
                                ]
                            )
                        ): ?>

                            <div class="text-content">

                                <?= nl2br(
                                    htmlspecialchars(
                                        $ocorrencia[
                                            'descricao_ocorrencia'
                                        ]
                                    )
                                ) ?>

                            </div>

                        <?php else: ?>

                            <div class="empty-content">

                                Nenhuma descrição registrada.

                            </div>

                        <?php endif; ?>

                    </div>

                </section>


                <!-- SOLUÇÃO -->

                <section class="panel">

                    <div class="panel-header">

                        <i class="bi bi-check2-circle"></i>

                        <h5>
                            Solução da ocorrência
                        </h5>

                    </div>


                    <div class="panel-body">

                        <?php if (
                            !empty(
                                $ocorrencia[
                                    'solucao_ocorrencia'
                                ]
                            )
                        ): ?>

                            <div class="text-content">

                                <?= nl2br(
                                    htmlspecialchars(
                                        $ocorrencia[
                                            'solucao_ocorrencia'
                                        ]
                                    )
                                ) ?>

                            </div>

                        <?php else: ?>

                            <div class="empty-content">

                                Nenhuma solução registrada até o momento.

                            </div>

                        <?php endif; ?>

                    </div>

                </section>


            </div>


            <!-- ==============================
                 COLUNA LATERAL
            =============================== -->

            <div class="col-lg-4">


                <section class="side-panel">

                    <div class="side-header">

                        Informações da ocorrência

                    </div>


                    <div class="side-body">


                        <div class="detail-row">

                            <span class="label">
                                ID
                            </span>

                            <span class="value">

                                #<?= (int)
                                    $ocorrencia[
                                        'id_ocorrencia'
                                    ] ?>

                            </span>

                        </div>


                        <div class="detail-row">

                            <span class="label">
                                Ordem de produção
                            </span>

                            <span class="value">

                                <?= htmlspecialchars(
                                    $ocorrencia[
                                        'ordem_producao'
                                    ] ?? '-'
                                ) ?>

                            </span>

                        </div>


                        <div class="detail-row">

                            <span class="label">
                                Brinquedo
                            </span>

                            <span class="value">

                                <?= htmlspecialchars(
                                    $ocorrencia[
                                        'brinquedo'
                                    ] ?? '-'
                                ) ?>

                            </span>

                        </div>


                        <div class="detail-row">

                            <span class="label">
                                Colaborador
                            </span>

                            <span class="value">

                                <?= htmlspecialchars(
                                    $ocorrencia[
                                        'colaborador'
                                    ] ?? '-'
                                ) ?>

                            </span>

                        </div>


                        <div class="detail-row">

                            <span class="label">
                                Prioridade
                            </span>

                            <span class="value">

                                <?= htmlspecialchars(
                                    $ocorrencia[
                                        'prioridade'
                                    ] ?? '-'
                                ) ?>

                            </span>

                        </div>


                        <div class="detail-row">

                            <span class="label">
                                Status
                            </span>

                            <span class="value">

                                <?= htmlspecialchars(
                                    $ocorrencia[
                                        'status'
                                    ] ?? '-'
                                ) ?>

                            </span>

                        </div>


                        <div class="detail-row">

                            <span class="label">
                                Criado por
                            </span>

                            <span class="value">

                                <?= htmlspecialchars(
                                    $ocorrencia[
                                        'usuario'
                                    ] ?? '-'
                                ) ?>

                            </span>

                        </div>


                        <div class="detail-row">

                            <span class="label">
                                Criado em
                            </span>

                            <span class="value">

                                <?= formatarData(
                                    $ocorrencia[
                                        'criado_em'
                                    ] ?? null
                                ) ?>

                            </span>

                        </div>


                        <div class="detail-row">

                            <span class="label">
                                Atualizado em
                            </span>

                            <span class="value">

                                <?= formatarData(
                                    $ocorrencia[
                                        'atualizado_em'
                                    ] ?? null
                                ) ?>

                            </span>

                        </div>


                        <div class="detail-row">

                            <span class="label">
                                Conclusão
                            </span>

                            <span class="value">

                                <?= formatarData(
                                    $ocorrencia[
                                        'data_conclusao'
                                    ] ?? null
                                ) ?>

                            </span>

                        </div>


                    </div>

                </section>


            </div>

        </div>


        <!-- =================================================
             AÇÕES
        ================================================= -->

        <section class="action-bar mt-3">

            <div class="action-description">

                <i class="bi bi-info-circle me-1"></i>

                Gerencie as ações desta ocorrência.

            </div>


            <div class="action-buttons">


                <!-- VOLTAR -->

                <a
                    href="/dashboard/ocorrencias"
                    class="btn btn-outline-secondary"
                >

                    <i class="bi bi-arrow-left me-1"></i>

                    Voltar

                </a>


                <!-- ATUALIZAR -->

                <a
                    href="/dashboard/ocorrencias/editar/<?= (int)$ocorrencia['id_ocorrencia'] ?>"
                    class="btn btn-primary"
                >

                    <i class="bi bi-pencil me-1"></i>

                    Editar

                </a>


                <!-- ENCAMINHAR -->

                <button
                    type="button"
                    class="btn btn-warning"
                    data-bs-toggle="modal"
                    data-bs-target="#encaminharModal"
                >

                    <i class="bi bi-arrow-right me-1"></i>

                    Encaminhar

                </button>


                <!-- DELETAR -->

                <form
                    method="POST"
                    action="/dashboard/ocorrencias/excluir/<?= htmlspecialchars($ocorrencia['id_ocorrencia']) ?>"
                    class="d-inline"
                    onsubmit="
                        return confirm(
                            'Deseja realmente excluir esta ocorrência?'
                        );
                    "
                >

                    <input
                        type="hidden"
                        name="id_ocorrencia"
                        value="<?= (int)$ocorrencia[
                            'id_ocorrencia'
                        ] ?>"
                    >

                    <button
                        type="button"
                        class="btn btn-danger"
                        onclick="excluirOcorrencia(<?= (int)$ocorrencia['id_ocorrencia'] ?>)"
                    >
                        <i class="bi bi-trash"></i>
                        Excluir
                    </button>

                </form>


            </div>

        </section>


    </div>

</div>


<!-- =========================================================
     MODAL ENCAMINHAR
========================================================= -->

<div
    class="modal fade"
    id="encaminharModal"
    tabindex="-1"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 shadow">

            <div class="modal-header">

                <h5
                    class="modal-title"
                    style="
                        font-size:.95rem;
                        font-weight:600;
                    "
                >

                    <i
                        class="bi bi-arrow-right-circle me-2"
                        style="color:#4f46e5;"
                    ></i>

                    Encaminhar ocorrência

                </h5>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                ></button>

            </div>


            <form
                method="POST"
                action="/dashboard/ocorrencias/encaminhar"
            >

                <div class="modal-body">


                    <input
                        type="hidden"
                        name="id_ocorrencia"
                        value="<?= (int)$ocorrencia[
                            'id_ocorrencia'
                        ] ?>"
                    >


                    <div class="mb-3">

                        <label
                            class="form-label"
                            style="
                                font-size:.78rem;
                                font-weight:600;
                            "
                        >
                            Setor de destino
                        </label>


                        <select
                            name="fk_setor"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Selecione o setor
                            </option>

                            <!--
                                Substitua pelos setores
                                vindos do banco.
                            -->

                            <?php if (!empty($setores)): ?>

                                <?php foreach (
                                    $setores as $setor
                                ): ?>

                                    <option
                                        value="<?= (int)
                                            $setor[
                                                'id_setor'
                                            ] ?>"
                                    >

                                        <?= htmlspecialchars(
                                            $setor[
                                                'nome_setor'
                                            ]
                                        ) ?>

                                    </option>

                                <?php endforeach; ?>

                            <?php endif; ?>

                        </select>

                    </div>


                    <div>

                        <label
                            class="form-label"
                            style="
                                font-size:.78rem;
                                font-weight:600;
                            "
                        >

                            Observação

                        </label>


                        <textarea
                            name="observacao"
                            class="form-control"
                            rows="4"
                            placeholder="Descreva o motivo do encaminhamento..."
                        ></textarea>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-light"
                        data-bs-dismiss="modal"
                    >

                        Cancelar

                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="bi bi-send me-1"></i>

                        Encaminhar

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<!-- =========================================================
     BOOTSTRAP
========================================================= -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>
<script>
function excluirOcorrencia(id) {

    if (!confirm('Tem certeza que deseja excluir esta ocorrência?')) {
        return;
    }

    fetch(`/dashboard/ocorrencias/excluir/${id}`, {
        method: 'DELETE'
    })
    .then(response => {

        if (response.redirected) {
            window.location.href = '/dashboard/ocorrencias';
            return;
        }

        if (!response.ok) {
            throw new Error('Erro ao excluir ocorrência.');
        }
    })
    .catch(error => {
        console.error(error);
        alert('Erro ao excluir a ocorrência.');
    });
}
</script>

<script>

function toggleSidebar()
{
    const sidebar =
        document.getElementById('sidebar');

    const overlay =
        document.getElementById('sidebarOverlay');

    sidebar.classList.toggle('show');

    overlay.classList.toggle('show');
}

</script>


</body>

</html>