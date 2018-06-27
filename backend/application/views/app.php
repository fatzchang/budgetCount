<!DOCTYPE html>
<html lang="en">
<head>
  <base href="<?=base_url() ?>"></base>
  <meta charset="UTF-8">
  <title>溫暖的窩預算計算表</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <form class="col-12" action="<?=base_url()?>app/addItem" method="POST">
        <div class="form-group">
          <label for="item">購買物品</label>
          <input type="text" class="form-control" id="item" name="item" aria-describedby="emailHelp" placeholder="輸入物品名稱">
          <small id="emailHelp" class="form-text text-danger">請節省開銷呀</small>
        </div>
        <div class="form-group">
          <label for="price">價格</label>
          <input type="number" class="form-control" id="price" name="price" placeholder="請輸入價格">
        </div>
        <button type="submit" class="btn btn-primary">確定</button>
      </form>
    </div>
    <div class="row mt-5">
      <div class="col-12">我們只剩下<span><?=$money?></span>元呀!</div>
    </div>
    <div class="row mt-5">
      <div class="col-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">物品</th>
              <th scope="col">價格</th>
              <th scope="col">日期</th>
              <th scope="col">動作</th>
            </tr>
          </thead>
          <tbody>
            <? $i=1; foreach ($items as $item) { ?>
            <tr>
            <th scope="row"><?=$i?></th>
            <td><?=$item['item']?></td>
            <td><?=$item['price']?></td>
            <td><?=$item['create_date']?></td>
            </tr>
            <? $i++; } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
    
<script type="text/javascript" src="assets/js/bundle.js"></script></body>
</html>