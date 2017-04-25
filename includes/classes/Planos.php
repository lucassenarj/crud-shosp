<?php

/**
 * Classe para controle de Plano de Saude
 *
 * (PHP 5)
 *
 * @author Lucas Sena
  *
 * @version v1.1
 *
 */
class Planos {

    function __autoload($nome_clase) {
        require_once $nome_class . '.php';
    }


    public function getUltimosPlanos($pdo) {
        $sql = "SELECT id_planos as id, nome, registroans, cnpj, status FROM planos ORDER BY id DESC LIMIT 10";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $rs;
    }

    public function getPlanos($pdo) {
        $sql = "SELECT id_planos as id, nome, registroans, cnpj, status FROM planos ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $rs;
    }

    public function getPlanosAtivos($pdo) {
        $sql = "SELECT id_planos as id, nome, registroans, cnpj, status FROM planos WHERE status = 1 ORDER BY nome ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $rs;
    }

    public function getDadosPlano($pdo, $id) {
        $val_query = array($id);
        $sql = "SELECT id_planos as id, nome, registroans, cnpj, status FROM planos WHERE id_planos = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($val_query);
        $rs = $stmt->fetch(PDO::FETCH_OBJ);

        return $rs;
    }

    public function cadPlano($pdo, $nome, $registroans, $cnpj, $status) {
        $val_query = array($nome, $registroans, $cnpj, $status);
        $sql = "INSERT INTO planos (nome, registroans, cnpj, status) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        if($stmt->execute($val_query)) {
            $msg = 'Plano de Saúde cadastrado com sucesso!';
        } else {
            $msg = 'Erro ao cadastrar o plano de saúde!';
        }

        return $msg;
    }

    public function apagaPlano($pdo, $id) {
        $val_query = array($id);
        $sql = "DELETE FROM planos WHERE id_planos = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($val_query);
    }

    public function editaPlano($pdo, $nome, $registroans, $cnpj, $status, $id) {
        $val_query = array($nome, $registroans, $cnpj, $status, $id);
        $sql = "UPDATE planos SET nome = ?, registroans = ?, cnpj = ?, status = ? WHERE id_planos = ?";
        $stmt = $pdo->prepare($sql);

        if($stmt->execute($val_query)) {
            $msg = 'Plano de Saúde editado com sucesso!';
        } else {
            $msg = 'Erro ao editar o plano de saúde!';
        }

        return $msg;
    }

}
