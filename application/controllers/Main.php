<?php

	class Main extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model("query");
		}
		
		function index()
		{
			$this->load->view("login");
		}
		
		function signup()
		{
			$this->load->view("signup");
		}
		
		function signing_up()
		{
			$fname = $this->input->post("fname");
			$lname = $this->input->post("lname");
			$gen   = $this->input->post("gen");
			$uname = $this->input->post("uname");
			$ps    = sha1($this->input->post("ps"));
			$cps   = sha1($this->input->post("cps"));
			
			if($ps == $cps)
			{
				$signup_data = array
							(
								"fname"	    =>	$fname,
								"lname"		=>	$lname,
								"gen"	    => $gen,
								"email"	    =>	$uname,
								"password"	=>	$ps
							);
				
				$this->query->signing_up($signup_data);
			}
			
			else
			{
				redirect(base_url()."main/signup/pmismatch");
			}
		}
		
		function login()
		{
			$uname = $this->input->post("uname");
			$pass  = sha1($this->input->post("pass"));
			
			$login_success = $this->query->login_varify($uname, $pass);
			
			if($login_success)
			{
				$id = array("id" =>	$login_success[0]["id"]);
				
				$this->session->set_userdata($id);
				
				redirect(base_url()."main/home");
			}
			
			else
			{
				redirect(base_url()."main/index/wrong");
			}
		}
		
		function logout()
		{
			$this->session->unset_userdata("id");
			redirect(base_url()."main/index/logged_out");
		}
		
		function home()
		{
			$id = $this->session->userdata("id");
			
			$fetch["profile"] = $this->query->profile($id);
			
			if($fetch)
			{
				$this->load->view("home", $fetch);
			}
			
			else
			{
				$this->session->unset_userdata("id");
				redirect(base_url()."main/index/som_wrong");
			}
		}
		
		function edit()
		{
			$id = $this->session->userdata("id");
			
			$edit["edit_data"] = $this->query->edit($id);
			
			$this->load->view("edit", $edit);
		}
		
		function update()
		{
			$id = $this->session->userdata("id");
			
			$fname = $this->input->post("fname");
			$lname = $this->input->post("lname");
			$gen = $this->input->post("gen");
			
			$update = array
						(
							"fname"	=>	$fname,
							"lname"	=>	$lname,
							"gen"	=>	$gen
						);
						
			$this->query->update_pro($update, $id);
			
			redirect(base_url()."main/edit/update_done");
		}
		
		function all_profile()
		{
			$all["all_pro"] = $this->query->all_profile();
			
			$this->load->view("all_profile", $all);
		}
		
		function delete()
		{
			$id = $this->uri->segment(3);
			
			$this->query->delete($id);
			
			redirect(base_url()."main/all_profile/deleted");
		}
	}

?>