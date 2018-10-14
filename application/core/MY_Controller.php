<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	private $js = array();
    private $css = array();

	public function __construct(){
        parent::__construct();
        if (!$this->auth_model->is_logged_in()) {
            redirect(base_url());
        }
        $this->get_menu();
        $this->_set_default_css();
        $this->_set_default_js();
    }

    public function display($body, $data = null) {
        $data['_styles'] = $this->declare_css();
        $data['_scripts'] = $this->declare_js();
        $data['_content'] = $this->load->view($body, $data, TRUE);
        $data['_header'] = $this->load->view('template/template_header', $data, TRUE);
        $data['_footer'] = $this->load->view('template/template_footer', $data, TRUE);
        $this->load->view('template/template_frame', $data);
    }

    private function _set_default_css() {
        $this->add_css("bootstrap.min.css");
        $this->add_css("bootstrap-responsive.min.css");
        $this->add_css("http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600", TRUE);
        $this->add_css("font-awesome.css");
        $this->add_css("style.css");
        $this->add_css("jquery-ui.css");
        $this->add_css("//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css", TRUE);
    }

    private function _set_default_js(){
        $this->add_js("jquery-1.7.2.min.js");
        $this->add_js("bootstrap.js");
        $this->add_js("base.js");
        $this->add_js("jquery-ui.js");
        $this->add_js("//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js", TRUE);
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

    private function get_menu() {
    	$role = $this->auth_model->get_account_role();
        $this->load->model("menu_model", "menu");
		$items = $this->menu->get_menu_by_role($role);

		$this->load->library("multi_menu");
		$this->multi_menu->set_items($items);

		$this->load->library(array('layout', 'multi_menu'));

		$config["nav_tag_open"]          = '<ul class="mainnav">';		
		$config["parent_tag_open"]       = '<li class="dropdown">';			
		$config["children_tag_open"]     = '<ul class="dropdown-menu">';
		$this->multi_menu->initialize($config);
    }

    public function add_datatable() {
        $this->add_css("jquery.dataTables.min.css");
        $this->add_js("plugins/datatable/jquery.dataTables.min.js");
    }
}
