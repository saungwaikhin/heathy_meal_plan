<?php
class HomeController{
	public function renderHome(){
		return new HomeView();
	}
	public function renderAdminHome(){
		return new AdminHomeView();
	}
}