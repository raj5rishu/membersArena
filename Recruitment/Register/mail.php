<?php
function mailHelper($teamId,$teamName,$domain,$institute,$membersCount,$abstract_name,$member,$time,$subDomain)
{
$table1="<table border=2>
			<tr>
				<td>TeamId</td>
				<td>$teamId</td> 
			 </tr>
			 <tr>
				<td>Team Name</td>
				<td>$teamName</td> 
			 </tr>
			 <tr>
				<td>Domain</td>
				<td>$domain</td> 
			 </tr>
			 <tr>
				<td>Sub Domain</td>
				<td>$subDomain</td> 
			 </tr>
			 <tr>
				<td>Institute</td>
				<td>$institute</td> 
			 </tr>
			 <tr>
				<td>Registration Time</td>
				<td>$time</td> 
			 </tr>
			 
		</table>";
	$header="<p>Dear Sir/Madam,<br><br>Your application for The Hack Fest 2017 has been received successfully.<br>The details you registered with are:<br></p>";
	$footer="<p>DeCoders thank your for your interest. You will be notified if your idea is selected.</p>
		<p>All the Best!!</p>
		<p>Regards</p>
		<p>Team DeCoders</p>";
	$middle="<br><p>The details of your team members are:</p><br>";
	$table2="<table border=2>		
			 
			<tr>
				<th>Member Role</th>
				<th>Name</th>
				<th>Email</th> 
				<th>Phone</th>
				<th>T-shirt size</th> 				
			</tr>
			<tr>
				<td>Team Leader</td>
				<td>".$member[0]['name']."</td>
				<td>".$member[0]['email']."</td>
				<td>".$member[0]['phone']."</td>
				<td>".$member[0]['ts']."</td>
			 </tr>
				 <tr>
				<td>Team Member</td>
				<td>".$member[1]['name']."</td>
				<td>".$member[1]['email']."</td>
				<td>".$member[1]['phone']."</td>
				<td>".$member[1]['ts']."</td>
			 </tr>";
	for($itr=2;$itr<$membersCount;$itr++)
	{
		$name = $member[$itr]['name'];
		$email = $member[$itr]['email'];
		$phone = $member[$itr]['phone'];
		$ts = $member[$itr]['ts'];
		$table2 = $table2."<tr>
				<td>Team Member</td>
				<td>$name</td>
				<td>$email</td>
				<td>$phone</td>
				<td>$ts</td>
			 </tr>";
	}
		$table2 = $table2."</table><br>";
		echo $msg = $header.$table1.$middle.$table2.$footer;
	
		$body = $msg;
		$subject="Registration Successful";
		$headers="From: Decoders <admin@decoderssit.esy.es>\r\n";
		$headers .= "Content-type: text/html\r\n";
		for($itr=0;$itr<$membersCount;$itr++)
		{
			$email=$member[$itr]['email'];
			sendMail($email,$subject,$body,$headers);
		}
		
}
function sendMail($to,$subject,$body,$headers)
		{
			if(mail($to,$subject,$body,$headers))
			{
				//echo 'Email sent to '.$to;
			}
			else
			{
				//echo 'error sending mail';
			}
		}
		
		
?>