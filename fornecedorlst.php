<html>
<head>
<title>Relat&oacute;rio de Fornecedores</title>
<?php include ('config.php');  ?>
</head>

<body>
<form action="fornecedorlst.php?botao=gravar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan=5 align="center">Relat&oacute;rio de Clientes</td>
  </tr>
  <tr>
    <td width="18%" align="right">Nome:</td>
    <td width="26%"><input type="text" name="nome" /></td>
    <td width="17%" align="right">Sexo:</td>
    <td width="18%"><input type="text" name="sexo" size="3" /></td>
    <td width="21%"><input type="submit" name="botao" value="Gerar" /></td>
  </tr>
</table>
</form>

<?php if ($_REQUEST['botao'] == "Gerar") { ?>

<table width="95%" border="1" align="center">
  <tr bgcolor="#9999FF">
    <th width="5%">C&oacute;d</th>
    <th width="30%">Nome</th>
    <th width="15%">Sexo</th>
    <th width="12%">Telefone</th>
    <th width="12%">Cidade</th>
    <th width="5%">Editar</th>
  </tr>

<?php

	$nome = $_POST['nome'];
	$sexo = $_POST['sexo'];
	
	$query = "SELECT *
			  FROM fornecedores 
			  WHERE id > 0 ";
	$query .= ($nome ? " AND nome LIKE '%$nome%' " : "");
	$query .= ($sexo ? " AND sexo = '$sexo' " : "");
	$query .= " ORDER by id";
	$result = mysqli_query($con, $query);

/*	
	echo "<pre>";
	echo $query;
	echo mysql_error();
	echo "</pre>";
*/
	while ($coluna=mysqli_fetch_array($result)) 
	{
		
	?>

    
    <tr>
      <th width="5%"style="background:#808080;" ><?php echo $coluna['id']; ?></th>
      <th width="30%" ><?php echo $coluna['nome']; ?></th>
      <th width="15%" style="background:#808080;"><?php echo $coluna['sexo']; ?></th>
      <th width="12%" ><?php echo $coluna['telefone']; ?></th>
      <th width="12%" style="background:#808080;"><?php echo $coluna['cidade']; ?></th>
        <td>
        <a 
          href="fornecedorcds.php?pag=cliente&id=<?php echo $coluna['id']; ?>"><img src="./edittar.jpg" style="width: 50%;"></a>
        </td>

    </tr>

    <?php
	
	} // fim while
?>
</table>
<?php	
}
?>
</body>
