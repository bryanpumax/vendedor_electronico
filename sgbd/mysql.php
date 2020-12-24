<?php 
     $usuario="vendedor";
    $password="electronico"; 
    $serve="localhost";
    $bdd="vendedor";
    $puerto="";
try{$pdo = new PDO(   "mysql:host=$serve;dbname=$bdd;charset=utf8",$usuario, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

}catch (PDOException $e){die();}
/*  para  probar  la  conexion
     $usuario="vendedor";
    $password="electronico"; 
    $serve="localhost";
    $bdd="vendedor";
    $puerto="";
try{$pdo = new PDO(   "mysql:host=$serve;dbname=$bdd;charset=utf8",$usuario, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$cantidad=0;
  foreach($pdo->query('SHOW TABLEs') as $fila) {
        $cantidad++;
    }
    echo $cantidad;
}catch (PDOException $e){die();}

 */
?>