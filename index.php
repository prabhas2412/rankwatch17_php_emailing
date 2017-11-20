<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;
?>
<html><head><meta name="viewport" content="width=device-width, initial-scale=1.0">
</head><body>
<h1><p><marquee behavior=scroll direction="left" scrollamount="10"><font color="red">Sending an E-mail </font></p></marquee></h1>
<form  <align ="center" action="index.php" method="post">        
	 <h4><font color="blue">sender's name :</h4></font>
     <input  type="text" name="sendername" id="to" placeholder="Senders Name"/>         
	<h4><font color="blue">receiver's e-mail address :</p></font>
    <input type="email" name="to" id="to" placeholder="Receiver's email address" />           
    <h4><font color="blue">subject :</h4></font>
    <input type="text" name="subject" id="subject" placeholder="subject" required />    
    <h4><font color="blue">message body :</h4></font>
     <textarea type="text" name="msg" id="msg" placeholder="Type your message here" required ></textarea> 
     <h2> <input type="submit" value=" Send " name="submit"/></h2> 
</form></body></html>
<?php
if (isset($_POST['sendername'])) {
$sendername=$_POST['sendername'];
$to = $_POST['to'];
$subject = $_POST['subject'];
$msg = $_POST['msg'];
$mgClient = new Mailgun('key-d5ae1cfee24512571d70db7d918d4f9b');
$domain = "sandbox9aff2027e28443bfb81a50dc81b5d48c.mailgun.org";
$result = $mgClient->sendMessage($domain, array(
"from" => "$sendername <mailgun@sandbox9aff2027e28443bfb81a50dc81b5d48c.mailgun.org>",
"to" => "Baz <$to>",
"subject" => "$subject",
"text" => "$msg",
));
echo "<script>alert('Email Sent!!');</script>";
}
?>