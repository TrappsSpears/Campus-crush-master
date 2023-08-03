<?php
// liking.inc.php - This script handles the AJAX request and processes the like action

if (isset($_POST['post_id'], $_POST['user_id'], $_POST['type'])) {
    // Include the database connection file
    include_once('dbh.class.php');
    $dbh = new Dbh();

    // Sanitize and validate the input data
    $post_id = intval($_POST['post_id']);
    $user_id = intval($_POST['user_id']);
    $type = trim($_POST['type']);

    // Check if the like type is valid (optional - add more validation if needed)
    $valid_like_types = array('like', 'love', 'funny', 'sad', 'fire');
    if (!in_array($type, $valid_like_types)) {
        $response = array(
            'status' => 'error',
            'message' => 'Invalid like type.',
        );
    } else {
        // Check if the user has already liked the post
        $sql = "SELECT COUNT(*) as total FROM likes WHERE user_id = ? AND post_id = ?;";
        $result = $dbh->connect()->prepare($sql);
        if (!$result->execute(array($user_id, $post_id))) {
            $response = array(
                'status' => 'error',
                'message' => 'Database error.',
            );
        } else {
            $results = $result->fetch(PDO::FETCH_ASSOC);
            if ($results['total'] > 0) {
                // User has already liked the post, so remove the like
                $sql = "DELETE FROM likes WHERE user_id = ? AND post_id = ?;";
                $result = $dbh->connect()->prepare($sql);
                if (!$result->execute(array($user_id, $post_id))) {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Error deleting like.',
                    );
                } else {
                    // Like removed successfully
                    $response = array(
                        'status' => 'success',
                        'message' => 'Like removed successfully!',
                    );
                }
            } else {
                // User has not liked the post, so add the like
                $date = date('Y-m-d H:i:s');
                $sql = "INSERT INTO likes (post_id, type, user_id, created_at) VALUES (?, ?, ?, ?);";
                $result = $dbh->connect()->prepare($sql);
                if (!$result->execute(array($post_id, $type, $user_id, $date))) {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Error adding like.',
                    );
                } else {
                    // Like added successfully
                    $response = array(
                        'status' => 'success',
                        'message' => 'Like added successfully!',
                    );
                }
            }
        }
    }

    // If the script reaches this point, it means there was no error and a response is ready
    // Send the response back to the client as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit; // Stop further script execution
} else {
    // If the required POST data is not provided, handle the error
    $response = array(
        'status' => 'error',
        'message' => 'Required data not provided.',
    );

    // Send the error response back to the client as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit; // Stop further script execution
}