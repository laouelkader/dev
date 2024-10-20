<?php
include 'entete.php';

$article = null;
if (isset($_GET['id'])) {
    $article = getArticle($cnx, $_GET['id']);
}

$articles = getArticle($cnx); // Utilisez une variable `$articles` pour récupérer la liste de tous les articles

if (!empty($_GET['id'])) {
    $venteDetails = getVente($cnx, $_GET['id']);
}

$ventes = getVente($cnx); // Liste de toutes les ventes

$clients = getClient($cnx); // Passer la connexion à la base de données comme argument

?>
<div class="home-content">
    
        <button  id="btnPrint" style="position: relative; left: 45%;"><i class='bx bxs-printer'></i>Imprimer</button>
    
    <div class="page">
        <div class="cote-a-cote">
            <h2>Laouel</h2>
            <div>
                <?php if (isset($venteDetails['id'])) { ?>
                    <p>Reçu N° : <?= $venteDetails['id'] ?></p>
                    <p>Date: <?= date('d/m/Y H:i:s', strtotime($venteDetails['date_vente'])) ?></p>

                <?php } ?>
            </div>
        </div>
        <div class="cote-a-cote" style="width: 27%;">
            <p>Nom :</p>
            <p><?= $venteDetails['nom']." ".$venteDetails['prenom'] ?></p>
        </div>
        <div class="cote-a-cote" style="width: 20%;">
            <p>Tel :</p>
            <p><?= $venteDetails['telephone'] ?></p>
        </div>
        <div class="cote-a-cote" style="width: 30%;">
            <p>Adresse :</p>
            <p><?= $venteDetails['adresse']?></p>
        </div>

        <br> 


        <table class="mtable">
                <tr>
                    <th>Designation</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Prix total</th>
                </tr>

              
                        <tr>
                            <td><?= $venteDetails['nom_article'] ?></td>
                            <td><?= $venteDetails['quantite'] ?></td>
                            <td><?= $venteDetails['prix_unitaire'] ?></td>
                            <td><?= $venteDetails['prix'] ?></td>

                           
                        </tr>
               
            </table>
    </div>
    
</div>
<style>
    <?php include "public/css/style.css" ?>
</style>

<?php
include 'pied.php'
?>
<script>
    


    document.getElementById("btnPrint").addEventListener("click", function() {
        var page = document.querySelector(".page");
        var printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Reçu</title>');
        printWindow.document.write('<link rel="stylesheet" href="public/css/style.css" type="text/css" media="print" />');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<div class="home-content">');
        printWindow.document.write(page.innerHTML);
        printWindow.document.write('</div>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    });


    function setPrix() {
       var article = document.querySelector('#id_article');
       var quantite = document.querySelector('#quantite');
       var prix = document.querySelector('#prix');

       var prixUnitaire = article.options[article.selectedIndex].getAttribute('data-prix');

       prix.value = Number(quantite.value) * Number(prixUnitaire);

    }
</script>
