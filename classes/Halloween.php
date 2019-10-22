<?php
class Halloween {

	public function day_to_halloween() {
		$year = date("Y");

		if(date('m') > 10)
			$year++;

		$from = date_create(date('Y-m-d H:i:s'));
		$to = date_create($year . "-10-31");

		$diff = date_diff($to, $from);

		return $diff->format('%a');
	}
}
?>