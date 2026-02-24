<h2 style="margin-bottom:6px">BEM-VINDO, <?= html_escape(strtoupper($nome)) ?></h2>
<p style="font-family:var(--font-mono);font-size:.78rem;color:var(--text-dim);margin-bottom:24px">// PAINEL DE GERENCIAMENTO</p>

<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-bottom:24px">
  <div class="card card-pink">
    <h3>Cadastrar Questão</h3>
    <p style="font-size:.9rem;color:var(--text-dim);margin:8px 0 14px">Adicione novas questões ao banco</p>
    <a href="<?= site_url('professor/nova_questao') ?>" class="btn btn-primary" style="font-size:.65rem">+ NOVA QUESTÃO</a>
  </div>
  <div class="card card-purple">
    <h3>Gerenciar Questões</h3>
    <p style="font-size:.9rem;color:var(--text-dim);margin:8px 0 14px">Editar, ocultar e organizar</p>
    <a href="<?= site_url('professor/questoes') ?>" class="btn btn-secondary" style="font-size:.65rem">VER LISTA →</a>
  </div>
</div>

<div class="card">
  <h3 style="margin-bottom:16px">Funções Disponíveis</h3>
  <div style="display:flex;flex-direction:column;gap:8px">
    <div style="display:flex;align-items:center;gap:12px;padding:12px;background:rgba(57,255,20,.05);border:1px solid rgba(57,255,20,.2);border-radius:var(--radius)">
      <span style="color:var(--neon-green)">✔</span>
      <span>Cadastrar questões com imagem e feedback pedagógico</span>
    </div>
    <div style="display:flex;align-items:center;gap:12px;padding:12px;background:rgba(57,255,20,.05);border:1px solid rgba(57,255,20,.2);border-radius:var(--radius)">
      <span style="color:var(--neon-green)">✔</span>
      <span>Editar questões existentes</span>
    </div>
    <div style="display:flex;align-items:center;gap:12px;padding:12px;background:rgba(57,255,20,.05);border:1px solid rgba(57,255,20,.2);border-radius:var(--radius)">
      <span style="color:var(--neon-green)">✔</span>
      <span>Ocultar questões inadequadas</span>
    </div>
  </div>
</div>
