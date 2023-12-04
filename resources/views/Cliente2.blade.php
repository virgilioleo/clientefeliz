<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
</head>

<body>
    <nav class="navbar" style="background-color: #fff;">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Clientes</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/clientes" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="name" name="nome">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com"
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

    <table id="table-clientes" class="display">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>João</td>
                <td>joao@example.com</td>
            </tr>
            <tr>
                <td>Maria</td>
                <td>maria@example.com</td>
            </tr>
        </tbody>
    </table>

    <!--<script>
        $(document).ready(function() {
            $('#table-clientes').DataTable();
        });
    </script>-->

    <script>
        /*
                INCLUSAO, ALTERACAO
                 */
        var modoCadastro;

        $('#btnjquery').click(function() {
            // alert('Jquery funcionando');

            // $.ajax({
            //     type: "GET",
            //     url: "/clientes/testeajax",
            //     success: function(response) {
            //         console.log('Retornou corretamente.');
            //         console.log(response);
            //         console.log(response.nome)
            //         console.log(response.email)
            //     },
            //     error: function(error) {
            //         console.log('Deu erro.');
            //         console.error(error);
            //     }
            // });

        });

        $(document).ready(function() {
            $('#table-clientes').DataTable({
                ajax: {
                    url: "/clientes/buscar",
                    type: "GET",
                    data: {},
                },
                columns: [{
                        data: 'nome'
                    },
                    // {
                    //     data: 'email'
                    // }
                    {
                        data: 'acao',
                        sortable: false,
                        mRender: function(data, type, row) {
                            return '<button class="btn btn-primary">Editar</button>';
                        }
                    }
                ],
                serverSide: false,
                pageLength: 3,
            });
        });

        //
    </script>

</body>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>