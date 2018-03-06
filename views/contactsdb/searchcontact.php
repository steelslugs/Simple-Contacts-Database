<h3><?php echo $title;
//https://www.w3schools.com/xml/ajax_php.asp
?></h3>
<script>
function showHint(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  
xhttp.open("GET", "<?php echo base_url('index.php/ajax_controller/index/');?>"+str, true);
  xhttp.send();   
}
</script>

<form action=""> 

	<?php
// 	echo '<select name="searchby" id="searchby">';
// 	echo '	<option value="contact_id">contact_id</option>';
// 	echo '	<option value="last_name">last_name</option>';
// 	echo '	<option value="first_name">first_name</option>';
	

// 	echo '</select>';
	?>
First name: 
<input type="text" id="txt1" onkeyup="showHint(this.value)">
</form>

<p>Suggestions: </br><span id="txtHint"></span></p> 



 
