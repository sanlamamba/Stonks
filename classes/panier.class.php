<?php

class Panier extends Dbh
{

  //READ
  public function getpaniers()
  {
    $sql = "SELECT * FROM paniers";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function getPanierByID($id)
  {
    $sql = "SELECT * FROM paniers WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    // send result to a variable and return it


    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  // get panier by panier id
  public function getPanierByPanierID($panier_id)
  {
    $sql = "SELECT * FROM paniers WHERE panier_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$panier_id]);
    // send result to a variable and return it


    while ($result = $stmt->fetchAll()) {
      return $result;
    }
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

  public function addPanier($produit, $quantite, $panier)
  {
    echo "<script>alert('yes')</script>";
    $sql = "INSERT INTO `paniers` (`id`, `produit_id`, `quantite`, `livrer`, `panier_id`) VALUES (NULL, ?, ?, '0',?);";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$produit, $quantite, $panier]);

    // return the new created id
    return $this->connect()->lastInsertId();
  }

  //END CREATE

  // UPDATE
  public function updatePanier($id, $designation, $quantite, $prix, $categorie_id, $type, $fournisseur_id)
  {
    $sql = "UPDATE `paniers` SET `designation` = ?, `quantite` = ?, `prix` = ?, `categorie_id` = ?, `type` = ?, `fournisseurs_id` = ? WHERE `paniers`.`id` = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$designation, $quantite, $prix, $categorie_id, $type, $fournisseur_id, $id]);
  }
  // update quantity of Panier
  public function updatePanierQuantite($quantite, $id)
  {
    $sql = "UPDATE `paniers` SET `quantite` = ? WHERE `paniers`.`id` = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$quantite, $id]);
  }

  // update livrer of Panier
  public function updatePanierLivrer($livrer, $id)
  {
    $sql = "UPDATE `paniers` SET `livrer` = ? WHERE `paniers`.`id` = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$livrer, $id]);
  }



  //END UPDATE

  //DELETE
  // delete panier by id
  public function deletePanierByPanierID($id)
  {
    $sql = "DELETE FROM `paniers` WHERE `paniers`.`panier_id` = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }

  public function delUtilisateur($id)
  {
    $sql = "DELETE FROM utilisateurs WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }

  //END DELETE
}