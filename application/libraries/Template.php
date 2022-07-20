<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

    protected $CI;

	//To initialize variables, functions and libraries
    public function __construct()
    {	
		$this->CI =& get_instance();
    }

    //To render admin contents
    public function template_render($content, $data = NULL)
    {
        if ( ! $content)
        {
            return NULL;
        }
        else
        {
            $this->template['header']  = $this->CI->load->view('header', $data, TRUE);
            $this->template['sidebar']  = $this->CI->load->view('sidebar', $data, TRUE);
            $this->template['content'] = $this->CI->load->view($content, $data, TRUE);
            $this->template['footer']  = $this->CI->load->view('footer', $data, TRUE);
            return $this->CI->load->view('template', $this->template);
        }
	}
}