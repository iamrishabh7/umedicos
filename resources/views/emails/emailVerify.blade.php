<body style="font-family: cursive;">
	<div style="width: 620px;background: #f5f5f5;height: 100%;margin: 0 auto;border: 1px solid #d4d4d4;">

		<div style="width: 100%;border-bottom: 1px solid #d4d4d4;height: 100px;background: #eaeaea;">
			<img src="https://image.flaticon.com/icons/svg/840/840644.svg" style="width: 150px;padding: 5px;
			float: left;"> 
			<div style="width: 460px;float: right;text-align: center;margin: 0;padding: 0;">
				<h3 style="margin: 5px 10px;font-size: 18px;">Docapp</h3>
				<p style="margin: 0 10px;font-size: 14px;">Address</p>
				<p style="margin: 0 10px;font-size: 14px;"><strong>Call Us :</strong> 1234567890 ,1234567990 </p>
			</div>

		</div>
		<div style="width: 95%;height: 411px;padding: 10px 15px;font-size: 15px;font-family: monospace;">
			Dear {{$name}},<br><br>
			<p>This is your email activation link <a href="{{URL('/email_activation/'.$code)}}"> Click Here </a>. </p>

			<br><br>
			

			Thank You,<br>
			Docapp Team<br>
			docapp.com


		</div>
	</div>
</body>