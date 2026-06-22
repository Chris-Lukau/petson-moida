<!-- MODAL DE REGISTRO -->
<div id="registerModal" class="modal">

    <div class="modal-content">

        <span class="modal-close">&times;</span>

        <h3>Registrar na Petson Moída</h3>

        <form id="registerForm">

            @csrf
            <!-- Dados pessoais -->

            <div class="form-group">
                <input
                    type="text"
                    name="nome_completo"
                    placeholder="Nome completo"
                    required>
            </div>

            <div class="form-group">
                <input
                    type="tel"
                    name="telefone"
                    placeholder="+244923456789"
                    required>
            </div>

            <div class="form-group">

                <select name="genero" required>

                    <option value="">
                        Selecione o género
                    </option>

                    <option value="Masculino">
                        Masculino
                    </option>

                    <option value="Feminino">
                        Feminino
                    </option>

                </select>

            </div>

            <!-- Localização -->

            <div class="form-group">
                <input
                    type="text"
                    name="provincia"
                    placeholder="Província"
                    required>
            </div>

            <div class="form-group">
                <input
                    type="text"
                    name="municipio"
                    placeholder="Município"
                    required>
            </div>

            <div class="form-group">
                <input
                    type="text"
                    name="bairro"
                    placeholder="Bairro"
                    required>
            </div>

            <div class="form-group">
                <input
                    type="text"
                    name="zona"
                    placeholder="Zona"
                    required>
            </div>

            <div class="form-group">
                <input
                    type="text"
                    name="endereco"
                    placeholder="Endereço"
                    required>
            </div>

            <div class="form-group">
                <textarea
                    name="referencia"
                    placeholder="Ponto de referência (opcional)"></textarea>
            </div>

            <!-- Conta -->

            <div class="form-group">
                <input
                    type="email"
                    name="email"
                    placeholder="E-mail"
                    required>
            </div>

            <div class="form-group">
                <input
                    type="password"
                    name="password"
                    placeholder="Senha"
                    required>
            </div>

            <div class="form-group">
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirmar senha"
                    required>
            </div>

            <button
                type="submit"
                class="btn btn-primary"
                style="width:100%;">

                Registrar

            </button>

        </form>

    </div>

</div>
