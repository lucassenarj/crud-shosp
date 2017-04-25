<?php include('header.php'); ?>
<div class="container">
    <div class="row">
        <h1>Todos os Pacientes Cadastrados</h1>

        <table class="table table-bordered">
            <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Nascimento</th>
            <th>Endereço</th>
            <th>Plano</th>
            <th>Status</th>
            <th>Ações</th>
            </thead>
            <?php
            $pacientes = $dadosPaciente->getPacientes($pdo);
            if(empty($pacientes)) {
                echo '<tr><td colspan="6">Não há pacientes cadastrados!</td></tr>';
            } else {
                foreach ($pacientes as $paciente) {
                    $plano = $dadosPlanos->getDadosPlano($pdo, $paciente->fk_planos);
                    if($paciente->status == 1) {
                        $status = "Ativo";
                        $class  = "success";
                    } else {
                        $status = "Inativo";
                        $class  = "danger";
                    }
                    ?>
                    <tr class="<?php echo $class; ?>">
                        <td><?php echo $paciente->nome; ?></td>
                        <td><?php echo $paciente->email; ?></td>
                        <td><?php echo $paciente->data_nasc; ?></td>
                        <td><?php echo $paciente->endereco; ?></td>
                        <td><a href="index.php?act=plano&id=<?php echo $plano->id; ?>"><?php echo $plano->nome; ?></a></td>
                        <td><?php echo $status; ?></td>
                        <td><a href="index.php?act=paciente&id=<?php echo $paciente->id; ?>" title="Editar"><span class="glyphicon glyphicon-edit"></span></a> | <a href="index.php?act=apagapaciente&id=<?php echo $paciente->id; ?>" title="Apagar"><span class="glyphicon glyphicon-trash"></span>
                            </a></td>
                    </tr>
                    <?php
                }
            }

            ?>
        </table>
    </div>
</div>
<?php include('footer.php'); ?>
