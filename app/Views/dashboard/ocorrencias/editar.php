<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Ocorrência #<?= htmlspecialchars($ocorrencia['id_ocorrencia']) ?> - Play Park</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- Tom Select -->
  <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">

  <style>
    :root {
      --sidebar-width: 260px;
      --sidebar-bg: #0f172a;
      --sidebar-hover: #1e293b;
      --primary: #4f46e5;
      --primary-hover: #4338ca;
      --primary-light: #818cf8;
      --success: #10b981;
      --warning: #f59e0b;
      --danger: #ef4444;
      --border-color: #e2e8f0;
      --text-muted: #64748b;
      --bg-body: #f8fafc;
      --card-shadow: 0 1px 3px rgba(0,0,0,0.04), 0 4px 12px rgba(0,0,0,0.03);
    }

    * {
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      box-sizing: border-box;
    }

    body {
      margin: 0;
      background-color: var(--bg-body);
      color: #1e293b;
      overflow-x: hidden;
    }

    /* ========== SIDEBAR (igual Dashboard) ========== */
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
      text-decoration: none;
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

    .sidebar-footer {
      padding: 1rem 0.75rem;
      border-top: 1px solid rgba(255,255,255,0.06);
    }

    /* ========== MAIN + TOPBAR (igual Dashboard) ========== */
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

    /* Notificação e User (igual Dashboard) */
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

    /* ========== EDIT CARD ========== */
    .edit-card {
      background: #fff;
      border: 1px solid var(--border-color);
      border-radius: 0.85rem;
      box-shadow: var(--card-shadow);
      overflow: hidden;
    }

    .edit-header {
      padding: 1.35rem 1.5rem;
      border-bottom: 1px solid var(--border-color);
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1rem;
    }

    .edit-header-left {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .btn-back {
      width: 38px;
      height: 38px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid var(--border-color);
      border-radius: 8px;
      background: white;
      color: #1e293b;
      text-decoration: none;
      transition: all 0.15s;
    }

    .btn-back:hover {
      background: #f1f5f9;
    }

    .edit-title h2 {
      margin: 0;
      font-size: 1.15rem;
      font-weight: 700;
    }

    .edit-title p {
      margin: 3px 0 0;
      color: var(--text-muted);
      font-size: 0.8rem;
    }

    .occurrence-id {
      background: #eef2ff;
      color: #4f46e5;
      padding: 0.45rem 0.75rem;
      border-radius: 8px;
      font-size: 0.8rem;
      font-weight: 600;
    }

    /* ========== FORM ========== */
    .form-body {
      padding: 1.5rem;
    }

    .section {
      margin-bottom: 2rem;
    }

    .section:last-child {
      margin-bottom: 0;
    }

    .section-header {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 1rem;
    }

    .section-number {
      width: 27px;
      height: 27px;
      border-radius: 50%;
      background: var(--primary);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.78rem;
      font-weight: 600;
    }

    .section-title {
      margin: 0;
      font-size: 0.95rem;
      font-weight: 600;
    }

    .form-label {
      font-size: 0.82rem;
      font-weight: 600;
      margin-bottom: 6px;
    }

    .form-control,
    .form-select {
      border: 1px solid var(--border-color);
      border-radius: 8px;
      min-height: 42px;
      font-size: 0.85rem;
      box-shadow: none;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(79,70,229,0.1);
    }

    textarea.form-control {
      min-height: 110px;
      resize: vertical;
    }

    .readonly {
      background: #f8fafc;
    }

    /* Prioridade */
    .priority-group {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }

    .priority-btn {
      padding: 0.55rem 1rem;
      border-radius: 8px;
      border: 1px solid;
      background: white;
      font-size: 0.8rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.15s;
    }

    .priority-btn.alta {
      border-color: #fecaca;
      color: #dc2626;
      background: #fef2f2;
    }

    .priority-btn.media {
      border-color: #fde68a;
      color: #d97706;
      background: #fffbeb;
    }

    .priority-btn.baixa {
      border-color: #a7f3d0;
      color: #059669;
      background: #ecfdf5;
    }

    .priority-btn.active {
      box-shadow: 0 0 0 2px rgba(79,70,229,0.25);
    }

    /* Info box */
    .info-box {
      background: #f8fafc;
      border: 1px solid var(--border-color);
      border-radius: 10px;
      padding: 1rem;
    }

    .info-item {
      display: flex;
      flex-direction: column;
      gap: 3px;
    }

    .info-label {
      font-size: 0.7rem;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.4px;
      font-weight: 600;
    }

    .info-value {
      font-size: 0.85rem;
      font-weight: 500;
      color: #1e293b;
    }

    /* Actions */
    .form-actions {
      border-top: 1px solid var(--border-color);
      padding: 1.2rem 1.5rem;
      display: flex;
      justify-content: space-between;
      gap: 10px;
      background: #fafafa;
    }

    .btn-cancel {
      border: 1px solid var(--border-color);
      background: white;
      color: #1e293b;
      border-radius: 8px;
      padding: 0.65rem 1rem;
      font-size: 0.85rem;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
    }

    .btn-cancel:hover {
      background: #f1f5f9;
      color: #1e293b;
    }

    .btn-save {
      border: none;
      background: var(--primary);
      color: white;
      border-radius: 8px;
      padding: 0.65rem 1.2rem;
      font-size: 0.85rem;
      font-weight: 600;
    }

    .btn-save:hover {
      background: var(--primary-hover);
      color: white;
    }

    /* Mobile */
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
      background: rgba(15, 23, 42, 0.5);
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
        padding: 1rem;
      }
    }

    @media (max-width: 576px) {
      .user-info {
        display: none;
      }
      .edit-header {
        flex-direction: column;
        align-items: flex-start;
      }
      .form-actions {
        flex-direction: column;
      }
      .btn-cancel,
      .btn-save {
        width: 100%;
        justify-content: center;
      }
    }
  </style>
</head>
<body>

  <!-- Overlay mobile -->
  <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

  <!-- ========== SIDEBAR (igual Dashboard) ========== -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <div class="logo-text">PLAY <span>PARK</span></div>
      <div class="logo-sub">Excelência Operacional</div>
    </div>

    <nav class="sidebar-nav">
      <div class="nav-section-label">Principal</div>

      <a href="/dashboard" class="nav-link">
        <i class="bi bi-house-door-fill"></i>
        <span>Dashboard</span>
      </a>

      <a href="/dashboard/ocorrencias" class="nav-link active">
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

    <!-- TOPBAR (igual Dashboard) -->
    <header class="topbar">
      <div class="d-flex align-items-center gap-3">
        <button class="sidebar-toggle" onclick="toggleSidebar()">
          <i class="bi bi-list"></i>
        </button>
        <div>
          <h1>Editar Ocorrência</h1>
          <p class="subtitle">Atualize as informações da ocorrência</p>
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

    <!-- CONTENT -->
    <main class="content-area">

      <div class="edit-card">

        <!-- HEADER DO CARD -->
        <div class="edit-header">
          <div class="edit-header-left">
            <a href="/dashboard/ocorrencias/detalhes/<?= urlencode($ocorrencia['id_ocorrencia']) ?>" class="btn-back" title="Voltar">
              <i class="bi bi-arrow-left"></i>
            </a>
            <div class="edit-title">
              <h2>Editar ocorrência</h2>
              <p>Altere os dados necessários abaixo.</p>
            </div>
          </div>
          <div class="occurrence-id">
            #<?= htmlspecialchars($ocorrencia['id_ocorrencia']) ?>
          </div>
        </div>

        <!-- FORM -->
        <form action="/dashboard/ocorrencias/editar/<?= htmlspecialchars($ocorrencia['id_ocorrencia']) ?>" method="POST">

          <div class="form-body">

            <!-- 1 - INFORMAÇÕES BÁSICAS -->
            <section class="section">
              <div class="section-header">
                <span class="section-number">1</span>
                <h3 class="section-title">Informações Básicas</h3>
              </div>

              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">Colaborador</label>
                  <select id="colaborador" name="colaborador" required>
                    <option value="">Carregando...</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label">Brinquedo</label>
                  <select id="brinquedo" name="brinquedo" required>
                    <option value="">Carregando...</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label">Ordem de Produção (OP)</label>
                  <input type="text" class="form-control" name="ordem_producao"
                         value="<?= htmlspecialchars($ocorrencia['ordem_producao']) ?>" required>
                </div>

                <div class="col-md-6">
                  <label class="form-label">Usuário responsável</label>
                  <input type="text" class="form-control readonly"
                         value="<?= htmlspecialchars($ocorrencia['usuario']) ?>" readonly>
                </div>
              </div>
            </section>

            <!-- 2 - PROBLEMA -->
            <section class="section">
              <div class="section-header">
                <span class="section-number">2</span>
                <h3 class="section-title">Detalhes do Problema</h3>
              </div>

              <div class="mb-3">
                <label class="form-label">Descrição da Ocorrência</label>
                <textarea class="form-control" name="descricao_ocorrencia" required><?= htmlspecialchars($ocorrencia['descricao_ocorrencia']) ?></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">Solução da Ocorrência</label>
                <textarea class="form-control" name="solucao_ocorrencia"><?= htmlspecialchars($ocorrencia['solucao_ocorrencia'] ?? '') ?></textarea>
              </div>
            </section>

            <!-- 3 - CLASSIFICAÇÃO -->
            <section class="section">
              <div class="section-header">
                <span class="section-number">3</span>
                <h3 class="section-title">Classificação</h3>
              </div>

              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">Prioridade</label>
                  <div class="priority-group">
                    <button type="button" class="priority-btn alta" data-value="3" onclick="selectPriority(this)">
                      <i class="bi bi-exclamation-circle"></i> Alta
                    </button>
                    <button type="button" class="priority-btn media" data-value="2" onclick="selectPriority(this)">
                      <i class="bi bi-exclamation-triangle"></i> Média
                    </button>
                    <button type="button" class="priority-btn baixa" data-value="1" onclick="selectPriority(this)">
                      <i class="bi bi-check-circle"></i> Baixa
                    </button>
                  </div>
                  <input type="hidden" name="prioridade" id="prioridade"
                         value="<?= htmlspecialchars($ocorrencia['fk_prioridade']) ?>">
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="status">Status</label>
                  <select class="form-select" id="status" name="status" required>
                    <option value="1" <?= $ocorrencia['fk_status'] == 1 ? 'selected' : '' ?>>Aberta</option>
                    <option value="2" <?= $ocorrencia['fk_status'] == 2 ? 'selected' : '' ?>>Em andamento</option>
                    <option value="3" <?= $ocorrencia['fk_status'] == 3 ? 'selected' : '' ?>>Concluída</option>
                  </select>
                </div>
              </div>
            </section>

            <!-- 4 - DATAS -->
            <section class="section">
              <div class="section-header">
                <span class="section-number">4</span>
                <h3 class="section-title">Informações do Registro</h3>
              </div>

              <div class="info-box">
                <div class="row g-4">
                  <div class="col-md-4">
                    <div class="info-item">
                      <span class="info-label">Data de abertura</span>
                      <span class="info-value">
                        <?= !empty($ocorrencia['data_abertura'])
                          ? date('d/m/Y H:i', strtotime($ocorrencia['data_abertura']))
                          : '-' ?>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="info-item">
                      <span class="info-label">Última atualização</span>
                      <span class="info-value">
                        <?= !empty($ocorrencia['data_atualizacao'])
                          ? date('d/m/Y H:i', strtotime($ocorrencia['data_atualizacao']))
                          : '-' ?>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="info-item">
                      <span class="info-label">Data de conclusão</span>
                      <span class="info-value">
                        <?= !empty($ocorrencia['data_conclusao'])
                          ? date('d/m/Y H:i', strtotime($ocorrencia['data_conclusao']))
                          : '-' ?>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="info-item">
                      <span class="info-label">Registro criado em</span>
                      <span class="info-value">
                        <?= !empty($ocorrencia['criado_em'])
                          ? date('d/m/Y H:i', strtotime($ocorrencia['criado_em']))
                          : '-' ?>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="info-item">
                      <span class="info-label">Registro atualizado em</span>
                      <span class="info-value">
                        <?= !empty($ocorrencia['atualizado_em'])
                          ? date('d/m/Y H:i', strtotime($ocorrencia['atualizado_em']))
                          : '-' ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </section>

          </div>

          <!-- ACTIONS -->
          <div class="form-actions">
            <div class="d-flex gap-2">

                <a href="/dashboard/ocorrencias/detalhes/<?= htmlspecialchars($ocorrencia['id_ocorrencia']) ?>" class="btn-cancel">
                    <i class="bi bi-x-lg me-1"></i>
                    Cancelar
                </a>

            </div>

            <button type="submit" class="btn-save">
                <i class="bi bi-check-lg me-1"></i>
                Salvar alterações
            </button>

        </div>
        </form>
      </div>

    </main>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>

  <script>
    // Sidebar toggle (igual Dashboard)
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('show');
      document.getElementById('sidebarOverlay').classList.toggle('show');
    }

    // Prioridade
    function selectPriority(button) {
      document.querySelectorAll('.priority-btn').forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');
      document.getElementById('prioridade').value = button.dataset.value;
    }

    // Marca prioridade atual
    const prioridadeAtual = document.getElementById('prioridade').value;
    document.querySelectorAll('.priority-btn').forEach(button => {
      if (button.dataset.value === prioridadeAtual) {
        button.classList.add('active');
      }
    });

    // Colaboradores (Tom Select)
    fetch('/api/colaboradores')
      .then(response => response.json())
      .then(colaboradores => {
        const select = new TomSelect('#colaborador', {
          options: colaboradores,
          valueField: 'id_colaborador',
          labelField: 'nome_colaborador',
          searchField: 'nome_colaborador',
          placeholder: 'Digite o nome do colaborador...'
        });
        select.setValue('<?= htmlspecialchars($ocorrencia['fk_colaborador']) ?>');
      })
      .catch(error => console.error('Erro ao carregar colaboradores:', error));

    // Brinquedos (Tom Select)
    fetch('/api/brinquedos')
      .then(response => response.json())
      .then(brinquedos => {
        const select = new TomSelect('#brinquedo', {
          options: brinquedos,
          valueField: 'id_brinquedo',
          labelField: 'nome_brinquedo',
          searchField: 'nome_brinquedo',
          placeholder: 'Digite o nome do brinquedo...'
        });
        select.setValue('<?= htmlspecialchars($ocorrencia['fk_brinquedo']) ?>');
      })
      .catch(error => console.error('Erro ao carregar brinquedos:', error));
  </script>
</body>
</html>