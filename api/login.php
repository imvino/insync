<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once("../auth/authSystem.php");

// Get JSON input
$data = json_decode(file_get_contents("php://input"));

if (isset($data->username) && isset($data->password)) {
    $username = base64_decode($data->username);
    $password = base64_decode($data->password);

    $result = authSystem::ValidateLogin($username, $password, true);

    if ($result !== false) {
        // Login successful
        http_response_code(200);
        echo json_encode(array(
            "success" => true,
            "message" => "Login successful",
            "permissions" => $result
        ));
    } else {
        // Login failed
        http_response_code(401);
        echo json_encode(array("success" => false, "message" => "Invalid credentials"));
    }
} else {
    // Invalid input
    http_response_code(400);
    echo json_encode(array("success" => false, "message" => "Invalid input"));
}