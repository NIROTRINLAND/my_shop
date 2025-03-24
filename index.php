<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My shop</title>
    <!-- le lien pour charger le cdn de bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <!-- le lien pour ajouter les clients dans le ficher create.php    -->

        <!-- comment le fait de cliquer ne fait pas juste envoyer uri 
         comme le lien recu dans la barre du navigateur ❓❓❓ -->
        <a href="/my_shop/create.php" class="btn btn-primary" role="button">New Client</a>
        <br>
        <!-- tableau pour l'affichage des clients  -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- ❓❓❓ comment aller sur php admin avec service pourquoi la base de donnée que jai
                  avec xammp est different de celui que jai avec laragon -->
                <?php 
                $servername="localhost";
                $username="root";
                $password="";
                $database="myshop";

                $connection= new mysqli($servername,$username,$password,$database);
                // on verifie si la connection a été effectué ou pas
                //  sinon arreter l'execution du script et on affiche le message passen en argument a la fonction die
                if($connection->connect_error){
                    die("Connection failed:".$connection->connect_error);
                }
// la requête pour recupérer tous les clients 
                $sql="SELECT * from clients";
//foncton de mysqli pour exécution de la requete ci-dessus
                $result=$connection->query($sql);
                if(!$result){
                    die("Invalie query:".$connection->error);
                }
                while($row=$result->fetch_assoc()){
                    echo" 
                    <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[phone]</td>
                <td>$row[address]</td>
                <td>$row[created_at]</td>
                <td>
                    <!-- lien pour la modification qui va nous permettre d'aller sur la pas
                     la page edit.php permettant de faire le edit  -->
                    <a class='btn btn-primary btn-sm' href='/my_shop/edit.php?id=$row[id]'>Edit</a>
                      <!-- lien pour la modification qui va nous permettre d'aller sur la pas
                     la page delete.php permettant de faire le delete  -->
                    <a class='btn btn-danger btn-sm' href='/my_shop/delete.php?id=$row[id]'>Delete</a>
                </td>
                </tr> ";}
                ?>
               
            </tbody>
        </table>
    </div>
</body>

</html>