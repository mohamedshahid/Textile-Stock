<?php
$config = [
            'entryPurchaseRules'=>[
                [
                    'field'=>'sellername',
                    'label'=>'Seller Name',
                    'rules'=>'required|alpha_numeric_spaces'
                ],
                [
                    'field'=>'billno',
                    'label'=>'Bill No',
                    'rules'=>'required|numeric'
                ],
                [
                    'field'=>'productname',
                    'label'=>'Product Name',
                    'rules'=>'required|alpha_numeric_spaces'
                ],
                [
                    'field'=>'date',
                    'label'=>'Date',
                    'rules'=>'required'
                ],
                [
                    'field'=>'length',
                    'label'=>'Length',
                    'rules'=>'required|numeric'
                ],
                [
                    'field'=>'price',
                    'label'=>'Price',
                    'rules'=>'required|numeric'
                ],
                [
                    'field'=>'total',
                    'label'=>'Total',
                    'rules'=>'required|numeric'
                ]
            ],

            'entrySellRules'=>[
                [
                    'field'=>'buyername',
                    'label'=>'Buyer Name',
                    'rules'=>'required|alpha_numeric_spaces'
                ],
                [
                    'field'=>'productname',
                    'label'=>'Product Name',
                    'rules'=>'required|alpha'
                ],
                [
                    'field'=>'length',
                    'label'=>'Length',
                    'rules'=>'required|numeric'
                ],
                [
                    'field'=>'price',
                    'label'=>'Price',
                    'rules'=>'required|numeric'
                ],
                [
                    'field'=>'total',
                    'label'=>'Total',
                    'rules'=>'required|numeric'
                ]
            ]
          ];
 ?>