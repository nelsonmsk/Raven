<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppDefaults extends Model
{
    use HasFactory;	
	
	protected $fillable = ['companyName','appTitle','brandHeading','introText','aboutText','introVideo','facebook','twitter','instagram','googleplus','youtube','linkedin','whatsapp','phone','email','address','contactText','username'];

	public function saveAppDefaults($data)
	{
		$this->companyName = $data['companyName'];	
		$this->appTitle = $data['appTitle'];
		$this->brandHeading = $data['brandHeading'];		
		$this->introText = $data['introText'];
		$this->aboutText = $data['aboutText'];
		$this->introVideo = $data['introVideo'];			
		$this->facebook = $data['facebook'];
		$this->twitter = $data['twitter'];
		$this->instagram = $data['instagram'];
		$this->googleplus = $data['googleplus'];
		$this->youtube= $data['youtube'];
		$this->linkedin= $data['linkedin'];		
		$this->whatsapp = $data['whatsapp'];
		$this->phone = $data['phone'];
		$this->email = $data['email'];
		$this->address = $data['address'];
		$this->contactText = $data['contactText'];		
		$this->username = auth()->user()->name;	
		$this->save();
			return 1;
	}

	public function updateAppDefaults($data)
	{
		$ad = $this::find($data['id']);
		$ad->companyName = $data['companyName'];	
		$ad->appTitle = $data['appTitle'];
		$ad->introText = $data['introText'];
		$ad->brandHeading = $data['brandHeading'];
		$ad->aboutText = $data['aboutText'];
		$ad->introVideo = $data['introVideo'];		
		$ad->facebook = $data['facebook'];
		$ad->twitter = $data['twitter'];
		$ad->instagram = $data['instagram'];
		$ad->googleplus = $data['googleplus'];
		$ad->youtube= $data['youtube'];
		$ad->linkedin= $data['linkedin'];		
		$ad->whatsapp= $data['whatsapp'];
		$ad->phone = $data['phone'];
		$ad->email = $data['email'];
		$ad->address = $data['address'];
		$ad->contactText = $data['contactText'];			
		$ad->username = auth()->user()->name;	
		$ad->save();
			return 1;
	}
}
