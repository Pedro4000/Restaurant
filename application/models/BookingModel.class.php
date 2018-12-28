<?php



//models/MealMode.class.php

//models/MealMode.class.php

class BookingModel {

	public function SaveBooking(){

		var_dump($_POST);

		var_dump($_SESSION['user']['Id']);

		$booking= new Database();

		$bookingDate=$_POST['bookingYear'].'-'.$_POST['bookingMonth'].'-'.$_POST['bookingDay'];

		$bookingTime=$_POST['bookingMinute'].':'.$_POST['bookingHour'];


		$sql= 'INSERT INTO `Booking`(`BookingDate`, `BookingTime`, `NumberOfSeats`, `User_Id`, `CreationTimestamp`) VALUES (?,?,?,?,NOW());';

		  $values=(
		  	[
		  	$bookingDate,
		  	$bookingTime,
		  	$_POST['numberOfSeats'],
		  	$_SESSION['user']['Id'],
		   	]);


		return $booking -> executeSql($sql, $values);


}
}


?>
