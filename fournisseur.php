<?php
include 'entete.php';

$fournisseur = getFournisseur($cnx, $_GET['id'] ?? null);

?>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
        <form action="<?= !empty($_GET['id']) ? (!empty($_GET['sup']) ? "model/supfournisseur.php" : "model/modiffournisseur.php") : "model/ajoutfournisseur.php" ?>" method="POST">
    <label for="nom">Nom</label>
    <input value="<?= !empty($_GET['id']) ? $fournisseur['nom'] : '' ?>" type="text" name="nom" id="nom" placeholder="veuillez saisir le nom">
    <input value="<?= !empty($_GET['id']) ? $fournisseur['id'] : '' ?>" type="hidden" name="id" id="id">

    <label for="prenom">Prenom</label>
    <input value="<?= !empty($_GET['id']) ? $fournisseur['prenom'] : '' ?>" type="text" name="prenom" id="prenom" placeholder="veuillez saisir le Prenom">


    <label for="telephone">N° de telephone</label>
    <input value="<?= !empty($_GET['id']) ? $fournisseur['telephone'] : '' ?>" type="text" name="telephone" id="telephone" placeholder="veuillez saisir le N° de telephone">

    <label for="adresse">Adresse</label>
    <input value="<?= !empty($_GET['id']) ? $fournisseur['adresse'] : '' ?>" type="text" name="adresse" id="adresse" placeholder="veuillez saisir l'adresse">

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
                    <th>Nom </th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Action</th>
                </tr>

                <?php
                $fournisseurs = getFournisseur($cnx);

                if (!empty($fournisseurs) && is_array($fournisseurs)) {
                    foreach ($fournisseurs as $key => $value) {
                ?>
                        <tr>
                            <td><?= $value['nom'] ?></td>
                            <td><?= $value['prenom'] ?></td>
                            <td><?= $value['telephone'] ?></td>
                            <td><?= $value['adresse'] ?></td>
                            <td><a href="?id=<?= $value['id'] ?>"><i class='bx bx-edit-alt'></i></a> | <a href="model/supfournisseur.php?id=<?php echo $value['id']; ?>"><i class='bx bx-trash'></i></a></td>
                            
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
