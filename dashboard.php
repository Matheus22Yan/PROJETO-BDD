<?php
session_start();
if (empty($_SESSION)) {
    echo "<script>location.href='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Controle Clínico</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh+oOVwVF4tpIr+RxEQhxROYVqLTa1RIbnfCe59XIcW3gGNFMAyT5AykVcUpwM4d/381fQ4DXw" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Fundo e layout geral */
        body {
            display: flex;
            height: 100vh;
            background-image: url('images.avif');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #000;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background-color: rgba(0, 0, 0, 0.7);
            /* Fundo semitransparente */
            backdrop-filter: blur(10px);
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            padding-top: 20px;
        }

        .sidebar .navbar-brand {
            color: #2196F3;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .sidebar .nav-link {
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
        }

        .sidebar .nav-link.active {
            color: #fff !important;
            /* Garante que a opção ativa fique branca */
        }

        .sidebar .nav-link:hover {
            background-color: #2196F3;
            color: #000;
        }

        .sidebar .btn-danger {
            margin: 10px 20px;
            background-color: #f44336;
            border-color: #f44336;
            width: calc(100% - 40px);
        }

        /* Conteúdo principal */
        .main-content {
            margin-left: 250px;
            /* Espaço para a sidebar */
            padding: 20px;
            flex: 1;
        }

        /* Estilo adicional para caixas */
        .card {
            background-color: rgba(255, 255, 255, 0.8);
            /* Fundo levemente transparente */
            color: #000;
            border-radius: 10px;
        }

        .card-header {
            background-color: #2196F3;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }

        .btn-primary {
            background-image: linear-gradient(to right, #2196F3, #0B80FF);
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <a class="navbar-brand" href="dashboard.php">Sistema Privado</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Médico
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?page=cadastrar-medico">Cadastrar Médico </a></li>
                    <li><a class="dropdown-item" href="?page=listar-medico">Listar Médico</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Paciente
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?page=cadastrar-paciente">Cadastrar Paciente</a></li>
                    <li><a class="dropdown-item" href="?page=listar-paciente">Listar Paciente</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Consulta
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?page=cadastrar-consulta">Cadastrar Consulta</a></li>
                    <li><a class="dropdown-item" href="?page=listar-consulta">Listar Consulta</a></li>
                </ul>
            </li>
        </ul>
        <a href="logout.php" class="btn btn-danger">Sair</a>
    </nav>

    <!-- Conteúdo principal -->
    <div class="main-content">
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <?php
                    include('config.php');
                    switch (@$_REQUEST['page']) {
                        case 'cadastrar-medico':
                            include('cadastrar-medico.php');
                            break;
                        case 'editar-medico':
                            include('editar-medico.php');
                            break;
                        case 'listar-medico':
                            include('listar-medico.php');
                            break;
                        case 'salvar-medico':
                            include('salvar-medico.php');
                            break;

                        case 'cadastrar-paciente':
                            include('cadastrar-paciente.php');
                            break;
                        case 'editar-paciente':
                            include('editar-paciente.php');
                            break;
                        case 'listar-paciente':
                            include('listar-paciente.php');
                            break;
                        case 'salvar-paciente':
                            include('salvar-paciente.php');
                            break;

                        case 'cadastrar-consulta':
                            include('cadastrar-consulta.php');
                            break;
                        case 'editar-consulta':
                            include('editar-consulta.php');
                            break;
                        case 'listar-consulta':
                            include('listar-consulta.php');
                            break;
                        case 'salvar-consulta':
                            include('salvar-consulta.php');
                            break;
                        default:
                            include('home.php');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>