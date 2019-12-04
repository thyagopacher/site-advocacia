<?php
    if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["mensagem"]) && isset($_POST["cargo"])){
        try{
            include("../model/Conexao.php");
            require '../../control/PHPMailer/PHPMailerAutoload.php';
            $conexao = new Conexao();
            $conexao->conectar();
            
            $ressite         = $conexao->comando("select nome, email from site");
            $site            = mysql_fetch_array($ressite);

            $email_conteudo  = "Nome:        {$_POST['nome']}<br>";
            $email_conteudo .= "Email:       {$_POST['email']}<br>";
            if(isset($_POST['telefone']) && $_POST['telefone'] != NULL && $_POST['telefone'] != ""){
                $email_conteudo .= "Telefone:    {$_POST['telefone']}<br>";
            }
            $email_conteudo .= "Cargo:        {$_POST['cargo']}<br>";
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
            $mail->Body    = 'Esta mensagem foi enviada do seu site, para o trabalhe conosco curriculo segue em anexo:<br>'.$email_conteudo;

            if(!$mail->send()) {
                //anexando arquivo com PHP para função mail
                $arquivo = isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : FALSE;
                if(file_exists($arquivo["tmp_name"]) and !empty($arquivo)){
                    $fp = fopen($_FILES["arquivo"]["tmp_name"],"rb");
                    $anexo = fread($fp,filesize($_FILES["arquivo"]["tmp_name"])); 
                    $anexo = base64_encode($anexo); 
                    fclose($fp);
                    $anexo = chunk_split($anexo); 
                    $boundary = "XYZ-" . date("dmYis") . "-ZYX"; 
                    $mens = "--$boundary\n";
                    $mens .= "Content-Transfer-Encoding: 8bits\n";
                    $mens .= "Content-Type: text/html; charset=\"ISO-8859-1\"\n\n"; //plain
                    $mens .= "{$email_conteudo}\n";
                    $mens .= "--$boundary\n";
                    $mens .= "Content-Type: ".$arquivo["type"]."\n"; 
                    $mens .= "Content-Disposition: attachment; filename=\"".$arquivo["name"]."\"\n"; 
                    $mens .= "Content-Transfer-Encoding: base64\n\n"; 
                    $mens .= "$anexo\n"; 
                    $mens .= "--$boundary--\r\n"; 
                    $headers = "MIME-Version: 1.0\n"; 
                    $headers .= "From: \"$nome\" <$email_from>\r\n"; 
                    $headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n"; 
                    $headers .= "$boundary\n";
                    $mail->Body = $mens;
                }else{
                    $headers .= "From: {$nome} <{$email}>\n";
                    $headers .= "Content-type: text/html; charset=utf-8\n";
                }
                if(!mail($site["email"], $mail->Subject, $mail->Body, $headers)){
                    echo '<script>alert("Mensagem não pode ser enviada! Por causa de: ',$mail->ErrorInfo,'")</script>';
                    echo '<script>window.history.go(-1);</script>';
                }else{
                    echo '<script>alert("Mensagem enviada com sucesso!")</script>';
                    echo '<script>window.history.go(-1);</script>';
                }
            } else {
                echo '<script>alert("Mensagem enviada com sucesso!")</script>';
                echo '<script>window.history.go(-1);</script>';
            }            
        }catch(Exception $ex){
            echo '<script>alert("Mensagem não pode ser enviada! Por causa de: ',$ex,'")</script>';
            echo '<script>window.history.go(-1);</script>';
        }catch (phpmailerException $ex){
            echo '<script>alert("Mensagem não pode ser enviada! Por causa de: ',$ex,'")</script>';
            echo '<script>window.history.go(-1);</script>';
        }
        //====================================================        
    }else{
        echo '<script>alert("Faltou preencher algum campo, por favor verifique!")</script>';
        echo '<script>window.history.go(-1);</script>';
    }