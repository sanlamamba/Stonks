<?php

class Commande extends Dbh
{

  //READ
  public function getCommandes()
  {
    $sql = "SELECT * FROM commande";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  // get commande by id
  public function getCommandeByID($id)
  {
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
    $sql = "SELECT * FROM commande WHERE client_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$client_id]);
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
  // create a new commande with client as null
  public function addCommande($client, $panier, $date)
  {
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
    $sql = "UPDATE `stocks` SET `designation` = ?, `quantite` = ?, `prix` = ?, `categorie_id` = ?, `type` = ?, `fournisseurs_id` = ? WHERE `stocks`.`id` = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$designation, $quantite, $prix, $categorie_id, $type, $fournisseur_id, $id]);
  }
  // update quantity of stock
  public function updateStockQuantite($quantite, $id)
  {
    $sql = "UPDATE `stocks` SET `quantite` = ? WHERE `stocks`.`id` = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$quantite, $id]);
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