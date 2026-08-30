<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Play Park | Dashboard Operacional</title>
  
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

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

    /* ========== SIDEBAR ========== */
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
      border-bottom: 1px solid rgba(255,255,255,0.06);
    }

    .sidebar-brand .logo-text {
      font-size: 1.35rem;
      font-weight: 700;
      letter-spacing: -0.5px;
      color: #fff;
      line-height: 1.2;
    }

    .sidebar-brand .logo-text span {
      background: linear-gradient(135deg, #6366f1, #22d3ee);
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
      padding: 0.75rem 0.75rem 0.4rem;
    }

    .sidebar .nav-link {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.65rem 0.85rem;
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
      background: linear-gradient(135deg, #4f46e5, #6366f1);
      color: #fff;
      box-shadow: 0 4px 12px rgba(79, 70, 229, 0.35);
    }

    .sidebar .nav-link i {
      font-size: 1.15rem;
      width: 1.35rem;
      text-align: center;
    }

    .sidebar .submenu {
      padding-left: 2.5rem;
      margin-top: 2px;
    }

    .sidebar .submenu .nav-link {
      font-size: 0.85rem;
      padding: 0.45rem 0.75rem;
      color: #64748b;
    }

    .sidebar .submenu .nav-link:hover,
    .sidebar .submenu .nav-link.active {
      color: #c7d2fe;
      background: transparent;
      box-shadow: none;
    }

    .sidebar-footer {
      padding: 1rem 0.75rem;
      border-top: 1px solid rgba(255,255,255,0.06);
    }

    /* ========== MAIN CONTENT ========== */
    .main-content {
      margin-left: var(--sidebar-width);
      min-height: 100vh;
      padding: 0;
    }

    .topbar {
      background: #fff;
      border-bottom: 1px solid var(--border-color);
      padding: 0.85rem 1.75rem;
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

    .content-area {
      padding: 1.5rem 1.75rem 2.5rem;
    }

    /* ========== STAT CARDS ========== */
    .stat-card {
      background: #fff;
      border-radius: 0.85rem;
      border: 1px solid var(--border-color);
      box-shadow: var(--card-shadow);
      padding: 1.25rem 1.35rem;
      height: 100%;
      transition: all 0.2s ease;
      position: relative;
      overflow: hidden;
    }

    .stat-card:hover {
      box-shadow: var(--card-shadow-hover);
      transform: translateY(-2px);
    }

    .stat-card .stat-icon {
      width: 42px;
      height: 42px;
      border-radius: 0.65rem;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
      color: #fff;
      flex-shrink: 0;
    }

    .stat-card .stat-value {
      font-size: 1.75rem;
      font-weight: 700;
      line-height: 1.1;
      color: #0f172a;
    }

    .stat-card .stat-label {
      font-size: 0.8rem;
      font-weight: 500;
      color: var(--text-muted);
      margin-bottom: 0.15rem;
    }

    .stat-card .stat-trend {
      font-size: 0.75rem;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 0.25rem;
      margin-top: 0.5rem;
    }

    .stat-trend.up { color: var(--success); }
    .stat-trend.down { color: var(--danger); }

    .icon-purple { background: linear-gradient(135deg, #7c3aed, #a78bfa); }
    .icon-orange { background: linear-gradient(135deg, #f59e0b, #fbbf24); }
    .icon-green  { background: linear-gradient(135deg, #059669, #34d399); }
    .icon-blue   { background: linear-gradient(135deg, #2563eb, #60a5fa); }

    /* ========== CHART CARDS ========== */
    .chart-card {
      background: #fff;
      border-radius: 0.85rem;
      border: 1px solid var(--border-color);
      box-shadow: var(--card-shadow);
      padding: 1.25rem 1.35rem;
      height: 100%;
    }

    .chart-card .card-title {
      font-size: 0.95rem;
      font-weight: 600;
      color: #0f172a;
      margin-bottom: 1rem;
    }

    .legend-item {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.8rem;
      color: #475569;
      margin-bottom: 0.35rem;
    }

    .legend-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      flex-shrink: 0;
    }

    /* ========== TABLE ========== */
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

    .table-filters {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      align-items: center;
    }

    .table-filters .form-select,
    .table-filters .form-control {
      font-size: 0.8rem;
      border-radius: 0.5rem;
      border-color: var(--border-color);
      height: 34px;
    }

    .table-filters .form-control {
      min-width: 220px;
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
      padding: 0.85rem 1rem;
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

    .badge-prio {
      font-size: 0.72rem;
      font-weight: 600;
      padding: 0.3rem 0.65rem;
      border-radius: 999px;
    }

    .prio-alta  { background: #fee2e2; color: #b91c1c; }
    .prio-media { background: #fef3c7; color: #b45309; }
    .prio-baixa { background: #d1fae5; color: #047857; }

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

    .table-footer {
      padding: 1rem 1.35rem;
      border-top: 1px solid var(--border-color);
      text-align: center;
    }

    /* ========== NOTIFICATION BADGE ========== */
    .notif-btn {
      position: relative;
      width: 40px;
      height: 40px;
      border-radius: 0.55rem;
      border: 1px solid var(--border-color);
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
      padding: 0.2rem 0.4rem;
    }

    .user-dropdown {
      display: flex;
      align-items: center;
      gap: 0.6rem;
      padding: 0.35rem 0.6rem 0.35rem 0.35rem;
      border-radius: 0.55rem;
      border: 1px solid var(--border-color);
      background: #fff;
      cursor: pointer;
      transition: all 0.15s;
    }

    .user-dropdown:hover {
      background: #f8fafc;
    }

    .user-avatar {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: linear-gradient(135deg, #4f46e5, #818cf8);
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

    /* ========== MOBILE ========== */
    .sidebar-toggle {
      display: none;
      background: none;
      border: none;
      font-size: 1.4rem;
      color: #334155;
      padding: 0.25rem;
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
      .sidebar-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.5);
        z-index: 1035;
      }
      .sidebar-overlay.show {
        display: block;
      }
    }

    /* Chart container heights */
    .chart-container {
      position: relative;
      height: 220px;
    }

    .chart-container-sm {
      position: relative;
      height: 200px;
    }
  </style>
</head>
<body>

  <!-- Overlay for mobile -->
  <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

  <!-- ========== SIDEBAR ========== -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <div class="logo-text">PLAY <span>PARK</span></div>
      <div class="logo-sub">Excelência Operacional</div>
    </div>

    <nav class="sidebar-nav">
      <div class="nav-section-label">Principal</div>
      <a href="#" class="nav-link active">
        <i class="bi bi-house-door-fill"></i>
        <span>Dashboard</span>
      </a>

      <!--<a href="#OcorrenciasSubmenu" class="nav-link" data-bs-toggle="collapse" aria-expanded="true">
        <i class="bi bi-file-earmark-text"></i>
        <span>Ocorrencias</span>
        <i class="bi bi-chevron-down ms-auto" style="font-size:0.75rem;"></i>
      </a>
      <div class="collapse" id="OcorrenciasSubmenu">
        <div class="submenu">
          <a href="#" class="nav-link">Abertas</a>
          <a href="#" class="nav-link">Em andamento</a>
          <a href="#" class="nav-link">Concluídas</a>
          <a href="#" class="nav-link">Todas</a>
        </div>
      </div>-->

      <a href="/dashboard/ocorrencias" class="nav-link">
        <i class="bi bi-file-earmark-text"></i>
        <span>Ocorrências</span>
      </a>

      <a href="/dashboard/ocorrencias/criar" class="nav-link">
        <i class="bi bi-plus-square"></i>
        <span>Nova Ocorrência</span>
      </a>

      <div class="nav-section-label mt-3">Cadastros</div>
      <a href="#" class="nav-link">
        <i class="bi bi-controller"></i>
        <span>Brinquedos</span>
      </a>
      <a href="#" class="nav-link">
        <i class="bi bi-person-badge"></i>
        <span>Colaboradores</span>
      </a>
      <a href="#" class="nav-link">
        <i class="bi bi-building"></i>
        <span>Setores</span>
      </a>
      <a href="#" class="nav-link">
        <i class="bi bi-people"></i>
        <span>Usuários</span>
      </a>

      <div class="nav-section-label mt-3">Sistema</div>
      <a href="#" class="nav-link">
        <i class="bi bi-bar-chart-line"></i>
        <span>Relatórios</span>
      </a>
      <a href="#" class="nav-link">
        <i class="bi bi-gear"></i>
        <span>Configurações</span>
      </a>
    </nav>

    <div class="sidebar-footer">
      <a href="#" class="nav-link text-danger">
        <i class="bi bi-box-arrow-right"></i>
        <span>Sair</span>
      </a>
    </div>
  </aside>

  <!-- ========== MAIN ========== -->
  <div class="main-content">
    <!-- Topbar -->
    <header class="topbar">
      <div class="d-flex align-items-center gap-3">
        <button class="sidebar-toggle" onclick="toggleSidebar()">
          <i class="bi bi-list"></i>
        </button>
        <div>
          <h1>Dashboard</h1>
          <p class="subtitle">Visão geral das Ocorrências</p>
        </div>
      </div>

      <div class="d-flex align-items-center gap-2">
        <button class="notif-btn" title="Notificações">
          <i class="bi bi-bell"></i>
          <span class="badge bg-danger rounded-pill">3</span>
        </button>

        <div class="dropdown">
          <div class="user-dropdown" data-bs-toggle="dropdown">
            <div class="user-avatar">AG</div>
            <div class="user-info d-none d-sm-block">
              <div class="name">Administrador</div>
              <div class="role">Gerência</div>
            </div>
            <i class="bi bi-chevron-down text-muted" style="font-size:0.7rem;"></i>
          </div>
          <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" style="min-width:180px;">
            <li><a class="dropdown-item small" href="#"><i class="bi bi-person me-2"></i>Meu Perfil</a></li>
            <li><a class="dropdown-item small" href="#"><i class="bi bi-gear me-2"></i>Configurações</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item small text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i>Sair</a></li>
          </ul>
        </div>
      </div>
    </header>

    <!-- Content -->
    <div class="content-area">

      <!-- Stat Cards -->
      <div class="row g-3 mb-4">
        <div class="col-6 col-xl-3">
          <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between">
              <div>
                <div class="stat-label">Ocorrências Abertas</div>
                <div class="stat-value"><?= $estatisticas['abertas']?></div>
              </div>
              <div class="stat-icon icon-purple">
                <i class="bi bi-clipboard"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-xl-3">
          <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between">
              <div>
                <div class="stat-label">Em Andamento</div>
                <div class="stat-value"><?=$estatisticas['andamento'] ?></div>
              </div>
              <div class="stat-icon icon-orange">
                <i class="bi bi-clock-history"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-xl-3">
          <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between">
              <div>
                <div class="stat-label">Concluídas</div>
                <div class="stat-value"><?=$estatisticas['concluidas'] ?></div>
              </div>
              <div class="stat-icon icon-green">
                <i class="bi bi-check2-circle"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-xl-3">
          <div class="stat-card">
            <div class="d-flex align-items-start justify-content-between">
              <div>
                <div class="stat-label">Total de Ocorrências</div>
                <div class="stat-value"><?= $estatisticas['total']?></div>
              </div>
              <div class="stat-icon icon-blue">
                <i class="bi bi-bar-chart-fill"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Charts Row -->
      <div class="row g-3 mb-4">
        <!-- Donut -->
        <div class="col-lg-4">
          <div class="chart-card">
            <h6 class="card-title">Ocorrências por Status</h6>
            <div class="d-flex align-items-center gap-3">
              <div class="chart-container flex-shrink-0" style="width:160px; height:160px;">
                <canvas id="statusChart"></canvas>
              </div>
              <div class="flex-grow-1">
                <div class="legend-item">
                  <span class="legend-dot" style="background:#3b82f6;"></span>
                  <span>Abertas <strong><?= $estatisticas['abertas']?></strong> <span class="text-muted"></span></span>
                </div>
                <div class="legend-item">
                  <span class="legend-dot" style="background:#f59e0b;"></span>
                  <span>Em andamento <strong><?=$estatisticas['andamento'] ?></strong> <span class="text-muted"></span></span>
                </div>
                <div class="legend-item">
                  <span class="legend-dot" style="background:#10b981;"></span>
                  <span>Concluídas <strong><?=$estatisticas['concluidas'] ?></strong> <span class="text-muted"></span></span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Bar - Setor -->
        <div class="col-lg-4">
          <div class="chart-card">
            <h6 class="card-title">Ocorrências por Prioridade</h6>
            <div class="chart-container">
              <canvas id="setorChart"></canvas>
            </div>
          </div>
        </div>

        <!-- Horizontal Bar - Brinquedo -->
        <div class="col-lg-4">
          <div class="chart-card">
            <h6 class="card-title">Ocorrências por Brinquedo (Top 5)</h6>
            <div class="chart-container">
              <canvas id="brinquedoChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Table -->
      <div class="table-card">
        <div class="card-header-custom">
          <h5>Ocorrências Recentes</h5>
        </div>

        <div class="table-responsive">
          <table class="table custom-table mb-0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Data/Hora</th>
                <th>Brinquedo</th>
                <th>Colaborador</th>
                <th>Setor Atual</th>
                <th>Prioridade</th>
                <th>Status</th>
                <th class="text-center">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($ocorrencias as $ocorrencia): ?>
                  <tr>
                      <td>
                          <strong>
                              #<?= htmlspecialchars($ocorrencia['id_ocorrencia']) ?>
                          </strong>
                      </td>

                      <td>
                          <?= date('d/m/Y H:i', strtotime($ocorrencia['criado_em'])) ?>
                      </td>

                      <td>
                          <?= htmlspecialchars($ocorrencia['brinquedo']) ?>
                      </td>

                      <td>
                          <?= htmlspecialchars($ocorrencia['colaborador']) ?>
                      </td>

                      <td>
                          <?= htmlspecialchars($ocorrencia['setor'] ?? '-') ?>
                      </td>

                      <td>
                          <?= htmlspecialchars($ocorrencia['prioridade']) ?>
                      </td>

                      <td>
                          <?= htmlspecialchars($ocorrencia['status']) ?>
                      </td>

                      <td class="text-center">
                          <a
                              href="/dashboard/ocorrencias/detalhes/<?= $ocorrencia['id_ocorrencia'] ?>"
                              class="btn-view"
                              title="Visualizar"
                          >
                              <i class="bi bi-eye"></i>
                          </a>
                      </td>
                  </tr>
              <?php endforeach; ?>
          </tbody>
          </table>
        </div>

        <div class="table-footer">
          <a href="/dashboard/ocorrencias" class="btn btn-outline-primary btn-sm px-4">
            Ver todas as Ocorrências <i class="bi bi-arrow-right ms-1"></i>
          </a>
        </div>
      </div>

    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const topBrinquedos = <?= json_encode(
    $topBrinquedos ?? [],
    JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
    ) ?>;

    const brinquedoLabels = topBrinquedos.map(item => item.brinquedo);
    const brinquedoValores = topBrinquedos.map(item => Number(item.total));
  </script>
  <script>
    // Sidebar toggle (mobile)
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('show');
      document.getElementById('sidebarOverlay').classList.toggle('show');
    }

    // ========== CHARTS ==========
    Chart.defaults.font.family = "'Inter', system-ui, sans-serif";
    Chart.defaults.font.size = 12;
    Chart.defaults.color = '#64748b';

    // Donut - Status
    new Chart(document.getElementById('statusChart'), {
      type: 'doughnut',
      data: {
        labels: ['Abertas', 'Em andamento', 'Concluídas'],
        datasets: [{
          data: [<?= $estatisticas['abertas']?>, <?= $estatisticas['andamento']?>, <?= $estatisticas['concluidas']?>],
          backgroundColor: ['#3b82f6', '#f59e0b', '#10b981'],
          borderWidth: 0,
          hoverOffset: 6
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '72%',
        plugins: {
          legend: { display: false },
          tooltip: {
            callbacks: {
              label: ctx => ` ${ctx.label}: ${ctx.raw} (${((ctx.raw/108)*100).toFixed(1)}%)`
            }
          }
        }
      }
    });

    // Bar - Prioridade
    new Chart(document.getElementById('setorChart'), {
      type: 'bar',
      data: {
        labels: ['Alta', 'Média', 'Baixa'],
        datasets: [{
          data: [<?= $estatisticaPrioridade['alta']?>, <?= $estatisticaPrioridade['media']?>, <?= $estatisticaPrioridade['baixa']?>],
          backgroundColor: ['#f33737', '#f59e0b', '#10b981'],
          borderRadius: 0,
          borderSkipped: false,
          barPercentage: 0.90
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false },
          tooltip: {
            callbacks: {
              label: ctx => ` ${ctx.raw} Ocorrencias`
            }
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            max: 50,
            grid: { color: '#f1f5f9' },
            ticks: { stepSize: 15 }
          },
          x: {
            grid: { display: false }
          }
        }
      }
    });
    
    new Chart(document.getElementById('brinquedoChart'), {
    type: 'bar',

    data: {
        labels: brinquedoLabels,

        datasets: [{
            label: 'Ocorrências',

            data: brinquedoValores,

            backgroundColor: [
                '#3b82f6',
                '#f59e0b',
                '#10b981',
                '#8b5cf6',
                '#ef4444'
            ],

            borderRadius: 0,
            borderSkipped: false,
            barPercentage: 0.7
        }]
    },

    options: {
        indexAxis: 'y',

        responsive: true,
        maintainAspectRatio: false,

        plugins: {
            legend: {
                display: false
            },

            tooltip: {
                callbacks: {
                    label: ctx => ` ${ctx.raw} Ocorrências`
                }
            }
        },

        scales: {
            x: {
                beginAtZero: true,

                grid: {
                    color: '#f1f5f9'
                },

                ticks: {
                    stepSize: 1
                }
            },

            y: {
                grid: {
                    display: false
                }
            }
        }
    }
});
    
  </script>
</body>
</html>