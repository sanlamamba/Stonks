<?php

class Categorie extends Dbh
{

  //READ
  public function getCategories()
  {
    $sql = "SELECT * FROM categories ORDER BY id DESC";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function getCategoriesByID($id)
  {
    $sql = "SELECT * FROM categories WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);

    // send result to a variable and return it
    $result = $stmt->fetch();
    return $result;
  }


  //END READ

  //CREATE

  public function addCategories($label)
  {
    $sql = "INSERT INTO `categories` (`id`, `label`) VALUES (NULL, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$label]);
  }



  //END CREATE

  //UPDATE



  //END UPDATE

  //DELETE

  public function delCategories($id)
  {
    $sql = "DELETE FROM categories WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }

  //END DELETE
}