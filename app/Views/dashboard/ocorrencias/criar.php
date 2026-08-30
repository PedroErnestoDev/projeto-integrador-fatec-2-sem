<?php
// A view espera receber:
// $colaboradores
// $brinquedos
// $prioridades
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Play Park | Nova Ocorrência</title>

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

    <!-- Tom Select -->
    <link
        href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.bootstrap5.min.css"
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

            --primary-hover: #4338ca;

            --primary-light: #eef2ff;

            --success: #10b981;

            --warning: #f59e0b;

            --danger: #ef4444;

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
           FORM CARD
        ===================================================== */

        .form-card {

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
                1.5rem;

        }


        .form-header {

            display:
                flex;

            align-items:
                flex-start;

            gap:
                1rem;

            padding-bottom:
                1.25rem;

            border-bottom:
                1px solid
                var(--border-color);

            margin-bottom:
                1.5rem;

        }


        .form-icon {

            width:
                46px;

            height:
                46px;

            border-radius:
                .65rem;

            background:
                var(--primary-light);

            color:
                var(--primary);

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            font-size:
                1.25rem;

            flex-shrink:
                0;

        }


        .form-title {

            margin:
                0;

            font-size:
                1.1rem;

            font-weight:
                700;

            color:
                #0f172a;

        }


        .form-subtitle {

            margin:
                .25rem 0 0;

            font-size:
                .78rem;

            color:
                var(--text-muted);

        }


        /* =====================================================
           SECTIONS
        ===================================================== */

        .form-section {

            margin-bottom:
                1.75rem;

        }


        .section-header {

            display:
                flex;

            align-items:
                center;

            gap:
                .65rem;

            margin-bottom:
                1rem;

        }


        .section-number {

            width:
                27px;

            height:
                27px;

            border-radius:
                50%;

            background:
                var(--primary);

            color:
                #fff;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            font-size:
                .72rem;

            font-weight:
                700;

        }


        .section-title {

            margin:
                0;

            font-size:
                .9rem;

            font-weight:
                600;

            color:
                #0f172a;

        }


        /* =====================================================
           FORM
        ===================================================== */

        .form-label {

            font-size:
                .78rem;

            font-weight:
                600;

            color:
                #334155;

            margin-bottom:
                .4rem;

        }


        .required {

            color:
                var(--danger);

        }


        .form-control,
        .form-select {

            border:
                1px solid
                var(--border-color);

            border-radius:
                .55rem;

            min-height:
                42px;

            font-size:
                .8rem;

            box-shadow:
                none;

        }


        .form-control:focus,
        .form-select:focus {

            border-color:
                var(--primary);

            box-shadow:
                0 0 0 3px
                rgba(79,70,229,.1);

        }


        textarea.form-control {

            min-height:
                120px;

            resize:
                vertical;

        }


        .form-text {

            font-size:
                .68rem;

            color:
                var(--text-muted);

            margin-top:
                .3rem;

        }


        /* =====================================================
           PRIORIDADE
        ===================================================== */

        .priority-group {

            display:
                flex;

            gap:
                .6rem;

            flex-wrap:
                wrap;

        }


        .priority-btn {

            border:
                1.5px solid;

            border-radius:
                .55rem;

            padding:
                .55rem 1rem;

            font-size:
                .78rem;

            font-weight:
                600;

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            gap:
                .4rem;

            cursor:
                pointer;

            transition:
                all .15s ease;

            background:
                #fff;

        }


        .priority-btn.alta {

            background:
                #fee2e2;

            border-color:
                #fecaca;

            color:
                #dc2626;

        }


        .priority-btn.alta:hover,
        .priority-btn.alta.active {

            background:
                #fecaca;

            border-color:
                #f87171;

            color:
                #b91c1c;

        }


        .priority-btn.media {

            background:
                #fef3c7;

            border-color:
                #fde68a;

            color:
                #d97706;

        }


        .priority-btn.media:hover,
        .priority-btn.media.active {

            background:
                #fde68a;

            border-color:
                #fbbf24;

            color:
                #b45309;

        }


        .priority-btn.baixa {

            background:
                #d1fae5;

            border-color:
                #a7f3d0;

            color:
                #059669;

        }


        .priority-btn.baixa:hover,
        .priority-btn.baixa.active {

            background:
                #a7f3d0;

            border-color:
                #34d399;

            color:
                #047857;

        }


        /* =====================================================
           ACTIONS
        ===================================================== */

        .form-actions {

            display:
                flex;

            justify-content:
                flex-end;

            gap:
                .6rem;

            padding-top:
                1.25rem;

            border-top:
                1px solid
                var(--border-color);

        }


        .btn-action {

            border-radius:
                .55rem;

            padding:
                .55rem 1rem;

            font-size:
                .78rem;

            font-weight:
                600;

        }


        .btn-submit {

            background:
                var(--primary);

            border:
                1px solid
                var(--primary);

            color:
                #fff;

        }


        .btn-submit:hover {

            background:
                var(--primary-hover);

            border-color:
                var(--primary-hover);

            color:
                #fff;

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


            .form-card {

                padding:
                    1rem;

            }


            .form-actions {

                flex-direction:
                    column;

            }


            .form-actions .btn {

                width:
                    100%;

            }


            .user-dropdown {

                padding:
                    .35rem;

            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     OVERLAY MOBILE
===================================================== -->

<div
    class="sidebar-overlay"
    id="sidebarOverlay"
    onclick="toggleSidebar()"
></div>


<!-- =====================================================
     SIDEBAR
===================================================== -->

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
            class="nav-link"
        >

            <i class="bi bi-file-earmark-text"></i>

            <span>
                Ocorrências
            </span>

        </a>


        <a
            href="/dashboard/ocorrencias/criar"
            class="nav-link active"
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


<!-- =====================================================
     MAIN
===================================================== -->

<div class="main-content">


    <!-- =================================================
         TOPBAR
    ================================================= -->

    <header class="topbar">

        <div class="d-flex align-items-center gap-3">

            <button
                type="button"
                class="sidebar-toggle"
                onclick="toggleSidebar()"
            >

                <i class="bi bi-list"></i>

            </button>


            <div>

                <h1>
                    Nova Ocorrência
                </h1>

                <p class="subtitle">
                    Registro de uma nova ocorrência operacional
                </p>

            </div>

        </div>


        <div class="d-flex align-items-center gap-2">

            <button
                type="button"
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


    <!-- =================================================
         CONTENT
    ================================================= -->

    <main class="content-area">


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


                <li class="breadcrumb-item active">

                    Nova Ocorrência

                </li>

            </ol>

        </nav>


        <!-- =================================================
             FORM CARD
        ================================================= -->

        <section class="form-card">


            <!-- HEADER -->

            <div class="form-header">

                <div class="form-icon">

                    <i class="bi bi-file-earmark-plus"></i>

                </div>


                <div>

                    <h2 class="form-title">

                        Registrar nova ocorrência

                    </h2>


                    <p class="form-subtitle">

                        Preencha as informações abaixo para registrar
                        o problema encontrado.

                    </p>

                </div>

            </div>


            <!-- =================================================
                 FORM
            ================================================= -->

            <form
                id="formOcorrencia"
                action="/ocorrencias/criar"
                method="POST"
            >


                <!-- =================================================
                     1 - INFORMAÇÕES BÁSICAS
                ================================================= -->

                <div class="form-section">

                    <div class="section-header">

                        <span class="section-number">
                            1
                        </span>

                        <h3 class="section-title">
                            Informações básicas
                        </h3>

                    </div>


                    <div class="row g-3">


                        <!-- COLABORADOR -->

                        <div class="col-md-6">

                            <label
                                for="colaborador"
                                class="form-label"
                            >

                                Colaborador

                                <span class="required">
                                    *
                                </span>

                            </label>


                            <select
                                id="colaborador"
                                name="colaborador"
                                required
                            >

                                <option value="">
                                    Selecione um colaborador...
                                </option>

                            </select>


                            <div class="form-text">

                                Digite o nome para pesquisar.

                            </div>

                        </div>


                        <!-- BRINQUEDO -->

                        <div class="col-md-6">

                            <label
                                for="brinquedo"
                                class="form-label"
                            >

                                Brinquedo

                                <span class="required">
                                    *
                                </span>

                            </label>


                            <select
                                id="brinquedo"
                                name="brinquedo"
                                required
                            >

                                <option value="">
                                    Selecione um brinquedo...
                                </option>

                            </select>


                            <div class="form-text">

                                Digite o nome para pesquisar.

                            </div>

                        </div>


                        <!-- OP -->

                        <div class="col-md-6">

                            <label
                                for="ordem_producao"
                                class="form-label"
                            >

                                Ordem de Produção (OP)

                                <span class="required">
                                    *
                                </span>

                            </label>


                            <input
                                type="text"
                                class="form-control"
                                id="ordem_producao"
                                name="op"
                                placeholder="Digite a OP"
                                maxlength="50"
                                required
                            >


                            <div class="form-text">

                                Informe o número da ordem de produção.

                            </div>

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     2 - DETALHES
                ================================================= -->

                <div class="form-section">

                    <div class="section-header">

                        <span class="section-number">
                            2
                        </span>

                        <h3 class="section-title">
                            Detalhes do problema
                        </h3>

                    </div>


                    <!-- DESCRIÇÃO -->

                    <div class="mb-3">

                        <label
                            for="descricao_ocorrencia"
                            class="form-label"
                        >

                            Descrição do problema

                            <span class="required">
                                *
                            </span>

                        </label>


                        <textarea
                            class="form-control"
                            id="descricao_ocorrencia"
                            name="descricao"
                            rows="4"
                            placeholder="Descreva o problema encontrado..."
                            required
                        ></textarea>


                        <div class="form-text">

                            Seja objetivo e descreva o que está acontecendo.

                        </div>

                    </div>


                    <!-- PRIORIDADE -->

                    <div>

                        <label class="form-label">

                            Prioridade

                            <span class="required">
                                *
                            </span>

                        </label>


                        <div
                            class="priority-group"
                            role="group"
                            aria-label="Prioridade"
                        >


                            <button
                                type="button"
                                class="priority-btn alta"
                                data-value="3"
                                onclick="selectPriority(this)"
                            >

                                <i class="bi bi-exclamation-circle"></i>

                                Alta

                            </button>


                            <button
                                type="button"
                                class="priority-btn media"
                                data-value="2"
                                onclick="selectPriority(this)"
                            >

                                <i class="bi bi-exclamation-triangle"></i>

                                Média

                            </button>


                            <button
                                type="button"
                                class="priority-btn baixa"
                                data-value="1"
                                onclick="selectPriority(this)"
                            >

                                <i class="bi bi-check-circle"></i>

                                Baixa

                            </button>

                        </div>


                        <input
                            type="hidden"
                            name="prioridade"
                            id="prioridade"
                            required
                        >

                    </div>

                </div>


                <!-- =================================================
                     ACTIONS
                ================================================= -->

                <div class="form-actions">


                    <a
                        href="/dashboard/ocorrencias"
                        class="btn btn-light border btn-action"
                    >

                        <i class="bi bi-x-lg me-1"></i>

                        Cancelar

                    </a>


                    <button
                        type="submit"
                        class="btn btn-submit btn-action"
                    >

                        <i class="bi bi-send me-1"></i>

                        Registrar ocorrência

                    </button>

                </div>


            </form>

        </section>

    </main>

</div>


<!-- =====================================================
     SCRIPTS
===================================================== -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


<script
    src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"
></script>


<script>


/* =====================================================
   SIDEBAR
===================================================== */

function toggleSidebar()
{

    const sidebar =
        document.getElementById('sidebar');

    const overlay =
        document.getElementById('sidebarOverlay');


    sidebar.classList.toggle('show');

    overlay.classList.toggle('show');

}


/* =====================================================
   COLABORADORES
===================================================== */

fetch('/api/colaboradores')

    .then(response => {

        if (!response.ok) {

            throw new Error(
                'Erro HTTP: ' + response.status
            );

        }

        return response.json();

    })

    .then(colaboradores => {

        new TomSelect(
            '#colaborador',
            {

                options: colaboradores,

                valueField:
                    'id_colaborador',

                labelField:
                    'nome_colaborador',

                searchField:
                    'nome_colaborador',

                placeholder:
                    'Digite o nome do colaborador...',

                allowEmptyOption:
                    true

            }
        );

    })

    .catch(error => {

        console.error(
            'Erro ao buscar colaboradores:',
            error
        );

    });


/* =====================================================
   BRINQUEDOS
===================================================== */

fetch('/api/brinquedos')

    .then(response => {

        if (!response.ok) {

            throw new Error(
                'Erro HTTP: ' + response.status
            );

        }

        return response.json();

    })

    .then(brinquedos => {

        new TomSelect(
            '#brinquedo',
            {

                options: brinquedos,

                valueField:
                    'id_brinquedo',

                labelField:
                    'nome_brinquedo',

                searchField:
                    'nome_brinquedo',

                placeholder:
                    'Digite o nome do brinquedo...',

                allowEmptyOption:
                    true

            }
        );

    })

    .catch(error => {

        console.error(
            'Erro ao buscar brinquedos:',
            error
        );

    });


/* =====================================================
   PRIORIDADE
===================================================== */

function selectPriority(button)
{

    document
        .querySelectorAll('.priority-btn')
        .forEach(btn => {

            btn.classList.remove('active');

        });


    button.classList.add('active');


    document.getElementById('prioridade').value =
        button.dataset.value;

}


/* =====================================================
   VALIDAÇÃO
===================================================== */

document
    .getElementById('formOcorrencia')
    .addEventListener('submit', function(event)
    {

        const colaborador =
            document.getElementById('colaborador').value;

        const brinquedo =
            document.getElementById('brinquedo').value;

        const ordemProducao =
            document
                .getElementById('ordem_producao')
                .value
                .trim();

        const descricao =
            document
                .getElementById('descricao_ocorrencia')
                .value
                .trim();

        const prioridade =
            document.getElementById('prioridade').value;


        if (!colaborador) {

            event.preventDefault();

            alert(
                'Selecione um colaborador.'
            );

            return;

        }


        if (!brinquedo) {

            event.preventDefault();

            alert(
                'Selecione um brinquedo.'
            );

            return;

        }


        if (!ordemProducao) {

            event.preventDefault();

            alert(
                'Digite a Ordem de Produção.'
            );

            return;

        }


        if (!descricao) {

            event.preventDefault();

            alert(
                'Digite a descrição do problema.'
            );

            return;

        }


        if (!prioridade) {

            event.preventDefault();

            alert(
                'Selecione uma prioridade.'
            );

            return;

        }

    });

</script>


</body>

</html>