<?php
    require_once 'models/Notification.php';

    class NotificationController {
        
        public function indexNotification(){
            $notification = new Notification();

            $nots = $notification->getAll();

            

            $_SESSION['cant'] = $nots;

            
            require_once 'views/notifications/notificationIndex.php';
            
        }

        public function registerNotification(){
            require_once 'views/notifications/registerNotification.php';
        }

        public function saveNotification(){
            if(isset($_POST)){
                $descripcion = $_POST['txtDescripcion'];
                $usuario = $_SESSION['identity']->nombre;

                $notification = New Notification();
                $notification->setDescripcion($descripcion);
                $notification->setUsuario($usuario);

                $noti = $notification->save();

                if($noti) {
                    $_SESSION['completado'] = true;
                    header('Location: '.base_url.'notification/registerNotification');
                } else {
                    echo "Registro fallido";
                    var_dump($notification);
                }
            }
        }

        public function enviarCorreo(){
            
            require_once 'helpers/phpmailer/Exception.php';
            require_once 'helpers/phpmailer/PHPMailer.php';
            require_once 'helpers/phpmailer/SMTP.php';
            
        
            $mail = new PHPMailer(true);
        
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'juandavidbuilesochoa@gmail.com';                     // SMTP username
            $mail->Password   = '1034434433';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom('juandavidbuilesochoa@gmail.com', 'Juancho');
            $mail->addAddress('juandavidbuilesochoa@gmail.com', 'Joe User');     // Add a recipient
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Prueba';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            
        
            $mail->send();
            echo 'El mensaje se envio correctamente';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        }

        public function updateNotification(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $notification = new Notification();
                $notification->setId($id);

                $notification->updateState();
            
            }
        }

        public function getNotis(){
            $notification = new Notification();
            $cant = $notification->getNotifications();

            return $cant;
        }

        public function showRequest(){
            if(isset($_GET['user'])){
                $nombre = $_GET['user'];

                $notification = new Notification();
                $reqs = $notification->notificationRequest($nombre);

                if($reqs){
                    require_once 'views/notifications/showRequests.php';
                } else {
                    echo "Registro Fallido";
                }
                
            }

        }

       
    }?>