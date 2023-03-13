<?php
    class Produit{
        private int $id;
        private string $nom;
        private int $pv;
        private int $pu;
        private int $stock;
        private string $images;
        private $dataBase = null;

        public function __construct(string $nom="",int $pv=0,int $pu=0,int $stock=0,string $images=""){       
            $this->nom=$nom;
            $this->pv=$pv;
            $this->pu=$pu;
            $this->stock=$stock;
            $this->images=$images;

            try {
                $this->dataBase = new PDO("mysql:host=localhost;dbname=gestion_produit","root","");
                //echo "reussie";
            } catch (POOException $e){
                echo "echec";
            }           
        }
        public function all(){
            $requete = "SELECT * FROM produit";
            $result = $this->dataBase -> query($requete);
            $tab = $result->fetchAll();
            return $tab;
        }
        public function save(){
            try {
                $requete = "INSERT INTO `produit`(nom,pu,pv,stock,images) VALUES(?,?,?,?,?)";
                $insert = $this->dataBase -> prepare($requete);
                $insert -> execute( [$this->nom,$this->pu,$this->pv,$this->stock,$this->images]);
            } catch (POOException $e) {
                //throw $th;
            }           
        }   
        public function delete(string $id){
            try {
                $requete ="DELETE from `produit` where id =?";
                $insert = $this->dataBase -> prepare($requete);
            $insert -> execute( [$id/*,$this->nom,$this->pu,$this->pv,$this->stock*/]);
            } catch (POOException $e) {
                //throw $th;
            }           
        } 
        public function get(string $id){
            $requete = "SELECT * FROM produit where id=?";
            $select=$this->dataBase->prepare($requete);
            $select->execute([$id]);
            return $select->fetch(PDO::FETCH_ASSOC);
        } 
        public function savecli(){
            try {
                $requete = "INSERT INTO `client`(nomcli,email,pwd,confirmpwd) VALUES(?,?,?,?)";
                $insert = $this->dataBase -> prepare($requete);
                $insert -> execute( [$this->nomcli,$this->email,$this->pwd,$this->confirmpwd]);
            } catch (POOException $e) {
                //throw $th;
            }           
        }       
    }   
?>