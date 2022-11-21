<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Registros</title>
        <?php
        Include 'conexao.php';
        $cd = $_GET['cd_altera'];

            $consultaCargo = $cn->query("select cargo from tbl_emprego where registro='$cd' union 
            select cargo from tbl_emprego where registro!='$cd'");

            $consultaArea = $cn->query("select area from tbl_emprego where registro='$cd' union 
            select area from tbl_emprego where registro!='$cd'");

            $consultaCampos = $cn->query("select * from tbl_emprego where registro='$cd'");
            $exibeCampos = $consultaCampos->fetch(PDO::FETCH_ASSOC);
        ?>
</head>
<body>
    <form name="" action="update.php" method="post">
    <fieldset>
        <div>
           <label for="registro">Registro</label>
           <input type="text" id="nome" name="txtRegistro" readonly value="<?php echo
           $exibeCampos['registro']; ?>">
        </div>  
        <div>
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="txtnome" value="<?php echo
           $exibeCampos['nome']; ?>">
        </div>
        <div>
           <label for="cargo">Cargo</label>
           <select name="sltcargo" id="cargo">
               <?php
                    while($exibecargo = $consultaCargo->fetch(PDO::FETCH_ASSOC)){
                ?>
                    <option value="<?php echo $exibecargo['cargo']; ?>">"><?php echo 
                    $exibecargo['cargo'];?></option>;            
                <?php } ?>
           </select>   
        </div>
        <div>
           <label for="area">Area</label>
           <select name="sltarea" id="cargo">
                <?php
                    while($exibearea = $consultaArea->fetch(PDO::FETCH_ASSOC)){
                ?>
                    <option value="<?php echo $exibearea['area']; ?>">"><?php echo 
                    $exibearea['area'];?></option>;            
                <?php } ?>
           </select>   
        </div>
        <div>
            <label for="salario">Salário</label>
            <input type="text" id="salario" name="txtSalario" value="<?php echo
           $exibeCampos['salario']; ?>">>
        </div>
        <div>
            <label>Status</label>
            <label>
                <?php if($exibeCampos['status'] == "Ativo") { ?>
                <input type="radio" name="rdbStatus" value="Ativo">Ativo
            </label>
            <label>
                <input type="radio" name="rdbStatus" value="Inativo">Inativo
            </label>  
            <?php } else { ?>
                <input type="radio" name="rdbStatus" value="Ativo">Ativo
            </label>
            <label>
                <input type="radio" name="rdbStatus" value="Inativo">Inativo
            </label>
            <?php } ?> 
        </div>
        <button type="submit" name="submit">Alterar</button>
    </fieldset>
</form>    
</body>
</html>