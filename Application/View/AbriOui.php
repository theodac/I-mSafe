<?php

require 'header.php';

?>

<body>

<div class="test" style="height: 10%"></div>



<div class="nombre">


    <form>
        <div class="large-12 columns">
            <section class="block-list">

                <header >Listes des survivants</header>
                <br>
                <br>
                <ul>
                    <li>
                        <div class="medium-6 cell">
                            <br>
                            <label>Nom
                                <input type="text" placeholder="Nom">
                            </label>
                        </div>
                        <div class="medium-6 cell">
                            <br>
                            <label>Prénom
                                <input type="text" placeholder="Prénom">
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
                <select  class="small-6 columns">
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
                <select  class="small-6 columns">
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
                <a href="validation.php" class="button buttonevac">Validez</a>
            </div>
        </div>
    </form>

    <div class="TEST" style="height: 37.5%"></div>

</body>
