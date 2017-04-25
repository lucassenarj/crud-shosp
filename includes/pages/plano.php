<?php include ('header.php');
$idplano = $_GET['id'];

$plano = $dadosPlanos->getDadosPlano($pdo, $idplano);

if(isset($_POST['submit'])) {
    $nome           = $_POST['nome'];
    $registroans    = $_POST['ans'];
    $cnpj           = $_POST['cnpj'];
    if(empty($_POST['status'])){
        $status = 0;
    } else {
        $status = 1;
    }


    $cadastrar = $dadosPlanos->editaPlano($pdo, $nome, $registroans, $cnpj, $status, $idplano);

    if($cadastrar) {
        echo '<script>window.alert("Plano de Saúde editado com sucesso!"); location.href="index.php?act=planos";</script>';
    } else {
        echo '<script>window.alert("Erro ao editar o plano de saúde!");</script>';
    }
}

?>
<div class="container">
    <div class="row">
        <h1><?php echo $plano->nome; ?></h1>

        <form class="form-horizontal" method="post" action="index.php?act=plano&id=<?php echo $idplano; ?>">
            <div class="form-group">
                <label class="control-label col-sm-2" for="nome">Nome:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nome" id="nome"  maxlength="50" value="<?php echo $plano->nome; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="ans">Registro ANS:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ans" id="ans" maxlength="20" value="<?php echo $plano->registroans; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="cnpj">CNPJ:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cnpj" id="cnpj" maxlength="20" value="<?php echo $plano->cnpj; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="status">Status:</label>
                <div class="col-md-10">
                    <input type="checkbox" id="status" name="status" value="1" <?php if($plano->status == 1) {echo "checked";} ?>> Ativo
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-info">Editar</button>

                    <button type="reset" class="btn btn-warning">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include ('footer.php'); ?>
