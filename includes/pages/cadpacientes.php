<?php include ('header.php');
$planos = $dadosPlanos->getPlanosAtivos($pdo);
if(isset($_POST['submit'])) {
    $nome       = $_POST['nome'];
    $email      = $_POST['email'];
    $data_nasc  = $_POST['data_nasc'];
    $endereco   = $_POST['endereco'];
    $fk_planos  = $_POST['fk_planos'];
    if(empty($_POST['status'])){
        $status = 0;
    } else {
        $status = 1;
    }


    $cadastrar = $dadosPaciente->cadPaciente($pdo, $nome, $email, $data_nasc, $status, $endereco, $fk_planos);

    if($cadastrar) {
        echo '<script>window.alert("Paciente cadastrado com sucesso!");</script>';
    } else {
        echo '<script>window.alert("Erro ao cadastrar o paciente");</script>';
    }
}
?>
<div class="container">
    <div class="row">
        <h1>Cadastro de Pacientes</h1>

        <?php if(empty($planos)) {
            echo '<h3>Não é possível cadastrar um paciênte sem ter nenhum plano de saúde cadastrado.</h3>';
        } else { ?>

            <form class="form-horizontal" method="post" action="index.php?act=cadastrapacientes">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nome">Nome: *</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nome" id="nome"  maxlength="50" placeholder="Nome" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email: *</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" maxlength="30" placeholder="email@email.com" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="data_nasc">Data de Nascimento: *</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="data_nasc" id="data_nasc" maxlength="20" placeholder="99/99/9999" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="endereco">Endereço: *</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="endereco" id="endereco" maxlength="50" placeholder="Endereço" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="status">Status:</label>
                    <div class="col-md-4">
                        <input type="checkbox" id="status" name="status" value="1"> Ativo
                    </div>

                    <label class="control-label col-sm-2" for="fk_planos">Plano de Saúde: *</label>
                    <div class="col-md-4">
                        <select class="form-control" name="fk_planos" id="fk_planos" required>
                            <?php
                                foreach ($planos as $plano) {
                                    echo '<option value="'.$plano->id.'">'.$plano->nome.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="submit" class="btn btn-info">Cadastrar</button>

                        <button type="reset" class="btn btn-warning">Cancelar</button>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>

<?php include ('footer.php'); ?>
