<?php
$current_date = date('Y-m-d');
$yesterday = date("Y-m-d", strtotime("yesterday"));
$thisweek = date("Y-m-d", strtotime('-7 days'));
$thismonth = date("Y-m-d", strtotime('-30 days'));
$thisyear = date("Y-m-d", strtotime('-365 days'));

$select_date = filter_input(INPUT_POST, 'select_date', FILTER_SANITIZE_STRING);
$today_date = filter_input(INPUT_POST, 'today', FILTER_SANITIZE_STRING);
$yesterday_date = filter_input(INPUT_POST, 'yesterday', FILTER_SANITIZE_STRING);
$thisweek_date = filter_input(INPUT_POST, 'thisweek', FILTER_SANITIZE_STRING);
$thismonth_date = filter_input(INPUT_POST, 'thismonth', FILTER_SANITIZE_STRING);
$thisyear_date = filter_input(INPUT_POST, 'thisyear', FILTER_SANITIZE_STRING);
?>

<title>Dashboard</title>
<div class="content-wrapper">
    <section class="content">
		<div class="box-header with-border ajkrl">
			<div class="row">
				<div class="filterbox">
					<form action="" enctype="multipart/form-data" method="post" >
						<input type="date" name="select_date" value="<?php echo $select_date; ?>" class="form-control" onchange='this.form.submit()'>
					</form>
				</div>
				<div class="filterbox">
					<form action="" enctype="multipart/form-data"  method="post">
						<input type="hidden" name="thisyear" value="<?php echo $thisyear; ?>">
						<button type="submit" class="filterBtn"> This Year </button>
					</form>
				</div>
				<div class="filterbox">
					<form action="" enctype="multipart/form-data"  method="post">
						<input type="hidden" name="thismonth" value="<?php echo $thismonth; ?>">
						<button type="submit" class="filterBtn"> This Month </button>
					</form>
				</div>
				<div class="filterbox">
					<form action="" enctype="multipart/form-data"  method="post">
						<input type="hidden" name="thisweek" value="<?php echo $thisweek; ?>">
						<button type="submit" class="filterBtn"> This Week </button>
					</form>
				</div>
				<div class="filterbox">
					<form action="" enctype="multipart/form-data"  method="post">
						<input type="hidden" name="yesterday" value="<?php echo $yesterday; ?>">
						<button type="submit" class="filterBtn"> Yesterday </button>
					</form>
				</div>
				<div class="filterbox">
					<form action="" enctype="multipart/form-data"  method="post">
						<input type="hidden" name="today" value="<?php echo $current_date; ?>">
						<button type="submit" class="filterBtn"> Today </button>
					</form>
				</div>
			</div>
		</div>
		
	               
    </section>
</div>