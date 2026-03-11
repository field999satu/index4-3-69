<?php
require 'connect.php';
if (isset($_POST['CustomerID'])) {


    $CustomerID = $_POST['CustomerID'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Email = $_POST['Birthdate'];
    $Email = $_POST['OutstandingDebt'];
    $Email = $_POST['CountryCode'];

    // echo 'CustomerID = ' . $CustomerID;
    // echo 'Name = ' . $Name;
    // echo 'Email = ' . $Email;


    $sql = "update customer set 
            Name=:Name, 
            Email=:Email , 
            Birthdate=:Birthdate , 
            OutstandingDebt=:OutstandingDebt , 
            CountryCode=:CountryCode
            Where CustomerID=:CustomerID
            ";

    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':CustomerID', $_POST['CustomerID']);
    $stmt->bindparam(':Name', $_POST['Name']);
    $stmt->bindparam(':Email', $_POST['Email']);
    $stmt->bindparam(':Birthdate', $_POST['Birthdate']);
    $stmt->bindparam(':OutstandingDebt', $_POST['OutstandingDebt']);
    $stmt->bindparam(':CountryCode', $_POST['CountryCode']);
    $stmt->execute();




    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->rowCount() >= 0) {
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly update customer information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
    }
    $conn = null;
}
