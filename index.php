<!DOCTYPE html>
<html lang="en">

<head>
  <title>Busca</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
  <?php include "conexao.php"; ?>
</head>

<body>
  <nav>
    <form method="GET" action="index.php">
      <select name="sltcargo">
      <option selected disabled value= "" >Selecione</option>
        <?php
        $consulta = $connection->query("select DISTINCT cargo from tbl_empregos");
        while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $cargo = $exibe['cargo'];
          echo "<option value='$cargo'>$cargo</option>";
        }
        ?>
      </select>
      <select name="sltarea">
        <option selected disabled value= "" >Selecione</option>
        <?php
        $consulta = $connection->query("select DISTINCT area from tbl_empregos");
        while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $area = $exibe['area'];
          echo "<option value='$area'>$area</option>";
        }
        ?>
      </select>
      <p>
      <button type="submit">Buscar</button>
    </form>
  </nav>
  
    <?php
    function toTd($txt)
    {
      return "<td>" . $txt . "</td>";
    }

    function reloadInfos()
    {
      include "conexao.php";

      $cargo = $_GET['sltcargo'] ?? "";
      $area = $_GET['sltarea'] ?? "";
      if (empty($cargo)) {
        return;
      }

      $consulta = $connection->query("call sp_searchByCargoArea('$cargo', '$area')");

      if(isset($_GET['sltcargo'])&& isset($_GET['sltarea'])){
        echo '<table <tr>
        <th>Registro</th>
        <th>Nome</th>
        <th>Cargo</th>
        <th>Area</th>
        <th>Salario</th>
        <th>Status</th>
        <th>Alterar</th>
        <th>Excluir</th>
        </tr>';
        while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr>";
          echo toTd($exibe['registro']);
          echo toTd($exibe['nome']);
          echo toTd($exibe['cargo']);
          echo toTd($exibe['area']);
          echo toTd($exibe['salario']);
          echo toTd($exibe['eStatus']);
          echo toTd('<div class = "imagem">
          <a href="alterar.php?cd_alt=$exibe[Registro]"><img src="img/alterar.png">
          </div>');
          echo toTd('
         <div class = "imagem">
         <a href="excluir.php?cd_excluir=$exibe[Registro]"> <img src="img/excluir.png">
          </div>');
         
          echo "</tr>";
        }
      }
      }

  
    reloadInfos();


    ?>
  </table>
</body>

</html>
