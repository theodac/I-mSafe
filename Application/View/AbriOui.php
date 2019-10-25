<?php

require 'header.php';

?>

<body>

<div class="test" style="height: 10%">


    <div class="small-6 columns">
        <br>
        <a href="/I-mSafe" class="button  buttonevac"><img src="https://img.icons8.com/ios-glyphs/30/000000/home.png"></a>

    </div>
    <div class="small-6 columns">

    </div>

</div>




<div class="nombre">


    <form action="/imSafe/Evacuate/validation" method="post">
        <div class="large-12 columns">
            <section class="block-list">

                <header >Listes des survivants</header>
                <br>
                <br>
                <ul>
                    <li>
                        <div class="medium-6 cell">
                            <br>
                            <label>Nom</label>
                                <input type="text"  name="name">

                        </div>
                        <div class="medium-6 cell">
                            <br>
                            <label>Prénom
                                <input type="text"  name="firstname">
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="medium-6 cell">
                            <br>
                            <label>Adresse
                                <input type="text"  name="address">
                            </label>
                        </div> <div class="medium-6 cell">
                            <br>
                            <label>Ville
                                <input type="text"  name="city">
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="medium-6 cell">
                            <br>
                            <label>Code Postal
                                <input type="text"  name="zip" style="width:50%">
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
                <button type="submit" class="button buttonevac">Validez</button>
            </div>
        </div>
    </form>




    <div class="TEST" style="height: 37.5%"></div>

</body>
