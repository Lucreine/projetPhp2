<?php
    class Client{
        private int $idcli;
        private string $nomcli;
        private string $email;
        private string $pwd;
        private string $confirmpwd;
        private $dataBase = null;

        public function __construct(string $nomcli="",string $email="",string $pwd="",string $confirmpwd=""){       
            $this->nomcli=$nomcli;
            $this->email=$email;
            $this->pwd=$pwd;
            $this->confirmpwd=$confirmpwd;

            try {
                $this->dataBase = new PDO("mysql:host=localhost;dbname=gestion_produit","root","");
                //echo "reussie";
            } catch (POOException $e){
                echo "echec";
            }           
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
        public function selectclient(){
            $requete = "SELECT * FROM client";
            $result = $this->dataBase -> query($requete);
            $tab = $result->fetchAll();
            return $tab;
        } 
        /*public function confirmpwd(string $idcli){
            $requete = "SELECT * FROM produit where idcli=?";
            $select=$this->dataBase->prepare($requete);
            $select->execute([$idcli]);
            return $select->fetch(PDO::FETCH_ASSOC);
        } */     
    }   
?>