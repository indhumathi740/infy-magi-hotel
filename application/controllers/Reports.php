<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function index()
    {
        // Load the model (replace 'Your_model' with the actual model name)
        $this->load->model('model_orders');
        
        // Get data from the model (replace 'get_report_data' with the actual method in your model)
        $data['report_data'] = $this->model_orders->get_report_data();

        // Load the view
        $this->load->view('report_page', $data);
    }
}
