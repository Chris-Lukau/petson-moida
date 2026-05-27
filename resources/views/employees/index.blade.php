<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Usuários</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>♻️</text></svg>">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

:root{
--verde:#0b7a3d;
--laranja:#f26b0f;
--cinza:#f4f4f4;
--branco:#fff;
}

body{
background:var(--cinza);
padding:30px;
}

/* topo */
.top{
display:flex;
justify-content:space-between;
align-items:center;
flex-wrap:wrap;
gap:20px;
margin-bottom:30px;
}

h1{
color:var(--verde);
}

.add-btn{
background:var(--verde);
color:white;
border:none;
padding:14px 22px;
border-radius:10px;
cursor:pointer;
}

/* filtros */
.filters{
display:flex;
gap:15px;
flex-wrap:wrap;
margin-bottom:30px;
}

.filters input,
.filters select{
padding:12px;
border:1px solid #ccc;
border-radius:10px;
min-width:220px;
}

/* tabela */
.table-box{
background:white;
padding:20px;
border-radius:20px;
overflow:auto;
}

table{
width:100%;
border-collapse:collapse;
min-width:900px;
}

th{
background:var(--verde);
color:white;
padding:15px;
text-align:left;
}

td{
padding:15px;
border-bottom:1px solid #eee;
}

button.edit{
background:#2196f3;
color:white;
border:none;
padding:8px 14px;
border-radius:8px;
cursor:pointer;
margin-right:8px;
}

button.delete{
background:#e53935;
color:white;
border:none;
padding:8px 14px;
border-radius:8px;
cursor:pointer;
}

/* modal */
.modal{
display:none;
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,.5);
justify-content:center;
align-items:center;
}

.modal.active{
display:flex;
}

.modal-box{
background:white;
padding:30px;
border-radius:20px;
width:95%;
max-width:500px;
}

.modal-box h2{
margin-bottom:20px;
color:var(--verde);
}

.modal-box input,
.modal-box select{
width:100%;
padding:12px;
margin-bottom:15px;
border:1px solid #ccc;
border-radius:10px;
}

.save-btn{
width:100%;
background:var(--verde);
color:white;
padding:14px;
border:none;
border-radius:10px;
cursor:pointer;
}

/* mobile */
@media(max-width:700px){

body{
padding:15px;
}

.filters{
flex-direction:column;
}

.filters input,
.filters select{
width:100%;
}

}

</style>
</head>
<body>
@extends('layouts.app')

@section('content')

<div class="top">
    <h1>Funcionários</h1>

    <button class="add-btn" onclick="openModal()">
        <i class="fas fa-plus"></i> Adicionar
    </button>
</div>


<div class="filters">

    <input
        type="text"
        id="search"
        placeholder="Pesquisar nome"
    >

    <select id="filterGenero">
        <option value="">Filtrar gênero</option>
        <option>Masculino</option>
        <option>Feminino</option>
    </select>

    <select id="filterServico">
        <option value="">Filtrar serviço</option>
        <option>Coleta</option>
        <option>Limpeza</option>
        <option>Reciclagem</option>
    </select>

</div>


<div class="table-box">
<table>

    <thead>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>BI</th>
            <th>Gênero</th>
            <th>Endereço</th>
            <th>Serviço</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody id="tbody">

        @foreach($employees as $employee)
        <tr>

            <td>{{ $employee->full_name }}</td>
            <td>{{ $employee->phone }}</td>
            <td>{{ $employee->bi_number }}</td>
            <td>{{ $employee->gender }}</td>
            <td>{{ $employee->address }}</td>
            <td>{{ $employee->service?->name }}</td>

            <td>

                <button
                    class="edit"
                    onclick="editar(
                        {{ $employee->id }},
                        '{{ $employee->full_name }}',
                        '{{ $employee->phone }}',
                        '{{ $employee->bi_number }}',
                        '{{ $employee->gender }}',
                        '{{ $employee->address }}',
                        '{{ $employee->service }}'
                    )"
                >
                    Editar
                </button>


                <form
                    action="{{ route('employees.destroy',$employee->id) }}"
                    method="POST"
                    style="display:inline"
                >
                    @csrf
                    @method('DELETE')

                    <button class="delete">
                        Eliminar
                    </button>

                </form>

            </td>
        </tr>
        @endforeach

    </tbody>

</table>
</div>


<!-- modal -->
<div class="modal" id="modal">
<div class="modal-box">

<h2 id="tituloModal">Novo Funcionário</h2>

<form
    id="employeeForm"
    method="POST"
    action="{{ route('employees.store') }}"
>

@csrf

<input
    id="nome"
    name="full_name"
    placeholder="Nome completo"
    required
>

<input
    id="telefone"
    name="phone"
    placeholder="Telefone"
    required
>

<input
    id="bi"
    name="bi_number"
    placeholder="Número do BI"
    required
>

<select
    id="genero"
    name="gender"
>
    <option>Masculino</option>
    <option>Feminino</option>
</select>


<input
    id="endereco"
    name="address"
    placeholder="Endereço"
    required
>


<select
    id="servico"
    name="service"
>
    <option>Coleta</option>
    <option>Limpeza</option>
    <option>Reciclagem</option>
</select>

<button class="save-btn">
    Salvar
</button>

</form>

</div>
</div>



<script>

let editId = null;


/* abrir */
function openModal(){
    document
    .getElementById("modal")
    .classList
    .add("active");
}


/* fechar */
function closeModal(){
    document
    .getElementById("modal")
    .classList
    .remove("active");

    limpar();
}


/* limpar */
function limpar(){

    nome.value="";
    telefone.value="";
    bi.value="";
    endereco.value="";
    genero.value="Masculino";
    servico.value="Coleta";

    editId=null;

    document
    .getElementById("employeeForm")
    .action="{{ route('employees.store') }}";

    document
    .querySelector('#employeeForm input[name="_method"]')
    ?.remove();

}


/* editar */
function editar(
    id,
    nomeValor,
    telefoneValor,
    biValor,
    generoValor,
    enderecoValor,
    servicoValor
){

    editId=id;

    nome.value=nomeValor;
    telefone.value=telefoneValor;
    bi.value=biValor;
    genero.value=generoValor;
    endereco.value=enderecoValor;
    servico.value=servicoValor;

    const form =
    document.getElementById("employeeForm");

    form.action =
    "/employees/" + id;

    if(!document.querySelector('input[name="_method"]')){
        form.insertAdjacentHTML(
            "beforeend",
            '<input type="hidden" name="_method" value="PUT">'
        );
    }

    openModal();
}



/* filtros frontend */
document
.querySelectorAll(
"#search,#filterGenero,#filterServico"
)
.forEach(el=>{

    el.addEventListener("input",filtrar);
    el.addEventListener("change",filtrar);

});


function filtrar(){

    let nome =
    document
    .getElementById("search")
    .value
    .toLowerCase();

    let genero =
    document
    .getElementById("filterGenero")
    .value;

    let servico =
    document
    .getElementById("filterServico")
    .value;


    const rows =
    document.querySelectorAll("#tbody tr");


    rows.forEach(row=>{

        let nomeTd =
        row.children[0]
        .innerText
        .toLowerCase();

        let generoTd =
        row.children[3]
        .innerText;

        let servicoTd =
        row.children[5]
        .innerText;


        let show =
            nomeTd.includes(nome)
            &&
            (genero==="" || generoTd===genero)
            &&
            (servico==="" || servicoTd===servico);

        row.style.display =
        show ? "" : "none";

    });

}


/* fechar clicando fora */
window.onclick=(e)=>{
    if(e.target.id==="modal"){
        closeModal();
    }
};

</script>

@endsection
</body>
</html>