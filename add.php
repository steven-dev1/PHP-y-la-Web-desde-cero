<?php

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $contact = [
      "name" => $_POST["name"],
      "phone_number" => $_POST["phone_number"]
    ];
    
    if (file_exists("contacts.json")){
      $contacts = json_decode(file_get_contents("contacts.json"), true);
    } else {
      $contacts = [];
    }

    $contacts[] = $contact;

    file_put_contents("contacts.json", json_encode($contacts));
    header("Location: index.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- Bootstrap -->
    <link 
      rel="stylesheet" 
      href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.2/darkly/bootstrap.min.css" integrity="sha512-8RiGzgobZQmqqqJYja5KJzl9RHkThtwqP1wkqvcbbbHNeMXJjTaBOR+6OeuoxHhuDN5h/VlgVEjD7mJu6KNQXA==" 
      crossorigin="anonymous" 
      referrerpolicy="no-referrer" 
    />
    <script
        defer 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <!-- Static Content -->
    <link rel="stylesheet" href="./static/css/index.css">

    <title>Contacts App</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand font-weight-bold" href="#">
            <img class="mr-2" src="./static/img/logo.png" />
            ContactsApp
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="./index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">A??adir contacto</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <main>
        <div class="container pt-5">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">A??adir nuevo contacto</div>
                <div class="card-body">
                  <form method="post" action="add.php">
                    <div class="mb-3 row">
                      <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>
        
                      <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                      </div>
                    </div>
        
                    <div class="mb-3 row">
                      <label for="phone_number" class="col-md-4 col-form-label text-md-end">N??mero de telefono</label>
        
                      <div class="col-md-6">
                        <input id="phone_number" type="tel" class="form-control" name="phone_number" required autocomplete="phone_number" autofocus>
                      </div>
                    </div>
        
                    <div class="mb-3 row">
                      <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
</body>
</html>