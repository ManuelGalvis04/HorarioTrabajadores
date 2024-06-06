<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agendar Cita</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
    <form id="scheduleForm" method="POST">
        <input type="text" id="datepicker" name="date" placeholder="Selecciona la fecha">
        <input type="time" name="time" placeholder="Selecciona la hora">
        <button type="submit">Agendar</button>
    </form>
    <ul id="selectedDates"></ul>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
