<?php
	function check_data($fill,$key){
		$data   = mysql_query("SELECT id_alumni FROM $fill WHERE id_alumni='$key'");
		$result = mysql_num_rows($data);
		return $result;
	}
	function get($fill){
		$data= $_REQUEST[$fill];
		return $data;
	}
	function radio($name,$id,$value){
		$radio= "<div class='radio'><label><input type='radio' name='$name' id='$id' value='$value' required=''></label></div>";
		return $radio;
	}

	function radio_label($name,$id,$value,$label=''){
		$radio= "<div class='radio'>
					<label>
						<input type='radio' name='$name' id='$id' value='$value' required=''>
						$label
					</label>
				</div>";
		return $radio;
	}

	function text($name,$id='',$value=''){
		$text= "<input type='text' name='$name' id='$id' value='$value' class='form-control'>";
		return $text;
	}

	function checkbox($name,$id,$value,$label){
		$checkbox= "
					<div class='checkbox'>
						<label>
							<input type='checkbox' name='$name' id='$id' value='$value'>
							$label
						</label>
					</div>";
		return $checkbox;
	}

	function select_option($name,$id,$loop,$label){
		echo 	"
				<div class='form-group'>
					<label for='name'>$label</label>
					<select class='form-control' name='$name' id='$id' required=''>";
						for ($i=1; $i <= $loop ; $i++) { 
							echo "<option value='$i'>$i</option>";
						}
		echo	"	</select>
				</div>
				";
		// return $data;
	}

	function open_div($class,$id=''){
		$data= "<div class='$class' id='$id'>";
		return $data;
	}

	function div($class,$id='',$fill=''){
		$data= "<div class='$class' id='$id'>'$fill'</div>";
		return $data;
	}

	function close_div(){
		$data= "</div>";
		return $data;
	}

	function open_table(){
		$data= "<table class='table'>";
		return $data;
	}

	function close_table(){
		$data= "</table>";
		return $data;
	}

	function tr($fill){
		$data= "<tr>$fill</tr>";
		return $data;
	}

	function th($fill,$cols=''){
		$data= "<th colspan='$cols'>$fill</th>";
		return $data;
	}

	function td($fill=''){
		$data= "<td>$fill</td>";
		return $data;
	}

	function open_tr(){
		$data= "<tr>";
		return $data;
	}

	function close_tr(){
		$data= "</tr>";
		return $data;
	}

	function open_td(){
		$data= "<td>";
		return $data;
	}

	function close_td(){
		$data= "</td>";
		return $data;
	}

	function label($fill,$id=''){
		$data= "<label for='name' id='$id'> $fill </label>";
		return $data;
	}
	function fux(){
		echo "string";
	}
	function input_type($type=null,$name=null,$value=null,$placeholder=null,$class=null,$id=null,$required=false){
		return "<input type='$type' name='$name' id='$id' value='$value' class='form-control $class' placeholder='$placeholder' required='$required'>";
	}
	function input_textarea($rows=null,$name=null,$value=null,$placeholder=null,$class=null,$id=null,$required=false){
		return "<textarea rows='$rows' name='$name' id='$id' value='$value' class='form-control $class' placeholder='$placeholder' required='$required'></textarea>";
	}