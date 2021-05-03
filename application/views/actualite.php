<div class="content">
    <div class="barretitre">
        <h1>Actualite Covid-19</h1>
    </div>
    <div class="corps">
        <br>
        <h2 style="text-align: center;"> Ajout</h2><br>
        <form action="<?php echo $base_url; ?>ajout-actualite-covid-19.html" method="post">
            <select name="lieu">
                <option value="2">Madagascar</option>
                <option value="1">Autre</option>
            </select><br>
            <div class="inlineinput">
                <h5 class="label">titre</h5>
                <input type="text" name="titre" placeholder="titre de l actu">
            </div><br><br>
            <div class="inlineinput">
                <h5 class="label">date</h5>
                <input type="date" name="dateevent" value="<?php echo date("Y-m-d"); ?>">
            </div><br><br>
            <textarea name=" evenement" placeholder="evenement / description"></textarea><br>
            <button>ajouter</button><br><br>
            <?php if ($error == 1) { ?>
                </br>
                </br>
                <h6> erreur lors de l'ajout !</h6>
            <?php } ?>
        </form>
        <br>
        <hr><br>
        <h2 style="text-align: center;"> Suppression</h2><br>
        <h5 style="text-align: center;">titre(s)</h5>
        <ul class="listgroup">
            <br>
            <?php for ($iactu = 0; $iactu < count($actu); $iactu++) { ?>
                <li class="listgroupitem">
                    <div class="inlineinput">
                        <div class="textview">
                            <h5><strong><?php echo $actu[$iactu]->titre; ?></strong> (<?php echo $actu[$iactu]->dateevent; ?>)</h5>
                        </div>
                        <div class="badge"><a class="sup" href="<?php echo $base_url; ?>supprimer-actualite-covid-19-<?php echo $actu[$iactu]->idactualite; ?>.html"><i class="sup fa fa-times-circle"></i></a></div>
                    </div>
                </li>
                <hr>
            <?php } ?>
        </ul>
        <?php if ($error == 3) { ?>
            </br>
            <h6 style="text-align: center;"> erreur lors de la suppression !</h6><br>
        <?php  } ?>
    </div>
</div>
</body>

</html>