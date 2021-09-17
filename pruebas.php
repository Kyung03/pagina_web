<!DOCTYPE html>
<html>
<body onload="">
<button onclick="resultada()">resultada</button>
<button onclick="prueba()">resultado 2</button>

<div id ="result"> 
    <table id ="tabla">    
    </table> 
</div>
    
    


<script>
// Check browser support
function resultada(){
    if (typeof(Storage) !== "undefined") {
  // Store 
  // Retrieve 
    document.getElementById("result").innerHTML = localStorage.getItem('productos');
    } else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
    }
}

function resultado(){
    if (typeof(Storage) !== "undefined") {
  // Store 
  // Retrieve
  var obj = JSON.parse(localStorage.getItem('productos'));
  document.getElementById("result").innerHTML = obj;
    } else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
    }
}

function prueba(){
    if (typeof(Storage) !== "undefined") {
  // Store 
  // Retrieve
  var obj = JSON.parse(localStorage.getItem('productos'));
  obj.forEach(function (producto){
    const row = document.createElement('tr');
                row.innerHTML = ` 
                <td><input  name='cod' value='${producto.id}' /></td> 
                <td> <img src="${producto.imagen}" width=100> </td>
                <td>${producto.titulo}</td>
                <td>${producto.precio}</td>
                <td> <input  name='cant' value='${producto.cantidad}' /></td>
                <td id='subtotales'>${producto.precio * producto.cantidad}</td>   
                
            `;  
            <?php 
                include("conexion.php"); 
                $con=conectar();
                $codigo = 1;
                $cantidad =  1; 
                $sql= "INSERT INTO `carretilla_compra` (`codigo_producto`, `cantidad`) 
                VALUES ('$codigo', '$cantidad')"; 
                mysqli_query($con,$sql);  
                ?>
            document.getElementById("tabla").appendChild(row);
    }); 
    } else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
    }
} 

</script>

</body>
</html>
<script>
    const listaCompra = document.querySelector("#lista-compra tbody");
    obtenerProductosLocalStorage(){
        let productoLS;

        //Comprobar si hay algo en LS
        if(localStorage.getItem('productos') === null){
            productoLS = [];
        }
        else {
            productoLS = JSON.parse(localStorage.getItem('productos'));
        }
        return productoLS;
    }
calcularTotal(){
        let productosLS; 
        productosLS = this.obtenerProductosLocalStorage();
        for(let i = 0; i < productosLS.length; i++){ 
            document.getElementById('productos').innerHTML =  "S/. ";
        }
        
    }
    function    ResumenCompra(){
        let productosLS;
        productosLS = this.obtenerProductosLocalStorage();
        productosLS.forEach(function (producto){
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <img src="${producto.imagen}" width=100>
                </td>
                <td>${producto.titulo}</td>
                <td>${producto.precio}</td>
                <td>
                    <input type="number" class="form-control cantidad" min="1" value=${producto.cantidad}>
                </td>
                <td id='subtotales'>${producto.precio * producto.cantidad}</td>
                <td>
                    <a href="#" class="borrar-producto fas fa-times-circle" style="font-size:30px" data-id="${producto.id}"></a>
                </td>
            `;
            listaCompra.appendChild(row);
            
        });
    }
</script>