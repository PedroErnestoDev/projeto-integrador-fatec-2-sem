<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Play Park | Ocorrências</title>

    <!-- Bootstrap 5 -->
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
                0 1px 3px rgba(0,0,0,0.04),
                0 4px 12px rgba(0,0,0,0.03);
        }

        * {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: var(--bg-body);
            color: #1e293b;
            overflow-x: hidden;
        }

        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;

            background: var(--sidebar-bg);

            position: fixed;
            top: 0;
            left: 0;

            z-index: 1040;

            display: flex;
            flex-direction: column;

            transition: transform 0.3s ease;
        }

        .sidebar-brand {
            padding: 1.5rem 1.25rem;

            border-bottom:
                1px solid rgba(255,255,255,0.06);
        }

        .sidebar-brand .logo-text {
            font-size: 1.35rem;
            font-weight: 700;

            letter-spacing: -0.5px;

            color: #fff;

            line-height: 1.2;
        }

        .sidebar-brand .logo-text span {
            background:
                linear-gradient(
                    135deg,
                    #6366f1,
                    #22d3ee
                );

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            background-clip: text;
        }

        .sidebar-brand .logo-sub {
            font-size: 0.65rem;
            font-weight: 500;

            letter-spacing: 1.5px;

            color: #94a3b8;

            text-transform: uppercase;

            margin-top: 2px;
        }

        .sidebar-nav {
            flex: 1;

            padding: 1rem 0.75rem;

            overflow-y: auto;
        }

        .nav-section-label {
            font-size: 0.65rem;
            font-weight: 600;

            letter-spacing: 1.2px;

            color: #64748b;

            text-transform: uppercase;

            padding:
                0.75rem
                0.75rem
                0.4rem;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;

            gap: 0.75rem;

            padding:
                0.65rem
                0.85rem;

            color: #94a3b8;

            border-radius: 0.5rem;

            font-size: 0.9rem;
            font-weight: 500;

            margin-bottom: 2px;

            transition: all 0.15s ease;
        }

        .sidebar .nav-link:hover {
            background: var(--sidebar-hover);
            color: #e2e8f0;
        }

        .sidebar .nav-link.active {
            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #6366f1
                );

            color: #fff;

            box-shadow:
                0 4px 12px
                rgba(79, 70, 229, 0.35);
        }

        .sidebar .nav-link i {
            font-size: 1.15rem;

            width: 1.35rem;

            text-align: center;
        }

        .sidebar-footer {
            padding: 1rem 0.75rem;

            border-top:
                1px solid rgba(255,255,255,0.06);
        }

        /* =====================================================
           MAIN
        ===================================================== */

        .main-content {
            margin-left: var(--sidebar-width);

            min-height: 100vh;

            padding: 0;
        }

        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {
            background: #fff;

            border-bottom:
                1px solid var(--border-color);

            padding:
                0.85rem
                1.75rem;

            display: flex;

            align-items: center;

            justify-content: space-between;

            position: sticky;

            top: 0;

            z-index: 1020;
        }

        .topbar h1 {
            font-size: 1.35rem;

            font-weight: 700;

            margin: 0;

            color: #0f172a;
        }

        .topbar .subtitle {
            font-size: 0.8rem;

            color: var(--text-muted);

            margin: 0;
        }

        /* =====================================================
           CONTENT
        ===================================================== */

        .content-area {
            padding:
                1.5rem
                1.75rem
                2.5rem;
        }

        /* =====================================================
           TABLE CARD
        ===================================================== */

        .table-card {
            background: #fff;

            border-radius: 0.85rem;

            border:
                1px solid var(--border-color);

            box-shadow: var(--card-shadow);

            overflow: hidden;
        }

        .card-header-custom {
            padding:
                1.1rem
                1.35rem;

            border-bottom:
                1px solid var(--border-color);

            display: flex;

            flex-wrap: wrap;

            align-items: center;

            justify-content: space-between;

            gap: 0.75rem;
        }

        .card-header-custom h5 {
            font-size: 0.95rem;

            font-weight: 600;

            margin: 0;

            color: #0f172a;
        }

        /* =====================================================
           FILTROS
        ===================================================== */

        .table-filters {
            display: flex;

            flex-wrap: wrap;

            gap: 0.5rem;

            align-items: center;
        }

        .table-filters .form-control,
        .table-filters .form-select {
            font-size: 0.8rem;

            border-radius: 0.5rem;

            border-color:
                var(--border-color);

            height: 34px;
        }

        .table-filters .form-control {
            min-width: 240px;
        }

        /* =====================================================
           TABLE
        ===================================================== */

        .custom-table {
            margin: 0;

            font-size: 0.85rem;
        }

        .custom-table thead th {
            background: #f8fafc;

            color: #64748b;

            font-weight: 600;

            font-size: 0.75rem;

            text-transform: uppercase;

            letter-spacing: 0.4px;

            border-bottom:
                1px solid var(--border-color);

            padding:
                0.75rem
                1rem;

            white-space: nowrap;
        }

        .custom-table tbody td {
            padding:
                0.85rem
                1rem;

            vertical-align: middle;

            border-bottom:
                1px solid #f1f5f9;

            color: #334155;

            white-space: nowrap;
        }

        .custom-table tbody tr:last-child td {
            border-bottom: none;
        }

        .custom-table tbody tr:hover {
            background: #f8fafc;
        }

        /* =====================================================
           BADGES
        ===================================================== */

        .badge-status {
            font-size: 0.72rem;

            font-weight: 600;

            padding:
                0.3rem
                0.65rem;

            border-radius: 2px;
        }

        .badge-aberta {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .badge-andamento {
            background: #ffedd5;
            color: #c2410c;
        }

        .badge-concluida {
            background: #d1fae5;
            color: #047857;
        }

        .badge-prio {
            font-size: 0.72rem;

            font-weight: 600;

            padding:
                0.3rem
                0.65rem;

            border-radius: 2px;
        }

        .prio-alta {
            background: #fee2e2;
            color: #b91c1c;
        }

        .prio-media {
            background: #fef3c7;
            color: #b45309;
        }

        .prio-baixa {
            background: #d1fae5;
            color: #047857;
        }

        /* =====================================================
           BUTTON VIEW
        ===================================================== */

        .btn-view {
            width: 32px;
            height: 32px;

            padding: 0;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            border-radius: 0.45rem;

            border:
                1px solid var(--border-color);

            background: #fff;

            color: #64748b;

            transition: all 0.15s;
        }

        .btn-view:hover {
            background: #f1f5f9;

            color: var(--primary);

            border-color: #c7d2fe;
        }

        /* =====================================================
           FOOTER
        ===================================================== */

        .table-footer {
            padding:
                1rem
                1.35rem;

            border-top:
                1px solid var(--border-color);

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 1rem;

            flex-wrap: wrap;
        }

        /* =====================================================
           NOTIFICATION
        ===================================================== */

        .notif-btn {
            position: relative;

            width: 40px;
            height: 40px;

            border-radius: 0.55rem;

            border:
                1px solid var(--border-color);

            background: #fff;

            display: flex;

            align-items: center;
            justify-content: center;

            color: #64748b;
        }

        .notif-btn .badge {
            position: absolute;

            top: -4px;
            right: -4px;

            font-size: 0.65rem;

            padding:
                0.2rem
                0.4rem;
        }

        /* =====================================================
           USER
        ===================================================== */

        .user-dropdown {
            display: flex;

            align-items: center;

            gap: 0.6rem;

            padding:
                0.35rem
                0.6rem
                0.35rem
                0.35rem;

            border-radius: 0.55rem;

            border:
                1px solid var(--border-color);

            background: #fff;

            cursor: pointer;
        }

        .user-avatar {
            width: 34px;
            height: 34px;

            border-radius: 50%;

            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #818cf8
                );

            color: #fff;

            display: flex;

            align-items: center;
            justify-content: center;

            font-weight: 600;

            font-size: 0.85rem;
        }

        .user-info {
            line-height: 1.2;
        }

        .user-info .name {
            font-size: 0.8rem;

            font-weight: 600;

            color: #0f172a;
        }

        .user-info .role {
            font-size: 0.7rem;

            color: var(--text-muted);
        }

        /* =====================================================
           MOBILE
        ===================================================== */

        .sidebar-toggle {
            display: none;

            background: none;

            border: none;

            font-size: 1.4rem;

            color: #334155;

            padding: 0.25rem;
        }

        .sidebar-overlay {
            display: none;

            position: fixed;

            inset: 0;

            background:
                rgba(15, 23, 42, 0.5);

            z-index: 1035;
        }

        @media (max-width: 991.98px) {

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar-toggle {
                display: block;
            }

            .sidebar-overlay.show {
                display: block;
            }

            .content-area {
                padding:
                    1rem;
            }

            .topbar {
                padding:
                    0.85rem 1rem;
            }
        }

    </style>
</head>

<body>

    <!-- =====================================================
         OVERLAY MOBILE
    ====================================================== -->

    <div
        class="sidebar-overlay"
        id="sidebarOverlay"
        onclick="toggleSidebar()">
    </div>


    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    <aside
        class="sidebar"
        id="sidebar">

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


            <a href="/dashboard" class="nav-link">

                <i class="bi bi-house-door-fill"></i>

                <span>
                    Dashboard
                </span>

            </a>


            <a href="#" class="nav-link active">

                <i class="bi bi-file-earmark-text"></i>

                <span>
                    Ocorrências
                </span>

            </a>


            <a href="/dashboard/ocorrencias/criar" class="nav-link">

                <i class="bi bi-plus-square"></i>

                <span>
                    Nova Ocorrência
                </span>

            </a>


            <div class="nav-section-label mt-3">
                Cadastros
            </div>


            <a href="#" class="nav-link">

                <i class="bi bi-controller"></i>

                <span>
                    Brinquedos
                </span>

            </a>


            <a href="#" class="nav-link">

                <i class="bi bi-person-badge"></i>

                <span>
                    Colaboradores
                </span>

            </a>


            <a href="#" class="nav-link">

                <i class="bi bi-building"></i>

                <span>
                    Setores
                </span>

            </a>


            <a href="#" class="nav-link">

                <i class="bi bi-people"></i>

                <span>
                    Usuários
                </span>

            </a>


            <div class="nav-section-label mt-3">
                Sistema
            </div>


            <a href="#" class="nav-link">

                <i class="bi bi-bar-chart-line"></i>

                <span>
                    Relatórios
                </span>

            </a>


            <a href="#" class="nav-link">

                <i class="bi bi-gear"></i>

                <span>
                    Configurações
                </span>

            </a>

        </nav>


        <div class="sidebar-footer">

            <a href="#" class="nav-link text-danger">

                <i class="bi bi-box-arrow-right"></i>

                <span>
                    Sair
                </span>

            </a>

        </div>

    </aside>


    <!-- =====================================================
         MAIN
    ====================================================== -->

    <div class="main-content">


        <!-- =================================================
             TOPBAR
        ================================================== -->

        <header class="topbar">

            <div class="d-flex align-items-center gap-3">

                <button
                    class="sidebar-toggle"
                    onclick="toggleSidebar()">

                    <i class="bi bi-list"></i>

                </button>


                <div>

                    <h1>
                        Ocorrências
                    </h1>

                    <p class="subtitle">
                        Gerenciamento de todas as ocorrências
                    </p>

                </div>

            </div>


            <div class="d-flex align-items-center gap-2">

                <button
                    class="notif-btn"
                    title="Notificações">

                    <i class="bi bi-bell"></i>

                    <span class="badge bg-danger rounded-pill">
                        3
                    </span>

                </button>


                <div class="dropdown">

                    <div
                        class="user-dropdown"
                        data-bs-toggle="dropdown">

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
                            style="font-size:0.7rem;">
                        </i>

                    </div>


                    <ul
                        class="dropdown-menu dropdown-menu-end shadow-sm border-0"
                        style="min-width:180px;">

                        <li>

                            <a
                                class="dropdown-item small"
                                href="#">

                                <i class="bi bi-person me-2"></i>

                                Meu Perfil

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item small"
                                href="#">

                                <i class="bi bi-gear me-2"></i>

                                Configurações

                            </a>

                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <li>

                            <a
                                class="dropdown-item small text-danger"
                                href="#">

                                <i
                                    class="bi bi-box-arrow-right me-2">
                                </i>

                                Sair

                            </a>

                        </li>

                    </ul>

                </div>

            </div>

        </header>


        <!-- =================================================
             CONTENT
        ================================================== -->

        <main class="content-area">


            <div class="table-card">


                <!-- =========================================
                     HEADER DA TABELA
                ========================================== -->

                <div class="card-header-custom">

                    <div>

                        <h5>
                            Todas as Ocorrências
                        </h5>

                    </div>


                    <div class="table-filters">

                        <input
                            type="text"
                            id="searchInput"
                            class="form-control"
                            placeholder="Buscar ocorrência...">


                        <a
                            href="#"
                            class="btn btn-primary btn-sm">

                            <i class="bi bi-plus-lg me-1"></i>

                            Nova Ocorrência

                        </a>

                    </div>

                </div>


                <!-- =========================================
                     TABLE
                ========================================== -->

                <div class="table-responsive">

                    <table
                        class="table custom-table mb-0"
                        id="ocorrenciasTable">

                        <thead>

                            <tr>

                                <th>
                                    ID
                                </th>

                                <th>
                                    Ordem Produção
                                </th>

                                <th>
                                    Data Abertura
                                </th>

                                <th>
                                    Brinquedo
                                </th>

                                <th>
                                    Colaborador
                                </th>

                                <th>
                                    Prioridade
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Usuário
                                </th>

                                <th>
                                    Criado em
                                </th>

                                <th class="text-center">
                                    Ações
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php if (!empty($ocorrencias)): ?>

                                <?php foreach ($ocorrencias as $ocorrencia): ?>

                                    <tr>

                                        <!-- ID -->

                                        <td>

                                            <strong>

                                                #<?= htmlspecialchars(
                                                    $ocorrencia['id_ocorrencia']
                                                ) ?>

                                            </strong>

                                        </td>


                                        <!-- ORDEM PRODUÇÃO -->

                                        <td>

                                            <?= htmlspecialchars(
                                                $ocorrencia['ordem_producao'] ?? '-'
                                            ) ?>

                                        </td>


                                        <!-- DATA ABERTURA -->

                                        <td>

                                            <?= !empty(
                                                $ocorrencia['data_abertura']
                                            )
                                                ? date(
                                                    'd/m/Y H:i',
                                                    strtotime(
                                                        $ocorrencia['data_abertura']
                                                    )
                                                )
                                                : '-'
                                            ?>

                                        </td>


                                        <!-- BRINQUEDO -->

                                        <td>

                                            <?= htmlspecialchars(
                                                $ocorrencia['brinquedo'] ?? '-'
                                            ) ?>

                                        </td>


                                        <!-- COLABORADOR -->

                                        <td>

                                            <?= htmlspecialchars(
                                                $ocorrencia['colaborador'] ?? '-'
                                            ) ?>

                                        </td>


                                        <!-- PRIORIDADE -->

                                        <td>

                                            <?php

                                            $prioridade = strtolower(
                                                trim(
                                                    $ocorrencia['prioridade'] ?? ''
                                                )
                                            );

                                            $classePrioridade = match ($prioridade) {

                                                'alta' =>
                                                    'prio-alta',

                                                'média',
                                                'media' =>
                                                    'prio-media',

                                                'baixa' =>
                                                    'prio-baixa',

                                                default =>
                                                    ''

                                            };

                                            ?>

                                            <span
                                                class="badge-prio <?= $classePrioridade ?>">

                                                <?= htmlspecialchars(
                                                    $ocorrencia['prioridade'] ?? '-'
                                                ) ?>

                                            </span>

                                        </td>


                                        <!-- STATUS -->

                                        <td>

                                            <?php

                                            $status = strtolower(
                                                trim(
                                                    $ocorrencia['status'] ?? ''
                                                )
                                            );

                                            $classeStatus = match ($status) {

                                                'aberta',
                                                'aberto' =>
                                                    'badge-aberta',

                                                'em andamento',
                                                'andamento' =>
                                                    'badge-andamento',

                                                'concluída',
                                                'concluida',
                                                'concluído',
                                                'concluido' =>
                                                    'badge-concluida',

                                                default =>
                                                    ''

                                            };

                                            ?>

                                            <span
                                                class="badge-status <?= $classeStatus ?>">

                                                <?= htmlspecialchars(
                                                    $ocorrencia['status'] ?? '-'
                                                ) ?>

                                            </span>

                                        </td>


                                        <!-- USUÁRIO -->

                                        <td>

                                            <?= htmlspecialchars(
                                                $ocorrencia['usuario'] ?? '-'
                                            ) ?>

                                        </td>


                                        <!-- CRIADO EM -->

                                        <td>

                                            <?= !empty(
                                                $ocorrencia['criado_em']
                                            )
                                                ? date(
                                                    'd/m/Y H:i',
                                                    strtotime(
                                                        $ocorrencia['criado_em']
                                                    )
                                                )
                                                : '-'
                                            ?>

                                        </td>


                                        <!-- AÇÕES -->

                                        <td class="text-center">

                                            <a
                                                href="/dashboard/ocorrencias/detalhes/<?= urlencode(
                                                    $ocorrencia['id_ocorrencia']
                                                ) ?>"
                                                class="btn-view"
                                                title="Visualizar ocorrência">

                                                <i class="bi bi-eye"></i>

                                            </a>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>

                                    <td
                                        colspan="10"
                                        class="text-center py-5 text-muted">

                                        <i
                                            class="bi bi-inbox fs-2 d-block mb-2">
                                        </i>

                                        Nenhuma ocorrência encontrada.

                                    </td>

                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>


                <!-- =========================================
                     FOOTER
                ========================================== -->

                <div class="table-footer">

                    <span class="text-muted small">

                        Total de registros:
                        <strong>
                            <?= count($ocorrencias ?? []) ?>
                        </strong>

                    </span>


                    <a
                        href="/dashboard/ocorrencias"
                        class="btn btn-outline-primary btn-sm">

                        Atualizar

                        <i
                            class="bi bi-arrow-clockwise ms-1">
                        </i>

                    </a>

                </div>

            </div>

        </main>

    </div>


    <!-- =====================================================
         BOOTSTRAP JS
    ====================================================== -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


    <!-- =====================================================
         JAVASCRIPT
    ====================================================== -->

    <script>

        // ==========================================
        // SIDEBAR MOBILE
        // ==========================================

        function toggleSidebar() {

            document
                .getElementById('sidebar')
                .classList
                .toggle('show');

            document
                .getElementById('sidebarOverlay')
                .classList
                .toggle('show');

        }


        // ==========================================
        // BUSCA NA TABELA
        // ==========================================

        document
            .getElementById('searchInput')
            .addEventListener('keyup', function () {

                const termo =
                    this.value.toLowerCase();

                const linhas =
                    document.querySelectorAll(
                        '#ocorrenciasTable tbody tr'
                    );

                linhas.forEach(function (linha) {

                    const texto =
                        linha.textContent.toLowerCase();

                    linha.style.display =
                        texto.includes(termo)
                            ? ''
                            : 'none';

                });

            });

    </script>

</body>

</html>