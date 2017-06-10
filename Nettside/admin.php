<!DOCTYPE html>
<html lang="no">
    <head>
        <title>Digipost - Admin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                margin: auto;
                width: 60%;
                border: 3px solid #73AD21;
                padding: 10px;
            }
            table, th, td {
                border-collapse: collapse;
            }
            th, td {
                padding: 8px;
            }
            table {
                margin: 10px;
            }
            #formtable {
                margin: 0 auto;
                margin-bottom: 10px;
            }
            #restable, #restable th, #restable td {
                margin: 0 auto;
                padding-top: 10px;
                border: 1px solid black;
            }
            #restable tr:hover {
                background-color: #f5f5f5
            }
            #passrow {
                text-overflow:ellipsis;
            }
        </style>
        <script>
            function sikker() {
                var x;
                if (confirm("Er du sikker på at du vil slette alle brukere?(Sletter ikke adminbrukeren)") == true) {
                    document.getElementById('id').value = 1;
                } else {
                    document.getElementById('id').value = 0;
                }
            }
        </script>         
    </head>
    <body>
    <div id="tips">
        <p>Skriv først inn ID, så hvilke felter du vil endre/slette</p>
    </div>
        <form action="" method="post" name="skjema">
            <table id="formtable">
                <tr>
                    <td>ID:</td><td><input type="text" name="id" id="id"></td>
                    <td>Fødselsnummer</td><td> <input type="text" name="fnummer"></td>
                </tr>
                <tr>
                    <td>Fornavn</td><td> <input type="text" name="fornavn"></td>
                    <td>Etternavn</td><td> <input type="text" name="etternavn"></td>
                </tr>
                <tr>
                    <td>Passord</td><td> <input type="text" name="passord"></td>
                    <td>Telefonnummer</td><td> <input type="text" name="mobilnummer"></td>
                </tr>
                <tr>
                    <td>Perskode</td><td> <input type="text" name="perskode"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Slett bruker" name="slettbtn"></td>
                    <td><input type="submit" value="Gjør endringer" name="endrebtn"></td>
                    <td><input type="submit" value="Oppdater siden" name="updatebtn"></td>
                    <td><input type="submit" value="Legg til bruker" name="nybtn"></td>
                    <td><input type="submit" value="Logg ut" name="utbtn"></td>
                </tr>
                <tr>
                    <td><input type="submit" id="slettalle" value="Slett alle brukere" name="slettalle" onclick="sikker()"></td>
                </tr>
            </table>
        </form>
        <table id="restable">
            <tr>
                <th>ID</th>
                <th>Fødselsnummer</th>
                <th>Fornavn</th>
                <th>Etternavn</th>
                <th>Perskode</th>
            </tr>

        <?php session_start();
            if(isset($_SESSION['admin'])){
    
            } else {
                header("location:adminsjekk.php");
            }
            
            if(isset($_REQUEST["utbtn"])){
                if(isset($_SESSION['admin'])){
                    session_destroy();
                    header("location:adminsjekk.php");
                }
                else {
                    session_destroy();
                    header("location:adminsjekk.php");
                }
            }
            
            if(isset($_REQUEST["updatebtn"])){
                header("Refresh:0");
            }
            
            include 'db.php';  
            
            $sql2 = "Select * from user";
            $result = $db->query($sql2);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                     echo "<tr><td>". $row["id"]. "</td><td>". substr($row["foedselsnummer"],5). "</td><td> " . $row["fornavn"] . " </td><td> " . $row["etternavn"] . " </td>";
                     echo "<td>" . $row["perskode"] . "</td></tr>";
                }
            } else {
                 echo "0 results";
            }
            
            if(isset($_REQUEST["slettbtn"])){
                $id = filter_input(INPUT_POST, "id");
                if($id == 1){
                    die("Du kan ikke slette superbrukeren");
                }
                $checkuser = mysqli_query($db,"SELECT fornavn FROM user WHERE id='$id'");
                $num = mysqli_num_rows($checkuser);
                if ($num==1){
                    $sqldel = "DELETE FROM user WHERE id=$id";
                    if($db->query($sqldel) === TRUE){
                        echo "Bruker ID : $id slettet";
                    } else {
                        echo "Error: " . $db->error;
                    }
                } else {
                    echo "Bruker finnes ikke";
                }
            }
            if(isset($_REQUEST["slettalle"])){
                if($_POST["id"] == 1){
                    $sqldel = "DELETE FROM user WHERE id > 0";
                    if($db->query($sqldel) === TRUE){
                        echo "Alle brukere slettet";
                    } else {
                        echo "Error: " . $db->error;
                    }
                } else {
                    echo "OK";
                }
            }  
                
            if(isset($_REQUEST["nybtn"])){
                $id = filter_input(INPUT_POST, "id");
                $checkuser = mysqli_query($db,"SELECT fornavn FROM user WHERE id='$id'");
                $num = mysqli_num_rows($checkuser);
                if(empty($_REQUEST["id"])||empty($_REQUEST["fnummer"])||empty($_REQUEST["fornavn"])||empty($_REQUEST["etternavn"])||empty($_REQUEST["passord"])||empty($_REQUEST["mobilnummer"])||empty($_REQUEST["perskode"])){
                    die("Husk å legg til alle felter.");
                }
                if ($num==1){
                    echo "Bruker finnes allerede";
                } else {
                    $passord = hash("sha512",mysql_real_escape_string($_POST['passord']));
                    $sqladd = "INSERT INTO user (id, foedselsnummer, fornavn, etternavn, passord, perskode)";
                    $sqladd.= "VALUES ('".$_REQUEST['id']."', '".$_REQUEST['fnummer']."', '".$_REQUEST['fornavn']."', '".$_REQUEST['etternavn']."', '".$passord."'";
                    $sqladd.= ", '".$_REQUEST['perskode']."')";
                    if($db->query($sqladd) === TRUE){
                        echo "Ny bruker lagt til";
                    } else {
                        echo "Error: " . $db->error;
                    }
                }
            }
            
            if(isset($_REQUEST["endrebtn"])){
                $id = filter_input(INPUT_POST, "id");
                $checkuser = mysqli_query($db,"SELECT fornavn FROM user WHERE id='$id'");
                $num = mysqli_num_rows($checkuser);
                if ($num==1){
                    $resultat = mysqli_query($db, "SELECT fornavn FROM user WHERE id='$id'");
                    $rad = $resultat->fetch_object();
                    echo "(Oppdater siden for å se endringene)<br><strong>Endringer for ". $rad->fornavn. ":</strong>";
                    
                    if(!empty($_REQUEST["fnummer"])){
                        $sql="UPDATE user SET foedselsnummer='".$_REQUEST["fnummer"]."'";
                        $sql.=" WHERE id ='$id'";
                        if(mysqli_query($db, $sql)){
                            if(mysqli_affected_rows($db)>0){
                                echo " Fødselsnummer";
                            } else {
                                echo "Feil med fødselsnummer";
                            } 
                        } else {
                            echo mysqli_error($db);
                        }
                    }
                    if(!empty($_REQUEST["fornavn"])){
                        $sql="UPDATE user SET fornavn='".$_REQUEST["fornavn"]."'";
                        $sql.=" WHERE id ='$id'";
                        if(mysqli_query($db, $sql)){
                            if(mysqli_affected_rows($db)>0){
                                echo " Fornavn";
                            } else {
                                echo "Feil med fornavn";
                            } 
                        } else {
                            echo mysqli_error($db);
                        }
                    }
                    if(!empty($_REQUEST["etternavn"])){
                        $sql="UPDATE user SET etternavn='".$_REQUEST["etternavn"]."'";
                        $sql.=" WHERE id ='$id'";
                        if(mysqli_query($db, $sql)){
                            if(mysqli_affected_rows($db)>0){
                                echo " Etternavn";
                            } else {
                                echo "Feil med Etternavn";
                            } 
                        } else {
                            echo mysqli_error($db);
                        }
                    }
                    if(!empty($_REQUEST["passord"])){
                        $sql="UPDATE user SET passord='".$_REQUEST["passord"]."'";
                        $sql.=" WHERE id ='$id'";
                        if(mysqli_query($db, $sql)){
                            if(mysqli_affected_rows($db)>0){
                                echo " Passord";
                            } else {
                                echo "Feil med passord";
                            } 
                        } else {
                            echo mysqli_error($db);
                        }
                    }
                    if(!empty($_REQUEST["mobilnummer"])){
                        $sql="UPDATE user SET mobilnummer='".$_REQUEST["mobilnummer"]."'";
                        $sql.=" WHERE id ='$id'";
                        if(mysqli_query($db, $sql)){
                            if(mysqli_affected_rows($db)>0){
                                echo " Mobilnummer";
                            } else {
                                echo "Feil med mobilnummer";
                            } 
                        } else {
                            echo mysqli_error($db);
                        }
                    }
                    if(!empty($_REQUEST["engangskode"])){
                        $sql="UPDATE user SET engangskode='".$_REQUEST["engangskode"]."'";
                        $sql.=" WHERE id ='$id'";
                        if(mysqli_query($db, $sql)){
                            if(mysqli_affected_rows($db)>0){
                                echo " Engangskode";
                            } else {
                                echo "Feil med engangskode";
                            } 
                        } else {
                            echo mysqli_error($db);
                        }
                    }
                    if(!empty($_REQUEST["perskode"])){
                        $sql="UPDATE user SET perskode='".$_REQUEST["perskode"]."'";
                        $sql.=" WHERE id ='$id'";
                        if(mysqli_query($db, $sql)){
                            if(mysqli_affected_rows($db)>0){
                                echo " Perskode";
                            } else {
                                echo "Feil med perskode";
                            } 
                        } else {
                            echo mysqli_error($db);
                        }
                    }
                }   
                else {
                    echo "Feil, du må skrive inn ID";
                }
            }
            
        ?>
        </table>
    </body>
</html>