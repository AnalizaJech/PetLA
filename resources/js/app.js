import './bootstrap';
import "./mascotas/index";


import Alpine from 'alpinejs';
import Swal from "sweetalert2";
import './alerts/index';

window.Alpine = Alpine;
window.Swal = Swal;

Alpine.start();

