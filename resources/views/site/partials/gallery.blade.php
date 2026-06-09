<!-- GALERIA CARROSSEL -->
<section id="galeria">
    <div class="section-title reveal" style="text-align: center; margin-bottom: 60px;">
        <h2>Galeria</h2>
        <p>Conheça nossos trabalhos e atividades ambientais</p>
    </div>
    <div class="galeria-container">
        <div class="galeria-carrossel" id="galeriaCarrossel">
            <div class="galeria-slide">
                <img src="{{ asset('assets/img/equipa-limpeza.jpg') }}" loading="lazy" alt="Equipe de limpeza">
                <div class="galeria-caption">
                    <h3>Equipe de Limpeza Urbana</h3>
                    <p>Trabalhando por uma cidade mais limpa</p>
                </div>
            </div>
            <div class="galeria-slide">
                <img src="{{ asset('assets/img/coleta-selectiva.jpg') }}" loading="lazy" alt="Coleta seletiva">
                <div class="galeria-caption">
                    <h3>Coleta Seletiva</h3>
                    <p>Separação correta dos resíduos</p>
                </div>
            </div>
            <div class="galeria-slide">
                <img src="{{ asset('assets/img/equipa.jpg') }}" loading="lazy" alt="Reciclagem">
                <div class="galeria-caption">
                    <h3>Equipa</h3>
                    <p>Transformando resíduos em novos produtos</p>
                </div>
            </div>
            <div class="galeria-slide">
                <img src="{{ asset('assets/img/Pessoal.jpg') }}" loading="lazy" alt="Meio ambiente">
                <div class="galeria-caption">
                    <h3>Preservação Ambiental</h3>
                    <p>Compromisso com o futuro do planeta</p>
                </div>
            </div>
        </div>
        <button class="galeria-btn btn-prev" id="btnPrev">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="galeria-btn btn-next" id="btnNext">
            <i class="fas fa-chevron-right"></i>
        </button>
        <div class="galeria-indicators" id="galeriaIndicators"></div>
    </div>
</section>
