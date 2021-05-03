<div class="content">
    <div class="barretitre">
        <h1>Information Covid-19</h1>
    </div>
    <div class="corps">
        <br>
        <h2 style="text-align: center;"> Ajout</h2><br>
        <form action="<?php echo $base_url; ?>ajout-information-covid-19.html" method="post">
            <select name="categorie">
                <option value="prevention">prevention</option>
                <option value="symptome">symptome</option>
                <option value="traitement">traitement</option>
            </select><br>
            <textarea name="descri" placeholder="Description"></textarea><br>
            <button>ajouter</button><br><br>
            <?php if ($error == 1) { ?>
                </br>
                </br>
                <h6> erreur lors de l'ajout !</h6>
            <?php    } ?>
        </form>
        <br>
        <hr><br>
        <h2 style="text-align: center;"> Suppression</h2><br>
        <ul class="listgroup">
            <br>
            <?php for ($iinfo = 0; $iinfo < count($info); $iinfo++) { ?>
                <li class="listgroupitem">
                    <div class="inlineinput">
                        <div class="textview">
                            <h5><strong><?php echo $info[$iinfo]->categorie; ?></strong> - <?php echo $info[$iinfo]->descri; ?></h5>
                        </div>
                        <div class="badge"><a class="sup" href="<?php echo $base_url; ?>supprimer-information-covid-19-<?php echo $info[$iinfo]->idinformation; ?>.html"><i class="sup fa fa-times-circle"></i></a></div>
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