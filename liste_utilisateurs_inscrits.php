<?php
require_once('bd.php');
// $db = new PDO("mysql:host=hostname;dbname=taxibokko;" "root", "");
// $db = new PDO('mysql:host=localhost;dbname=taxibokko;charset=utf8', 'root', '',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);


$sql = "SELECT nom, prenom, date_inscription FROM utilisateurs";
$stmt = $db->query($sql);

echo "
<style>
table {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    margin-top: 20px;
    background-color: #fff;
    border: 1px solid #000000;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

td{
    border: 1px solid #000000;
    border-radius: 1px;
    text-align: center;

}

tr{
    /* background-color: #007bff; */
    color: #000000;
    border: 5px;
    padding: 5px;
    border-radius: 3px;
    font-size: 16px;
}

th{
    background-color: #007bff;
    color: #fff;
    border: 10px;
    padding: 2px;
    border-radius: 3px;
    font-size: 16px;
}
h1 {
    margin-left: 600px;
    font-size: 24px;
}

</style>
    
<table>
        <h1> Liste des utilisateurs inscrits </h1>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date d'inscription</th>
            </tr>
        </thead>
        <tbody>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>" . $row['nom'] . "</td>
            <td>" . $row['prenom'] . "</td>
            <td>" . $row['date_inscription'] . "</td>
          </tr>";
}

echo "</tbody>
      </table>";

      $db = null;
