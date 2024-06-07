$(document).ready(function() {
    $("#datepicker").datepicker({
        onSelect: function(dateText) {
            $("#selectedDates").append("<li>" + dateText + "</li>");
        }
    });

    $("#loginForm").on("submit", function(event) {
        event.preventDefault();
        $.ajax({
            url: '/controllers/AuthController.php?action=login',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
                window.location.href = "/appointment/schedule";
            }
        });
    });

    $("#recoverForm").on("submit", function(event) {
        event.preventDefault();
        $.ajax({
            url: '/controllers/AuthController.php?action=recoverPassword',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
            }
        });
    });

    $("#scheduleForm").on("submit", function(event) {
        event.preventDefault();
        var selectedDates = [];
        $("#selectedDates li").each(function() {
            selectedDates.push($(this).text());
        });

        $.ajax({
            url: '/controllers/AppointmentController.php?action=schedule',
            type: 'POST',
            data: {
                dates: selectedDates,
                time: $("input[name='time']").val()
            },
            success: function(response) {
                alert(response);
            }
        });
    });
});
