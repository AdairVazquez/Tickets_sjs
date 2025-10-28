<div>
    <div class="h-screen flex flex-col">
        <div class="flex-1 relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="h-full flex flex-col rounded-xl border border-neutral-200 dark:border-neutral-700">
                <div class="p-1">
                    <h1 class="dark:text-white text-black text-4xl font-bold">Chat del ticket #{{ $ticketId }}</h1>
                </div>

                <!-- Contenedor del chat (solo aquí habrá scroll) -->
                <div id="chat-container" class="flex-1 overflow-y-auto p-6 bg-gray-200 dark:bg-gray-800 space-y-4">
                </div>



                <!-- Input del chat -->
                <div class="p-4 flex bg-gray-900 border-t border-neutral-700">
                    <input id='mensaje' type="text" placeholder="Escribe un mensaje..."
                        class="w-full rounded-lg p-3 bg-gray-700 text-white focus:outline-none" />
                    <button id="enviar" class="ml-3">@include('flux.icon.send-horizontal')</button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script type="module">
            const ticketId = {{ $ticketId }}
            const idUsuario = {{ $id_usuario }}
            import {
                initializeApp
            } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-app.js";
            import {
                getDatabase,
                ref,
                push,
                onChildAdded,
                serverTimestamp,
                query,
                orderByChild,
                equalTo
            } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-database.js";

            const firebaseConfig = {

                apiKey: "AIzaSyD8ASypj2828Isg8pt-FmmdHsDFX1XxUgE",

                authDomain: "tickets-sjs.firebaseapp.com",

                databaseURL: "https://tickets-sjs-default-rtdb.firebaseio.com",

                projectId: "tickets-sjs",

                storageBucket: "tickets-sjs.firebasestorage.app",

                messagingSenderId: "357550086903",

                appId: "1:357550086903:web:fc4d9f2233ccf91daf11f2"

            };



            const app = initializeApp(firebaseConfig);
            const db = getDatabase(app);

            const chatRef = ref(db, 'chats/mensajes_globales');
            const ticketQuery = query(chatRef, orderByChild('ticketId'), equalTo(ticketId));



            const rol = '{{ $rol }}'
            const nombre = '{{ $nombre_usuario }}'
            const concatenado = nombre + ' | ' + rol

            const mensajesDiv = document.getElementById('chat-container');
            const mensajeInput = document.getElementById('mensaje');
            const enviarBtn = document.getElementById('enviar');
            const inicioChat = Date.now();

            const now = new Date();
            const hora = now.getHours().toString().padStart(2, '0');
            const minuto = now.getMinutes().toString().padStart(2, '0');
            const horaFormateada = `${hora}:${minuto}`;


            document.addEventListener("DOMContentLoaded", function() {
                const chatContainer = document.getElementById("chat-container");
                chatContainer.scrollTop = chatContainer.scrollHeight;
            });

            if ("Notification" in window) {
                Notification.requestPermission().then(permission => {
                    console.log("Permiso de notificaciones:", permission);
                });
            } else {
                console.log("Este navegador no soporta notificaciones.");
            }

            onChildAdded(ticketQuery, (data) => {
                const msg = data.val();
                const div = document.createElement('div');

                if (idUsuario != msg.emisor_id) {
                    
                    if (msg.timestamp > inicioChat) {
                        div.innerHTML = `
                            <div class="flex items-start">
                                <div class="max-w-xs bg-gray-700 text-white p-3 rounded-2xl rounded-bl-none shadow">
                                    <span class="block text-xs text-gray-200 text-right mt-1">${msg.datos}</span>
                                    <p>${msg.mensaje}</p>
                                    <span class="block text-xs text-gray-400 text-right mt-1">${msg.hora}</span>
                                </div>
                            </div>
                        `;
                        mostrarNotificacion('Nuevo mensaje', msg.mensaje);
                    } else {
                        div.innerHTML = `
                            <div class="flex items-start">
                                <div class="max-w-xs bg-gray-700 text-white p-3 rounded-2xl rounded-bl-none shadow">
                                    <span class="block text-xs text-gray-200 text-right mt-1">${msg.datos}</span>
                                    <p>${msg.mensaje}</p>
                                    <span class="block text-xs text-gray-400 text-right mt-1">${msg.hora}</span>
                                </div>
                            </div>
                        `;
                    }
                } else {
                    div.innerHTML = `
                    <div class="flex items-start justify-end">
                        <div class="max-w-xs bg-blue-600 text-white p-3 rounded-2xl rounded-br-none shadow">
                            <span class="block text-xs text-gray-200 text-right mt-1">${msg.datos}</span>
                            <p>${msg.mensaje}</p>
                            <span class="block text-xs text-gray-200 text-right mt-1">${msg.hora}</span>
                        </div>
                    </div>
                `;
                }

                mensajesDiv.appendChild(div);
                mensajesDiv.scrollTop = mensajesDiv.scrollHeight;
            });

            function mostrarNotificacion(titulo, cuerpo) {
                if (Notification.permission === "granted") {
                    new Notification(titulo, {
                        body: cuerpo,

                    });
                }
            }

            enviarBtn.addEventListener('click', () => {
                const mensaje = mensajeInput.value.trim();
                if (mensaje === '') return;
                push(chatRef, {
                    emisor_id: {{ Auth::id() }},
                    mensaje: mensajeInput.value,
                    timestamp: Date.now(),
                    hora: horaFormateada,
                    datos: concatenado,
                    ticketId: ticketId
                });

                mensajeInput.value = '';
            });


            document.addEventListener('keydown', (event) => {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    const mensaje = mensajeInput.value.trim();
                    if (mensaje === '') return;

                    push(chatRef, {
                        emisor_id: {{ Auth::id() }},
                        mensaje: mensaje,
                        timestamp: Date.now(),
                        hora: horaFormateada,
                        datos: concatenado,
                        ticketId: ticketId
                    });

                    mensajeInput.value = '';
                }
            });
        </script>
    @endpush

</div>
