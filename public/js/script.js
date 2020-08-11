

$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".sendConfirmation").click(function () {

        let id = $("#modalCalendar input[name='id']").val();
        let email= $("#modalCalendar input[name='email']").val();
        let start= $("#modalCalendar input[name='start']").val();
        let title= $("#modalCalendar input[name='title']").val();

        let Event = {
            id: id,
            email: email,
            start: start,
            title: title,
            _method:'POST'
        };

        let route = routeEvents('routeEventSend');

        sendEvent(route,Event);
    });

    $(".deleteEvent").click(function () {

        let id = $("#modalCalendar input[name='id']").val();

        let Event = {
            id: id,
            _method:'DELETE'
        };

       let route = routeEvents('routeEventDelete');

        sendEvent(route,Event);
    });



    $(".saveEvent").click(function () {

        let id = $("#modalCalendar input[name='id']").val();

        let title = $("#modalCalendar input[name='title']").val();

        let NumberOfPeople = $("#modalCalendar input[name='NumberOfPeople']").val();

        let name = $("#modalCalendar input[name='name']").val();

        let start = moment($("#modalCalendar input[name='start']").val(),"DD/MM/YYYY HH-mm-ss").format("YYYY-MM-DD HH:mm:ss");

        let end = moment($("#modalCalendar input[name='end']").val(),"DD/MM/YYYY HH-mm-ss").format("YYYY-MM-DD HH:mm:ss");

        let phone = $("#modalCalendar input[name='phone']").val();

        let email = $("#modalCalendar input[name='email']").val();

        let color = $("#modalCalendar input[name='color']").val();

        let description = $("#modalCalendar textarea[name='description']").val();

        let Event = {
            id: id,
            title : title,
            NumberOfPeople: NumberOfPeople,
            name: name,
            start: start,
            end: end,
            color: color,
            email: email,
            phone : phone,
            description: description,
            };

        let route;

        if( id == ''){
            route=routeEvents('routeEventStore');
        }else{
            route=routeEvents('routeEventUpdate');
            Event.id = id;
            Event._method='PUT';
        }
            sendEvent(route,Event);
        });
});

function sendEvent(route,data_){

    $.ajax(  {
        url:route,
        data:data_,
        method:'POST',
        dataType:'json',
        success:function(json) {
            if(json){
                location.reload();
            }
        },
        error:function (json) {

            let responseJSON = json.errors;

            $("#message").html(loadErrors(responseJSON));
        }

    });
}

function loadErrors(response) {

    let boxAlert = `<div class="alert alert-danger">`;

    for (let fields in response){
        boxAlert += `<span>${response[fields]}</span><br/>`;
    }
    boxAlert +=`</div>`;

    return boxAlert.replace(/\,/g,"<br/>");
}

function routeEvents (route){

    return document.getElementById('calendar').dataset[route];
}

function clearMessage(element) {

    $(element).text('');

}

function resetForm(form) {
    $(form)[0].reset();
}


