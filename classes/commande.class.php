<?php

class Commande extends Dbh
{

  //READ
  public function getCommandes()
  {
    $sql = "SELECT * FROM commande";
    $sql = stringController($sql);
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  // get commande by id
  public function getCommandeByID($id)
  {
    $id = htmlspecialchars(sanitizeString($id));

    $sql = "SELECT * FROM commande WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    // send result to a variable and return it

    while ($result = $stmt->fetchAll()) {
      return $result;
    }
  }

  // get commandes by client
  public function getCommandesByClient($client_id)
  {
    $client_id = htmlspecialchars(sanitizeString($client_id));

    $sql = "SELECT * FROM commande WHERE client_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$client_id]);
    // send result to a variable and return it

    while ($result = $stmt->fetchAll()) {
      return $result;
    }
  }

  // get commandes by date asc
  public function getCommandesByDateAsc()
  {
    $sql = "SELECT * FROM commande ORDER BY date ASC";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  // get commandes by date desc
  public function getCommandesByDateOrder($order)
  {
    $sql = "SELECT * FROM commande ORDER BY date $order";

    $sql = "SELECT * FROM commande ORDER BY date_commande ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute($order);

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }




  //END READ

  //CREATE
  // create a new commande with client as null
  public function addCommande($client, $panier, $date)
  {
    $client = htmlspecialchars(sanitizeString($client));
    $panier = htmlspecialchars(sanitizeString($panier));
    $date = htmlspecialchars(sanitizeString($date));

    echo '<script>alert("yes")</script>';
    // reformat date to insert in database
    $dateC = date("d/m/Y");
    $dateL = date('d/m/Y', strtotime($date));

    $sql = "INSERT INTO `commande` (`id`, `date_commande`, `date_livraison`, `client_id`, `panier_id`, `status`) VALUES (NULL, ?, ?, ?, ?, ?);";
    $stmt = $this->connect()->prepare($sql);
    echo '<script>alert("pass")</script>';

    $stmt->execute([$dateC, $dateL, $client, $panier, "En Attente"]);
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

  // delete a commande
  public function deleteCommande($id)
  {
    $id = htmlspecialchars(sanitizeString($id));

    $sql = "DELETE FROM `commande` WHERE `commande`.`id` = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }

  //END DELETE
}