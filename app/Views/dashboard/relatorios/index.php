<?php
$sidebarProps = [
    'active' => 'historico',
];

$topbarProps = [
    'title'        => 'Histórico de Ocorrências',
    'subtitle'     => 'Registro automático de alterações de status e setor',
    'userName'     => $_SESSION['nome_usuario'] ?? 'Usuário',
    'userRole'     => $_SESSION['perfil'] ?? '',
    'userInitials' => strtoupper(substr($_SESSION['nome_usuario'] ?? 'U', 0, 2)),
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Play Park | Histórico de Ocorrências</title>
  
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <!-- Google Fonts -->
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
      --purple: #8b5cf6;
      --card-shadow: 0 1px 3px rgba(0,0,0,0.04), 0 4px 12px rgba(0,0,0,0.03);
      --card-shadow-hover: 0 4px 20px rgba(0,0,0,0.08);
      --border-color: #e2e8f0;
      --text-muted: #64748b;
      --bg-body: #f8fafc;
    }

    * {
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    body {
      background-color: var(--bg-body);
      color: #1e293b;
      overflow-x: hidden;
    }

    .main-content {
      margin-left: var(--sidebar-width);
      min-height: 100vh;
      padding: 0;
    }

    .content-area {
      padding: 1.5rem 1.75rem 2.5rem;
    }

    .filter-card {
      background: #fff;
      border-radius: 0.85rem;
      border: 1px solid var(--border-color);
      box-shadow: var(--card-shadow);
      padding: 1.25rem 1.35rem;
      margin-bottom: 1.5rem;
    }

    .table-card {
      background: #fff;
      border-radius: 0.85rem;
      border: 1px solid var(--border-color);
      box-shadow: var(--card-shadow);
      overflow: hidden;
    }

    .table-card .card-header-custom {
      padding: 1.1rem 1.35rem;
      border-bottom: 1px solid var(--border-color);
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      gap: 0.75rem;
    }

    .table-card .card-header-custom h5 {
      font-size: 0.95rem;
      font-weight: 600;
      margin: 0;
      color: #0f172a;
    }

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
      border-bottom: 1px solid var(--border-color);
      padding: 0.75rem 1rem;
      white-space: nowrap;
    }

    .custom-table tbody td {
      padding: 0.9rem 1rem;
      vertical-align: middle;
      border-bottom: 1px solid #f1f5f9;
      color: #334155;
    }

    .custom-table tbody tr:last-child td {
      border-bottom: none;
    }

    .custom-table tbody tr:hover {
      background: #f8fafc;
    }

    .badge-status {
      font-size: 0.72rem;
      font-weight: 600;
      padding: 0.3rem 0.65rem;
      border-radius: 999px;
    }

    .badge-aberta     { background: #dbeafe; color: #1d4ed8; }
    .badge-andamento  { background: #ffedd5; color: #c2410c; }
    .badge-concluida  { background: #d1fae5; color: #047857; }
    .badge-cancelada  { background: #fee2e2; color: #b91c1c; }

    .change-arrow {
      color: #94a3b8;
      font-size: 0.85rem;
      margin: 0 0.35rem;
    }

    .setor-badge {
      background: #f1f5f9;
      color: #475569;
      font-size: 0.75rem;
      font-weight: 500;
      padding: 0.25rem 0.55rem;
      border-radius: 0.4rem;
    }

    .btn-view {
      width: 32px;
      height: 32px;
      padding: 0;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 0.45rem;
      border: 1px solid var(--border-color);
      background: #fff;
      color: #64748b;
      transition: all 0.15s;
    }

    .btn-view:hover {
      background: #f1f5f9;
      color: var(--primary);
      border-color: #c7d2fe;
    }

    @media (max-width: 991.98px) {
      .main-content {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>

<?php require_once __DIR__ . '/../../components/sidebar.php'; ?>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<div class="main-content">
    <?php require_once __DIR__ . '/../../components/topbar.php'; ?>
  
    <div class="content-area">

      <!-- Filtros (ainda estáticos - pode implementar depois) -->
      <div class="filter-card">
        <div class="row g-3 align-items-end">
          <div class="col-md-3">
            <label class="form-label small text-muted mb-1">Buscar Ocorrência</label>
            <input type="text" class="form-control form-control-sm" placeholder="ID ou OP...">
          </div>
          <div class="col-md-2">
            <label class="form-label small text-muted mb-1">Status Novo</label>
            <select class="form-select form-select-sm">
              <option value="">Todos</option>
              <option>Aberta</option>
              <option>Em andamento</option>
              <option>Concluída</option>
              <option>Cancelada</option>
            </select>
          </div>
          <div class="col-md-2">
            <label class="form-label small text-muted mb-1">Setor Novo</label>
            <select class="form-select form-select-sm">
              <option value="">Todos</option>
              <option>Administração</option>
              <option>Projeto</option>
              <option>Corte</option>
              <option>Impressão</option>
              <option>Produção</option>
            </select>
          </div>
          <div class="col-md-2">
            <label class="form-label small text-muted mb-1">Data Inicial</label>
            <input type="date" class="form-control form-control-sm">
          </div>
          <div class="col-md-2">
            <label class="form-label small text-muted mb-1">Data Final</label>
            <input type="date" class="form-control form-control-sm">
          </div>
          <div class="col-md-1">
            <button class="btn btn-primary btn-sm w-100">
              <i class="bi bi-funnel"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Tabela de Histórico -->
      <div class="table-card">
        <div class="card-header-custom">
          <h5>
            <i class="bi bi-clock-history me-2"></i>
            Histórico de Alterações
          </h5>

          <div class="d-flex align-items-center gap-3">
            <span class="text-muted small">
              <?= count($historicos) ?> registro<?= count($historicos) !== 1 ? 's' : '' ?>
            </span>

            <a href="/dashboard/historico/exportar" class="btn btn-success btn-sm">
              <i class="bi bi-download me-1"></i> Exportar
            </a>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table custom-table mb-0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Ocorrência</th>
                <th>Data / Hora</th>
                <th>Status</th>
                <th>Setor</th>
                <th>Alterado por</th>
                <th class="text-center">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($historicos)): ?>
                <tr>
                  <td colspan="7" class="text-center text-muted py-4">
                    Nenhum registro de histórico encontrado.
                  </td>
                </tr>
              <?php else: ?>
                <?php foreach ($historicos as $h): ?>
                  <tr>
                    <td>
                      <strong>#<?= $h['id_historico'] ?></strong>
                    </td>

                    <td>
                      <div class="fw-semibold">#<?= $h['id_ocorrencia'] ?></div>
                      <div class="text-muted small"><?= htmlspecialchars($h['ordem_producao'] ?? '-') ?></div>
                      <div class="text-muted small"><?= htmlspecialchars($h['brinquedo'] ?? '-') ?></div>
                    </td>

                    <td>
                      <?= date('d/m/Y', strtotime($h['data_alteracao'])) ?><br>
                      <span class="text-muted small"><?= date('H:i:s', strtotime($h['data_alteracao'])) ?></span>
                    </td>

                    <td>
                      <?php
                        $getStatusClass = function($status) {
                          $status = strtolower(trim($status ?? ''));
                          return match(true) {
                            str_contains($status, 'aberta')     => 'badge-aberta',
                            str_contains($status, 'andamento')  => 'badge-andamento',
                            str_contains($status, 'conclu')     => 'badge-concluida',
                            str_contains($status, 'cancel')     => 'badge-cancelada',
                            default                             => 'badge-aberta'
                          };
                        };
                      ?>
                      <span class="badge-status <?= $getStatusClass($h['status_anterior']) ?>">
                        <?= htmlspecialchars($h['status_anterior'] ?? '-') ?>
                      </span>
                      <span class="change-arrow">→</span>
                      <span class="badge-status <?= $getStatusClass($h['status_novo']) ?>">
                        <?= htmlspecialchars($h['status_novo'] ?? '-') ?>
                      </span>
                    </td>

                    <td>
                      <span class="setor-badge"><?= htmlspecialchars($h['setor_anterior'] ?? '-') ?></span>
                      <span class="change-arrow">→</span>
                      <span class="setor-badge"><?= htmlspecialchars($h['setor_novo'] ?? '-') ?></span>
                    </td>

                    <td>
                      <div class="d-flex align-items-center gap-2">
                        <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center" 
                             style="width:28px;height:28px;font-size:0.7rem;font-weight:600;">
                          <?= strtoupper(substr($h['usuario'] ?? 'U', 0, 1)) ?>
                        </div>
                        <span><?= htmlspecialchars($h['usuario'] ?? '-') ?></span>
                      </div>
                    </td>

                    <td class="text-center">
                      <a href="/dashboard/ocorrencias/detalhes/<?= $h['id_ocorrencia'] ?>" 
                         class="btn-view" title="Ver ocorrência">
                        <i class="bi bi-eye"></i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('show');
      document.getElementById('sidebarOverlay').classList.toggle('show');
    }
  </script>
</body>
</html>