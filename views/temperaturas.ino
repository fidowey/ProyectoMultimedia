#include <SPI.h>
#include <Ethernet.h>
EthernetServer servidor(80); // puerto de conexión
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED }; //mac address
byte ip[] = { 192, 168, 1, 205 }; // ip de tu Arduino en la red
byte gateway[] = { 192, 168, 1, 1 }; // ip de tu router
byte subnet[] = { 255, 255, 255, 0 }; // subnet
String json,solicitud;
float temperatura;
int tempPin = 0;
void setup() {
Ethernet.begin(mac, ip, gateway, subnet); 
servidor.begin();
}
void loop() { 
temperatura = analogRead(tempPin);
temperatura = (5.0 * temperatura * 100 ) / 1024;
Serial.print(tempC);
Serial.print(" grados Celsius\n");
EthernetClient cliente = servidor.available();
if (cliente.available()) {
char c = cliente.read();
if ( solicitud.length() < 100 ) { solicitud += c; }
if ( c == '\n' ) {
json = "{\"";
json += "temperatura\": \"" + (String)temperatura + "\", ";
json += "uptime\": \"" + (String)millis() + "\" ";
json += "}\n";
cliente.println("HTTP/1.1 200 OK"); // enviamos cabeceras
cliente.println("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
cliente.println("Content-Type: text/javascript");
cliente.println("Access-Control-Allow-Origin: *");
cliente.println();
cliente.println(json); //imprimimos datos
delay(100); // esperamos un poco
cliente.stop(); //cerramos la conexión
}
}
if ( !cliente.connected() ) { cliente.stop(); }
}
