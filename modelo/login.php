<?php

include 'conexion.php';


switch ($_GET["op"]) {

    case "validateAccess":
        $data = json_decode(file_get_contents("php://input"), true);
        if (!empty($data["username"]) || !empty($data["password"])) {
            $query = "SELECT USER_PASSWORD FROM USERS WHERE USER_NAME = ?";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("s", $data["username"]);
            $result = $stmt->execute();
            $password_result = $stmt->get_result()->fetch_object();
            if(empty($password_result)){
                echo json_encode(['result' => false, 'detail' => 'Username does not exist']);
            }else{
                if($password_result->USER_PASSWORD === $data["password"]){
                    echo json_encode(['result' => true]);
                }else{
                    echo json_encode(['result' => false, 'detail' => 'Incorrect password']);
                }
            }
            $stmt->close();
        } else {
            echo json_encode(['result' => false, 'detail' => 'Username or password not provided']);
        }

        break;

    case "createUser":
        $data = json_decode(file_get_contents("php://input"), true);
        if (!empty($data["username"]) || !empty($data["password"])) {
            $query = "INSERT INTO USERS (USER_NAME, USER_PASSWORD) VALUES (?, ?)";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("ss", $data["username"], $data["password"]);
            $result = $stmt->execute();
            if ($result) {
                echo json_encode(['result' => true, 'detail' => 'New user successfully inserted']);
            } else {
                echo json_encode(['result' => false, 'detail' => 'Error inserting new user: ' . $conexion->error]);
            }
            $stmt->close();
        } else {
            echo json_encode(['result' => false, 'detail' => 'Username or password not provided']);
        }

        break;
}

?>
