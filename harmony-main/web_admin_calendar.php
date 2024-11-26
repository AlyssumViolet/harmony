<?php if (isset($user) && ($user["role_fld"]) == "Administrator") { ?>
<!-- CONTENT -->

<style>
    /* Calendar Styling */
    .calendar {
        margin: 20px auto;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .calendar-header {
        background-color: #007bff;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
    }

    .calendar-header button {
        background: none;
        border: none;
        color: white;
        font-size: 18px;
        cursor: pointer;
    }

    .calendar-header button:hover {
        opacity: 0.8;
    }

    .calendar-header h2 {
        font-size: 20px;
        margin: 0;
    }

    .calendar-days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        background-color: #f1f1f1;
        padding: 10px;
        text-align: center;
        font-weight: bold;
    }

    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        padding: 10px;
    }

    .calendar-grid div {
        text-align: center;
        padding: 10px;
        margin: 5px;
        border-radius: 5px;
        cursor: pointer;
    }

    .calendar-grid div.today {
        background-color: #007bff;
        color: white;
    }

    .calendar-grid div:hover {
        background-color: #007bff;
        color: white;
    }

    @media (max-width: 768px) {
        .calendar-header h2 {
            font-size: 16px;
        }

        .calendar-grid div {
            padding: 5px;
        }
    }
</style>

<!-- Header -->
<header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-calendar"></i> Calendar</b></h5>
</header>



<div class="w3-container">
    <div class="calendar">
        <!-- Calendar Header -->
        <div class="calendar-header">
            <button onclick="prevMonth()">&#9664;</button>
            <h2 id="monthYear"></h2>
            <button onclick="nextMonth()">&#9654;</button>
        </div>
        <!-- Days of the Week -->
        <div class="calendar-days">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
        </div>
        <!-- Calendar Dates -->
        <div class="calendar-grid" id="calendar"></div>
    </div>
</div>



<script>
    const monthNames = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();

    function renderCalendar() {
        const calendar = document.getElementById("calendar");
        const monthYear = document.getElementById("monthYear");
        calendar.innerHTML = "";

        const firstDay = new Date(currentYear, currentMonth, 1).getDay();
        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

        monthYear.textContent = `${monthNames[currentMonth]} ${currentYear}`;

        for (let i = 0; i < firstDay; i++) {
            const emptyDiv = document.createElement("div");
            calendar.appendChild(emptyDiv);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const dayDiv = document.createElement("div");
            dayDiv.textContent = day;

            const today = new Date();
            if (
                day === today.getDate() &&
                currentMonth === today.getMonth() &&
                currentYear === today.getFullYear()
            ) {
                dayDiv.classList.add("today");
            }
            calendar.appendChild(dayDiv);
        }
    }

    function prevMonth() {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar();
    }

    function nextMonth() {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar();
    }

    // Render the initial calendar
    renderCalendar();
</script>

<!-- End of Header -->

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<!-- Footer -->
<footer class="w3-container w3-padding-16 w3-gray">
    <center><p>Administrator Privileges | Powered by <b>Harmony</b></p></center>
</footer>

<!-- End page content -->
<?php } else {
    header("Location: index.php");
    exit;
} ?>
