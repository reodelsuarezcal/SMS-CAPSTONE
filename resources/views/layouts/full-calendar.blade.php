<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Calendar</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <button class="add-event-btn" id="toggleEventForm" aria-label="Add new event">+ Add Event</button>
            <form class="event-form" id="eventForm">
                <input type="hidden" id="eventId">
                <div class="form-group">
                    <label for="eventTitle">Title</label>
                    <input type="text" id="eventTitle" required>
                </div>
                <div class="form-group">
                    <label for="eventLabel">Label</label>
                    <select id="eventLabel" required>
                        <option value="Personal">Personal</option>
                        <option value="Academic">Academic</option>
                        <option value="Health">Health</option>
                        <option value="Conference">Conference</option>
                        <option value="Festival">Festival</option>
                        <option value="Celebration">Celebration</option>
                        <option value="Sports">Sports</option>
                        <option value="Tour">Tour</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="startDateTime">Start Date & Time</label>
                    <input type="datetime-local" id="startDateTime" required>
                </div>
                <div class="form-group">
                    <label for="endDateTime">End Date & Time</label>
                    <input type="datetime-local" id="endDateTime" required>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location">
                </div>
                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea id="note"></textarea>
                </div>
                <button type="submit" class="submit-btn">Save Event</button>
                <button type="button" id="deleteEventBtn" style="display: none;" aria-label="Delete event">Delete</button>
            </form>

            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        Upcoming Events
                    </h2>
                </div>
                <div class="card-content">
                    <div class="event-list">
                        <div class="empty-state">
                            No upcoming events in the next 30 days
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="calendar-container">
            <div class="calendar-header">
                <div class="month-navigation">
                    <button id="prevPeriod" class="arrow-btn" aria-label="Previous month">‹</button>
                    <h2 id="currentPeriod">October 2024</h2>
                    <button id="nextPeriod" class="arrow-btn" aria-label="Next month">›</button>
                </div>
                <div class="view-options">
                    <button class="view-btn active" id="monthView">Month</button>
                    <button class="view-btn" id="weekView">Week</button>
                    <button class="view-btn" id="dayView">Day</button>
                </div>
            </div>

            <div class="calendar-grid">
                <div class="weekdays" id="weekdaysHeader">
                    <span>Sun</span>
                    <span>Mon</span>
                    <span>Tue</span>
                    <span>Wed</span>
                    <span>Thu</span>
                    <span>Fri</span>
                    <span>Sat</span>
                </div>
                <div class="calendar month-view" id="calendar">
                    <!-- JavaScript will populate this with days -->
                </div>
            </div>

    <div id="deleteConfirmationModal" class="modal" role="dialog" aria-labelledby="deleteModalTitle" aria-modal="true">
        <div class="modal-content">
            <button class="close-btn" id="closeModalBtn" aria-label="Close modal">×</button>
            <div class="modal-header">
                <svg class="warning-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h3 id="deleteModalTitle">Confirm Deletion</h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this item? This action is permanent and cannot be undone.</p>
            </div>
            <div class="modal-buttons">
                <button id="noDeleteBtn" class="modal-btn cancel-btn">Cancel</button>
                <button id="yesDeleteBtn" class="modal-btn confirm-btn">
                    <span class="spinner" hidden></span>
                    <span class="btn-text">Delete</span>
                </button>
            </div>
        </div>
    </div>    
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>