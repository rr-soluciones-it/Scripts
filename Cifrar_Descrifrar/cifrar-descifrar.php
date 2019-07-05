<?php
/**
 * Este programa cifra y descifra texto utilizando los algoritmos rijndael
 *
 * @author Ricardo Rosero (Napster - rrosero2000@gmail.com)
 */

if( isset( $_POST['cifrar'] ) != '' &&  isset( $_POST['key_cif'] ) != '' ){
    $cifrar   = $_POST['cifrar'];
	$salt = $_POST['key_cif']; //'mcrypt_encrypt64'; //use claves de 16, 24 o 32 bytes 
	$cifrado = trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $cifrar, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
	//$cifra = base64_encode($cifrado);
	echo "<center><br><font color='red'>Texto original <strong><br><textarea rows=10 cols=100>".$cifrar."</textarea></strong></font><br><br>
	<font color='green'>Texto cifrado<strong><br><textarea rows=10 cols=100>".$cifrado."</textarea></strong></font>
	<br><br><br><br><a href='cifrar-descifrar.html'>Volver</a></center>";
}
if( isset( $_POST['descifrar'] ) != '' &&  isset( $_POST['key_des'] ) != ''  ){
    $descifrar   = $_POST['descifrar'];
	$salt = $_POST['key_des']; //'mcrypt_encrypt64'; //use claves de 16, 24 o 32 bytes 
	$descifrado = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($descifrar), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
	//$descifra = base64_decode($descifrar);
	echo "<center><br><font color='red'>Texto cifrado <strong><br><textarea rows=10 cols=100>".$descifrar."</textarea></strong></font><br>
	<br><font color='green'>Texto descifrado<strong><br><textarea rows=10 cols=100>".$descifrado."</textarea></strong></font>
	<br><br><br><br><a href='cifrar-descifrar.html'>Volver</a></center>";
}
?>
