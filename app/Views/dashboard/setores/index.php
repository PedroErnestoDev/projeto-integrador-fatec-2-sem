<?php
$sidebarProps = [
    'active' => 'setores',
];

$topbarProps = [
    'title'        => 'Setores',
    'subtitle'     => 'Listagem de todos os Setores',
    'userName'     => 'Administrador',
    'userRole'     => 'Gerência',
    'userInitials' => 'AG',
];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play Park | Setores</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

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
            --card-shadow: 0 1px 3px rgba(0,0,0,0.04), 0 4px 12px rgba(0,0,0,0.03);
        }
        * { font-family: 'Inter', system-ui, -apple-system, sans-serif; }
        body { background-color: var(--bg-body); color: #1e293b; overflow-x: hidden; }

        .sidebar { width: var(--sidebar-width); min-height: 100vh; background: var(--sidebar-bg); position: fixed; top: 0; left: 0; z-index: 1040; display: flex; flex-direction: column; transition: transform 0.3s ease; }
        .sidebar-brand { padding: 1.5rem 1.25rem; border-bottom: 1px solid rgba(255,255,255,0.06); }
        .sidebar-brand .logo-text { font-size: 1.35rem; font-weight: 700; letter-spacing: -0.5px; color: #fff; line-height: 1.2; }
        .sidebar-brand .logo-text span { background: linear-gradient(135deg, #6366f1, #22d3ee); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .sidebar-brand .logo-sub { font-size: 0.65rem; font-weight: 500; letter-spacing: 1.5px; color: #94a3b8; text-transform: uppercase; margin-top: 2px; }
        .sidebar-nav { flex: 1; padding: 1rem 0.75rem; overflow-y: auto; }
        .nav-section-label { font-size: 0.65rem; font-weight: 600; letter-spacing: 1.2px; color: #64748b; text-transform: uppercase; padding: 0.75rem 0.75rem 0.4rem; }
        .sidebar .nav-link { display: flex; align-items: center; gap: 0.75rem; padding: 0.65rem 0.85rem; color: #94a3b8; border-radius: 0.5rem; font-size: 0.9rem; font-weight: 500; margin-bottom: 2px; transition: all 0.15s ease; }
        .sidebar .nav-link:hover { background: var(--sidebar-hover); color: #e2e8f0; }
        .sidebar .nav-link.active { background: linear-gradient(135deg, #4f46e5, #6366f1); color: #fff; box-shadow: 0 4px 12px rgba(79, 70, 229, 0.35); }
        .sidebar .nav-link i { font-size: 1.15rem; width: 1.35rem; text-align: center; }
        .sidebar-footer { padding: 1rem 0.75rem; border-top: 1px solid rgba(255,255,255,0.06); }

        .main-content { margin-left: var(--sidebar-width); min-height: 100vh; padding: 0; }

        .topbar { background: #fff; border-bottom: 1px solid var(--border-color); padding: 0.85rem 1.75rem; display: flex; align-items: center; justify-content: space-between; position: sticky; top: 0; z-index: 1020; }
        .topbar h1 { font-size: 1.35rem; font-weight: 700; margin: 0; color: #0f172a; }
        .topbar .subtitle { font-size: 0.8rem; color: var(--text-muted); margin: 0; }

        .content-area { padding: 1.5rem 1.75rem 2.5rem; }

        .table-card { background: #fff; border-radius: 0.85rem; border: 1px solid var(--border-color); box-shadow: var(--card-shadow); overflow: hidden; }
        .card-header-custom { padding: 1.1rem 1.35rem; border-bottom: 1px solid var(--border-color); display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 0.75rem; }
        .card-header-custom h5 { font-size: 0.95rem; font-weight: 600; margin: 0; color: #0f172a; }

        .table-filters { display: flex; flex-wrap: wrap; gap: 0.5rem; align-items: center; }
        .table-filters .form-control, .table-filters .form-select { font-size: 0.8rem; border-radius: 0.5rem; border-color: var(--border-color); height: 34px; }
        .table-filters .form-control { min-width: 240px; }

        .custom-table { margin: 0; font-size: 0.85rem; }
        .custom-table thead th { background: #f8fafc; color: #64748b; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.4px; border-bottom: 1px solid var(--border-color); padding: 0.75rem 1rem; white-space: nowrap; }
        .custom-table tbody td { padding: 0.85rem 1rem; vertical-align: middle; border-bottom: 1px solid #f1f5f9; color: #334155; white-space: nowrap; }
        .custom-table tbody tr:last-child td { border-bottom: none; }
        .custom-table tbody tr:hover { background: #f8fafc; }

        .btn-action { width: 32px; height: 32px; padding: 0; display: inline-flex; align-items: center; justify-content: center; border-radius: 0.45rem; border: 1px solid var(--border-color); background: #fff; color: #64748b; transition: all 0.15s; margin: 0 2px; }
        .btn-action:hover { background: #f1f5f9; }
        .btn-action.btn-edit:hover { color: var(--primary); border-color: #c7d2fe; }
        .btn-action.btn-delete:hover { color: var(--danger); border-color: #fecaca; background: #fef2f2; }

        .table-footer { padding: 1rem 1.35rem; border-top: 1px solid var(--border-color); display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap; }

        .modal-header { border-bottom: 1px solid var(--border-color); padding: 1.15rem 1.35rem; }
        .modal-title { font-size: 1.05rem; font-weight: 600; color: #0f172a; }
        .modal-body { padding: 1.35rem; }
        .modal-footer { border-top: 1px solid var(--border-color); padding: 1rem 1.35rem; }
        .form-label { font-size: 0.8rem; font-weight: 600; color: #475569; margin-bottom: 0.35rem; }
        .form-control, .form-select { font-size: 0.875rem; border-radius: 0.5rem; border-color: var(--border-color); padding: 0.55rem 0.85rem; }
        .form-control:focus, .form-select:focus { border-color: var(--primary-light); box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15); }
        .modal-icon { width: 42px; height: 42px; border-radius: 0.6rem; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; margin-right: 0.85rem; }
        .modal-icon.create { background: #e0e7ff; color: #4f46e5; }
        .modal-icon.edit { background: #dbeafe; color: #2563eb; }
        .modal-icon.delete { background: #fee2e2; color: #dc2626; }

        .sidebar-toggle { display: none; background: none; border: none; font-size: 1.4rem; color: #334155; padding: 0.25rem; }
        .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.5); z-index: 1035; }

        @media (max-width: 991.98px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .main-content { margin-left: 0; }
            .sidebar-toggle { display: block; }
            .sidebar-overlay.show { display: block; }
            .content-area { padding: 1rem; }
            .topbar { padding: 0.85rem 1rem; }
        }
    </style>
</head>

<body>

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <?php require_once __DIR__ . '/../../components/sidebar.php'; ?>

    <div class="main-content">
        <?php require_once __DIR__ . '/../../components/topbar.php'; ?>

        <main class="content-area">
            <div class="table-card">

                <div class="card-header-custom">
                    <div><h5>Todos os Setores</h5></div>
                    <div class="table-filters">
                        <input type="text" id="searchInput" class="form-control" placeholder="Buscar setor...">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCriar">
                            <i class="bi bi-plus-lg me-1"></i> Novo Setor
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table custom-table mb-0" id="setoresTable">
                        <thead>
                            <tr>
                                <th>Nome do Setor</th>
                                <th class="text-center" style="width: 140px;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($setores)): ?>
                                <?php foreach ($setores as $setor): ?>
                                    <tr data-id="<?= htmlspecialchars($setor['id_setor']) ?>" data-nome="<?= htmlspecialchars($setor['nome_setor'] ?? '') ?>">
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:32px;height:32px;background:#e0e7ff;color:#4f46e5;font-size:0.85rem;">
                                                    <i class="bi bi-building"></i>
                                                </div>
                                                <span class="fw-medium"><?= htmlspecialchars($setor['nome_setor'] ?? '-') ?></span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn-action btn-edit" title="Editar" onclick="abrirEditar(this)"><i class="bi bi-pencil"></i></button>
                                            <button type="button" class="btn-action btn-delete" title="Excluir" onclick="abrirExcluir(this)"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center py-5 text-muted">
                                        <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                        Nenhum setor encontrado.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <span class="text-muted small">Total de registros: <strong><?= count($setores ?? []) ?></strong></span>
                    <a href="/dashboard/setores" class="btn btn-outline-primary btn-sm">
                        Atualizar <i class="bi bi-arrow-clockwise ms-1"></i>
                    </a>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal Criar -->
    <div class="modal fade" id="modalCriar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <div class="modal-icon create"><i class="bi bi-plus-lg"></i></div>
                        <h5 class="modal-title mb-0">Novo Setor</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="/dashboard/setores/criar" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="criar_nome" class="form-label">Nome do Setor *</label>
                            <input type="text" class="form-control" id="criar_nome" name="nome_setor" placeholder="Ex: Manutenção, Operações..." required autofocus>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-check-lg me-1"></i> Salvar Setor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <div class="modal-icon edit"><i class="bi bi-pencil"></i></div>
                        <h5 class="modal-title mb-0">Editar Setor</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="formEditar" action="/dashboard/setores/editar" method="POST">
                    <input type="hidden" name="id_setor" id="editar_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editar_nome" class="form-label">Nome do Setor *</label>
                            <input type="text" class="form-control" id="editar_nome" name="nome_setor" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-check-lg me-1"></i> Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Excluir -->
    <div class="modal fade" id="modalExcluir" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <div class="modal-icon delete"><i class="bi bi-trash"></i></div>
                        <h5 class="modal-title mb-0">Excluir Setor</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="formExcluir" action="/dashboard/setores/excluir" method="POST">
                    <input type="hidden" name="id_setor" id="excluir_id">
                    <div class="modal-body">
                        <p class="mb-1 text-muted" style="font-size: 0.9rem;">
                            Tem certeza que deseja excluir o setor <strong id="excluir_nome" class="text-dark"></strong>?
                        </p>
                        <p class="mb-0 text-danger" style="font-size: 0.8rem;">Esta ação não poderá ser desfeita.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash me-1"></i> Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
            document.getElementById('sidebarOverlay').classList.toggle('show');
        }

        document.getElementById('searchInput').addEventListener('keyup', function () {
            const termo = this.value.toLowerCase();
            document.querySelectorAll('#setoresTable tbody tr').forEach(linha => {
                linha.style.display = linha.textContent.toLowerCase().includes(termo) ? '' : 'none';
            });
        });

        function abrirEditar(btn) {
            const tr = btn.closest('tr');
            document.getElementById('editar_id').value = tr.dataset.id;
            document.getElementById('editar_nome').value = tr.dataset.nome;
            document.getElementById('formEditar').action = `/dashboard/setores/editar`;
            new bootstrap.Modal(document.getElementById('modalEditar')).show();
        }

        function abrirExcluir(btn) {
            const tr = btn.closest('tr');
            document.getElementById('excluir_id').value = tr.dataset.id;
            document.getElementById('excluir_nome').textContent = tr.dataset.nome;
            document.getElementById('formExcluir').action = `/dashboard/setores/excluir`;
            new bootstrap.Modal(document.getElementById('modalExcluir')).show();
        }
    </script>
</body>
</html>