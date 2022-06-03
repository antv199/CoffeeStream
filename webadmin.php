<!DOCTYPE html>
<?php
    include 'header.php';
?>
<html>
<head>
    
    <title>PHP-MYSQL | Εγγραφές</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <p><br></p>
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
	$sql='SELECT * FROM susers WHERE email="'.$_COOKIE['userEmail'].'"';
	$result=mysqli_query($mysqli, $sql);
	$getStuff=mysqli_fetch_assoc($result);

    if(isset($_COOKIE['userLoggedIn']) and $_COOKIE['userLoggedIn']==TRUE){
        $userAM=$_COOKIE['userEmail'];
        $pwAM=$_COOKIE['userPassword'];
    }

    if (isset($_POST['id'])) {
        $id = mysqli_real_escape_string($mysqli, stripslashes($_POST["id"]));
        $id = (int)$id;
    }
    if (isset($_POST['action'])) {
        if($getStuff['isadmin']==1){
            $action = $_POST['action'];
            switch ($action) {
                case 'add': {
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        if ($email != '' && $password != '') {
                            if ($stmt = $mysqli->prepare("INSERT susers (email, password) VALUES (?, ?)")) {
                                $stmt->bind_param("ss", $email, $password);
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
                            $password = $_POST['password'];
                            if ($email != '' && $password != '') {
                                if ($stmt = $mysqli->prepare("UPDATE susers SET email = ?, password = ? WHERE id=?")) {
                                    $stmt->bind_param("ssi", $email, $password, $id);
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
                            if ($stmt = $mysqli->prepare("DELETE FROM susers WHERE id = ? LIMIT 1")) {
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
        else{
            //redirect to login page
            header("Location: login.php");
        }
    }

    ?>
    <center>
        <h1>Προβολή εγγραφών</h1>
        <?php
        if($getStuff['isadmin']==1){
            if ($result = $mysqli->query("SELECT * FROM susers ORDER BY password")) {
                if ($result->num_rows > 0) {
                    echo "<table border='1' cellpadding='10'>";
                    echo "<tr><th>Id</th><th>Email</th><th>Password</th><th>Τροποποίηση</th><th>Διαγραφή</th></tr>";
                    while ($row = $result->fetch_object()) {
                        $id = $row->id;
                        $email = $row->email;
                        $password = $row->password;
                        echo "<tr>";
                        echo "<td>" . $id . "</td>";
                        echo "<td><form action=\"./index.php\" method=\"post\">
                        <input type=\"text\" name=\"email\" value=" . $email . "></td>
                        <td><input type=\"text\" name=\"password\" value=" . $password . "></td>
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
        }
        else{
            echo 'User not an admin. Redirecting...';
            header("Location: login.php");
        }
        $mysqli->close();
        ?>
        <p>* Υποχρεωτικό πεδίο<br>
        <form action="./index.php" method="post">
            <table border='1' cellpadding='10'>
                <tr>
                    <td>Όνομα: *</td>
                    <td></strong> <input type="text" name="email" value="" /></td>
                </tr>
                <tr>
                    <td>Επίθετο: *</td>
                    <td></strong> <input type="text" name="password" value="" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="hidden" name="action" value="add" /><input type="submit" name="submit" value="Αποστολή" /></td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>