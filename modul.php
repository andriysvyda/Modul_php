<?php
$products = array(
    ["Id"=>1, "Name"=>"Phone", "MadeIn"=>"China", "Price"=>"25500"],
    ["Id"=>2, "Name"=>"Watches", "MadeIn"=>"England", "Price"=>"14000"],
    ["Id"=>3, "Name"=>"Tv", "MadeIn"=>"Germany", "Price"=>"46000"],
    ["Id"=>4, "Name"=>"Monitor", "MadeIn"=>"Ukraine", "Price"=>"9000"],
);

function showTable($products){
    $table = "<table>";
    $table .= "<tr></tr>";
    foreach (array_keys($products[1]) as $key) {
        $table .=
            "<th style='border: 1px; border-style: solid'>$key</th>";
    }

    if (isset($_POST["save1"])) {
        $new = add();
        array_push($products, $new);
    }


    foreach ($products as $product){

        $table .= "<tr></tr>";
        if (isset($_POST["save2"])){
            $edit = edit($product["Id"]);

            if ($product["Id"] == $edit["Id"]) {
                $product = array_replace($product, $edit);
            }
        }
        foreach ($product as $value){
            $table .=
                "<td style='border: 1px; border-style: solid'>$value</td>";
        }
    }


    echo $table;
}


function add(){
    return  [
        "Id"=>$_POST["Id"],
        "name"=>$_POST["Name"],
        "MadeIn"=>$_POST["MadeIn"],
        "Price"=>$_POST["Price"],
    ];
}

function edit($Id){
    if ($Id == $_POST["Id"]){
        return [
            "Id"=>$_POST["Id"],
            "name"=>$_POST["Name"],
            "MadeIn"=>$_POST["MadeIn"],
            "Price"=>$_POST["Price"],
        ];
    }
}
?>

<?php showTable($products) ?>

    <form method="post">

        <button name="add" type="submit">Додати продукт</button>

        <button name="edit" type="submit">Редагувати продукт</button>

        <?php if (isset($_POST["add"])):?>
            <label> Id
                <input type='number' name='Id'>
            </label><br>
            <label> Name
                <input type='text' name='Name'>
            </label><br>
            <label> MadeIn
                <input type='text' name='MadeIn'>
            </label><br>
            <label> Price
                <input type='number' name='Price'>
            </label><br>

            <button name="save1" type="submit">Зберегти</button>
        <?php endif;?>

        <?php if (isset($_POST["edit"])):?>
            <label> Id
                <input type='number' name='Id'>
            </label><br>
            <label> Name
                <input type='text' name='Name'>
            </label><br>
            <label> MadeIn
                <input type='text' name='MadeIn'>
            </label><br>
            <label> Price
                <input type='number' name='Price'>
            </label><br>

            <button name="save2" type="submit">Зберегти</button>

        <?php endif;?>

    </form>
