<?php
//1.　全てサイトで追加する
function wpb_hook_javascript() {
?>
    <script>
		const week = ["日", "月", "火", "水", "木", "金", "土"];
		const today = new Date();
		// 月末だとずれる可能性があるため、1日固定で取得
		var showDate = new Date(today.getFullYear(), today.getMonth(), 1);

		// 初期表示
		window.onload = function () {
			showProcess(today, calendar);
		};
		// 前の月表示
		function prev(){
			showDate.setMonth(showDate.getMonth() - 1);
			showProcess(showDate);
		}

		// 次の月表示
		function next(){
			showDate.setMonth(showDate.getMonth() + 1);
			showProcess(showDate);
		}

		// カレンダー表示
		function showProcess(date) {
			var year = date.getFullYear();
			var month = date.getMonth();
			document.querySelector('#header').innerHTML = year + "年 " + (month + 1) + "月";

			var calendar = createProcess(year, month);
			document.querySelector('#calendar').innerHTML = calendar;
		}

		// カレンダー作成
		function createProcess(year, month) {
			// 曜日
			var calendar = "<table><tr class='dayOfWeek'>";
			for (var i = 0; i < week.length; i++) {
				calendar += "<th>" + week[i] + "</th>";
			}
			calendar += "</tr>";

			var count = 0;
			var startDayOfWeek = new Date(year, month, 1).getDay();
			var endDate = new Date(year, month + 1, 0).getDate();
			var lastMonthEndDate = new Date(year, month, 0).getDate();
			var row = Math.ceil((startDayOfWeek + endDate) / week.length);

			// 1行ずつ設定
			for (var i = 0; i < row; i++) {
				calendar += "<tr>";
				// 1colum単位で設定
				for (var j = 0; j < week.length; j++) {
					if (i == 0 && j < startDayOfWeek) {
						// 1行目で1日まで先月の日付を設定
						calendar += "<td class='disabled'>" + (lastMonthEndDate - startDayOfWeek + j + 1) + "</td>";
					} else if (count >= endDate) {
						// 最終行で最終日以降、翌月の日付を設定
						count++;
						calendar += "<td class='disabled'>" + (count - endDate) + "</td>";
					} else {
						// 当月の日付を曜日に照らし合わせて設定
						count++;
						if(year == today.getFullYear()
						&& month == (today.getMonth())
						&& count == today.getDate()){
							calendar += "<td class='today'>" + count + "</td>";
						} else {
							calendar += "<td>" + count + "</td>";
						}
					}
				}
				calendar += "</tr>";
			}
			return calendar;
		}
    </script>

	<style>
		/*全体*/
		.wrapper{
			max-width: 600px;
			margin: 0 auto;
			color: #000000;
		}
		#header {
			text-align: center;
			font-size: 24px;
			width: 100%;
			margin: 1rem 0 0;
		}

		/*カレンダー*/
		#calendar {
			text-align: center;
			width: 100%;
		}
		table {
			outline: 2px solid #ddd;
			border-collapse: collapse;
			width: 100%;
		}
		th {
			color: #000;
		}
		th, td {
			outline: 1px solid #28303d;
			padding-top: 10px;
			padding-bottom: 10px;
			text-align: center;
		}
		/*日曜日*/
		td:first-child {
			color: red;
		}
		/*土曜日*/
		td:last-child {
			color: blue;
		}
		/*前後月の日付*/
		td.disabled {
			color: #ccc;
		}
		/*本日*/
		td.today {
			background: #607d8b;
			color: #39414d;
		}

		/*ボタン*/
		#next-prev-button {
			position: relative;
		}
		#next-prev-button button{
			cursor: pointer;
			background: #28303d;
			color: #fff;
			border: 1px solid #B78D4A;
			border-radius: 4px;
			font-size: 1rem;
			padding: 0.5rem 2rem;
			margin: 1rem 0;
		}
		#next-prev-button button:hover{
			background-color: #D4BB92;
			border-color: #D4BB92;
		}
		#prev {
			float: left;
		}
		#next {
			float: right;
		}
	</style>
<?php
}
add_action('wp_head', 'wpb_hook_javascript');