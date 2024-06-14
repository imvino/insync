<?php
$menu = [
    [
        "title" => "Management Group",
        "subLinks" => ["dashboard.php", "corridorViewer.php", "map/index.php", "corridorStatusNew.php"],
        "submenu" => ["Portal", "View", "Map", "Status"],
        "icon" => '<i class="fa-sharp fa-solid fa-traffic-light"></i>',
    ],
    [
        "title" => "Views",
        "subLinks" => ["cameraViewSingle.php", "cameraViewMulti.php", "recording.php"],
        "submenu" => ["Single Camera", "Multi Camera", "Recording Options"],
        "icon" => '<i class="fa-solid fa-tv"></i>',
    ],
    [
        "title" => "Reports",
        "subLinks" => ["dailySummary.php", "statistics.php", "history.php", "notifications.php"],
        "submenu" => ["Daily Summary", "Statistics", "History Viewer", "Notifications"],
        "icon" => '<i class="fa-solid fa-chart-simple"></i>',
    ],
    [
        "title" => "Settings",
        "subLinks" => ["config/configure.php", "renamePhases.php", "gps.php", "ntp.php", "corridorDesigner.php", "portalDesigner.php", "maintenance.php", "emailTester.php", "troubleshooting.php"],
        "submenu" => ["Configure Detectors", "Rename Phases", "GPS Coordinates", "NTP Server", "View Designer", "Portal Designer", "Maintenance", "Email Test", "Troubleshooting"],
        "icon" => '<i class="fa-solid fa-gear"></i>',
    ],
    [
        "title" => "Account",
        "subLinks" => ["editUsers.php", "invalidLogins.php"],
        "submenu" => ["Edit Users", "Invalid Logins"],
        "icon" => '<i class="fa-solid fa-user"></i>',
    ],
];
