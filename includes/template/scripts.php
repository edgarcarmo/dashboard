<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.min.js"></script>
<script src="js/bootstrap-table-pt-BR.min.js"></script>
<script src="js/fileinput.min.js"></script>
<script src="js/angular.min.js"></script>
<script src="js/underscore-min.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script src="js/jquery-maskmoney.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="js/functions.js"></script>

<?php
  if(isset($nav0)) {echo "<script>$('#bs-example-navbar-collapse-1').empty();</script>";}
  if(isset($_SESSION['isadmin'])  && $_SESSION['isadmin'] == 0) {echo "<script>$('#adminMenu').empty();</script>";}
?>