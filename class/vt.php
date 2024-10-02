<?php

class vt {

    var $sunucu="localhost";
    var $user="root";
    var $password="";
    var $dbname="dashboard";
    var $baglanti;

    //  veri tabanına bağlanıyor sanırım
    function __construct(){
        try {
            $this->baglanti = new PDO("mysql:host=".$this->sunucu.";dbname=".$this->dbname.";charset=utf8",$this->user,$this->password);
        } catch (PDO_Exception $error) {
        echo "Bağlantı hatası: ". $error->getMessage();
            exit();
    }
    }

}

?>