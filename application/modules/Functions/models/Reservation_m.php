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


		function getStaffReservation($staffid,$date){
			$this->db->select('*');
			$this->db->from('reservations');
			$this->db->where('reservations.dateReserved',$date);
			$this->db->where('reservations.staffID',$staffid);
			$this->db->where('reservations.rsrv_status',1);
			//$this->db->where('reservations.rsrv_status',2);
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
			$this->db->where('reservations.rsrv_status !=', 3);
			$this->db->where('reservations.custID',$userid);
			$query = $this->db->get();

			if($query->num_rows()>0){
				$row = $query->result();
				return $row;
			}

		}



		function getSalonHoursByCalendar($date,$staffid){

			$sql = "select * from reservations where dateReserved = ? AND staffID = ?";
			$query = $this->db->query($sql,array($date,$staffid));

			if($query->num_rows()>0){

				return 'true';
			}
			else{
				return 'false';
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
								$this->db->where('reservations.dateReserved >=',Date('Y-m-d'));
								$query = $this->db->get();

								if($query->num_rows()>0){
									$row = $query->result();
									return $row;
								}

				}

			}



			function getReservationMonitoring($userid){


			$sql = 'select * from salon where userid = ?';
			$query1 = $this->db->query($sql,array($userid));

			if($query1->num_rows()>0){
				$row1  = $query1->row();

								$this->db->select('*');
								$this->db->from('reservations');
								$this->db->join('personnels','personnels.staffID = reservations.staffID');
								$this->db->join('users','users.userid = reservations.custID');
								$this->db->join('salon_services','salon_services.serviceID = reservations.serviceID');
								$this->db->where('reservations.rsrv_status !=',0);
								$this->db->where('reservations.salonID',$row1->SalonID);
								$query = $this->db->get();

								if($query->num_rows()>0){
									$row = $query->result();
									return $row;
								}

				}

			}


		function confirmReservation($id){

			
			$sql = "update reservations set rsrv_status = 1 where reservationID = $id";
			$query = $this->db->query($sql);

	      	if($query){
	        	return true;
	      	}
	      	else{
	        	return false;
	      	}

		}

		function cancelReservation($id){

			$sql = "update reservations set rsrv_status = 2 where reservationID = $id";
			$query = $this->db->query($sql);

	      	if($query){
	        	return true;
	      	}
	      	else{
	        	return false;
	      	}

		}


		function clearReservation($id){

			$sql = "update reservations set rsrv_status = 3 where reservationID = $id";
			$query = $this->db->query($sql);

	      	if($query){
	        	return true;
	      	}
	      	else{
	        	return false;
	      	}

		}


		function queryWithDate($date){

			$sql = 'select * from salon where userid = ?';
			$query1 = $this->db->query($sql,array($this->session->userdata('userid')));

			if($query1->num_rows()>0){
				$row1  = $query1->row();

					$this->db->select('*');
					$this->db->from('reservations');
					$this->db->join('personnels','personnels.staffID = reservations.staffID');
					$this->db->join('users','users.userid = reservations.custID');
					$this->db->join('salon_services','salon_services.serviceID = reservations.serviceID');
					$this->db->where('reservations.dateReserved = ',date('Y-m-d',strtotime($date)));
					$this->db->where('reservations.rsrv_status !=',0);
					$this->db->where('reservations.salonID',$row1->SalonID);
					$query = $this->db->get();

						if($query->num_rows()>0){
							$row = $query->result_array();
							return json_encode($row);
						}

				}

				else{
					return false;
				}
		}




	}




?>
