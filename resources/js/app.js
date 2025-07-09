import './bootstrap';
import '../css/app.css';
import 'preline';

// Inicializa Preline al cargar el DOM
/* document.addEventListener('DOMContentLoaded', () => {
    window.HSStaticMethods?.autoInit();
}); */
document.addEventListener('livewire:navigated', () => {
    window.HSStaticMethods.autoInit();
}); 

// Re-inicializa Preline después de que Livewire actualice el DOM
/* document.addEventListener('livewire:load', () => {
    Livewire.hook('message.processed', () => {
        window.HSStaticMethods?.autoInit();
    });
}); */