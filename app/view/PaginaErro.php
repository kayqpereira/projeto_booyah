<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página não encontrada!</title>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.load = Swal.fire({
            icon: "error",
            iconColor: "#dc3545",
            title: "Oops...",
            text: "Página não encontrada!",
            confirmButtonColor: "#7166f0",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace("index.php?classe=HomeController&metodo=abrirHome");
            }
        });
    </script>
</body>

</html>