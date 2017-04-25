<?php include ('header.php'); ?>

    <div class="container">
        <div class="row">
            <h1>Bem vindo!</h1>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Últimos 10 Pacientes Cadastrados</h3>
                    </div>
                    <div class="panel-body">
                        <ul>

                            <?php
                            $pacientesAtivos = $dadosPaciente->getUltimosPacientes($pdo);
                            if(!empty($pacientesAtivos)) {
                                foreach ($pacientesAtivos as $paciente) {
                                    echo '<li><a href="index.php?act=paciente&id='.$paciente->id_paciente.'">'.$paciente->nome. '</a></li>';
                                }
                            } else {
                                echo '<li>Nenhum paciente cadastrado</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <h4><a href="index.php?act=pacientes" title="Pacientes Cadastrados">Ver todos os pacientes cadastrados</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Últimos 10 Planos Cadastrados</h3>
                    </div>
                    <div class="panel-body">
                        <ul>

                            <?php
                                $planosAtivos = $dadosPlanos->getUltimosPlanos($pdo);
                                if(!empty($planosAtivos)) {
                                    foreach ($planosAtivos as $plano) {
                                        echo '<li><a href="index.php?act=plano&id='.$plano->id.'">'.$plano->nome. '</a></li>';
                                    }
                                } else {
                                    echo 'Nenhum plano cadastrado';
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <h4><a href="index.php?act=planos" title="Planos Cadastrados">Ver todos os planos cadastrados</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include ('footer.php'); ?>