<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Layout {

    protected $_CI;
    private $js = array();
    private $css = array();

    public function __construct() {
        $this->_CI = &get_instance();
        $this->_set_default_css();
        //$this->_set_default_js();
    }

    public function display($body, $data = null) {
        $data['_styles'] = $this->declare_css();
        //$data['_scripts'] = $this->declare_js();
        $data['_content'] = $this->_CI->load->view($body, $data, TRUE);
        $data['_header'] = $this->_CI->load->view('template/template_header', $data, TRUE);
        $data['_footer'] = $this->_CI->load->view('template/template_footer', $data, TRUE);
        $this->_CI->load->view('template/template_frame', $data);
    }

    public function add_js($js,$from_url = FALSE) {
        if ($from_url) {
            $this->js[] = $js;
        }
        else {
            $this->js[] = base_url().'assets/js/'.$js;
        }
    }

    public function add_static_js($js,$from_url = FALSE) {
        if ($from_url) {
            $this->js[] = $js;
        }
        else {
            $this->js[] = base_url().'assets/js/pages/'.$js;
        }        
    }
    
    public function add_css($css, $from_url = FALSE) {
        if ($from_url) {
            $this->css[] = $css;
        } else {
            $this->css[] = base_url().'assets/css/'.$css;
        }
    }

    public function add_static_css($css, $from_url = FALSE) {
        if ($from_url) {
            $this->css[] = $css;
        } else {
            $this->css[] = base_url().'assets/css/pages/'.$css;
        }
    }

    public function declare_css() {
        $min_script = array();
        $tag = "";
        foreach ($this->css as $url) {
            $script[] = '<link rel="stylesheet" href="'.$url.'" />';
        }

        foreach ($script as $tag_html) {
            $tag.="".$tag_html;
        }
        return $tag;
    }

    public function declare_js() {
        $min_script = array();
        $tag = "";
        foreach ($this->js as $url) {
            $script[] = '<script type="text/javascript" src="' .$url. '"></script>';
        }

        foreach ($script as $tag_html) {
            $tag.="".$tag_html;
        }
        return $tag;
    }

    
    private function _set_default_css() {
        $this->add_css("bootstrap.min.css");
        $this->add_css("bootstrap-responsive.min.css");
        $this->add_css("http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600", TRUE);
        $this->add_css("font-awesome.css");
        $this->add_css("style.css");
    }

    private function _set_default_js(){
        $this->add_js("jquery-1.7.2.min.js");
        $this->add_js("plugins/excanvas.min.js");
        $this->add_js("plugins/chart.min.js");
        $this->add_js("bootstrap.js");
        // $this->add_js("plugins/full-calendar/fullcalendar.min.js");
        // $this->add_js("base.js");
    }

    

}