
    <?php
     include 'conexao.php';
    $cd = $_GET['cd_excluir'];
    $removerlinha=$cn -> query("delete from tbl_empregos where registro='$cd'");
    header("location:pesquisa.php"); ?>
