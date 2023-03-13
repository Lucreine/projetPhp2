<?php
    class Admin{
        private int $idad;
        private string $nomad;
        private string $email;
        private string $pwd;
        private string $confirmpwd;
        private $dataBase = null;

        public function __construct(string $nomad="",string $email="",string $pwd="",string $confirmpwd=""){       
            $this->nomcli=$nomad;
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
        public function savead(){
            try {
                $requete = "INSERT INTO `admin`(nomad,email,pwd,confirmpwd) VALUES(?,?,?,?)";
                $insert = $this->dataBase -> prepare($requete);
                $insert -> execute( [$this->nomad,$this->email,$this->pwd,$this->confirmpwd]);
            } catch (POOException $e) {
                //throw $th;
            }           
        }
        public function selectadmin(){
            $requete = "SELECT * FROM admin";
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