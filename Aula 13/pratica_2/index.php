<?php
    require_once "model\pessoa.php";
    $pessoa = new pessoa;

    $pessoa->setName("Julio");
    $pessoa->setSobreNome("Max");
    $dataNascimento = new DateTime("2006-02-15");
    $pessoa->setDataNascimento($dataNascimento);

    echo "Pessoa".$pessoa->getNomeCompleto(). "<br>";
    echo "idade ".$pessoa->getIdade()."<br>";

?>