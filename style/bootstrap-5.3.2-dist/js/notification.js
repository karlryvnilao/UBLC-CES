// Add this code to your existing script
$(document).on('click', '.dropdown-toggle', function(){
    load_notifications();
    mark_notifications_as_read();
});

function load_notifications() {
    $.ajax({
        url: "add_announcement.php",
        method: "POST",
        data: {},
        dataType: "json",
        success: function(data) {
            // Display notifications
            var notifications = data.notification;
            var notificationList = $('.dropdown-menu');
            
            if (notifications.length > 0) {
                for (var i = 0; i < notifications.length; i++) {
                    var notificationText = notifications[i]['announcement_text'];
                    var listItem = '<li><a href="#">' + notificationText + '</a></li>';
                    notificationList.append(listItem);
                }
            } else {
                var listItem = '<li><a href="#">No new notifications</a></li>';
                notificationList.append(listItem);
            }
        }
    });
}

function mark_notifications_as_read() {
    $.ajax({
        url: "add_announcement.php", // Create a new PHP file (mark_read.php)
        method: "POST",
        data: {},
        success: function(data) {
            // Handle success if needed
        }
    });
}
