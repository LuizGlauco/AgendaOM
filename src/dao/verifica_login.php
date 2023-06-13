<?php 
//conecta ao banco de dados
include "../conexao.php";

//session expire de 120m
@session_cache_expire(120);

//session_start inicia a sessão
@session_start();

//dados recebidos via post pelo form login.php
$login = $_POST['usuario'];

//devtemp..colocar md5
$senha = $_POST['senha']; 

//senha cript com md5
$senha_cript = md5($_POST['senha']);

//evitar usuario e senha em branco
if(empty($usuario) || empty($senha)){
    echo "<script language='javascript'>window.location='index.php';</script>";
}else{
    //conectando por PDO - posso usar em banco diferentes Mysql Postgree :D
    $res = $pdo->prepare("SELECT * FROM usuarios where usuario = :usuario and senha = :senha");
    $res->bindValue(":usuario", $usuario);
    $res->bindValue(":senha", $senha);
    $res->execute();

    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    $linhas = count($dados);

    if($linhas > 0){
        $_SESSION['usuario'] = $dados[0]['usuario'];
        $_SESSION['email'] = $dados[0]['email'];
        $header('location:../index.php');
    }else{
        unset ($_SESSION['usuario']);
        unset ($_SESSION['senha']);
        header('location:../login.php?erro=1');
    }
}
?>