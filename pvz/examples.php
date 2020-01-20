<?php
/**
 * Created by PhpStorm.
 * User: moksleivis
 * Date: 2020-01-15
 * Time: 09:35
 */

/**
// * Created by PhpStorm.
// * User: moksleivis
// * Date: 2020-01-13
// * Time: 08:40
// */
//
//$vardas = 'Ignas';
//$pavarde = 'Siugzdinis';
//$elPastas = 'Ignas@ignas.com';
//$eilute = ' Lietuva labai graži ';
//$ilgis = strlen($eilute);
//$eilute_be_tarp = trim($eilute);
//$didziosios_raides = strtoupper($eilute);
//$mazosios_raides = strtolower($eilute);
//$pavadinimas = ucfirst($eilute);
//$tekstas = str_replace("Lietuva", "Latvija", $eilute);
//$zodis = substr($eilute, 1, 7);
//
///*echo 'Mano vardas yra '.$vardas. ', o pavardė '.$pavarde.', man galite parašyti į '.$elPastas
//;
//*/
////var_dump($vardas);
//
//echo "Man labai patiko filmas \"Labai geras\" $ilgis arba $eilute_be_tarp didžiosios raidės $didziosios_raides
//$mazosios_raides arba $pavadinimas arba $tekstas arba $zodis";
//
//if(isset($vardas)){
//    echo  "Labas";
//}else{
//    echo "Nėra vardo";
//}



$duomenys = array('Jonas', 12, true);

$prekes =['Kompas', 'Telefonas', 'php storm' ];

$prekes[]="Pienas";
$kiekis = count($prekes);

echo $duomenys[1];
echo $kiekis;

//for ($i=0; $i<$kiekis; $i++){
//    echo $prekes[$i];
//}

foreach ($prekes as $id => $preke) {
    echo "$id : $preke</br>";
}

$maistas = [
        'PRK-12' => "Sokoladas",
        'PRK-156' => "Sauskelnės",
        'PK-44' => "Lentynolis"
];

$knygos = [
        'GROZ' => [
                'KN-1' => 'Grazi knyga',
                'KN-2' => 'Labai grazi knyga',
                'KN-3' => 'Nuostabi knyga',
        ],
         'PSICHOLOGIJA' => [
             'KN-4' => 'Kaip miegoti',
             'KN-5' => 'Kaip myleti',
             'KN-6' => 'Kaip valgyti',
         ],
        'IT' => [
            'KN-7' => 'Kaip php',
            'KN-8' => 'Kaip JS',
            'KN-9' => 'WEB DEV 2020',
        ]
];



?>

<!--<ul>-->
<!--    --><?php //foreach ($maistas as $id=> $produktas):?>
<!--        --><?php //if ($id === 'PRK-156'):?>
<!--        <li>--><?=$id;?><span><?//= $preke;?><!--</span>(Prekės sandelyje nėra)</li>-->
<!--        --><?php else:?>
        <li><?=$id;?><span><?=$preke;?></span></li>
<!--        --><?php //endif;?>
<!--    --><?php //endforeach;?>
</ul>

<ul>
    <?php foreach ($knygos as $stilius => $pavadinimai):?>
        <ul><?=$stilius;?></ul>
        <?php foreach ($pavadinimai as $vardas ):?>
            <li><?=$vardas;?></li>
        <?php endforeach;?>
    <?php endforeach;?>
</ul>



<!---->
<!--<div>-->
<!--    <div>-->
<!--        --><?php //if ($vardas):?>
<!--        <p>Labas : --><?//=$vardas;?><!--</p>-->
<!--        --><?php //else:?>
<!--        <p>Nėra vardo</p>-->
<!--        --><?php //endif;?>
<!--    </div>-->
<!--</div>-->


     <h1><?=siteName;?></h1>
  <nav>
      <ul>
          <?php foreach ($nav as $href => $title):?>
          <li><a href="http://<?=$href;?>.lt"><?=$title;?></a></li>
          <?php endforeach;?>
      </ul>
  </nav>
    <?php
    $padaliniai = ['IT','FIN','Admin'];
    if(isset($_GET['submit'])){
    var_dump($_GET);
    }
    ?>

    <div class="container">
    <form>
        <div class="form-group">
             <select name="" id ="" class="form-control">
                 <option selected disabled>--Pasirinkite--</option>
                 <?php foreach ($padaliniai as $padalinys):?>
                 <option value="<?=$padalinys?>"><?=$padalinys?></option>
                 <?php endforeach;?>
             </select>
            <select name="" id ="" class="form-control">
                <option selected disabled>--Pasirinkite--</option>
                <?php foreach ($padaliniai as $padalinys):?>
                <option value="<?=$padalinys?>"><?=$padalinys?></option>
                <?php endforeach;?>
            </select>
            <select name="" id ="" class="form-control">
                <option selected disabled>--Pasirinkite--</option>
                <?php foreach ($padaliniai as $padalinys):?>
                <option value="<?=$padalinys?>"><?=$padalinys?></option>
                <?php endforeach;?>
            </select>
            <select name="" id ="" class="form-control">
                <option selected disabled>--Pasirinkite--</option>
                <?php foreach ($padaliniai as $padalinys):?>
                <option value="<?=$padalinys?>"><?=$padalinys?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control" id="inputEmail" name="email">
          </div>
          <div class="form-group">
              <label for="inputName">Vardas</label>
              <input type="text" class="form-control" id="inputName" name="name">
          </div>
          <div class="form-group">
              <label for="inputLastName">Pavardė</label>
              <input type="text" class="form-control" id="inputLastName" name="lastName">
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
    </form>
</div>

     <div class="container">
      <table>
          <tr>
              <th>Klasė</th>
              <th>Kodas</th>
              <th>Vardas</th>
              <th>Pavardė</th>
              <th>Kontrolinių darbų vidurkis</th>
              <th>Duomenų formatavimo data</th>
          </tr>
          <?php foreach ($klase_5b as $mokiniai => $duomenys):?>
              <?php foreach ($duomenys as $duomekat => $vardaas):?>
                <?php if($duomekat === 'kontroloniu_darbu_ivertinimai'):?>
                      <?php $pazymiai_count = count($vardaas);
          $pazymiai_sum = array_sum($vardaas);
          $avarage = $pazymiai_sum/$pazymiai_count; ?>
          <tr><td><?=$avarage;?><td>
#                       <?php foreach ($vardaas as $pazymiai=> $pazymys):?>
                        <?php endforeach;?>
                  <?php else:?>
                  <td><?=$vardaas;?></td> </tr>
          <?php endif?>
          <?php endforeach;?>
          <?php endforeach;?>
      </table>


         <?php

$bagazas = [5,10,15,20,25,30,35,40,45,50];

$skrydzioNr = ['JB-255','JB-254','JB-256','JB-257','JB-258','JB-259'];

$iKurSkrenda = ['Vilnius','Kaunas','Klaipėda', 'Panevėžys', 'Šiauliai', 'Alytus'];

$IsKurSkrenda = ['Vilnius','Kaunas','Klaipėda', 'Panevėžys', 'Šiauliai', 'Alytus'];

?>