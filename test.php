<div class="container-searchbar">
<form method="POST" action="">
    <div class="form-row" style="margin-left:10px;">

        <div class="col">
            <label style="color:black;">Situation</label>
            <select class="form-control" name=statut id="exampleFormControlSelect1">
                <option value="">Choisir la situation</option>
                <option value=0>Demande de l'aide</option>
                <option value=1>Proposition d'aide</option>
            </select>
        </div>

        <div class="col">
            <label style="color:black;">Type d'aide</label>
            <select class="form-control" name=typead id="exampleFormControlSelect1">
                <option value="">Choisir le type d'aide</option>
                <option value=Service>Service</option>
                <option value="Transport">Transport</option>
                <option value="Materiel">Matériel</option>
                <option value="Hebergement">Hébergement</option>
                <option value="Autre">Autre..</option>
            </select>
        </div>

        <div class="col">
            <label style="color:black;">Département</label>

        <input name=adlocation  class="form-control" style="margin-left:10px;" type="number" min="1" max="1000">
        </div>

        <div class="col">
            <button type="submit" class="btn btn-dark" style="margin-left:10px;margin-top:32px;">Rechercher</button>
        </div>

    </div>
    </form>
</div>

<?php 

$ads = array(
    array(
        "statut" => 0,
        "typead" => "Service",
        "adlocation" => 1
    ),
    array(
        "statut" => 0,
        "typead" => "Transport",
        "adlocation" => 2
    ),
    array(
        "statut" => 0,
        "typead" => "Hebergement",
        "adlocation" => 3
    ),
    array(
        "statut" => 1,
        "typead" => "Materiel",
        "adlocation" => 4
    ),
    array(
        "statut" => 1,
        "typead" => "Autre",
        "adlocation" => 5
    ),
);

function removeElementWithValue($array, $key, $value){
    foreach($array as $subKey => $subArray){
         if($subArray[$key] != $value){
              unset($array[$subKey]);
         }
    }
    return $array;
}

if (!empty($_POST)) {

    var_dump($_POST);
    switch($_POST) {

        case (($_POST['statut'] != "") && ($_POST['adlocation'] != "") && ($_POST['typead'] == "")):
        echo 'a choisi statut et adlocation';
        $selectads = removeElementWithValue($ads, "statut", $_POST['statut']);
        $selectads = removeElementWithValue($ads, "adlocation", $_POST['adlocation']);
        $ads = $selectads;
        break;

    }
}

    var_dump($ads);


?>