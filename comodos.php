<?php

include "PhpSerial.php"; //import da biblioteca de serial com php
$read = "";

$serial = new phpSerial(); //Cria um novo objeto para comunicacao serial
$serial->deviceSet("/dev/ttyACM0"); //associa esse objeto com a serial do Arduino
$serial->confBaudRate(9600); //configura baudrate em 9600
$serial->confParity("none"); //sem paridade
$serial->confCharacterLength(8); //8 bits de mensagem
$serial->confStopBits(1); //1 bit de parada
$serial->confFlowControl("none"); //sem controle de fluxo
$serial->deviceOpen(); //abre o dispositivo serial para comunicacao

//Se receber 'a' via GET na Pagina
if(isset($_GET['a'])){
	sleep(2);
	$serial->sendMessage("a"); //envia o caractere 'a' via Serial pro Arduino
	sleep(1); //delay para o Arduino enviar a resposta.
	$read = $serial->readPort(); //faz a leitura da resposta na variavel $read
	echo $read; //echo para mostrar a resposta recebida do Arduino
}

if(isset($_GET['b'])){
	sleep(2);
	$serial->sendMessage("b"); //envia o caractere 'b' via Serial pro Arduino
	sleep(1); //delay para o Arduino enviar a resposta
	$read = $serial->readPort(); //faz a leitura da resposta na variavel $read
	echo $read; //echo para mostrar a resposta recebida do Arduino
}

if(isset($_GET['c'])){
	sleep(2);
	$serial->sendMessage("c"); //envia o caractere 'c' via Serial pro Arduino
	sleep(1); //delay para o Arduino enviar a resposta
	$read = $serial->readPort(); //faz a leitura da resposta na variavel $read
	echo $read; //echo para mostrar a resposta recebida do Arduino
}

if(isset($_GET['d'])){
	sleep(2);
	$serial->sendMessage("d"); //envia o caractere 'd' via Serial pro Arduino
	sleep(1); //delay para o Arduino enviar a resposta
	$read = $serial->readPort(); //faz a leitura da resposta na variavel $read
	echo $read; //echo para mostrar a resposta recebida do Arduino
}
echo $read;
$serial->deviceClose(); //encerra a conexao serial

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>SmartHome</title>
</head>

<body>
    <header>
        <div class="dropdown">
            <nav>
                <div class="logo">
                    <a href="#">SmartHome</a>
                </div>
                <ul>
                    <li>
                        <a href="#">Ambiente</a>
                    </li>

                    </li>
                    <li><a href="#">Conta</a></li>

                </ul>
            </nav>
        </div>
    </header>
    <br><br><br><br><br>
    <div class="status">
        <?php echo "Data: " . date('d/m/Y') . "<br>" ?>
        <?php echo "Hora: " . date('H:m') . "<br>" ?>
        <!-- <h3>Temperatura:</h3> -->
    </div>
    <hr>
    <div class="comodos">
        <div class="comodo-1">
            <h3>Quarto</h3>
            <div class="display">
                <br><br>
                <input type="button" class="botoes" onclick="location.href='/comodos.php?a=1'" value="Acender">
                <input type="button" class="botoes" onclick="location.href='/comodos.php?b=1'" value="Apagar">
            </div>
        </div>
        <div class="comodo-2">
            <h3>Sala</h3>
            <div class="display">
                <br><br>
                <input type="button" class="botoes" onclick="location.href='/comodos.php?c=1'" value="Acender">
                <input type="button" class="botoes" onclick="location.href='/comodos.php?d=1'" value="Apagar">
            </div>
        </div>

        <div class="comodo-3">
            <h3>Adicionar Ambiente</h3>
        </div>

    </div>

    <footer>
        <div>
            Todos os direitos reservados Smarthome - 2021 | Desenvolvido por Andressa
        </div>
    </footer>
</body>

</html>
