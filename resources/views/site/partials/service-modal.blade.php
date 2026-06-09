<!-- MODAL DE SERVIÇO -->
<div id="serviceModal" class="modal">
    <div class="modal-content">
        <span class="modal-close">&times;</span>
        <h3>Solicitar Serviço</h3>
        <form id="serviceForm">
            <div class="form-group">
                <input type="text" id="serviceNome" placeholder="Seu nome" required>
            </div>
            <div class="form-group">
                <input type="email" id="serviceEmail" placeholder="Seu e-mail" required>
            </div>
            <div class="form-group">
                <input type="tel" id="serviceTelefone" placeholder="Seu telefone" required>
            </div>
            <div class="form-group">
                <input type="text" id="servicoTipo" readonly style="background: #f5f5f5;">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Enviar Solicitação</button>
        </form>
    </div>
</div>
