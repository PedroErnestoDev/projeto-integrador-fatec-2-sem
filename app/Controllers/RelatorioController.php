<?php
require_once __DIR__ . '/../Models/Ocorrencia.php';
require_once __DIR__ . '/../Models/Setor.php';
require_once __DIR__ . '/../Models/Status.php';
require_once __DIR__ . '/../Models/Prioridade.php';
require_once __DIR__ . '/../Core/Auth.php';

class RelatorioController
{
    private Ocorrencia $ocorrencia;
    private Setor $setor;
    private Status $status;
    private Prioridade $prioridade;

    public function __construct(PDO $pdo)
    {
        $this->ocorrencia = new Ocorrencia($pdo);
        $this->setor      = new Setor($pdo);
        $this->status     = new Status($pdo);
        $this->prioridade = new Prioridade($pdo);
    }

    public function ocorrencias()
    {
        Auth::exigirPerfil(Perfil::ADMIN);

        $filtros = [
            'data_inicio'      => $_GET['data_inicio'] ?? '',
            'data_fim'         => $_GET['data_fim'] ?? '',
            'fk_status'        => $_GET['fk_status'] ?? '',
            'fk_setor'         => $_GET['fk_setor'] ?? '',
            'fk_prioridade'    => $_GET['fk_prioridade'] ?? '',
            'ordem_producao'   => $_GET['ordem_producao'] ?? '',
            'codigo_brinquedo' => $_GET['codigo_brinquedo'] ?? '',
            'busca'            => $_GET['busca'] ?? '',
        ];

        $ocorrencias = $this->ocorrencia->listarComFiltros($filtros);
        $status      = $this->status->listar();
        $prioridades = $this->prioridade->listar();
        $setores     = $this->setor->listar();

        if (isset($_GET['export']) && $_GET['export'] === 'csv') {
            $this->exportarCsv($ocorrencias);
            return;
        }

        require_once __DIR__ . "/../Views/dashboard/relatorios/index.php";
    }

    private function exportarCsv(array $dados): void
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=relatorio_ocorrencias_' . date('Y-m-d_H-i') . '.csv');

        $output = fopen('php://output', 'w');
        fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF));

        fputcsv($output, [
            'ID', 'Ordem Produção', 'Descrição', 'Solução',
            'Data Abertura', 'Data Atualização', 'Data Conclusão',
            'Colaborador', 'Brinquedo', 'Código', 'Prioridade',
            'Status', 'Setor', 'Usuário'
        ], ';');

        foreach ($dados as $row) {
            fputcsv($output, [
                $row['id_ocorrencia'],
                $row['ordem_producao'],
                $row['descricao_ocorrencia'],
                $row['solucao_ocorrencia'],
                $row['data_abertura'],
                $row['data_atualizacao'],
                $row['data_conclusao'],
                $row['colaborador'],
                $row['brinquedo'],
                $row['codigo_brinquedo'],
                $row['prioridade'],
                $row['status'],
                $row['setor'] ?? '-',
                $row['usuario'],
            ], ';');
        }

        fclose($output);
        exit;
    }
}