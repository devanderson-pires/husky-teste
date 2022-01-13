<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Husky Teste</title>

    <link rel="stylesheet" href="css/app.css">
</head>

<body>
    <div class="container-sm container-md my-3">
        <div class="row">
            @include('sidebar.index')

            <main class="main-content col-md-10 col-sm-12">
                @yield('content')
            </main>
        </div>
    </div>


    <script src="js/app.js"></script>
</body>

</html>
