@extends('layouts.app')

@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Calendario de Citas</h1>

        <!-- Calendario -->
        <div id="calendar" class="bg-white p-4 rounded-xl shadow"></div>

        <!-- Modal personalizado -->
        <div x-data="{ show: false, start: '', end: '', title: '' }"
             @open-modal.window="show = true; start = $event.detail.start; end = $event.detail.end"
             x-show="show"
             class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
             x-cloak>
            <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md">
                <h2 class="text-lg font-bold mb-4">Registrar cita</h2>
                <input x-model="title" type="text" placeholder="Título"
                       class="w-full border border-gray-300 p-2 rounded mb-4 focus:outline-none focus:ring focus:border-blue-300">
                <div class="flex justify-end gap-2">
                    <button @click="show = false" class="px-4 py-2 bg-gray-300 rounded">Cancelar</button>
                    <button @click="
                        fetch('/appointments', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ title, start, end })
                        }).then(() => {
                            show = false;
                            window.location.reload();
                        });
                    " class="px-4 py-2 bg-blue-600 text-white rounded">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.min.css" rel="stylesheet" />
    
    <!-- FullCalendar ES locale -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js?locales=all"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es',
                buttonText: {
                    today: 'Hoy'
                },
                plugins: [
                    FullCalendar.dayGridPlugin,
                    FullCalendar.interactionPlugin
                ],
                initialView: 'dayGridMonth',
                selectable: true,
                select: function (info) {
                    window.dispatchEvent(new CustomEvent('open-modal', {
                        detail: {
                            start: info.startStr,
                            end: info.endStr
                        }
                    }));
                },
                events: @json($appointments)
            });

            calendar.render();
        });
    </script>
@endsection
