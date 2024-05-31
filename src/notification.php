<?php require 'server/database/db.php';

session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.html'); // Redirect to the login page if not logged in
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notification</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/notification.css">
    <link rel="stylesheet" href="styles/output.css">
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
$(document).ready(function () {
    $.ajax({
        url: 'server/log/fetch_notifications_b.php',
        type: 'GET',
        success: function (data) {
            const notifications = JSON.parse(data);
            let notificationHtml = '';
            notifications.forEach(notification => {
                notificationHtml += `
                    <div class="notification-card" data-id="${notification.id}" data-message="${notification.message}" data-location="${notification.location}">
                        <div style="display: flex; align-items: center;">
                            <span>
                                <img src="assets/icons/note.png" alt="">
                            </span>
                            <p>${notification.message.substring(0, 30)}...</p>
                        </div>
                        <div style="display: flex; align-items: end; justify-content: space-between; flex-direction: column; font-weight: 400; line-height: 17.92px;">
                            <span class="delete-notification" style="cursor: pointer;">
                                <img src="assets/icons/dot.svg" alt="Delete">
                            </span>
                            <p style="font-size: 14px; font-weight: 400; line-height: 17.92px;">${new Date(notification.timestamp).toLocaleTimeString()}</p>
                        </div>
                    </div>
                `;
            });
            $('.notification-left').append(notificationHtml);
            
            $('.notification-card').click(function () {
                const message = $(this).data('message');
                const location = $(this).data('location');
                $('.notification-right').html(`
                    <div>
                        <span>
                            <img src="assets/icons/bigbell.png" class="bell-icon" alt="">
                        </span>
                        <p>${message}</p>
                        <button id="view-on-map" style="background-color:#342345; border-radius:8px; color: #fff; padding: 10px 20px; border: none; font-size: 16px; cursor: pointer;">View on Map</button>
                    </div>
                `);

                $('#view-on-map').click(function () {
                    if (message.includes('pipeline')) {
                        window.location.href = 'pipeline_map.php';
                    } else if (message.includes('tanker')) {
                        window.location.href = 'tanker_map.php';
                    }
                });

                $('.bell-icon').click(function () {
                    if (message.includes('pipeline')) {
                        window.location.href = 'pipeline_map.php';
                    } else if (message.includes('tanker')) {
                        window.location.href = 'tanker_map.php';
                    }
                });
            });

            $('.delete-notification').click(function (e) {
                e.stopPropagation(); // Prevent the click event from propagating to the .notification-card
                const id = $(this).closest('.notification-card').data('id');
                $.ajax({
                    url: 'server/log/delete_notification.php',
                    type: 'POST',
                    data: { id: id },
                    success: function (response) {
                        if (response === 'success') {
                            $(`.notification-card[data-id=${id}]`).remove();
                        } else {
                            alert('Failed to delete notification');
                        }
                    }
                });
            });
        }
    });
});
</script>


</head>
<body>
<!-- hearder setion code  -->
<?php require 'sections/header.php';?>


<main class="notification-container">
        <div class="notification-row">
            <div class="notification-left">
                <h1>Notification</h1>
            </div>
            <div class="notification-right">
                <div>
                    <span>
                        <img src="assets/icons/bigbell.png" class="bell-icon" alt="">
                    </span>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="main.js"></script>
</html>