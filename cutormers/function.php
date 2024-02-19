<?php

require '../includes/dbcon.php';

function getCustormerList()
{
    global $pdo;

    $query = "SELECT * FROM custormers";
    $statement = $pdo->query($query);

    if ($statement) {
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            $data = [
                'status' => 200,
                'message' => "Customer List Fetched Successfully",
                'data' => $result
            ];
            header("HTTP/1.0 200 Ok");
            return json_encode($data);
        } else {
            $data = [
                'status' => 404,
                'message' => "No Customer Found",
            ];
            header("HTTP/1.0 404 Not Found");
            return json_encode($data);
        }
    } else {
        $data = [
            'status' => 500,
            'message' => "Internal Server Error",
        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
    }
}
