<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Alteração de registros</title>
        <?php
            include 'conexao.php';
            $cd = $_GET['cd_alt'];
            $consultaCargo = $cn->query("SELECT cargo from tbl_empregos where registro='$cd' union SELECT cargo FROM tbl_empregos where registro!='$cd'");
            $consultaArea = $cn->query("SELECT area FROM tbl_empregos where registro='$cd' union SELECT area FROM tbl_empregos where registro!='$cd'");
            $consultaCampos = $cn->query("SELECT * FROM tbl_empregos where registro='$cd'"); 
            $exibeCampos = $consultaCampos->fetch (PDO:: FETCH_ASSOC);
            ?>
    </head>
    <body>
        <form name="alterar" action="update.php" method="post">
            <fieldset>
                <div>
                    <label for="registro">Registro</label>
                    <input type="text" id="nome" name="txtRegistro" readonly value="<?php echo 
                        $exibeCampos['Registro']; ?>">
                </div>
                <div>
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="txtnome" value="<?php echo 
                        $exibeCampos['Nome']; ?>">
                </div>
                <div>
                    <label for="cargo">Cargo</label>
                    <select name="sltcargo" id="cargo" name="txtcargo">
                        <?php
                            while($exibecargo = $consultaCargo->fetch(PDO::FETCH_ASSOC)){
                            ?>
                        <option value="<?php echo $exibecargo['cargo'];?>">
                            <?php echo $exibecargo['cargo'];?>
                            <?php }?>
                        </option>
                    </select>
                </div>
                <div>
                    <label for="area">Area</label>
                    <select name="sltarea" id="cargo" name="txtcargo">
                        <?php
                            while($exibeArea = $consultaArea->fetch(PDO::FETCH_ASSOC)){
                            ?>
                        <option value="<?php echo $exibeArea['area'];?>">
                            <?php echo $exibeArea['area'];?>
                            <?php }?>
                    </select>
                </div>
                <div>
                    <label for="salario">Salário</label>
                    <input type="text" id="salario" name="txtSalario" name="txtSalario" value="<?php echo 
                        $exibeCampos['Salario']; ?>">
                </div>
                <div>
                    <label>Status</label>
                    <label>
                        <?php if($exibeCampos['Status'] == "Ativo") {?>
                        <input type="radio" name="rdbStatus" value="Ativo" checked>Ativo
                    </label>
                    <label>
                        <input type="radio" name="rdbStatus" value="Inativo">Inativo </label>
                        <?php } else {?>
                        <input type="radio" name="rdbStatus" value="Ativo">Ativo
                    </label>
                    <label>
                        <input type="radio" name="rdbStatus" value="Inativo" checked>Inativo </label>
                    </label>
                    <?php }?>
                </div>
                <button type="submit" name="submit">Alterar</button> 
            </fieldset>
        </form>
    </body>
</html>