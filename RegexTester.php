<!doctype HTML>
<HTML>
	<HEAD>
	<title>RegexTester</title>
	<style>	
	body 
	{
		background-color:grey; 
	}
	label,h1,h2,#run_test {
		font-family: Futura, "Trebuchet MS", Arial, sans-serif;
	}
	h2 {
		width:350px;
	}
	h1 {
		margin-left: 70px;
	}
	input,textarea {
		border: 5px solid white; 
    -webkit-box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
    -moz-box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
    box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
    padding: 15px;
    background: rgba(210,210,210,0.5);
    margin: 0 0 10px 0;
	} 
	textarea {
		margin-left:10px;
	}
	#main
	{
		background-color:white;
		width: 1000px;
		margin:0 auto;
		padding:10px;
	  		-webkit-box-shadow: 0 35px 20px #333;
	  		-moz-box-shadow: 0 35px 20px #333;
	  	box-shadow: 0 35px 20px #333;
	  	height:auto;
		overflow:hidden;
		-moz-border-radius: 2px;
		-webkit-border-radius: 2px;
		border-radius: 6px; 
		-khtml-border-radius: 2px; 
	}
	.reg {
		width:820px;
		height:30px;
		font-size:12px;
		margin-left:15px;
	}
	/* LIST #4 */
	ul {
		font-family:Georgia, Times, serif; font-size:15px; 
 		list-style: none; 
 		width:400px;
 	}

	ul li { text-decoration:none; color:#000000; background-color:#dddddd; line-height:30px;
	  border-bottom-style:solid; border-bottom-width:4px; border-bottom-color:#ffffff; padding-left:5px; cursor:pointer; }
	 #sub_wrap *{
	 	vertical-align: middle;
	 }
	 #run_test {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 14px;
		color: #ffffff;
		padding: 10px 40px;
		background: -moz-linear-gradient(
			top,
			#8a8389 0%,
			#211d21);
		background: -webkit-gradient(
			linear, left top, left bottom,
			from(#8a8389),
			to(#211d21));
		-moz-border-radius: 30px;
		-webkit-border-radius: 30px;
		border-radius: 30px;
		border: 3px solid #ffffff;
		-moz-box-shadow:
			0px 3px 11px rgba(000,000,000,0.5),
			inset 0px 0px 1px rgba(122,122,122,1);
		-webkit-box-shadow:
			0px 3px 11px rgba(000,000,000,0.5),
			inset 0px 0px 1px rgba(122,122,122,1);
		box-shadow:
			0px 3px 11px rgba(000,000,000,0.5),
			inset 0px 0px 1px rgba(122,122,122,1);
		text-shadow:
			0px -1px 0px rgba(000,000,000,0.2),
			0px 1px 0px rgba(255,255,255,0.3);
		float:right;
		margin-top:-60px;
		margin-right:130px;
	 }
	 #general {
	 	float:right;
	 	margin-right: 80px;
	 }
	 #param_matches,#general {
	 	display:inline-block;

	 }
	 #param_matches {
	 	margin-left:28px;
	 }
	 .list_header {
	 	padding-left:24px;
	 }

	</style>
	</HEAD>
	<BODY>
		<div id="main">
			<h1>PHP preg_match tester</h1>

			<FORM method="post" action="">
				<input id="run_test" type="submit" name="submit" id="submit" value="Test" />
				<div id="sub_wrap">
					<label>Subject</label>
					<textarea rows="14" cols="160" name="resp"><?php if ($_POST['resp']){echo htmlentities($_POST['resp']);}?></textarea>
				</div>
				<br>
				<label>Regex</label>
				<input class="reg" type="text" name="reg" value="<?php if ($_POST['reg']){echo htmlentities($_POST['reg']);}?>" />
		
			</FORM>
			<?php
				if ($_POST['reg']&&$_POST['resp']) {
					preg_match($_POST['reg'] , $_POST['resp'], $test_response);
					if (count($test_response)>0) {				
						$count=0;
						foreach($test_response as $key => $match) {
							if (!is_int($key)) {
								$list.= "<li><b>".$key."</b> ".$match.'</li>';
								$count++;
							}
						}
						if ($count>0) {
							echo "<div id='param_matches'><h2 class='list_header'>".$count." Parameter Match".(($count==1)?'':'es')."</h2>";
							echo "<ul>";
							echo $list;
							echo "</ul></div>";
						}


						preg_match_all($_POST['reg'] , $_POST['resp'], $test_response);
						$list_two='';
						foreach($test_response[0] as $key => $match) {
							if (is_int($key)&&$match&&$match!=''&&$match!=null) {
								$list_two.= "<li>".$match.'</li>';
								$count_sub++;
							}
						}

						if ($count_sub>0) {
							echo "<div id='general'><h2 class='list_header'>General Match</h2>";
							echo "<ul>";
							echo $list_two;
							echo "</ul></div>";
							
						}
					} else {
						echo "<p>Sorry there were no matches</p>";
					}
				}
			?>
		</div>
	</BODY>

</HTML>
