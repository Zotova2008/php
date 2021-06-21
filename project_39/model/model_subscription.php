<?php
class Model_Subscription extends Model
{
  function checkSubscription(string $User_id, string $Program_id)
  {
    $sql = "select subsription_id from \"finalProject\".subscriptions where user_id = '$User_id' AND program_id = '$Program_id' LIMIT 1";
    $stmt = $this->db->query($sql);
    $result = $stmt->FETCH(PDO::FETCH_ASSOC);

    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  function subscribe(string $User_id, string $Program_id, string $URL)
  {
    $sql = "insert into \"finalProject\".subscriptions(user_id, program_id,link) 
        values('" . $User_id . "', '" . $Program_id . "', '" . $URL . "')";
    $result =  $this->db->exec($sql);
  }

  function getProgramURL($Program_id)
  {
    $sql = "select * from \"finalProject\".programs where program_id = '$Program_id' LIMIT 1";
    $stmt = $this->db->query($sql);
    $result = $stmt->FETCH(PDO::FETCH_ASSOC);

    if ($result['url']) {
      return $result['url'];
    } else {
      return null;
    }
  }
}