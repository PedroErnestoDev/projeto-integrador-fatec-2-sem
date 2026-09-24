<?php
/**
 * Sidebar Component
 *
 * Uso:
 * $sidebarProps = ['active' => 'dashboard'];
 * require_once __DIR__ . '/../components/sidebar.php';
 */

$active = $sidebarProps['active'] ?? 'dashboard';
?>

<style>
/* =====================================================
   SIDEBAR - Component CSS
===================================================== */
:root {
    --sidebar-width: 260px;
    --sidebar-bg: #0f172a;
    --sidebar-hover: #1e293b;
    --primary: #4f46e5;
}

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
    transition: transform .3s ease;
}

.sidebar-brand {
    padding: 1.5rem 1.25rem;
    border-bottom: 1px solid rgba(255,255,255,.06);
}

.sidebar-brand .logo-text {
    font-size: 1.35rem;
    font-weight: 700;
    letter-spacing: -.5px;
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
    font-size: .65rem;
    font-weight: 500;
    letter-spacing: 1.5px;
    color: #94a3b8;
    text-transform: uppercase;
    margin-top: 2px;
}

.sidebar-nav {
    flex: 1;
    padding: 1rem .75rem;
    overflow-y: auto;
}

.nav-section-label {
    font-size: .65rem;
    font-weight: 600;
    letter-spacing: 1.2px;
    color: #64748b;
    text-transform: uppercase;
    padding: .75rem .75rem .4rem;
}

.sidebar .nav-link {
    display: flex;
    align-items: center;
    gap: .75rem;
    padding: .65rem .85rem;
    color: #94a3b8;
    border-radius: .5rem;
    font-size: .9rem;
    font-weight: 500;
    margin-bottom: 2px;
    transition: all .15s ease;
    text-decoration: none;
}

.sidebar .nav-link:hover {
    background: var(--sidebar-hover);
    color: #e2e8f0;
}

.sidebar .nav-link.active {
    background: linear-gradient(135deg, #4f46e5, #6366f1);
    color: #fff;
    box-shadow: 0 4px 12px rgba(79,70,229,.35);
}

.sidebar .nav-link i {
    font-size: 1.15rem;
    width: 1.35rem;
    text-align: center;
}

.sidebar-footer {
    padding: 1rem .75rem;
    border-top: 1px solid rgba(255,255,255,.06);
}

.sidebar-toggle {
    display: none;
    background: none;
    border: none;
    font-size: 1.4rem;
    color: #334155;
    padding: .25rem;
}

.sidebar-overlay {
    display: none;
}

.logout-button {
    width: 100%;
    display: flex;
    align-items: center;
    gap: .75rem;
    padding: .65rem .85rem;

    background: transparent;
    border: 1px solid rgba(239, 68, 68, .25);
    border-radius: .5rem;

    color: #f87171;
    font-size: .9rem;
    font-weight: 500;

    transition: all .15s ease;
    cursor: pointer;
}

.logout-button:hover {
    background: rgba(239, 68, 68, .1);
    border-color: rgba(239, 68, 68, .4);
    color: #fca5a5;
}

.logout-button i {
    font-size: 1.15rem;
    width: 1.35rem;
    text-align: center;
}

@media (max-width: 991.98px) {
    .sidebar {
        transform: translateX(-100%);
    }
    .sidebar.show {
        transform: translateX(0);
    }
    .sidebar-toggle {
        display: block;
    }
    .sidebar-overlay {
        position: fixed;
        inset: 0;
        background: rgba(15,23,42,.5);
        z-index: 1035;
    }
    .sidebar-overlay.show {
        display: block;
    }
}
</style>

<!-- MOBILE OVERLAY -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">

    <div class="sidebar-brand">
        <div class="logo-text">
            <img src="/assets/logo-play-park.png" alt="" style="height: 100%; width: 100%;">
        </div>
    </div>

    <nav class="sidebar-nav">

        <div class="nav-section-label">Principal</div>

        <a href="/dashboard" class="nav-link <?= $active === 'dashboard' ? 'active' : '' ?>">
            <i class="bi bi-house-door-fill"></i>
            <span>Dashboard</span>
        </a>

        <a href="/dashboard/ocorrencias" class="nav-link <?= $active === 'ocorrencias' ? 'active' : '' ?>">
            <i class="bi bi-file-earmark-text"></i>
            <span>Ocorrências</span>
        </a>

        <a href="/dashboard/ocorrencias/criar" class="nav-link <?= $active === 'nova-ocorrencia' ? 'active' : '' ?>">
            <i class="bi bi-plus-square"></i>
            <span>Nova Ocorrência</span>
        </a>

        <div class="nav-section-label mt-3">Cadastros</div>

        <a href="/dashboard/brinquedos" class="nav-link <?= $active === 'brinquedos' ? 'active' : '' ?>">
            <i class="bi bi-controller"></i>
            <span>Brinquedos</span>
        </a>

        <a href="/dashboard/colaboradores" class="nav-link <?= $active === 'colaboradores' ? 'active' : '' ?>">
            <i class="bi bi-person-badge"></i>
            <span>Colaboradores</span>
        </a>

        <a href="/dashboard/setores" class="nav-link <?= $active === 'setores' ? 'active' : '' ?>">
            <i class="bi bi-building"></i>
            <span>Setores</span>
        </a>

        <a href="/dashboard/usuarios" class="nav-link <?= $active === 'usuarios' ? 'active' : '' ?>">
            <i class="bi bi-people"></i>
            <span>Usuários</span>
        </a>

        <div class="nav-section-label mt-3">Sistema</div>

        <a href="/dashboard/relatorios" class="nav-link <?= $active === 'relatorios' ? 'active' : '' ?>">
            <i class="bi bi-bar-chart-line"></i>
            <span>Relatórios</span>
        </a>

        <a href="#" class="nav-link <?= $active === 'configuracoes' ? 'active' : '' ?>">
            <i class="bi bi-gear"></i>
            <span>Configurações</span>
        </a>
    </nav>
</aside>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    if (sidebar) sidebar.classList.toggle('show');
    if (overlay) overlay.classList.toggle('show');
}
</script>