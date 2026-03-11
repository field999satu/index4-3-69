<?php
require "connect.php";
if (isset($_GET["CustomerID"])); {
    $strCustomerID = $_GET["CustomerID"];
    echo "<br>" . "strCustomer = " . $strCustomerID;
    $sql = "SELECT * FROM customer where CustomerID = '" . $strCustomerID . "'";
    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetchAll();
    print_r($result);
}
