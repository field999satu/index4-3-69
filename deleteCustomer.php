<?php
require 'connect.php';

$status = "";
$message = "";

if (isset($_GET['CustomerID'])) {
    $customerID = $_GET['CustomerID'];

    try {
        $sql = "DELETE FROM customer WHERE CustomerID = :CustomerID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':CustomerID', $customerID);

        if ($stmt->execute()) {
            $status = "success";
            $message = "ลบข้อมูลลูกค้า รหัส $customerID สำเร็จเรียบร้อย!";
        } else {
            $status = "error";
            $message = "เกิดข้อผิดพลาด! ไม่สามารถลบข้อมูลได้";
        }
    } catch (PDOException $e) {
        $status = "error";
        $message = "Database Error: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit();
}
