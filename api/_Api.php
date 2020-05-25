<?php

//Api.php

class API
{
	private $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=vendedores", "root", "");
	}

	function fetch_all()
	{
		$query = "SELECT * FROM vendedor ORDER BY vdNome";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function insert()
	{
		if(isset($_POST["vdNome"]))
		{
			$form_data = array(
				':vdNome'		=>	$_POST["vdNome"],
				':vdEmail'		=>	$_POST["vdEmail"]
			);
			$query = "
			INSERT INTO vendedor 
			(vdNome, vdEmail) VALUES 
			(:vdNome, :vdEmail)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function insertv()
	{
		if(isset($_POST["veProuto"]))
		{
			$form_data = array(
				':veIDVendr'	=>	$_POST["veIDVendr"],
				':veProuto'		=>	$_POST["veProuto"],
				':veValor'		=>	$_POST["veValor"]
			);
			$query = "
			INSERT INTO venda 
			(veIDVendr, veProuto, veValor) VALUES 
			(:veIDVendr, :veProuto, :veValor)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function fetch_single($id)
	{
		$query = "SELECT * FROM vendedor WHERE vdID='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['vdID'] = $row['vdID'];
				$data['vdNome'] = $row['vdNome'];
				$data['vdEmail'] = $row['vdEmail'];
				$data['vdComis'] = $row['vdComis'];
			}
			return $data;
		}
	}

	function fetch_allv($id)
	{
		$query = "SELECT * FROM venda WHERE veIDVendr='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	
}

?>