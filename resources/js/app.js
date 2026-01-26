import Alpine from 'alpinejs';
import axios from 'axios';
import './echo'
import { createIcons, icons } from 'lucide';

window.Alpine = Alpine;
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

createIcons({ icons });

Alpine.start();
