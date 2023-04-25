<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Attribute;
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);
#
# Entrada a esborrar: usuari 3 creat amb el projecte zendldap2
#
$uid = 'usr3';
$unorg = 'usuaris';
$dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';
#
#Opcions de la connexió al servidor i base de dades LDAP
$opcions = [
    'host' => 'zend-maroma.fjeclot.net',
    'username' => 'cn=admin,dc=fjeclot,dc=net',
    'password' => 'fjeclot',
    'bindRequiresDn' => true,
    'accountDomainName' => 'fjeclot.net',
    'baseDn' => 'dc=fjeclot,dc=net',
];
#
# Esborrant l'entrada
#
$ldap = new Ldap($opcions);
$ldap->bind();
try{
    $ldap->delete($dn);
    echo "<b>Entrada esborrada</b><br>";
} catch (Exception $e){
    echo "<b>Aquesta entrada no existeix</b><br>";
}
?>
<html>
<head>
<title>
Eliminar
</title>
</head>
<body>
<h2>Eliminar</h2>
<!-- 
<form action="http://zend-maroma.fjeclot.net/zendldap/consulta.php" method="GET">
Unitat organitzativa: <input type="text" name="ou"><br>
Usuari: <input type="text" name="usr"><br>
<input type="submit"/>
<input type="reset"/>
</form>
-->
<a href="http://zend-maroma.fjeclot.net/zendldap/menu.php">Torna al menú</a>
</body>
</html>