<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTune</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.min.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="manifest" href="manifest.json">
</head>
<body>
    <div id="header-container"></div>
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="input-group mb-3">
                    <input type="text" id="search-query" class="form-control" placeholder="Search for music...">
                    <button class="btn btn-primary" onclick="searchMusic()"><i class="fas fa-search"></i> Search</button>
                </div>
                <div id="loader" class="loader d-none"></div>
                <div id="results" class="mt-4"></div>
            </div>
        </div>
    </div>
    <div id="footer-container"></div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.all.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/home.js"></script>
    <script src="js/header.js"></script>
    <script src="js/footer.js"></script>
    <script src="js/sw-function.js"></script>
</body>
</html>