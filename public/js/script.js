// class Calendar {
//     constructor() {
//         this.events = [];
//         this.currentDate = new Date();
//         this.currentView = 'month';
//         this.initializeCalendar();
//         this.bindEvents();
//     }

//     initializeCalendar() {
//         this.updateCalendarHeader();
//         this.renderCalendar();
//         this.updateUpcomingEvents();
//     }

//     bindEvents() {
//         $('#prevPeriod').click(() => this.navigatePeriod(-1));
//         $('#nextPeriod').click(() => this.navigatePeriod(1));

//         $('.view-btn').click((e) => {
//             $('.view-btn').removeClass('active');
//             $(e.target).addClass('active');
//             this.currentView = e.target.id.replace('View', '');
//             this.renderCalendar();
//         });

//         $('#toggleEventForm').click(() => {
//             $('#eventForm').slideToggle();
//         });

//         $('#eventForm').on('submit', (e) => {
//             e.preventDefault();
//             this.handleEventSubmit();
//         });

//         $('#deleteEventBtn').click(() => {
//             // Show the confirmation popup
//             $('#deleteConfirmationModal').show();
//         });

//         $('#noDeleteBtn').click(() => {
//             // Hide the confirmation popup
//             $('#deleteConfirmationModal').hide();
//         });

//         $('#yesDeleteBtn').click(() => {
//             const eventId = $('#eventId').val();
//             this.deleteEvent(Number(eventId));
//             // Hide the confirmation popup after deleting
//             $('#deleteConfirmationModal').hide();
//         });

//         $('#closeModalBtn').click(() => {
//             $('#deleteConfirmationModal').hide();
//         });
//     }

//     handleEventSubmit() {
//         const formData = {
//             title: $('#eventTitle').val(),
//             label: $('#eventLabel').val(),
//             start: new Date($('#startDateTime').val()),
//             end: new Date($('#endDateTime').val()),
//             location: $('#location').val(),
//             note: $('#note').val(),
//             id: $('#eventId').val() ? Number($('#eventId').val()) : null
//         };

//         // Validate the event
//         if (!this.validateEvent(formData)) {
//             alert('Please make sure the event details are correct.');
//             return;
//         }

//         if (formData.id) {
//             this.updateEvent(formData);
//         } else {
//             this.addEvent(formData);
//         }
//         this.resetEventForm();
//     }

//     validateEvent(eventData) {
//         if (!eventData.title || !eventData.start || !eventData.end) {
//             return false; // Title, start, and end are required
//         }
//         if (eventData.end <= eventData.start) {
//             return false; // End date must be after start date
//         }
//         return true;
//     }

//     resetEventForm() {
//         $('#eventForm')[0].reset();
//         $('#eventId').val('');
//         $('#deleteEventBtn').hide();
//         $('#eventForm').slideUp();
//     }

//     navigatePeriod(direction) {
//         switch (this.currentView) {
//             case 'month':
//                 this.currentDate.setMonth(this.currentDate.getMonth() + direction);
//                 break;
//             case 'week':
//                 this.currentDate.setDate(this.currentDate.getDate() + (direction * 7));
//                 break;
//             case 'day':
//                 this.currentDate.setDate(this.currentDate.getDate() + direction);
//                 break;
//         }
//         this.updateCalendarHeader();
//         this.renderCalendar();
//     }

//     updateCalendarHeader() {
//         const options = { year: 'numeric', month: 'long' };
//         if (this.currentView === 'day') {
//             options.day = 'numeric';
//         }
//         $('#currentPeriod').text(this.currentDate.toLocaleDateString('en-US', options));
//     }

//     renderCalendar() {
//         const $calendar = $('#calendar');
//         $calendar.empty();
//         $calendar.removeClass().addClass(`calendar ${this.currentView}-view`);

//         switch (this.currentView) {
//             case 'month':
//                 this.renderMonthView($calendar);
//                 break;
//             case 'week':
//                 this.renderWeekView($calendar);
//                 break;
//             case 'day':
//                 this.renderDayView($calendar);
//                 break;
//         }
//     }

//     renderMonthView($calendar) {
//         const firstDay = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), 1);
//         const lastDay = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, 0);
//         const startDate = new Date(firstDay);
//         startDate.setDate(startDate.getDate() - startDate.getDay());

//         for (let i = 0; i < 42; i++) {
//             const currentDate = new Date(startDate);
//             currentDate.setDate(startDate.getDate() + i);

//             const isOtherMonth = currentDate.getMonth() !== this.currentDate.getMonth();
//             const isToday = this.isToday(currentDate);

//             const $dayElement = this.createDayElement(currentDate, isOtherMonth, isToday);
//             this.addEventsToDay($dayElement, currentDate);
//             $calendar.append($dayElement);
//         }
//     }

//     renderWeekView($calendar) {
//         const weekStart = new Date(this.currentDate);
//         weekStart.setDate(weekStart.getDate() - weekStart.getDay());

//         for (let i = 0; i < 7; i++) {
//             const currentDate = new Date(weekStart);
//             currentDate.setDate(weekStart.getDate() + i);

//             const $dayElement = this.createDayElement(currentDate, false, this.isToday(currentDate));
//             this.addEventsToDay($dayElement, currentDate);
//             $calendar.append($dayElement);
//         }
//     }

//     renderDayView($calendar) {
//         const $dayElement = this.createDayElement(this.currentDate, false, true);
//         this.addEventsToDay($dayElement, this.currentDate);
//         $calendar.append($dayElement);
//     }

//     createDayElement(date, isOtherMonth, isToday) {
//         const $dayElement = $('<div>')
//             .addClass('calendar-day')
//             .addClass(isOtherMonth ? 'other-month' : '')
//             .addClass(isToday ? 'current-day' : '');

//         $dayElement.append($('<div>')
//             .addClass('day-number')
//             .text(date.getDate()));

//         if (this.currentView === 'day') {
//             const $timeSlots = $('<div>').addClass('time-slots');
//             for (let hour = 0; hour < 24; hour++) {
//                 $timeSlots.append($('<div>')
//                     .addClass('time-slot')
//                     .text(`${hour.toString().padStart(2, '0')}:00`));
//             }
//             $dayElement.append($timeSlots);
//         }

//         return $dayElement;
//     }

//     addEventsToDay($dayElement, date) {
//         const dayEvents = this.events.filter(event => 
//             this.isSameDay(new Date(event.start), date)
//         );

//         dayEvents.forEach(event => {
//             const startDate = event.start.toLocaleString('en-US', {
//                 month: 'long', day: 'numeric', year: 'numeric', hour: '2-digit', minute: '2-digit'
//             });
//             const endDate = event.end.toLocaleString('en-US', {
//                 month: 'long', day: 'numeric', year: 'numeric', hour: '2-digit', minute: '2-digit'
//             });

//             const $event = $('<div>')
//                 .addClass('event')
//                 .addClass(event.label)
//                 .text(event.title)
//                 .attr('title', `${startDate} - ${endDate}\nLocation: ${event.location || 'N/A'}`)
//                 .click(() => this.displayEventDetails(event));

//             if (this.currentView === 'day') {
//                 const startHour = event.start.getHours();
//                 const $timeSlots = $dayElement.find('.time-slots');
//                 $timeSlots.children().eq(startHour).append($event);
//             } else {
//                 $dayElement.append($event);
//             }
//         });
//     }

//     isSameDay(date1, date2) {
//         return date1.getFullYear() === date2.getFullYear() &&
//                date1.getMonth() === date2.getMonth() &&
//                date1.getDate() === date2.getDate();
//     }

//     updateUpcomingEvents() {
//         const upcomingEvents = this.getUpcomingEvents();
//         const $eventList = $('.event-list');
//         $eventList.empty();
    
//         $eventList.html('<div class="events-container"></div>');
//         const $eventsContainer = $eventList.find('.events-container');
    
//         if (upcomingEvents.length === 0) {
//             $eventsContainer.html(`
//                 <div class="empty-state">
//                     No upcoming events in the next 30 days
//                 </div>
//             `);
//             return;
//         }
    
//         upcomingEvents.forEach((event, index) => {
//             const isLastItem = index === upcomingEvents.length - 1;
            
//             $eventsContainer.append(`
//                 <div class="event-item" style="margin: 0 8px 8px 8px; ${isLastItem ? 'margin-bottom: 5px;' : ''}">
//                     <div class="event-header" onclick="calendar.displayEventDetails(${JSON.stringify(event)})">
//                         <span class="event-title">${event.title}</span>
//                         <span class="event-label" style="background-color: ${this.getEventColor(event.label)}">
//                             ${event.label}
//                         </span>
//                     </div>
//                     <div class="event-details">
//                         <div class="event-detail">
//                             <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
//                                 <circle cx="12" cy="12" r="10"></circle>
//                                 <polyline points="12 6 12 12 16 14"></polyline>
//                             </svg>
//                             ${event.start.toLocaleDateString()} ${event.start.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}
//                         </div>
//                         ${event.location ? `
//                         <div class="event-detail">
//                             <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
//                                 <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
//                                 <circle cx="12" cy="10" r="3"></circle>
//                             </svg>
//                             ${event.location}
//                         </div>
//                         ` : ''}
//                     </div>
//                 </div>
//             `);
//         });

//         if (upcomingEvents.length > 0) {
//             const latestEvent = $eventsContainer.children().last();
//             if (latestEvent.length > 0) {
//                 latestEvent.css('margin-bottom', '5');
//             }
//         }
//     }

//     displayEventDetails(event) {
//         $('#eventId').val(event.id);
//         $('#eventTitle').val(event.title);
//         $('#eventLabel').val(event.label);
//         $('#location').val(event.location);
//         $('#note').val(event.note);

//         // Format start and end dates for display
//         const startDate = event.start.toLocaleString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
//         const startTime = event.start.toLocaleTimeString([], { hour: 'numeric', minute: 'numeric', hour12: true });
//         const endDate = event.end.toLocaleString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
//         const endTime = event.end.toLocaleTimeString([], { hour: 'numeric', minute: 'numeric', hour12: true });

//         $('#startDateTime').val(event.start.toISOString().slice(0, 16));
//         $('#endDateTime').val(event.end.toISOString().slice(0, 16));

//         // Display date and time range below location in the specified format
//         $('#eventDateRange').html(`${startDate}, start ${startTime} - end ${endDate}, ${endTime}`);

//         $('#eventForm').slideDown();
//         $('.submit-btn').text('Save Changes');
//         $('#deleteEventBtn').show();
//     }

//     addEvent(eventData) {
//         const newEvent = { ...eventData, id: Date.now() };
//         this.events.push(newEvent);
//         this.renderCalendar();
//         this.updateUpcomingEvents();
//     }

//     updateEvent(updatedEvent) {
//         const index = this.events.findIndex(event => event.id === updatedEvent.id);
//         if (index !== -1) {
//             this.events[index] = updatedEvent;
//             this.renderCalendar();
//             this.updateUpcomingEvents();
//         }
//     }

//     deleteEvent(eventId) {
//         this.events = this.events.filter(event => event.id !== eventId);
//         this.renderCalendar();
//         this.updateUpcomingEvents();
//         this.resetEventForm();
//     }

//     getUpcomingEvents() {
//         const now = new Date();
//         const oneMonthFromNow = new Date(now);
//         oneMonthFromNow.setDate(now.getDate() + 30);

//         return this.events.filter(event => event.start > now && event.start < oneMonthFromNow)
//                           .sort((a, b) => a.start - b.start);
//     }

//     getEventColor(label) {
//         const colors = {
//             'Personal': '#FF8C00',    // Dark Orange
//             'Academic': '#FFD700',     // Gold
//             'Health': '#32CD32',       // Lime Green
//             'Conference': '#4682B4',   // Steel Blue
//             'Festival': '#00BFFF',     // Deep Sky Blue
//             'Celebration': '#800000',   // Maroon
//             'Sports': '#5F9EA0',       // Cadet Blue
//             'Tour': '#8A2BE2',         // Blue Violet
//             'Others': '#b7b3b3',       // Light Gray
//         };
//         return colors[label] || "#000000";
//     }

//     isToday(date) {
//         const today = new Date();
//         return date.getDate() === today.getDate() &&
//                date.getMonth() === today.getMonth() &&
//                date.getFullYear() === today.getFullYear();
//     }
// }

// // Initialize the calendar
// $(document).ready(() => {
//     window.calendar = new Calendar();
// });

class Calendar {
    constructor() {
        this.events = [];
        this.currentDate = new Date();
        this.currentView = 'month';
        this.initializeCalendar();
        this.bindEvents();
    }

    initializeCalendar() {
        this.updateCalendarHeader();
        this.renderCalendar();
        this.updateUpcomingEvents();
    }

    bindEvents() {
        $('#prevPeriod').click(() => this.navigatePeriod(-1));
        $('#nextPeriod').click(() => this.navigatePeriod(1));

        $('.view-btn').click((e) => {
            $('.view-btn').removeClass('active');
            $(e.target).addClass('active');
            this.currentView = e.target.id.replace('View', '');
            this.renderCalendar();
        });

        $('#toggleEventForm').click(() => {
            $('#eventForm').slideToggle();
        });

        $('#eventForm').on('submit', (e) => {
            e.preventDefault();
            this.handleEventSubmit();
        });

        $('#deleteEventBtn').click(() => {
            $('#deleteConfirmationModal').show();
        });

        $('#noDeleteBtn').click(() => {
            $('#deleteConfirmationModal').hide();
        });

        $('#yesDeleteBtn').click(() => {
            const eventId = $('#eventId').val();
            this.deleteEvent(Number(eventId));
            $('#deleteConfirmationModal').hide();
        });

        $('#closeModalBtn').click(() => {
            $('#deleteConfirmationModal').hide();
        });
    }

    handleEventSubmit() {
        const formData = {
            title: $('#eventTitle').val(),
            label: $('#eventLabel').val(),
            start: new Date($('#startDateTime').val()),
            end: new Date($('#endDateTime').val()),
            location: $('#location').val(),
            note: $('#note').val(),
            id: $('#eventId').val() ? Number($('#eventId').val()) : null
        };

        if (!this.validateEvent(formData)) {
            alert('Please make sure the event details are correct.');
            return;
        }

        if (formData.id) {
            this.updateEvent(formData);
        } else {
            this.addEvent(formData);
        }
        this.resetEventForm();
    }

    validateEvent(eventData) {
        if (!eventData.title || !eventData.start || !eventData.end) {
            return false;
        }
        if (eventData.end <= eventData.start) {
            return false;
        }
        return true;
    }

    resetEventForm() {
        $('#eventForm')[0].reset();
        $('#eventId').val('');
        $('#deleteEventBtn').hide();
        $('#eventForm').slideUp();
    }

    navigatePeriod(direction) {
        switch (this.currentView) {
            case 'month':
                this.currentDate.setMonth(this.currentDate.getMonth() + direction);
                break;
            case 'week':
                this.currentDate.setDate(this.currentDate.getDate() + (direction * 7));
                break;
            case 'day':
                this.currentDate.setDate(this.currentDate.getDate() + direction);
                break;
        }
        this.updateCalendarHeader();
        this.renderCalendar();
    }

    updateCalendarHeader() {
        const options = { year: 'numeric', month: 'long' };
        if (this.currentView === 'day') {
            options.day = 'numeric';
        }
        $('#currentPeriod').text(this.currentDate.toLocaleDateString('en-US', options));
    }

    renderCalendar() {
        const $calendar = $('#calendar');
        $calendar.empty();
        $calendar.removeClass().addClass(`calendar ${this.currentView}-view`);

        switch (this.currentView) {
            case 'month':
                this.renderMonthView($calendar);
                break;
            case 'week':
                this.renderWeekView($calendar);
                break;
            case 'day':
                this.renderDayView($calendar);
                break;
        }
    }

    renderMonthView($calendar) {
        const firstDay = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth(), 1);
        const lastDay = new Date(this.currentDate.getFullYear(), this.currentDate.getMonth() + 1, 0);
        const startDate = new Date(firstDay);
        startDate.setDate(startDate.getDate() - startDate.getDay());

        for (let i = 0; i < 42; i++) {
            const currentDate = new Date(startDate);
            currentDate.setDate(startDate.getDate() + i);

            const isOtherMonth = currentDate.getMonth() !== this.currentDate.getMonth();
            const isToday = this.isToday(currentDate);

            const $dayElement = this.createDayElement(currentDate, isOtherMonth, isToday);
            this.addEventsToDay($dayElement, currentDate);
            $calendar.append($dayElement);
        }
    }

    renderWeekView($calendar) {
        const weekStart = new Date(this.currentDate);
        weekStart.setDate(weekStart.getDate() - weekStart.getDay());

        for (let i = 0; i < 7; i++) {
            const currentDate = new Date(weekStart);
            currentDate.setDate(weekStart.getDate() + i);

            const $dayElement = this.createDayElement(currentDate, false, this.isToday(currentDate));
            this.addEventsToDay($dayElement, currentDate);
            $calendar.append($dayElement);
        }
    }

    renderDayView($calendar) {
        const $dayElement = this.createDayElement(this.currentDate, false, true);
        this.addEventsToDay($dayElement, this.currentDate);
        $calendar.append($dayElement);
    }

    createDayElement(date, isOtherMonth, isToday) {
        const $dayElement = $('<div>')
            .addClass('calendar-day')
            .addClass(isOtherMonth ? 'other-month' : '')
            .addClass(isToday ? 'current-day' : '');

        $dayElement.append($('<div>')
            .addClass('day-number')
            .text(date.getDate()));

        if (this.currentView === 'day') {
            const $timeSlots = $('<div>').addClass('time-slots');
            for (let hour = 0; hour < 24; hour++) {
                $timeSlots.append($('<div>')
                    .addClass('time-slot')
                    .text(`${hour.toString().padStart(2, '0')}:00`));
            }
            $dayElement.append($timeSlots);
        }

        return $dayElement;
    }

    addEventsToDay($dayElement, date) {
        const dayEvents = this.events.filter(event => 
            this.isSameDay(new Date(event.start), date)
        );

        dayEvents.forEach(event => {
            const startDate = event.start.toLocaleString('en-US', {
                month: 'long', day: 'numeric', year: 'numeric', hour: '2-digit', minute: '2-digit'
            });
            const endDate = event.end.toLocaleString('en-US', {
                month: 'long', day: 'numeric', year: 'numeric', hour: '2-digit', minute: '2-digit'
            });

            const $event = $('<div>')
                .addClass('event')
                .addClass(event.label)
                .text(event.title)
                .attr('title', `${startDate} - ${endDate}\nLocation: ${event.location || 'N/A'}`)
                .click(() => this.displayEventDetails(event));

            if (this.currentView === 'day') {
                const startHour = event.start.getHours();
                const $timeSlots = $dayElement.find('.time-slots');
                $timeSlots.children().eq(startHour).append($event);
            } else {
                $dayElement.append($event);
            }
        });
    }

    isSameDay(date1, date2) {
        return date1.getFullYear() === date2.getFullYear() &&
               date1.getMonth() === date2.getMonth() &&
               date1.getDate() === date2.getDate();
    }

    updateUpcomingEvents() {
        const upcomingEvents = this.getUpcomingEvents();
        const $eventList = $('.event-list');
        $eventList.empty();
    
        $eventList.html('<div class="events-container"></div>');
        const $eventsContainer = $eventList.find('.events-container');
    
        if (upcomingEvents.length === 0) {
            $eventsContainer.html(`
                <div class="empty-state">
                    No upcoming events in the next 30 days
                </div>
            `);
            return;
        }
    
        upcomingEvents.forEach((event, index) => {
            const isLastItem = index === upcomingEvents.length - 1;
            
            $eventsContainer.append(`
                <div class="event-item" style="margin: 0 8px 8px 8px; ${isLastItem ? 'margin-bottom: 5px;' : ''}">
                    <div class="event-header" onclick="calendar.displayEventDetails(${JSON.stringify(event)})">
                        <span class="event-title">${event.title}</span>
                        <span class="event-label" style="background-color: ${this.getEventColor(event.label)}">
                            ${event.label}
                        </span>
                    </div>
                    <div class="event-details">
                        <div class="event-detail">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <span class="event-time">${this.formatEventDate(event)}</span>
                        </div>
                        <div class="event-detail">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 7V3M4 7h16M5 21l3-3a5 5 0 0 1 7 0l3 3"></path>
                            </svg>
                            <span class="event-location">${event.location || 'No location'}</span>
                        </div>
                    </div>
                </div>
            `);
        });
    }

    getUpcomingEvents() {
        const today = new Date();
        const oneMonthLater = new Date(today);
        oneMonthLater.setDate(today.getDate() + 30);
    
        return this.events.filter(event => 
            new Date(event.start) >= today && new Date(event.start) <= oneMonthLater
        ).sort((a, b) => new Date(a.start) - new Date(b.start));
    }

    getEventColor(label) {
        const colors = {
            "Meeting": "#D32F2F",
            "Appointment": "#303F9F",
            "Holiday": "#388E3C",
            "Birthday": "#FBC02D",
        };
        return colors[label] || '#616161';
    }

    formatEventDate(event) {
        const startDate = new Date(event.start).toLocaleString('en-US', {
            month: 'long', day: 'numeric', year: 'numeric', hour: '2-digit', minute: '2-digit'
        });
        const endDate = new Date(event.end).toLocaleString('en-US', {
            month: 'long', day: 'numeric', year: 'numeric', hour: '2-digit', minute: '2-digit'
        });
        return `${startDate} - ${endDate}`;
    }

    isToday(date) {
        const today = new Date();
        return today.getFullYear() === date.getFullYear() &&
               today.getMonth() === date.getMonth() &&
               today.getDate() === date.getDate();
    }

    displayEventDetails(event) {
        $('#eventTitle').val(event.title);
        $('#eventLabel').val(event.label);
        $('#startDateTime').val(event.start.toISOString().slice(0, -8));
        $('#endDateTime').val(event.end.toISOString().slice(0, -8));
        $('#location').val(event.location);
        $('#note').val(event.note);
        $('#eventId').val(event.id);
        $('#deleteEventBtn').show();
        $('#eventForm').slideDown();
    }

    addEvent(formData) {
        console.log(formData); // This logs the formData to check if it has all necessary data
$.ajax({
    url: '/events',
    type: 'POST',
    data: {
        title: formData.title,
        label: formData.label,
        start: formData.start.toISOString(),
        end: formData.end.toISOString(),
        location: formData.location,
        note: formData.note,
    },
    success: (newEvent) => {
        console.log("Event successfully added:", newEvent);
        // rest of the code remains the same
    },
    error: (xhr, status, error) => {
        console.error("Error adding event:", error);
    }
});

    }

    updateEvent(formData) {
        $.ajax({
            url: `/events/${formData.id}`,
            type: 'PUT',
            data: {
                title: formData.title,
                label: formData.label,
                start: formData.start.toISOString(),
                end: formData.end.toISOString(),
                location: formData.location,
                note: formData.note,
            },
            success: (updatedEvent) => {
                const index = this.events.findIndex(event => event.id === formData.id);
                this.events[index] = {
                    ...updatedEvent,
                    start: new Date(updatedEvent.start),
                    end: new Date(updatedEvent.end),
                };
                this.resetEventForm();
                this.updateUpcomingEvents();
                this.renderCalendar();
            }
        });
    }

    deleteEvent(eventId) {
        $.ajax({
            url: `/events/${eventId}`,
            type: 'DELETE',
            success: () => {
                this.events = this.events.filter(event => event.id !== eventId);
                this.updateUpcomingEvents();
                this.renderCalendar();
            }
        });
    }
}

const calendar = new Calendar();
