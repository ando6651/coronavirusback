<div class="content">
    <div class="barretitre">
        <h1>Statistique covid-19</h1>
    </div>
    <div class="corps">
        <br>
        <h2 style="text-align: center;"> Ajout</h2><br>
        <form action="<?php echo $base_url; ?>ajout-statistique-covid-19.html" method="post">
            <select name="lieu">
                <option value="2">Madagascar</option>
                <option value="1">Autre</option>
            </select><br>
            <div class="inlineinput">
                <h5 class="label">nouveau cas</h5>
                <input type="number" name="nouveaucas" value=0 min="0">
            </div><br><br>
            <div class="inlineinput">
                <h5 class="label">gueris</h5>
                <input type="number" name="gueris" value=0 min="0">
            </div><br><br>
            <div class="inlineinput">
                <h5 class="label">deces</h5>
                <input type="number" name="deces" value=0 min="0">
            </div><br><br>
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
            <li class="listgroupitem">
                <div class="inlineinput">
                    <div class="textview">
                        <h5><strong>Statistique cas COVID-19 Mondiale</strong> : <?php echo intval($statmondiale->nouveaucas); ?> (Confirmés) ; <?php echo intval($statmondiale->gueris); ?> (Guérisons) ; <?php echo intval($statmondiale->deces); ?> (Décès)</h5>
                    </div>
                </div>
            </li>
            <hr>
            <li class="listgroupitem">
                <div class="inlineinput">
                    <div class="textview">
                        <h5><strong>Statistique cas COVID-19 Madagascar</strong> : <?php echo intval($statlocal->nouveaucas); ?> (Confirmés) ; <?php echo intval($statlocal->gueris); ?> (Guérisons) ; <?php echo intval($statlocal->deces); ?> (Décès)</h5>
                    </div>
                </div>
            </li>
            <hr>
        </ul>
        <div style="text-align: center;width: 100%;">
            <a href="<?php echo $base_url; ?>reinitialiser-statistique-covid-19.html"><button style="background-color: #6d5454;">reinitialiser</button></a>
        </div>

        <?php if ($error == 3) { ?>
            </br>
            <h6 style="text-align: center;"> erreur lors de la reinitialisation !</h6><br>
        <?php  } ?>
    </div>
</div>
</body>

</html>