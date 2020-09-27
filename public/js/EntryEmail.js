
$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".sendConfirmation").click(function () {

        let id = $("#MailModal input[name='id']").val();

        let Event = {
            id: id,
            _method: 'POST'
        };

        let route = routeEvents('routeEventSend');

        sendEvent(route, Event);
    });



});
