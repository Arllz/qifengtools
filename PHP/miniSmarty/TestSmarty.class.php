<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/23
 * Time: 10:17
 */
class TestSmarty{
    public $template_dir = '';//模板文件放置的目录
    public $compile_dir = '';//编译后文件放置的目录
    public $tpl_var = array();//模板赋值的变量

    public function assign($key,$value)
    {
        $this->tpl_var[$key] = $value;
    }

    public function display($template)
    {
        $compile_file = $this->compile($template);
        include($compile_file);
    }

    public function compile($template)
    {
        $template_file = $this->template_dir.'/'.$template;
        //读取模板文件中的内容
        $source = file_get_contents($template_file);
        //判断是否需要再次生成编译文件
        $compile_file = $this->compile_dir.'/'.$template;

        if (file_exists($compile_file) && filemtime($compile_file) > filemtime($template_file))
        {
            return $compile_file;
        }

        //解析($)为<?php echo 等操作
        $source = str_replace('{$','<?php echo $this->tpl_var[\'',$source);
        $source = str_replace('}','\'];?>',$source);
        //生成编译文件
        file_put_contents($compile_file,$source);
        //返回编译后的文件路径
        return $compile_file;
    }
}