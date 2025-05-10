import './bootstrap';
import flatpickr from "flatpickr";
import { Spanish } from "flatpickr/dist/l10n/es.js";
import "flatpickr/dist/flatpickr.min.css";
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import Alpine from 'alpinejs';

window.flatpickr = flatpickr;
window.FlatpickrEs = Spanish;

window.Alpine = Alpine;
Alpine.start();

window.FullCalendar = { Calendar, dayGridPlugin, interactionPlugin };
