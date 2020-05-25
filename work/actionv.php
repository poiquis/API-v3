<?php

//action.php

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'insertv')
	{
		$form_data = array(
			'veIDVendr' =>	$_POST['veIDVendr'],
			'veProuto' =>	$_POST['veProuto'],
			'veValor' => $_POST['veValor']
		);
		$api_url = "http://localhost/APIv3/api/test_api.php?action=insertv";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'insert';
			}
			else
			{
				echo 'error';
			}
		}
	}

}


?>