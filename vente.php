<?php
include 'entete.php';

$article = null;
if (isset($_GET['id'])) {
    $article = getArticle($cnx, $_GET['id']);
}

$articles = getArticle($cnx); // Utilisez une variable `$articles` pour récupérer la liste de tous les articles
$vente = getVente($cnx);
$clients = getClient($cnx); // Passer la connexion à la base de données comme argument

?>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
        <form action="<?= !empty($_GET['id']) ? "model/modifvente.php" : "model/ajoutvente.php" ?>" method="POST">
    <input value="<?= !empty($_GET['id']) && isset($article['id']) ? $article['id'] : '' ?>" type="hidden" name="id" id="id">

    <label for="id_article">Article</label>
                <select onchange="setPrix()" name="id_article" id="id_article">
                    <?php
                    if (!empty($articles) && is_array($articles)) {
                        foreach ($articles as $key => $value) {
                    ?>
                            <option data-prix="<?= $value["prix_unitaire"]?>" value="<?= $value["id"] ?>">
                                <?= $value['nom_article'] . " - " . $value['quantite'] . " disponible" ?>
                            </option>
                    <?php
                        }
                    }
                    ?>
                </select>

                <label for="id_client">Clients</label>
                <select name="id_client" id="id_client">
                    <?php
                    if (!empty($clients) && is_array($clients)) {
                        foreach ($clients as $key => $value) {
                    ?>
                            <option  value="<?= $value["id"] ?>">
                                <?= $value['nom'] . " " . $value['prenom'] ?>
                            </option>
                    <?php
                        }
                    }
                    ?>
                </select>


    <label for="quantite">Quantité</label>
    <input onkeyup="setPrix()" value="<?= !empty($_GET['id']) && isset($article['quantite']) ? $article['quantite'] : '' ?>" type="number" name="quantite" id="quantite" placeholder="veuillez saisir la quantité">

    <label for="prix">Prix</label>
    <input value="<?= !empty($_GET['id']) && isset($article['prix']) ? $article['prix'] : '' ?>" type="number" name="prix" id="prix" placeholder="veuillez saisir le prix">

    <button type="submit">Valider</button>

    
    <?php if (isset($_SESSION['message'])): ?>
    <div id="message" class="alert <?=$_SESSION['message']['type']?>"><?=$_SESSION['message']['text']?></div>
<?php unset($_SESSION['message']); ?>
<?php endif; ?>
</form>

        </div>

        <div class="box">
            <table class="mtable">
                <tr>
                    <th>Article</th>
                    <th>Client</th>
                    <th>Quantité</th>
                    <th> Prix</th>
                    <th>Date</th>
                    <th>Reçu</th>
                </tr>

                <?php
                if (!empty($vente) && is_array($vente)) {
                    foreach ($vente as $key => $value) {
                ?>
                        <tr>
                            <td><?= $value['nom_article'] ?></td>
                            <td><?= $value['nom']." ".$value['prenom'] ?></td>
                            <td><?= $value['quantite'] ?></td>
                            <td><?= $value['prix'] ?></td>
                            <td><?= date('d/m/Y H:i:s', strtotime($value['date_vente'])) ?></td>
                            <td><a href="reçuvente.php?id=<?php echo $value['id']; ?>"><i class='bx bxs-receipt' ></i></a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>
<style>
    <?php include "public/css/style.css" ?>
</style>

<?php
include 'pied.php'
?> 
<script>
    function setPrix() {
       var article = document.querySelector('#id_article');
       var quantite = document.querySelector('#quantite');
       var prix = document.querySelector('#prix');

       var prixUnitaire = article.options[article.selectedIndex].getAttribute('data-prix');

       prix.value = Number(quantite.value) * Number(prixUnitaire);

    }
</script>

<script>
    setTimeout(function(){
        document.getElementById("message").style.display = "none";
    }, 5000); 
</script>
