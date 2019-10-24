<?php

require 'header.php';

?>

<body>

<div class="test" style="height: 10%"></div>

<div class="test" style="height: 15%">
    <div class="row column text-center">

        <h3 class="subheader">Trouvez un point de rassemblement </h3>

    </div>
</div>

<div class="nombre">

    <div class="row medium-uncollapse large-collapse">
        <div class="small-6 columns">
            <h2>Où êtes-vous ? </h2>
        </div>
        <div class="small-12 columns">
            <div class="row">
                <div class="large-12 columns">
                    <input type="text" placeholder="Adresse" />
                </div>
            </div

        </div>

        <?php

        include 'map.php'

        ?>



        <div class="large-12 columns">

            <div class="test" style="height: 10%"></div>


            <section class="block-list">
                <header>Points de rassemblement</header>

                    <?php
                    foreach ($rassembly as $rassemble){
                    ?>
                <ul style="border-bottom: 1px solid black">
                    <li>
                        <p class="list-header"><?= $rassemble->name ?></p>
                    </li>
                    <li>
                        <p class="list-header">Gérant : <?= $rassemble->owner ?></p>
                    </li>
                    <li>
                        <p class="list-header">Numéro de téléphone: 0<?= $rassemble->phone ?></p>
                    </li>
                </ul>
                    <?php
                    }

                    ?>

            </section>
        </div>
    </div>
</div>

<div class="row medium-uncollapse large-collapse">
    <div class="small-6 columns">
    </div>
    <div class="small-5 columns">
        <br>
        <a href="/imSafe/Evacuate/AbriOui" class="button buttonevac">Je suis en sécurité</a>
    </div>
</div>


<div class="TEST" style="height: 37.5%"></div>

</body>
