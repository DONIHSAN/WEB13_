<?php

/** Program Memanfaatkan Program 10.2 untuk membuat form inputan sederhana. */

include "form.php";

echo "<html><head><title>Mahasiswa</title></head></html><body>";
$form = new Form("", "Input Form");
$form->addField("txtnim", "Nim");
$form->addField("txtnama", "Nama");
$form->addField("txtalamat", "Alamat");
echo "<h3>Silahkan Isi Form Berikut Ini: </h3>";
$form->displayForm();
echo "</body></html>";

?>