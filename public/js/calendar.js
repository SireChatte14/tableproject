

document.addEventListener('DOMContentLoaded', function() {
    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    /* initialize the external events
    -----------------------------------------------------------------*/

    var containerEl = document.getElementById('external-events-list');
    new Draggable(containerEl, {
        itemSelector: '.fc-event',
        eventData: function(eventEl) {
            return {
                title: eventEl.innerText.trim()
            }
        }
    });

    //// the individual way to do it
    // var containerEl = document.getElementById('external-events-list');
    // var eventEls = Array.prototype.slice.call(
    //   containerEl.querySelectorAll('.fc-event')
    // );
    // eventEls.forEach(function(eventEl) {
    //   new Draggable(eventEl, {
    //     eventData: {
    //       title: eventEl.innerText.trim(),
    //     }
    //   });
    // });

    /* initialize the calendar
    -----------------------------------------------------------------*/

    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        locale: 'de',
        navLinks: true,
        eventLimit:true,
        selectable: true,
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function(element) {

            let Event = JSON.parse(element.draggedEL.dataset.event);
            // is the "remove after drop" checkbox checked?
            if (document.getElementById('drop-remove').checked) {
                // if so, remove the element from the "Draggable Events" list
                element.draggedEl.parentNode.removeChild(element.draggedEl);
            }

            let start = moment(element.event.start).format("YYYY-MM-DD HH-mm-ss");
            let end = moment(element.event.end).format("YYYY-MM-DD HH-mm-ss");
        },
        eventDrop: function (element) {



            let newEvent = {
                _method:'PUT',
                title: element.event.title,
                NumberOfPeople: element.event.extendedProps.NumberOfPeople,
                phone: element.event.extendedProps.phone,
                name: element.event.extendedProps.name,
                id: element.event.id,
                start: start,
                email: element.event.extendedProps.email,
                end: end
            };

            sendEvent(routeEvents('routeEventUpdate'),newEvent);

        },

        eventClick: function (element) {

            clearMessage('#message');
            resetForm("#formEvent");

            $("#modalCalendar").modal('show');
            $("#modalCalendar #titleModal").text('Reservierung');
            $("#modalCalendar button.deleteEvent").css("display","flex");

            let id = element.event.id;
            $("#modalCalendar input[name='id']").val(id);

            let title = element.event.title;
            $("#modalCalendar input[name='title']").val(title);

            let NumberOfPeople = element.event.extendedProps.NumberOfPeople;
            $("#modalCalendar input[name='NumberOfPeople']").val(NumberOfPeople);

            let phone = element.event.extendedProps.phone;
            $("#modalCalendar input[name='phone']").val(phone);

            let name = element.event.extendedProps.name;
            $("#modalCalendar input[name='name']").val(name);

            let start = moment(element.event.start).format("DD/MM/YYYY HH-mm-ss");
            $("#modalCalendar input[name='start']").val(start);

            let end = moment(element.event.end).format("DD/MM/YYYY HH-mm-ss");
            $("#modalCalendar input[name='end']").val(end);

            let email = element.event.extendedProps.email;
            $("#modalCalendar input[name='email']").val(email);

            let color = element.event.backgroundColor;
            $("#modalCalendar input[name='color']").val(color);

            let description = element.event.extendedProps.description;
            $("#modalCalendar textarea[name='description']").val(description);

            console.log(element);

        },

        eventResize: function (element) {
            let start = moment(element.event.start).format("YYYY-MM-DD HH-mm-ss");
            let end = moment(element.event.end).format("YYYY-MM-DD HH-mm-ss");

            let newEvent = {
                _method:'PUT',
                id: element.event.id,
                start: start,
                end: end,
            };

            sendEvent(routeEvents('routeEventUpdate'),newEvent);

        },
        select: function (element) {

            clearMessage('#message');
            resetForm("#formEvent");

            $("#modalCalendar").modal('show');
            $("#modalCalendar #titleModal").text('Neue Reservierung');
            $("#modalCalendar button.deleteEvent").css("display","none");

            let start = moment(element.start).format("DD/MM/YYYY HH-mm-ss");
            $("#modalCalendar input[name='start']").val(start);

            let end = moment(element.end).format("DD/MM/YYYY HH-mm-ss");
            $("#modalCalendar input[name='end']").val(end);

            let color = element.backgroundColor;
            $("#modalCalendar input[name='color']").val('#3788D8');

            calendar.unselect();
        },

        events: routeEvents('routeLoadEvents'),
    });
    calendar.render();
});




