<?php include('header.php'); ?>
    <div class="container">
        <div class="row">
            <h1>Todos os planos cadastrados</h1>

            <table class="table table-bordered">
                <thead>
                    <th>Nome</th>
                    <th>Registro ANS</th>
                    <th>CNPJ</th>
                    <th>Status</th>
                    <th>Ações</th>
                </thead>
                <?php
                    $planos = $dadosPlanos->getPlanos($pdo);
                    if(empty($planos)) {
                        echo '<tr><td colspan="5">Não há planos cadastrados!</td></tr>';
                    } else {
                        foreach ($planos as $plano) {
                            if($plano->status == 1) {
                                $status = "Ativo";
                                $class  = "success";
                            } else {
                                $status = "Inativo";
                                $class  = "danger";
                            }
                            ?>
                            <tr class="<?php echo $class; ?>">
                                <td><?php echo $plano->nome; ?></td>
                                <td><?php echo $plano->registroans; ?></td>
                                <td><?php echo $plano->cnpj; ?></td>
                                <td><?php echo $status; ?></td>
                                <td><a href="index.php?act=plano&id=<?php echo $plano->id; ?>" title="Editar"><span class="glyphicon glyphicon-edit"></span></a> | <a href="index.php?act=apagaplano&id=<?php echo $plano->id; ?>" title="Apagar"><span class="glyphicon glyphicon-trash"></span>
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
