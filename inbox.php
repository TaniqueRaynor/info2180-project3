<!DOCTYPE html>
<html>
<head>
    <title>Message Center</title>
    <link rel="stylesheet" type="text/css" href="styles/Homescreen.css"/>
</head>
<body>
    <div class="container">
        <h1> CheapoMAil </h1>
        <hr>
        <div class="menu">
            <div><a href="inbox.php"><h2 class="selected">Inbox</h2></a></div>
            <div><a href="compose.html"><h2>Compose</h2></a></div>
            <div><a href="logout.php"><h2>Logout</h2></a></div>
        </div>
        <div class="content">
            <?php
            echo "<table>";
            echo "
                <tr>
                    <th>Id</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>";

            class TableRows extends RecursiveIteratorIterator { 
                function __construct($it) { 
                    parent::__construct($it, self::LEAVES_ONLY); 
                }

                function current() {
                    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
                }

                function beginChildren() { 
                    echo "<tr>"; 
                } 

                function endChildren() { 
                    echo "</tr>" . "\n";
                } 
            } 

            $dbname = 'cheapomail';
            $dbhost = 'localhost'; 
            $dbuser = 'root'; 
            $dbpass = '';

            try {
                $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT id, subject, body FROM message"); 
                $stmt->execute();

                // set the resulting array to associative
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
                    echo $v;
                }
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
            echo "</table>";
            ?>
        </div>
    </div>
</body>
</html>