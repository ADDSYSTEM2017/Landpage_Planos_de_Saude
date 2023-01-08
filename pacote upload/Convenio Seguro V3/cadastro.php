<?php

// Get the Values from the Contact form
   $EmailFrom = "Cotacao Planos de Saude";
   
// insert your email address here
// $EmailTo = "enigmacrs@hotmail.com";
   $EmailTo = "eduardodomingues04@gmail.com";

// insert your Subject here
$Subject = "Plano de Saúde";

$tipo = Trim(stripslashes($_POST['tipo'])); 

$name = Trim(stripslashes($_POST['nome'])); 

$email = Trim(stripslashes($_POST['email'])); 

$phone = Trim(stripslashes($_POST['numero']));

$message = Trim(stripslashes($_POST['mensagem'])); 

// Assign the values to the variables for the email

$Body = "";
$Body .= "TIPO: ";
$Body .= $tipo;
$Body .= "\n";

$Body .= "NOME: ";
$Body .= $name;
$Body .= "\n";

$Body .= "EMAIL: ";
$Body .= $email;
$Body .= "\n";

$Body .= "TELEFONE: ";
$Body .= $phone;
$Body .= "\n";

$Body .= "MENSAGEM: ";
$Body .= $message;
$Body .= "\n";

// conexao do bd
$db_mysql = new PDO("mysql:host=localhost:3306;dbname=convenio_bdcliente","convenio_bdcli","CS$13as47");

// Save in DB
$db_mysql->exec("INSERT INTO contato(tipo, nome, email, celular, mensagem) VALUES('$tipo','$name','$email','$phone','$message')");

// Disconects DB
unset($db_mysql);

// Send mail 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

//If success , redirect to index.html
if ($success){
	//echo "mensagem enviada com sucesso";
	header("Location:index.php");
	}
else{
    echo "erro ao enviar mensagem";
}

?>