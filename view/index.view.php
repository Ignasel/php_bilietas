<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/igno3/view/css/style.css">
    <title><?=siteName;?></title>
</head>
<body>
<?php
$bagazas = [5,10,15,20,25,30,35,40,45,50];
$skrydzioNr = ['JB-255','JB-254','JB-256','JB-257','JB-258','JB-259'];
$iKurSkrenda = ['Vilnius','Kaunas','Klaipėda', 'Panevėžys', 'Šiauliai', 'Alytus'];
$IsKurSkrenda = ['Vilnius','Kaunas','Klaipėda', 'Panevėžys', 'Šiauliai', 'Alytus'];

$validation_errors=[];


if (isset($_POST['submit'])) {
    if (!isset($_POST['flightNumber'])) {
        $validation_errors[] = "Iveskite skrydžio numerį";
    }
    if (!isset($_POST['weight'])) {
        $validation_errors[] = "Iveskite bagažo svorį";
    }
    if (!preg_match('/\w{1,100}$/',
        trim(htmlspecialchars($_POST['name']))) ){
        $validation_errors[] = "Vardas negali virsyti 100 simboliu ir trumpesnis uz 1 simboli";
    } else {
        $_POST['name'] = trim(htmlspecialchars( $_POST['name']));
    }
    if (!preg_match('/\w{1,100}/',
        trim(htmlspecialchars($_POST['lastName'])))) {
        $validation_errors[] = "Pavarde negali virsyti 100 simboliu ir trumpesnis uz 1 simboli";
    } else {
        $_POST['lastName']= trim(htmlspecialchars($_POST['lastName']));
    }
    if(!preg_match( "/^([3-6]\d{10})$/",
        trim(htmlspecialchars($_POST['idCode'])))){
        $validation_errors[] = "Pasitikrinkite! Asmens kodą turi sudaryti 11 skaitmenų ir turi buti tinkamas formatas";
    } else {
        $_POST['idCode'] = trim(htmlspecialchars($_POST['idCode']));
    }
    if (!preg_match('/[\w\s{50,100}]/i',
        trim(htmlspecialchars($_POST['pastaba'])))) {
        $validation_errors[] = "Netinkamas pastabos formatas";
    } else {
        $_POST['pastaba'] = trim(htmlspecialchars($_POST['pastaba']));
    }
}

?>

<?php if($validation_errors) :?>
    <div class="errors">
        <ul>
            <?php foreach($validation_errors as $error) :?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>

<div class="container ">
    <div class="row">
        <div class="col-sm text-center ">
            <h2 class="p-5">Lektuvo bilietu forma</h2>
            <form method="post" >
                <div class="form-group">
                    <select name="flightNumber" class="form-control">
                        <option selected disabled>--Pasirinkite skrydzio numeri--</option>
                        <?php foreach ($skrydzioNr as $skrydis): ?>
                            <option value="<?= $skrydis; ?>"><?= $skrydis; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="weight" class="form-control">
                        <option selected disabled>--Iveskite bagazo svori---</option>
                        <?php foreach ($bagazas as $svoris): ?>
                            <option value="<?= $svoris; ?>"><?= $svoris; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="direction" class="form-control">
                        <option selected disabled>---Kryptis i prieki---</option>
                        <?php foreach ($iKurSkrenda as $kryptis): ?>
                            <option value="<?= $kryptis; ?>"><?= $kryptis; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="inputHome" class="form-control">
                        <option selected disabled>---Is kur skrenda----</option>
                        <?php foreach ($IsKurSkrenda as $isKur): ?>
                            <option value="<?= $isKur; ?>"><?= $isKur; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Vardas">Suveskite keleivio varda</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="pavarde">Suveskite keleivio pavarde</label>
                    <input type="text" class="form-control" id="pavarde" name="lastName">
                </div>
                <div class="form-group">
                    <label for="asmkodas">Suveskite asmens koda</label>
                    <input type="number" class="form-control" id="asmkodas" name="idCode">
                </div>
                <div class="form-group">
                    <label for="kaina">Suveskite skrydzio kaina</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>
                <div class="form-group">
                    <label for="pastaba">Pastaba</label>
                    <textarea class="form-control" name="pastaba" id="pastaba" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Užsakyti bilietą</button>

                <?php if (isset($_POST["submit"]) && !$validation_errors):?>

                    <?php $pastaba = $_POST['pastaba'];
                    $direction = $_POST['direction'];
                    $inputHome = $_POST['inputHome'];
                    $name = $_POST['name'];
                    $lastName = $_POST['lastName'];
                    $idCode =  $_POST['idCode'];
                    $flightNumber = $_POST['flightNumber'];

                    $justPrice = $_POST['price'];
                    $weight = $_POST['weight'];
                    $weightPrice = 0;
                    if ($weight >= 20){
                        ($price = $justPrice + 30) && ($weightPrice = $weightPrice + 30);
                    } else $price=$justPrice;
                    $totalPrice = $price*1.21;
                    ?>
                    <button type="button" name="submit" class="btn btn-primary" data-toggle="modal" data-target="#ticket">
                        Spausdinti bilietą
                    </button>
                <?php endif;?>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id = "ticket" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tikrai nepadirbtas skrydžio bilietas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container ticketContainer">
                <div class="row ticket">
                    <div class="row ticketInfo">
                        <div class="col-8 mainInfo">
                            <div class="row directionsInfo">
                                <div class="row flightNumber">Skrydžio numeris: <?=$flightNumber?></div>
                                <div class="col time"><?php echo "Bilieto uždakymo data: " . date("Y/m/d")?></div>
                                <div class="col fromTo"><p>IŠ<br>Į</p></div>
                                <div class="col directions"><?=$inputHome?><br><?=$direction?></div>
                            </div>
                            <div class="row timeInfo">
                                <div class="col departure">Išvyksta: 2020/02/20 15:20</div>
                                <div class="col arrival">Atvyksta: 2020/02/20 15:50</div>
                                <div class="col flightTime">Kelionės trukmė: 00.30</div>
                            </div>
                            <div class="row personalInfo">
                                <div class="col passangerName">Keleivio vardas: <?=$name?></div>
                                <div class="col passangerLastName">Keleivio pavardė: <?=$lastName?></div>
                                <div class="col passangerId">ID: <?=$idCode?></div>
                            </div>
                            <div class="row pastabos">
                                Pastabos: <?=$pastaba?>
                            </div>
                        </div>
                        <div class="col-4 priceInfo align-self-start">
                            <div class="row priceHead">Kaina ir moksečiai</div>
                            <div class="row pricing">
                                <div class="col priceTag">
                                    <p>Kelionės kaina: <?=$justPrice?> € <br>Bagažas: <?=$weightPrice?> €<br>PVM: 21%</p>
                                </div>
                            </div>
                            <div class="row priceTotal">
                                Viso: <?=$totalPrice?>  €
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
</footer>
</body>
</html>