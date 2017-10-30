<?php
/**
*
*/
class Adminmodel extends CI_Model
{
    public function addSeller($sellerName)
    {
        # code...
        return $this->db->insert('user_seller',$sellerName);
    }

    public function addBuyer($buyerName)
    {
        # code...
        return $this->db->insert('user_buyer',$buyerName);
    }

    public function search_seller($name)
    {
        # code...
        // echo "$name";
        $q = $this->db->select(['name'])
                            ->like('name',$name)
                            ->get('user_seller');
        // print_r($q->result());
        // echo json_encode($q->result());exit();
        // return json_encode($q->result());
        return $q->result();
    }

    public function search_buyer($name)
    {
        # code...
        // echo "$name";
        $q = $this->db->select(['name'])
                            ->like('name',$name)
                            ->get('user_buyer');
        // print_r($q->result());
        // echo json_encode($q->result());exit();
        // return json_encode($q->result());
        return $q->result();
    }

    public function search_product($productname)
    {
        # code...
        // echo "$name";
        $q = $this->db->select(['productname'])
                            ->like('productname',$productname)
                            ->get('stock');
        // print_r($q->result());
        // echo json_encode($q->result());exit();
        // return json_encode($q->result());
        return $q->result();
    }

    public function entry_Purchase($post)
    {
        # code...
        return $this->db->insert('purchase',$post);
    }

    public function addStock($productname, $length)
    {
        # code...
        $q1 = $this->db->select()
                        ->where('productname',$productname)
                        ->get('stock');
        $result = $q1->row();
        if ($result) {
            # code...
            $length = $result->length + $length;
            $data = [
                        'productname'=>$productname,
                        'length'=>$length
                    ];
            $this->db
                    ->where('productname',$productname)
                    ->update('stock',$data);
            echo "update to stock<br>";
        }else {
            $data = [
                        'productname'=>$productname,
                        'length'=>$length
                    ];
            $this->db->insert('stock',$data);
            echo "add to stock<br>";
        }
    }

    public function entry_Sell($post)
    {
        # code...
        return $this->db->insert('sell',$post);
    }

    public function subStock($productname, $length)
    {
        # code...
        $q1 = $this->db->select()
                        ->where('productname',$productname)
                        ->get('stock');
        $result = $q1->row();
        if ($result) {
            # code...
            $length = $result->length - $length;
            $data = [
                        'productname'=>$productname,
                        'length'=>$length
                    ];
            $this->db
                    ->where('productname',$productname)
                    ->update('stock',$data);
            echo "update to stock<br>";
            return 1;
        }else {
            echo "Product is unavilabe<br>";
            return 0;
        }
    }

    public function getStock()
    {
        # code...
        $q = $this->db->select()
                        ->get('stock');
        return $q->result();
    }

    public function purchaseBill()
    {
        # code...
        $q = $this->db->select()
                    ->from('purchase')
                    ->order_by('id','DESC')
                    ->get();
        return $q->result();
    }

    public function sellBill()
    {
        # code...
        $q = $this->db->select()
                    ->from('sell')
                    ->order_by('id','DESC')
                    ->get();
        return $q->result();
    }

    public function stock()
    {
        # code...
        $q = $this->db->select()
                    ->from('stock')
                    ->get();
        return $q->result();
    }

    public function downloadStock()
    {
        # code...
        $q = $this->db->select()
                        ->from('stock')
                        ->get();
        return $q->result();
    }
}
 ?>