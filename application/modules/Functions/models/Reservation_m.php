<?php

	class Reservation_m extends CI_Model{


		function __construct(){
			parent::__construct();

		}




		function addReservation($data){

			$sql = "insert into reservations (custID,serviceID,timeReserved,eos,dateReserved,rsrv_status,staffID,salonID) values (?,?,?,?,?,?,?,?)";
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


		function getUserReservation($userid){

			$this->db->select('*');
			$this->db->from('reservations');
			$this->db->join('personnels','personnels.staffID = reservations.staffID');
			$this->db->join('salon','salon.SalonID = reservations.salonID');
			$this->db->join('salon_services','salon_services.serviceID = reservations.serviceID');
			$this->db->where('reservations.custID',$userid);
			$query = $this->db->get();

			if($query->num_rows()>0){
				$row = $query->result();
				return $row;
			}

		}


		function getSalonReservation($userid){


			$sql = 'select * from salon where userid = ?';
			$query1 = $this->db->query($sql,array($userid));

			if($query1->num_rows()>0){
				$row1  = $query1->row();

								$this->db->select('*');
								$this->db->from('reservations');
								$this->db->join('personnels','personnels.staffID = reservations.staffID');
								$this->db->join('users','users.userid = reservations.custID');
								$this->db->join('salon_services','salon_services.serviceID = reservations.serviceID');
								$this->db->where('reservations.rsrv_status',0);
								$this->db->where('reservations.salonID',$row1->SalonID);
								$query = $this->db->get();

								if($query->num_rows()>0){
									$row = $query->result();
									return $row;
								}

				}

			}




	}




?>
