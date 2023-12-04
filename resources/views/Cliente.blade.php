<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <title>Cliente Feliz</title>
</head>

<body>
    <nav class="navbar" style="background-color: #fff;">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Clientes</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="true " aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                    </ul>
                    <a href="{{ route('clientes.pdf') }}" class="btn btn-secondary" style="margin-right: 10px;">
                        Exportar PDF
                    </a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Novo Cliente
                    </button>
                </div>
            </div>
        </nav>
    </nav>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="ModalLabel">Novo Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="/clientes" method="get">
                        @csrf
                        <div class="mb-3">
                            <label for="campoNome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="campoNome" placeholder="name" name="nome">
                        </div>
                        <div class="mb-3">
                            <label for="campoEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="campoEmail" placeholder="name@example.com"
                                name="email">
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Salvar Alterações
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Dados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <!--<form action="/clientes" method="get">-->
                        @csrf
                        <div class="mb-3">
                            <label for="campoNome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="Nome" placeholder="name" name="nome">
                        </div>
                        <div class="mb-3">
                            <label for="campoEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="Email" placeholder="name@example.com"
                                name="email">
                        </div>
                    </form> --}}
                    @csrf
                    <div class="form-group">
                        <label for="campoNome">Nome:</label>
                        <input type="text" class="form-control" id="campoNome">
                    </div>
                    <div class="form-group">
                        <label for="campoEmail">E-mail:</label>
                        <input type="text" class="form-control" id="campoEmail">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="btnSalvar">Salvar Alterações</button>
                </div>
            </div>
        </div>
    </div>

    <table id="table-clientes" class="display">
    </table>
    <!--<button id="btnjquery" class="btn btn-dark">Testando jquery</button>-->
    <script>
        var modoCadastro;

        $('#btnjquery').click(function() {
            alert('Jquery funcionando');

            $.ajax({
                type: "GET",
                url: "/clientes/testeajax",
                success: function(response) {
                    console.log('Retornou corretamente.');
                    console.log(response);
                    console.log(response.nome)
                    console.log(response.email)
                },
                error: function(error) {
                    console.log('Deu erro.');
                    console.error(error);
                }
            });

        });

        $(document).ready(function() {
            $('#table-clientes').DataTable({
                ajax: {
                    url: "/clientes/buscar",
                    type: "get",
                    data: {},
                },
                columns: [{
                        data: 'id'
                    },
                    {    
                        data: 'nome'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'null',
                        sortable: false,
                        render: function(data, type, row) {
                            return '<button class="btn-editar btn btn-primary" data-toggle="modal" data-target="#modalEditar" data-id="' +
                                row.id + '">Editar</button>';
                        }
                    },
                    {
                        data: 'acao',
                        sortable: false,
                        mRender: function(data, type, row) {
                            return '<button class="btn btn-primary">Excluir</button>';
                        }
                    },
                ],
                serverSide: false,
                pageLength: 3,
            });
            
        });
        $('#table-clientes').on('click', '.btn-editar', function() {
                var id = $(this).data('id');
                // Implemente a lógica de edição com base no ID clicado
                editarDados(id);
            });

        function editarDados(id) {
            // Faz uma requisição AJAX para obter os dados do servidor
            $.ajax({
                url: "/clientes/buscar",
                type: "get",
                datatype: "json",
                success: function(dados) {
                    // Preenche os campos do modal com os dados obtidos
                    $('#campoNome').val(dados.nome);
                    $('#campoEmail').val(dados.email);
                    console.warn('222');
                    console.log('Retornou corretamente.');
                    console.log(dados);
                    console.log(dados.nome);
                    console.log(dados.email);
                    // Adicione mais campos conforme necessário

                    // Abre o modal de edição
                    $('#modalEditar').modal('show');
                },
                error: function() {
                    // Lida com erros de requisição
                    console.error('Erro ao obter dados do servidor');
                }
            });
        }
    </script>

</body>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>
