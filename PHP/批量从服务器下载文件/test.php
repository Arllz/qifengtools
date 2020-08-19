<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('xwbank');
    }

    function getFile($url, $save_dir = '', $filename = '', $type = 0) {
        if (trim($url) == '') {
            return false;
        }
        if (trim($save_dir) == '') {
            $save_dir = './';
        }
        if (0 !== strrpos($save_dir, '/')) {
            $save_dir.= '/';
        }
        //创建保存目录
        if (!file_exists($save_dir) && !mkdir($save_dir, 0777, true)) {
            return false;
        }
        //获取远程文件所采用的方法
        if ($type) {
            $ch = curl_init();
            $timeout = 5;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $content = curl_exec($ch);
            curl_close($ch);
        } else {
            ob_start();
            readfile($url);
            $content = ob_get_contents();
            ob_end_clean();
        }
        $size = strlen($content);
        //文件大小
        $fp2 = @fopen($save_dir . $filename, 'a');
        fwrite($fp2, $content);
        fclose($fp2);
        unset($content, $url);
        return array(
            'file_name' => $filename,
            'save_path' => $save_dir . $filename
        );
    }

    public function hee()
    {
        $sql = "select id,title from dbd_borrow where id in (select DISTINCT borrow_id from dbd_borrow_repayment where fstatus=0 and borrow_id in (select id from dbd_borrow where ftype=9)GROUP BY borrow_id)";
        $list = $this->db->query($sql)->result_array();
        foreach ($list as $item) {
            $url = "http://192.168.2.171/hetong/dbd/tender/pdf/borrow-{$item['id']}.pdf";
            $save_dir = "down/";
            $filename = "{$item['title']}.pdf";
            $res = $this->getFile($url, $save_dir, $filename, 1);
            echo "<pre>";
            print_r($res);
        }
    }

}

