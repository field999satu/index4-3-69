<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Registration</title>
</head>

<body>
    <h1>Customer</h1>
    <?php
    require 'connect.php';
    $sql_countries = "SELECT CountryCode, CountryName FROM country ORDER BY CountryName ASC";
    $stmt_countries = $conn->prepare($sql_countries);
    $stmt_countries->execute();
    $countries = $stmt_countries->fetchAll();
    ?>
    <form action="customer.php" method="POST">

        <input type="text" placeholder="Enter Customer ID" name="customerID">
        <br><br>
        <input type="text" placeholder="Name" name="Name">
        <br><br>
        <input type="date" placeholder="Birthdate" name="birthdate">
        <br><br>
        <input type="email" placeholder="Email" name="email">
        <br><br>
        <input type="text" placeholder="Country code" name="countryCode">
        <br><br>
        <input type="number" placeholder="OutStanding debt" name="outstandingDebt">
        <br><br>
        <input type="Submit">
    </form>
</body>

</html>

<br><br>

<label>Select a country code</label>
<select name="countrycode">
    <?php
    require 'connect.php';

    // https://www.w3schools.com/tags/tag_select.asp
    while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) :
    ?>
        <option value="<?php echo $cc["CountryCode"]; ?>">
            <?php echo $cc["CountryName"]; ?>
        </option>
    <?php
    endwhile;
    ?>
</select>

<br><br>

<input type="submit" value="Submit" name="submit" />





































<?php
require 'connect.php';

$sql_select = "select * from country order by CountryCode";
$stmt_s = $conn->prepare($sql_select);
$stmt_s->execute();

if (isset($_POST['submit'])) {

    if (!empty($_POST['customerID']) && !empty($_POST['name'])) {

        // echo "<br>" . $_POST['customerID'];

        // ฝึกสลับตำแหน่งการ insert ในภาษา SQL
        $sql = "insert into customer (CustomerID,Name,CountryCode,OutstandingDebt,Email,Birthdate)
                values (:customerID, :Name, :countrycode,
                        :outstandingDebt, :email, :birthdate)";
    }
}
?>