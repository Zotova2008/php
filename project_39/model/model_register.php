<?php
class Model_Register extends Model
{
  function checkUserExistance(string $User_login)
  {
    $sql = "select user_id from \"finalProject\".users where user_login = '$User_login'";
    $stmt = $this->db->query($sql);
    $result = $stmt->FetchAll(PDO::FETCH_NUM);

    if (count($result) > 0) {
      return false;
    } else {
      return true;
    }
  }

  function createUser(string $UserName, string $UserSurname, string $User_login, string $UserPassword, string $UserStatus, string $UserRole)
  {
    $password = md5(md5(trim($UserPassword)));
    $sql = "insert into \"finalProject\".users(user_name,user_surname,user_login, user_password) 
        values ('" . $UserName . "', '" . $UserSurname . "', '" . $User_login . "', '" . $password . "');";
    $result =  $this->db->exec($sql);
    if ($result) {
      $role_id = $this->getRoleId($UserRole);
      $new_user_id = $this->getUserId($User_login);

      if ($role_id && $new_user_id) {
        $sql = "insert into \"finalProject\".rolesmap(role_id,user_id) 
                values (" . $role_id . "," . $new_user_id . ")";
        $result =  $this->db->exec($sql);
        if ($result) {
          return true;
        } else {
          $this->dropUserByLogin($User_login);
          return false;
        }
      } else {
        $this->dropUserByLogin($User_login);
        return false;
      }
    }
    return false;
  }
  function getRoleId($UserRole)
  {

    $sql = "select role_id from \"finalProject\".roles where UPPER(role_name) = UPPER('" . $UserRole . "') limit 1";
    $stmt = $this->db->query($sql);
    $result = $stmt->FETCH(PDO::FETCH_ASSOC);

    if ($result) {
      return $result['role_id'];
    } else {
      return null;
    }
  }
  function getUserId($User_login)
  {
    $sql = "select user_id from \"finalProject\".users where user_login = '$User_login' LIMIT 1";

    $stmt = $this->db->query($sql);
    $result = $stmt->FETCH(PDO::FETCH_ASSOC);


    if ($result) {
      return $result['user_id'];
    } else {
      return null;
    }
  }

  function dropUserByLogin(string $UserLogin)
  {
    $sql = "delete from \"finalProject\".users where user_login='" . $User_login . "'";
    $result =  $this->db->exec($sql);
  }

  function activateUser($User_login)
  {
    $sql = "update \"finalProject\".users
        SET user_status = 'active'
        WHERE user_id='" . $User_login . "'";
    $result =  $this->db->exec($sql);
    return true;
  }

  function deactivateUser($User_login)
  {
    $sql = "update \"finalProject\".users
        SET user_status = 'disabled'
        WHERE user_id='" . $User_login . "'";
    $result =  $this->db->exec($sql);
    return true;
  }
}