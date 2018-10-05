<?php
namespace Indeed\Ihc;

class Ajax
{
    public function __construct()
    {
      add_action('wp_ajax_ihc_admin_send_email_popup', array($this, 'ihc_admin_send_email_popup') );
      add_action('wp_ajax_ihc_admin_do_send_email', array($this, 'ihc_admin_do_send_email') );
    }

    public function ihc_admin_send_email_popup()
    {
        $uid = empty($_POST['uid']) ? 0 : esc_sql($_POST['uid']);
        if (empty($uid)){
            die;
        }
        $toEmail = \Ihc_Db::get_user_col_value($uid, 'user_email');
        if (empty($toEmail)){
            die;
        }
        $fromEmail = '';
        $fromEmail = get_option('ihc_notifications_from_email_addr');
        if (empty($fromEmail)){
            $fromEmail = get_option('admin_email');
        }
        $view = new \Indeed\Ihc\IndeedView();
        $view->setTemplate(IHC_PATH . 'admin/includes/tabs/send_email_popup.php');
        $view->setContentData([
                                'toEmail' 		=> $toEmail,
                                'fromEmail' 	=> $fromEmail,
                                'fullName'		=> \Ihc_Db::getUserFulltName($uid),
                                'website'			=> get_option('blogname')
        ], true);
        echo $view->getOutput();
        die;
    }

    public function ihc_admin_do_send_email()
    {

        $to = empty($_POST['to']) ? '' : esc_sql($_POST['to']);
        $from = empty($_POST['from']) ? '' : esc_sql($_POST['from']);
        $subject = empty($_POST['subject']) ? '' : esc_sql($_POST['subject']);
        $message = empty($_POST['message']) ? '' : esc_sql($_POST['message']);
        $headers = [];

        if (empty($to) || empty($from) || empty($subject) || empty($message)){
            die;
        }

        $from_name = get_option('ihc_notifications_from_name');
        $from_name = stripslashes($from_name);
        if (!empty($from) && !empty($from_name)){
          $headers[] = "From: $from_name <$from>";
        }
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $sent = wp_mail($to, $subject, $message, $headers);
        echo $sent;
        die;
    }

}
