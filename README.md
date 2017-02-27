# Magento Check DE

## Magento Server Check für Magento Version 1.x

Mit der magento-check-de_DE.php Datei können Sie selbst überprüfen, ob Ihr Server alle 
Anforderungen erfüllt um Magento 1.x zu installieren.  

Sie können Ihren Server auf Kompatibilität testen, in dem Sie folgende einfache Schritte befolgen:

* Laden Sie dieses Archiv herunter und entpacken Sie es.
* Laden Sie die extrahierte Datei magento-check-de_DE.php in das Magento-Verzeichnis 
auf Ihrem Server
* Navigieren Sie in Ihrem Browser zur Seite (sofern die Domain auf den Ordner zeigt) 
www.meine-beispiel-url.de/magento-check-de_DE.php

## Überprüfung der Server-Einstellungen

Die Datei überprüft die MySQL-Version, die PHP-Version, den Safe-Mode, das Memory-Limit sowie 
die benötigten PHP Erweiterungen.

## Magento Systemvoraussetzungen für Magento Version 1.x

* Unterstütztes Betriebssystem: Linux x86, x86-64
* Unterstützter Web-Server: Apache 1.3.x, Apache 2.0.x, Apache 2.2.x, Nginx 1.7.x
* PHP Kompatibilität: 5.4+
* Benötigte Erweiterungen: PDO_MySQL, simplexml, mcrypt, hash, GD, DOM, iconv, curl,SOAP 
(wenn Webservice API verwendet werden soll), Safe_mode off, Memory_limit nicht weniger 
als 256Mb (am Besten 512MB)
* MySQL 5.6 (Oracle or Percona), InnoDB storage engine
* Ein gültiges SSL-Zertifikat ist notwendig. Selbst signierte SSL-Zertifikate werden nicht 
unterstützt.  

Die Voraussetzungen für Magento Version 1.x können Sie auch nochmal hier nachlesen:

* [Magento 1.x Reference](http://devdocs.magento.com/guides/m1x/system-requirements.html)
* [Mag-tutorials.de](https://www.mag-tutorials.de/tutorials/installation-und-datenbank/magento-systemvoraussetzungen/)