<?php
class Model_Programs extends Model
{

  function getUserPrograms($user_id)
  {
    $sql = "select * from \"finalProject\".programs where owner='" . $user_id . "'";
    $stmt = $this->db->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  function getAllPrograms()
  {
    $sql = "select * from \"finalProject\".programs";
    $stmt = $this->db->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  function getAllSubscribedPrograms($user_id)
  {
    $sql = "select * from \"finalProject\".programs pr join
        \"finalProject\".subscriptions sb on pr.program_id = sb.program_id 
        where sb.user_id = '" . $user_id . "'";
    $stmt = $this->db->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  function getWebmasterURL($UserID, $ProgramId)
  {
    $sql = "select * from \"finalProject\".subscriptions where program_id = '$ProgramId' and user_id='$UserID' LIMIT 1";
    $stmt = $this->db->query($sql);
    $result = $stmt->FETCH(PDO::FETCH_ASSOC);

    if ($result['link']) {
      return $result['link'];
    } else {
      return null;
    }
  }

  function getAllUnSubscribedPrograms($user_id)
  {
    $sql = "select * from \"finalProject\".programs prg where prg.program_id not in
        (select pr.program_id from \"finalProject\".programs pr join
        \"finalProject\".subscriptions sb on pr.program_id = sb.program_id 
        where sb.user_id = '" . $user_id . "')";
    $stmt = $this->db->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  function getProgramById($ProgramId)
  {
    $sql = "select * from \"finalProject\".programs prg where prg.program_id = '" . $ProgramId . "'";
    $stmt = $this->db->query($sql);
    $result = $stmt->FETCH(PDO::FETCH_ASSOC);
    return $result;
  }

  function checkSubsctiption($UserId, $ProgramId)
  {
    $sql = "select * from \"finalProject\".subscriptions where program_id = '" . $ProgramId . "' and user_id = '" . $UserId . "'";
    $stmt = $this->db->query($sql);
    $result = $stmt->FETCH(PDO::FETCH_ASSOC);
    return $result;
  }
}