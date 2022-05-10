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
    $id = htmlspecialchars(sanitizeString($id));

    $sql = "SELECT * FROM stocks WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    // send result to a variable and return it
    $result = $stmt->fetch();
    return $result;
  }


  //CREATE

  public function addStock($designation, $quantite, $prix, $categorie_id, $type, $fournisseur_id)
  {
    $designation = htmlspecialchars(sanitizeString($designation));
    $quantite = htmlspecialchars(sanitizeString($quantite));
    $prix = htmlspecialchars(sanitizeString($prix));
    $categorie_id = htmlspecialchars(sanitizeString($categorie_id));
    $type = htmlspecialchars(sanitizeString($type));
    $fournisseur_id = htmlspecialchars(sanitizeString($fournisseur_id));

    $sql = "INSERT INTO `stocks` (`id`, `designation`, `quantite`, `prix`, `categorie_id`, `type`, `fournisseurs_id`) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$designation, $quantite, $prix, $categorie_id, $type, $fournisseur_id]);
  }

  //END CREATE

  // UPDATE
  public function updateStock($id, $designation, $quantite, $prix, $categorie_id, $type, $fournisseur_id)
  {
    $id = htmlspecialchars(sanitizeString($id));
    $designation = htmlspecialchars(sanitizeString($designation));
    $quantite = htmlspecialchars(sanitizeString($quantite));
    $prix = htmlspecialchars(sanitizeString($prix));
    $categorie_id = htmlspecialchars(sanitizeString($categorie_id));
    $type = htmlspecialchars(sanitizeString($type));
    $fournisseur_id = htmlspecialchars(sanitizeString($fournisseur_id));

    $sql = "UPDATE `stocks` SET `designation` = ?, `quantite` = ?, `prix` = ?, `categorie_id` = ?, `type` = ?, `fournisseurs_id` = ? WHERE `stocks`.`id` = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$designation, $quantite, $prix, $categorie_id, $type, $fournisseur_id, $id]);
  }
  // update quantity of stock
  public function updateStockQuantite($quantite, $id)
  {
    $quantite = htmlspecialchars(sanitizeString($quantite));
    $id = htmlspecialchars(sanitizeString($id));

    $sql = "UPDATE `stocks` SET `quantite` = ? WHERE `stocks`.`id` = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$quantite, $id]);
  }
  //END UPDATE

  //DELETE
  public function delStock($id)
  {
    $id = htmlspecialchars(sanitizeString($id));

    $sql = "DELETE FROM stocks WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }
  //END DELETE
}