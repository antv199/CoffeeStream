<!DOCTYPE html>
<html>

<head>
    <title>PHP-MYSQL | Εγγραφές</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <?php
    $server = 'localhost';
    $user = 'admin';
    $pass = 'admin';
    $db = 'site';
    $mysqli = new mysqli($server, $user, $pass, $db);
    mysqli_report(MYSQLI_REPORT_ERROR);

    if (isset($_POST['id'])) {
        $id = mysqli_real_escape_string($mysqli, stripslashes($_POST["id"]));
        $id = (int)$id;
    }
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'add': {
                    $email = $_POST['email'];
                    $country = $_POST['country'];
                    $iscontentpub = $_POST['iscontentpub'];
                    $crpubname = $_POST['crpubname'];
                    if ($email != '' && $country != '') {
                        if ($stmt = $mysqli->prepare("INSERT records (email, country) VALUES (?, ?)")) {
                            $stmt->bind_param("ss", $email, $country, $iscontentpub, $crpubname);
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
                        $email = $_POST['email'];
                        $country = $_POST['country'];
                        $iscontentpub = $_POST['iscontentpub'];
                        $crpubname = $_POST['crpubname'];
                        if ($email != '' && $country != '') {
                            if ($stmt = $mysqli->prepare("UPDATE records SET email = ?, country = ? WHERE id=?")) {
                                $stmt->bind_param("ssi", $id, $email, $country, $iscontentpub, $crpubname);
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

        if ($result = $mysqli->query("SELECT * FROM records ORDER BY id")) {
            if ($result->num_rows > 0) {
                echo "<table border='1' cellpadding='10'>";
                echo "<tr><th>Id</th><th>Email</th><th>Country</th><th>Is CC/Publisher</th><th>CC/Publisher Name</th><th>Τροποποίηση</th><th>Διαγραφή</th></tr>";
                while ($row = $result->fetch_object()) {
                    $id = $row->id;
                    $email = $row->email;
                    $country = $row->country;
                    $iscontentpub = $row->iscontentpub;
                    $crpubname = $row->crpubname;
                    echo "<tr>";
                    echo "<td>" . $id . "</td>";
                    echo "<td><form action=\"./webadmin.php\" method=\"post\">
                    <input type=\"text\" name=\"email\" value=" . $email . "></td>
                    <td><input type=\"text\" name=\"country\" value=" . $country . "></td>
                    <td><input type=\"checkbox\" name=\"iscontentpub\" value=" . $iscontentpub . "></td>
                    <td><input type=\"text\" name=\"crpubname\" value=" . $crpubname . "></td>
                    <td><input type=\"hidden\" name=\"action\" value=\"edit\">
                    <input type=\"hidden\" name=\"id\" value=" . $id . ">
                    <input type=\"submit\" name=\"submit\" value=\"Τροποποίηση\"></form></td>
                    <td><form action=\"./webadmin.php\" method=\"post\">
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
        <form action="./webadmin.php" method="post">
            <table border='1' cellpadding='10'>
                <tr>
                    <td>Email: *</td>
                    <td></strong> <input type="text" name="email" value="" /></td>
                </tr>
                <tr>
                    <td>Country: *</td>
                    <td></strong> <input type="text" name="country" value="" /></td>
                </tr>
                <tr>
                    <td>Is CC/Publisher: *</td>
                    <td></strong> <input type="checkbox" name="country" value="" /></td>
                </tr>
                <tr>
                    <td>CC/Publisher Name: *</td>
                    <td></strong> <input type="text" name="country" value="" /></td>
                </tr>
                <tr>
                    <td>Country: *</td>
                    <td></strong> <input type="text" name="country" value="" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="hidden" name="action" value="add" /><input type="submit" name="submit" value="Αποστολή" /></td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>