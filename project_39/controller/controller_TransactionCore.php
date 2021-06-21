<?php
class Controller_TransactionCore extends Controller
{
  private $data = [];

  function __construct()
  {
    parent::__CONSTRUCT(); {
      require_once 'model/model_transactioncore.php';
      $this->model = new Model_TransactionCore();
      $this->createTransaction($_GET['webm'], $_GET['prg'], $_GET['url']);
    }
  }

  function createTransaction($Webmaster, $Program, $URL)
  {
    $subscription = $this->model->checkSubscription($Webmaster, $Program);
    if (!$subscription) {
      $this->model->createFraud($Webmaster, $Program, date("Y-m-d H:i:s"));
    } else {
      $client_id = $this->model->getProgramOwner($Program);
      if ($client_id) {
        $tax = $this->model->getClientTax($client_id);
        if (!$tax) {
          $tax = 0;
        }
        $price = $this->model->getProgramPrice($Program);
        if (!$price) {
          $price = 0;
        }
        $ourReward = (int)$price * $tax / 100;

        $webmasterReward = $price - $ourReward;
        if ($webmasterReward < 0) {
          $webmasterReward = 0;
        }

        $this->model->createTransaction($subscription, date("Y-m-d H:i:s"), $price, $ourReward);

        $this->model->updateWallet($Webmaster, $webmasterReward);
      }
    }
    header("Location: $URL");
  }
}