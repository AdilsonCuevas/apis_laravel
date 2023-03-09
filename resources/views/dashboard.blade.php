<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="dashboard">PruebaTecnica</a>
                <div style="text-align: right;" class="row">
                    <div class="col">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                    <div class="col">
                        <h3></h3>
                    </div>
                    <div class="col">
                        <img src="descarga.png" style="width: 50px; height: 50px;">
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 mb-3">
                <a class="btn btn-primary" href="/dashboard">Principal</a>
                <br/>
                <a class="btn btn-primary" href="/personajes">Personajes</a>
            </div>
            <div class="col-md-8">
                @yield('contenido')
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</html>