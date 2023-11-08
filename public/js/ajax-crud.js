$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //Basics	
    //var host = "http://localhost/ConstructionFirmApp/public";
    var host = $('meta[name="env"]').attr('content');

   //get the main template settings
    var sdurl = host + '/AppDefaults';
    var $rtemplate = [];
	if($rtemplate.length == 0){
		$.get(sdurl, function(response) {
			$rtemplate = response.rtemplate;

	        var sideTitle = $('.sidebar').find('.logo').children('.nav-link');
			sideTitle.html($rtemplate['appDefaults'].appTitle);
			
			var siteTitle = $('.navbar-brand').find('.nav-link');
			siteTitle.html($rtemplate['appDefaults'].appTitle);

			var Title = $('.page-text').find('p').children('span');
			Title.html($rtemplate['appDefaults'].appTitle);

			var footerTitle = $('.footer').find('span').children('a.title');
			footerTitle.html($rtemplate['appDefaults'].appTitle);
			
			var footerLink = $('.footer').find('span').children('a.title');
			footerLink.prop("href",$rtemplate['appDefaults'].email);		
		}); 
	}else{
	        var sideTitle = $('.sidebar').find('.logo').children('.nav-link');
			sideTitle.html($rtemplate['appDefaults'].appTitle);
			
			var siteTitle = $('.navbar-brand').find('.nav-link');
			siteTitle.html($rtemplate['appDefaults'].appTitle);

			var Title = $('.page-text').find('p').children('span');
			Title.html($rtemplate['appDefaults'].appTitle);

			var footerTitle = $('.footer').find('span').children('a.title');
			footerTitle.html($rtemplate['appDefaults'].appTitle);
			
			var footerLink = $('.footer').find('span').children('a.title');
			footerLink.prop("href",$rtemplate['appDefaults'].email);		
	}

	//get the dashboard notifications
    var $notifications_url = host + '/notifications';
    var $notifications_combo = [];
	if($notifications_combo == 0){
		$.get($notifications_url, function(response) { 	
			$notifications_combo = response.notifications_combo;	
			
				var nts1 = $('.navbar-nav').find('.dropdown-menu').children('.not1');
					nts1.html('<i class="fa fa-envelope text-default"></i>' + 'You have ' + $notifications_combo['unread_messages'] + ' unread messages' );
					
				var nts2 = $('.navbar-nav').find('.dropdown-menu').children('.not2');
					nts2.html('<i class="fa fa-envelope-open text-warning"></i>' + $notifications_combo['received_mailsubs'] + ' new mail subscription requests' );
					
				var nts3 = $('.navbar-nav').find('.dropdown-menu').children('.not3');
					nts3.html('<i class="fa fa-envelope-open text-success"></i>' + $notifications_combo['confirmed_mailsubs'] + ' new mail subscriptions confirmations' );
					
				var nts4 = $('.navbar-nav').find('.dropdown-menu').children('.not4');
					nts4.html('<i class="fa fa-envelope-open text-danger"></i>' + $notifications_combo['cancelled_mailsubs'] + ' new mail subscriptions cancellations' );		
					
				var	$show_num = $notifications_combo['unread_messages'] + $notifications_combo['received_mailsubs'] + $notifications_combo['confirmed_mailsubs'] +
					$notifications_combo['cancelled_mailsubs'];
				
				var $icon_num = $('.navbar-nav').find('.nav-link').children('.notification');
					$icon_num.html($show_num );				
		});
	}else{
		
				var nts1 = $('.navbar-nav').find('.dropdown-menu').children('.not1');
					nts1.html('<i class="fa fa-envelope text-default"></i>' + 'You have ' + $notifications_combo['unread_messages'] + ' unread messages' );
					
				var nts2 = $('.navbar-nav').find('.dropdown-menu').children('.not2');
					nts2.html('<i class="fa fa-envelope-open text-warning"></i>' + $notifications_combo['received_mailsubs'] + ' new mail subscription requests' );
					
				var nts3 = $('.navbar-nav').find('.dropdown-menu').children('.not3');
					nts3.html('<i class="fa fa-envelope-open text-success"></i>' + $notifications_combo['confirmed_mailsubs'] + ' new mail subscriptions confirmations' );
					
				var nts4 = $('.navbar-nav').find('.dropdown-menu').children('.not4');
					nts4.html('<i class="fa fa-envelope-open text-danger"></i>' + $notifications_combo['cancelled_mailsubs'] + ' new mail subscriptions cancellations' );		
				
			var	$show_num = $notifications_combo['unread_messages'] + $notifications_combo['received_mailsubs'] + $notifications_combo['confirmed_mailsubs'] +
				$notifications_combo['cancelled_mailsubs'];
			
			var $icon_num = $('.navbar-nav').find('.nav-link').children('.notification');
				$icon_num.html($show_num );			
	}


    /*when click edit button*/

    $('body').on('click', '#edit-btn', function(e) {
        e.preventDefault();
        var gid = $(this).data('id');
        var gbase = $(this).attr('href');
        var geturl = host + '/' + gbase + '/edit';
        $.get(geturl, function(response) {
					
			if (response.error){
				
				 Swal.fire({title: "Ooops!!",text: response.error.message,timer: 6000,showConfirmButton: true,type: "error"});
				
			} else {
				
            window.location.replace(geturl);
			
			}
        })
    });

    /*when click show button*/
    $('body').on('click', '#show-btn', function(e) {
        e.preventDefault();
        var swid = $(this).data('id');
        var swbase = $(this).attr('href');
        var swurl = host + '/' + swbase;
        $.get(swurl, function(response) {
            //swal("Oops yess!", response.success.message, 'success');
            window.location.replace(swurl);
        })
    });
	
    /*when click show button*/
    $('body').on('click', '#project-show-btn', function(e) {
        e.preventDefault();
        var pswid = $(this).data('id');
        var pswbase = $(this).attr('href');
        var pswurl = host + '/' + pswbase;
        $.get(pswurl, function(response) {
            //swal("Oops yess!", response.success.message, 'success');
            //window.location.replace(swurl);
        })
    });

    //if the user clicks the delete button
    $('body').on('click', '#delete-btn', function(e) {

        e.preventDefault();
        var dbase = $(this).attr("href");
        var redir = $(this).attr("action");		
        Swal.fire({
                title: "Warning!",
                text: '"Confirm you want to delete ?"',
                showConfirmButton: true,
                showCancelButton: true,
                type: "warning"
            }).then(function(result) {

                console.log(result.value);
                if (result.value == true) {
                    var d_url = host + '/' + dbase;
					var newdir = host + '/' + redir;
                    $.ajax({
                            type: "DELETE",
                            url: d_url,
                        })
                        .done(function(response) {
                            if (response.success) {

                                console.log(response.success);

                                Swal.fire({
                                    title: "Done" ,
                                    text: response.success.message,
                                    timer: 6000,
                                    showConfirmButton: false,
                                    type: "success"
                                });
                                window.location.replace(newdir);

                            } else {
                                console.log('Error:', response.error);
                                Swal.fire("Process Failed!", "Cannot" + actionType + "now!", 'error');
                            }
                        })
                        .fail(function() {

                            console.log('Error:', 'Process Failed Entirely');
                            Swal.fire("Process Failed!", "Cannot delete now!", 'error');
                        });
                } 
            })
            .catch(swal.noop);
    });

    //when user clicks search button on the search form
  var scForm = '';

    scForm = $('.searchForm');
    scForm.submit(function(e) {	
        e.preventDefault();
        var search_text = $('#search_text').val();
        var sc = scForm.attr('action');			
		var search_url = host + '/' + sc + '?search_text=' + search_text +'&Search=';	
		console.log('search_url:',search_url);
        $.get(search_url, function(response) {
            //swal("Oops yess!", response.success.message, 'success');
            window.location.replace(search_url);
        });	

		
	});
	
	

    //when user clicks Update or Create new button on a regular form
    var sForm = '';

    sForm = $('.singleForm');

    sForm.submit(function(e) {

        e.preventDefault();
		var actionType = $('#save-btn').attr('name');

        var type = "POST"; //for creating a new resource
        var id = $('#id').val();

        var base = sForm.attr('action');
        var my_url = host + '/' + base;
		var redirect = my_url;
		
        if (actionType == "Update") {
            type = "PUT"; //for updating a resource
            my_url += '/' + id;
			
        }else if (actionType == "Send") {
            type = "POST"; //for sending a resource
            my_url += '/send';
			console.log('url :',my_url);
			
        }		
		

        $.ajax({
                url: my_url,
                type: type,
                data: sForm.serialize(),
                dataType: 'json',
            })
            .done(function(response) {

                console.log(response);

                if (response.success) {

                    switch (actionType) 
					{ 

						case "Save" :
						{//if user created a new record
							
							Swal.fire({
								title: "Completed Saving",
								text: response.success.message,
								timer: 6000,
								showConfirmButton: false,
								type: "success"
							});
							window.location.replace(my_url);
						
						} 
						break
						case "Send":
						{ //if user sent an existing record 

							Swal.fire({
								title: "Completed Sending" ,
								text: response.success.message,
								timer: 6000,
								showConfirmButton: false,
								type: "success"
							});
							window.location.replace(redirect);
							
					    }
						break				   
						case "Update" :
						{ //if user updated an existing record 

							Swal.fire({
								title: "Completed Updating" ,
								text: response.success.message,
								timer: 6000,
								showConfirmButton: false,
								type: "success"
							});
							window.location.replace(redirect);
						}
						break
					}	
                } else {

                    Swal.fire("Oops error!", response.error.message, 'error');

                }


            })
            .fail(function(errors) {
                console.log('Error:', 'Process Failed Entirely ' + 'Http Error: ' + errors.status);
                sForm.prepend(errors);
                Swal.fire("Process Failed!", "Application Server Cannot Process Request!", 'error');


            });
    });
	
        //check if Submitted form has file inputs for uploads
        var xForm = '';
        xForm = $('.fileupload');
        var xfForm = $('.fileupload');
        var xsForm = xForm.serializeArray();
        var fname = xForm.attr('id');


        switch (fname) //make url from form-id 
        {
            case "testimonials-form1":
                {
                    var xurl = 'testimonials';
                    var up_url = host + '/' + xurl;
					var mType = "POST";
                    console.log('url:', 'Process url ' + up_url);
                }
                break
            case "testimonials-form2":
                {
                    var xid = $('#id').val();
                    var xsurl = 'testimonials/' + xid;
                    var up_url = host + '/' + xsurl;
					var mType = "PUT";
                    console.log('url:', 'Process url ' + up_url);
                }
                break
            case "projects-form1":
                {
                    var xurl = 'projects';
                    var up_url = host + '/' + xurl;
					var mType = "POST";
                    console.log('url:', 'Process url ' + up_url);
                }
                break
            case "projects-form2":
                {
                    var xid = $('#id').val();
                    var xsurl = 'projects/' + xid;
                    var up_url = host + '/' + xsurl;
					var mType = "PUT";
                    console.log('url:', 'Process url ' + up_url);
                }
                break
            case "profiles-form2":
                {
                    var xid = $('#id').val();
                    var xsurl = 'profiles/' + xid;
                    var up_url = host + '/' + xsurl;
					var mType = "PUT";					
                    console.log('url:', 'Process url ' + up_url);
                }
                break
            case "profiles-form1":
                {
                    var xurl = 'profiles';
                    var up_url = host + '/' + xurl;
					var mType = "POST";					 
                    console.log('url:', 'Process url ' + up_url);
                }
                break
            case "newsletters-form2":
                {
                    var xid = $('#id').val();
                    var xsurl = 'newsletters/' + xid;
                    var up_url = host + '/' + xsurl;
					var mType = "PUT";
                    console.log('url:', 'Process url ' + up_url);
                }
                break
            case "newsletters-form1":
                {
                    var xurl = 'newsletters';
                    var up_url = host + '/' + xurl;
					var mType = "POST";					
                    console.log('url:', 'Process url ' + up_url);
                }
                break
            case "wines-menu-form1":
                {
                    var xurl = 'wines';
                    var up_url = host + '/' + xurl;
                    console.log('url:', 'Process url ' + up_url);
                }
                break
            case "wines-menu-form2":
                {
                    var xid = $('#id').val();
                    var xsurl = 'wines/' + xid;
                    var up_url = host + '/' + xsurl;
                    console.log('url:', 'Process url ' + up_url);
                }
                break
            case "desserts-menu-form1":
                {
                    var xurl = 'desserts';
                    var up_url = host + '/' + xurl;
                    console.log('url:', 'Process url ' + up_url);
                }
                break
            case "desserts-menu-form2":
                {
                    var xid = $('#id').val();
                    var xsurl = 'desserts/' + xid;
                    var up_url = host + '/' + xsurl;
                    console.log('url:', 'Process url ' + up_url);
                }
                break
        }


	//If the user clicks the submit button of an form with file uploads 
	Dropzone.autoDiscover = false;
	 $('.fileupload').dropzone({ // The camelized version of the ID of the form element
		// The dropzone configuration 
		clickable: ".dropzone",
		url: up_url,
		method: mType,
		previewsContainer: "#my-dropzone",
		autoProcessQueue: false,
		uploadMultiple: false,
		parallelUploads: 5,
		maxFiles: 5,
		maxFilesize: 1,
		acceptedFiles: 'image/*',
		addRemoveLinks: true,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		
		// The setting up of the dropzone
		
		init: function() {
			var myDropzone = this;
			var $id  = xid;
			// Here's the change from enyo's tutorial...

			$("#submit").click(function (e) {
				e.preventDefault();
				e.stopPropagation();
				myDropzone.processQueue();
			}); 
			
			if (mType == "PUT"){
				
				switch (fname) //make url from form-id 
				{
					case "profiles-form2":
						{
							//send all the form data along with the files:
							this.on("sending", function(data, xhr, formData) {
								
								formData.append("_token", $("#_token").val());
								formData.append("id", $("#id").val());								
								formData.append("oldimage", $("#oldimage").val());
								formData.append("oldpath", $("#oldpath").val());
								formData.append("name", $("#name").val());					
								formData.append("email", $("#email").val());
								formData.append("phone", $("#phone").val());
								formData.append("title", $("#title").val());
								formData.append("bio", $("#bio").val());
								formData.append("address", $("#address").val());
								formData.append("facebook", $("#facebook").val());
								formData.append("twitter", $("#twitter").val());
								formData.append("instagram", $("#instagram").val());
								formData.append("linkedin", $("#linkedin").val());								
								formData.append("user_id", $("#user_id").val());									
							});
						}
						break
					case "projects-form2":
						{
							//send all the form data along with the files:
							this.on("sending", function(data, xhr, formData) {
								
								formData.append("_token", $("#_token").val());
								formData.append("oldimage", $("#oldimage").val());
								formData.append("oldpath", $("#oldpath").val());
								formData.append("name", $("#name").val());					
								formData.append("sdate", $("#sdate").val());
								formData.append("edate", $("#edate").val());
								formData.append("status", $("#status").val());
								formData.append("description", $("#description").val());								
								formData.append("pageId", $("#pageId").val());
							});
						}
						break						
					case "testimonials-form2":
						{
							//send all the form data along with the files:
							this.on("sending", function(data, xhr, formData) {
								formData.append("name", $("#name").val());					
								formData.append("title", $("#title").val());
								formData.append("comment", $("#comment").val());
								formData.append("pageId", $("#pageId").val());								
								formData.append("_token", $("#_token").val());
								formData.append("oldimage", $("#oldimage").val());
								formData.append("oldpath", $("#oldpath").val());
							});
						}
						break
					case "newsletters-form2":
						{
							//send all the form data along with the files:
							this.on("sending", function(data, xhr, formData) {
								formData.append("title", $("#title").val());					
								formData.append("type", $("#type").val());
								formData.append("summary", $("#summary").val());
								formData.append("created_by", $("#created_by").val());
								formData.append("status", $("#status").val());								
								formData.append("_token", $("#_token").val());
								formData.append("oldimage", $("#oldimage").val());
								formData.append("oldpath", $("#oldpath").val());
							});
						}
						break						
				}
			} else {
				
				switch (fname) //make url from form-id 
				{
					case "profiles-form1":
						{				
							//send all the form data along with the files:
							this.on("sending", function(data, xhr, formData) {	
								formData.append("_token", $("#_token").val());							
								formData.append("name", $("#name").val());					
								formData.append("email", $("#email").val());
								formData.append("phone", $("#phone").val());
								formData.append("title", $("#title").val());
								formData.append("bio", $("#bio").val());
								formData.append("address", $("#address").val());
								formData.append("facebook", $("#facebook").val());
								formData.append("twitter", $("#twitter").val());
								formData.append("instagram", $("#instagram").val());
								formData.append("linkedin", $("#linkedin").val());								
								formData.append("user_id", $("#user_id").val());								
							});
						}
						break
					case "projects-form1":
						{				
							//send all the form data along with the files:
							this.on("sending", function(data, xhr, formData) {									
								formData.append("name", $("#name").val());					
								formData.append("sdate", $("#sdate").val());
								formData.append("edate", $("#edate").val());
								formData.append("status", $("#status").val());
								formData.append("description", $("#description").val());								
								formData.append("pageId", $("#pageId").val());
								
							});
						}
						break						
					case "testimonials-form1":
						{
							//send all the form data along with the files:
							this.on("sending", function(data, xhr, formData) {
								formData.append("name", $("#name").val());					
								formData.append("title", $("#title").val());
								formData.append("comment", $("#comment").val());
								formData.append("pageId", $("#pageId").val());
							});
						}
						break	
					case "newsletters-form1":
						{
							//send all the form data along with the files:
							this.on("sending", function(data, xhr, formData) {
								formData.append("title", $("#title").val());					
								formData.append("type", $("#type").val());
								formData.append("summary", $("#summary").val());
								formData.append("created_by", $("#created_by").val());
												
							});
						}
						break							
				}
			}
			
			
			//success callback :
			this.on("success", function(files,response) {
                    if (response.success) {
                        console.log('Done:', 'Process Status ' + response.success.message);
                        Swal.fire("Completed!", response.success.message, 'success');
                        window.location.replace(up_url);

                    } else {
                        console.log('Validation Error:', 'Process Status ' + response.error.message);
                        Swal.fire("Validation Error!", response.error.message, 'error');

                    }
			});	
			//error callback:
			this.on("error", function(files,response)  {
				console.log('error:',response.exception);
				console.log('error:',response.message);				
				console.log('error:',files);				
				console.log('token:',$("#_token").val());
                    Swal.fire("Process Error!", 'File upload failed.', 'error');
			});			
		}
	});
	
    //if the guest user makes a login attempt
    var $userno;
    var lForm = $('#loginForm');

    lForm.submit(function(e) {

        e.preventDefault();

        var lbase = lForm.attr('action');
        var l_url = host + '/' + lbase;

        $.ajax({
                url: l_url,
                type: 'POST',
                data: lForm.serialize(),
                dataType: 'json',
            })
            .done(function(response) {

                console.log(response);

                if (response.success) {

                    //if attempt successful

                    Swal.fire({
                        title: "Hi " + response.success.username,
                        text: response.success.message,
                        timer: 6000,
                        showConfirmButton: false,
                        type: "success"
                    });
                    var loggedIn = host + '/' + response.success.url;
                    $userno = response.success.userno;
                    console.log('success:' + loggedIn);
                    window.location.replace(loggedIn);


                } else { //if user attempt failed

                    Swal.fire({
                        title: "Hi Guest",
                        text: response.error.message,
                        timer: 6000,
                        showConfirmButton: false,
                        type: "error"
                    });
                    //window.location.replace(redirect);
                }


            })
            .fail(function(errors) {
                console.log('Error:', 'Process Failed Entirely ' + 'Http Error: ' + errors.status, 'MESSAGE:' + errors.message);
                Swal.fire("Process Failed!", "Application Server Cannot Process Request!", 'error');


            });
    });




    //if the guest user makes a logout attempt
    var Outlink = $('#logout-link');
    var OForm = $('#logoutForm');

    Outlink.click(function(e) {
        var laddress = $(this).attr('href');
        e.preventDefault();


        OForm.submit();
    });


    OForm.submit(function(e) {
        e.preventDefault();


        var obase = OForm.attr('action');
        var o_url = host + '/' + obase;

        $.ajax({
                url: o_url,
                type: 'POST',
                data: OForm.serialize(),
                dataType: 'json',
            })
            .done(function(response) {

                if (response.success) {

                    //if attempt successful

                    Swal.fire({
                        title: "Bye ",
                        text: response.success.message,
                        timer: 6000,
                        showConfirmButton: false,
                        type: "success"
                    });
                    var logOut = host + '/' + response.success.url;
                    console.log('Success:' + logOut);
                    window.location.replace(logOut);


                } else { //Error on server 

                    Swal.fire({
                        title: "Hi",
                        text: response.error.message,
                        timer: 6000,
                        showConfirmButton: false,
                        type: "error"
                    });
                    //window.location.replace(redirect);
                }


            })
            .fail(function(errors) {
                console.log('Error:', 'Process Failed Entirely ' + 'Http Error: ' + errors.status, 'MESSAGE:' + errors.exception);
                Swal.fire("Process Failed!", "Application Server Cannot Process Request!", 'error');


            });

    });

    //when user clicks lookup button on a report form

    var rForm = '';

    rForm = $('.reportForm');

    rForm.submit(function(e) {

        e.preventDefault();

        var actionType = $('#submit').html();

        var type = "POST"; //for creating a new resource
        var id = $('#id').val();

        var base = rForm.attr('action');
        var my_url ='';
		
        if (actionType == "Update") {
            type = "PUT"; //for updating a resource
			var redirect = my_url;
            my_url += '/' + id;
			
        }
		if (actionType == "Save") {
            type = "POST"; //for updating a resource
			var mod = "subsreports/savereport";
          
			my_url = host + '/' + mod;
			console.log('url',my_url);
        }		

        $.ajax({
                url: my_url,
                type: type,
                data: rForm.serialize(),
                dataType: 'json',
            })
           .done(function(response) {

                console.log(response);

                if (response.success) {

                    if (actionType == "Save") { //if user created a new schedule record

                        Swal.fire({
                            title: "Completed Saving",
                            text: response.success.message,
                            timer: 6000,
                            showConfirmButton: false,
                            type: "success"
                        });
                        window.location.replace(my_url);
					}
                } 


            })
            .fail(function(errors) {
                console.log('Error:', 'Process Failed Entirely ' + 'Http Error: ' + +errors.status);
                Swal.fire("Process Failed!", "Application Server Cannot Process Request!", 'error');


            }); 
    }); 


    //when user clicks lookup button on a email form
/*
    var eForm = '';

    eForm = $('.emailForm');

    eForm.submit(function(e) {

        e.preventDefault();

        var actionType = $('#sub-btn').html();
        var type = "POST"; //for creating a new resource
        var id = $('#id').val();

        var ebase = eForm.attr('action');
        var e_url = host + '/' + ebase;
		var redirect = e_url;
		 console.log('e_url:',e_url);
		 
		if(actionType == "Update")
			{
				type = "PUT"; //for updating a resource
				e_url += '/' + id;
								
			}
			
        $.ajax({
                url: e_url,
                type: type,
                data: eForm.serialize(),
                dataType: 'json',
            })
           .done(function(response) {

                console.log(response);

                if (response.success) {
					if(actionType == "Update")
							{ //if user created a new email record

								Swal.fire({
									title: "Completed Updating",
									text: response.success.message,
									timer: 6000,
									showConfirmButton: false,
									type: "success"
								});
								window.location.replace(redirect);
							}



                   /* switch (actionType)
					{
						case "Save" :
							{ //if user created a new email record

								Swal.fire({
									title: "Completed Saving",
									text: response.success.message,
									timer: 6000,
									showConfirmButton: false,
									type: "success"
								});
								window.location.replace(redirect);
							}
						break
						case "Update" :
							{ //if user updated a new email record

								Swal.fire({
									title: "Completed Updating",
									text: response.success.message,
									timer: 6000,
									showConfirmButton: false,
									type: "success"
								});
								window.location.replace(redirect);
							}
						break						
						case "Send" :
							{ //if user sends a new email record

								Swal.fire({
									title: "Completed Sending",
									text: response.success.message,
									timer: 6000,
									showConfirmButton: false,
									type: "success"
								});
								window.location.replace(redirect);
							}
						break
					}
                } 
            })
			.fail(function(errors) {
                console.log('Error:', 'Process Failed Entirely ' + 'Http Error: ' + errors.status);
                Swal.fire("Process Failed!", "Cannot Process Request Right Now!", 'error');


            }); 
    }); */




    /**menu order views**/
    var links = $('.nav').find('.nav-item').children('.view-link');
    var macd = $('.menu-card-header').find('.menu-name');
    var hname = macd.html();

    var pdtable = $('.maincard').find('table').children('tbody');
    var propcover = $('tbody');

    var prop = [];
    var item;

    links.click(function(e) {
        var link = e.target;
        var address = $(link).attr('href');
        e.preventDefault();

        function onmenuclick(mname) {
            macd.html(mname);
            hname = mname;

            $(propcover).empty();

            for (item = 0; item < $rtemplate[mname]['data'].length; item++) {
                var $tm = $rtemplate[mname]['data'][item];


                prop = [];

                prop += '<tr class="popviews" ><td><button class="popper"><div class="card-avatar"><a href="javascript:void(0)"><img class=" menu-icon-cover" src="img/R3.jpg" align="left" /></a></div>';
                prop += '<h5 class="card-title"><b>' + $tm.id + '.</b>' + $tm.name + '</h5>';
                prop += '<h6 class="card-description">' + $tm.description + '</h6>';
                prop += '<a id="price" href="javascript:void(0)"  class="btn btn-danger btn-round">$' + $tm.price + ' </a></button></td></tr>';
                $(propcover).append(prop);


            };

            return propcover;
        }

        function handlemenuClick(address) {
            switch (address) {
                case "menuView/coffee":
                    {
                        var cover = onmenuclick('coffees');
                        pdtable.replaceWith(cover);
                    }
                    break;
                case "menuView/breakfast":
                    {
                        var cover = onmenuclick('breakfast');
                        pdtable.replaceWith(cover);

                    }
                    break;
                case "menuView/starters":
                    {
                        var cover = onmenuclick('starters');
                        pdtable.replaceWith(cover);
                    }
                    break;
                case "menuView/mains":
                    {
                        var cover = onmenuclick('mains');
                        pdtable.replaceWith(cover);
                    }
                    break;
                case "menuView/wines":
                    {
                        var cover = onmenuclick('wines');
                        pdtable.replaceWith(cover);
                    }
                    break;
                case "menuView/desserts":
                    {
                        var cover = onmenuclick('desserts');
                        pdtable.replaceWith(cover);
                    }
                    break;
            }
        }

        handlemenuClick(address);

    });



    var $cart = new Array();

    var $items = new Array();

    var $totalItems = 0;
    var $totalPrice = 0;
    var $listItems = [];

    /**when the user cliks the popview of the menu view**/
    var $products = $('.maincard').find('.popper');
    var $totals = $('.totalscard').find('.menu-card');

    $('.popper').click(function(e) {
        var product = e.target;
        console.log('hie Nel menu');
        console.log('cart state:', $cart);
        console.log('items state:', $items);

        var $producttyp = $('.menu-card-header').find('.menu-name');
        var $producttype = $producttyp.html();

        var $productid = $(this).find('h5.card-title').children('b.pid');
        var $pid = $productid.html();

        var $productnam = $(this).find('.card-title').children('b.pname');
        var $pname = $productnam.html();

        var $productdes = $(this).find('.card-description');
        var $pdes = $productdes.html();

        var $productprice = $(this).find('#price');
        var $pprice = $productprice.html();

        var $itemstotal = $('.totalscard').find('.menu-card-header').children('h2');
        var $itemstotals = $itemstotal.find('b');
        var $itemsTotal = $itemstotals.html();
        console.log('itemsTotal:', $itemsTotal);


        var $subtotal = $('.totalscard').find('.card-description').children('b');
        var $subTotal = $subtotal.html();


        var $itemslist = $($totals).find('.cart-table').children('tbody');
        var $itemsList = $($itemslist).find('.cart-body');


        var cartlist = [];
        var $text = [];


        $text += '<div><h3><strong>' + $producttype + '-' + 'Id:</strong>' + $pid + '</h3></div>';
        $text += '<div><h4>' + $pname + '</h4><div>';
        $text += '<div><h5><b> Description:</b>' + $pdes + '</h4></div>';
        $text += '<div><h5><b> Price:</b>' + $pprice + '</h4></div>';

        console.log('product id:', $pid);
        console.log('product name:', $pname);

        e.preventDefault();


        // fucntions for adding to cart
        var addtoCart = function addToCartClick($producttype, $pid) {

            var $selecteditem = $rtemplate[$producttype]['data'][($pid) - 1];
            console.log('inside function:', $selecteditem);
            var adcart = true;


            var checkedcart = checkActivateCart($cart);
            if (checkedcart == true) {
                console.log('checked:', checkedcart);
                //add to the cart elements
                //$cart['isbn'] = $pid;
                //$cart['qty'] = 1;
                $cart.push({ "isbn": $pid, "qty": 1 });
                $listItems = addToItemsList($cart, $selecteditem);
                console.log('cart', $cart);

            } else {
                console.log('unchecked:', checkedcart);


                if ($cart.includes($pid)) {
                    var $index = $cart.indexOf($pid);
                    console.log('index', $index);
                    $cart['qty'] += 1;
                    console.log('$cart-:', $cart);

                    $listItems = addToItemsList($cart, $selecteditem);

                } else {
                    $cart.push({ "isbn": $pid, "qty": 1 });
                    console.log('$cart-:', $cart);
                    $listItems = addToItemsList($cart, $selecteditem);

                }

            }

            $totalItems = calculateTotalItems($cart);
            $totalPrice = calculateTotalPrice($cart, $selecteditem);

            console.log('totalitems:', $totalItems);
            console.log('totalprice:', $totalPrice);

            $itemstotals.html($totalItems);
            $subtotal.html($totalPrice);

            return adcart;
        };

        function checkActivateCart(cart) {
            var $new;

            if (cart.length === 0) {

                $new = true;

            } else {

                $new = false;
            }

            return $new;
        };

        function calculateTotalItems(cart) {

            var $totalitems = 0;

            $totalitems = cart.length;
            console.log('cartlength:', $totalitems);
            return $totalitems;
        };


        function calculateTotalPrice(cart, $seleteditem) {

            var $totalprice = 0;
            var $itemprice;

            for (var b = 0; b < cart.length; b++) {
                $itemprice = $seleteditem.price;
                $totalprice += $itemprice * cart[b]['qty'];
            }

            return $totalprice;

        };

        function addToItemsList($cart, $selecteditem) {

            $items.push({
                "name": $selecteditem.name,
                "description": $selecteditem.description,
                "price": $selecteditem.price
            });
            console.log('items after:', $items);
            console.log('cart after:', $cart);
            displayListTable($cart, $items);

            return $items;
        };

        function displayListTable(cart, $items) {


            var name = "name",
                description = "description",
                price = "price",
                qty = "qty";

            for (l = 0; l < $items.length; l++) {


                cartlist += '<tr class="cartlist cart-body" ><td><h6>' + $items[l][name] + '</h6></td><td><h6>$' + $items[l][price] + '</h6></td><td><h6>' + cart[l][qty] + '</h6></td></tr>';
            }

            $itemsList.replaceWith(cartlist);
            console.log('cartlist:', $itemsList);
        };




        //select the product type 	
        switch ($producttype) {
            case "coffees":
                {

                    Swal.fire({
                        title: ' Add item to Order Cart?',
                        html: $text,
                        imageUrl: 'img/f2.jpg',
                        imageWidth: 400,
                        imageHeight: 200,
                        showConfirmButton: true,
                        showCancelButton: true,
                        cancelButtonColor: '#d33',

                    }).then((result) => {

                        console.log(result.value);
                        if (result.value == true) {

                            try {

                                var $addresult = addtoCart($producttype, $pid);

                                console.log('add', $addresult);

                                if ($addresult) {
                                    Swal.fire({
                                        title: 'Done',
                                        html: "<h4>Thank you continue browsing to add more items!</h4>",
                                        timer: 6000,
                                        showConfirmButton: false,
                                        type: "success"
                                    });

                                } else {
                                    Swal.fire("Failed!", "Sorry, failed to add selected Item to cart!", 'error');
                                }
                            } catch (e) {

                                Swal.fire("Failed!", e.message, 'error');
                                console.log('add faluire', e);
                            }

                        } else {
                            Swal.fire("Cancelled!", "Item not added to cart!", 'error');
                        }

                    })
                    .catch(swal.noop);


                }
                break;
            case "breakfast":
                {
                    Swal.fire("Breakfast " + $pname, "Cannot Process Request Right Now!", 'error');
                }
                break;
            case "starters":
                {
                    Swal.fire("Starters " + $pname, "Cannot Process Request Right Now!", 'error');
                }
                break;
            case "mains":
                {
                    Swal.fire("Mains " + $pname, "Cannot Process Request Right Now!", 'error');
                }
                break;
            case "wines":
                {
                    Swal.fire("Wines " + $pname, "Cannot Process Request Right Now!", 'error');
                }
                break;
            case "desserts":
                {
                    Swal.fire("Desserts " + $pname, "Cannot Process Request Right Now!", 'error');
                }
                break;
        }
    });


    /**if the user clicks gallery item*/
    $('.gallery-link').click(function(e) {
        e.preventDefault();
        var glink = e.target;
        console.log('clicked link', glink);
        var $pic = $(this).find('img.gallery-item');
        var $picId = $($pic).attr('id');
        var $picSrc = $($pic).attr('src');

        var $picName = $($pic).attr('alt');
        console.log('clicked pic', $picId);

        Swal.fire({
            title: $picName,
            html: '',
            imageUrl: $picSrc,
            imageWidth: 900,
            imageHeight: 600,
            showConfirmButton: false,
            showCancelButton: false,
            cancelButtonColor: '#d33',

        })

    });

});