<?php
    include 'conexao.php';
    require "lib/vendor/autoload.php";

    // biblioteca PHPmailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
                
    // define o horario local
    date_default_timezone_set('America/Sao_Paulo');

    $conexao = new Conexao();
    $conn = $conexao->Conectar();

    // recebe dados por $POST
    $status_mensalidade_atualizado = $_POST['status_pagamento'];
    $id_mensalidade = $_POST['id_mensalidade'];
    $id_aluno = $_POST['id_aluno'];
    $nome_aluno = $_POST['nome_aluno'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];
    $endereco_salva = ""; 
    $endereco_pasta = ''; 

    // echo '<pre>';
    //     print_r($_FILES);
    // echo '</pre>';
    // echo $_FILES['comprovante']['name'] . '</br>';


        if (!empty($_FILES) || $id_aluno == ' ') {

            if ($_FILES['comprovante']['type'] == 'application/pdf' || 
                $_FILES['comprovante']['type'] == 'image/jpg' || 
                $_FILES['comprovante']['type'] == 'image/jpeg') 
            {
                $_FILES['comprovante']['name'] = $id_mensalidade . $id_aluno . date('dmyHis');
    
                $nome_comprovante = $_FILES['comprovante']['type'];
                $nome_comprovante_separado = explode('/', $nome_comprovante);
        
                $endereco_pasta = $_FILES['comprovante']['name'] . ".". $nome_comprovante_separado[1];
                $endereco_salva = "../comprovantes";
    
                move_uploaded_file($_FILES['comprovante']['tmp_name'], "$endereco_salva/$endereco_pasta");
    
                // echo '</br>' . $endereco_salva;
                if (empty($status_mensalidade_atualizado) || empty($id_aluno) || empty($id_mensalidade)){
    
                    header("Location: ../Alunos.php");
            
                } else {
            
                // Query para atualizar os dados no DB
                    $query = "UPDATE mensalidades
                            SET status_pagamento = :status_pagamento, comprovante_pagamento = :comprovante_pagamento
                            WHERE id_mensalidade = :id_mensalidade;";
            
                    
                    $stmt = $conn->prepare($query);
                    $stmt->bindValue(':status_pagamento', $status_mensalidade_atualizado);
                    $stmt->bindValue(':comprovante_pagamento', $endereco_pasta);
                    $stmt->bindValue(':id_mensalidade', $id_mensalidade);
            
                    $stmt->execute();
                    
                    // Para fins de debug
                    // echo $status_mensalidade_atualizado . "</br>"; 
                    // echo $id_mensalidade . "</br>";
    
                    // Enviar email com as informações usando o PHPMailer
                    // instancia o objeto e-mail
                    $mail = new PHPMailer(true);
    
                    try {
                        //Server settings
                        $mail->SMTPDebug = false;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'garanhunscaruaruhbpay@gmail.com';                     //SMTP username
                        $mail->Password   = 'cctgqatddqgclbau';                               //SMTP password
                        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                        $mail->CharSet = 'UTF-8';
                    
                        //Recipients
                        $mail->setFrom('garanhunscaruaruhbpay@gmail.com', 'naoresponda');
                        $mail->addAddress('luannogueira093@gmail.com');     //Add a recipient
                        //$mail->addAddress('ellen@example.com');               //Name is optional
                        //$mail->addReplyTo('info@example.com', 'Information');
                        //$mail->addCC('cc@example.com');
                        //$mail->addBCC('bcc@example.com');
                    
                        //Attachments
                        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                    
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = "Pagamento Realizado pelo aluno(a): $nome_aluno";
                        $mail->Body    = "O pagamento foi realizado pelo aluno(a): <b>$nome_aluno</b> referente ao mês de $mes de $ano !</br> 
                                         <p>Para consultar o comprovante de pagamento anexado, acesse o portal administrativo: <a href='http://localhost/portal-madruga/FinancasAluno.php?id=$id_aluno'>Portal Fábio Madruga Concursos</a></p></br>
                                         <p>Confira o pagamento no seu extrato bancário em <b>caso de transferência eletrônica<b></p>";
                        $mail->AltBody = 'Use um cliente que suporte HTML para ver a mensagem do e-mail';
                    
                        $mail->send();
    
                        //echo 'Enviado com Sucesso!';
    
    
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
    
                }
                    header("Location: ../FinancasAluno.php?id=" . $id_aluno); 
    
            } else {
    
                header("Location: ../index.php?usuario=negado");
            }
    
    
            
        }

    

    
?>