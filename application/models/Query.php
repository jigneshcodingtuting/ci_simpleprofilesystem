<?php

	class Query extends CI_Model
	{
		function signing_up($signup_data)
		{
			$rs = $this->db->insert("account", $signup_data);
			
			if($rs)
			{
				redirect(base_url()."main/signup/signup_done");
			}
			
			else
			{
				redirect(base_url()."main/signup/signup_fail");
			}	
		}
		
		function login_varify($uname, $pass)
		{
			$this->db->from("account");
			$this->db->where("email", $uname);
			$this->db->where("password", $pass);
			
			$rs = $this->db->get();
			
			if($rs->num_rows() == 1)
			{
				return $rs->result_array();
			}
			
			else
			{
				return false;
			}
		}
		
		function profile($id)
		{
			$this->db->where("id", $id);
			$this->db->from("account");
			
			$rs = $this->db->get();
			
			if($rs->num_rows() == 1)
			{
				return $rs->result();
			}
			
			else
			{
				$this->session->unset_userdata("id");
				redirect(base_url()."main/index/must_login");
			}
		}
		
		function edit($id)
		{
			$this->db->where("id", $id);
			$this->db->from("account");
			
			$rs = $this->db->get();
			
			if($rs->num_rows() == 1)
			{
				return $rs->result();
			}
			
			else
			{
				$this->session->unset_userdata("id");
				redirect(base_url()."main/index/must_login");
			}
		}
		
		function update_pro($update, $id)
		{
			$this->db->where("id", $id);
			$this->db->update("account", $update);
		}
		
		function all_profile()
		{
			$this->db->from("account");
			
			$rs = $this->db->get();
			
			return $rs;
		}
		
		function delete($id)
		{
			$this->db->where("id", $id);
			$this->db->delete("account");
		}
	}

?>