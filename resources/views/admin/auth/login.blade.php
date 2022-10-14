<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Admin Login</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4 offset-4 mt-5 mt-5">
                <div class="card mt-5">
                    <div class="card-header bg-dark text-white py-3">
                        Admin Login
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="" class="fw-bold mb-2">Enter Email</label>
                                <input type="email" name="email" class="form-control"/>
                            </div>
                            <div class="form-group mt-3">
                                <label for="" class="fw-bold mb-2">Enter Password</label>
                                <input type="password" name="password" class="form-control"/>
                            </div>
                            <input type="submit" value="Login" class="btn btn-dark mt-3"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>