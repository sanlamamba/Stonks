<?php

class Utilisateur extends Dbh
{

  //READ
  public function getUtilisateurs()
  {
    $sql = "SELECT * FROM utilisateurs";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function getUtilisateurByID($id)
  {
    $sql = "SELECT * FROM utilisateurs WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }
  public function getUtilisateurByType($type)
  {
    $sql = "SELECT * FROM utilisateurs WHERE type = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$type]);

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  //END READ

  //CREATE

  public function addUtilisateur($nom, $prenom, $email, $adresse, $telephone, $type)
  {
    $sql = "INSERT INTO utilisateurs(nom, prenom, email, adresse, telephone, type) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $adresse, $telephone, $type]);
  }

  public function addUtilisateurClient($nom, $prenom, $email, $adresse, $telephone)
  {
    $sql = "INSERT INTO utilisateurs(nom, prenom, email, adresse, telephone, type) VALUES (?, ?, ?, ?, ?, 'client')";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $adresse, $telephone]);
  }


  public function addUtilisateurFournisseur($nom, $prenom, $email, $adresse, $telephone)
  {
    $sql = "INSERT INTO utilisateurs(nom, prenom, email, adresse, telephone, type) VALUES (?, ?, ?, ?, ?, 'fournisseur')";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $adresse, $telephone]);
  }

  //END CREATE

  //UPDATE

  public function updateUtilisateurClient($nom, $prenom, $email, $adresse, $telephone, $id)
  {
    $sql = "UPDATE utilisateurs SET nom = ?, prenom = ?, email = ?, adresse = ?, telephone = ?, type = 'client' WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $adresse, $telephone, $id]);
  }
  public function updateUtilisateurFournisseur($nom, $prenom, $email, $adresse, $telephone, $id)
  {
    $sql = "UPDATE utilisateurs SET nom = ?, prenom = ?, email = ?, adresse = ?, telephone = ?, type = 'fournisseur' WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $adresse, $telephone, $id]);
  }


  //END UPDATE

  //DELETE

  public function delUtilisateur($id)
  {
    $sql = "DELETE FROM utilisateurs WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }

  //END DELETE
}