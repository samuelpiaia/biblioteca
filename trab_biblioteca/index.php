<?php
//recebendo da ulr a pagina a ser exibida
//$_GET serve para procurar e pegar elementos de variavel que vao apos o "?"

//para criar uma pagina nova no sistema devemos 
//1- reiar um novo arquivo na pasta pages 
//2-adicionar um botao no nosso menu lateral ("sidebar.php") que e a tag "<a>"
//3- adicionar o link da pagina no "href" da tag "<a>" criada por exemplo: index.php?nome _da_sua_pagina.php 
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = "exemplo.php";
}
//codigo inicial do site
include "template/header.php";
//conteudo do site que sao os arquivos da pasta pages
include "pages/".$page;
//codigo do final do site e fechamos
include "template/footer.php";
?>