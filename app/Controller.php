<?php

namespace app;

use PHPMailer\PHPMailer\PHPMailer;

class Controller
{

    protected $viewsPath;
    protected $template;
    protected $message = [];

    protected function render(string $view, array  $variables = [])
    {
        ob_start();
        extract($variables);
        $this->viewsPath= _ROOT.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR;
        $current_view   = $this->viewsPath.str_replace('.',DIRECTORY_SEPARATOR,$view).'.php';
        if (!file_exists($current_view)) {
            $this->notFound();
        }
        require $current_view;
        $content        = ob_get_clean();
        require_once($this->viewsPath. 'template' . DIRECTORY_SEPARATOR . $this->template.'.php');
    }

    /**
     * @brief Allows us to send message "minimum"
     * @param string $to
     * @param string $ToName
     * @param string $from
     * @param string $subject
     * @param string $message
     * @throws \PHPMailer\PHPMailer\Exception
     */
    protected function sendEmail(string $to,string $ToName,string $from, string $subject, string $message) {

        $mail = new PHPMailer();
        $mail->setFrom($from);
        $mail->FromName = "SPRINTO";
        $response = false;

        $mail->addAddress($to, $ToName);

        $mail->addReplyTo($from, "SPRINTO");

        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body = "<i>{$message}</i>";
        $mail->AltBody = "This is the plain text version of the email content";
        //TODO message to return
        $message = "";
        try {
            $mail->send();
            $this->message["message"]="Message has been sent successfully";
            $this->message["class"]="success";
            $response = true;
        } catch (Exception $e) {
            $this->message["message"]   = "Erreur lors d'envoi de mail : " . $mail->ErrorInfo;
            $this->message["class"]     ="danger";
        }

        return $response;
    }

    protected function redirect(string $url)
    {
        header("location:{$url}");
        exit(0);
    }

    protected function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        $message="Forbidden to access this page.";
        $this->render('error.404',compact('message'));
        exit(0);
    }

    protected function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        $message = "Page Not Found";
        $this->render('error.404',compact('message'));
        exit(0);
    }

}