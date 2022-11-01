#include <Arduino.h>
#include "lib.h"
#include "parsingWaktu.h"
#include "saveData.h"
#define RXD1 32  
#define TXD1 33 
String ACCESSKEY = "ecfe802f4d7e8885:01ffe2986b9d9565";
char* projectName ="smartpjuv1";
char* deviceName ="smartpju002";
int hour;
int minute;
int startHour;
int endHour;
int startMinute; 
int endMinute;

float kwh;
float tegangan; 
float daya; 
float arus;

float temp;
float humi;
bool manual = false;
bool Auto = false;
char msg[300];
int mode_kontrol = 1;
DHT dht(DHTPIN,DHTTYPE);
lib mylib(ACCESSKEY);
RTC_DS3231 rtc;
PZEM004Tv30 pzemr(&Serial1,RXD1,TXD1);

void getPZEMR();
void getPZEMS();
void getPZEMT();
void temphumi();
void callback(char topic[], byte payload[], unsigned int length);
void do_actions(const char* message);
void setup() {
  Serial.begin(115200);
  Serial1.begin(9600);
  mylib.connectAPN();
  mylib.startMQTTConnection();
  mylib.setCallback(callback);
  EEPROM.begin(EEPROMSIZE);

}

void loop() {
int kwh = random(25,30);
  int daya = random(25,30);
  int arus = random(25,30);
  int tegangan = random(25,30); 
  //   int temp = random(25,30) ;
  // int humi = random(75,90);
  // temphumi();
  // DateTime now = rtc.now();
  // hour = now.hour();
  // minute = now.minute();

  int temp = random(25,40) ;
  int hum = random(90,95);
  // float windsp = 2.0;
  // float rainlv = 2.0;
  String lat = "-6.8718189";
  String lon = "107.5872477";

  // Add variable to data storage buffer
  mylib.checkMqttConnection();
  mylib.add("temperature", temp);
  mylib.add("humidity", hum);
  mylib.add("kwh_r", kwh);
  mylib.add("daya_r", daya);
  mylib.add("volt_r", tegangan);
  mylib.add("current_r", arus);
  mylib.add("kwh_s", kwh);
  mylib.add("daya_s", daya);
  mylib.add("volt_s", tegangan);
  mylib.add("current_s", arus);
  mylib.add("kwh_t", kwh);
  mylib.add("daya_t", daya);
  mylib.add("volt_t", tegangan);
  mylib.add("current_t", arus);
 
  // mylib.add("kwh_s", rainlv);


  mylib.add("latitude", lat);
  mylib.add("longitude", lon);
  // Serial.println("Terkirim !");
  mylib.publish(projectName, deviceName);
  Serial.println("Terkirim !");
  delay(500);
  }
void getPZEMR(){
  
  // kwh = pzemr.energy();
  // daya = pzemr.power();
  // arus = pzemr.current();
  // tegangan = pzemr.voltage(); 
  kwh = random(25,30);
  daya = random(25,30);
  arus = random(25,30);
  tegangan = random(25,30); 

}

void getPZEMS(){
  
  // kwh = pzemr.energy();
  // daya = pzemr.power();
  // arus = pzemr.current();
  // tegangan = pzemr.voltage(); 
  int kwh_s = random(25,30);
  int daya_s = random(25,30);
  int arus_s = random(25,30);
  int tegangan_s = random(25,30); 

}
void getPZEMT(){
  
  // kwh = pzemr.energy();
  // daya = pzemr.power();
  // arus = pzemr.current();
  // tegangan = pzemr.voltage(); 
  int kwh_t = random(25,30);
  int daya_t = random(25,30);
  int arus_t = random(25,30);
  int tegangan_t = random(25,30); 

}

void temphumi(){
  // temp = dht.readTemperature();
  // humi = dht.readHumidity();
   int temp = random(25,30) ;
  int humi = random(75,90);
 
}
void callback(char topic[], byte payload[], unsigned int length) {

  mylib.get(topic, payload, length);

  Serial.println("New Message!");

  Serial.println("Payload: " + mylib.getPayload());
  // Print individual data
  String mode = mylib.getString("mode");
  String state = mylib.getString("state");
  String port = mylib.getString("port");
  if(mode == "manual"){
    if(port == "PORT1"){
      if(state == "ON"){

      manual = true;
      Auto = false;
      int mode_kontrol = 0;
      writeMode(mode_kontrol);
      digitalWrite(25,HIGH); 
      }else{
        manual = true;
        Auto = false;
        int mode_kontrol = 0;
        writeMode(mode_kontrol);
        digitalWrite(25,LOW); 
      }

    }else if(port == "PORT2"){
      if(state == "ON"){

      manual = true;
      Auto = false;
      int mode_kontrol = 0;
      writeMode(mode_kontrol);
      digitalWrite(26,HIGH); 
      }else{
        manual = true;
        Auto = false;
        int mode_kontrol = 0;
        writeMode(mode_kontrol);
        digitalWrite(26,LOW); 
      }
     
    }else if(port == "PORT3"){
      if(state == "ON"){

      manual = true;
      Auto = false;
      int mode_kontrol = 0;
      writeMode(mode_kontrol);
      digitalWrite(27,HIGH); 
      }else{
        manual = true;
        Auto = false;
        int mode_kontrol = 0;
        writeMode(mode_kontrol);
        digitalWrite(27,LOW); 
      }
     
    }
  }else{

    String waktuMulai = String(mylib.getInt("started_at"));
    String waktuAkhir = String(mylib.getInt("ended_at"));
    int startHour = hourGet(waktuMulai);
    writeStartHour(startHour);
    int startMinute = minuteGet(waktuMulai);
    writeStartMinute(startMinute);
    int endHour = hourGet(waktuAkhir);
    writeEndHour(endHour);
    int endMinute = minuteGet(waktuAkhir);
    writeEndMinute(endMinute); 
    Auto = true;
    mode_kontrol=1;
    writeMode(mode_kontrol);
  }
  //   Serial.println("Temperature: " + String(mylib.getInt("temperature")));
  // Serial.println("Humidity: " + String(mylib.getInt("humidity")));
  // Serial.println("kwh_r: " + String(mylib.getFloat("kwh_r")));
  // Serial.println("daya_r: " + String(mylib.getFloat("daya_r")));
  // Serial.println("Latitude: " + mylib.getString("latitude"));
  // Serial.println("Longitude: " + mylib.getString("longitude"));
}