<?php

    try{
        $conexao = new SQLite3(__DIR__ .'bancoT.db');

        $verificaTabelaUsuarios = $conexao->query("SELECT name FROM sqlite_master WHERE type='table' AND name='usuarios'");

        if (!$verificaTabelaUsuarios->fetchArray(SQLITE3_ASSOC)) {

               $conexao->exec('create table usuarios( 
               id integer primary key, email text, password text)');

                $conexao->exec("insert into usuarios(
                    email,
                    password
                )values('adm@gmail.com','123456')");
        }

        $verificaTabelaHospedes = $conexao->query("SELECT name FROM sqlite_master WHERE type='table' AND name='hospedes'");

        if (!$verificaTabelaHospedes->fetchArray(SQLITE3_ASSOC)) {

               $conexao->exec('create table hospedes( 
               idhospedes integer primary key, cpf text,nome text, email text, telefone text)');
        }

        $verificaTabelaPlanos = $conexao->query("SELECT name FROM sqlite_master WHERE type='table' AND name='planos'");

        if (!$verificaTabelaPlanos->fetchArray(SQLITE3_ASSOC)) {

            $conexao->exec('create table planos( 
            id integer primary key,
            nome text, 
            quantidadeCamaCasal int, 
            quantidadeCamaSolteiro int, 
            valor decimal,
            cafe bool, 
            openBar bool, 
            openFood bool, 
            frigoBar bool, 
            tvAhCabo bool)');
        }

        $verificaTabelaHospedagem = $conexao->query("SELECT name FROM sqlite_master WHERE type='table' AND name='hospedagem'");

        if (!$verificaTabelaHospedagem->fetchArray(SQLITE3_ASSOC)) {

            $conexao->exec('create table hospedagem( 
            id integer primary key,
            idhospede text, 
            quarto int, 
            idplano int, 
            valor decimal,
            cafe bool, 
            openBar bool, 
            openFood bool, 
            frigoBar bool, 
            tvAhCabo bool,
            formapagamento text)');
        }

        $verificaTabelaQuartos = $conexao->query("SELECT name FROM sqlite_master WHERE type='table' AND name='quartos'");

        if (!$verificaTabelaQuartos->fetchArray(SQLITE3_ASSOC)) {

            $conexao->exec('create table quartos( 
            id integer primary key,
            nome text, 
            situacao bool)');

            $conexao->exec("INSERT INTO quartos (nome, situacao) VALUES
            ('Apartamento 101', 1),
            ('Apartamento 102', 1),
            ('Apartamento 103', 1),
            ('Apartamento 104', 1),
            ('Apartamento 201', 1),
            ('Apartamento 202', 1),
            ('Apartamento 203', 1),
            ('Apartamento 204', 1),
            ('Apartamento 301', 1),
            ('Apartamento 302', 1),
            ('Apartamento 303', 1),
            ('Apartamento 304', 1);");
        }


        //    $conexao->exec('create table hospedes( 
        //    idhospedes integer primary key, cpf text,nome text, email text, telefone text)');

        //    $conexao->exec('create table usuarios( 
        //    id integer primary key, email text, password text)');

        // $conexao->exec('create table planos( 
        // id integer primary key,
        // nome text, 
        // quantidadeCamaCasal int, 
        // quantidadeCamaSolteiro int, 
        // valor decimal,
        // cafe bool, 
        // openBar bool, 
        // openFood bool, 
        // frigoBar bool, 
        // tvAhCabo bool)');

        // $conexao->exec('create table hospedagem( 
        // id integer primary key,
        // idhospede text, 
        // quarto int, 
        // idplano int, 
        // valor decimal,
        // cafe bool, 
        // openBar bool, 
        // openFood bool, 
        // frigoBar bool, 
        // tvAhCabo bool,
        // formapagamento text)');
        
        // $conexao->exec("insert into usuarios(
        //     email,
        //     password
        // )values('adm@gmail.com','123456')");

        // $conexao->exec('create table quartos( 
        // id integer primary key,
        // nome text, 
        // situacao bool)');

        

        // $conexao->exec("INSERT INTO quartos (nome, situacao) VALUES
        // ('Apartamento 101', 1),
        // ('Apartamento 102', 1),
        // ('Apartamento 103', 1),
        // ('Apartamento 104', 1),
        // ('Apartamento 201', 1),
        // ('Apartamento 202', 1),
        // ('Apartamento 203', 1),
        // ('Apartamento 204', 1),
        // ('Apartamento 301', 1),
        // ('Apartamento 302', 1),
        // ('Apartamento 303', 1),
        // ('Apartamento 304', 1);");
 
        // $conexao->exec("insert into hospedes(
        //     cpf,
        //     nome,
        //     email,
        //     telefone
        //     )values('06967327186','João Vitor','joao@gmail.com','67991508581')");

        //     $conexao->exec("insert into hospedes(
        //         cpf,
        //         nome,
        //         email,
        //         telefone
        //         )values('09756896942','Jose','jose@gmail.com','67991506666')");


       


        

        //$conexao->exec('drop table hospedagem');
    }
        catch(PDOException $e){
    }
?>