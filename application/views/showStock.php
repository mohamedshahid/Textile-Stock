<?php include("header2.php") ?>
<div class="container">
  <div class="col-md-12 text-center">
    <h1>Stock</h1>
  </div>
  <div class="col-md-12 text-center">
    <button class="btn btn-primary">Download</button>
  </div>
  <div class="col-md-8 col-md-offset-2">
    <table class="table table-hover table-bordered">
    <thead>
      <th>Sr</th>
      <th>ProductName</th>
      <th>Length</th>
    </thead>
    <tbody>
    <?php $count=0;?>
    <?php foreach($result as $result):?>
      <tr>
      <td><?= ++$count?></td>
      <td><?= $result->productname?></td>
      <td><?= $result->length?></td>
      </tr>
    <?php endforeach;?>
    </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
    $(function(){
        $('.table').DataTable();

        $('.btn').click(function(){
          $('.table').table2csv({
            separator: ',',
            newline: '\n',
            quoteFields: true,
            excludeColumns: '',
            excludeRows: '',
            filename: 'stock.csv'
          })
        });
    });
</script>