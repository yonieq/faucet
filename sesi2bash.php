<?php
#Setting / Config
$cmd = "python telemaxv7.3.4.py phone_number doge";
$nama_bash = "multiakun.sh";
$max = 5;//Maximal Phone Number In Bash
#System OR Sensitive Syntax
$head = '#!/bin/bash

clear
echo "\033[1;31m      Multi Akun  "
sleep 1s

echo "\033[1;31m     bersiaplah  kita  akan mulai  "
sleep 2s

';

$insert = '
x=1200
while [ $x -gt 0 ]
do
sleep 20s
clear
echo " \033[1;36m [ no ] ke 5 akun lagi sisa Waktu anda $x Detik"
x=$(( $x - 20 ))
done

';

$bottom = '
x=12000
while [ $x -gt 0 ]
do
sleep 20s
clear
echo " \033[1;36m lanjut ke Multi  clickbot sisa Waktu anda $x Detik"
x=$(( $x - 20 ))
done
cd /$HOME/telebot
sh multiakun.sh
done';
#Processing Creating Bash
if (file_exists($nama_bash)){
  unlink($nama_bash); //Delete File Lama
  echo "\033[1;32mSukses delete file\033[1;31m : \033[1;0m{$nama_bash}\n";
}
sleep(1);
$folder = "./session"; //Suaikan nama folder
if(!($buka_folder = opendir($folder))) die ("Folder tidak ditemukan!!");
$file_array = array();
while($baca_folder = readdir($buka_folder)){
  $file_array[] = $baca_folder;
}
$jumlah_array = count($file_array);
$aran_file = fopen($nama_bash, 'w');
fwrite($aran_file, $head);
$xx = 0;
$n = 1;
for($i=2; $i<$jumlah_array; $i++){
   if ($max <= $xx){
     $xx = 0;
     fwrite($aran_file, str_replace("no", $n, $insert));
     $n++;
   }
   $nohp = str_replace(['.session','-journal'],['',''], $file_array[$i]);
   echo "\033[1;32mAdd\033[1;31m:\033[1;0m $nohp \033[1;32mto\033[1;31m:\033[1;0m {$nama_bash}\n";
   fwrite($aran_file, str_replace("phone_number", $nohp, $cmd)." &\n");
   $xx++;
}
fwrite($aran_file, $bottom);
fclose($aran_file);
echo "\033[1;32mSukses create file\033[1;31m : \033[1;0m{$nama_bash}\n";
closedir($buka_folder);
sleep(1);
?>
