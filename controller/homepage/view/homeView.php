<?php

$nainsList = '';
$villesList = '';
$groupsList = '';
$tavernesList = '';


foreach ($nains as $nain)
{
    $nainsList .= '<option value="'.$nain['n_id'].'">'.$nain['n_nom'].'</option>';
}

foreach ($villes as $ville)
{
    $villesList .= '<option value="'.$ville['v_id'].'"><a href="?controller=Ville&action=getView"></a>'.$ville['v_nom'].'</option>';
}

foreach ($groups as $group)
{
    $groupsList .= '<option value="'.$group['g_id'].'"><a href="?controller=Group&action=getView"></a>'.$group['g_id'].'</option>';
}

foreach ($tavernes as $taverne)
{
    $tavernesList .= '<option value="'.$taverne['t_id'].'"><a href="?controller=Taverne&action=getView"></a>'.$taverne['t_nom'].'</option>';
}
?>


<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <h1 class="mb-5 text-center">Gestion du personnel minier</h1>
        </div>
        <div class="col-md-6 m-auto">
            <!-- Choisir nain -->
            <div class="liste mb-3">
                <form class="form" action="" method="GET">
                    <div class="form-group">
                        <select name="n_id" class="form-control" id="groupe">
                            <?=$nainsList?>
                        </select>
                    </div>
                    <input type="hidden" name="controller" value="Nain">
                    <input type="hidden" name="action" value="getView">
                    <button type="submit" name="n_submit" value="1" class="btn btn-warning">Choisir nain</button>
                </form>
            </div>

            <!-- Choisir Ville -->
            <div class="liste mb-3">
                <form class="form" action="" method="GET">
                    <div class="form-group">
                        <select name="v_id" class="form-control" id="groupe">
                            <?=$villesList?>
                        </select>
                    </div>
                    <input type="hidden" name="controller" value="Ville">
                    <input type="hidden" name="action" value="getView">
                    <button type="submit" name="v_submit" value="1" class="btn btn-warning">Choisir ville</button>
                </form>
            </div>
            <!-- Choisir groupe -->
            <div class="liste mb-3">
                <form class="form" action="" method="GET">
                    <div class="form-group">
                        <select name="g_id" class="form-control" id="groupe">
                            <?=$groupsList?>
                        </select>
                    </div>
                    <input type="hidden" name="controller" value="Group">
                    <input type="hidden" name="action" value="getView">
                    <button type="submit" name="g_submit" value="1" class="btn btn-warning">Choisir groupe</button>
                </form>
            </div>
            <!-- Choisir taverne -->
            <div class="liste mb-3">
                <form class="form" action="" method="GET">
                    <div class="form-group">
                        <select name="t_id" class="form-control" id="groupe">
                            <?=$tavernesList?>
                        </select>
                    </div>
                    <input type="hidden" name="controller" value="Tavern">
                    <input type="hidden" name="action" value="getView">
                    <button type="submit" name="t_submit" value="1" class="btn btn-warning">Choisir taverne</button>
                </form>
            </div>
        </div>
    </div>
</div>