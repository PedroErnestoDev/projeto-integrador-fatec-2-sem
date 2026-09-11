<?php
/**
 * Topbar Component
 *
 * Uso:
 * $topbarProps = [
 *     'title'        => 'Dashboard',
 *     'subtitle'     => 'Visão geral das Ocorrências',
 *     'userName'     => 'Administrador',
 *     'userRole'     => 'Gerência',
 *     'userInitials' => 'AG',
 * ];
 * require_once __DIR__ . '/../components/topbar.php';
 */

$title        = $topbarProps['title']        ?? 'Título';
$subtitle     = $topbarProps['subtitle']     ?? '';
$userName     = $topbarProps['userName']     ?? 'Usuário';
$userRole     = $topbarProps['userRole']     ?? '';
$userInitials = $topbarProps['userInitials'] ?? 'U';
?>

<style>
/* =====================================================
   TOPBAR - Component CSS
===================================================== */
.topbar {
    background: #fff;
    border-bottom: 1px solid #e2e8f0;
    padding: .85rem 1.75rem;
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
    font-size: .8rem;
    color: #64748b;
    margin: 0;
}

.user-dropdown {
    display: flex;
    align-items: center;
    gap: .6rem;
    padding: .35rem .6rem .35rem .35rem;
    border: 1px solid #e2e8f0;
    border-radius: .55rem;
    background: #fff;
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
    font-size: .85rem;
}

.user-info {
    line-height: 1.2;
}

.user-info .name {
    font-size: .8rem;
    font-weight: 600;
    color: #0f172a;
}

.user-info .role {
    font-size: .7rem;
    color: #64748b;
}

.logout-button{
    background-color: red; 
    color: white;
}

.logout-button:hover{
    background-color: rgb(142, 48, 48);
    color: white;
}

@media (max-width: 575.98px) {
    .topbar {
        padding: .8rem 1rem;
    }
}
</style>

<!-- TOPBAR -->
<header class="topbar">

    <div class="d-flex align-items-center gap-3">
        <button class="sidebar-toggle" onclick="toggleSidebar()">
            <i class="bi bi-list"></i>
        </button>

        <div>
            <h1><?= htmlspecialchars($title) ?></h1>
            <?php if (!empty($subtitle)): ?>
                <p class="subtitle"><?= htmlspecialchars($subtitle) ?></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="sidebar-footer">
        <form action="/logout" method="POST">
            <button type="submit" class="logout-button">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
            </button>
        </form>
    </div>

</header>