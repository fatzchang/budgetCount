import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import $ from 'jquery';

$(".del").on('click', function(){
  if(confirm("確定要刪除嗎?")){
    location.href = $(this).data("url");
  }
})