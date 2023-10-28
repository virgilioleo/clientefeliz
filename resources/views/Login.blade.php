<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .modal-header,
        h4,
        .close {
            background-color: #5cb85c;
            color: white !important;
            text-align: center;
            font-size: 30px;
        }

        .modal-footer {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Cliente Feliz</h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-default btn-lg" id="myBtn">Entrar</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:35px 50px;">
                        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                        <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <form action="/clientes" method="get">
                            @csrf
                            <div class="form-group">
                                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
                                <input type="text" class="form-control" id="usrname" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>
                                    Senha</label>
                                <input type="text" class="form-control" id="psw" placeholder="">
                            </div>
                            <!--
                            <div class="checkbox">
                                <label><input type="checkbox" value="" checked>Remember me</label>
                            </div>
                            -->
                            <button type="submit" class="btn btn-success btn-block"><span
                                    class="glyphicon glyphicon-off"></span> Login</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Cancelar</button>
                        <p>Não tem conta? <a data-toggle="modal" href="#myModal2">Cadastre-se</a></p>
                        <p><a href="#">Esqueceu a Senha?</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Cadastro</h4>
                    </div>
                    <div class="container"></div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <form action="/clientes" method="get">
                            @csrf
                            <div class="form-group">
                                <label for="fname"><span class="glyphicon glyphicon-user"></span> Nome</label>
                                <input type="text" class="form-control" id="fname" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="lname"><span class="glyphicon glyphicon-user"></span> Sobrenome</label>
                                <input type="text" class="form-control" id="lname" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="username"><span class="glyphicon glyphicon-user"></span> Usuário</label>
                                <input type="text" class="form-control" id="username" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>
                                    Senha</label>
                                <input type="text" class="form-control" id="psw" placeholder="">
                            </div>
                            <button type="submit" class="btn btn-success btn-block"></span> Salvar</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" data-dismiss="modal" class="btn btn-danger">Fechar</a>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script>
        $(document).ready(function() {
            $("#myBtn").click(function() {
                $("#myModal").modal();
            });
        });
    </script>
    <script>
        /*
                 INCLUSAO, ALTERACAO
                */
        var modoCadastro;

        $('#btnjquery').click(function() {
            // alert('Jquery funcionando');

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
                    type: "GET",
                    data: {},
                },
                columns: [{
                        data: 'nome'
                    },
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

</html>
