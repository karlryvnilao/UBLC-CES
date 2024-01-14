<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.print.min.css" media="print">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.0/dist/scheduler.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.list.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.0/dist/scheduler.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.list.min.js"></script>
</head>
<body>
    <div class="container">
        <div id="calendar"></div>
        <div id="event-list"></div>
    </div>

    <script>
        $(document).ready(function() {
            // Initialize FullCalendar
            $('#calendar').fullCalendar({
                schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
                editable: true,
                events: 'events.php', // PHP script to fetch events
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek' // Include the list view
                },
                eventRender: function(event, element) {
                    // Customize the way events are rendered on the calendar if needed
                },
            });

            // Initialize List View
            $('#event-list').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'listWeek,month' // Include the list view
                },
                defaultView: 'listWeek',
                events: 'events.php', // PHP script to fetch events
                eventRender: function(event, element) {
                    // Customize the way events are rendered in the list if needed
                },
            });
        });
    </script>
</body>
</html>
