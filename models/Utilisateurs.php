<?php
class Utilisateurs extends Database{
    private $id = 0;
    private $pseudo = "";
    private $mail = "";
    private $pass = "";
    public function __construct(){
        parent::__construct();
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        return $this->id = $id;
    }
    public function getPseudo(){
        return $this->pseudo;
    }
    public function setPseudo($pseudo){
        return $this->pseudo = $pseudo;
    }
    public function getMail(){
        return $this->mail;
    }
    public function setMail($mail){
        return $this->mail = $mail;
    }
    public function getPass(){
        return $this->pass;
    }
    public function setPass($pass){
        return $this->pass = $pass;
    }
    public function inscrireUtilisateur(){
        $req = 'INSERT INTO `utilisateurs`( `email`, `MotDepasse`, `pseudo`) VALUES (:email, :pass, :pseudo)';
        $insert = $this->db->prepare($req);
        $insert->bindValue(':email', $this->mail, PDO::PARAM_STR);
        $insert->bindValue(':pass', $this->pass, PDO::PARAM_STR);
        $insert->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        return $insert->execute();
    }
    public function verifUtilisateur(){
        $req = 'SELECT id, pseudo, email FROM utilisateurs WHERE pseudo = :pseudo OR email = :mail';
        $verif = $this->db->prepare($req);
        $verif->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $verif->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $verif->execute();
        return $verif->fetch(PDO::FETCH_OBJ);
    }
    public function verif(){
        $req = 'SELECT id, pseudo, email FROM utilisateurs';
        $verif = $this->db->query($req);
        return $verif->fetchAll(PDO::FETCH_OBJ);
    }
    public function connexionUtilisateurs(){
        $req = 'SELECT utilisateurs.`id`, `email`, `MotDepasse`, `pseudo`, `nom` FROM `utilisateurs` INNER JOIN roles ON utilisateurs.id_Roles = roles.id WHERE email = :mail';
        $connexion = $this->db->prepare($req);
        $connexion->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $connexion->execute();
        return $connexion->fetch(PDO::FETCH_OBJ);
    }
    public function modifierUtilisateur(){
        $req = 'UPDATE utilisateurs SET MotDepasse = :pass WHERE id = :id ';
        $modification = $this->db->prepare($req);
        $modification->bindValue(':pass', $this->pass, PDO::PARAM_STR);
        $modification->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $modification->execute();
    }
    public function modifierUtilisateurPseudo(){
        $req = 'UPDATE utilisateurs SET pseudo = :pseudo WHERE id = :id ';
        $modification = $this->db->prepare($req);
        $modification->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $modification->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $modification->execute();
    }
    public function suprimerUtilisateur(){
        $req = 'DELETE FROM utilisateurs WHERE id = :id';
        $suppression = $this->db->prepare($req);
        $suppression->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $suppression->execute();
    }
}