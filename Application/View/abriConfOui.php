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



<div class="nombre">


    <form action="/imSafe/Confinement/ValidConf" method="post">
        <div class="large-12 columns">
            <section class="block-list">

                <header  class="conf">Listes des survivants</header>

                <ul style="margin-top: 40px">
                    <li>
                        <div class="medium-6 cell" style="margin-right: 10px">
                            <label>Nom </label>
                                <input type="text"  name="name" id="name" onkeyup='isCharSet()' >

                        </div>
                        <div class="medium-6 cell">
                            <label>Prénom
                                <input type="text"  name="firstname" id="firstname" onkeyup='isCharSet()'>
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="medium-6 cell" style="margin-right: 10px">
                            <label>Adresse
                                <input type="text"  name="address" id="address" onkeyup='isCharSet()'>
                            </label>
                        </div> <div class="medium-6 cell">
                            <label>Ville
                                <input type="text"  name="city" id="city" onkeyup='isCharSet()'>
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="medium-6 cell" style="margin-right: 10px">
                            <label>Code Postal
                                <input type="text"  name="zip" style="width:50%" id="zip" onkeyup='isCharSet()'>
                            </label>
                        </div>


                    </li>
                </ul>

            </section>
        </div>


        <div class="row medium-uncollapse large-collapse">

            <div class="small-6 columns">
                <br>
                <br>
                <br>
                <p> Enfants</p>
            </div>
            <div class="small-6 columns">
                <br>
                <br>
                <br>
                <select  class="small-6 columns" name="nbrChild">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
        </div>

        <div class="row medium-uncollapse large-collapse">
            <div class="small-6 columns">
                <p> Bébé(s) (jusqu'à deux ans)</p>
            </div>
            <div class="small-6 columns">
                <select  class="small-6 columns" name="nbrbaby">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
        </div>

        <br>

        <div class="row medium-uncollapse large-collapse">
            <div class="small-7 columns">
            </div>
            <div class="small-5 columns">
                <button type="submit" class="button buttonConf" id="button" disabled >Validez</button>
            </div>
        </div>
    </form>

    <div class="TEST" style="height: 37.5%"></div>

    <script>
        let inputElt = document.getElementById('name');
        let inputFname = document.getElementById('firstname');
        let inputAddress = document.getElementById('address');
        let inputCity = document.getElementById('city');
        let inputZip = document.getElementById('zip');
        let btn = document.getElementById('button');
        // on commence par desactiver le bouton quand le javascript se charge
        btn.disabled = true;

        // ajout d'une fonction appelee des qu'une touche est enfoncee
        function isCharSet() {
            // on verifie si le champ n'est pas vide alors on desactive le bouton sinon on l'active
            if (inputElt.value != "" && inputFname.value != "" && inputAddress.value != "" && inputCity.value != "" && inputZip.value != "") {
                btn.disabled = false;
            } else {
                btn.disabled = true;
            }
        }
    </script>

</body>
