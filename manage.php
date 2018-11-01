<!DOCTYPE HTML>  
<html lang="en">
<head>
<style>
.error {color: #FF0000;}
.header, .footer{
    background-color: rgb(139, 153, 158);
    color: white;
    padding: 8px;
    align: right;
    font-size: 10%;
}

.tab { 
       display:inline-block; 
       margin-left: 40px; 
}
input[type=text], select {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

    .button {
        background-color: rgb(38, 73, 87);
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;

        font-size: 16px;
        margin: 4px 2px;

    }
    ul.b {
    list-style-type: square;
}

input[type=submit] {
    width: 20%;
    background-color: rgb(44, 110, 134);
    color: white;
    padding: 8px 13px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=submit]:hover {
    background-color: #45049;
}
div {
    border-radius: 5px;
    background-color: #f2f2f2;
    height: 100%;
    width: 100%;
    position: relative;
}
fieldset {
  border-radius: 8px;
  height: 100%;
}
.box{
    background-color: lightgrey;
    width: 300px;
    border: 25px solid rgb(38, 73, 87);
    padding: 25px;
    margin: 25px;
}
#myProgress {
  width: 100%;
  background-color: #ddd;
}


</style>
</head>
<body style="height: 100%;">  
<?php
$file_open = fopen("project_data.csv","r");
$content = fgetcsv($file_open);
fclose($file_open);
$projecttitle = $content[0];
$reward = $content[1];
$assignmentno = $content[2];
$whetherstop = $content[3];
$createtime = $content[5];
$file_open1 = fopen("remain.csv","r");
$content1 = fgetcsv($file_open1);
fclose($file_open1);
$ntasks = count($content1)*$assignmentno;
$totalbudget = $ntasks*$reward;
$checkremain = array_sum($content1);
if ($checkremain==$ntasks){
  $submitno = 0;
}else{
  $file_open2=fopen("answer.csv","r");
$RowCount=0;
while ((fgetcsv($file_open2)) !== FALSE) 
{
    $RowCount++;
}
#echo $RowCount;
fclose($file_open2);
$submitno = $RowCount;
}
$remainno = $ntasks-$submitno;
$moneyspent = $submitno*$reward;
$progresspercent = round($submitno/$ntasks,4);
?>



<?php
if ($checkremain!==$ntasks){
$file_open3 = fopen("professional.csv","r");
$content3 = fgetcsv($file_open3);
fclose($file_open3);
$Aggregation = $content3[0];
$Assignment = $content3[1];
$stop = $content3[2];
$Error = $content3[3];
$file_open4 = fopen("project_data.csv","r");
$content4 = fgetcsv($file_open4);
fclose($file_open4);
$Topk = $content4[6];
$Budget = $ntasks;
$name = "answer.csv";
$k_topk = escapeshellarg($Topk);
$a_agg = escapeshellarg($Aggregation);
$s_ass = escapeshellarg($Assignment);
$m_budget = escapeshellarg($Budget);
$S_stop = escapeshellarg($stop);
$i_file = escapeshellarg("./".$name);
$w_window = escapeshellarg($Error);
$t_threshold = escapeshellarg($Error);
  if ($stop=="slidingwindow"){
    $output = shell_exec("./sample_stability -K $k_topk -T $t_threshold -a $a_agg -s $s_ass -i $i_file -S $S_stop -M $m_budget");
  }else{
    $output = shell_exec("./sample_stability -K $k_topk -W $w_window -a $a_agg -s $s_ass -i $i_file -S $S_stop -M $m_budget");
  }
  #echo $output,"hello";
  #echo "./sample_stability -K $k_topk -T $t_threshold -a $a_agg -s $s_ass -i $i_file -S $S_stop -M $m_budget";
}
?>
<br>
<br>








<div class="header" style="width:99%; height: 100%">
<p style="text-align:right">Linda Li | My Account | Sign Out | Help</p>
</div>

<h3 style="color:darkblue;"><a style="color:rgb(38, 73, 87); text-decoration: none;"  href="./home.php">Home</a> 
<span class="tab"><a style="color:rgb(38, 73, 87); text-decoration: none;" class="active" href="./create.php">Create</a>
<span class="tab"><a style="color:rgb(38, 73, 87); text-decoration: none;" href="./manage.php">Manage</a></span></h3>

<div style="width:100%; height: 100%;">
<fieldset> 
  <h1 style="color:rgb(231, 144, 31);"><strong>Your Project List </strong></h1>
  <hr>
  <h2 style="color:rgb(38, 73, 87);"><strong>Projects in Progress</strong></h2>
  
<fieldset style="border: 10px solid rgb(139, 153, 158);padding: 10px;">
<legend style="color:rgb(231, 144, 31);font-size: 130%;"><?php echo $projecttitle;?></legend>

  <ul class="b">
  <li>Time Created: <?php echo $createtime;?></li>
  <br>
  <li>Proposed Total Number of Tasks: <?php echo $ntasks;?></li>
  <br>
  <Li>Number of Answers Received: <?php echo $submitno;?></Li><br>
  <Li>Proposed Total Budget: <?php echo "HKD ",$totalbudget;?></Li><br>
  <Li>Money Spent: <?php echo "HKD ",$moneyspent;?></Li><br>
  <li>Whether to Check for Early Stopping Criteria: <?php echo $whetherstop;?></li>
  <br>

<?php
if ($checkremain!==$ntasks){
  if ($submitno<11){
    echo "<Li><strong style='color:rgb(231, 144, 31);'> Early Stopping Criteria Recommendation:</strong> We need more answers to do the analysis. Please check back later.</Li>";
  }else{
    $shell_output = escapeshellarg($output);
#echo "./demo.py $shell_output $t_threshold $S_stop 2>&1";
$routput = shell_exec("./demo.py $shell_output $t_threshold $S_stop 2>&1");
echo $routput;
#$pngname = "./plots/temp.png";
#echo '<img src='.$pngname.' style="float:center;width:40%"/>';
echo "<img src='./temp.png' style='float:center;width:40%'/>";
}
}
?>

<h3 style="color:rgb(38, 73, 87);"><strong>Choose to whether early stop or not? </strong></h3>
<form method="post" action="complete.php">
  <input type="radio" name="stop" value="yes"> Yes, stop the crowdsourcing process now.<br>
  <input type="radio" name="stop" value="no"> No, collect more answers. <br>
  <br>
  <input type="submit" name="confirm" value="Confirm">
</form>
  <h3 style="color:rgb(231, 144, 31);"><strong>Progress</strong></h3>
  <div id="myProgress">
  <div id="myBar" style="
  width: <?php $percent = $progresspercent * 100; echo $percent,"%";?>;
  height: 30px;
  background-color: rgb(231, 144, 31);
  text-align: center;
  line-height: 30px;
  color: white;"><?php echo $percent,"%";?></div>
</div>

</ul>
</fieldset>
<br><br><br>
<hr>
<h2 style="color:rgb(38, 73, 87);"><strong>Projects Completed</strong></h2>
<fieldset style="border: 10px solid rgb(139, 153, 158);padding: 10px;">
<legend style="color:rgb(231, 144, 31);font-size: 130%;">Analysis of Restaurant Reviews</legend>

  <ul class="b">
  <li>Time Created: 2017/12/21</li>
  <br>
  <li>Proposed Total Number of Tasks: 5020</li>
  <br>
  <Li>Number of Answers Received: 3701</Li><br>
  <Li>Proposed Total Budget: <?php echo "HKD 1220";?></Li><br>
  <Li>Money Spent: <?php echo "HKD 899";?></Li><br>
  <li>Whether to Check for Early Stopping Criteria: yes</li><br>
  <li>Budget Saved: HKD 321</li>
  <h3 style="color:rgb(231, 144, 31);"><strong>Completed</strong></h3>
  <div id="myProgress">
  <div id="myBar" style="
  width: 74%;
  height: 30px;
  background-color: rgb(231, 144, 31);
  text-align: center;
  line-height: 30px;
  color: white;">74%</div>
</div>
</ul>

</fieldset>

<br>
<fieldset style="border: 10px solid rgb(139, 153, 158);padding: 10px;">
<legend style="color:rgb(231, 144, 31);font-size: 130%;">Celebrity Information Collection</legend>

  <ul class="b">
  <li>Time Created: 2018/3/18</li>
  <br>
  <li>Proposed Total Number of Tasks: 3040</li>
  <br>
  <Li>Number of Answers Received: 3040</Li><br>
  <Li>Proposed Total Budget: <?php echo "HKD 1520";?></Li><br>
  <Li>Money Spent: <?php echo "HKD 1520";?></Li><br>
  <li>Whether to Check for Early Stopping Criteria: no</li><br>
  <li>Budget Saved: HKD 0</li>
  <h3 style="color:rgb(231, 144, 31);"><strong>Completed</strong></h3>
  <div id="myProgress">
  <div id="myBar" style="
  width: 100%;
  height: 30px;
  background-color: rgb(231, 144, 31);
  text-align: center;
  line-height: 30px;
  color: white;">100%</div>
</div>
</ul>

</fieldset>
</fieldset>
</div>
</body>
</html>