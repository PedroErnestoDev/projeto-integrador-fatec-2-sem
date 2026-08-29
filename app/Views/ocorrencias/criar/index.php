<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nova Ocorrência - Play Park</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
  <style>
    :root {
      --pp-purple: #5B4BDB;
      --pp-purple-hover: #4A3BC7;
      --pp-purple-light: #EEF0FF;
      --pp-border: #E5E7EB;
      --pp-text: #1F2937;
      --pp-muted: #6B7280;
      --pp-alta-bg: #FEE2E2;
      --pp-alta-text: #DC2626;
      --pp-alta-border: #FECACA;
      --pp-media-bg: #FEF3C7;
      --pp-media-text: #D97706;
      --pp-media-border: #FDE68A;
      --pp-baixa-bg: #D1FAE5;
      --pp-baixa-text: #059669;
      --pp-baixa-border: #A7F3D0;
    }

    body {
      background-color: #F8FAFC;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
      color: var(--pp-text);
      margin: 0;
      padding: 0;
    }

    .form-container {
      max-width: 920px;
      margin: 0 auto;
      padding: 24px 32px 40px;
      background: #FFFFFF;
      min-height: 100vh;
    }

    /* Header */
    .form-header {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      margin-bottom: 32px;
      padding-bottom: 8px;
    }

    .header-left {
      display: flex;
      align-items: flex-start;
      gap: 12px;
    }

    .btn-back {
      width: 36px;
      height: 36px;
      border-radius: 8px;
      border: 1px solid var(--pp-border);
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--pp-text);
      text-decoration: none;
      flex-shrink: 0;
      margin-top: 2px;
      transition: background 0.15s;
    }

    .btn-back:hover {
      background: #F3F4F6;
      color: var(--pp-text);
    }

    .header-title h1 {
      font-size: 1.375rem;
      font-weight: 600;
      margin: 0 0 4px 0;
      color: var(--pp-text);
      line-height: 1.3;
    }

    .header-title p {
      font-size: 0.875rem;
      color: var(--pp-muted);
      margin: 0;
      line-height: 1.4;
    }

    .ilha-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: var(--pp-purple-light);
      border: 1px solid #D4D8FF;
      border-radius: 10px;
      padding: 8px 14px;
      font-size: 0.8125rem;
      color: var(--pp-purple);
      font-weight: 500;
      white-space: nowrap;
    }

    .ilha-badge .ilha-label {
      font-size: 0.75rem;
      color: #7C85C9;
      font-weight: 400;
      display: block;
      line-height: 1.2;
    }

    .ilha-badge .ilha-value {
      font-weight: 600;
      color: var(--pp-purple);
      line-height: 1.2;
    }

    .ilha-badge i {
      font-size: 1.25rem;
      color: var(--pp-purple);
    }

    /* Sections */
    .section {
      margin-bottom: 28px;
    }

    .section-header {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 18px;
    }

    .section-number {
      width: 26px;
      height: 26px;
      border-radius: 50%;
      background: var(--pp-purple);
      color: #fff;
      font-size: 0.8125rem;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .section-title {
      font-size: 1rem;
      font-weight: 600;
      color: var(--pp-text);
      margin: 0;
    }

    /* Form controls */
    .form-label {
      font-size: 0.875rem;
      font-weight: 500;
      color: var(--pp-text);
      margin-bottom: 6px;
    }

    .form-label .required {
      color: #EF4444;
    }

    .form-control,
    .form-select {
      border: 1px solid var(--pp-border);
      border-radius: 8px;
      padding: 10px 14px;
      font-size: 0.875rem;
      color: var(--pp-text);
      background-color: #fff;
      box-shadow: none;
      height: auto;
      min-height: 42px;
    }

    .form-control::placeholder,
    .form-select {
      color: #9CA3AF;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: var(--pp-purple);
      box-shadow: 0 0 0 3px rgba(91, 75, 219, 0.12);
    }

    .form-text {
      font-size: 0.75rem;
      color: var(--pp-muted);
      margin-top: 4px;
    }

    textarea.form-control {
      min-height: 100px;
      resize: vertical;
    }

    /* Priority buttons */
    .priority-group {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .priority-btn {
      flex: 1;
      min-width: 100px;
      max-width: 140px;
      padding: 10px 16px;
      border-radius: 8px;
      border: 1.5px solid;
      font-size: 0.875rem;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      cursor: pointer;
      transition: all 0.15s;
      background: #fff;
      text-decoration: none;
    }

    .priority-btn.alta {
      background: var(--pp-alta-bg);
      border-color: var(--pp-alta-border);
      color: var(--pp-alta-text);
    }

    .priority-btn.alta:hover,
    .priority-btn.alta.active {
      background: #FECACA;
      border-color: #F87171;
      color: #B91C1C;
    }

    .priority-btn.media {
      background: var(--pp-media-bg);
      border-color: var(--pp-media-border);
      color: var(--pp-media-text);
    }

    .priority-btn.media:hover,
    .priority-btn.media.active {
      background: #FDE68A;
      border-color: #FBBF24;
      color: #B45309;
    }

    .priority-btn.baixa {
      background: var(--pp-baixa-bg);
      border-color: var(--pp-baixa-border);
      color: var(--pp-baixa-text);
    }

    .priority-btn.baixa:hover,
    .priority-btn.baixa.active {
      background: #A7F3D0;
      border-color: #34D399;
      color: #047857;
    }

    .priority-btn i {
      font-size: 1rem;
    }

    /* Footer buttons */
    .form-actions {
      display: flex;
      gap: 12px;
      margin-top: 32px;
      padding-top: 8px;
    }

    .btn-cancel {
      flex: 1;
      max-width: 280px;
      padding: 12px 24px;
      border-radius: 10px;
      border: 1.5px solid var(--pp-border);
      background: #fff;
      color: var(--pp-text);
      font-size: 0.9375rem;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      transition: background 0.15s;
    }

    .btn-cancel:hover {
      background: #F9FAFB;
      border-color: #D1D5DB;
      color: var(--pp-text);
    }

    .btn-submit {
      flex: 2;
      padding: 12px 24px;
      border-radius: 10px;
      border: none;
      background: var(--pp-purple);
      color: #fff;
      font-size: 0.9375rem;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      transition: background 0.15s;
    }

    .btn-submit:hover {
      background: var(--pp-purple-hover);
      color: #fff;
    }

    .submit-hint {
      font-size: 0.75rem;
      color: var(--pp-muted);
      text-align: right;
      margin-top: 10px;
    }

    /* Grid adjustments */
    .row.g-3 > [class*="col-"] {
      margin-bottom: 0;
    }

    @media (max-width: 767.98px) {
      .form-container {
        padding: 16px 16px 32px;
      }

      .form-header {
        flex-direction: column;
        gap: 16px;
      }

      .ilha-badge {
        align-self: flex-start;
      }

      .priority-btn {
        max-width: none;
      }

      .form-actions {
        flex-direction: column;
      }

      .btn-cancel {
        max-width: none;
        order: 2;
      }

      .btn-submit {
        order: 1;
      }
    }
  </style>
</head>
<body>
  <div class="form-container">
    <!-- Header -->
    <div class="form-header">
      <div class="header-left">
        <div class="header-title">
          <h1>Nova Ocorrência</h1>
          <p>Preencha as informações abaixo para registrar o problema encontrado.</p>
        </div>
      </div>
    </div>

    <div id="alert-container"></div>

    <form id="formOcorrencia" action="/ocorrencias/criar" method="POST">
      <div class="section">
        <div class="section-header">
          <span class="section-number">1</span>
          <h2 class="section-title">Informações Básicas</h2>
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <label for="costureira" class="form-label">Nome do Colaborador <span class="required">*</span></label>
           <select id="colaborador" name="colaborador" required>
              <option value="">Selecione um colaborador...</option>
            </select>
            <div class="form-text">Digite para buscar seu nome</div>
          </div>

          <div class="col-md-6">
            <label for="brinquedo" class="form-label">Nome do Brinquedo <span class="required">*</span></label>
            <select id="brinquedo" name="brinquedo" required>
                <option value="">Selecione um brinquedo...</option>
            </select>
            <div class="form-text">Digite para buscar o brinquedo</div>
          </div>

          <div class="col-md-6">
            <label for="op" class="form-label">Ordem de Produção (OP) <span class="required">*</span></label>
            <input type="text" class="form-control" id="op" name="op" placeholder="Digite a OP" required>
            <div class="form-text">Digite a OP</div>
          </div>
        </div>
      </div>

      <!-- 2. Detalhes do Problema -->
      <div class="section">
        <div class="section-header">
          <span class="section-number">2</span>
          <h2 class="section-title">Detalhes do Problema</h2>
        </div>

        <div class="mb-3">
          <label for="descricao" class="form-label">Descrição do Problema <span class="required">*</span></label>
          <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Descreva o problema encontrado..." required></textarea>
          <div class="form-text">Seja objetiva e descreva o que está acontecendo.</div>
        </div>

        <div class="row g-3 align-items-start">
          <div class="col-md-7">
            <label class="form-label">Prioridade <span class="required">*</span></label>
            <div class="priority-group" role="group" aria-label="Prioridade">
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
            <input type="hidden" name="prioridade" id="prioridade" required>
          </div>
        </div>
      </div>
      <!-- Actions -->
      <div class="form-actions">
        <button type="button" class="btn btn-cancel" onclick="window.history.back()">
          <i class="bi bi-x-lg"></i> Cancelar
        </button>
        <button type="submit" class="btn btn-submit">
          <i class="bi bi-send"></i> Enviar Ocorrência
        </button>
      </div>
      <p class="submit-hint">A ocorrência será enviada para análise do setor de Projeto.</p>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>
  <script>
    fetch('/api/colaboradores')
    .then(response => response.json())
    .then(colaboradores => {

        new TomSelect('#colaborador', {
            options: colaboradores,

            valueField: 'id_colaborador',
            labelField: 'nome_colaborador',
            searchField: 'nome_colaborador',

            placeholder: 'Digite o nome do colaborador...'
        });

    })
    .catch(error => {
        console.error('Erro ao buscar colaboradores:', error);
    });

    fetch('/api/brinquedos')
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro HTTP: ' + response.status);
            }

            return response.json();
        })
        .then(brinquedos => {

            new TomSelect('#brinquedo', {
                options: brinquedos,
                valueField: 'id_brinquedo',
                labelField: 'nome_brinquedo',
                searchField: 'nome_brinquedo',
                placeholder: 'Digite o nome do brinquedo...',
                allowEmptyOption: true
            });

        })
        .catch(error => {
            console.error('Erro ao buscar brinquedos:', error);
        });
    
    function selectPriority(btn) {
      document.querySelectorAll('.priority-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      document.getElementById('prioridade').value = btn.dataset.value;
    }

    document.getElementById('formOcorrencia').addEventListener('submit', function(e) {

    const colaborador = document.getElementById('colaborador').value;
    const brinquedo = document.getElementById('brinquedo').value;
    const op = document.getElementById('op').value.trim();
    const descricao = document.getElementById('descricao').value.trim();
    const prioridade = document.getElementById('prioridade').value;

    if (!colaborador) {
        e.preventDefault();
        alert('Selecione um colaborador.');
        return;
    }

    if (!brinquedo) {
        e.preventDefault();
        alert('Selecione um brinquedo.');
        return;
    }

    if (!op) {
        e.preventDefault();
        alert('Digite a OP.');
        return;
    }

    if (!descricao) {
        e.preventDefault();
        alert('Digite a descrição do problema.');
        return;
    }

    if (!prioridade) {
        e.preventDefault();
        alert('Selecione a prioridade.');
        return;
    }

    // Se chegou aqui, deixa o formulário ser enviado normalmente
});
const params = new URLSearchParams(window.location.search);

    if (params.get('sucesso') === '1') {

        const alertContainer = document.getElementById('alert-container');

        alertContainer.innerHTML = `
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sucesso!</strong> Ocorrência cadastrada com sucesso.
                
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Fechar">
                </button>
            </div>
        `;

        // Remove o parâmetro da URL
        window.history.replaceState({}, document.title, window.location.pathname);
    }
  </script>
  
</body>
</html>