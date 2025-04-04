<?php
    require_once "config/database.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = $_POST['username'];

        //Pego os dados digitados no formulario e
        //Em seguida faça um select no banco de dados
        $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE username='$username'");
        $usuario = mysqli_fetch_assoc($result);
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Página de Login</title>
  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <style>
    body {
      background: #dc3545; /* Vermelho */
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-card {
      max-width: 720px;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      background-color: #ffffff; /* Branco */
      border: 3px solid #007bff; /* Azul */
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #dc3545; /* Vermelho */
    }
    .btn-primary {
      background-color: #007bff; /* Azul */
      border: none;
    }
    .btn-primary:hover {
      background-color: #0056b3; /* Azul mais escuro */
    }
    .form-check-label {
      color: #dc3545; /* Vermelho */
    }
    .text-link {
      color: #007bff; /* Azul */
      text-decoration: none;
    }
    .text-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <h2 class="text-center text-danger">Login</h2>
    <form method="POST">
      <div class="mb-3">
        <label for="email" class="form-label text-danger">E-mail</label>
        <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail" required>
      </div>
      <div class="mb-3">
        <label for="senha" class="form-label text-danger">Senha</label>
        <input type="password" class="form-control" id="senha" placeholder="Digite sua senha" required>
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="lembrar">
        <label class="form-check-label" for="lembrar">Lembrar-me</label>
      </div>
      <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
    <p class="mt-3 text-center">
      <a href="#" class="text-link">Esqueceu a senha?</a>
    </p>
  </div>

</body>
</html>
