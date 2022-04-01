

var myModal = new bootstrap.Modal(document.getElementById('myModal'));
 
let frm = document.getElementById("formulario");


var calendarDiv = document.getElementById('calendar');


var calendar = new FullCalendar.Calendar(calendarDiv, {
    customButtons: {
        add_event: {
            text: '+',
            hint: 'Nueva actividad',
            click: function() {
               frm.reset();
               document.getElementById('titulo').textContent = "Registro de actividad";
               myModal.show(); 
            }
        }
    },
    locales: 'es', 
    initialView: 'dayGridMonth', 
    headerToolbar: { 
        left: 'prev,next', 
        center: 'title', 
        right: 'add_event,dayGridMonth,timeGridWeek,timeGridDay,listMonth,today',

    },
    events: 'actividades.php',
         
    dateClick: function(info){
        frm.reset();
        document.getElementById('btnEliminar').classList.add('d-none');
        document.getElementById('id').value = '';
        document.getElementById('start').value = info.dateStr;
        document.getElementById('titulo').textContent = "Registro de actividad";
        document.getElementById('btnAccion').value = "Registrar"
        myModal.show();

    },
    eventClick: function(info){
       
       /* document.getElementById('evento').textContent = info.event.title;

        if(info.event.extendedProps.description){
            document.getElementById('description').textContent = info.event.extendedProps.description;
        }
        */
       
        document.getElementById('titulo').textContent = "Modificar actividad";
        document.getElementById('btnAccion').value = "Modificar";
        document.getElementById('btnEliminar').classList.remove('d-none');
        document.getElementById('id').value = info.event.id;
        document.getElementById('title').value = info.event.title;
        document.getElementById('start').value = info.event.startStr;
        document.getElementById('color').value = info.event.backgroundColor;
        document.getElementById('obs').value = info.event.extendedProps.description;
        
        myModal.show();
    },
    buttonText: {
        today: 'Hoy',
        month: 'Mes',
        week: 'Semana',
        day: 'Día',
        list: 'Listado',
        
    },
    height:500,
    editable: true,
    displayEventTime: false,
    selectable: true,
    selectHelper: true,
});


calendar.render();
