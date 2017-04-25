<?php include ('header.php');
if(isset($_POST['submit'])) {
    $nome           = $_POST['nome'];
    $registroans    = $_POST['ans'];
    $cnpj           = $_POST['cnpj'];
    if(empty($_POST['status'])){
        $status = 0;
    } else {
        $status = 1;
    }


    $cadastrar = $dadosPlanos->cadPlano($pdo, $nome, $registroans, $cnpj, $status);

    if($cadastrar) {
        echo '<script>window.alert("Plano de Saúde cadastrado com sucesso!");</script>';
    } else {
        echo '<script>window.alert("Erro ao cadastrar o plano de saúde!");</script>';
    }
}
?>
<div class="container">
    <div class="row">
        <h1>Cadastro de Plano de Saúde</h1>

        <form class="form-horizontal" method="post" action="index.php?act=cadastrarplanos">
            <div class="form-group">
                <label class="control-label col-sm-2" for="nome">Nome:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nome" id="nome"  maxlength="50" placeholder="Razão Social">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="ans">Registro ANS:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ans" id="ans" maxlength="20" placeholder="Registro ANS">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="cnpj">CNPJ:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cnpj" id="cnpj" maxlength="20" placeholder="CNPJ">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="status">Status:</label>
                <div class="col-md-10">
                    <input type="checkbox" id="status" name="status" value="1"> Ativo
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-info">Cadastrar</button>

                    <button type="reset" class="btn btn-warning">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include ('footer.php'); ?>
