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
$filter = '(uid='.$uid.')';
$busqueda = $ldap->search($filter, $dn);

if ($busqueda->count() > 0) {
    // Si se encontró el usuario, mostrar un mensaje de error y salir
    echo "El usuario ya existe";
    exit;
} else {
    // Si no se encontró el usuario, continuar creando la entrada
    if($ldap->add($dn, $nova_entrada)) {
        echo "Usuari creat";
    } else {
        echo "Error al crear el usuario";
    }
}
?>
<html>
<head>
<title>
Crear
</title>
</head>
<body>
<h2>Crear</h2>
<form action="http://zend-maroma.fjeclot.net/zendldap/crear_usuario.php" method="POST">
Unitat organitzativa: <input type="text" name="unorg"><br>
Usuari: <input type="text" name="uid"><br>
Número d'identificació: <input type="text" name="num_id"><br>
Grup: <input type="text" name="grup"><br>
Directori personal: <input type="text" name="dir_pers"><br>
Shell de inici de sessió: <input type="text" name="sh"><br>
Nom complet: <input type="text" name="cn"><br>
Cognom: <input type="text" name="sn"><br>
Nom: <input type="text" name="nom"><br>
Mobil: <input type="text" name="mobil"><br>
Adressa: <input type="text" name="adressa"><br>
Telefon: <input type="text" name="telefon"><br>
Titol: <input type="text" name="titol"><br>
Descripció: <input type="text" name="descripcio"><br>
<input type="submit" value="Crear usuario">
<input type="reset" value="Borrar">
</form>
<a href="http://zend-maroma.fjeclot.net/zendldap/menu.php">Torna al menú</a>
</body>
</html>
