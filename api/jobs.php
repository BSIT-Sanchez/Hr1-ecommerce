<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "db.php"; // DB connection

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "GET":
        if (isset($_GET['id'])) {
            // ✅ GET ONE JOB
            $id = intval($_GET['id']);
            $stmt = $conn->prepare("SELECT * FROM jobs WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                echo json_encode($row);
            } else {
                echo json_encode(["message" => "Job not found"]);
            }
            $stmt->close();
        } else {
            // ✅ GET ALL JOBS
            $sql = "SELECT * FROM jobs ORDER BY created_at DESC";
            $result = $conn->query($sql);
            $jobs = [];
            while ($row = $result->fetch_assoc()) {
                $jobs[] = $row;
            }
            echo json_encode($jobs);
        }
        break;

    case "POST":
        // ✅ CREATE NEW JOB
        $data = json_decode(file_get_contents("php://input"), true);
        if (!$data) {
            $data = $_POST; // fallback for form-data
        }

        $stmt = $conn->prepare("INSERT INTO jobs (title, department, openings, status, salary, location, job_type, description, posting_date, deadline) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "ssisssssss",
            $data['title'],
            $data['department'],
            $data['openings'],
            $data['status'],
            $data['salary'],
            $data['location'],
            $data['job_type'],
            $data['description'],
            $data['posting_date'],
            $data['deadline']
        );

        if ($stmt->execute()) {
            echo json_encode(["message" => "Job created successfully", "id" => $stmt->insert_id]);
        } else {
            echo json_encode(["message" => "Failed to create job", "error" => $stmt->error]);
        }
        $stmt->close();
        break;

    case "PUT":
        // ✅ UPDATE JOB (id from URL not body)
        if (!isset($_GET['id'])) {
            echo json_encode(["message" => "Job ID is required in URL"]);
            exit;
        }
        $id = intval($_GET['id']);
        $data = json_decode(file_get_contents("php://input"), true);

        $stmt = $conn->prepare("UPDATE jobs SET title=?, department=?, openings=?, status=?, salary=?, location=?, job_type=?, description=?, posting_date=?, deadline=? WHERE id=?");
        $stmt->bind_param(
            "ssisssssssi",
            $data['title'],
            $data['department'],
            $data['openings'],
            $data['status'],
            $data['salary'],
            $data['location'],
            $data['job_type'],
            $data['description'],
            $data['posting_date'],
            $data['deadline'],
            $id
        );

        if ($stmt->execute()) {
            echo json_encode(["message" => "Job updated successfully"]);
        } else {
            echo json_encode(["message" => "Failed to update job", "error" => $stmt->error]);
        }
        $stmt->close();
        break;

    case "DELETE":
        // ✅ DELETE JOB (id from URL not body)
        if (!isset($_GET['id'])) {
            echo json_encode(["message" => "Job ID is required in URL"]);
            exit;
        }
        $id = intval($_GET['id']);

        $stmt = $conn->prepare("DELETE FROM jobs WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Job deleted successfully"]);
        } else {
            echo json_encode(["message" => "Failed to delete job", "error" => $stmt->error]);
        }
        $stmt->close();
        break;

    default:
        echo json_encode(["message" => "Method not allowed"]);
        break;
}

$conn->close();
?>
