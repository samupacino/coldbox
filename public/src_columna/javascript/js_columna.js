//let currentPlatform = null;

function showOptions(platformId,planta) {
    //currentPlatform = platformId;

    var plataforma_actual =  document.getElementById('modal-register');
    plataforma_actual.setAttribute('name',platformId);
    

  
    fetch(`index.php?action=listxplataforma&plataforma=${platformId}&planta=${planta}`)// fetch(`server.php?plataforma=${platformId}`)
        .then(response => response.json())
        .then(data => {
            
            if (data.success) {
                const list = document.getElementById('instrument-list');
                list.innerHTML = '';
                data.instrumentos.forEach(inst => {
                    const li = document.createElement('li');
                    li.innerHTML = `
                        <input type="text" id="edit_value" value="${inst.nombre}" onchange="editInstrument(${inst.id}, this.value, ${planta})">
                        <button onclick="deleteInstrument(${inst.id}, '${planta}')">Eliminar</button>`;
                    list.appendChild(li);
                });
                document.getElementById('modal-register').classList.add('active');
            }
        });
}

function logout() {
    var ajax = new XMLHttpRequest();

    
    ajax.addEventListener('readystatechange',function(evento){
        evento.preventDefault();
        if(evento.target.readyState != 4){
            return;
        }
        if(evento.target.status <= 200 && evento.target.status < 300){

            console.log("funciona sesion");

        }else{

        }
    });

    ajax.open("GET",'index.php?action=logout&planta');
    ajax.send();
}
function closeModal() {
    var planta =  document.getElementById('');
    var inputElement = document.getElementById('modal-register');
    inputElement.removeAttribute('name');

    document.querySelector('.modal.active').classList.remove('active');
}
function validateInput(name) {
    const regex = /^[a-zA-Z0-9]+(?:-[a-zA-Z0-9]+)*$/;


    if (regex.test(name)) {
      return true;
    } else {
        
        alert('Entrada inválida');
        return false;
    }
  }


function validando_input(){
    document.getElementById('mensaje_error').textContent = "";
}  
// Delegación de eventos para el formulario

function prueba(event){
    console.log(event.target);
}
function registro_instrumento(){
    document.addEventListener('submit', function (event) {
        // Verifica que el evento se origine en el formulario dinámico
        var currentPlatform =  document.getElementById('modal-register').getAttribute('name');
       
        var planta = document.getElementById('instrument-form').getAttribute('name').trim();

        if (event.target && event.target.matches('#instrument-form')) {
            event.preventDefault(); // Evita el envío por defecto del formulario
           
            var datos = new FormData(document.getElementById('instrument-form'));

            if(!validateInput(datos.get('nombre').trim())){
                document.getElementById('instrument').value = "";
                return;
            }
            datos.append('action','add');
            datos.append('plataforma',currentPlatform);

            fetch(`index.php?planta=${planta}`, {
                method: 'POST',
                //headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                //body: `action=add&plataforma=${currentPlatform}&nombre=${name}`
                body: datos
            }).then(data=>data.json())
            .then(data => {
            
                if(data.success){
                    showOptions(currentPlatform,planta);
                }else{
                    var mensaje_error = document.getElementById('mensaje_error');
                    mensaje_error.textContent = data.message;
                }
                
                
            });
            
            document.getElementById('instrument').value = "";
            // Aquí puedes realizar otras acciones, como enviar datos mediante fetch
        }
    });
}
function editInstrument(id, newName, planta) {

    if(!validateInput(newName.trim())){
        
        return;
    }
    fetch(`index.php?planta=${planta}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `action=edit&id=${id}&nombre=${newName}`
    });
}

function deleteInstrument(id,planta) {
    var currentPlatform =  document.getElementById('modal-register').getAttribute('name');
    fetch(`index.php?planta=${planta}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `action=delete&id=${id}`
    }).then(() => showOptions(currentPlatform,planta));
}

function searchInstrument(planta) {
    const query = document.getElementById('search-input').value.trim();
    if (!query) {
        document.getElementById('search-result').textContent = "Introduce un nombre para buscar.";
        return;
    }
    fetch(`index.php?action=searchInstrument&nombre=${encodeURIComponent(query)}&planta=${planta}`)// fetch(`server.php?action=searchInstrument&nombre=${encodeURIComponent(query)}`)
        .then(res => res.json())
        .then(data => {
            const result = document.getElementById('search-result');
            if (data.success) {
                
              
                result.textContent = `El instrumento "${data.platform[0]['nombre']}" se encuentra en la plataforma: ${data.platform[0]['plataforma']}`;
            } else {
                
                result.textContent = `El instrumento "${query}" no fue encontrado.`;
            }
        });
        document.getElementById('search-input').value = "";
}
  function obteniendo_rol(){
    document.addEventListener('DOMContentLoaded', async function() {
        //var planta = document.getElementById('instrument-form').getAttribute('name').trim();
        // Llama a la función para obtener el rol del usuario

        const userRole =  await getUserRole();
    
        if (userRole === 'invitado') {
        // Restringe acciones para usuarios invitados
        //document.getElementById('instrument-form').style.display = 'none';
        //document.querySelectorAll('.crud-button').forEach(btn => btn.style.display = 'none');
        } else if (userRole === 'admin') {
        // Admin tiene acceso completo
        //console.log("Usuario con permisos completos.");
        } else {
        // Si no hay rol o no está autenticado
        alert("No tienes permisos para acceder a esta página.");
        //window.location.href = `index.php`;
        }
    });
}

// Función para obtener el rol del usuario actual
async function getUserRole() {
    try {
        const response = await fetch('index.php?action=getUserRole&planta=pl2');
        const data = await response.json();

        if (data.success) {
            return data.rol; // Devuelve el rol del usuario
        } else {
            console.error("Error obteniendo el rol:", data.error);
            return null;
        }
    } catch (error) {
        console.error("Error en la solicitud:", error);
        return null;
    }
}


function seleccion_planta(event){
    event.preventDefault();
    var planta = event.target.getAttribute('href');
    var planta = event.target.getAttribute('href');
    console.log(planta);
    fetch(`index.php?action=seleccionplanta&planta=${planta}`)
    .then(response => response.text())
    .then(data =>{ 
        document.querySelector('.body-text').innerHTML = data;
    })
  
}
obteniendo_rol();
window.onload = function(){
    registro_instrumento();
   
}