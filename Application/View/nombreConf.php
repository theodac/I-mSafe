<?php

require 'header.php';

?>

<body>

<div class="test" style="height: 15%">


    <div class="small-6 columns">
        <br>
        <a href="/ImSafe" class="button  buttonConf"><img src="https://img.icons8.com/ios-glyphs/30/000000/home.png"></a>

    </div>
    <div class="small-6 columns">

    </div>

</div>


<div class="test" style="height: 25%">
    <div class="row column text-center">


        <h3 class="subheader">Combien êtes-vous ? </h3>

        <form action="/imSafe/Confinement/abriConf" method="post">

            <div align="center">
                <input id="number" type="number" value="2" align="center" name="number" style="width: 60% !important;">

            </div>

            <div>
                <button type="submit" class="button buttonConf">Validez</button>
            </div>
        </form>
    </div>




</div>



<div class="TEST" style="height: 37.5%"></div>

</body>
