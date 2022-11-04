<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Formulário</title>
</head>
<body>

  <section class="contato">
  <?php
// define variáveis e verifica se há valores vazios
$nameErr = $lastNameErr = $phoneErr = $emailErr = $addressErr = $cityErr = $zipErr = "";
$name = $lastName = $phone = $email = $address = $city = $state = $zip =  $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Insira seu nome";
  } else {
    $name = test_input($_POST["name"]);
    // verifica se o nome contém apenas letras e espaço
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["lastName"])) {
    $lastNameErr = "Insira seu sobrenome";
  } else {
    $lastName = test_input($_POST["lastName"]);
    // verifica se o nome contém apenas letras e espaço
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) {
      $lastNameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["phone"])) {
    $phoneErr = "Insira seu número de celular";
  } else {
    $phone = test_input($_POST["phone"]);
    // verifica se o nome contém apenas letras e espaço
    if (!preg_match("/^[0-9' ]*$/",$phone)) {
      $phoneErr = "Only numbers";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Insira seu E-mail";
  } else {
    $email = test_input($_POST["email"]);
    // verifica se o email foi informado corretamente
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["address"])) {
    $addressErr = "Insira seu endereço";
  } else {
    $address = test_input($_POST["address"]);
    // verifica se o endereço contem apenas letras e espaços 
    if (!preg_match("/^[a-zA-Z-' ]*$/",$address)) {
      $addressErr = "Only letters and white space allowed";
    }
    }
  }

  if (empty($_POST["city"])) {
    $cityErr = "Insira seu nome";
  } else {
    $city = test_input($_POST["city"]);
    // verifica contém apenas letras e espaço
    if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
      $cityErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["zip"])) {
    $zipErr = "Insira seu cep";
  } else {
    $zip = test_input($_POST["zip"]);
    // verifica se o cep contém apenas números
    if (!preg_match("/^[0-9' ]*$/",$zip)) {
      $zipErr = "Only numbers";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
  <h2>Contato</h2>
  <form class="row g-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="col-md-6">
    <label for="inputName" class="form-label">Nome</label>
    <input type="text" class="form-control" placeholder="Nome" aria-label="First name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
  </div>
  <div class="col-md-6">
    <label for="inputLastName" class="form-label">Sobrenome</label>
    <input type="text" class="form-control" placeholder="Sobrenome" aria-label="Last name" value="<?php echo $lastName;?>">
    <span class="error">* <?php echo $lastNameErr;?></span>
  </div>
  <div class="col-md-6">
    <label for="inputPhone" class="form-label">Celular</label>
    <input type="phone-number" class="form-control" placeholder="(DDD) 9 9999-9999" aria-label="phone-number" value="<?php echo $phone;?>">
    <span class="error">* <?php echo $phoneErr;?></span>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">E-mail</label>
    <input type="email" class="form-control" id="inputEmail4" placeholder="Insira seu e-mail aqui" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Endereço</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Insira seu endereço aqui" value="<?php echo $address;?>">
    <span class="error">* <?php echo $addressErr;?></span>
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="inputCity" value="<?php echo $city;?>">
    <span class="error">* <?php echo $cityErr;?></span>
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Estado</label>
    <select id="inputState" class="form-select">
      <option selected>Selecione...</option>
      <option>PR</option>
      <option>MG</option>
      <option>MS</option>
      <option>MN</option>
      <option>RS</option>
      <option>SP</option>
      <option>SC</option>
      <option>RJ</option>
      <option>DF</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">CEP</label>
    <input type="text" class="form-control" id="inputZip" placeholder="00000-000" value="<?php echo $zip;?>">
    <span class="error">* <?php echo $zipErr;?></span>
  </div>
  Menssagem: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Enviar</button>
  </div>
</form>
</div>

<?php
echo "<h2>Sua resposta:</h2>";
echo $name;
echo "<br>";
echo $lastName;
echo "<br>";
echo $phone;
echo "<br>";
echo $email;
echo "<br>";
echo $address;
echo "<br>";
echo $city;
echo "<br>";
echo $state;
echo "<br>";
echo $zip;
echo "<br>";
echo $comment;
echo "<br>";
?>
</section>

</body>
</html>