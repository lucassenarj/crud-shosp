<?php

/**
 * Classe para controle de pacientes
 *
 * (PHP 5)
 *
 * @author Lucas Sena
  *
 * @version v1.1
 *
 */
class Paciente {

    function __autoload($nome_clase) {
        require_once $nome_class . '.php';
    }

    public function cadPaciente($pdo, $nome, $email, $data_nasc, $status, $endereco, $fk_planos) {
        $val_query = array($nome, $email, $data_nasc, $status, $endereco, $fk_planos);
        $sql = "INSERT INTO pacientes (nome, email, data_nasc, status, endereco, fk_planos) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        if($stmt->execute($val_query)) {
            $msg = 'Paciente cadastrado com sucesso!';
        } else {
            $msg = 'Erro ao cadastrar o paciente!';
        }

        return $msg;
    }

    public function getUltimosPacientes($pdo) {
        $sql = "SELECT * FROM pacientes ORDER BY id_paciente DESC LIMIT 10";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $rs;
    }

    public function getPacientes($pdo) {
        $sql = "SELECT id_paciente as id, nome, email, data_nasc, endereco, status, fk_planos FROM pacientes ORDER BY nome ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $rs;
    }

    public function apagaPaciente($pdo, $id) {
        $val_query = array($id);
        $sql = "DELETE FROM pacientes WHERE id_paciente = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($val_query);
    }

    public function editaPaciente($pdo, $nome, $email, $data_nasc, $status, $endereco, $fk_planos, $id_paciente) {
        $val_query = array($nome, $email, $data_nasc, $status, $endereco, $fk_planos, $id_paciente);
        $sql = "UPDATE pacientes SET nome = ?, email = ?, data_nasc = ?, status = ?, endereco = ?, fk_planos = ? WHERE id_paciente = ?";
        $stmt = $pdo->prepare($sql);

        if($stmt->execute($val_query)) {
            $msg = 'Plano de Saúde editado com sucesso!';
        } else {
            $msg = 'Erro ao editar o plano de saúde!';
        }

        return $msg;
    }

    public function getDadosPaciente($pdo, $id) {
        $val_query = array($id);
        $sql = "SELECT id_paciente as id, nome, email, data_nasc, endereco, fk_planos, status FROM pacientes WHERE id_paciente = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($val_query);
        $rs = $stmt->fetch(PDO::FETCH_OBJ);

        return $rs;
    }

}
