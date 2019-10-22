

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="static/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	</head>
	<body>
		<script>
			$(document).ready(function() {

				function getTimeRemaining(endtime) {
					var t = endtime - new Date().getTime();
					var seconds = Math.floor((t / 1000) % 60);
					var minutes = Math.floor((t / 1000 / 60) % 60);
					var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
					var days = Math.floor(t / (1000 * 60 * 60 * 24));
					return {
						'total': t,
						'days': days,
						'hours': hours,
						'minutes': minutes,
						'seconds': seconds
					};
				}

				function initializeClock(id, endtime) {
					var clock = document.getElementById(id);
					var daysSpan = clock.querySelector('.days');
					var hoursSpan = clock.querySelector('.hours');
					var minutesSpan = clock.querySelector('.minutes');
					var secondsSpan = clock.querySelector('.seconds');

					function updateClock() {
						var t = getTimeRemaining(endtime);

						daysSpan.innerHTML = t.days;
						hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
						minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
						secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

						if (t.total <= 0) {
							clearInterval(timeinterval);
						}
					}

					updateClock();
					var timeinterval = setInterval(updateClock, 1000);
				}

				var deadline = new Date(new Date().getTime() + <?=$day_to_halloween?> * 24 * 60 * 60 * 1000);
				initializeClock('clockdiv', deadline);

			});
		</script>
		<style>
			@font-face {
				font-family: 'mr_KillCrazyBBG';
				src: url('static/fonts/mr_KillCrazyBBG.otf') format("opentype");
				font-weight: 500;
				font-style: normal;
			}

			body {
				font-family: mr_KillCrazyBBG;
			}

			#clockdiv{
				font-family: sans-serif;
				color: #fff;
				display: inline-block;
				font-weight: 100;
				text-align: center;
				font-size: 30px;
			}

			#clockdiv > div{
				padding: 10px;
				border-radius: 3px;
				background: #bd510c;
				display: inline-block;
			}

			#clockdiv div > span{
				padding: 15px;
				border-radius: 3px;
				background: #bd510c;
				display: inline-block;
			}

			.smalltext{
				padding-top: 5px;
				font-size: 16px;
			}

			.main {
				text-align: center;
			}

			.title {
				font-size: 60px;
				text-transform: uppercase;
			}
		</style>
		<div class="container main">
			<div class="title">До хеллуина</div>
			<div id="clockdiv">
				<div>
					<span class="days"></span>
					<div class="smalltext">Дня</div>
				</div>
				<div>
					<span class="hours"></span>
					<div class="smalltext">Часа</div>
				</div>
				<div>
					<span class="minutes"></span>
					<div class="smalltext">Минут</div>
				</div>
				<div>
					<span class="seconds"></span>
					<div class="smalltext">Секунд</div>
				</div>
			</div>
		</div>
	</body>
</html>