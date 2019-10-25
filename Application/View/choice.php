<?php
/**
 * Created by PhpStorm.
 * User: WEBENOO
 * Date: 22/10/2019
 * Time: 10:20
 */
?>

<h2>Page choix Evacuation ou Confinement</h2>



<h3>Lieux de rassemblement près de vous</h3>
<ul>
    <?php
    foreach ($pharmacy as $pharma){
    ?>
    <li><?= $pharma->name ?> , <br> Adresse : <?= $pharma->addressOrigin?> <br> <a href="?person=5">Click here to text us!</a> <a href="http://www.google.com/maps/place/<?= $pharma->lat ?>,<?= $pharma->lng ?>">M'y Rendre</a></li>
    <?php
    }
    ?>
</ul>