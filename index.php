<!doctype html>
<html lang="en">

<head>
    <p>List of Friends</p>
</head>

<body>
    <table border="2">
        <tr>
            <th>firstname</th>
            <th>lastname</th>
        </tr>


        <?php require_once 'model.php';

        foreach ($friends as $friend) {
            echo "<tr>
            <td>" . $friend['firstname'] . "</td>
            <td>" . $friend['lastname'] . "</td>
        </tr>";
        }
        ?>
    </table>


    <?php
    if (!empty($_POST)) {
        if (
            isset($_POST['firstname'], $_POST['lastname'])
            && !empty($_POST['firstname']) && !empty($_POST['lastname'])
        ) {


            require_once '_connec.php';
            $pdo = new \PDO(DSN, USER, PASS);
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);

            $query = 'INSERT INTO friend(firstname,lastname) VALUES (:firstname,:lastname)';
            $statement = $pdo->prepare($query);

            $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
            $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
            $statement->execute();

            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
        } else {
            echo "Le formulaire est incompléte.Veuillez remplir tous.";
        }
    }


    ?>




    <div class='container'>
        <form action="" method="post">
            <div>
                <label for='firstname'>input the firstname</label>
                <input type="text" name='firstname' />
            </div>
            <div>
                <label for='lastname'>input the lastname</label>
                <input type="text" name='lastname' />
            </div>
            <button type='submit'>Submit</button>
        </form>
    </div>









</body>


</html>