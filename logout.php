<?php
session_start();
session_destroy();

?>
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Logout Success',
            showConfirmButton: false,
            timer: 1000
        })
    </script>
    <?php
    header("Refresh:1; url=index.php");
    ?>
</body>

</html>