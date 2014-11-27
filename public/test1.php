<?php

class paiement implements SplSubject {
    protected $observateurs = array();
    protected $prix;
    public function attach(SplObserver $observateur) {
        $this->observateurs[] = $observateur;
    }

    public function detach(SplObserver $observateur) {
        if(is_int($cle = array_search($observateur, $this->observateurs, true))){
            unset($this->observateurs[$cle]);
        }
    }
    public function notify(){
        foreach ($this->observateurs as $observateur) {
            $observateur->update($this);
        }
    }
    public function calcul($ht,$tva){
        $this->notify();
        $this->prix = $ht * $tva;
        return $this->prix;
    }
    public function getCalcul(){
        return $this->prix;
    }
}

class observateurJournal implements SplObserver{
    static $nombre;
    static $calculs;
    
    public function update(SplSubject $obj){
        //$calculs = $this::$calculs;
        $this::$calculs[] = $obj->getCalcul();
        
        $calculs[] = $obj->getCalcul();
        //echo "<br/>methode update de journal<br/>";
        $this::$nombre++;
        //echo "nombre : ". $this::$nombre."<br/>";
        //var_dump($calculs);
    }
}

class observateurAffiche implements SplObserver{
    protected $calculs;
    public function update(SplSubject $obj){
        for($k = 1;$k < 11; $k++){
           // echo $obj->getCalcul()."<br/>";
        }
    }
}

$p1 = new paiement();
$p1->attach(new observateurJournal);
$p1->attach(new observateurAffiche);

echo $p1->calcul(100, 1.2)."<br />";
echo $p1->calcul(200, 1.2)."<br />";
echo $p1->calcul(300, 1.2)."<br />";
echo $p1->calcul(12300, 1.2)."<br />";
echo $p1->calcul(235, 1.2)."<br />";
echo "<br />Resultats<br />";
echo observateurJournal::$nombre;
var_dump(observateurJournal::$calculs);
?>
