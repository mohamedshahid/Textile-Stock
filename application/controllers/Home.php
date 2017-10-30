<?php

/**
*
*/
class Home extends MY_Controller
{
    public function index()
    {
        # code...
        $this->load->helper('form');
        $this->load->view('home_view');
    }

    public function addSeller()
    {
        $post = $this->input->post();
        $this->load->model('adminmodel');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Seller Name','required|alpha_numeric_spaces|trim');
        if($this->form_validation->run()){
            if($this->adminmodel->addSeller($post)) {
                echo 'new seller added';
            }else {
                echo 'error in adding user';
            }
        }
        else{
            echo validation_errors();
        }
    }

    public function addBuyer()
    {
        # code...
        $post = $this->input->post();
        $this->load->model('adminmodel');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Buyer Name','required|alpha_numeric_spaces|trim');
        if($this->form_validation->run()){
            if($this->adminmodel->addBuyer($post)) {
                echo 'new buyer added';
            }else {
                echo 'error in adding user';
            }
        }
        else{
            echo validation_errors();
        }
    }

    public function search_seller()
    {
        $post = $this->input->post('name');
        // echo "Bismillah";exit();
        // echo "$post";exit();
        $this->load->model('adminmodel');
        $result = $this->adminmodel->search_seller($post);
        // echo $result;exit();
        $output = '<ul class="list-group" id="list-group">';
        if(count($result) > 0)
        {
           foreach ($result as $name){
                $output .= '<li class="list-group-item list-group-item-action seller">'.$name->name.'</li>';
           }
        }
        else
        {
           $output .= '<li class="list-group-item">Seller Not Found</li>';
        }
        $output .= '</ul>';
        echo $output;
    }

    public function search_buyer()
    {
        $post = $this->input->post('name');
        // echo "Bismillah";exit();
        // echo "$post";exit();
        $this->load->model('adminmodel');
        $result = $this->adminmodel->search_buyer($post);
        // echo $result;exit();
        $output = '<ul class="list-group" id="list-group">';
        if(count($result) > 0)
        {
           foreach ($result as $name){
                $output .= '<li class="list-group-item list-group-item-action buyer">'.$name->name.'</li>';
           }
        }
        else
        {
           $output .= '<li class="list-group-item">Buyer Not Found</li>';
        }
        $output .= '</ul>';
        echo $output;
    }

    public function search_product()
    {
        $post = $this->input->post('name');
        // echo "Bismillah";exit();
        // echo "$post";exit();
        $this->load->model('adminmodel');
        $result = $this->adminmodel->search_product($post);
        // echo $result;exit();
        $output = '<ul class="list-group" id="list-group">';
        if(count($result) > 0)
        {
           foreach ($result as $name){
                $output .= '<li class="list-group-item list-group-item-action purchase sell">'.$name->productname.'</li>';
           }
        }
        else
        {
           $output .= '<li class="list-group-item">Product Not Found</li>';
        }
        $output .= '</ul>';
        echo $output;
    }

    public function entry_Purchase()
    {
        # code...
        $post = $this->input->post();
        // print_r($post);exit();
        $this->load->library('form_validation');
        if ($this->form_validation->run('entryPurchaseRules')) {
            # code...
            $this->load->model('adminmodel');
            $date = date('Y-m-d',strtotime($post['date']));
            // echo "$date";
            $post['date'] = $date;
            if ($this->adminmodel->entry_Purchase($post)) {
                $productname = $this->input->post('productname');
                $length = $this->input->post('length');
                $this->adminmodel->addStock($productname,$length);
                echo "Purchase Entry is inserted";
            }else {
                echo "Failed to insert Purchase Entry";
            }
        }else {
            echo validation_errors();
        }
    }

    public function entry_Sell()
    {
        # code...
        $post = $this->input->post();
        // print_r($post);exit();
        $this->load->library('form_validation');
        if ($this->form_validation->run('entrySellRules')) {
            # code...
            $this->load->model('adminmodel');
                $productname = $this->input->post('productname');
                $length = $this->input->post('length');
            if ($this->adminmodel->subStock($productname,$length)) {
                $this->adminmodel->entry_Sell($post);
                echo "Sell Entry is inserted";
            }else {
                echo "Failed to insert Sell";
            }
        }else {
            echo validation_errors();
        }
    }

    public function getStock()
    {
        # code...
        $this->load->model('adminmodel');
        $data = $this->adminmodel->getStock();
        $count = 0;
        $response = '';
        foreach ($data as $data) {
            # code...
            $response .= '<tr>'.'<td>'.++$count.'</td>';
            $response .= '<td>'.$data->productname.'</td>';
            $response .= '<td>'.$data->length.'</td>'.'<tr>';
        }
        echo $response;
    }

    public function purchaseBill()
    {
        # code...
        $this->load->model('adminmodel');
        $result = $this->adminmodel->purchaseBill();
        $this->load->view('showPurchaseBill',['result'=>$result]);
    }

    public function sellBill()
    {
        # code...
        $this->load->model('adminmodel');
        $result = $this->adminmodel->sellBill();
        $this->load->view('showsellBill',['result'=>$result]);
    }

    public function stock()
    {
        # code...
        $this->load->model('adminmodel');
        $result = $this->adminmodel->stock();
        $this->load->view('showStock',['result'=>$result]);
    }

    // public function downloadStock()
    // {
    //     # code...
    //     $this->load->model('adminmodel');
    //     $result = $this->adminmodel->downloadStock();
    //     print_r($result);exit();
    //     // output headers so that the file is downloaded rather than displayed
    //     header('Content-type: text/csv');
    //     header('Content-Disposition: attachment; filename="stock.csv"');
    //     $file = fopen('php://output', 'w');
    //     fputcsv($file, array('Sr', 'ProductName', 'Length'));
    //     fputcsv($file, $result);
    //     return redirect('home/stock');
    // }
}
 ?>