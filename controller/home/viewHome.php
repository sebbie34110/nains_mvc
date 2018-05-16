<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 15/05/2018
 * Time: 13:51
 */
?>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <h1 class="mb-5 text-center">Gestion du personnel minier</h1>
        </div>
        <div class="col-md-6 m-auto">
            <!-- Choisir nain -->
            <div class="liste mb-3">
                <form class="form" action="nain.php?> " method="GET">
                    <div class="form-group">
                        <select name="nain" class="form-control" id="groupe">
                            <?= $listeNains ?>
                        </select>
                    </div>
                    <button type="submit" name="choisir_nain" value="" class="btn btn-warning">Choisir nain</button>
                </form>
            </div>

            <!-- Choisir Ville -->
            <div class="liste mb-3">
                <form class="form" action="ville.php?> " method="GET">
                    <div class="form-group">
                        <select name="v_id" class="form-control" id="groupe">
                            <?= $listeVilles ?>
                        </select>
                    </div>
                    <button type="submit" name="submit" value="" class="btn btn-warning">Choisir ville</button>
                </form>
            </div>
            <!-- Choisir groupe -->
            <div class="liste mb-3">
                <form class="form" action="../groupe/viewGroupe.php?> " method="GET">
                    <div class="form-group">
                        <select name="g_id" class="form-control" id="groupe">
                            <?= $listeGroupes ?>
                        </select>
                    </div>
                    <button type="submit" name="choisir_groupe" value="" class="btn btn-warning">Choisir groupe</button>
                </form>
            </div>
            <!-- Choisir taverne -->
            <div class="liste mb-3">
                <form class="form" action="taverne.php?> " method="GET">
                    <div class="form-group">
                        <select name="t_id" class="form-control" id="groupe">
                            <?= $listeTavernes ?>
                        </select>
                    </div>
                    <button type="submit" name="taverne_submit" value="" class="btn btn-warning">Choisir taverne</button>
                </form>
            </div>
        </div>
    </div>
</div>
