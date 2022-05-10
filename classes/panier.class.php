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
    $id = htmlspecialchars(sanitizeString($id));

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
    $panier_id = htmlspecialchars(sanitizeString($panier_id));

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
    $produit = htmlspecialchars(sanitizeString($produit));
    $quantite = htmlspecialchars(sanitizeString($quantite));
    $panier = htmlspecialchars(sanitizeString($panier));

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
    $id = htmlspecialchars(sanitizeString($id));
    $designation = htmlspecialchars(sanitizeString($designation));
    $quantite = htmlspecialchars(sanitizeString($quantite));
    $prix = htmlspecialchars(sanitizeString($prix));
    $categorie_id = htmlspecialchars(sanitizeString($categorie_id));
    $type = htmlspecialchars(sanitizeString($type));
    $fournisseur_id = htmlspecialchars(sanitizeString($fournisseur_id));

    $sql = "UPDATE `paniers` SET `designation` = ?, `quantite` = ?, `prix` = ?, `categorie_id` = ?, `type` = ?, `fournisseurs_id` = ? WHERE `paniers`.`id` = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$designation, $quantite, $prix, $categorie_id, $type, $fournisseur_id, $id]);
  }
  // update quantity of Panier
  public function updatePanierQuantite($quantite, $id)
  {
    $quantite = htmlspecialchars(sanitizeString($quantite));
    $id = htmlspecialchars(sanitizeString($id));

    $sql = "UPDATE `paniers` SET `quantite` = ? WHERE `paniers`.`id` = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$quantite, $id]);
  }

  // update livrer of Panier
  public function updatePanierLivrer($livrer, $id)
  {
    $livrer = htmlspecialchars(sanitizeString($livrer));
    $id = htmlspecialchars(sanitizeString($id));

    $sql = "UPDATE `paniers` SET `livrer` = ? WHERE `paniers`.`id` = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$livrer, $id]);
  }



  //END UPDATE

  //DELETE
  // delete panier by id
  public function deletePanierByPanierID($id)
  {
    $id = htmlspecialchars(sanitizeString($id));

    $sql = "DELETE FROM `paniers` WHERE `paniers`.`panier_id` = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }

  // delete panier by id
  public function deletePanierByID($id)
  {
    $id = htmlspecialchars(sanitizeString($id));

    $sql = "DELETE FROM `paniers` WHERE `paniers`.`id` = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }



  //END DELETE
}