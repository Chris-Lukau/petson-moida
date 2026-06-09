<section id="servicos">

    <div class="section-title reveal">
        <h2>Nossos Serviços</h2>

        <p>
            Escolha a categoria e encontre o serviço ideal
            para sua necessidade.
        </p>
    </div>

    <div class="service-filters reveal">

        <select id="categoryFilter">

            <option value="">
                Todas Categorias
            </option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach

        </select>

        <input type="text" id="serviceSearch" placeholder="Pesquisar serviço...">

    </div>

    <div id="servicesGrid" class="servicos">

        @foreach ($services as $service)
            <div class="service-card" data-category="{{ $service->category_id }}"
                data-name="{{ strtolower($service->name) }}">

                <img src="{{ asset('storage/' . $service->photo_path) }}" alt="{{ $service->name }}" loading="lazy">

                <h3>{{ $service->name }}</h3>

                <p>{{ $service->category->name }}</p>

                <span>
                    @if ($service->pricing_type === 'fixed')
                        {{ number_format($service->base_price, 2, ',', '.') }} Kz
                    @else
                        Sob consulta
                    @endif
                </span>

                <button class="btn btn-primary solicitar-servico" data-service="{{ $service->name }}">
                    Solicitar
                </button>

            </div>
        @endforeach

    </div>

</section>
