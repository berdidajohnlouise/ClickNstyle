<?php

	class Reservation_m extends CI_Model{


		function __construct(){
			parent::__construct();

		}




		function addReservation($data){

			$sql = "insert into reservations (custID,serviceID,timeReserved,eos,dateReserved,status,staffID,salonID) values (?,?,?,?,?,?,?,?)";
			$query = $this->db->query($sql,array($data['cust_userid'],$data['salonservices'],$data['reservationhours'],$data['eos'],$data['calendar_date'],0,$data['serviceStaff'],$data['salonid']));


			if($query->num_rows()>0){
				return 'Service successfully reserved';
			}
		}


		function getStaffReservation($staffid){
			$this->db->select('*');
			$this->db->from('reservations');
			$this->db->where('reservations.staffID',$staffid);

			$query = $this->db->get();

			if($query->num_rows()>0){
				$row = $query->result();
				return $row;
			}
			else{
				return false;
			}
		}

		function getSalonHours($salonid){
			$this->db->select('*');
			$this->db->from('salon');
			$this->db->where('salon.SalonID',$salonid);
			$query = $this->db->get();

			if($query->num_rows()>0){
				$row = $query->row();
				return $row;
			}
		}


	}




?>
