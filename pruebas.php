<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html>
<body onload="prueba()">
<button type="submit" id="button">SAVE</button>
<button onclick="prueba()">resultado 2</button>

<div id ="result"> 
    <table id ="tabla">    
    </table> 
</div>
    
    


<script>
    $(document).ready(function(){
        
            $("#button").click(function(){
                
                //var name=$("#name").val(); 
                //var clienteid=$("#clienteid").val();
                //var mpago=$("#mpago").val();
                $.ajax({
                    url:'prueba_modelo.php',
                    method:'POST',
                    data:{
                        'lista': JSON.stringify(lista),
                        'lista_precios': JSON.stringify(lista_precios),
                        'lista_cantidad': JSON.stringify(lista_cantidad),
                        'lista_nombres': JSON.stringify(lista_nombres),
                        //clienteid:clienteid,
                        //mpago:mpago
                    },
                   success:function(data){
                       alert(data);
                   }
                });
            });
        });
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
var lista = [];
var lista_cantidad = [];
var lista_precios = [];
var lista_nombres = [];
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
            lista.push(producto.id);
            lista_cantidad.push(producto.cantidad);
            lista_precios.push(producto.precio);
            lista_nombres.push(producto.titulo);
            //alert(lista);  
            //alert(lista_precios);
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