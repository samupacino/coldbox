
iniciar_sesion();
function iniciar_sesion(){

    var formulario_sesion = document.getElementById("formulario_sesion");

    formulario_sesion.addEventListener("submit", function(event){

        event.preventDefault();

        var datos = new FormData(document.getElementById("formulario_sesion"));
      
        fetch('login.php?iniciar_sesion',{
            method: 'POST',
            body: datos
        }).then(response => response.json())
        .then(response => {
            console.log(response);
            if(response.success == true){
                window.location.href = '/coldbox/';
            }else{
                alert(response.message);
            }
            //window.location.href = "index.php";s
        });

       
    });
    
}


