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
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}


</style>
</head>
<body style="height: 100%;">  

<div class="header" style="width:99%; height: 100%">
<p style="text-align:right">Linda Li | My Account | Sign Out | Help</p>
</div>

<h3 style="color:darkblue;"><a style="color:rgb(38, 73, 87); text-decoration: none;"  href="./home.php">Home</a> 
<span class="tab"><a style="color:rgb(38, 73, 87); text-decoration: none;" class="active" href="./create.php">Create</a>
<span class="tab"><a style="color:rgb(38, 73, 87); text-decoration: none;" href="./manage.php">Manage</a></span></h3>
<hr>


<div style="width:100%; height: 100%;">
    <fieldset style="width: 80%; text-align: left;margin:auto;">
        <h2 style="color:rgb(231, 144, 31);"><strong>What is Crowdsourcing? </strong></h2>
  <p style="color:rgb(38, 73, 87);"><strong>Crowdsourcing has emerged as a novel problem-solving paradigm, which facilitates addressing problems that are hard for computers. You can rely on our crowdsourcing platform to gain valuable data from the general public. Below are some typical examples in which crowdsourcing can be quite beneficial.</strong></p>
  <ul class="b">
    <Li><strong>Sentiment Analysis:</strong> Crowdsourcing can help you to gain some training data before you train the model.</Li>
<Li><strong>Image Recognition:</strong> Crowdsourcing can help you tagging the images regarding specific aspects.</Li>
<Li><strong>Survey:</strong> Crowdsourcing can also provide you with meaningful survey results.</Li><br>
  <img src="picture.jpeg" style="width: 80%; margin: auto;">
</ul>
<hr>
<h2 style="color:rgb(231, 144, 31);"><strong>What is new in our Crowdsourcing platform? </strong></h2>
  <p style="color:rgb(38, 73, 87);"><strong>In the crowdsourcing process, budget will generally be set large to ensure that the quality of result is enough. It sometimes means that we collect much more answers and waste some budget. Compared to the existing crowdsourcing platform, our new platform allow you to early stop your published tasks before your pre-determined budget exhausted. Our developed Stopping Detection methods will help you to decide whether an early stop is a necessity. The methods are suitable for different aggregate methods and assignment methods.</strong></p>
  <ul class="b">

 
 
    <Li><strong>Stop at Anytime:</strong> In your "manage" page, you can always choose to early stop your crowdsourcing tasks.</Li>
<Li><strong>Professional Suggestions:</strong> Our system will provide you with comprehensive report on early stopping problem.</Li>
<Li><strong>Cut the Budget and Maintain Good Quality:</strong> Based on our developed algorithm, we will be able to recognize the proper early stopping point, where quality of the responses is ensured.</Li>
<Li><strong>Both Default Settings and Professional Settings:</strong> If you are not very familiar with the early stopping criteria, we provide you the default settings, which proved to be able to generate satisfactory results. If you are quite knowledgable in this topic, you can also set up your own parameters based on your needs and preferences.</Li><br>
  <img src="budget.jpg" style="width: 80%;">
</ul>
    </fieldset>


  <br>
</div>


</body>
</html>