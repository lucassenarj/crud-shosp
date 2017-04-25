<?php include ('header.php');
$id = $_GET['id'];

$paciente   = $dadosPaciente->getDadosPaciente($pdo, $id);
$planos     = $dadosPlanos->getPlanosAtivos($pdo);

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


    $edita = $dadosPaciente->editaPaciente($pdo, $nome, $email, $data_nasc, $status, $endereco, $fk_planos, $id);

    if($edita) {
        echo '<script>window.alert("Paciente editado com sucesso!"); location.href="index.php?act=pacientes";</script>';
    } else {
        echo '<script>window.alert("Erro ao editar o paciente!");</script>';
    }
}

?>
<div class="container">
    <div class="row">
        <h1><?php echo $paciente->nome; ?></h1>

        <form class="form-horizontal" method="post" action="index.php?act=paciente&id=<?php echo $id; ?>">
            <div class="form-group">
                <label class="control-label col-sm-2" for="nome">Nome: *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nome" id="nome"  maxlength="50" value="<?php echo $paciente->nome; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email: *</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" maxlength="30" value="<?php echo $paciente->email; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="data_nasc">Data de Nascimento: *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="data_nasc" id="data_nasc" maxlength="20" value="<?php echo $paciente->data_nasc; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="endereco">Endereço: *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="endereco" id="endereco" maxlength="50" value="<?php echo $paciente->endereco; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="status">Status:</label>
                <div class="col-md-4">
                    <input type="checkbox" id="status" name="status" value="1" <?php if($paciente->status == 1) {echo "checked";} ?>> Ativo
                </div>

                <label class="control-label col-sm-2" for="fk_planos">Plano de Saúde: *</label>
                <div class="col-md-4">
                    <select class="form-control" name="fk_planos" id="fk_planos" required>
                        <?php
                        foreach ($planos as $plano) {
                            if($plano->id == $paciente->fk_planos) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                            echo '<option '.$selected.' value="'.$plano->id.'">'.$plano->nome.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-info">Editar Paciente</button>

                    <button type="reset" class="btn btn-warning">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include ('footer.php'); ?>
