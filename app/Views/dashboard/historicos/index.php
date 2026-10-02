<?php

$sidebarProps = [
    'active' => 'historico',
];

$topbarProps = [
    'title'        => 'Histórico de Ocorrências',
    'subtitle'     => 'Registro de alterações realizadas nas ocorrências',
    'userName'     => $_SESSION['nome_usuario'] ?? 'Usuário',
    'userRole'     => $_SESSION['perfil'] ?? '',
];

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>Play Park | Histórico de Alterações</title>

<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
>

<link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    rel="stylesheet"
>

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

        --border: #e5e7eb;
        --border-light: #f1f5f9;

        --text: #1e293b;
        --text-secondary: #475569;
        --text-muted: #64748b;

        --bg: #f8fafc;
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
        background: var(--bg);
        color: var(--text);
        overflow-x: hidden;
    }


    /* =====================================================
       SIDEBAR
    ===================================================== */




    .sidebar-brand {
        padding: 1.35rem 1.25rem;

        border-bottom:
            1px solid rgba(255,255,255,.06);
    }


    .sidebar-brand .logo-text {
        font-size: 1.3rem;
        font-weight: 700;
        letter-spacing: -.4px;
        line-height: 1.2;
        color: #fff;
    }


    .sidebar-brand .logo-text span {
        background:
            linear-gradient(135deg, #6366f1, #22d3ee);

        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }


    .sidebar-brand .logo-sub {
        margin-top: 2px;

        font-size: .63rem;
        font-weight: 500;
        letter-spacing: 1.4px;

        color: #94a3b8;
        text-transform: uppercase;
    }


    .sidebar-nav {
        flex: 1;

        padding: .85rem .75rem;

        overflow-y: auto;
    }


    .nav-section-label {
        padding:
            .7rem .75rem .4rem;

        font-size: .62rem;
        font-weight: 600;
        letter-spacing: 1.1px;

        color: #64748b;
        text-transform: uppercase;
    }


    .sidebar .nav-link {
        display: flex;
        align-items: center;

        gap: .7rem;

        padding: .6rem .8rem;

        margin-bottom: 2px;

        border-radius: .45rem;

        color: #94a3b8;

        font-size: .88rem;
        font-weight: 500;

        transition:
            background .15s ease,
            color .15s ease;
    }


    .sidebar .nav-link:hover {
        background: var(--sidebar-hover);
        color: #e2e8f0;
    }


    .sidebar .nav-link.active {
        background: #312e81;
        color: #fff;
        box-shadow: none;
    }


    .sidebar .nav-link i {
        width: 1.25rem;

        font-size: 1.05rem;

        text-align: center;
    }


    .sidebar-footer {
        padding: .85rem .75rem;

        border-top:
            1px solid rgba(255,255,255,.06);
    }


    /* =====================================================
       MAIN
    ===================================================== */

    .main-content {
        min-height: 100vh;

        margin-left: var(--sidebar-width);
    }


    /* =====================================================
       TOPBAR
    ===================================================== */




    /* =====================================================
       CONTENT
    ===================================================== */

    .content-area {
        padding: 1.5rem;
    }


    /* =====================================================
       TABLE CARD
    ===================================================== */

    .table-card {
        overflow: hidden;

        background: #fff;

        border:
            1px solid var(--border);

        border-radius: .65rem;
    }


    /* =====================================================
       HEADER
    ===================================================== */

    .card-header-custom {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 1rem;

        padding: 1rem 1.15rem;

        border-bottom:
            1px solid var(--border);
    }


    .card-header-custom h5 {
        margin: 0;

        font-size: .9rem;
        font-weight: 600;

        color: #0f172a;
    }


    .card-header-custom p {
        margin: .2rem 0 0;

        font-size: .73rem;

        color: var(--text-muted);
    }


    /* =====================================================
       BUSCA
    ===================================================== */

    .table-filters {
        display: flex;
        align-items: center;
    }


    .table-filters .form-control {
        width: 260px;
        height: 34px;

        padding:
            .35rem .7rem;

        font-size: .78rem;

        border:
            1px solid var(--border);

        border-radius: .4rem;

        box-shadow: none;
    }


    .table-filters .form-control:focus {
        border-color: #a5b4fc;

        box-shadow:
            0 0 0 2px rgba(79,70,229,.08);
    }


    /* =====================================================
       TABLE
    ===================================================== */

    .custom-table {
        margin: 0;

        font-size: .8rem;
    }


    .custom-table thead th {
        padding: .7rem .9rem;

        background: #fafafa;

        border-bottom:
            1px solid var(--border);

        color: var(--text-muted);

        font-size: .67rem;
        font-weight: 600;

        text-transform: uppercase;
        letter-spacing: .35px;

        white-space: nowrap;
    }


    .custom-table tbody td {
        padding: .72rem .9rem;

        vertical-align: middle;

        border-bottom:
            1px solid var(--border-light);

        color: var(--text-secondary);
    }


    .custom-table tbody tr:last-child td {
        border-bottom: none;
    }


    .custom-table tbody tr {
        transition:
            background .12s ease;
    }


    .custom-table tbody tr:hover {
        background: #fafafa;
    }


    /* =====================================================
       OCORRÊNCIA
    ===================================================== */

    .ocorrencia-id {
        display: inline-flex;
        align-items: center;

        padding: .2rem .45rem;

        border-radius: .3rem;

        background: #f1f5f9;

        color: #475569;

        font-size: .72rem;
        font-weight: 600;
    }


    /* =====================================================
       USUÁRIO
    ===================================================== */

    .usuario-log {
        display: flex;
        align-items: center;

        gap: .45rem;

        color: var(--text-secondary);

        font-weight: 500;

        white-space: nowrap;
    }


    .usuario-icon {
        display: flex;
        align-items: center;
        justify-content: center;

        width: 25px;
        height: 25px;

        border-radius: 50%;

        background: #f1f5f9;

        color: #64748b;

        font-size: .7rem;
    }


    /* =====================================================
       AÇÃO
    ===================================================== */

    .badge-acao {
        display: inline-flex;
        align-items: center;

        padding: .25rem .5rem;

        border-radius: .3rem;

        font-size: .67rem;
        font-weight: 600;

        border: 1px solid transparent;
    }


    .acao-criacao {
        background: #eff6ff;
        color: #2563eb;
        border-color: #dbeafe;
    }


    .acao-alteracao {
        background: #fffbeb;
        color: #b45309;
        border-color: #fef3c7;
    }


    .acao-exclusao {
        background: #fef2f2;
        color: #b91c1c;
        border-color: #fee2e2;
    }


    .acao-default {
        background: #f8fafc;
        color: #475569;
        border-color: #e2e8f0;
    }


    /* =====================================================
       CAMPO
    ===================================================== */

    .campo-log {
        color: var(--text-secondary);

        font-weight: 500;

        white-space: nowrap;
    }


    /* =====================================================
       VALORES
    ===================================================== */

    .valor-log {
        max-width: 260px;

        overflow: hidden;

        text-overflow: ellipsis;

        white-space: nowrap;
    }


    .valor-anterior {
        color: #64748b;
    }


    .valor-novo {
        color: #047857;
        font-weight: 500;
    }


    .valor-vazio {
        color: #cbd5e1;

        font-style: normal;
    }


    /* =====================================================
       DATA
    ===================================================== */

    .data-log {
        color: #64748b;

        font-size: .75rem;

        white-space: nowrap;
    }


    /* =====================================================
       FOOTER
    ===================================================== */

    .table-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 1rem;

        padding: .85rem 1.15rem;

        border-top:
            1px solid var(--border);

        background: #fff;
    }


    .table-footer .text-muted {
        font-size: .75rem !important;

        color: var(--text-muted) !important;
    }


    .table-footer strong {
        color: var(--text-secondary);
    }


    .table-footer .btn {
        padding: .3rem .65rem;

        border-radius: .35rem;

        font-size: .72rem;
    }


    /* =====================================================
       MOBILE
    ===================================================== */

    .sidebar-toggle {
        display: none;

        padding: .25rem;

        background: none;

        border: none;

        color: #334155;

        font-size: 1.4rem;
    }


    .sidebar-overlay {
        display: none;

        position: fixed;
        inset: 0;

        z-index: 1035;

        background: rgba(15,23,42,.45);
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
            padding: 1rem;
        }


        .topbar {
            padding: .8rem 1rem;
        }


        .card-header-custom {
            align-items: stretch;
            flex-direction: column;
        }


        .table-filters .form-control {
            width: 100%;
            min-width: 0;
        }


        .table-filters {
            width: 100%;
        }


        .table-filters input {
            width: 100% !important;
        }


        .table-footer {
            align-items: flex-start;
            flex-direction: column;
        }

    }

</style>

</head>

<body>

<!-- OVERLAY MOBILE -->

<div
    class="sidebar-overlay"
    id="sidebarOverlay"
    onclick="toggleSidebar()">
</div>


<!-- SIDEBAR -->

<?php require_once __DIR__ . '/../../components/sidebar.php'; ?>


<!-- MAIN -->

<div class="main-content">


    <!-- TOPBAR -->

    <?php require_once __DIR__ . '/../../components/topbar.php'; ?>


    <!-- CONTENT -->

    <main class="content-area">


        <div class="table-card">


            <!-- HEADER -->

            <div class="card-header-custom">

                <div>

                    <h5>
                        Log de Alterações
                    </h5>

                    <p>
                        Histórico de ações realizadas nas ocorrências
                    </p>

                </div>


                <div class="table-filters">

                    <input
                        type="text"
                        id="searchInput"
                        class="form-control"
                        placeholder="Buscar no histórico..."
                    >

                </div>

            </div>


            <!-- TABLE -->

            <div class="table-responsive">

                <table
                    class="table custom-table mb-0"
                    id="historicosTable"
                >

                    <thead>

                        <tr>

                            <th>Ocorrência</th>

                            <th>Usuário</th>

                            <th>Ação</th>

                            <th>Campo</th>

                            <th>Anterior</th>

                            <th>Novo</th>

                            <th>Data</th>

                        </tr>

                    </thead>


                    <tbody>


                        <?php if (!empty($historicos)): ?>


                            <?php foreach ($historicos as $historico): ?>


                                <?php

                                $acao = strtoupper(
                                    trim(
                                        $historico['acao'] ?? ''
                                    )
                                );


                                $classeAcao = match ($acao) {

                                    'CRIACAO',
                                    'CRIAÇÃO' =>
                                        'acao-criacao',

                                    'ALTERACAO',
                                    'ALTERAÇÃO' =>
                                        'acao-alteracao',

                                    'EXCLUSAO',
                                    'EXCLUSÃO' =>
                                        'acao-exclusao',

                                    default =>
                                        'acao-default'

                                };


                                $campo =
                                    $historico['campo'] ?? null;


                                $anterior =
                                    $historico['anterior'] ?? null;


                                $novo =
                                    $historico['novo'] ?? null;


                                $data =
                                    $historico['data'] ?? null;

                                ?>


                                <tr>


                                    <!-- OCORRÊNCIA -->

                                    <td>

                                        <span class="ocorrencia-id">

                                            #<?= htmlspecialchars(
                                                $historico['ocorrencia'] ?? '-'
                                            ) ?>

                                        </span>

                                    </td>


                                    <!-- USUÁRIO -->

                                    <td>

                                        <div class="usuario-log">

                                            <span class="usuario-icon">

                                                <i class="bi bi-person"></i>

                                            </span>

                                            <?= htmlspecialchars(
                                                $historico['usuario'] ?? '-'
                                            ) ?>

                                        </div>

                                    </td>


                                    <!-- AÇÃO -->

                                    <td>

                                        <span
                                            class="badge-acao <?= $classeAcao ?>"
                                        >

                                            <?php if (
                                                $acao === 'CRIACAO' ||
                                                $acao === 'CRIAÇÃO'
                                            ): ?>

                                                <i class="bi bi-plus me-1"></i>

                                            <?php elseif (
                                                $acao === 'ALTERACAO' ||
                                                $acao === 'ALTERAÇÃO'
                                            ): ?>

                                                <i class="bi bi-pencil me-1"></i>

                                            <?php elseif (
                                                $acao === 'EXCLUSAO' ||
                                                $acao === 'EXCLUSÃO'
                                            ): ?>

                                                <i class="bi bi-trash me-1"></i>

                                            <?php endif; ?>


                                            <?= htmlspecialchars(
                                                $historico['acao'] ?? '-'
                                            ) ?>

                                        </span>

                                    </td>


                                    <!-- CAMPO -->

                                    <td>

                                        <span class="campo-log">

                                            <?= htmlspecialchars(
                                                $campo ?: 'Registro'
                                            ) ?>

                                        </span>

                                    </td>


                                    <!-- ANTERIOR -->

                                    <td>

                                        <?php if (
                                            $anterior === null ||
                                            $anterior === ''
                                        ): ?>

                                            <span class="valor-vazio">
                                                —
                                            </span>

                                        <?php else: ?>

                                            <div
                                                class="valor-log valor-anterior"
                                                title="<?= htmlspecialchars(
                                                    $anterior
                                                ) ?>"
                                            >

                                                <?= htmlspecialchars(
                                                    $anterior
                                                ) ?>

                                            </div>

                                        <?php endif; ?>

                                    </td>


                                    <!-- NOVO -->

                                    <td>

                                        <?php if (
                                            $novo === null ||
                                            $novo === ''
                                        ): ?>

                                            <span class="valor-vazio">
                                                —
                                            </span>

                                        <?php else: ?>

                                            <div
                                                class="valor-log valor-novo"
                                                title="<?= htmlspecialchars(
                                                    $novo
                                                ) ?>"
                                            >

                                                <?= htmlspecialchars(
                                                    $novo
                                                ) ?>

                                            </div>

                                        <?php endif; ?>

                                    </td>


                                    <!-- DATA -->

                                    <td>

                                        <span class="data-log">

                                            <?= !empty($data)
                                                ? date(
                                                    'd/m/Y H:i:s',
                                                    strtotime($data)
                                                )
                                                : '-'
                                            ?>

                                        </span>

                                    </td>


                                </tr>


                            <?php endforeach; ?>


                        <?php else: ?>


                            <tr>

                                <td
                                    colspan="7"
                                    class="text-center py-5 text-muted"
                                >

                                    <i
                                        class="bi bi-clock-history fs-2 d-block mb-2"
                                    ></i>

                                    Nenhum registro de histórico encontrado.

                                </td>

                            </tr>


                        <?php endif; ?>


                    </tbody>

                </table>

            </div>


            <!-- FOOTER -->

            <div class="table-footer">

                <span class="text-muted small">

                    Total de registros:

                    <strong>
                        <?= count($historicos ?? []) ?>
                    </strong>

                </span>


                <a
                    href="/dashboard/historicos"
                    class="btn btn-outline-primary btn-sm"
                >

                    Atualizar

                    <i class="bi bi-arrow-clockwise ms-1"></i>

                </a>

            </div>


        </div>


    </main>


</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


<script>

    // =================================================
    // SIDEBAR MOBILE
    // =================================================

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


    // =================================================
    // BUSCA NO HISTÓRICO
    // =================================================

    document
        .getElementById('searchInput')
        .addEventListener(
            'keyup',
            function () {

                const termo =
                    this.value
                        .toLowerCase()
                        .trim();


                const linhas =
                    document.querySelectorAll(
                        '#historicosTable tbody tr'
                    );


                linhas.forEach(
                    function (linha) {

                        const texto =
                            linha.textContent
                                .toLowerCase();


                        linha.style.display =
                            texto.includes(termo)
                                ? ''
                                : 'none';

                    }
                );

            }
        );

</script>

</body>

</html>
