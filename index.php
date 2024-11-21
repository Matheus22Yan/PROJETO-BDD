<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh+oOVwVF4tpIr+RxEQhxROYVqLTa1RIbnfCe59XIcW3gGNFMAyT5AykVcUpwM4d/381fQ4DXw" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #1c1c1c; /* Fundo escuro */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            color: #fff; /* Texto branco */
        }

        .card {
            background-color: #2c2c2c; /* Fundo mais claro para o card */
            border: 1px solid #444; /* Borda sutil */
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); /* Sombra destacada */
        }

        .btn-primary {
            background-color: #007bff; /* Azul padrão */
            border: none;
            color: #fff;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Azul mais escuro */
            transform: scale(1.05); /* Efeito de zoom */
        }

        .titulo-login {
            color: #007bff; /* Azul destaque */
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-control {
            background-color: #333; /* Fundo escuro para o input */
            color: #fff; /* Texto claro */
            border: 1px solid #444; /* Borda mais clara */
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #007bff; /* Azul ao focar */
            box-shadow: 0 0 5px #007bff;
        }

        .mb-3 label {
            font-weight: bold;
            color: #bbb; /* Cinza claro */
        }

        .card-body {
            padding: 30px;
        }

        .text-muted {
            color: #888; /* Texto mais apagado */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="titulo-login">Admin Login</h3>
                        <p class="text-muted text-center mb-4">Acesso restrito ao painel administrativo</p>
                        <form action="login.php" method="POST">
                            <div class="mb-3">
                                <label>Usuário</label>
                                <input type="text" name="usuario" class="form-control" placeholder="Digite seu usuário">
                            </div>
                            <div class="mb-3">
                                <label>Senha</label>
                                <input type="password" name="senha" class="form-control" placeholder="Digite sua senha">
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                        </form>
                        <p class="text-muted text-center mt-3">© 2024 Sistema Admin</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
