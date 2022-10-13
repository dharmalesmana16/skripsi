// #ifndef NUANSA_H
// #define NUANSA_H
#include <Arduino.h>
#include <Ethernet.h>
// #include <EthernetClient.h>
#include <DHT.h>
#include <PZEM004Tv30.h>
#include <SPI.h>
#include <Wire.h>
#include <RTClib.h>
// #include <Arduino_JSON.h>
#include <EEPROM.h>
#include <PubSubClient.h>
#include <ArduinoJson.h>
// #include "config.h"
// IPAddress eth_ip(192,168,1,155);
// IPAddress eth_gw(192,168,1,1);
// IPAddress eth_dns(192,168,1,1);
// IPAddress eth_mask(255,255,255,0);
byte eth_mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
byte eth_ip[] = { 192,168,1,15 };
byte eth_gw[] = {192,168,1,1};
byte eth_mask[] = {255,255,255,0};
byte eth_dns[] ={192,168,1,1};
EthernetClient net;
PubSubClient client(net);
class nuansa {
	public: 
                
		nuansa(String accessKey);
//    bool wifiConnection(String SSID, String wifiPassword);
                bool setIndic(bool trueFalse);
                void printDebug(String text);
                // String ipToString(IPAddress ip);
                /* Overloaded functions: Add data to temporary storage */
                void add(String key, int value);
                void add(String key, float value);
                void add(String key, double value);
                void add(String key, String value);
                /* Overloaded functions end */
                void printData();
                void publish(String projectName, String deviceName);
                /* Get subscription callback data*/
                int getInt(String key);
                float getFloat(String key);
                double getDouble(String key);
                String getString(String key);
                /* Get data end */

                String getTopic();
                String getPayload();

                void setMqttServer();
                void checkMqttConnection();
                void setCallback(std::function<void(char*, uint8_t*, unsigned int)> callbackFunc);
                String get(char* topic, byte* payload, unsigned int length);
                void setSubscriptionTopic();
                bool dhcp;
//		 nuansa(int wizresetpin);
		void startEthConnection(bool dhcp);
		void reconnect();
//		void sendMsg(String appName,String deviceName);
//		void setCallback(std::function<void(char*, uint8_t*, unsigned int)> callbackFunc);
		void ethReset();
//		int resetwizpin;
		bool rdy;
	// 	String _access;
		// String access;
	private:
        const char* _mqttServer = "mqtt.antares.id";
	    const int _mqttPort = 1883;
	    const int _secureMqttPort = 8883;
	    bool _debug = true;
//	    char* _wifiSSID;
//	    char* _wifiPass;
	    String _accessKey;
	    String _jsonDataString = "{}";
	    String _jsonSubDataString;
	    String _subscriptionTopic;
	    String _receivedTopic;
};
// #include "nuansa.h"
// #include "config.h"
// #include <Ethernet.h>
//nuansa::nuansa(int wizresetpin) {
//    resetwizpin = wizresetpin;
//}

bool rdy = false;
nuansa::nuansa(String accessKey) {
    _accessKey = accessKey;
}
int nuansa::getInt(String key) {
    DynamicJsonBuffer jsonBuffer;
    JsonObject& object = jsonBuffer.parseObject(_jsonSubDataString);
    return object[key];
}

float nuansa::getFloat(String key) {
    DynamicJsonBuffer jsonBuffer;
    JsonObject& object = jsonBuffer.parseObject(_jsonSubDataString);
    return object[key];
}

double nuansa::getDouble(String key) {
    DynamicJsonBuffer jsonBuffer;
    JsonObject& object = jsonBuffer.parseObject(_jsonSubDataString);
    return object[key];
}

String nuansa::getString(String key) {
    DynamicJsonBuffer jsonBuffer;
    JsonObject& object = jsonBuffer.parseObject(_jsonSubDataString);
    return object[key];
}
void nuansa::setCallback(std::function<void(char*, uint8_t*, unsigned int)> callbackFunc) {
    client.setCallback(callbackFunc);
}
void nuansa::publish(String projectName, String deviceName) {
    String topic = "/oneM2M/req/" + _accessKey + "/antares-cse/json";
    String finalData;

    if(Ethernet.linkStatus() == LinkON) {
        DynamicJsonBuffer jsonBuffer;
        JsonObject& object = jsonBuffer.parseObject(_jsonDataString);
        Serial.print("[ANTARES] Publish Topic: ");Serial.println(topic);
        printDebug("[ANTARES] PUBLISH DATA:\n\n");
        object.prettyPrintTo(Serial);
        Serial.println("\n");
    }

    _jsonDataString.replace("\"", "\\\"");


    finalData += "{";
    finalData += "\"m2m:rqp\": {";
    finalData += "\"fr\": \"" + _accessKey +"\",";
    finalData += "\"to\": \"/antares-cse/antares-id/" + projectName + "/" + deviceName + "\",";
    finalData += "\"op\": 1,";
    finalData += "\"rqi\": 123456,";
    finalData += "\"pc\": {";
    finalData += "\"m2m:cin\": {";
    finalData += "\"cnf\": \"message\",";
    finalData += "\"con\": \""+ _jsonDataString + "\"";
    finalData += "}";
    finalData += "},";
    finalData += "\"ty\": 4";
    finalData += "}";
    finalData += "}";

    // DynamicJsonBuffer jsonBuffer;
    // JsonObject& object = jsonBuffer.parseObject(finalData);
    // object.prettyPrintTo(Serial);

    char finalDataChar[finalData.length() + 1];
    char topicChar[topic.length() + 1];

    finalData.toCharArray(finalDataChar, finalData.length() + 1);
    topic.toCharArray(topicChar, topic.length() + 1);

    _jsonDataString = "{}";

    client.publish(topicChar, finalDataChar);
}

void nuansa::checkMqttConnection() {
    _subscriptionTopic = "/oneM2M/resp/antares-cse/" + _accessKey + "/json";

    if(!client.connected()) {
        while(!client.connected()) {
            printDebug("[ANTARES] Attempting MQTT connection...\n");

            String clientId = _accessKey;

            char clientIdChar[clientId.length() + 1];
            clientId.toCharArray(clientIdChar, clientId.length() + 1);

            if(client.connect(clientIdChar)) {
                printDebug("[ANTARES] Connected! Client ID:");
                printDebug(clientIdChar);
                printDebug("\n");
                char subscriptionTopicChar[_subscriptionTopic.length() + 1];
                _subscriptionTopic.toCharArray(subscriptionTopicChar, _subscriptionTopic.length() + 1);

                Serial.println();
                Serial.print("[ANTARES] Subscribe Topic: ");
                Serial.println(subscriptionTopicChar);

                client.publish(subscriptionTopicChar, "connect!");
                client.subscribe(subscriptionTopicChar);
            }
            else {
                printDebug("[ANTARES] Failed, rc=" + String(client.state()) + ", Will try again in 5 secs.\n");
                delay(5000);
            }
        }
    }
    client.loop();
}

void nuansa::printDebug(String text) {

        Serial.print(text);
    
}
void nuansa::setMqttServer() {
   
    // else {
        printDebug("[ANTARES] Setting MQTT server \"" + String(_mqttServer) + "\" on port " + String(_mqttPort) + "\n");
        client.setServer(_mqttServer, _mqttPort);
    

}

void nuansa::add(String key, int value) {
    DynamicJsonBuffer jsonBuffer;
    JsonObject& object = jsonBuffer.parseObject(_jsonDataString);
    object[key] = value;
    String newInsert;
    object.printTo(newInsert);
    _jsonDataString = newInsert;
}

void nuansa::add(String key, float value) {
    DynamicJsonBuffer jsonBuffer;
    JsonObject& object = jsonBuffer.parseObject(_jsonDataString);
    object[key] = value;
    String newInsert;
    object.printTo(newInsert);
    _jsonDataString = newInsert;
}

void nuansa::add(String key, double value) {
    DynamicJsonBuffer jsonBuffer;
    JsonObject& object = jsonBuffer.parseObject(_jsonDataString);
    object[key] = value;
    String newInsert;
    object.printTo(newInsert);
    _jsonDataString = newInsert;
}

void nuansa::add(String key, String value) {
    DynamicJsonBuffer jsonBuffer;
    JsonObject& object = jsonBuffer.parseObject(_jsonDataString);
    object[key] = value;
    String newInsert;
    object.printTo(newInsert);
    _jsonDataString = newInsert;
}

void nuansa::printData() {
    printDebug("[ANTARES] " + _jsonDataString + "\n");
}

void nuansa::ethReset(){
	pinMode(15,OUTPUT);
	Serial.println("Reset Ethernet Connection !");
	digitalWrite(15,HIGH);
	delay(200);
	digitalWrite(15,LOW);
	delay(200);
	digitalWrite(15,HIGH);
	delay(200);
	Serial.println("Done Resetting");

}
void nuansa::startEthConnection(bool dhcp){
	delay(3000);
	Ethernet.init(5); // 5 for esp32 10 for Arduino CS PIN
  
	ethReset();

	if(dhcp == true){
		Serial.println("Initialize Ethernet with DHCP Method.");
		Ethernet.begin(eth_mac);
		Serial.print("Connected !, IP Add :");
		Serial.println(Ethernet.localIP());
		Serial.print("Gateway : ");
		Serial.println(Ethernet.gatewayIP());
        }else{

    
	Serial.println("Connecting  ");
	
	Ethernet.begin(eth_mac,eth_ip,eth_dns,eth_gw,eth_mask);
	while(Ethernet.linkStatus() == LinkOFF){
		Serial.print(".");
		delay(1000);
		// rdy = false;
		if(Ethernet.linkStatus() == LinkON){
			// rdy = true

			break;
		}
	}
    // if(Ethernet.localIP() == "0.0.0.0"){
    //     Ethernet.begin(eth_mac,eth_ip,eth_dns,eth_gw,eth_mask);

    // }
	Serial.print("Connected (static method)!, IP Add :");
	Serial.print(Ethernet.localIP());
	Serial.println("Gateway : ");
	Serial.print(Ethernet.gatewayIP());
	}
	
	
}
void nuansa::reconnect(){
	if(dhcp == true){
		if(Ethernet.linkStatus() == LinkOFF){
			rdy = false;
		}
		Serial.println("Initialize Ethernet with DHCP Method.");
		
		Ethernet.begin(eth_mac);
		while(Ethernet.linkStatus() == LinkOFF){
			Serial.print(".");
			delay(1000);
			if(Ethernet.linkStatus() == LinkON){
				break;
			}
		}
	}else{
		ethReset();
	    Ethernet.begin(eth_mac,eth_ip,eth_dns,eth_gw,eth_mask);

		while(Ethernet.linkStatus() == LinkOFF){
		Serial.print(".");
		delay(1000);
		rdy = false;
		if(Ethernet.linkStatus() == LinkON){
			rdy = true;
			break;
		}
	}
			
		Serial.print("Connected !, IP Add :");
		Serial.print(Ethernet.localIP());
		Serial.println("Gateway : ");
		Serial.print(Ethernet.gatewayIP());
	}
	
}
String nuansa::get(char* topic, byte* payload, unsigned int length) {
    _receivedTopic = String(topic);

    String payloadString;
    for(int i = 0; i < length; i++) {
        payloadString += char(payload[i]);
    }

    DynamicJsonBuffer jsonBuffer;
    JsonObject& object = jsonBuffer.parseObject(payloadString);
    String parsedString = object["m2m:rsp"]["pc"]["m2m:cin"]["con"];
    _jsonSubDataString = parsedString;

    return _jsonSubDataString;
}

String nuansa::getTopic() {
    return _receivedTopic;
}

String nuansa::getPayload() {
    return _jsonSubDataString;
}




