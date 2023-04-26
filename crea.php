<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Attribute;
use Laminas\Ldap\Ldap;

ini_set('display_errors', 1);
#Dades de la nova entrada
#
$uid = $_POST['uid'];
$unorg = $_POST['unorg'];
$num_id = $_POST['num_id'];
$grup = $_POST['grup'];
$dir_pers = $_POST['dir_pers'];
$sh = $_POST['sh'];
$cn = $_POST['cn'];
$sn = $_POST['sn'];
$nom = $_POST['nom'];
$mobil = $_POST['mobil'];
$adressa = $_POST['adressa'];
$telefon = $_POST['telefon'];
$titol = $_POST['titol'];
$descripcio = $_POST['descripcio'];

$objcl=array('inetOrgPerson','organizationalPerson','person','posixAccount','shadowAccount','top');
#
#Afegint la nova entrada
$domini = 'dc=fjeclot,dc=net';
$opcions = [
    'host' => 'zend-maroma.fjeclot.net',
    'username' => "cn=admin,$domini",
    'password' => 'fjeclot',
    'bindRequiresDn' => true,
    'accountDomainName' => 'fjeclot.net',
    'baseDn' => 'dc=fjeclot,dc=net',
];
$ldap = new Ldap($opcions);
$ldap->bind();
$nova_entrada = [];
Attribute::setAttribute($nova_entrada, 'objectClass', $objcl);
Attribute::setAttribute($nova_entrada, 'uid', $uid);
Attribute::setAttribute($nova_entrada, 'uidNumber', $num_id);
Attribute::setAttribute($nova_entrada, 'gidNumber', $grup);
Attribute::setAttribute($nova_entrada, 'homeDirectory', $dir_pers);
Attribute::setAttribute($nova_entrada, 'loginShell', $sh);
Attribute::setAttribute($nova_entrada, 'cn', $cn);
Attribute::setAttribute($nova_entrada, 'sn', $sn);
Attribute::setAttribute($nova_entrada, 'givenName', $nom);
Attribute::setAttribute($nova_entrada, 'mobile', $mobil);
Attribute::setAttribute($nova_entrada, 'postalAddress', $adressa);
Attribute::setAttribute($nova_entrada, 'telephoneNumber', $telefon);
Attribute::setAttribute($nova_entrada, 'title', $titol);
Attribute::setAttribute($nova_entrada, 'description', $descripcio);
$dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';

// $filter = '(uid='.$uid.')';
// $busqueda = $ldap->search($filter, $dn);

// if ($busqueda->count() > 0) {
    // Si se encontró el usuario, mostrar un mensaje de error y salir
   // echo "El usuari ja existeix";
   // echo '<a href="http://zend-maroma.fjeclot.net/zendldap/menu.php">Torna al menú</a>';
   // exit;
//} else {
    // Si no se encontró el usuario, continuar creando la entrada
    if($ldap->add($dn, $nova_entrada)) {
        echo "Usuari creat";
        echo '<a href="http://zend-maroma.fjeclot.net/zendldap/menu.php">Torna al menú</a>';
    } else {
        echo "Error al crear l'usuari";
        echo '<a href="http://zend-maroma.fjeclot.net/zendldap/menu.php">Torna al menú</a>';
    }
//}
?>


