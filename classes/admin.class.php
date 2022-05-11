<?php

class Admin extends Dbh
{
  private $secret_key = "stonksAdminKey2828";
  //READ
  public function getAdmins()
  {
    $sql = "SELECT * FROM admin";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function getAdminByID($id)
  {
    $id = htmlspecialchars(sanitizeString($id));
    $sql = "SELECT * FROM admin WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);

    // send result to a variable and return it
    $result = $stmt->fetch();
    return $result;
  }
  // get admin by token
  public function getAdminByToken($token)
  {
    $token = htmlspecialchars(sanitizeString($token));

    $sql = "SELECT * FROM admin WHERE token = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$token]);

    // send result to a variable and return it
    $result = $stmt->fetch();
    return $result;
  }

  //END READ

  //CREATE

  public function addAdmin($nom, $prenom, $email, $pwd)
  {
    $nom = htmlspecialchars(sanitizeString($nom));
    $prenom = htmlspecialchars(sanitizeString($prenom));
    $email = htmlspecialchars(sanitizeString($email));
    $pwd = htmlspecialchars(sanitizeString($pwd));

    echo '<script>alert("' . $pwd . '");</script>';
    // encrypt password using sha256
    $pwd = hash('sha256', $pwd . $this->secret_key);
    $sql = "INSERT INTO `admin` (`id`, `nom`, `prenom`, `email`, `pwd`, token) VALUES (NULL, ?, ?, ?, ?, NULL);";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $pwd]);
  }
  // update token after login
  public function updateToken($email, $token)
  {
    $sql = "UPDATE `admin` SET token = ? WHERE email = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$token, $email]);
  }

  // authenticate user
  public function authenticateUser($email, $pwd)
  {
    $email = htmlspecialchars(sanitizeString($email));
    $pwd = htmlspecialchars(sanitizeString($pwd));

    $sql = "SELECT * FROM `admin` WHERE email = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$email]);

    $result = $stmt->fetch();
    if ($result) {
      // check if password is correct
      $hash = hash('sha256', $pwd . $this->secret_key);
      if ($hash == $result['pwd']) {
        // create a token
        $token = hash('sha256', $result['id'] . $this->secret_key);
        // update token
        $this->updateToken($result['email'], $token);
        // return token
        return $token;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function delAdmin($id)
  {
    $id = htmlspecialchars(sanitizeString($id));

    $sql = "DELETE FROM admin WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }

  //END DELETE
}