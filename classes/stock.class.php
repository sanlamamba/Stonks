<?php

class Stock extends Dbh
{

  //READ
  public function getStocks()
  {
    $sql = "SELECT * FROM stocks";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function getStockByID($id)
  {
    $sql = "SELECT * FROM stocks WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  //BY CAtEGORIE
  // public function getUtilisateurByType($type)
  // {
  //   $sql = "SELECT * FROM utilisateurs WHERE type = ?";
  //   $stmt = $this->connect()->prepare($sql);
  //   $stmt->execute([$type]);

  //   while ($result = $stmt->fetchAll()) {
  //     return $result;
  //   };
  // }




  //END READ

  //CREATE

  public function addStock($designation, $quantite, $prix, $categorie_id, $type, $fournisseur_id)
  {
    echo "<script>alert('yes')</script>";
    $sql = "INSERT INTO `stocks` (`id`, `designation`, `quantite`, `prix`, `categorie_id`, `type`, `fournisseurs_id`) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$designation, $quantite, $prix, $categorie_id, $type, $fournisseur_id]);
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