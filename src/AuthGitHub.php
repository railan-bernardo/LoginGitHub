<?php

/**
 * Class AuthGitHub
 * @author Railan Bernardo <railabernardo2016@gmail.com>
 */
class AuthGitHub
{
  private $clientId;
  private $clientSecret;
  private $code;

  function __construct(string $clientId, string $clientSecret)
  {
     $this->clientId = $clientId;
     $this->clientSecret = $clientSecret;
     $this->code = ($_GET['code'] ?? "");
  }

  // faz a requisição e retorna o token
  public function auth()
  {

    $postParams = [
      "client_id"=>$this->clientId,
      "client_secret"=>$this->clientSecret,
      "code"=>$this->code
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, URL_API_TOKEN);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response);

  }

  // faz autenticação com o token
  public function user($data)
  {

    if($data->access_token != ""){
          $authHeader = "Authorization: token ". $data->access_token;
          $userAgent = "User-Agent: Demo";

          echo $authHeader . "<br />";

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, URL_API_USER);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json",$authHeader,$userAgent));
          $response = curl_exec($ch);
          curl_close($ch);

          $result = json_decode($response);

          return $result;

    }

  }



}



 ?>
