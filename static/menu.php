<?php
$menu = [
    [
        "title" => "Management Group",
        "mainLink" => "management",
        "subLinks" => ["portal", "view", "map", "status"],
        "submenu" => ["Portal", "View", "Map", "Status"],
        "icon" => '<i class="fa-sharp fa-solid fa-traffic-light"></i>',
    ],
    [
        "title" => "Views",
        "mainLink" => "views",
        "subLinks" => ["cameraViewSingle", "cameraViewMulti", "recording"],
        "submenu" => ["Single Camera", "Multi Camera", "Recording Options"],
        "icon" => '<i class="fa-solid fa-tv"></i>',
    ],
    [
        "title" => "Reports",
        "mainLink" => "reports",
        "subLinks" => ["dailySummary", "statistics", "history", "notifications"],
        "submenu" => ["Daily Summary", "Statistics", "History Viewer", "Notifications"],
        "icon" => '<i class="fa-solid fa-chart-simple"></i>',
    ],
    [
        "title" => "Settings",
        "mainLink" => "settings",
        "subLinks" => ["config/configure", "renamePhases", "gps", "ntp", "corridorDesigner", "portalDesigner", "maintenance", "emailTester", "troubleshooting"],
        "submenu" => ["Configure Detectors", "Rename Phases", "GPS Coordinates", "NTP Server", "View Designer", "Portal Designer", "Maintenance", "Email Test", "Troubleshooting"],
        "icon" => '<i class="fa-solid fa-gear"></i>',
    ],
    [
        "title" => "Account",
        "mainLink" => "account",
        "subLinks" => ["editUsers", "invalidLogins"],
        "submenu" => ["Edit Users", "Invalid Logins"],
        "icon" => '<i class="fa-solid fa-user"></i>',
    ],
];
