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
    public function VeriGetir($tablo,$wherealanlar="",$wherearraydeger="",$orderby="ORDER BY ID ASC",$limit=""){
        $this->baglanti->query("SET CHARACTER SET utf8");
        $sql="select * from ".$tablo;
        if(!empty($wherealanlar) && !empty($wherearraydeger)){
            $sql.=" ".$wherealanlar;
            if(!empty($orderby))($sql.=" ".$orderby);
            if(!empty($limit))($sql.=" LIMIT ".$limit);
            $calistir=$this->baglanti->prepare($sql);
            $sonuc=$calistir->execute($wherearraydeger);
            $veri=$calistir->fetchAll(PDO::FETCH_ASSOC);
            
        } else{
            if(!empty($orderby))($sql.=" ".$orderby);
            if(!empty($limit))($sql.=" LIMIT ".$limit);
            $veri=$this->baglanti->query($sql,PDO::FETCH_ASSOC);
    }
    if($veri!=false && !empty($veri))
    {
        $datalar=array();
        foreach($veri as $bilgiler){
            $datalar[]=$bilgiler;
        }
        return $datalar;
    }else{
        return false;
    }

}
}

?>