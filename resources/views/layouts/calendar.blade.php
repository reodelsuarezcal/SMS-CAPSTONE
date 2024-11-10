<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel FullCalendar Tutorial with Sidebar</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap & jQuery -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- FullCalendar & Moment.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <!-- Toastr for notifications -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <!-- Custom styles for the sidebar -->
    <style>
        .sidebar {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 15px;
            max-height: 400px;
            overflow-y: auto;
        }
        .sidebar h4 {
            text-align: center;
        }
        .event-item {
            margin-bottom: 10px;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .event-item:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>

<div class="container"> 
    <h1>BSMS - CALENDAR</h1>

    <div class="row">
        <!-- Calendar -->
        <div class="col-md-8">
            <div id='calendar'></div>
        </div>

        <!-- Sidebar -->
        <div class="col-md-4 sidebar">
            <h4>Booked Events</h4>
            <div id="event-list">
                @if($events->isNotEmpty())
                    @foreach($events as $event)
                        <div class="event-item">
                            <strong>Title:</strong> {{ $event->title }}<br>
                            <strong>Date:</strong> {{ \Carbon\Carbon::parse($event->start)->format('F j, Y') }} to {{ \Carbon\Carbon::parse($event->end)->format('F j, Y') }}
                        </div>
                    @endforeach
                @else
                    <p>No booked events available.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    var SITEURL = "{{ url('/') }}";

    // Setup CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Function to fetch and display events in the sidebar
    function loadEventsInSidebar() {
        $.ajax({
            url: SITEURL + '/fullcalender',
            type: 'GET',
            success: function (events) {
                var eventList = $('#event-list');
                eventList.empty(); // Clear the current list
                
                if (events.length > 0) {
                    events.forEach(function(event) {
                        eventList.append(`
                            <div class="event-item">
                                <strong>Title:</strong> ${event.title}<br>
                                <strong>Date:</strong> ${event.start} to ${event.end}
                            </div>
                        `);
                    });
                } else {
                    eventList.append('<p>No booked events available.</p>');
                }
            },
            error: function (xhr) {
                console.error("Failed to fetch events:", xhr.responseText);
            }
        });
    }

    // Initialize FullCalendar
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: SITEURL + "/fullcalender",
        displayEventTime: false,
        selectable: true,
        selectHelper: true,

        // Select event to create
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD");

                $.ajax({
                    url: SITEURL + "/fullcalenderAjax",
                    data: {
                        title: title,
                        start: start,
                        end: end,
                        type: 'add'
                    },
                    type: "POST",
                    success: function (data) {
                        displayMessage("Event Created Successfully");

                        calendar.fullCalendar('renderEvent', {
                            id: data.id,
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        }, true);

                        calendar.fullCalendar('unselect');
                        loadEventsInSidebar(); // Refresh sidebar
                    },
                    error: function (xhr) {
                        console.error("Error:", xhr.responseText);
                    }
                });
            }
        },

        // Event Drag/Drop
        eventDrop: function (event, delta) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

            $.ajax({
                url: SITEURL + '/fullcalenderAjax',
                data: {
                    title: event.title,
                    start: start,
                    end: end,
                    id: event.id,
                    type: 'update'
                },
                type: "POST",
                success: function () {
                    displayMessage("Event Updated Successfully");
                    loadEventsInSidebar(); // Refresh sidebar
                },
                error: function (xhr) {
                    console.error("Error:", xhr.responseText);
                }
            });
        },

        // Event Click (Edit or Delete)
        eventClick: function (event) {
            var newTitle = prompt("Edit Event Title:", event.title);
            if (newTitle) {
                // Update the title
                $.ajax({
                    url: SITEURL + '/fullcalenderAjax',
                    data: {
                        title: newTitle,
                        start: $.fullCalendar.formatDate(event.start, "Y-MM-DD"),
                        end: $.fullCalendar.formatDate(event.end, "Y-MM-DD"),
                        id: event.id,
                        type: 'update'
                    },
                    type: "POST",
                    success: function () {
                        event.title = newTitle;
                        $('#calendar').fullCalendar('updateEvent', event);  // Update event in calendar
                        displayMessage("Event Updated Successfully");
                        loadEventsInSidebar();  // Refresh sidebar
                    },
                    error: function (xhr) {
                        console.error("Error:", xhr.responseText);
                    }
                });
            } else {
                var deleteMsg = confirm("Do you really want to delete?");
                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + '/fullcalenderAjax',
                        data: {
                            id: event.id,
                            type: 'delete'
                        },
                        success: function () {
                            calendar.fullCalendar('removeEvents', event.id);
                            displayMessage("Event Deleted Successfully");
                            loadEventsInSidebar();  // Refresh sidebar
                        },
                        error: function (xhr) {
                            console.error("Error:", xhr.responseText);
                        }
                    });
                }
            }
        }
    });

    // Load events initially in the sidebar
    loadEventsInSidebar();
});

// Toastr success message display function
function displayMessage(message) {
    toastr.success(message, 'Event');
}
</script>

</body>
</html>
