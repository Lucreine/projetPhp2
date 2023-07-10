<?php
    require_once("ClassClient.php");
    // Démarrage de la session
    session_start();
    // On vérifie si le champ Login n'est pas vide.
    if ($_SESSION['email']=='')
    // Si c'est le cas, le visiteur ne s'est pas loger et subit une redirection
    { 
        //Header('Location:client.php');
    }
    else
    {
         echo "  <a href src='Disconnect.php'> Se déconnecter </a> || Utilisateur: ". $_SESSION['email'] ."";  
    }
    // Test De vérification que l'user est bien dans la liste des utilisateurs Mysql
    // Connexion à la base de données MySql
    //$DataBase = mysql_connect ( "localhost" , 'root' , '', "authentification") ;
    // Cette table contient la liste des users enregistrés.
    mysql_select_db ( "mysql" , $this->dataBase );
    // Nous allons chercher le vrai mot de passe ( crypté ) de l'utilisateur connecté
    // Cryptage du mot de passe donné par l'utilsateur à la connexion par requête SQL
    $Requete ="Select client('".$_SESSION['pwd']."');";
    $Resultat = mysql_query ( $Requete )  or  die(mysql_error() ) ;
    while (  $ligne = mysql_fetch_array($Resultat)  )
    // Le vrai mot de passe crypté est sauvergardé dans la variable $RealPasswd
    {
        $RealPasswd=$ligne["client('".$_SESSION['email']. "')"];
    }
    // Initialisation à Faux de la variable "L'utilisateur existe".
    $CheckUser=False;
    // On interroge la base de donnée Mysql sur le nom des users enregistrés
    $Requete ="Select pwd,nomcli From client";
    $Resultat = mysql_query ( $Requete )  or  die(mysql_error() ) ;
    while (  $ligne = mysql_fetch_array($Resultat)  )
    {
    // Si l'utilisateur X est celui de la session
        if ( $ligne['nomcli']==$_SESSION['email'])
        {
            // Alors on vérifie si le mot de passe est le bon
            If ($RealPasswd == $ligne['pwd'])
            // Si le couple est bon, c’est que l’utilisateur est le bon.
            {
                $CheckUser=True;
            }
        }
    }
    // Si l'utilisateur n'est toujours pas valide à la fin de la lecture tableau
    if ( $CheckUser==False )
    // Redirection vers la fenêtre de connexion.
    {
        Header('Location:ClassCient.php');
    }
?>

<?php
class Auth {
    private $username;
    private $password;
    
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
    
    public function validate() {
        // Vérifiez si l'utilisateur a soumis le formulaire
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }
        
        // Vérifiez si les champs d'entrée sont vides
        if (empty($this->username) || empty($this->password)) {
            return false;
        }
        
        // Effectuez une requête à la base de données pour vérifier si l'utilisateur existe
        $pdo = new PDO('mysql:host=localhost;dbname=mydatabase', 'myusername', 'mypassword');
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$this->username]);
        $user = $stmt->fetch();
        
        // Vérifiez si l'utilisateur existe et que le mot de passe est correct
        if (!$user || !password_verify($this->password, $user['password'])) {
            return false;
        }
        
        // Si tout est ok, connectez l'utilisateur
        $_SESSION['user'] = $user;
        return true;
    }
}

// Créez une instance de la classe Auth avec les données du formulaire
$auth = new Auth($_POST['username'], $_POST['password']);

// Validez l'authentification
if ($auth->validate()) {
    // Redirigez l'utilisateur vers une page de succès
    header('Location: success.php');
    exit;
} else {
    // Afficher un message d'erreur
    echo 'Nom d\'utilisateur ou mot de passe incorrect.';
}
?>