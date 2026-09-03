<?php
session_start();
//isset
//$_POST["fName"];

if (isset($_POST["fName"], $_POST["lName"]) && !isset($_POST["uID"])) {
    if (!isset($_SESSION["userArray"])) {
        $_SESSION["userArray"] = [];
    }

    addUserFunc(firstName: $_POST["fName"], lastName: $_POST["lName"]);
    exit;
} else if (isset($_POST["fName"], $_POST["lName"], $_POST["uID"])) {
    updateUserFunc(firstName: $_POST["fName"], lastName: $_POST["lName"], userID: $_POST["uID"]);
    exit;
} else if (isset($_POST["dID"])) {
    deleteUserFunc(userID: $_POST["dID"]);
}

function addUserFunc($firstName, $lastName): void {
    try {
        //throw new InvalidArgumentException("Cannot process request at this time");
        $_SESSION["userArray"][] = [
            "FirstName" => $firstName,
            "LastName" => $lastName
        ];

        echo count($_SESSION["userArray"]);
    } catch (InvalidArgumentException $ex) {
        
    }
}

function updateUserFunc($firstName, $lastName, $userID): void {
    if (isset($_SESSION["userArray"][$userID])) {
        $_SESSION["userArray"][$userID]["FirstName"] = $firstName;
        $_SESSION["userArray"][$userID]["LastName"] = $lastName;
        echo "Update Function";
    }
}

function deleteUserFunc($userID): void {
    if (isset($_SESSION["userArray"][$userID])) {
        unset($_SESSION["userArray"][$userID]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <label>First Name</label>
    <input type="text" id="FName"/>
    <label>Last Name</label>
    <input type="text" id="LName"/>
    <button onclick="addFunc()">Add</button>

    <br>

    <table>
        <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Action</th>
        </tr>

        <?php if (!empty($_SESSION["userArray"])) : ?>
            <?php foreach ($_SESSION["userArray"] as $index => $user) : ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $user['FirstName'] ?></td>
                    <td><?= $user['LastName'] ?></td>
                    <td>
                        <button onclick="updateFunc(<?= $index ?>)">Update</button>
                        <button onclick="deleteFunc(<?= $index ?>)">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="4">No data found</td>
            </tr>
        <?php endif; ?>
    </table>
</body>

<script>
    function addFunc() {
        var firstName = document.getElementById("FName").value;
        var lastName = document.getElementById("LName").value;

        $.ajax({
            url: "",
            type: "POST",
            data: {
                fName: firstName,
                lName: lastName
            },
            success: function(returnedData) {
                location.reload(true);
            },
            error: function(xhr) {
                alert(xhr.status + " : " + xhr.responseText);
            }
        });
    }

    function updateFunc(userID) {
        var firstName = document.getElementById("FName").value;
        var lastName = document.getElementById("LName").value;

        $.ajax({
            url: "",
            type: "POST",
            data: {
                fName: firstName,
                lName: lastName,
                uID: userID
            },
            success: function(returnedData) {
                location.reload(true);
                //alert(returnedData);
            },
            error: function(xhr) {
                alert(xhr.status + " : " + xhr.responseText);
            }
        });
    }

    function deleteFunc(userID) {
        $.ajax({
            url: "",
            type: "POST",
            data: {
                dID: userID
            },
            success: function(returnedData) {
                location.reload(true);
            },
            error: function(xhr) {
                alert(xhr.status + " : " + xhr.responseText);
            }
        });
    }
</script>
