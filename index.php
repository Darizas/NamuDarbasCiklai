<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3 namų darbas</title>
</head>

<body>

<!-- Naršyklėje nupieškite linija iš 400 “*”. 
        -Naudodami css stilių “suskaldykite” liniją taip, kad visos žvaigždutės matytųsi ekrane;
        -Programiškai “suskaldykite” žvaigždutes taip, kad vienoje eilutėje nebūtų daugiau nei 50 “*”;  -->

    <div style="word-break: break-all">    
        <?php
        for ($i = 0; $i < 400; $i++) {
            echo "*";
        }
        ?>
    </div>
    <br>
    <div>
    <?php
        for ($i = 1; $i <= 400; $i++) {
            echo "*";
            if ($i % 50 == 0) {
                echo "<br>";
            }
        }
        ?>
    </div>
    <br>
<!-- Sugeneruokit 300 atsitiktinių skaičių nuo 0 iki 300, atspausdinkite juos atskirtus tarpais ir suskaičiuokite 
kiek tarp jų yra didesnių už 150.  Skaičiai didesni nei 275 turi būti raudonos spalvos. -->
    <div>
        <?php
        $count = 0;
        for ($i=0; $i < 300; $i++) { 
            $number = rand(0,300);
            if ($number > 150) {
                $count++;
            }
            if ($number > 275) {
                echo "<span style=\"color:red\">{$number} </span>";
            } else {
                echo "<span>{$number} </span>";
            }
        }
        echo "<br>";
        echo "Skaičių, didesnių nei 150: {$count}"
        ?>
    </div>
    <br>
<!-- Vienoje eilutėje atspausdinkite visus skaičius nuo 1 iki atsitiktinio skaičiaus tarp 3000 - 4000 pvz(aibė nuo 1 iki 3476), 
kurie dalijasi iš 77 be liekanos. Skaičius atskirkite kableliais. Po paskutinio skaičiaus kablelio neturi būti. Jeigu reikia, 
panaudokite css, kad visi rezultatai matytųsi ekrane. -->
    <div>
        <?php
        $lastNumber = rand(3000,4000);
        $numbers = [];
        for ($i=1; $i < $lastNumber; $i++) { 
            if ($i % 77 == 0) {
                $numbers[] = $i;
            }
        }
        echo implode(",&#x200b;", $numbers);
        ?>
    </div>
    <br>
<!-- Nupieškite kvadratą iš “*”, kurio kraštines sudaro 100 “*”. Panaudokite css stilių, kad kvadratas ekrane atrodytų kvadratinis. -->
    <div>
        <?php
        for ($i=0; $i < 50; $i++) { 
            for ($a=0; $a < 50; $a++) { 
                echo '<span>   *</span>';
            }
            echo '<br>';
        }
        ?>
    </div>
    <br>
<!-- Prieš tai nupieštam kvadratui nupieškite raudonas istrižaines. -->
    <div>
        <?php
        $side = 50;
        for ($i=0; $i < $side; $i++) { 
            for ($a=0; $a < $side; $a++) { 
                if ($i == $a || $i == ($side - 1 - $a)) {
                    echo '<span style="color:red">   *</span>';
                } else {
                    echo '<span>   *</span>';
                }
            }
            echo '<br>';
        }
        ?>
    </div>
    <br>
<!-- Metam monetą. Monetos kritimo rezultatą imituojam rand() funkcija, kur 0 yra herbas, o 1 - skaičius. Monetos metimo rezultatus 
išvedame į ekraną atskiroje eilutėje: “S” jeigu iškrito skaičius ir “H” jeigu herbas. Suprogramuokite keturis skirtingus scenarijus 
kai monetos metimą stabdome:
        -Iškritus herbui;
        -Tris kartus iškritus herbui;
        -Tris kartus iš eilės iškritus herbui; -->
    <div>
        <?php
        do {
            $coin = rand(0,1);
            if ($coin == 1) {
                echo "S ";
            } else {
                echo "H";
            }
        } while ($coin == 1);
        echo '<br>';
        // ------------------------------------
        $count = 0;
        do {
            $coin = rand(0,1);
            if ($coin == 1) {
                echo "S ";
            } else {
                echo "H ";
                $count++;
            }
        } while ($count < 3);
        echo '<br>';
        // ------------------------------------
        $i = -1;
        $count = 0;
        do {
            $sequence[] = rand(0,1);
            $i++;
            if ($i > 0) {
                if ($sequence[$i] == 0 && $sequence[$i] == $sequence[($i-1)]) {
                    $count++;
                } else {
                    $count = 0;
                }
            }
        } while ($count < 2 );
        $sequence = str_replace(0, "H", $sequence);
        $sequence = str_replace(1, "S", $sequence);
        echo implode(" ", $sequence);
        ?>
    </div>
    <br>
<!-- Kazys ir Petras žaidžiai Bingo. Petras surenka taškų kiekį nuo 10 iki 20, Kazys surenka taškų kiekį nuo 5 iki 25. 
Vienoje eilutėje išvesti žaidėjų vardus su taškų kiekiu ir “Partiją laimėjo: ​laimėtojo vardas​”. Taškų kiekį generuokite 
funkcija ​rand()​. Žaidimą laimi tas, kas greičiau surenka 222 taškus. Partijas kartoti tol, kol kažkuris žaidėjas pirmas 
surenka 222 arba daugiau taškų. Nenaudoti cikle break. -->
    <div>
        <?php
        $totalKazys = 0;
        $totalPetras = 0;
        $finished = false;
        while (! $finished) {
            $pointsKazys = rand(10,20);
            $totalKazys += $pointsKazys;
            $pointsPetras = rand(5,25);
            $totalPetras += $pointsPetras;
            echo "Kazys: ".$pointsKazys.", ";
            echo "Petras: ".$pointsPetras.", ";
            if ($pointsPetras == $pointsKazys) {
                echo "Lygiosios!!!";
            } elseif ($pointsPetras > $pointsKazys) {
                echo "Partiją laimėjo: ​Petras";
            } else {
                echo "Partiją laimėjo: Kazys";
            }
            echo "<br>";
            if ($totalKazys >= 222 || $totalPetras >= 222){
                $finished = true;
                if ($totalKazys == $totalPetras) {
                    echo "Žaidimas baigėsi lygiosiomis!!!";
                } elseif ($totalKazys > $totalPetras) {
                    echo "Žaidimą laimėjo Kazys rezultatu {$totalKazys}:{$totalPetras}.";
                } else {
                    echo "Žaidimą laimėjo Petras rezultatu {$totalPetras}:{$totalKazys}.";
                }
            }
        }
        ?>
    </div>
    <br>
<!-- Reikia nupaišyti pilnavidurį rombą, taip pat, kaip ir pilnavidurį kvadratą (https://lt.wikipedia.org/wiki/Rombas), kurio 
aukštis 21 eilutė. Reikia padaryti, kad kiekviena rombo žvaigždutė būtų atsitiktinės RGB spalvos (perkrovus puslapį spalvos turi keistis). -->
    <div>
        <?php
        $space = "  ";
        $stars = 1;
        $rows = 21;
        for ($i=0; $i < $rows; $i++) {
            if (($i + 1) <= (intval($rows / 2))) {
                echo str_repeat("<span>{$space}</span>", (($rows / 2) - ($stars / 2)));
                for ($a=1; $a <= $stars; $a++) {
                    $color = implode(",", array(rand(0,255), rand(0,255), rand(0,255))); 
                    echo "<span style=\"color:rgb({$color}\">*</span>";
                }
                echo "<br>";
                $stars += 2;
            } else {
                echo str_repeat("<span>{$space}</span>", (($rows / 2) - ($stars / 2)));
                for ($a=1; $a <= $stars; $a++) {
                    $color = implode(",", array(rand(0,255), rand(0,255), rand(0,255))); 
                    echo "<span style=\"color:rgb({$color}\">*</span>";
                }
                echo "<br>";
                $stars -= 2;
            }
        }
// ---------------------------------------------
        for ($i=0; $i < $rows; $i++) { 
            for ($a=0; $a < $rows; $a++) { 
                $color = implode(",", array(rand(0,255), rand(0,255), rand(0,255)));
                echo "<span style=\"color:rgb({$color}\">   *</span>";
            }
            echo '<br>';
        }
        ?>
    </div>
    <br>
<!-- Sumodeliuokite vinies kalimą. Įkalimo gylį sumodeliuokite pasinaudodami rand() funkcija. Vinies ilgis 8.5cm (pilnai sulenda į lentą).
        -“Įkalkite” 5 vinis mažais smūgiais. Vienas smūgis vinį įkala 5-20 mm. Suskaičiuokite kiek reikia smūgių.
        -“Įkalkite” 5 vinis dideliais smūgiais. Vienas smūgis vinį įkala 20-30 mm, bet yra 50% tikimybė (pasinaudokite rand() funkcija 
        tikimybei sumodeliuoti), kad smūgis nepataikys į vinį. Suskaičiuokite kiek reikia smūgių. -->
    <div>
        <?php
        $count = 0;
        for ($i=0; $i < 5; $i++) { 
            for ($a=0; $a < 850; $a+=rand(5,25)) {
                $count++;
            }
        }
        echo "Smūgių skaičius: ".$count."<br>";
        // --------------------------------------------
        $count = 0;
        for ($i=0; $i < 5; $i++) { 
            for ($a=0; $a < 850; $a+=$do) {
                $posibilitie = rand(0,1);
                if ($posibilitie == 1) {
                    $do = rand(20,30);
                    $count++;
                } else {
                    $do = 0;
                }
                // echo $a." ".$do." ".$posibilitie." ".$count."<br>"; //-- Patikrinimas
            }
        }
        echo "Smūgių skaičius: ".$count;
        ?>
    </div>
    <br>
<!-- Sugeneruokite stringą, kurį sudarytų 50 atsitiktinių skaičių nuo 1 iki 200, atskirtų tarpais. Skaičiai turi būti unikalūs (t.y. nesikartoti). 
Sugeneruokite antrą stringą, pasinaudodami pirmu, palikdami jame tik pirminius skaičius (t.y tokius, kurie dalinasi be liekanos tik iš 1 ir patys savęs). 
Skaičius stringe sudėliokite didėjimo tvarka, nuo mažiausio iki didžiausio. -->
    <div>
        <?php
        $numbers = [];
        $newNumbers = [];
        while (count($numbers) < 50) { 
            $number = rand(1,200);
            $count = 0;
            if (count($numbers) == 0) {
                $numbers[] = $number;
            }
            for ($i=0; $i < count($numbers); $i++) { 
                if ($number == $numbers[$i]){
                    $count++;
                }
            }
            if ($count == 0) {
                $numbers[] = $number;
            }
        }
        echo "Seka: ".implode(" ", $numbers)."<br>";
        for ($i=0; $i < count($numbers); $i++) {
            $count = 0;
            if ($numbers[$i] > 1) {
                for ($a=1; $a <= $numbers[$i]; $a++) { 
                    if (($numbers[$i] % $a) == 0) {
                        $count++;
                    }
                }
                if ($count < 3) {
                    $newNumbers[] = $numbers[$i];
                }
            }
        }
        sort($newNumbers);
        echo "Pirminių seka: ".implode(" ", $newNumbers);
        ?>
    </div>
</body>

</html>