<?php
$sidebarProps = [
    'active' => 'relatorios', // ajuste conforme o item do menu
];

$topbarProps = [
    'title'        => 'Relatório de Ocorrências',
    'subtitle'     => 'Lista filtrável de todas as ocorrências',
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
  <title>Play Park | Relatório de Ocorrências</title>
  
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

    .badge-prioridade {
      font-size: 0.72rem;
      font-weight: 600;
      padding: 0.3rem 0.65rem;
      border-radius: 999px;
    }

    .badge-baixa  { background: #e0f2fe; color: #0369a1; }
    .badge-media  { background: #fef3c7; color: #b45309; }
    .badge-alta   { background: #fee2e2; color: #b91c1c; }

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

    @media print {
      .sidebar, .topbar, .filter-card, .no-print {
        display: none !important;
      }
      .main-content {
        margin-left: 0 !important;
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

      <!-- Filtros -->
      <div class="filter-card no-print">
        <form method="GET" class="row g-3 align-items-end">
          
          <div class="col-md-2">
            <label class="form-label small text-muted mb-1">Data Inicial</label>
            <input type="date" name="data_inicio" class="form-control form-control-sm" 
                   value="<?= htmlspecialchars($filtros['data_inicio'] ?? '') ?>">
          </div>

          <div class="col-md-2">
            <label class="form-label small text-muted mb-1">Data Final</label>
            <input type="date" name="data_fim" class="form-control form-control-sm" 
                   value="<?= htmlspecialchars($filtros['data_fim'] ?? '') ?>">
          </div>

          <div class="col-md-2">
            <label class="form-label small text-muted mb-1">Status</label>
            <select name="fk_status" class="form-select form-select-sm">
              <option value="">Todos</option>
              <?php foreach ($status as $s): ?>
                <option value="<?= $s['id_status'] ?>" 
                  <?= ($filtros['fk_status'] ?? '') == $s['id_status'] ? 'selected' : '' ?>>
                  <?= htmlspecialchars($s['nome_status']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-md-2">
            <label class="form-label small text-muted mb-1">Setor</label>
            <select name="fk_setor" class="form-select form-select-sm">
              <option value="">Todos</option>
              <?php foreach ($setores as $se): ?>
                <option value="<?= $se['id_setor'] ?>" 
                  <?= ($filtros['fk_setor'] ?? '') == $se['id_setor'] ? 'selected' : '' ?>>
                  <?= htmlspecialchars($se['nome_setor']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-md-2">
            <label class="form-label small text-muted mb-1">Prioridade</label>
            <select name="fk_prioridade" class="form-select form-select-sm">
              <option value="">Todas</option>
              <?php foreach ($prioridades as $p): ?>
                <option value="<?= $p['id_prioridade'] ?>" 
                  <?= ($filtros['fk_prioridade'] ?? '') == $p['id_prioridade'] ? 'selected' : '' ?>>
                  <?= htmlspecialchars($p['nome_prioridade']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-md-2">
            <label class="form-label small text-muted mb-1">Ordem / Busca</label>
            <input type="text" name="busca" class="form-control form-control-sm" 
                   placeholder="OP, descrição..." 
                   value="<?= htmlspecialchars($filtros['busca'] ?? '') ?>">
          </div>

          <div class="col-md-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary btn-sm">
              <i class="bi bi-funnel me-1"></i> Filtrar
            </button>
            <a href="?" class="btn btn-outline-secondary btn-sm">
              <i class="bi bi-x-lg me-1"></i> Limpar
            </a>
          </div>
        </form>
      </div>

      <!-- Tabela -->
      <div class="table-card">
        <div class="card-header-custom">
          <h5>
            <i class="bi bi-file-earmark-text me-2"></i>
            Ocorrências
          </h5>

          <div class="d-flex align-items-center gap-3">
            <span class="text-muted small">
              <?= count($ocorrencias) ?> registro<?= count($ocorrencias) !== 1 ? 's' : '' ?>
            </span>

            <a href="?<?= http_build_query(array_merge($filtros ?? [], ['export' => 'csv'])) ?>" 
               class="btn btn-success btn-sm no-print">
              <i class="bi bi-download me-1"></i> Exportar CSV
            </a>

            <button onclick="window.print()" class="btn btn-outline-secondary btn-sm no-print">
              <i class="bi bi-printer me-1"></i> Imprimir
            </button>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table custom-table mb-0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Ordem</th>
                <th>Brinquedo</th>
                <th>Colaborador</th>
                <th>Prioridade</th>
                <th>Status</th>
                <th>Setor</th>
                <th>Abertura</th>
                <th class="text-center no-print">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($ocorrencias)): ?>
                <tr>
                  <td colspan="9" class="text-center text-muted py-4">
                    Nenhum registro encontrado com os filtros aplicados.
                  </td>
                </tr>
              <?php else: ?>
                <?php foreach ($ocorrencias as $o): ?>
                  <?php
                    // Status badge
                    $statusClass = match(strtolower($o['status'] ?? '')) {
                      'aberta'        => 'badge-aberta',
                      'em andamento'  => 'badge-andamento',
                      'concluída', 'concluida' => 'badge-concluida',
                      'cancelada'     => 'badge-cancelada',
                      default         => 'badge-aberta'
                    };

                    // Prioridade badge
                    $prioClass = match(strtolower($o['prioridade'] ?? '')) {
                      'baixa'  => 'badge-baixa',
                      'média', 'media' => 'badge-media',
                      'alta'   => 'badge-alta',
                      default  => 'badge-baixa'
                    };
                  ?>
                  <tr>
                    <td><strong>#<?= $o['id_ocorrencia'] ?></strong></td>
                    <td>
                      <div class="fw-semibold"><?= htmlspecialchars($o['ordem_producao'] ?? '-') ?></div>
                      <div class="text-muted small" title="<?= htmlspecialchars($o['descricao_ocorrencia']) ?>">
                        <?= htmlspecialchars(mb_strimwidth($o['descricao_ocorrencia'], 0, 40, '...')) ?>
                      </div>
                    </td>
                    <td>
                      <div><?= htmlspecialchars($o['brinquedo']) ?></div>
                      <div class="text-muted small"><?= htmlspecialchars($o['codigo_brinquedo'] ?? '') ?></div>
                    </td>
                    <td><?= htmlspecialchars($o['colaborador']) ?></td>
                    <td>
                      <span class="badge-prioridade <?= $prioClass ?>">
                        <?= htmlspecialchars($o['prioridade']) ?>
                      </span>
                    </td>
                    <td>
                      <span class="badge-status <?= $statusClass ?>">
                        <?= htmlspecialchars($o['status']) ?>
                      </span>
                    </td>
                    <td>
                      <span class="setor-badge"><?= htmlspecialchars($o['setor'] ?? '-') ?></span>
                    </td>
                    <td>
                      <?= $o['data_abertura'] ? date('d/m/Y', strtotime($o['data_abertura'])) : '-' ?><br>
                      <span class="text-muted small">
                        <?= $o['data_abertura'] ? date('H:i', strtotime($o['data_abertura'])) : '' ?>
                      </span>
                    </td>
                    <td class="text-center no-print">
                      <a href="/dashboard/ocorrencias/detalhes/<?= $o['id_ocorrencia'] ?>" 
                         class="btn-view" title="Ver detalhes">
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