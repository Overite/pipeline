document.addEventListener('DOMContentLoaded', function() {
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    const navLinks = document.getElementById('nav-links');
    const links = document.querySelectorAll('#nav-link');
    const activeLink = localStorage.getItem('activelink')

   
    menuIcon.addEventListener('click', ()=>{
        navLinks.classList.toggle('hidden')
    })

    if(activeLink){
        const activeElement = document.querySelector(`a[href="${activeLink}"]`);
        if(activeElement){
            activeElement.classList.add('active')
        }
    }

    links.forEach(link => {
        link.addEventListener('click', (e)=>{
            e.preventDefault()

            links.forEach(link => link.classList.remove('active'));

            this?.classList?.add('active');

    localStorage.setItem('activelink',this?.getAttribute('href'));
    window.location.hash = this.getAttribute('href');
        })
    })
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
                  
                    <td style="padding: 8px;">${row['sn']}</td>
                    <td style="padding: 8px;">${row['lat']} ${row['lng']}</td>
                    <td style="padding: 8px;">${row['location']}</td>
                    <td style="padding: 8px;">${row['pms_level']}</td>
                    <td style="padding: 8px;">${formatDateToLagosTime(row['Timestamp'])}</td>
                `;
                document.getElementById("logDataBody").appendChild(newRow);
            });
        })
        .catch(error => console.error('Error fetching tanker data:', error));
}

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
                   
                    <td style="padding: 8px;">${row['pi_id']}</td>
                    <td style="padding: 8px;">${row['latitude']} ${row['longitude']}</td>
                    <td style="padding: 8px;">${row['flowrate'] || row['location']}</td>
                    <td style="padding: 8px;">${row['vibration'] || row['pms_level']}</td>
                    <td style="padding: 8px;">${formatDateToLagosTime(row['timestamp'])}</td>
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
