<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Attribute;
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);
#
# Atribut a modificar --> Número d'idenficador d'usuari
#
$atribut='uidNumber'; # El número identificador d'usuar té el nom d'atribut uidNumber
$nou_contingut=6000;
#
# Entrada a modificar
#
$uid = 'usr2';
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
# Modificant l'entrada
#
$ldap = new Ldap($opcions);
$ldap->bind();
$entrada = $ldap->getEntry($dn);
if ($entrada){
    Attribute::setAttribute($entrada,$atribut,$nou_contingut);
    $ldap->update($dn, $entrada);
    echo "Atribut modificat";
} else echo "<b>Aquesta entrada no existeix</b><br><br>";
?>
<html>
<head>
<title>
Editar
</title>
</head>
<body>
<h2>Editar</h2>
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