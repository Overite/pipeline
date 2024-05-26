document.addEventListener('DOMContentLoaded', function() {
    const menuIcon = document.getElementById('menu-icon');
    const navLinks = document.getElementById('nav-links');
    const links = document.querySelectorAll('#nav-link li');

    menuIcon.addEventListener('click', () => {
        navLinks.classList.toggle('hidden');
    });

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const anchor = this.querySelector('a');
            const href = anchor.getAttribute('href');

            e.preventDefault();
            links.forEach(link => link.classList.remove('active'));
            this.classList.add('active');

            localStorage.setItem('activelink', href);
            window.location.hash = href;
        });
    });

    // Activate the current link based on the hash in the URL
    const activeLink = localStorage.getItem('activelink');
    if (activeLink) {
        const activeElement = document.querySelector(`#nav-link li a[href="${activeLink}"]`);
        if (activeElement) {
            activeElement.closest('li').classList.add('active');
        }
    }
});



// Function to toggle between "Tanker Log" and "Pipeline Log"
function toggleLog() {
    var logTitle = document.getElementById("logTitle");

    // Toggle between "Log" and "Tanker Log" or "Pipeline Log"
    if (logTitle.innerText === "Log" || logTitle.innerText === "Pipeline Log") {
        logTitle.innerText = "Tanker Log";
        fetchTankerData();
    } else if (logTitle.innerText === "Tanker Log") {
        logTitle.innerText = "Pipeline Log";
        fetchPipelineData();
    }
}

// Function to fetch tanker data from the server and update the table
function fetchTankerData() {
    fetch('server/log/fetch_tanker_data.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById("logDataBody").innerHTML = "";
            Object.keys(data).forEach(table => {
                var row = data[table];
                var newRow = document.createElement("tr");
                newRow.innerHTML = `
                  
                    <td style="padding: 10px;">${row['sn']}</td>
                    <td style="padding: 10px;">${row['lat']} ${row['lng']}</td>
                    <td style="padding: 10px;">${row['location']}</td>
                    <td style="padding: 10px;">${row['pms_level']}</td>
                    <td style="padding: 10px;">${formatDateToLagosTime(row['Timestamp'])}</td>
                `;
                document.getElementById("logDataBody").appendChild(newRow);
            });
        })
        .catch(error => console.error('Error fetching tanker data:', error));
}


//=========================================     ===============================================//


// Function to fetch pipeline data from the server and update the table
function fetchPipelineData() {
    fetch('server/log/fetch_pipeline_data.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById("logDataBody").innerHTML = "";
            Object.keys(data).forEach(table => {
                var row = data[table];
                var newRow = document.createElement("tr");
                newRow.innerHTML = `
                   
                    <td style="padding: 10px; padding-right: -30px;">${row['pi_id']}</td>
                    <td style="padding: 10px; padding-right: -30px;">${row['latitude']} ${row['longitude']}</td>
                    <td style="padding: 10px; padding-right: -30px;">${row['flowrate'] || row['location']}</td>
                    <td style="padding: 10px; padding-right: -30px;">${row['vibration'] || row['pms_level']}</td>
                    <td style="padding: 10px; padding-right: -30px;">${formatDateToLagosTime(row['timestamp'])}</td>
                `;
                document.getElementById("logDataBody").appendChild(newRow);
            });
        })
        .catch(error => console.error('Error fetching pipeline data:', error));
}

// Function to format date to Lagos time and desired format
function formatDateToLagosTime(timestamp) {
    var date = new Date(timestamp);
    var options = { timeZone: 'Africa/Lagos', day: 'numeric', month: 'long', year: 'numeric' };
    var formattedDate = date.toLocaleDateString('en-GB', options);
    var day = date.getDate();
    var suffix = getDaySuffix(day);
    formattedDate = formattedDate.replace(day, day + suffix);
    return formattedDate;
}

// Function to get day suffix
function getDaySuffix(day) {
    if (day > 3 && day < 21) return 'th';
    switch (day % 10) {
        case 1: return 'st';
        case 2: return 'nd';
        case 3: return 'rd';
        default: return 'th';
    }
}

// Add click event listener to the "Log" section
document.getElementById("logSection").addEventListener("click", toggleLog);

// Fetch initial data
fetchTankerData(); // Start with tanker data

// Set interval to fetch data every 5 seconds
setInterval(toggleLog, 5000);

//===================================================   =================================================//


 // Function to fetch notifications from the server and populate the list
 function fetchNotifications() {
    fetch('server/log/fetch_notifications.php')
        .then(response => response.json())
        .then(data => {
            const notificationList = document.getElementById('notificationList');
            notificationList.innerHTML = ''; // Clear existing notifications
            
            // Loop through each notification and create HTML elements
            data.forEach(notification => {
                const li = document.createElement('li');
                li.innerHTML = `
                    <div style="display: flex; align-items: center; justify-content: space-between; color: #fff;" data-id="${notification.id}">
                        <div style="display: flex; align-items: center; gap: 1px;">
                            <span>
                                <img src="assets/icons/truck.svg" alt="">
                            </span>
                            <span style="font-size: 14px; font-weight: 400;">${notification.message} ${notification.location}</span>
                        </div>
                        <span style="cursor: pointer; width: 12px; height: 12px; background-color: #fff;" onclick="deleteNotification(${notification.id})"></span>
                    </div>
                `;
                notificationList.appendChild(li);
            });
        })
        .catch(error => console.error('Error fetching notifications:', error));
}

// Function to delete a notification
function deleteNotification(id) {
    fetch(`server/log/delete_notification.php?id=${id}`, { method: 'DELETE' })
        .then(response => {
            if (response.ok) {
                // Remove the deleted notification from the list
                const notification = document.querySelector(`[data-id="${id}"]`);
                if (notification) {
                    notification.remove();
                }
            } else {
                console.error('Failed to delete notification:', response.statusText);
            }
        })
        .catch(error => console.error('Error deleting notification:', error));
}

// Fetch notifications when the page loads
window.onload = fetchNotifications;
// Set interval to fetch data every 5 seconds
setInterval(fetchNotifications, 5000);