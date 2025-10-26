<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h2>Chat en tiempo real</h2>

    <div id="mensajes" style="height: 300px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px;"></div>

    <div class="mt-3">
        <input type="text" id="mensaje" placeholder="Escribe un mensaje..." class="form-control mb-2">
        <button id="enviar" class="btn btn-primary">Enviar</button>
    </div>
</div>

<script type="module">
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-app.js";
  import { getDatabase, ref, push, onChildAdded, serverTimestamp } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-database.js";

 

  const app = initializeApp(firebaseConfig);
  const db = getDatabase(app);
  const chatRef = ref(db, 'chats/general/mensajes');

  const mensajesDiv = document.getElementById('mensajes');
  const enviarBtn = document.getElementById('enviar');
  const mensajeInput = document.getElementById('mensaje');

  // Escuchar mensajes nuevos en tiempo real
  onChildAdded(chatRef, (data) => {
    const msg = data.val();
    const div = document.createElement('div');
    div.innerHTML = `<strong>${msg.usuario}:</strong> ${msg.mensaje}`;
    mensajesDiv.appendChild(div);
    mensajesDiv.scrollTop = mensajesDiv.scrollHeight;
  });

  // Enviar mensaje
  enviarBtn.addEventListener('click', () => {
    const mensaje = mensajeInput.value.trim();
    if (mensaje === '') return;

    push(chatRef, {
      usuario: "{{ Auth::user()->name }}",
      mensaje: mensaje,
      timestamp: Date.now()
    });

    mensajeInput.value = '';
  });
</script>
</body>
</html>