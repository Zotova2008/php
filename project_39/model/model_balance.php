<?php
class Model_Balance extends Model
{
  function getBalance(string $User_id)
  {
    $sql = "select wallet from \"finalProject\".users where user_id = '$User_id' LIMIT 1";
    $stmt = $this->db->query($sql);
    $result = $stmt->FETCH(PDO::FETCH_ASSOC);
    return $result['wallet'];
  }
}