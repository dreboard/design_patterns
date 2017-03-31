<?php
namespace Design_Patterns\Strategy;

/**
 * @package Design_Patterns\Strategy
 */

class EmailLogger implements Logger
{

    /**
     * Send logging message as an email
     *
     * @param string $data
     * @return mixed|void
     */
    public function log($data)
    {
        try {
            $to      = 'Admin <nobody@example.com>';
            $subject = 'Site Log';
            $message = $data;
            $headers = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            //mail($to, $subject, $message, $headers);
        } catch (Exception $e){
            error_log($e->getMessage());
        }
    }
}