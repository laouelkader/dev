<?php
include 'entete.php';

$articles = getArticle($cnx, $_GET['id'] ?? null);

?>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
        <form action="<?= !empty($_GET['id']) ? (!empty($_GET['sup']) ? "model/suparticle.php" : "model/modifarticle.php") : "model/ajoutarticle.php" ?>" method="POST" enctype="multipart/form-data">

    <label for="nom_article">Nom de l'article</label>
    <input value="<?= !empty($_GET['id']) ? $articles['nom_article'] : '' ?>" type="text" name="nom_article" id="nom_article" placeholder="veuillez saisir le nom">
    <input value="<?= !empty($_GET['id']) ? $articles['id'] : '' ?>" type="hidden" name="id" id="id">

    <label for="categorie">Catégorie</label>
    <select name="categorie" id="categorie">
        <option <?= !empty($_GET['id']) && $articles['categorie']== "ordinateur" ? "selected" : '' ?> value="Ordinateur">Ordinateur</option>
        <option <?= !empty($_GET['id']) && $articles['categorie']== "Imprimante" ? "selected" : '' ?> value="Imprimante">Imprimante</option>
        <option <?= !empty($_GET['id']) && $articles['categorie']== "Accessoire" ? "selected" : '' ?> value="Accessoire">Accessoire</option>
    </select>

    <label for="quantite">Quantité</label>
    <input value="<?= !empty($_GET['id']) ? $articles['quantite'] : '' ?>" type="number" name="quantite" id="quantite" placeholder="veuillez saisir la quantité">

    <label for="prix_unitaire">Prix Unitaire</label>
    <input value="<?= !empty($_GET['id']) ? $articles['prix_unitaire'] : '' ?>" type="number" name="prix_unitaire" id="prix_unitaire" placeholder="veuillez saisir le prix">

    <label for="date_fabrication">Date de fabrication</label>
    <input value="<?= !empty($_GET['id']) ? $articles['date_fabrication'] : '' ?>" type="datetime-local" name="date_fabrication" id="date_fabrication">

    <label for="date_expiration">Date d'expiration</label>
    <input value="<?= !empty($_GET['id']) ? $articles['date_expiration'] : '' ?>" type="datetime-local" name="date_expiration" id="date_expiration">

    <label for="images">Images</label>
    <input value="<?= !empty($_GET['id']) ? $articles['images'] : '' ?>" type="file" name="images" id="images">


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
                    <th>Nom article</th>
                    <th>Catégorie</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Date fabrication</th>
                    <th>Date expiration</th>
                    <th>Action</th>
                    <th>Image</th>
                </tr>

                <?php
                $articles = getArticle($cnx);

                if (!empty($articles) && is_array($articles)) {
                    foreach ($articles as $key => $value) {
                ?>
                        <tr>
                            <td><?= $value['nom_article'] ?></td>
                            <td><?= $value['categorie'] ?></td>
                            <td><?= $value['quantite'] ?></td>
                            <td><?= $value['prix_unitaire'] ?></td>
                            <td><?= date('d/m/Y H:i:s', strtotime($value['date_fabrication'])) ?></td>
                            <td><?= date('d/m/Y H:i:s', strtotime($value['date_expiration'])) ?></td>
                            <td><a href="?id=<?= $value['id'] ?>"><i class='bx bx-edit-alt'></i></a> | <a href="model/suparticle.php?id=<?php echo $value['id']; ?>"><i class='bx bx-trash'></i></a></td>
                            <td><img width="100" height="100" src="<?= $value['images'] ?>" alt="<?= $value['nom_article'] ?>"></td>

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

<script>
    setTimeout(function(){
        document.getElementById("message").style.display = "none";
    }, 5000); 
</script>

<?php
include 'pied.php'
?> 
