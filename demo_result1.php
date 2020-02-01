<?php
error_reporting(E_ERROR | E_PARSE);
include('dbconnect.php');
if(isset($_POST['submit']))
{
	$qids=$_POST['qid'];
	$score = 0;

    $qsql2="SELECT skill, SUM(current_answer) as sum FROM demo_qwise GROUP BY skill";
	$str=mysqli_query($con,$qsql2);
	echo("SKILLS");
	echo("<br>");
	echo("<br>");
	while($row=mysqli_fetch_array($str))
	{
		$skill=$row['skill'];
		$mark=$row['sum'];
		echo $skill;
		//echo $mark;
		echo"<br>";
		echo"<br>";
	}
	echo("============================");
	echo("<br>");
	//$total = count($qids);
	echo("SCORE OBTAINED IN EACH SKILL :");
	echo("<br>");
	echo("<br>");
		foreach($qids as $qid)
	{

		$current_answer=0;
			$qres=mysqli_query($con,"SELECT * FROM `table` where id=".$qid);
			while ($row = mysqli_fetch_array($qres))
			{
			$skill=$row['skill'];
			$ans=$row['correct_option'];
			$mark=$row['weightage'];
			if(isset($_POST['q'.$qid]) && $ans["correct_option"]==$_POST['q'.$qid])
				 {
				//echo "Mark for Question no";
				//echo $qid;

				$score=$score+$mark;
				$current_answer=$mark;
				echo $skill;
				echo("                    -");
				echo $current_answer;
				echo "<br>";
				 }
			}
		$qsql1="INSERT Into demo_qwise VALUES ($qid,'$skill',$current_answer)";
	$store1=mysqli_query($con,$qsql1);
	}
	echo("**************");
	echo("<br>");
	echo ("Total Score :");
	echo($score);
	echo "<br>";
	echo("**************");
	echo "<br>";




}

?>
