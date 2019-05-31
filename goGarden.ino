  // Incluindo as bibliotecas

  #include <DHT.h> // Temperatura e Umidade do ar ambiente
  #include <Adafruit_Sensor.h> // Temperatura e Umidade do ar ambiente
  #include <BH1750.h> // Intensidade da Luz ambiente

  #include <SPI.h>
//#include <String.h>
  #include <Ethernet.h>

  // Definindo variáveis globais
  #define DHTPIN A8 //Pino que estamos conectado
  #define DHTTYPE DHT11 //DHT 11
  
  // Firmware para Controle de Cores do LED RGB
  #define RED 8 //Define o pino 8 com PWM como RED
  //#define GREEN 10 //Define o pino 10 com PWM como RED
  #define BLUE 12 //Define o pino 12 com PWM como GREEN

  // Porta de Acesso (80 = padrão)
  int long acessPort = 80;

  byte mac[] = { 0xAB, 0xCD, 0x12, 0x34, 0xFF, 0xCA };
  byte ip[] = { 10, 3, 77, 110 }; // IP do Arduino
  byte servidor[] = { 10, 3, 79, 167 }; // IP do Computador

//IPAddress subnet(255, 255, 252, 0); //Define a máscara de rede
  
  EthernetServer server(acessPort);
  EthernetClient client;

  // Usar a variável abaixo se for utilizar o servidor do Arduino
//String readString = String(30);

  // Mostrando a cada 6 horas = delay(21600000);
  unsigned long previousMillis = 0;
  const long interval = 15000; // 15 Segundos Intervalo para os dados serem enviados ao Banco de Dados 15000

  // Identificação de variáveis
  DHT dht(DHTPIN, DHTTYPE);
  BH1750 lightMeter;
  int soilDamp;
  int red = 255; // valores de 0 a 255
//int green = 255; // valores de 0 a 255
  int blue = 255; // valores de 0 a 255

void setup() {

  // Open serial communications and wait for port to open:
  Serial.begin(9600); // Iniciando o serial
  Ethernet.begin(mac, ip);

  // Iniciando os sensores
  dht.begin();
  lightMeter.begin();

  pinMode(RED, OUTPUT); //Pino 8 declarado como saída
//pinMode(GREEN, OUTPUT); //Pino 10 declarado como saída
  pinMode(BLUE, OUTPUT); //Pino 12 declarado como saída

}

void loop() {

  // Declarando as variáveis

  float airDamp = dht.readHumidity();
  float temperature = dht.readTemperature();
  
  uint16_t brightness = lightMeter.readLightLevel();
  
  soilDamp = analogRead(A0);
  soilDamp = map(soilDamp, 0, 1023, 100, 0);

  // Verifica se os sensores estão respondendo
  if (isnan(airDamp) || isnan(temperature) || isnan(brightness) || isnan(soilDamp)) {
    Serial.println("Falha ao ler os dados dos sensores!");
      delay(500);
  }
  //Se nao ouver erro...
  else {

    //analogWrite(GREEN, green); //Envia o sinal de "verde" para o terminal de cor verde do LED
        
      EthernetClient client = server.available();
  
      unsigned long currentMillis = millis();

      if (currentMillis - previousMillis >= interval) {
      
      previousMillis = currentMillis;
  
        // Make a HTTP request
        if (client.connect(servidor, acessPort)) {
          
        Serial.println("Arduino Conectado na Internet");
        Serial.println(" ");

        // Banco de Dados do projeto final
        // Arquivo de Inclusao de Dados do PHP
        client.print("GET /goGarden/insArduinoData.php?"); // redirecionamento para incluir a captura ao php

    /*
        // Arquivo de Inclusao de Dados do PHP - Banco de Dados provisório
        client.print("GET /Exemplo_Ethernet/php/inclusaoSensor.php?");
        */

        // Enviando os dados para o Banco de Dados
        client.print("airDamp="); // AirDamp
        client.print(airDamp);
        client.print("&temperature="); // Temperature
        client.print(temperature);
        client.print("&brightness="); // Brightness
        client.print(brightness);
        client.print("&SoilDamp="); // SoilDamp
        client.println(soilDamp);

        // Visualizando o resultado na IDE do Arduino
        Serial.println("--------------");
        Serial.print("Umidade do Ar: ");
        Serial.print(airDamp);
        Serial.println("% UR");
        Serial.println("--------------");
      
        Serial.print("Temperatura: ");
        Serial.print(temperature);
        Serial.println("ºC");
        Serial.println("--------------");
        
        Serial.print("Luminosidade: ");
        Serial.print(brightness);
        Serial.println(" lux");
        Serial.println("--------------");
        
        Serial.print("Umidade do Solo: ");
        Serial.print(soilDamp);
        Serial.println("%");
        Serial.println("--------------");
        
        Serial.println(" ");
        Serial.println(" ");

        // Valores capturados pelos sensores NÃO estão de acordo com as condições mínimas de plantio
        // Condição abaixo em COMENTÁRIO é referente ao projeto final
      //if (airDamp<60 || airDamp>70 || temperature<12 || temperature>22 || brightness<16443 || brightness>39363 || soilDamp<65 || soilDamp>70) {
        
        if ( (airDamp < 40) || (airDamp > 60) || (temperature < 12) || (temperature > 22) || (brightness < 100) || (brightness > 150) || (soilDamp < 5) || (soilDamp > 15) ) {
          // Acende o LED Vermelho
          analogWrite(RED, red); //Envia o sinal de "red" para o terminal de cor vermelha do LED
          delay(5000);
        }
        
        // Valores capturados pelos sensores estão de acordo com as condições mínimas de plantio
        else {
          // Acende o LED Azul
          analogWrite(BLUE, blue); //Envia o sinal de "blue" para o terminal de cor azul do LED
          delay(5000);
        }
    
        client.stop();
        
        }
        else {
        // if you didn't get a connection to the server:
        Serial.println("Falha na Conexão do Arduino com a Internet");
    
        client.stop();
        
        }
      }
  }

  /*
  if(client) 
  {
    while(client.connected())
    {
      if(client.available()) 
      {
        char c = client.read();
        
        if(readString.length() < 30) {
          readString += (c);
        }
        
        if(c == '\n')
        {          
          // Cabeçalho HTTP padrão
          client.println("HTTP/1.1");
          client.println("Content-Type: text/html");
          client.println();
         
          client.println("<!doctype html>");
          client.println("<html>");
          client.println("<head>");
          client.println("<title>Tutorial</title>");
          client.println("<meta name=\"viewport\" content=\"width=320\">");
          client.println("<meta name=\"viewport\" content=\"width=device-width\">");
          client.println("<meta charset=\"utf-8\">");
          client.println("<meta name=\"viewport\" content=\"initial-scale=1.0, user-scalable=no\">");
          
          // IP do Arduino
          client.println("<meta http-equiv=\"refresh\" content=\"3, URL=http://10.3.79.52:acessPort\">");
          client.println("</head>");
          client.println("<body>");
          client.println("<center>");
          
          client.println("<font size=\"5\" face=\"verdana\" color=\"green\">Arduino</font>");
          client.println("<font size=\"3\" face=\"verdana\" color=\"red\"> & </font>");
          client.println("<font size=\"5\" face=\"verdana\" color=\"blue\">Banco de Dados</font><br />");

          client.println("<font size=\"5\" face=\"verdana\" color=\"red\">Umidade do Ar: </font>");
          client.println("<font size=\"5\" face=\"verdana\" color=\"blue\">");
          client.println(airDamp);
          client.println("</font><br>");
          
          client.println("<font size=\"5\" face=\"verdana\" color=\"red\">Temperatura: </font>");
          client.println("<font size=\"5\" face=\"verdana\" color=\"blue\">");
          client.println(temperature);
          client.println("</font><br>");
          
          client.println("<font size=\"5\" face=\"verdana\" color=\"red\">Luminosidade: </font>");
          client.println("<font size=\"5\" face=\"verdana\" color=\"blue\">");
          client.println(brightness);
          client.println("</font><br>");

          client.println("<font size=\"5\" face=\"verdana\" color=\"red\">Umidade do Solo: </font>");
          client.println("<font size=\"5\" face=\"verdana\" color=\"blue\">");
          client.println(soilDamp);
          client.println("</font><br>");

          // Página de Consulta
          // Código abaio é para o projeto final
        //client.println("<p><a href=\"http://localhost/gogarden/vegetableCont.php/\" target=\"_blank\">Verificar Histórico</a></p>");
          
          // Código abaixo é para o ambiente de teste
          client.println("<p><a href=\"http://localhost/Exemplo_Ethernet/php/consultaSensor.php/\" target=\"_blank\">Verificar Histórico</a></p>");
          
          client.println("</center>");
          client.println("</body>");
          client.println("</html>");
        
          readString = "";
          
          client.stop();
        }
      }
      
    }
  }
  */
  
//analogWrite(GREEN, green); //Envia o sinal de "verde" para o terminal de cor verde do LED
  
}
