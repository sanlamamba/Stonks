<?php

class Fourniture extends Dbh
{

    //READ
    public function getFournitures()
    {
        $sql = "SELECT * FROM fournitures";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function getFournitureByID($id)
    {
        $id = htmlspecialchars(sanitizeString($id));

        $sql = "SELECT * FROM fournitures WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    //get fourniture by produit_id
    public function getFournitureByProduitID($id)
    {
        $id = htmlspecialchars(sanitizeString($id));

        $sql = "SELECT * FROM fournitures WHERE produit_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    // get fourniture by produit_id and date
    public function getFournituresByDateAndProduit($id, $date)
    {
        $id = htmlspecialchars(sanitizeString($id));
        $date = htmlspecialchars(sanitizeString($date));

        $sql = "SELECT * FROM fournitures WHERE produit_id = ? AND date = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $date]);

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }


    // get fourniture of today
    public function getFournituresToday()
    {
        $sql = "SELECT * FROM fournitures WHERE date = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([date("d/m/Y")]);

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    // get fourniture of date
    public function getFournituresByDate($date)
    {
        $date = htmlspecialchars(sanitizeString($date));

        $sql = "SELECT * FROM fournitures WHERE date = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$date]);

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }


    // function to check if fourniture of particular product exists for today
    public function checkFournitureToday($id)
    {
        $id = htmlspecialchars(sanitizeString($id));

        $sql = "SELECT * FROM fournitures WHERE date = ? AND produit_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([date("d/m/Y"), $id]);

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    //END READ

    //CREATE

    public function addFourniture($qt_avant, $qt_fournie, $produit)
    {
        $qt_avant = htmlspecialchars(sanitizeString($qt_avant));
        $qt_fournie = htmlspecialchars(sanitizeString($qt_fournie));
        $produit = htmlspecialchars(sanitizeString($produit));

        $date_curr = date("d/m/Y");
        $sql = "INSERT INTO `fournitures` (`id`, `quantite_avant`, `quantite_fournie`, `produit_id`, `date`) VALUES (NULL, ?, ?, ?, ?); ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$qt_avant, $qt_fournie, $produit, $date_curr]);
    }

    //END CREATE

    //UPDATE
    public function updateFourniture($qt_fournie, $produit, $id)
    {
        $qt_fournie = htmlspecialchars(sanitizeString($qt_fournie));
        $produit = htmlspecialchars(sanitizeString($produit));
        $id = htmlspecialchars(sanitizeString($id));

        $date_curr = date("d/m/Y");
        $sql = "UPDATE `fournitures` SET `quantite_fournie` = ?, `produit_id` = ?, `date` = ? WHERE `fournitures`.`id` = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$qt_fournie, $produit, $date_curr, $id]);
    }


    //END UPDATE

    // DELETE
    public function deleteFourniture($id)
    {
        $id = htmlspecialchars(sanitizeString($id));

        $sql = "DELETE FROM fournitures WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }



    //END DELETE
}