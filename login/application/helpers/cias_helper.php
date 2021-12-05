<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * This function is used to print the content of any data
 */
function pre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

/**
 * This function used to get the CI instance
 */
if(!function_exists('get_instance'))
{
    function get_instance()
    {
        $CI = &get_instance();
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if(!function_exists('getHashedPassword'))
{
    function getHashedPassword($plainPassword)
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 * @param {string} $hashedPassword : This is hashed password
 */
if(!function_exists('verifyHashedPassword'))
{
    function verifyHashedPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }
}

/**
 * This method used to get current browser agent
 */
if(!function_exists('getBrowserAgent'))
{
    function getBrowserAgent()
    {
        $CI = get_instance();
        $CI->load->library('user_agent');

        $agent = '';

        if ($CI->agent->is_browser())
        {
            $agent = $CI->agent->browser().' '.$CI->agent->version();
        }
        else if ($CI->agent->is_robot())
        {
            $agent = $CI->agent->robot();
        }
        else if ($CI->agent->is_mobile())
        {
            $agent = $CI->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }

        return $agent;
    }
}

if(!function_exists('setProtocol'))
{
    function setProtocol()
    {
        $CI = &get_instance();
                    
        $CI->load->library('email');
        
        $config['protocol'] = PROTOCOL;
        $config['mailpath'] = MAIL_PATH;
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['smtp_user'] = SMTP_USER;
        $config['smtp_pass'] = SMTP_PASS;
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        $CI->email->initialize($config);
        
        return $CI;
    }
}

if(!function_exists('emailConfig'))
{
    function emailConfig()
    {
        $CI->load->library('email');
        $config['protocol'] = PROTOCOL;
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['mailpath'] = MAIL_PATH;
        $config['charset'] = 'UTF-8';
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
    }
}

if(!function_exists('resetPasswordEmail'))
{
    function resetPasswordEmail($detail)
    {
        $data["data"] = $detail;
        // pre($detail);
        // die;
        
        $CI = setProtocol();        
        
        $CI->email->from(EMAIL_FROM, FROM_NAME);
        $CI->email->subject("Reset Password");
        $CI->email->message($CI->load->view('email/resetPassword', $data, TRUE));
        $CI->email->to($detail["email"]);
        $status = $CI->email->send();
        
        return $status;
    }
}

if(!function_exists('setFlashData'))
{
    function setFlashData($status, $flashMsg)
    {
        $CI = get_instance();
        $CI->session->set_flashdata($status, $flashMsg);
    }
}

if(!function_exists('rl_get_pagination_links')){
function rl_get_pagination_links($current_page, $total_pages, $url = ''){
$links = "<ul class=\"pagination\">\n";
$p = isset( $_GET['page'] ) ? $_GET['page'] : 1; 
        $p = is_numeric($p) ? $p : 1;
        $next = $p+1;
        $prev = $p-1;
    $f = ( $current_page == 1) ? 'class="active"' : '';
    if ($total_pages >= 1 && $current_page <= $total_pages) {
        
        if ( $p > 1 )
        $links .= "<li><a href=\"{$url}?page={$prev}\">Previous Page</a></li>\n";
        
        $links .= "<li $f><a href=\"{$url}?page=1\">1</a></li>\n";
        $i = max(2, $current_page - 5);
        if ($i > 2)
          $links .= "<li> <a>...</a> </li>";
        for (; $i < min($current_page + 6, $total_pages); $i++) {
            $class = ( $i == $p ) ? 'class="active"' : '';
            
            $links .= "<li $class><a href=\"{$url}/?page={$i}\">{$i}</a></li>\n";
        }
        
         $l = ( $p == $total_pages ) ? 'class="active"' : '';
         
        if ($i < $total_pages)
        $links .= "<li> <a>...</a> </li>";
        if ( $p != $total_pages )
        $links .= "<li $l><a href=\"{$url}/?page={$next}\">Next Page</a></li>\n";
        
        $links .= "<li $l><a href=\"{$url}/?page={$total_pages}\">{$total_pages}</a></li>\n";
    }
    $links .= "<ul>";
     
    if ( $total_pages > 1 ){
    return $links;
    }
    
   }

}

if(!function_exists('fakeip')){
function fakeip()  {  
    return long2ip( mt_rand(0, 65537) * mt_rand(0, 65535) );   
}  
}

if(!function_exists('getdata')){
function getdata($url,$args=false) { 
    global $session; 
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL,$url); 
    //curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: ".fakeip(),"X-Client-IP: ".fakeip(),"Client-IP: ".fakeip(),"HTTP_X_FORWARDED_FOR: ".fakeip(),"X-Forwarded-For: ".fakeip())); 
    if($args) 
    { 
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args); 
    } 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    //curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:8888"); 
    $result = curl_exec ($ch); 
    curl_close ($ch); 
    return $result; 
} 
}

?>