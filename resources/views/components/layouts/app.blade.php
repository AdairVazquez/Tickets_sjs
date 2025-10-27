<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
        {{ $slot }}
        @livewireScripts
       
        <script type="module">
            import {
                initializeApp
            } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-app.js";
            import {
                getDatabase,
                ref,
                push,
                onChildAdded,
                serverTimestamp
            } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-database.js";

            // aqui entran las credenciales

            
            const app = initializeApp(firebaseConfig);
            const db = getDatabase(app);

            
        </script> 
        @stack('scripts')
    </flux:main>
</x-layouts.app.sidebar>
