<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .wrapper {
            display: flex;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #343a40;
            padding-top: 50px;
            padding-left: 15px;
        }

        .sidebar a {
            color: #f8f9fa;
            display: block;
            padding: 10px;
            margin-bottom: 10px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .navbar-brand {
            color: #f8f9fa !important;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="index.php"><i class="fas fa-home"></i> Dashboard</a>
            <a href="prestamos.php"><i class="fas fa-hand-holding-usd"></i> Prestamos</a>
            <a href="inversiones.php"><i class="fas fa-chart-pie"></i> Inversiones</a>
            <a href="perfil.php"><i class="fas fa-user"></i> Ver Perfil</a>
            <a href="#"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
        </div>

        <!-- Page Content -->
        <div class="content">
            <div class="container">
                <h1>Welcome to Your Dashboard</h1>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Loans Requested</h5>
                                <p class="card-text">Total number of loans requested: <!-- PHP code to get loan count --></p>
                                <a href="prestamos.php" class="btn btn-primary">View Loans</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Investments Requested</h5>
                                <p class="card-text">Total number of investments requested: <!-- PHP code to get investment count --></p>
                                <a href="inversiones.php" class="btn btn-primary">View Investments</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <a href="perfil.php" class="btn btn-info">Ver mi perfil</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
