<?php 
                include("conexion.php");
                $con=conectar();
                $codigo =  $_POST["cod"];
                $cantidad =  $_POST["cant"];
                echo $codigo--;
                echo $codigo--;
                $sql= "INSERT INTO `carretilla_compra` (`codigo_producto`, `cantidad`) 
                VALUES ('$codigo','$cantidad')"; 
                echo $sql;
                mysqli_query($con,$sql);  
?>