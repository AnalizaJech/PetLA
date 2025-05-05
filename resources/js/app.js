import './bootstrap';
import flatpickr from "flatpickr";
import { Spanish } from "flatpickr/dist/l10n/es.js";
import "flatpickr/dist/flatpickr.min.css";

window.flatpickr = flatpickr;
window.FlatpickrEs = Spanish;

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

