let currentPlatform = null;

function showOptions(platformId) {
    currentPlatform = platformId;
    fetch(`index.php?plataforma=${platformId}`)// fetch(`server.php?plataforma=${platformId}`)
        .then(response => response.json())
        .then(data => {
            
            if (data.success) {
                const list = document.getElementById('instrument-list');
                list.innerHTML = '';
                data.instrumentos.forEach(inst => {
               
                    
                    const li = document.createElement('li');
                    li.innerHTML = `
                        <input type="text" value="${inst.nombre}" onchange="editInstrument(${inst.id}, this.value)">
                        <button onclick="deleteInstrument(${inst.id})">Eliminar</button>
                    `;
                    list.appendChild(li);
                });
                document.getElementById('modal-register').classList.add('active');
            }
        });
}

function logout() {
    var ajax = new XMLHttpRequest();

    
    ajax.addEventListener('readystatechange',function(evento){

        if(evento.target.readyState != 4){
            return;
        }
        if(evento.target.status <= 200 && evento.target.status < 300){

            console.log(evento.target.responseText);

        }else{

        }
    });

    ajax.open("GET",'index.php?logout');
    ajax.send();
}
function closeModal() {
    document.querySelector('.modal.active').classList.remove('active');
}

document.getElementById('instrument-form').addEventListener('submit', function (e) {
    e.preventDefault();
    var datos = new FormData(document.getElementById('instrument-form'));

    //const name = document.getElementById('instrument').value.trim();
    
    datos.append('action','add');
    datos.append('plataforma',currentPlatform);

    fetch('index.php', {
        
        method: 'POST',
        //headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        //body: `action=add&plataforma=${currentPlatform}&nombre=${name}`
        body: datos
    }).then(() => showOptions(currentPlatform));


    document.getElementById('instrument').value = "";
});

function editInstrument(id, newName) {
    fetch('index.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `action=edit&id=${id}&nombre=${newName}`
    });
}

function deleteInstrument(id) {
    fetch('index.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `action=delete&id=${id}`
    }).then(() => showOptions(currentPlatform));
}
function searchInstrument() {
    const query = document.getElementById('search-input').value.trim();
    if (!query) {
        document.getElementById('search-result').textContent = "Introduce un nombre para buscar.";
        return;
    }
    fetch(`index.php?action=searchInstrument&nombre=${encodeURIComponent(query)}`)// fetch(`server.php?action=searchInstrument&nombre=${encodeURIComponent(query)}`)
        .then(res => res.json())
        .then(data => {
            const result = document.getElementById('search-result');
            if (data.success) {
                const platform = data.platform;
             
                result.textContent = `El instrumento "${query}" se encuentra en: ${platform}`;
            } else {
                result.textContent = `El instrumento "${query}" no fue encontrado.`;
            }
        });
        document.getElementById('search-input').value = "";
}
document.addEventListener('DOMContentLoaded', async () => {
// Llama a la función para obtener el rol del usuario
const userRole = await getUserRole();

if (userRole === 'invitado') {
// Restringe acciones para usuarios invitados
document.getElementById('instrument-form').style.display = 'none';
document.querySelectorAll('.crud-button').forEach(btn => btn.style.display = 'none');
} else if (userRole === 'admin') {
// Admin tiene acceso completo
console.log("Usuario con permisos completos.");
} else {
// Si no hay rol o no está autenticado
alert("No tienes permisos para acceder a esta página.");
window.location.href = 'index.php';
}
});

// Función para obtener el rol del usuario actual
function getUserRole() {
return fetch('index.php?action=getUserRole')
.then(response => response.json())
.then(data => {
    if (data.success) {
        return data.rol; // Devuelve el rol del usuario
    } else {
        console.error("Error obteniendo el rol:", data.error);
        return null;
    }
})
.catch(error => {
    console.error("Error en la solicitud:", error);
    return null;
});
}

