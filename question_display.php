<?php
include('dbconnect.php');

?>
<head>
<link rel="stylesheet" type="text/css" href="intra.css">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Quest</title>
     <!--link the bootstrap css file-->
     <link href="boot1.css" rel="stylesheet">
     <link rel="stylesheet" href="in.css">

     <style type="text/css">
     .colbox {
          margin-left: 0px;
          margin-right: 0px;
     }
     </style>
	 </head>

<body>
<div class="bg">
<div class="fg">
<img src="Untitled-1.jpg">
<h1>Online Test</h1>
<div class="timer1">
<div id="timer">
</div>
</div>


<div id="slide1" class="slide">
     <?php
	 echo "<form id='question' name='question' method= 'POST' action='demo_result1.php'>";
   $display = mysqli_query($con,"SELECT * FROM `table`");
//$display= mysqli_query($con,"SELECT * FROM 'table'");
$qnum=1;
	while ($row = mysqli_fetch_array($display))
		{
	$id = $row["id"];
	$question = $row["questions"];
	$option1 = $row["option1"];
	$option2 = $row["option2"];
	$option3 = $row["option3"];
	$option4 = $row["option4"];
	$skill=$row['skill'];
	$answer = $row["correct_option"];
	$weigthtage=$row['weightage'];
	//$mark=$row['mark'];
	echo"<table>";
	echo "<tr><td colspan=3><br><b>$qnum. $question</b><input type='hidden' name='qid[]' value='".$id."'></td></tr>";
		echo
	'<tr style="padding-top:10px; padding-left:5px;">
	<td>
	<input type="radio" name="q'.$id.'" value="1" >'.$option1 .'
	</td>
	<td>
	<input type="radio" name="q'.$id.'" value="2">'.$option2.'
	</td>
	<td> <input type="radio" name="q'.$id.'" value="3" >'.$option3.'
	</td>
	<td><input type="radio" name="q'.$id.'" value="4" >'.$option4 .'
	</td>
	</tr>';

	$qnum++;
	}

	echo "</table>";
echo "<input type='submit' value='submit' name='submit' id='submit'>";
	echo "</form>";

?>
	<!--load jQuery library-->
<script src="boot2.js"></script>
<!--load bootstrap.js-->
<script src="boot3.js"></script>
<script src="script.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var duration = '<?php echo $test_time?>'*60;
		display = $('#timer');
		startTimer(duration, display);

		$.fn.disableSelection = function() {
        return this
                 .attr('unselectable', 'on')
                 .css('user-select', 'none')
                 .on('selectstart', false);
		};

		$("#question_container").disableSelection();
	});

	function startTimer(duration, display) {
		var timer = duration, minutes, seconds;
		var intervalTimer=setInterval(function ()
		{
			minutes = parseInt(timer / 60, 10);
			seconds = parseInt(timer % 60, 10);

			minutes = minutes < 10 ? "0" + minutes : minutes;
			seconds = seconds < 10 ? "0" + seconds : seconds;

			display.text(minutes + ":" + seconds);
			time=--timer;

			if (time < 0)
			{
					$('#submit').click();clearInterval(intervalTimer);
			}
		}, 1000);

	}

</script>
</div>
</p>
</div>
</div>
</body>
