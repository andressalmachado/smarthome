int LED = 10;
int LED2 = 9;

boolean ledStatus = false;
char leituraSerial;

void setup() {
  Serial.begin(9600); //Inicia serial 
  pinMode(LED, OUTPUT); //led como saida
  pinMode(LED2, OUTPUT); //led como saida
}

void loop() {
  //Se chegar dado da serial, avaliamos e comandamos.
  if(Serial.available() > 0){
    leituraSerial = (char) Serial.read();

    switch(leituraSerial){
      case 'a':
      digitalWrite(LED,HIGH);
      ledStatus = true;
      break;

      case 'b':
      digitalWrite(LED,LOW);
      ledStatus = false;
      break;

      case 'c':
      digitalWrite(LED2,HIGH);
      ledStatus = true;
      break;

      case 'd':
      digitalWrite(LED2,LOW);
      ledStatus = false;
      break;
      
    }
  }
 }
