<?php
    if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["mensagem"]) && isset($_POST["tipo"])){
        try{
            include("../model/Conexao.php");
            require '../control/PHPMailer/PHPMailerAutoload.php';
            $conexao = new Conexao();
            $conexao->conectar();
            
            $ressite         = $conexao->comando("select nome, email from site");
            $site            = mysql_fetch_array($ressite);

            $email_conteudo  = "Nome:        {$_POST['nome']}<br>";
            $email_conteudo .= "Email:       {$_POST['email']}<br>";
            if(isset($_POST['telefone']) && $_POST['telefone'] != NULL && $_POST['telefone'] != ""){
                $email_conteudo .= "Telefone:    {$_POST['telefone']}<br>";
            }
            $email_conteudo .= "Tipo:        {$_POST['tipo']}<br>";
            $email_conteudo .= "Mensagem:<br>{$_POST['mensagem']}<br>";            

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->Username = "thyagopachernacional@gmail.com";
            $mail->Password = "brasil1602"; 
            $mail->Port = 587;
            $mail->SMTPSecure = "tls";
            $mail->SetFrom($email); // E-mail do remetente
            $mail->FromName = $nome; // Nome do remetente
            $mail->AddAddress($site["email"], $site["nome"]); 
            $mail->SMTPAuth = true; 
            $mail->IsHTML(true);
            $mail->Subject = 'Contato para maiores informações do site - '. $site["nome"];
            $mail->Body    = 'Esta mensagem foi enviada do seu site:<br>'.$email_conteudo;

            if(!$mail->send()) {
                $headers .= "From: {$nome} <{$email}>\n";
                $headers .= "Content-type: text/html; charset=utf-8\n";
                if(!mail($site["email"], $mail->Subject, $mail->Body, $headers)){
                    echo 'Mensagem não pode ser enviada<br>';
                    echo 'Erro ocasionado: ' . $mail->ErrorInfo;
                }else{
                    echo 'Mensagem enviada com sucesso!';
                }
            } else {
                echo 'Mensagem enviada com sucesso!';
            }            
        }catch(Exception $ex){
            echo "Erro ao enviar e-mail causado por: $ex";
        }catch (phpmailerException $ex){
            echo "Erro ao enviar e-mail causado por: $ex";
        }
        //====================================================        
    }else{
        echo "Faltou preencher algum campo!";
    }