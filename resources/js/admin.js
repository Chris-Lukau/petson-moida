

  // ================= DADOS =================

  const usuarios = [
    {
      nome:'Carlos Mendes',
      telefone:'+244 923 000 111',
      genero:'Masculino',
      endereco:'Luanda'
    },

    {
      nome:'Ana Paula',
      telefone:'+244 945 000 222',
      genero:'Feminino',
      endereco:'Benguela'
    },

    {
      nome:'João Victor',
      telefone:'+244 932 000 333',
      genero:'Masculino',
      endereco:'Huambo'
    },

    {
      nome:'Mariana Costa',
      telefone:'+244 956 000 444',
      genero:'Feminino',
      endereco:'Luanda'
    },

    {
      nome:'Pedro Miguel',
      telefone:'+244 991 000 555',
      genero:'Masculino',
      endereco:'Lubango'
    }
  ];

  // ================= ELEMENTOS =================

  const tbody = document.getElementById('userTableBody');
  const searchInput = document.getElementById('searchInput');
  const filterEndereco = document.getElementById('filterEndereco');

  // ================= RENDER USERS =================

  function renderUsers(lista){

    tbody.innerHTML = '';

    lista.forEach(user => {

      const generoClass =
        user.genero === 'Masculino'
        ? 'masculino'
        : 'feminino';

      tbody.innerHTML += `
        <tr>
          <td>${user.nome}</td>
          <td>${user.telefone}</td>
          <td>
            <span class="badge ${generoClass}">
              ${user.genero}
            </span>
          </td>
          <td>${user.endereco}</td>
        </tr>
      `;
    });

    document.getElementById('totalUsuarios').innerText = lista.length;
  }

  renderUsers(usuarios);

  // ================= FILTRO ENDEREÇOS =================

  const enderecos = [...new Set(
    usuarios.map(user => user.endereco)
  )];

  document.getElementById('totalEnderecos')
    .innerText = enderecos.length;

  enderecos.forEach(endereco => {

    filterEndereco.innerHTML += `
      <option value="${endereco}">
        ${endereco}
      </option>
    `;
  });

  // ================= FILTROS =================

  function filtrarUsuarios(){

    const termo =
      searchInput.value.toLowerCase();

    const enderecoSelecionado =
      filterEndereco.value;

    const filtrados = usuarios.filter(user => {

      const matchNome =
        user.nome.toLowerCase().includes(termo);

      const matchEndereco =
        enderecoSelecionado === ''
        || user.endereco === enderecoSelecionado;

      return matchNome && matchEndereco;
    });

    renderUsers(filtrados);
  }

  searchInput.addEventListener(
    'input',
    filtrarUsuarios
  );

  filterEndereco.addEventListener(
    'change',
    filtrarUsuarios
  );

// ================= MENU MOBILE =================

const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');

// abrir/fechar ao clicar no botão
menuToggle.addEventListener('click', (e) => {
  e.stopPropagation();
  sidebar.classList.toggle('active');
});

// fechar ao clicar num item
document.querySelectorAll('.menu a').forEach(item => {
  item.addEventListener('click', () => {
    sidebar.classList.remove('active');
  });
});

// fechar ao clicar fora
document.addEventListener('click', (e) => {
  if (
    !sidebar.contains(e.target) &&
    !menuToggle.contains(e.target)
  ) {
    sidebar.classList.remove('active');
  }
});
