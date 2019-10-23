<?php
/**
 * Created by PhpStorm.
 * User: WEBENOO
 * Date: 17/09/2019
 * Time: 15:07
 */
?>
<h2>Groupe Fonctionne</h2>
<form method="post" action="http://localhost:8888/I-mSafe/situation/create">
    <input type="number" name="nbr_personne">
    <button type="submit" name="valider">Valider</button>
</form>
<?php

echo $_SESSION['uuid'];
echo $_SESSION['choix'];

?>