<pre>
<?php
// mostrar erros 
    //error_reporting(E_ALL);
    //ini_set('display_errors', '1');
// armazena os dados enviados em $_POST na variavel $lista
    // var_dump($_POST);
    $lista = $_POST;
    // var_dump($lista) ;
    $bomba = $lista["q5"];
    unset($lista["q5"]);
    // $lista = (explode("," , $lista["q4"], 5)) + ($lista);
    // var_dump($lista) ;
    $mostrar_resultado = true;
    if(empty($lista)){
        $resp_fin = 1;
        mostrar_false();
    }
    function mostrar_false(){
        $mostrar_resultado = false;
        return $mostrar_resultado;
    }
?>
</pre>



<?php
if($mostrar_resultado == true){
// cria uma varievel responsavel para cada possibilidade recomendavel
// var1
    $massa = 0;
// var2
    $performance = 0;
// var3
    $secar = 0;
// var4
    $forca = 0;
// var5
    $preguica = 0;

// verificação 
// loop que adiciona um 1 a cada vez que um numero bater com a sua respectiva variavel 
    foreach($lista as $item){
        // echo "$item <br>";
        // echo "$item <br>";
        if($item == 1 || $item == 12 || $item == 14 || $item == 123 || $item == 124 || $item == 1234){
            $massa++;
        }        
        if($item == 2 || $item == 12 || $item == 23 || $item == 24 || $item == 123  || $item == 124 || $item == 1234){
            $performance++;
        }        
        if($item == 3 || $item == 23 || $item == 34 || $item == 123 || $item == 1234){
            $secar++;
        }        
        if($item == 4 || $item == 14 || $item == 24 || $item == 34 || $item == 124 || $item == 1234){
            $forca++;
        }        
        if($item == 5){
            $preguica++;
        }
    }
// transformação percentual
// divide o numero de possiveis totais marcações pela marcações realizadas
    $massa = $massa/8;
    // echo $massa;
    $performance = $performance/8;
    $secar = $secar/5;
    $forca = $forca/5;
    $preguica = $preguica/4;
    // echo "$massa<br>$performance<br>$secar<br>$forca<br>$preguica<br>" ;
    $tipos = [$massa, $performance, $secar, $forca, $preguica];
    // var_dump($tipos);
// seleciona o menor resultado
    $maior_valor = max($tipos);
    // echo "<br> $maior_valor <br>";

// verificação de qual foi o mais votado(mais perto de 1)
// verifica em qual variavel está o menor resultado
    $numero_verificacao = 0;
    foreach($tipos as $tipo){
        // echo "$tipo<br>";
        if($tipo != $maior_valor){
            $numero_verificacao++;
        }
        else{
            break;
            // echo "$numero_verificacao<br>";
        }
    }
    // echo "$numero_verificacao";
// imprime qual a recomendação para o usuário
    switch($numero_verificacao){
        case 0:
            // echo "massa";
            $indicacao = "WHEY PROTEIN";
            $indicacao2 = "HEMOGENIN";
            break;        
        case 1:
            // echo "performance";
            $indicacao = "PRÉ-TREINO";
            $indicacao2 = "ESTANOZOLOL";
            break;        
        case 2:
            // echo "secar";
            $indicacao = "SHAKE";
            $indicacao2 = "TREMBOLONA";
            break;        
        case 3:
            // echo "forca";
            $indicacao = "CREATINA";
            $indicacao2 = "OXANDROLONA";
            break;        
        case 4:
            // echo "preguiça";
            $indicacao = "VERGONHA NA CARA";
            $indicacao2 = "CHIFRE";
            break;
    }
    $veneno = "";
    // echo $bomba;
    function aleatoriedade(){
        $aleatoriedade = rand(0,9);
        // echo $aleatoriedade;
        return $aleatoriedade;
    }
    if($bomba == "true"){
        $veneno = "<h2>JUNTO COM</h2><h1>$indicacao2</h1> ";
    }
    elseif($bomba == "random"){
        aleatoriedade();
        // echo aleatoriedade();
        $fator_aleatorio = aleatoriedade();
        // echo "$fator_aleatorio";
        if($fator_aleatorio <= 4){
            $veneno = "<h2>JUNTO COM</h2><h1>$indicacao2</h1> ";
        }
    }
}
    function resposta_final($resp_fin, $indicacao, $veneno){
        if($resp_fin == 1){
            $respostafinal = "<p>POR FAVOR, INSIRA AO MENOS UM DADO!</p>";
        }
        else{
            $respostafinal = "<h2>O SUPLEMENTO MAIS INDICADO PARA VOCÊ É O(A):</h2>
            <h1>$indicacao</h1>
            $veneno";
        }
        return $respostafinal;
    }
    echo resposta_final($resp_fin, $indicacao, $veneno);
?>
<button onclick="window.location.href = 'index.html'">REFAZER</button>