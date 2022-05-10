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
  public function searchUser($search)
  {
    $search = htmlspecialchars(sanitizeString($search));
    $sql = "SELECT * FROM utilisateurs WHERE nom LIKE '%$search%' OR prenom LIKE '%$search%' OR id LIKE '%$search%'";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    }
  }


  public function getUtilisateurByID($id)
  {
    $id = htmlspecialchars(sanitizeString($id));
    $sql = "SELECT * FROM utilisateurs WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);

    // send result to a variable and return it
    $result = $stmt->fetch();
    return $result;
  }
  public function getUtilisateurByType($type)
  {
    $type = htmlspecialchars(sanitizeString($type));
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
    $nom = htmlspecialchars(sanitizeString($nom));
    $prenom = htmlspecialchars(sanitizeString($prenom));
    $email = htmlspecialchars(sanitizeString($email));
    $adresse = htmlspecialchars(sanitizeString($adresse));
    $telephone = htmlspecialchars(sanitizeString($telephone));
    $telephone = htmlspecialchars(sanitizeString($type));

    $sql = "INSERT INTO utilisateurs(nom, prenom, email, adresse, telephone, type) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $adresse, $telephone, $type]);
  }

  public function addUtilisateurClient($nom, $prenom, $email, $adresse, $telephone)
  {
    $nom = htmlspecialchars(sanitizeString($nom));
    $prenom = htmlspecialchars(sanitizeString($prenom));
    $email = htmlspecialchars(sanitizeString($email));
    $adresse = htmlspecialchars(sanitizeString($adresse));
    $telephone = htmlspecialchars(sanitizeString($telephone));

    $sql = "INSERT INTO utilisateurs(nom, prenom, email, adresse, telephone, type) VALUES (?, ?, ?, ?, ?, 'client')";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $adresse, $telephone]);
  }


  public function addUtilisateurFournisseur($nom, $prenom, $email, $adresse, $telephone)
  {
    $nom = htmlspecialchars(sanitizeString($nom));
    $prenom = htmlspecialchars(sanitizeString($prenom));
    $email = htmlspecialchars(sanitizeString($email));
    $adresse = htmlspecialchars(sanitizeString($adresse));
    $telephone = htmlspecialchars(sanitizeString($telephone));

    $sql = "INSERT INTO utilisateurs(nom, prenom, email, adresse, telephone, type) VALUES (?, ?, ?, ?, ?, 'fournisseur')";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $adresse, $telephone]);
  }

  //END CREATE

  //UPDATE

  public function updateUtilisateurClient($nom, $prenom, $email, $adresse, $telephone, $id)
  {
    $nom = htmlspecialchars(sanitizeString($nom));
    $prenom = htmlspecialchars(sanitizeString($prenom));
    $email = htmlspecialchars(sanitizeString($email));
    $adresse = htmlspecialchars(sanitizeString($adresse));
    $telephone = htmlspecialchars(sanitizeString($telephone));
    $id = htmlspecialchars(sanitizeString($id));

    $sql = "UPDATE utilisateurs SET nom = ?, prenom = ?, email = ?, adresse = ?, telephone = ?, type = 'client' WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $adresse, $telephone, $id]);
  }
  public function updateUtilisateurFournisseur($nom, $prenom, $email, $adresse, $telephone, $id)
  {
    $nom = htmlspecialchars(sanitizeString($nom));
    $prenom = htmlspecialchars(sanitizeString($prenom));
    $email = htmlspecialchars(sanitizeString($email));
    $adresse = htmlspecialchars(sanitizeString($adresse));
    $telephone = htmlspecialchars(sanitizeString($telephone));
    $id = htmlspecialchars(sanitizeString($id));

    $sql = "UPDATE utilisateurs SET nom = ?, prenom = ?, email = ?, adresse = ?, telephone = ?, type = 'fournisseur' WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $adresse, $telephone, $id]);
  }


  //END UPDATE

  //DELETE

  public function delUtilisateur($id)
  {
    $id = htmlspecialchars(sanitizeString($id));

    $sql = "DELETE FROM utilisateurs WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }

  //END DELETE
}