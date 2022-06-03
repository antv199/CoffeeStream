<!DOCTYPE html>
<html>

<head>
    <title>PHP-MYSQL | Εγγραφές</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <?php
    //////////////////////////////////////
    /////////charilogis Vasileios/////////
    //////////////dit.uoi.gr//////////////
    //////////////////////////////////////
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'site';
    $mysqli = new mysqli($server, $user, $pass, $db);
    mysqli_report(MYSQLI_REPORT_ERROR);

		if(isset($_COOKIE['userLoggedIn']) and $_COOKIE['userLoggedIn']==TRUE){
			$userAM=$_COOKIE['userEmail'];
			$pwAM=$_COOKIE['userPassword'];
		}

    if (isset($_POST['id'])) {
        $id = mysqli_real_escape_string($mysqli, stripslashes($_POST["id"]));
        $id = (int)$id;
    }
    if (isset($_POST['action']) and ) {
        $action = $_POST['action'];
        switch ($action) {
            case 'add': {
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    if ($firstname != '' && $lastname != '') {
                        if ($stmt = $mysqli->prepare("INSERT records (firstname, lastname) VALUES (?, ?)")) {
                            $stmt->bind_param("ss", $firstname, $lastname);
                            $stmt->execute();
                            $stmt->close();
                        } else {
                            echo "ERROR: Could not prepare SQL statement.";
                        }
                    } else {
                        echo "Κενά πεδία!";
                    }
                    break;
                }

            case 'edit': {
                    if (is_numeric($id)) {
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        if ($firstname != '' && $lastname != '') {
                            if ($stmt = $mysqli->prepare("UPDATE records SET firstname = ?, lastname = ? WHERE id=?")) {
                                $stmt->bind_param("ssi", $firstname, $lastname, $id);
                                $stmt->execute();
                                $stmt->close();
                            } else {
                                echo "ERROR: could not prepare SQL statement.";
                            }
                        } else {
                            echo "Κενά πεδία!";
                        }
                    }
                    break;
                }
            case 'delete': {
                    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
                        if ($stmt = $mysqli->prepare("DELETE FROM records WHERE id = ? LIMIT 1")) {
                            $stmt->bind_param("i", $id);
                            $stmt->execute();
                            $stmt->close();
                        } else {
                            echo "ERROR: could not prepare SQL statement.";
                        }
                    }
                    break;
                }
        }
    }
    ?>
    <center>
        <h1>Προβολή εγγραφών</h1>
        <?php

        if ($result = $mysqli->query("SELECT * FROM records ORDER BY lastname")) {
            if ($result->num_rows > 0) {
                echo "<table border='1' cellpadding='10'>";
                echo "<tr><th>Id</th><th>Όνομα</th><th>Επίθετο</th><th>Τροποποίηση</th><th>Διαγραφή</th></tr>";
                while ($row = $result->fetch_object()) {
                    $id = $row->id;
                    $firstname = $row->firstname;
                    $lastname = $row->lastname;
                    echo "<tr>";
                    echo "<td>" . $id . "</td>";
                    echo "<td><form action=\"./index.php\" method=\"post\">
                    <input type=\"text\" name=\"firstname\" value=" . $firstname . "></td>
                    <td><input type=\"text\" name=\"lastname\" value=" . $lastname . "></td>
                    <td><input type=\"hidden\" name=\"action\" value=\"edit\">
                    <input type=\"hidden\" name=\"id\" value=" . $id . ">
                    <input type=\"submit\" name=\"submit\" value=\"Τροποποίηση\"></form></td>
                    <td><form action=\"./index.php\" method=\"post\">
                    <input type=\"hidden\" name=\"action\" value=\"delete\">
                    <input type=\"hidden\" name=\"id\" value=" . $id . ">
                    <input type=\"submit\" name=\"submit\" value=\"Διαγραφή\"></form></td></tr>";
                }
                echo "</table>";
            } else {
                echo "Δεν υπάρχουν εγγραφές!";
            }
        } else {
            echo "Error: " . $mysqli->error;
        }
        $mysqli->close();
        ?>
        <p>* Υποχρεωτικό πεδίο<br>
        <form action="./index.php" method="post">
            <table border='1' cellpadding='10'>
                <tr>
                    <td>Όνομα: *</td>
                    <td></strong> <input type="text" name="firstname" value="" /></td>
                </tr>
                <tr>
                    <td>Επίθετο: *</td>
                    <td></strong> <input type="text" name="lastname" value="" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="hidden" name="action" value="add" /><input type="submit" name="submit" value="Αποστολή" /></td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>